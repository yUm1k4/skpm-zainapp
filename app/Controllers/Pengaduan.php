<?php

namespace App\Controllers;

use \App\Models\PengaduanModel;

class Pengaduan extends BaseController
{

    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel;
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('pengaduan');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pengaduan',
            // 'pengaduan' => $this->pengaduanModel->getData()
        ];

        $this->pengaduanModel->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat');
        $this->pengaduanModel->join('users', 'users.id = pengaduan.user_id');
        $this->pengaduanModel->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id');
        $this->pengaduanModel->orderBy('pengaduan_dibuat', 'DESC');

        $query = $this->pengaduanModel->get();
        $data['pengaduan'] = $query->getResult();

        return view('pengaduan/index', $data);
    }

    public function delete($id)
    {
        $this->pengaduanModel->where('id_pengaduan', $id)->delete();

        session()->setFlashdata('message', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/pengaduan'));
    }
}
