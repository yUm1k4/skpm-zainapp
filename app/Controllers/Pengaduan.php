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
        $row = $this->pengaduanModel->where('id_pengaduan', $id_pengaduan)->get()->getRowArray();
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
            'user_id'           => $userid,
            'petugas_id'        => user_id(),
            'percakapan'        => $this->request->getPost('pesan')
        ];

        // jika status sblmnya pending, ubah jadi proses 
        if ($row['status'] == 'pending') {
            $savePengaduan = [
                'status'            => 'proses'
            ];
            $this->pengaduanModel->update($id_pengaduan, $savePengaduan);
        }

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

    public function delete($id_pengaduan, $kode_pengaduan)
    {
        // hapus percakapan
        $this->percakapanModel->where('kode_pengaduan', $kode_pengaduan)->delete();
        // hapus pengaduan
        $this->pengaduanModel->where('id_pengaduan', $id_pengaduan)->delete();

        session()->setFlashdata('message', 'Data percakapan dan pengaduan berhasil dihapus');
        return redirect()->to(base_url('/pengaduan'));
    }

    public function formSelesai()
    {
        if ($this->request->isAJAX()) {
            $id_pengaduan = $this->request->getVar('id_pengaduan');
            $row = $this->pengaduanModel->find($id_pengaduan);
            // d($data);

            $data = [
                'id_pengaduan' => $row['id_pengaduan'],
                'hasil_akhir' => $row['hasil_akhir'],
            ];

            $msg = [
                'sukses' => view('pengaduan/modalSelesai', $data)
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function updateSelesai()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'id_pengaduan'  =>  $this->request->getVar('id_pengaduan'),
                'hasil_akhir'   =>  $this->request->getVar('hasil_akhir'),
                'status'        => 'selesai'
            ];
            $id_pengaduan = $this->request->getVar('id_pengaduan');

            $this->pengaduanModel->update($id_pengaduan, $data);
            $msg = ['sukses' => 'Status Pengaduan telah selesai!'];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function formArsip()
    {
        if ($this->request->isAJAX()) {
            $id_pengaduan = $this->request->getVar('id_pengaduan');
            $row = $this->pengaduanModel->find($id_pengaduan);

            $data = [
                'id_pengaduan'      => $row['id_pengaduan'],
                'kode_pengaduan'    => $row['kode_pengaduan']
            ];

            $msg = [
                'sukses' => view('pengaduan/modalArsip', $data)
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function updateArsip()
    {
        if ($this->request->isAJAX()) {
            $id_pengaduan = $this->request->getVar('id_pengaduan');
            $data = [
                'id_pengaduan'  =>  $id_pengaduan,
                'status'        => 'arsip'
            ];

            $this->pengaduanModel->update($id_pengaduan, $data);
            $msg = ['sukses' => 'Status Pengaduan telah berhasil diarsipkan!'];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function formBatalArsip()
    {
        if ($this->request->isAJAX()) {
            $id_pengaduan = $this->request->getVar('id_pengaduan');
            $row = $this->pengaduanModel->find($id_pengaduan);

            $data = [
                'id_pengaduan'      => $row['id_pengaduan'],
                'kode_pengaduan'    => $row['kode_pengaduan']
            ];

            $msg = [
                'sukses' => view('pengaduan/modalBatalArsip', $data)
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function updateBatalArsip()
    {
        if ($this->request->isAJAX()) {
            $id_pengaduan = $this->request->getVar('id_pengaduan');
            $data = [
                'id_pengaduan'  =>  $id_pengaduan,
                'status'        => 'proses'
            ];

            $this->pengaduanModel->update($id_pengaduan, $data);
            $msg = ['sukses' => 'Pengaduan batal diarsipkan, status menjadi Proses'];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }


    public function hapusPesan($id_percakapan)
    {
        // hapus percakapan
        $this->percakapanModel->where('id_percakapan', $id_percakapan)->delete();

        session()->setFlashdata('message', 'Pesan anda berhasil dihapus');
        return redirect()->back();
    }

    public function formCariPengaduan()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'sukses' => view('pengaduan/modalCariPengaduan')
            ];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function cariPengaduan()
    {
        $keyword = $this->request->getVar('cariPengaduan');

        if ($keyword) {
            $jmlHasil = $this->pengaduanModel->cariBerdasarNikUsername($keyword)->countAllResults();
            if ($jmlHasil != 0) { // jika jumlah hasil inputan tdk kosong
                $hasil = $this->pengaduanModel->cariBerdasarNikUsername($keyword)->get()->getRowArray();
                $pengaduan = $this->pengaduanModel->cariBerdasarNikUsername($keyword)->get()->getResultArray();
                // dd($pengaduan);
                $data = [
                    'title'             => 'Data Pengaduan ' . limit_word($hasil['fullname'], 3),
                    'hasil'             => $hasil,
                    'pengaduan'         => $pengaduan,
                    'totalPengaduan'    => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $hasil['user_id'])->countAllResults(),
                    'pengaduanProses'   => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $hasil['user_id'])->where('status', 'proses')->countAllResults(),
                    'pengaduanPending'  => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $hasil['user_id'])->where('status', 'pending')->countAllResults(),
                    'pengaduanArsip'    => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $hasil['user_id'])->where('status', 'arsip')->countAllResults(),
                    'pengaduanSelesai'  => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $hasil['user_id'])->where('status', 'selesai')->countAllResults()
                ];
                return view('pengaduan/hasilCariPengaduan', $data);
            } else { // jika hasil inputan kosong
                session()->setFlashdata('error', 'Maaf, Pengaduan yang Anda cari tidak ada, silahkan cek nik / username nya. Atau user tersebut belum membuat pengaduan');
                return redirect()->back();
            }
        }
    }
}
