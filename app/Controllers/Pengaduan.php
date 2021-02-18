<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
// use App\Models\PengaduanModel;
use App\Models\{
    PengaduanModel,
    MyUserModel,
    PercakapanModel
};

class Pengaduan extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel;
        $this->percakapanModel = new PercakapanModel;
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

    public function balas($kode_pengaduan)
    {
        $data = [
            'title' => 'Balas Pengaduan'
        ];

        $petugasid = user_id();

        $data['percakapan'] = $this->percakapanModel->getPercakapan($kode_pengaduan, $petugasid);
        // var_dump($data['percakapan']);
        // exit();

        $this->pengaduanModel->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat, users.id as userid');
        $this->pengaduanModel->join('users', 'users.id = pengaduan.user_id');
        $this->pengaduanModel->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id');
        $this->pengaduanModel->orderBy('pengaduan_dibuat', 'DESC');
        $this->pengaduanModel->where('pengaduan.kode_pengaduan =', $kode_pengaduan);

        $qPengaduan = $this->pengaduanModel->get();
        $data['pengaduan'] = $qPengaduan->getResult();

        return view('pengaduan/balas2', $data);
    }

    public function kirimBalasan($id_pengaduan, $kode_pengaduan, $userid)
    {
        $rules = [
            'pesan' => [
                'rules'     => 'required|max_length[65534]|min_length[3]',
                'errors'    => [
                    'required'  => 'Pesan harus diisi',
                    'max_length' => 'Mohon maaf, Pesan terlalu panjang',
                    'min_length' => 'Mohon maaf, Pesan terlalu singkat'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            // return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            session()->setFlashdata('message', $this->validator->getErrors());
            return redirect()->back();
        }

        $savePengaduan = [
            'status'            => 'proses'
        ];

        $savePercakapan = [
            'kode_pengaduan'    => $kode_pengaduan,
            'user_id'           => $userid,
            'petugas_id'        => user_id(),
            'percakapan'        => $this->request->getPost('pesan')
        ];

        $this->pengaduanModel->update($id_pengaduan, $savePengaduan);
        $this->percakapanModel->save($savePercakapan);

        if ($savePercakapan) {
            session()->setFlashdata('message', 'Pesan berhasil terkirim');
            return redirect()->to(base_url('/pengaduan/balas/' . $kode_pengaduan));
        }
    }

    public function kirimBalasanMasyarakat($id_pengaduan, $kode_pengaduan, $userid)
    {
        $rules = [
            'pesan' => [
                'rules'     => 'required|max_length[65534]|min_length[3]',
                'errors'    => [
                    'required'  => 'Pesan harus diisi',
                    'max_length' => 'Mohon maaf, Pesan terlalu panjang',
                    'min_length' => 'Mohon maaf, Pesan terlalu singkat'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            // return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            session()->setFlashdata('message', $this->validator->getErrors());
            return redirect()->back();
        }

        $savePercakapan = [
            'kode_pengaduan'    => $kode_pengaduan,
            'user_id'           => user()->id,
            'percakapan'        => $this->request->getPost('pesan')
        ];

        $this->percakapanModel->save($savePercakapan);

        if ($savePercakapan) {
            session()->setFlashdata('success', 'Pesan berhasil terkirim');
            return redirect()->back();
        }
    }

    public function delete($id_percakapan, $kode_pengaduan)
    {
        // hapus percakapan
        $this->percakapanModel->where('kode_pengaduan', $kode_pengaduan)->delete();
        // hapus pengaduan
        $this->pengaduanModel->where('id_pengaduan', $id_percakapan)->delete();

        session()->setFlashdata('message', 'Data percakapan dan pengaduan berhasil dihapus');
        return redirect()->to(base_url('/pengaduan'));
    }
}
