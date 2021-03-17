<?php

namespace App\Controllers;

use App\Models\MyUserModel;
use App\Models\KartuKeluargaModel;
use App\Models\MasyarakatModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;

class KartuKeluarga extends BaseController
{
    public function __construct()
    {
        $this->kkModel = new KartuKeluargaModel;
        $this->masyarakatModel = new MasyarakatModel;
    }

    public function index()
    {
        $data['title'] = 'Data Kartu Keluarga';

        return view('kk/index', $data);
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampildata'    => $this->kkModel->getData()
            ];

            $msg = [
                'data' => view('kk/tblKK', $data)
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
                'data' => view('kk/modalTambah')
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
                'no_kk' => [
                    'label' => 'No Kepala Keluarga',
                    'rules' => 'required|min_length[16]|max_length[16]|numeric|is_unique[kartu_keluarga.no_kk]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} harus 16 digit',
                        'max_length' => '{field} harus 16 digit',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'kepala_keluarga' => [
                    'rules' => 'required|is_unique[kartu_keluarga.user_id]',
                    'errors' => [
                        'required' => 'Kepala Keluarga tidak boleh kosong',
                        'is_unique' => 'Kepala Keluarga sudah terdaftar'
                    ]
                ],
                'jenis_kelamin' => [
                    'rules' => 'required',
                    'errors' => 'Jenis Kelamin harus dipilih'
                ],
                'agama' => [
                    'rules' => 'required',
                    'errors' => 'Agama harus dipilih'
                ],
                'pekerjaan'  => [
                    'label' => 'Pekerjaan',
                    'rules' => 'required|min_length[5]|max_length[50]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 5 karakter',
                        'max_length' => '{field} maximal 50 karakter',
                    ]
                ]
            ]);
            // $log = 'console.log(' . $this->request->getVar('kartu_keluarga') . ');';
            // echo $log;

            // jika tidak valid (Ada yg salah)
            if (!$valid) {
                $msg = [
                    'error' => [
                        'no_kk'  => $validation->getError('no_kk'),
                        'kepala_keluarga'  => $validation->getError('kepala_keluarga'),
                        'jenis_kelamin'  => $validation->getError('jenis_kelamin'),
                        'agama'  => $validation->getError('agama'),
                        'pekerjaan'  => $validation->getError('pekerjaan'),
                    ]
                ];
            } else {
                // jika validasi sukses (benar)
                $simpandata = [
                    'no_kk' =>  $this->request->getVar('no_kk'),
                    'user_id' =>  $this->request->getVar('kepala_keluarga'),
                    'jenis_kelamin' =>  $this->request->getVar('jenis_kelamin'),
                    'agama' =>  $this->request->getVar('agama'),
                    'pekerjaan' =>  $this->request->getVar('pekerjaan'),
                    'status_hubungan' => 'Kepala Keluarga',
                ];
                $this->kkModel->save($simpandata);
                $msg = [
                    'sukses' => 'Kartu Keluarga baru berhasil ditambahkan',
                ];
            }
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
            $userlist = $this->masyarakatModel->select('id,nik,fullname')
                ->orderBy('nik')
                ->findAll();
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record
            $userlist = $this->masyarakatModel->select('id,nik,fullname')
                ->like('nik', $searchTerm)
                ->orderBy('nik')
                // ->findAll(5);
                ->findAll();
        }
        $data = array();
        foreach ($userlist as $user) {
            $data[] = array(
                "id" => $user['id'],
                "text" => $user['nik'] . ' - ' . $user['fullname'],
            );
        }

        $response['data'] = $data;
        return $this->response->setJSON($response);
    }
}
