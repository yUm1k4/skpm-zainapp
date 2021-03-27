<?php

namespace App\Controllers;

use App\Models\TestimoniModel;
use App\Models\MasyarakatModel;

class Testimoni extends BaseController
{
    public function __construct()
    {
        $this->testimoni = new TestimoniModel;
        $this->masyarakatModel = new MasyarakatModel;
    }

    public function index()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('testimoni');
        $data = [
            'jmlData'   => $this->builder->countAll(),
            'title'     => 'Daftar Testimoni User'
        ];

        return view('testimoni/index', $data);
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampildata'    => $this->testimoni->getData()
            ];

            $msg = [
                'data' => view('testimoni/tblTestimoni', $data)
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function getUsers()
    {
        $request = service('request');
        $postData = $request->getPost();
        $response = array();

        if (!isset($postData['searchTerm'])) {
            // Fetch record
            $userlist = $this->masyarakatModel->select('id,username')
                ->orderBy('username')
                ->findAll();
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record
            $userlist = $this->masyarakatModel->select('id,username')
                ->like('username', $searchTerm)
                ->orderBy('username')
                // ->findAll(5);
                ->findAll();
        }
        $data = array();
        foreach ($userlist as $user) {
            $data[] = array(
                "id" => $user['id'],
                "text" => $user['username'],

            );
        }

        $response['data'] = $data;
        return $this->response->setJSON($response);
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $data['daftar_user'] = $this->masyarakatModel->findAll();
            $msg = [
                'data' => view('testimoni/modalTambah', $data)
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
                'user_id' => [
                    'rules' => 'required',
                    'errors' => 'User tidak boleh kosong'
                ],
                'testimoni'  => [
                    'label' => 'Testimoni',
                    'rules' => 'required|min_length[130]|max_length[300]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 130 karakter',
                        'max_length' => '{field} maximal 300 karakter',
                    ]
                ],
                'pekerjaan'  => [
                    'label' => 'Pekerjaan',
                    'rules' => 'required|min_length[5]|max_length[20]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 5 karakter',
                        'max_length' => '{field} maximal 20 karakter',
                    ]
                ]
            ]);
            if ($this->request->getVar('user_id') == 0) {
                session()->setFlashdata('error', 'User tidak boleh kosong');
                return redirect()->back();
            }

            // jika tidak valid (Ada yg salah)
            if (!$valid) {
                $msg = [
                    'error' => [
                        'user_id'  => $validation->getError('user_id'),
                        'pekerjaan'  => $validation->getError('pekerjaan'),
                        'testimoni'  => $validation->getError('testimoni')
                    ]
                ];
            } else {
                // jika validasi sukses (benar)
                $simpandata = [
                    'user_id' =>  $this->request->getVar('user_id'),
                    'pekerjaan' =>  $this->request->getVar('pekerjaan'),
                    'testimoni' =>  $this->request->getVar('testimoni')
                ];
                $this->testimoni->save($simpandata);
                $msg = [
                    'sukses' => 'Testimoni baru berhasil ditambahkan',
                    'id'        => $simpandata['testimoni']
                ];
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
            $id_testimoni = $this->request->getVar('id_testimoni');
            $row = $this->testimoni->getJoin($id_testimoni);

            $data = [
                'id_testimoni'  => $row['id_testimoni'],
                'fullname'      => $row['fullname'],
                'username'      => $row['username'],
                'pekerjaan'     => $row['pekerjaan'],
                'testimoni'     => $row['testimoni']
            ];

            $msg = [
                'sukses' => view('testimoni/modalEdit', $data)
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
            $id_testimoni = $this->request->getVar('id_testimoni');
            $data = [
                'id_testimoni' =>  $id_testimoni,
                'fullname' =>  $this->request->getVar('fullname'),
                'username' =>  $this->request->getVar('username'),
                'pekerjaan' =>  $this->request->getVar('pekerjaan'),
                'testimoni' =>  $this->request->getVar('testimoni'),
            ];

            $this->testimoni->update($id_testimoni, $data);
            $msg = ['sukses' => 'Testimoni berhasil diupdate'];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id_testimoni = $this->request->getVar('id_testimoni');
            $this->testimoni->delete($id_testimoni);

            $msg = ['sukses' => "Testimoni berhasil dihapus"];
            echo json_encode($msg);
        } else {
            return redirect()->to(base_url('testimoni/index'));
        }
    }
}
