<?php

namespace App\Controllers;

use \App\Models\QuotesModel;

class Quotes extends BaseController
{
    public function __construct()
    {
        $this->quotes = new QuotesModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Quotes Singkat'
        ];

        return view('quotes/index', $data);
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampildata'    => $this->quotes->findAll()
            ];

            $msg = [
                'data' => view('quotes/tblQuotes', $data)
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
                'data' => view('quotes/modalTambah')
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
                'quote'  => [
                    'label' => 'Quote',
                    'rules' => 'required|min_length[20]|max_length[200]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 20 karakter',
                        'max_length' => '{field} maximal 200 karakter',
                    ]
                ]
            ]);

            // jika tidak valid (Ada yg salah)
            if (!$valid) {
                $msg = [
                    'error' => [
                        'quote'  => $validation->getError('quote')
                    ]
                ];
            } else {
                // jika validasi sukses (benar)
                $simpandata = [
                    'quote' =>  $this->request->getVar('quote')
                ];
                $this->quotes->insert($simpandata);
                $msg = ['sukses' => 'Quote baru berhasil ditambahkan'];
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
            $id_quotes = $this->request->getVar('id_quotes');
            $row = $this->quotes->find($id_quotes);
            // d($data);

            $data = [
                'id_quotes' => $row['id_quotes'],
                'quote' => $row['quote'],
            ];

            $msg = [
                'sukses' => view('quotes/modalEdit', $data)
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
            $data = [
                'id_quotes' =>  $this->request->getVar('id_quotes'),
                'quote' =>  $this->request->getVar('quote'),
            ];
            $id_quotes = $this->request->getVar('id_quotes');

            $this->quotes->update($id_quotes, $data);
            $msg = ['sukses' => 'Quote berhasil diupdate'];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id_quotes = $this->request->getVar('id_quotes');
            $this->quotes->delete($id_quotes);

            $msg = ['sukses' => "Quote berhasil dihapus"];
            echo json_encode($msg);
        } else {
            return redirect()->to(base_url('quotes/index'));
        }
    }
}
