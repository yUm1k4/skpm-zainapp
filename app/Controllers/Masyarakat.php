<?php

namespace App\Controllers;

use App\Models\MasyarakatModel;
use App\Models\MyUserModel;
use App\Models\PengaduanModel;
use App\Models\KartuKeluargaModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;

class Masyarakat extends BaseController
{
    public function __construct()
    {
        $this->userModel = new MyUserModel;
        $this->mythUserModel = new UserModel;
        $this->masyarakatModel = new MasyarakatModel;
        $this->pengaduanModel = new PengaduanModel;
        $this->kkModel = new KartuKeluargaModel;
        $this->config = config('Auth');
    }

    public function index()
    {
        $data['title'] = 'Data Masyarakat';

        $this->userModel->select('users.id as userid, username, email, fullname, nik, user_image, no_hp, alamat, name, status');
        $this->userModel->join('auth_groups_users agu', 'agu.user_id = users.id');
        $this->userModel->join('auth_groups ag', 'ag.id = agu.group_id');
        $this->userModel->where('ag.id =', 3);
        $this->userModel->orderBy('fullname', 'ASC');
        // $this->userModel->groupBy('group_id');
        $query = $this->userModel->get();

        $data['masyarakat'] = $query->getResult();

        return view('masyarakat/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Masyarakat',
            'validation' => \Config\Services::validation()
        ];

        return view('masyarakat/create', $data);
    }

    public function save()
    {
        // validasi input
        $rules = [
            'username' => [
                'rules' => 'required|alpha_numeric|min_length[3]|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus di isi',
                    'alpha_numeric' => 'Username tidak boleh spesial',
                    'min_length' => 'Username minimal 3 karakter',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email harus di isi',
                    'valid_email' => 'Email tidak valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required|strong_password',
                'errors' => [
                    'required' => 'Password harus di isi',
                    'strong_password' => 'Password terlalu mudah',
                ]
            ],
            'pass_confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Repeat Password harus di isi',
                    'matches' => 'Password tidak sesuai',
                ]
            ],
            'nik' => [
                'rules' => 'required|numeric|min_length[16]|max_length[16]|is_unique[users.nik]',
                'errors' => [
                    'required' => 'NIK harus di isi',
                    'numeric' => 'NIK harus angka',
                    'min_length' => 'NIK harus 16 digit',
                    'max_length' => 'NIK harus 16 digit',
                    'is_unique' => 'NIK sudah terdaftar'
                ]
            ],
            'fullname' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama harus di isi',
                    'alpha_space' => 'Nama tidak boleh spesial'
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric|min_length[11]|max_length[13]',
                'errors' => [
                    'required' => 'No HP harus di isi',
                    'numeric' => 'No HP harus angka',
                    'min_length' => 'No HP terlalu pendek',
                    'max_length' => 'No HP terlalu panjang'
                ]
            ],
            'alamat' => [
                'rules' => 'required|min_length[20]',
                'errors' => [
                    'required' => 'Alamat harus di isi',
                    'min_length' => 'Alamat kurang lengkap'
                ]
            ]
        ];

        // jika tdk tervalidasi, kembalikan dan tampilkan errors
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        // Save data user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);

        $user = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation !== false ? $user->generateActivateHash() : $user->activate();

        // Pastikan user masuk default group
        if (!empty($this->config->defaultUserGroup)) {
            $users = $this->mythUserModel->withGroup($this->config->defaultUserGroup);
        }

        // jika uset tdk tersave tampilkan error
        if (!$users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // Jika berhasil tersimpan tampilkan pesan success
        if ($user) {
            session()->setFlashdata('message', 'Data berhasil ditambahkan');
            return redirect()->route('masyarakat');
        }
    }

    public function detail($username)
    {
        $pengaduan = $this->pengaduanModel->cariBerdasarNikUsername($username)->get()->getResultArray();
        $masyarakat = $this->userModel->getDetailMasyarakat($username);
        $kk = $this->kkModel->dataNIK($masyarakat['userid']);
        $keluarga = $this->kkModel->getDetailKK($kk['no_kk']);
        // dd($kk);
        $data = [
            'title'         => 'Detail Masyarakat ' . $masyarakat['fullname'],
            'masyarakat'    => $masyarakat,
            'pengaduan'     => $pengaduan,
            'kk'            => $kk,
            'keluarga'      => $keluarga,
            'totalPengaduan'    => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $masyarakat['user_id'])->countAllResults(),
            'pengaduanProses'   => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $masyarakat['user_id'])->where('status', 'proses')->countAllResults(),
            'pengaduanPending'  => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $masyarakat['user_id'])->where('status', 'pending')->countAllResults(),
            'pengaduanArsip'    => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $masyarakat['user_id'])->where('status', 'arsip')->countAllResults(),
            'pengaduanSelesai'  => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $masyarakat['user_id'])->where('status', 'selesai')->countAllResults()
        ];

        return view('masyarakat/detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Data Masyarakat',
            'masyarakat'    => $this->userModel->getId('3', $id)
        ];
        return view('masyarakat/edit', $data);
    }

    public function update($id)
    {
        $data_lama = $this->userModel->getId('3', $id);

        // validasi untuk field" yg unique
        // jika username yg lama sama dengan username yg baru (artinya tdk diubah)
        if ($data_lama['0']->username == $this->request->getVar('username')) {
            // wajib di isi
            $rule_username = 'required|alpha_numeric|min_length[3]';
        } else {
            // sedangkan kalo beda, harus unique, artinya tidak ada yg sama dengan username lain selain username sebelumnya
            $rule_username = 'required|alpha_numeric|min_length[3]|is_unique[users.username]';
        }
        if ($data_lama['0']->email == $this->request->getVar('email')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|valid_email|is_unique[users.email]';
        }
        if ($data_lama['0']->nik == $this->request->getVar('nik')) {
            $rule_nik = 'required|numeric|min_length[16]|max_length[16]';
        } else {
            $rule_nik = 'required|numeric|min_length[16]|max_length[16]|is_unique[users.nik]';
        }

        // validasi input
        $rules = [
            'username'  => [
                'rules'     => $rule_username,
                'errors'     => [
                    'required'        => 'Username harus di isi',
                    'alpha_numeric' => 'Username tidak boleh spesial',
                    'min_length'    => 'Username minimal 3 karakter',
                    'is_unique'        => 'Username sudah terdaftar'
                ]
            ],
            'email'        => [
                'rules'     => $rule_email,
                'errors'    => [
                    'required'        => 'Email harus di isi',
                    'valid_email'     => 'Email tidak valid',
                    'is_unique'        => 'Email sudah terdaftar'
                ]
            ],
            'nik'        => [
                'rules'     => $rule_nik,
                'errors'    => [
                    'required'        => 'NIK harus di isi',
                    'numeric'        => 'NIK harus angka',
                    'min_length'    => 'NIK harus 16 digit',
                    'max_length'    => 'NIK harus 16 digit',
                    'is_unique'        => 'NIK sudah terdaftar'
                ]
            ],
            'fullname'    => [
                'rules'     => 'required|alpha_space',
                'errors'    => [
                    'required'        => 'Nama harus di isi',
                    'alpha_space'    => 'Nama tidak boleh spesial'
                ]
            ],
            'no_hp'        => [
                'rules'     => 'required|numeric|min_length[11]|max_length[13]',
                'errors'    => [
                    'required'      => 'No HP harus di isi',
                    'numeric'       => 'No HP harus angka',
                    'min_length'    => 'No HP terlalu pendek',
                    'max_length'    => 'No HP terlalu panjang'
                ]
            ],
            'alamat'        => [
                'rules'     => 'required|min_length[20]',
                'errors'    => [
                    'required'      => 'Alamat harus di isi',
                    'min_length'    => 'Alamat kurang lengkap'
                ]
            ],
            'user_image' => [
                'rules' => 'max_size[user_image,1024]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto hanya boleh 1MB',
                    'is_image' => 'Oops.. yang Anda pilih bukan gambar',
                    'mime_in' => 'Oops.. yang Anda pilih bukan gambar'
                ]
            ]
        ];

        // jika tdk tervalidasi, kembalikan dan tampilkan errors
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        // jika validasi berhasil, kelola file gambar yg baru
        $fileProfil = $this->request->getFile('user_image');
        $fileLama = $this->request->getVar('profilLama');

        // cek profil, jika profil lama :
        if ($fileProfil->getError() == 4) {
            // pakai yang sebelumnya
            $namaProfil = $this->request->getVar('profilLama');
            // jika upload profil baru :
        } else {
            // generate nama file random
            $namaProfil = $fileProfil->getRandomName();
            // pindahkan profil
            $fileProfil->move('images/user-images', $namaProfil);
            // jika fileLama itu masih default
            if ($fileLama != "") {
                // hapus file lama 
                unlink('images/user-images/' . $fileLama);
            }
        }

        $this->masyarakatModel->save([
            'id'        => $id,
            'username'  => $this->request->getVar('username'),
            'email'     => $this->request->getVar('email'),
            'nik'       => $this->request->getVar('nik'),
            'fullname'  => ucwords($this->request->getVar('fullname')),
            'no_hp'     => ucfirst($this->request->getVar('no_hp')),
            'alamat'    => $this->request->getVar('alamat'),
            'user_image' => $namaProfil
        ]);

        // $this->userModel->update($id, $data);
        session()->setFlashdata('message', 'Data berhasil diubah');
        return redirect()->to(base_url('/masyarakat'));
    }


    public function delete($id)
    {
        // cari file berdasarkan id
        $masyarakat = $this->masyarakatModel->where('id', $id)->get()->getResultArray();
        // dd($masyarakat);

        // jika file nya bukan bukan null
        if ($masyarakat[0]['user_image'] != NULL) {
            unlink('images/user-images/' . $masyarakat[0]['user_image']);
        }

        $this->userModel->delete($id);
        session()->setFlashdata('message', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/masyarakat'));
    }

    public function bannedForm()
    {
        if ($this->request->isAJAX()) {
            $user_id = $this->request->getVar('userid');
            $row = $this->masyarakatModel->find($user_id);
            // dd($row);

            $data = [
                'user_id' => $row['id'],
                'alasan' => $row['status_message'],
            ];

            $msg = [
                'sukses' => view('masyarakat/modalBanned', $data)
            ];

            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function banned()
    {
        if ($this->request->isAJAX()) {
            $rules = [
                'alasan'  => [
                    'label' => 'Alasan',
                    'rules' => 'required|min_length[10]|max_length[200]',
                    'errors' => [
                        'required'  => '{field} tidak boleh kosong',
                        'min_length' => '{field} minimal 10 karakter',
                        'max_length' => '{field} maximal 200 karakter',
                    ]
                ]
            ];

            // jika tidak valid (Ada yg salah)
            if (!$this->validate($rules)) {
                $msg = [
                    'error' => [
                        'alasan'  => $this->validator->getError('alasan')
                    ]
                ];
            } else {
                $user_id = $this->request->getVar('user_id');
                $data = [
                    'id'                =>  $user_id,
                    'status'            => 'banned',
                    'status_message'    =>  $this->request->getVar('alasan'),
                ];

                $this->masyarakatModel->update($user_id, $data);
                $msg = ['sukses' => 'User berhasil dibanned!'];
            }
            echo json_encode($msg);
        } else {
            session()->setFlashdata('error', 'Maaf tidak dapat diproses');
            return redirect()->back();
        }
    }

    public function unban($user_id)
    {
        if ($user_id != null) {
            $save = [
                'status'    => 'unban',
                'status_message' => null
            ];
            $this->masyarakatModel->update($user_id, $save);
            session()->setFlashdata('message', 'User berhasil diunbanned!');
        } else {
            session()->setFlashdata('error', 'Maaf user tidak ada');
        }
        return redirect()->back();
    }
}
