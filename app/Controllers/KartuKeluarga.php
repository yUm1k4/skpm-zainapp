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

    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $id_kk = $this->request->getVar('id_kk');
            $row = $this->kkModel->find($id_kk);

            $dataNIK = $this->kkModel->dataNIK($row['user_id']);
            $kepalaText = $dataNIK['nik'] . ' - ' . $dataNIK['fullname'];

            $data = [
                'id_kk'         => $id_kk,
                'no_kk'         => $row['no_kk'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'pekerjaan'     => $row['pekerjaan'],
                'agama'         => $row['agama'],
            ];

            $msg = [
                'sukses'    => view('kk/modalEdit', $data),
                'kepalaId'  => $dataNIK['user_id'],
                'kepalaText' => $kepalaText,
                'agamaText' => $data['agama'],
                // 'sukses' => $data['jenis_kelamin'],
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
            $id_kk = $this->request->getVar('id_kk');
            $row = $this->kkModel->find($id_kk);

            // validasi untuk field yg unique
            // jika no_rt yg lama sama dengan no_rt yg baru (artinya tdk diubah)
            if ($row['no_kk'] == $this->request->getVar('no_kk')) {
                // wajib di isi aja
                $rule_no_kk = 'required|numeric|min_length[16]|max_length[16]';
            } else {
                // sedangkan kalo beda, harus unique, artinya tidak ada yg sama dengan no_kk lain selain no_kk sebelumnya
                $rule_no_kk = 'required|numeric|min_length[16]|max_length[16]|is_unique[kartu_keluarga.no_kk]';
            }
            if ($row['user_id'] == $this->request->getVar('kepala_keluarga')) {
                $rule_kepala_keluarga = 'required';
            } else {
                $rule_kepala_keluarga = 'required|is_unique[kartu_keluarga.user_id]';
            }

            // Validasi
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'no_kk'  => [
                    'label' => 'Nomor KK',
                    'rules' => $rule_no_kk,
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 16 digit',
                        'max_length' => '{field} maximal 16 digit',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'kepala_keluarga'  => [
                    'label' => 'Kepala Keluarga',
                    'rules' => $rule_kepala_keluarga,
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'agama'  => [
                    'label' => 'Agama',
                    'rules' => 'required',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                    ]
                ],
                'jenis_kelamin' => [
                    'rules' => 'required',
                    'errors' => 'Jenis Kelamin harus dipilih'
                ],
                'pekerjaan'  => [
                    'label' => 'Nama Pekerjaan',
                    'rules' => 'required|min_length[5]|max_length[50]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 5 karakter',
                        'max_length' => '{field} maximal 50 karakter',
                    ]
                ]
            ]);

            // jika tidak valid (Ada yg salah)
            if (!$valid) {
                $msg = [
                    'error' => [
                        'no_kk'  => $validation->getError('no_kk'),
                        'kepala_keluarga'  => $validation->getError('kepala_keluarga'),
                        'agama'  => $validation->getError('agama'),
                        'pekerjaan'  => $validation->getError('pekerjaan'),
                    ]
                ];
            } else {
                $data = [
                    'id_kk' =>  $id_kk,
                    'no_kk' =>  $this->request->getVar('no_kk'),
                    'user_id' =>  $this->request->getVar('kepala_keluarga'),
                    'agama' =>  $this->request->getVar('agama'),
                    'jenis_kelamin' =>  ucwords($this->request->getVar('jenis_kelamin')),
                    'pekerjaan' =>  ucwords($this->request->getVar('pekerjaan')),
                ];

                $this->kkModel->update($id_kk, $data);
                $msg = ['sukses' => 'Kartu Keluarga berhasil diupdate'];
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
            $id_kk = $this->request->getVar('id_kk');
            $this->kkModel->delete($id_kk);

            $msg = ['sukses' => "Kartu Keluarga berhasil dihapus"];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }
}
