<?php

namespace App\Controllers;

use App\Models\FilterKataModel;

class FilterKata extends BaseController
{
    public function __construct()
    {
        $this->filter = new FilterKataModel;
    }

    public function index()
    {
        $data = [
            'title'     => 'Filter Kata Kotor'
        ];

        return view('filterKata/index', $data);
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampildata'    => $this->filter->select('*')
                    ->orderBy('kata_kotor', 'ASC')
                    ->get()->getResultArray()
            ];

            $msg = [
                'data' => view('filterKata/tblFilter', $data)
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('filterKata/modalTambah')
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            // Validasi
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'kata_kotor'  => [
                    'label' => 'Kata Kotor',
                    'rules' => 'required|min_length[2]|max_length[100]|is_unique[filter_kata_kotor.kata_kotor]|alpha_numeric',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 2 karakter',
                        'max_length' => '{field} maximal 50 karakter',
                        'is_unique' => '{field} sudah terdaftar',
                        'alpha_numeric' => '{field} tidak boleh ada unsur spesial/khusus',
                    ]
                ],
                'filter_kata'  => [
                    'label' => 'Filter Kata',
                    'rules' => 'required|min_length[2]|max_length[10]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 2 karakter',
                        'max_length' => '{field} maximal 10 karakter'
                    ]
                ]
            ]);

            // jika tidak valid (Ada yg salah)
            if (!$valid) {
                $msg = [
                    'error' => [
                        'kata_kotor'  => $validation->getError('kata_kotor'),
                        'filter_kata'  => $validation->getError('filter_kata')
                    ]
                ];
            } else {
                // jika validasi sukses (benar)
                // strip_tags() utk menghilangkan tag html
                $simpandata = [
                    'kata_kotor' =>  strip_tags(strtolower($this->request->getVar('kata_kotor'))),
                    'filter_kata' =>  strip_tags(strtolower($this->request->getVar('filter_kata')))
                ];
                $this->filter->insert($simpandata);
                $msg = ['sukses' => 'Filter Kata baru berhasil ditambahkan'];
            }
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $id_filter = $this->request->getVar('id_filter');
            $row = $this->filter->find($id_filter);
            // d($data);

            $data = [
                'id_filter' => $row['id_filter'],
                'kata_kotor' => $row['kata_kotor'],
                'filter_kata' => $row['filter_kata'],
            ];

            $msg = [
                'sukses' => view('filterKata/modalEdit', $data)
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $id_filter = $this->request->getVar('id_filter');
            $data_lama = $this->filter->where('id_filter', $id_filter)->get()->getRowArray();

            // validasi untuk field" yg unique
            // jika kata kotor yg lama sama dengan kata kotor yg baru (artinya tdk diubah)
            if ($data_lama['kata_kotor'] == $this->request->getVar('kata_kotor')) {
                // wajib di isi saja
                $rule_katakotor = 'required|min_length[2]|max_length[100]|alpha_numeric';
            } else {
                // sedangkan kalo beda, harus unique, artinya tidak ada yg sama dengan kata kotor lain selain kata kotor sebelumnya
                $rule_katakotor = 'required|min_length[2]|max_length[100]|is_unique[filter_kata_kotor.kata_kotor]|alpha_numeric';
            }

            $validation = \Config\Services::validation();
            $rules = [
                'kata_kotor'  => [
                    'label' => 'Kata Kotor',
                    'rules' => $rule_katakotor,
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 2 karakter',
                        'max_length' => '{field} maximal 50 karakter',
                        'is_unique' => '{field} sudah terdaftar',
                        'alpha_numeric' => '{field} tidak boleh ada unsur spesial/khusus',
                    ]
                ],
                'filter_kata'  => [
                    'label' => 'Filter Kata',
                    'rules' => 'required|min_length[2]|max_length[10]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 2 karakter',
                        'max_length' => '{field} maximal 10 karakter'
                    ]
                ]
            ];

            // jika tidak valid (Ada yg salah)
            if (!$this->validate($rules)) {
                $msg = [
                    'error' => [
                        'kata_kotor'    => $validation->getError('kata_kotor'),
                        'filter_kata'     => $validation->getError('filter_kata'),
                    ]
                ];
            } else {
                $data = [
                    'id_filter'     => $id_filter,
                    'kata_kotor'    => strip_tags(strtolower($this->request->getVar('kata_kotor'))),
                    'filter_kata'   => strip_tags(strtolower($this->request->getVar('filter_kata'))),
                ];

                $this->filter->update($id_filter, $data);
                $msg = ['sukses' => 'Kata Kotor berhasil diupdate'];
            }
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id_filter = $this->request->getVar('id_filter');
            $this->filter->delete($id_filter);

            $msg = ['sukses' => "Kata kotor berhasil dihapus"];
            echo json_encode($msg);
        } else {
            return redirect()->to(base_url('filterKata/index'));
        }
    }

    //--------------------------------------------------------------------

}
