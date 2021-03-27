<?php

namespace App\Controllers;

use App\Models\MyUserModel;
use App\Models\KartuKeluargaModel;
use App\Models\MasyarakatModel;
use App\Models\RukunWargaModel;
use App\Models\RukunTetanggaModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;

class KartuKeluarga extends BaseController
{
    public function __construct()
    {
        $this->kkModel = new KartuKeluargaModel;
        $this->rwModel = new RukunWargaModel;
        $this->rtModel = new RukunTetanggaModel;
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
                'tampildata'    => $this->kkModel->getKepalaKeluarga()
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
            // $rt_id = $this->request->getVar('rt_id');
            // $msg = [
            //     'rt_id' => $rt_id,
            // ];
            // return json_encode($msg);
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
                    'no_kk'         =>  $this->request->getVar('no_kk'),
                    'user_id'       =>  $this->request->getVar('kepala_keluarga'),
                    'rw_id'         =>  $this->request->getVar('rw_id'),
                    'rt_id'         =>  $this->request->getVar('rt_id'),
                    'jenis_kelamin' =>  $this->request->getVar('jenis_kelamin'),
                    'agama'         =>  $this->request->getVar('agama'),
                    'pekerjaan'     =>  $this->request->getVar('pekerjaan'),
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

        $keluarga = $this->kkModel->findAll();

        foreach ($keluarga as $k) {
            $userTerdaftar[] = $k['user_id'];
        }

        if (!isset($postData['searchTerm'])) {
            // Fetch record
            // hanya menampilkan user masyarakat(ag.id = 3), dan juga dimana bukan user yang sudah terdaftar di tbl kartu_keluarga
            $userlist = $this->masyarakatModel->select('*, users.id as userid')
                ->join('auth_groups_users agu', 'agu.user_id = users.id')
                ->join('auth_groups ag', 'ag.id = agu.group_id')
                ->where('ag.id', 3)
                ->whereNotIn('users.id', $userTerdaftar)
                ->orderBy('users.nik')
                ->findAll(20);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record
            $userlist = $this->masyarakatModel->select('*, users.id as userid')
                ->join('auth_groups_users agu', 'agu.user_id = users.id')
                ->join('auth_groups ag', 'ag.id = agu.group_id')
                ->where('ag.id', 3)
                ->whereNotIn('users.id', $userTerdaftar)
                ->like('users.nik', $searchTerm)
                ->orderBy('users.nik')
                ->findAll(10);
            // ->findAll();
        }
        $data = array();
        foreach ($userlist as $user) {
            $data[] = array(
                "id" => $user['userid'],
                "text" => $user['nik'] . ' - ' . $user['fullname'],
            );
        }

        $response['data'] = $data;
        return $this->response->setJSON($response);
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

    public function getRT()
    {
        $rw_id = $this->request->getPost('id');
        $userlist = $this->rtModel->getDynamicDataRT($rw_id);
        $output = '<option value="0" disabled>Cari Nomor RT</option>';
        // $output = array();

        if ($userlist) {
            foreach ($userlist as $row) {
                $output .= '<option value="' . $row['id_rt'] . '">RT: ' . $row['no_rt'] . ' - ' . $row['nama_rt'] . '</option>';
            }
        } else {
            $output .= '<option value="kosong">Belum ada RT</option>';
        }

        $response['data'] = $output;
        return $this->response->setJSON($response);
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $id_kk = $this->request->getVar('id_kk');
            $row = $this->kkModel->find($id_kk);

            $dataNIK = $this->kkModel->editDataNIK($row['user_id']);
            $kepalaText = $dataNIK['nik'] . ' - ' . $dataNIK['fullname'];

            $dataRW = $this->kkModel->editDataRW($row['rw_id']);
            $rwText = 'RW: ' . $dataRW['no_rw'] . ' - ' . $dataRW['nama_rw'];

            $dataRT = $this->kkModel->editDataRT($row['rt_id']);
            $rtText = 'Rt: ' . $dataRT['no_rt'] . ' - ' . $dataRT['nama_rt'];

            $data = [
                'id_kk'         => $id_kk,
                'no_kk'         => $row['no_kk'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'pekerjaan'     => $row['pekerjaan'],
                'agama'         => $row['agama'],
            ];

            $msg = [
                'sukses'        => view('kk/modalEdit', $data),
                'kepalaId'      => $dataNIK['user_id'],
                'kepalaText'    => $kepalaText,
                'rwId'          => $dataRW['rw_id'],
                'rwText'        => $rwText,
                'rtId'          => $dataRT['rt_id'],
                'rtText'        => $rtText,
                // 'agamaText' => $data['agama'],
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
            if ($row['rw_id'] == $this->request->getVar('rw_id')) {
                $rule_rw = 'required';
            } else {
                $rule_rw = 'required|is_unique[kartu_keluarga.rw_id]';
            }
            if ($row['rt_id'] == $this->request->getVar('rt_id')) {
                $rule_rt = 'required';
            } else {
                $rule_rt = 'required|is_unique[kartu_keluarga.rt_id]';
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
                'rw_id'  => [
                    'label' => 'Rukun Warga',
                    'rules' => $rule_rw,
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'rt_id'  => [
                    'label' => 'Rukun Tetangga',
                    'rules' => $rule_rt,
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
                        'rw_id'  => $validation->getError('rw_id'),
                        'rt_id'  => $validation->getError('rt_id'),
                        'agama'  => $validation->getError('agama'),
                        'pekerjaan'  => $validation->getError('pekerjaan'),
                        'jenis_kelamin'  => $validation->getError('jenis_kelamin'),
                    ]
                ];
            } else {
                $data = [
                    'id_kk'     =>  $id_kk,
                    'no_kk'     =>  $this->request->getVar('no_kk'),
                    'user_id'   =>  $this->request->getVar('kepala_keluarga'),
                    'rw_id'     =>  $this->request->getVar('rw_id'),
                    'rt_id'     =>  $this->request->getVar('rt_id'),
                    'agama'     =>  $this->request->getVar('agama'),
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
            $no_kk = $this->request->getVar('no_kk');
            $this->kkModel->where('no_kk', $no_kk)->delete();

            $msg = ['sukses' => "Kartu Keluarga beserta Anggota Keluarga nya berhasil dihapus"];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    /*
    * #
    * ########### Detail Kartu Keluarga start
    * #
    */

    public function detailFormKK($no_kk)
    {
        $result = $this->kkModel->getDetailKK($no_kk);
        // dd($result);
        $data = [
            'title' => 'Detail Kartu Keluarga No ' . $no_kk,
            'no_kk' => $no_kk,
            'no_rt' => $result[0]['no_rt'],
            'no_rw' => $result[0]['no_rw'],
        ];

        return view('kk/formDetail', $data);
    }

    public function tblDetailKK()
    {
        if ($this->request->isAJAX()) {
            $no_kk = $this->request->getVar('no_kk');

            $result = $this->kkModel->getDetailKK($no_kk);

            $data = [
                'detaildata'    => $result
            ];

            $msg = [
                'data' => view('kk/detailPage', $data)
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function formTambahDetail()
    {
        if ($this->request->isAJAX()) {
            $no_kk = $this->request->getVar('no_kk');
            $result = $this->kkModel->getDetailKK($no_kk);

            $data = [
                'no_kk' => $no_kk,
                'rw_id' => $result[0]['rw_id'],
                'rt_id' => $result[0]['rt_id'],
            ];
            $msg = [
                'data' => view('kk/modalTambahDetail', $data)
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function simpanDataDetail()
    {
        if ($this->request->isAJAX()) {
            $no_kk = $this->request->getVar('no_kk');
            // Validasi
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'no_kk' => [
                    'label' => 'No Kepala Keluarga',
                    'rules' => 'required|min_length[16]|max_length[16]|numeric',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} harus 16 digit',
                        'max_length' => '{field} harus 16 digit',
                    ]
                ],
                'anggota_keluarga' => [
                    'rules' => 'required|is_unique[kartu_keluarga.user_id]',
                    'errors' => [
                        'required' => 'Anggota Keluarga tidak boleh kosong',
                        'is_unique' => 'Anggota Keluarga sudah terdaftar di KK ini atau yang lain'
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
                'status' => [
                    'rules' => 'required',
                    'errors' => 'Status harus dipilih'
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
                        'anggota_keluarga'  => $validation->getError('anggota_keluarga'),
                        'jenis_kelamin'  => $validation->getError('jenis_kelamin'),
                        'agama'  => $validation->getError('agama'),
                        'status'  => $validation->getError('status'),
                        'pekerjaan'  => $validation->getError('pekerjaan'),
                    ]
                ];
            } else {
                // jika validasi sukses (benar)
                $simpandata = [
                    'no_kk' =>  $no_kk,
                    'user_id' =>  $this->request->getVar('anggota_keluarga'),
                    'rw_id' =>  $this->request->getVar('rw_id'),
                    'rt_id' =>  $this->request->getVar('rt_id'),
                    'jenis_kelamin' =>  $this->request->getVar('jenis_kelamin'),
                    'agama' =>  $this->request->getVar('agama'),
                    'pekerjaan' =>  $this->request->getVar('pekerjaan'),
                    'status_hubungan' => $this->request->getVar('status'),
                ];
                $this->kkModel->where('no_kk', $no_kk)->save($simpandata);
                $msg = [
                    'sukses' => 'Anggota Keluarga baru berhasil ditambahkan',
                ];
            }
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function formEditDetail()
    {
        if ($this->request->isAJAX()) {
            $id_kk = $this->request->getVar('id_kk');
            $row = $this->kkModel->find($id_kk);

            $dataNIK = $this->kkModel->editDataNIK($row['user_id']);
            $anggotaText = $dataNIK['nik'] . ' - ' . $dataNIK['fullname'];

            $data = [
                'id_kk'         => $id_kk,
                'no_kk'         => $row['no_kk'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'pekerjaan'     => $row['pekerjaan'],
                'agama'         => $row['agama'],
                'status'        => $row['status_hubungan'],
            ];

            $msg = [
                'sukses'    => view('kk/modalEditDetail', $data),
                'anggotaId'  => $dataNIK['user_id'],
                'anggotaText' => $anggotaText,
            ];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function updateDataDetail()
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
            if ($row['user_id'] == $this->request->getVar('anggota_keluarga')) {
                $rule_anggota_keluarga = 'required';
            } else {
                $rule_anggota_keluarga = 'required|is_unique[kartu_keluarga.user_id]';
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
                'anggota_keluarga'  => [
                    'label' => 'Anggota Keluarga',
                    'rules' => $rule_anggota_keluarga,
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
                'status' => [
                    'rules' => 'required',
                    'errors' => 'Status Hubungan harus dipilih'
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
                        'anggota_keluarga'  => $validation->getError('anggota_keluarga'),
                        'agama'  => $validation->getError('agama'),
                        'pekerjaan'  => $validation->getError('pekerjaan'),
                        'status'  => $validation->getError('status'),
                        'jenis_kelamin'  => $validation->getError('jenis_kelamin'),
                    ]
                ];
            } else {
                $data = [
                    'id_kk' =>  $id_kk,
                    'no_kk' =>  $this->request->getVar('no_kk'),
                    'user_id' =>  $this->request->getVar('anggota_keluarga'),
                    'agama' =>  $this->request->getVar('agama'),
                    'jenis_kelamin' =>  ucwords($this->request->getVar('jenis_kelamin')),
                    'pekerjaan' =>  ucwords($this->request->getVar('pekerjaan')),
                    'status_hubungan' =>  ucwords($this->request->getVar('status')),
                ];

                $this->kkModel->update($id_kk, $data);
                $msg = ['sukses' => 'Anggota Keluarga berhasil diupdate'];
            }
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function hapusDetailKK()
    {
        if ($this->request->isAJAX()) {
            $id_kk = $this->request->getVar('id_kk');
            $this->kkModel->delete($id_kk);

            $msg = ['sukses' => "Anggota Keluarga berhasil dihapus"];
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    /*
    * ####### Detail Kartu Keluarga end
    */
}
