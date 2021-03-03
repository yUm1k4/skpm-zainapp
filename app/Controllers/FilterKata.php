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
                'tampildata'    => $this->filter->findAll()
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

    //--------------------------------------------------------------------

}
