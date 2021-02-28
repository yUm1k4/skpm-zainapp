<?php

namespace App\Controllers;

use App\Models\SettingModel;

class Setting extends BaseController
{
    public function __construct()
    {
        $this->setting = new SettingModel;
    }

    public function index()
    {
        $data['title'] = 'Settings';

        return view('setting/index', $data);
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $row = $this->setting->where('id_setting', 1)->get()->getRowArray();
            $data = [
                // personal web
                'id_setting'        => $row['id_setting'],
                'nama_app_front'    => $row['nama_aplikasi_frontend'],
                'nama_app_back'     => $row['nama_aplikasi_backend'],
                'no_hp'             => $row['nohp_setting'],
                'email'             => $row['email_setting'],
                'alamat'            => $row['alamat_setting'],
                'map_link'          => $row['map_link'],
                'footer_frontend'   => $row['footer_frontend'],
                'footer_backend'    => $row['footer_backend'],
                // link cepat
                'lc_1_nama'         => $row['lc_1_nama'],
                'lc_1_url'          => $row['lc_1_url'],
                'lc_2_nama'         => $row['lc_2_nama'],
                'lc_2_url'          => $row['lc_2_url'],
                'lc_3_nama'         => $row['lc_3_nama'],
                'lc_3_url'          => $row['lc_3_url'],
                'lc_4_nama'         => $row['lc_4_nama'],
                'lc_4_url'          => $row['lc_4_url'],
                'lc_5_nama'         => $row['lc_5_nama'],
                'lc_5_url'          => $row['lc_5_url'],
                // social media
                'somed_1_font'      => $row['somed_1_font'],
                'somed_1_url'       => $row['somed_1_url'],
                'somed_2_font'      => $row['somed_2_font'],
                'somed_2_url'       => $row['somed_2_url'],
                'somed_3_font'      => $row['somed_3_font'],
                'somed_3_url'       => $row['somed_3_url'],
                'somed_4_font'      => $row['somed_4_font'],
                'somed_4_url'       => $row['somed_4_url'],
                'somed_5_font'      => $row['somed_5_font'],
                'somed_5_url'       => $row['somed_5_url']
            ];

            $msg = [
                'data' => view('setting/content', $data)
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $rules = [
                'nama_app_front'  => [
                    'label' => 'Nama Web Frontend',
                    'rules' => 'required|min_length[4]|max_length[15]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 15 karakter',
                    ]
                ],
                'nama_app_back'  => [
                    'label' => 'Nama Web Backend',
                    'rules' => 'required|min_length[4]|max_length[15]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 15 karakter',
                    ]
                ],
                'no_hp'  => [
                    'label' => 'Nomor Hp',
                    'rules' => 'required|min_length[10]|max_length[15]|numeric',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 15 karakter',
                        'numeric'   => '{field} harus berupa nomor'
                    ]
                ],
                'email'  => [
                    'label' => 'Email',
                    'rules' => 'required|min_length[10]|max_length[100]|valid_email',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 100 karakter',
                        'valid_email'   => '{field} tidak valid'
                    ]
                ],
                'alamat'  => [
                    'label' => 'Alamat',
                    'rules' => 'required|min_length[25]|max_length[50]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 50 karakter',
                    ]
                ],
                'map_link'  => [
                    'label' => 'Google Map Link',
                    'rules' => 'required|min_length[20]|max_length[500]|valid_url',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 500 karakter',
                        'valid_url'   => '{field} tidak valid'
                    ]
                ],
                'footer_frontend'  => [
                    'label' => 'Footer Frontend',
                    'rules' => 'required|min_length[50]|max_length[500]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 500 karakter',
                    ]
                ],
                'footer_backend'  => [
                    'label' => 'Footer Backend',
                    'rules' => 'required|min_length[50]|max_length[500]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 500 karakter',
                    ]
                ],
                'somed_1_font'  => [
                    'label' => 'Icon',
                    'rules' => 'required|min_length[5]|max_length[20]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 20 karakter',
                    ]
                ],
                'somed_2_font'  => [
                    'label' => 'Icon',
                    'rules' => 'required|min_length[5]|max_length[20]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 20 karakter',
                    ]
                ],
                'somed_3_font'  => [
                    'label' => 'Icon',
                    'rules' => 'required|min_length[5]|max_length[20]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 20 karakter',
                    ]
                ],
                'somed_4_font'  => [
                    'label' => 'Icon',
                    'rules' => 'max_length[20]',
                    'errors' => [
                        'max_length' => '{field} terlalu panjang, maximal 20 karakter',
                    ]
                ],
                'somed_5_font'  => [
                    'label' => 'Icon',
                    'rules' => 'max_length[20]',
                    'errors' => [
                        'max_length' => '{field} terlalu panjang, maximal 20 karakter',
                    ]
                ],
                'somed_1_url'  => [
                    'label' => 'Url',
                    'rules' => 'required|min_length[5]|max_length[100]|valid_url',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 100 karakter',
                        'valid_url' => '{field} tidak valid'
                    ]
                ],
                'somed_2_url'  => [
                    'label' => 'Url',
                    'rules' => 'required|min_length[5]|max_length[100]|valid_url',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 100 karakter',
                        'valid_url' => '{field} tidak valid'
                    ]
                ],
                'somed_3_url'  => [
                    'label' => 'Url',
                    'rules' => 'required|min_length[5]|max_length[100]|valid_url',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 100 karakter',
                        'valid_url' => '{field} tidak valid'
                    ]
                ],
                'somed_4_url'  => [
                    'label' => 'Url',
                    'rules' => 'max_length[100]',
                    'errors' => [
                        'max_length' => '{field} terlalu panjang, maximal 100 karakter'
                    ]
                ],
                'somed_5_url'  => [
                    'label' => 'Url',
                    'rules' => 'max_length[100]',
                    'errors' => [
                        'max_length' => '{field} terlalu panjang, maximal 100 karakter'
                    ]
                ],
                'lc_1_nama'  => [
                    'label' => 'Nama',
                    'rules' => 'required|min_length[3]|max_length[20]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 20 karakter'
                    ]
                ],
                'lc_2_nama'  => [
                    'label' => 'Nama',
                    'rules' => 'required|min_length[3]|max_length[20]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 20 karakter'
                    ]
                ],
                'lc_3_nama'  => [
                    'label' => 'Nama',
                    'rules' => 'required|min_length[3]|max_length[20]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 20 karakter'
                    ]
                ],
                'lc_4_nama'  => [
                    'label' => 'Nama',
                    'rules' => 'max_length[20]',
                    'errors' => [
                        'max_length' => '{field} terlalu panjang, maximal 20 karakter'
                    ]
                ],
                'lc_5_nama'  => [
                    'label' => 'Nama',
                    'rules' => 'max_length[20]',
                    'errors' => [
                        'max_length' => '{field} terlalu panjang, maximal 20 karakter'
                    ]
                ],
                'lc_1_url'  => [
                    'label' => 'Url',
                    'rules' => 'required|min_length[1]|max_length[50]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 50 karakter'
                    ]
                ],
                'lc_2_url'  => [
                    'label' => 'Url',
                    'rules' => 'required|min_length[1]|max_length[50]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 50 karakter'
                    ]
                ],
                'lc_3_url'  => [
                    'label' => 'Url',
                    'rules' => 'required|min_length[1]|max_length[50]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang, maximal 50 karakter'
                    ]
                ],
                'lc_4_url'  => [
                    'label' => 'Url',
                    'rules' => 'max_length[50]',
                    'errors' => [
                        'max_length' => '{field} terlalu panjang, maximal 50 karakter'
                    ]
                ],
                'lc_5_url'  => [
                    'label' => 'Url',
                    'rules' => 'max_length[50]',
                    'errors' => [
                        'max_length' => '{field} terlalu panjang, maximal 50 karakter'
                    ]
                ],
            ];

            // jika tidak valid (Ada yg salah)
            if (!$this->validate($rules)) {
                $msg = [
                    'error' => [
                        'nama_app_front'    => $validation->getError('nama_app_front'),
                        'nama_app_back'     => $validation->getError('nama_app_back'),
                        'noh_hp'            => $validation->getError('noh_hp'),
                        'email'             => $validation->getError('email'),
                        'alamat'            => $validation->getError('alamat'),
                        'map_link'          => $validation->getError('map_link'),
                        'footer_frontend'   => $validation->getError('footer_frontend'),
                        'footer_backend'    => $validation->getError('footer_backend'),
                        'lc_1_nama'         => $validation->getError('lc_1_nama'),
                        'lc_2_nama'         => $validation->getError('lc_2_nama'),
                        'lc_3_nama'         => $validation->getError('lc_3_nama'),
                        'lc_4_nama'         => $validation->getError('lc_4_nama'),
                        'lc_5_nama'         => $validation->getError('lc_5_nama'),
                        'lc_1_url'          => $validation->getError('lc_1_url'),
                        'lc_3_url'          => $validation->getError('lc_3_url'),
                        'lc_2_url'          => $validation->getError('lc_2_url'),
                        'lc_4_url'          => $validation->getError('lc_4_url'),
                        'lc_5_url'          => $validation->getError('lc_5_url'),
                        'somed_1_font'      => $validation->getError('somed_1_font'),
                        'somed_2_font'      => $validation->getError('somed_2_font'),
                        'somed_3_font'      => $validation->getError('somed_3_font'),
                        'somed_4_font'      => $validation->getError('somed_4_font'),
                        'somed_5_font'      => $validation->getError('somed_5_font'),
                        'somed_1_url'      => $validation->getError('somed_1_url'),
                        'somed_2_url'      => $validation->getError('somed_2_url'),
                        'somed_3_url'      => $validation->getError('somed_3_url'),
                        'somed_4_url'      => $validation->getError('somed_4_url'),
                        'somed_5_url'      => $validation->getError('somed_5_url'),
                    ]
                ];
            } else {

                $id = $this->request->getVar('id_setting');
                $data = [
                    'id_setting'        =>  $id,
                    'nama_aplikasi_frontend'    => $this->request->getVar('nama_app_front'),
                    'nama_aplikasi_backend'     => $this->request->getVar('nama_app_back'),
                    'nohp_setting'              => $this->request->getVar('no_hp'),
                    'email_setting'             => $this->request->getVar('email'),
                    'alamat_setting'            => $this->request->getVar('alamat'),
                    'map_link'          => $this->request->getVar('map_link'),
                    'footer_frontend'   => $this->request->getVar('footer_frontend'),
                    'footer_backend'    => $this->request->getVar('footer_backend'),
                    // link cepat
                    'lc_1_nama'         => $this->request->getVar('lc_1_nama'),
                    'lc_1_url'          => $this->request->getVar('lc_1_url'),
                    'lc_2_nama'         => $this->request->getVar('lc_2_nama'),
                    'lc_2_url'          => $this->request->getVar('lc_2_url'),
                    'lc_3_nama'         => $this->request->getVar('lc_3_nama'),
                    'lc_3_url'          => $this->request->getVar('lc_3_url'),
                    'lc_4_nama'         => $this->request->getVar('lc_4_nama'),
                    'lc_4_url'          => $this->request->getVar('lc_4_url'),
                    'lc_5_nama'         => $this->request->getVar('lc_5_nama'),
                    'lc_5_url'          => $this->request->getVar('lc_5_url'),
                    // social media
                    'somed_1_font'      => $this->request->getVar('somed_1_font'),
                    'somed_1_url'       => $this->request->getVar('somed_1_url'),
                    'somed_2_font'      => $this->request->getVar('somed_2_font'),
                    'somed_2_url'       => $this->request->getVar('somed_2_url'),
                    'somed_3_font'      => $this->request->getVar('somed_3_font'),
                    'somed_3_url'       => $this->request->getVar('somed_3_url'),
                    'somed_4_font'      => $this->request->getVar('somed_4_font'),
                    'somed_4_url'       => $this->request->getVar('somed_4_url'),
                    'somed_5_font'      => $this->request->getVar('somed_5_font'),
                    'somed_5_url'       => $this->request->getVar('somed_5_url')
                ];

                $this->setting->update($id, $data);
                $msg = ['sukses' => 'Setting berhasil diupdate'];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }
}
