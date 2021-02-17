<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriPengaduan extends BaseController
{
    public function __construct()
    {
        $this->katModel = new KategoriModel;
    }

    public function index()
    {
        $data['title'] = 'Data Kategori Pengaduan';

        return view('kategori/index', $data);
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampildata'    => $this->katModel->findAll()
            ];

            $msg = [
                'data' => view('kategori/tblKategori', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('kategori/modalTambah')
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            // Validasi
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_kategori'  => [
                    'label' => 'Nama Kategori',
                    'rules' => 'required|min_length[3]|max_length[40]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_Length' => '{field} terlalu singkat',
                        'max_Length' => '{field} terlalu panjang, maximal 40 karakter',
                    ]
                ]
            ]);

            // jika tidak valid (Ada yg salah)
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kategori'  => $validation->getError('nama_kategori')
                    ]
                ];
            } else {
                // jika validasi sukses (benar)
                $simpandata = [
                    'nama_kategori' =>  $this->request->getVar('nama_kategori')
                ];
                $this->katModel->insert($simpandata);
                $msg = ['sukses' => 'Kategori baru berhasil ditambahkan'];
            }
            echo json_encode($msg);
        } else {
            return redirect()->back();
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $id_pengaduan_kategori = $this->request->getVar('id_pengaduan_kategori');
            $row = $this->katModel->find($id_pengaduan_kategori);
            // d($data);

            $data = [
                'id_pengaduan_kategori' => $row['id_pengaduan_kategori'],
                'nama_kategori' => $row['nama_kategori'],
            ];

            $msg = [
                'sukses' => view('kategori/modalEdit', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'id_pengaduan_kategori' =>  $this->request->getVar('id_pengaduan_kategori'),
                'nama_kategori' =>  $this->request->getVar('nama_kategori'),
            ];
            $id_pengaduan_kategori = $this->request->getVar('id_pengaduan_kategori');

            $this->katModel->update($id_pengaduan_kategori, $data);
            $msg = ['sukses' => 'Kategori berhasil diupdate'];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id_pengaduan_kategori = $this->request->getVar('id_pengaduan_kategori');
            $this->katModel->delete($id_pengaduan_kategori);

            $msg = ['sukses' => "Kategori berhasil dihapus"];
            echo json_encode($msg);
        } else {
            return redirect()->to(base_url('pengaduan-kategori'));
        }
    }
}
