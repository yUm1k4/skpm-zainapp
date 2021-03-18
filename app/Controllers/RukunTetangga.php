<?php

namespace App\Controllers;

use \App\Models\RukunTetanggaModel;
use \App\Models\RukunWargaModel;

class RukunTetangga extends BaseController
{
    public function __construct()
    {
        $this->rtModel = new RukunTetanggaModel;
        $this->rwModel = new RukunWargaModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Data Rukun Tetangga'
        ];

        return view('rukunTetangga/index', $data);
    }

    public function getRW()
    {
        $request = service('request');
        $postData = $request->getPost();
        $response = array();

        if (!isset($postData['searchTerm'])) {
            // Fetch record
            $userlist = $this->rwModel->select('id_rw,no_rw,nama_rw')
                ->orderBy('no_rw')
                ->findAll();
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record
            $userlist = $this->rwModel->select('id_rw,no_rw,nama_rw')
                ->like('no_rw', $searchTerm)
                ->orderBy('no_rw')
                // ->findAll(5);
                ->findAll();
        }
        $data = array();
        foreach ($userlist as $user) {
            $data[] = array(
                "id" => $user['id_rw'],
                "text" => 'RW: ' . $user['no_rw'] . ' - ' . $user['nama_rw'],
            );
        }

        $response['data'] = $data;
        return $this->response->setJSON($response);
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampildata'    => $this->rtModel->getData()
            ];

            $msg = [
                'data' => view('rukunTetangga/tblRT', $data)
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
                'data' => view('rukunTetangga/modalTambah')
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    private function _unique_rt_rw($no_rt, $id_rw)
    {
        $this->rtModel = new RukunTetanggaModel;
        $no_rt = $no_rt;
        $rw_id = $id_rw;
        $this->rtModel->select('*')
            ->where('no_rt', $no_rt)
            ->where('rw_id', $rw_id);
        $num = $this->rtModel->countAllResults();
        if ($num > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            // Validasi
            $valid = $this->validate([
                'no_rt'  => [
                    'label' => 'Nomor RT',
                    // 'rules' => 'required|min_length[2]|max_length[3]|is_unique[rukun_tetangga.no_rt]',
                    'rules' => 'required|min_length[2]|max_length[3]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 2 digit',
                        'max_length' => '{field} maximal 3 digit',
                        // 'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'nama_rt'  => [
                    'label' => 'Nama RT',
                    'rules' => 'required|min_length[5]|max_length[50]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 5 digit',
                        'max_length' => '{field} maximal 50 digit',
                    ]
                ],
                'rw_id'  => [
                    'label' => 'Bagian dari RW',
                    'rules' => 'required',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                    ]
                ],
            ]);

            // jika tidak valid (Ada yg salah)
            if (!$valid) {
                $msg = [
                    'error' => [
                        'no_rt'  => $validation->getError('no_rt'),
                        'nama_rw'  => $validation->getError('nama_rw')
                    ]
                ];
            } else {
                // jika validasi sukses (benar)
                $simpandata = [
                    'no_rt' =>  $this->request->getVar('no_rt'),
                    'rw_id' =>  $this->request->getVar('rw_id'),
                    'nama_rt' =>  ucwords($this->request->getVar('nama_rt'))
                ];
                $this->rtModel->insert($simpandata);
                $msg = ['sukses' => 'RT baru berhasil ditambahkan'];
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
            $id_rt = $this->request->getVar('id_rt');
            $row = $this->rtModel->find($id_rt);

            $dataRW = $this->rtModel->dataRW($row['rw_id']);
            $text = 'RW: ' . $dataRW['no_rw'] . ' - ' . $dataRW['nama_rw'];

            $data = [
                'id_rt' => $row['id_rt'],
                'rw_id' => $row['rw_id'],
                'no_rt' => $row['no_rt'],
                'nama_rt' => $row['nama_rt'],
            ];

            $msg = [
                'sukses' => view('rukunTetangga/modalEdit', $data),
                'selectId' => $dataRW['rw_id'],
                'selectText' => $text,
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
            $id_rt = $this->request->getVar('id_rt');
            $row = $this->rtModel->find($id_rt);
            // $log = 'console.log(' . $row["id_rt"] . '); ';
            // echo $log;

            // validasi untuk field yg unique
            // jika no_rt yg lama sama dengan no_rt yg baru (artinya tdk diubah)
            if ($row['no_rt'] == $this->request->getVar('no_rt')) {
                // wajib di isi
                $rule_no_rt = 'required|min_length[2]|max_length[3]';
            } else {
                // sedangkan kalo beda, harus unique, artinya tidak ada yg sama dengan no_rt lain selain no_rt sebelumnya
                $rule_no_rt = 'required|min_length[2]|max_length[3]|is_unique[rukun_tetangga.no_rt]';
            }

            // Validasi
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'no_rt'  => [
                    'label' => 'Nomor RT',
                    'rules' => $rule_no_rt,
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 2 digit',
                        'max_length' => '{field} maximal 3 digit',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'nama_rt'  => [
                    'label' => 'Nama RT',
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
                        'no_rt'  => $validation->getError('no_rt'),
                        'nama_rt'  => $validation->getError('nama_rt')
                    ]
                ];
            } else {
                $data = [
                    'id_rt' =>  $id_rt,
                    'no_rt' =>  $this->request->getVar('no_rt'),
                    'nama_rt' =>  ucwords($this->request->getVar('nama_rt')),
                ];

                $this->rtModel->update($id_rt, $data);
                $msg = ['sukses' => 'RT berhasil diupdate'];
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
            $id_rt = $this->request->getVar('id_rt');
            $this->rtModel->delete($id_rt);

            $msg = ['sukses' => "RT berhasil dihapus"];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }
}
