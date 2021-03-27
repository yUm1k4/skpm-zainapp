<?php

namespace App\Controllers;

use \App\Models\RukunWargaModel;

class RukunWarga extends BaseController
{
    public function __construct()
    {
        $this->rwModel = new RukunWargaModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Data Rukun Warga'
        ];

        return view('rukunWarga/index', $data);
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                // 'tampildata'    => $this->rwModel->orderBy('no_rw', 'asc')
                //     ->findAll()
                'tampildata'    => $this->rwModel->getCount()
            ];

            $msg = [
                'data' => view('rukunWarga/tblRW', $data)
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
                'data' => view('rukunWarga/modalTambah')
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
                'no_rw'  => [
                    'label' => 'Nomor RW',
                    'rules' => 'required|min_length[2]|max_length[3]|is_unique[rukun_warga.no_rw]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 2 digit',
                        'max_length' => '{field} maximal 3 digit',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'nama_rw'  => [
                    'label' => 'Nama RW',
                    'rules' => 'required|min_length[5]|max_length[50]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 5 digit',
                        'max_length' => '{field} maximal 50 digit',
                    ]
                ]
            ]);

            // jika tidak valid (Ada yg salah)
            if (!$valid) {
                $msg = [
                    'error' => [
                        'no_rw'  => $validation->getError('no_rw'),
                        'nama_rw'  => $validation->getError('nama_rw')
                    ]
                ];
            } else {
                // jika validasi sukses (benar)
                $simpandata = [
                    'no_rw' =>  $this->request->getVar('no_rw'),
                    'nama_rw' =>  ucwords($this->request->getVar('nama_rw'))
                ];
                $this->rwModel->insert($simpandata);
                $msg = ['sukses' => 'RW baru berhasil ditambahkan'];
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
            $id_rw = $this->request->getVar('id_rw');
            $row = $this->rwModel->find($id_rw);

            $data = [
                'id_rw' => $row['id_rw'],
                'no_rw' => $row['no_rw'],
                'nama_rw' => $row['nama_rw'],
            ];

            $msg = [
                'sukses' => view('rukunWarga/modalEdit', $data)
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
            $id_rw = $this->request->getVar('id_rw');
            $row = $this->rwModel->find($id_rw);
            // $log = 'console.log(' . $row["id_rw"] . '); ';
            // echo $log;

            // validasi untuk field yg unique
            // jika no_rw yg lama sama dengan no_rw yg baru (artinya tdk diubah)
            if ($row['no_rw'] == $this->request->getVar('no_rw')) {
                // wajib di isi
                $rule_no_rw = 'required|min_length[2]|max_length[3]';
            } else {
                // sedangkan kalo beda, harus unique, artinya tidak ada yg sama dengan no_rw lain selain no_rw sebelumnya
                $rule_no_rw = 'required|min_length[2]|max_length[3]|is_unique[rukun_warga.no_rw]';
            }

            // Validasi
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'no_rw'  => [
                    'label' => 'Nomor RW',
                    'rules' => $rule_no_rw,
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 2 digit',
                        'max_length' => '{field} maximal 3 digit',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'nama_rw'  => [
                    'label' => 'Nama RW',
                    'rules' => 'required|min_length[5]|max_length[50]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 5 digit',
                        'max_length' => '{field} maximal 50 digit',
                    ]
                ]
            ]);

            // jika tidak valid (Ada yg salah)
            if (!$valid) {
                $msg = [
                    'error' => [
                        'no_rw'  => $validation->getError('no_rw'),
                        'nama_rw'  => $validation->getError('nama_rw')
                    ]
                ];
            } else {
                $data = [
                    'id_rw' =>  $id_rw,
                    'no_rw' =>  $this->request->getVar('no_rw'),
                    'nama_rw' =>  ucwords($this->request->getVar('nama_rw')),
                ];

                $this->rwModel->update($id_rw, $data);
                $msg = ['sukses' => 'RW berhasil diupdate'];
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
            $id_rw = $this->request->getVar('id_rw');
            $this->rwModel->delete($id_rw);

            $msg = ['sukses' => "RW berhasil dihapus"];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }
}
