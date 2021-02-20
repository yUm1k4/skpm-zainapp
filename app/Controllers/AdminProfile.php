<?php

namespace App\Controllers;

use App\Models\MyUserModel;
use Myth\Auth\Entities\User;

class AdminProfile extends BaseController
{
    protected $auth;
    /**
     * @var Auth
     */
    protected $config;

    /**
     * @var \CodeIgniter\Session\Session
     */
    protected $session;

    public function __construct()
    {
        $this->userModel = new MyUserModel;
        $this->config = config('Auth');
    }

    public function index($id)
    {
        $fullname = user()->fullname;
        $data = [
            'title' => "Admin Profile $fullname ",
            'admin'  => $this->userModel->getId('1', $id)
        ];
        return view('profile/admin/index', $data);
    }

    public function updateFoto($id)
    {
        $rules = [
            'user_image' => [
                'rules' => 'max_size[user_image,1024]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto hanya boleh 1MB',
                    'is_image' => 'Oops.. yang Anda pilih bukan gambar',
                    'mime_in' => 'Oops.. yang Anda pilih bukan gambar'
                ]
            ]
        ];
        // jika tdk tervalidasi, kembalikan dan tampilkan error
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        // jika validasi berhasil, kelola file gambar yg baru
        $fileProfil = $this->request->getFile('user_image');
        $fileLama = $this->request->getVar('profilLama');
        // dd($fileLama);

        // cek profil, jika profil lama :
        if ($fileProfil->getError() == 4) {
            // pakai yang sebelumnya
            $namaProfil = $this->request->getVar('profilLama');
            // dd($namaProfil);
            // jika upload profil baru :
        } else {
            // generate nama file random
            $namaProfil = $fileProfil->getRandomName();
            // pindahkan profil
            $fileProfil->move('images/admin-images', $namaProfil);

            // jika fileLama itu masih default
            if ($fileLama != "") {
                // hapus file lama 
                unlink('images/admin-images/' . $fileLama);
            }
        }

        $save = [
            'id'        => $id,
            'user_image' => $namaProfil
        ];
        // dd($save);
        $this->userModel->save($save);

        if ($save) {
            session()->setFlashdata('message', 'Foto profil berhasil diubah');
            return redirect()->back();
        }
    }

    public function update($id)
    {
        $data_lama = $this->userModel->getId('1', $id);

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
            ]
        ];

        // jika tdk tervalidasi, kembalikan dan tampilkan errors
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        $save = [
            'id'        => $id,
            'username'  => $this->request->getVar('username'),
            'email'     => $this->request->getVar('email'),
            'nik'       => $this->request->getVar('nik'),
            'fullname'  => $this->request->getVar('fullname'),
            'no_hp'     => $this->request->getVar('no_hp'),
            'alamat'    => $this->request->getVar('alamat')
        ];
        // dd($save);
        $this->userModel->save($save);
        session()->setFlashdata('message', 'Data profil berhasil diubah');
        return redirect()->back();
    }

    public function changePassword($id, $username)
    {
        $rules = [
            'password_lama'  => [
                'rules'     => 'required',
                'errors'     => [
                    'required'        => 'Pasasword Lama harus di isi',
                ]
            ],
            'password_baru'     => [
                'rules'        => 'required|strong_password',
                'errors'    => [
                    'required'        => 'Password Baru harus di isi',
                    'strong_password'    => 'Password terlalu mudah',
                ]
            ],
            'ulangi_password' => [
                'rules'        => 'required|matches[password_baru]',
                'errors'    => [
                    'required'        => 'Harap ulangi password',
                    'matches'        => 'Password tidak sesuai',
                ]
            ],
        ];

        // jika tdk tervalidasi, kembalikan dan tampilkan errors
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        $pwLama = $this->request->getPost('password_lama');
        $pwBaru = $this->request->getPost('password_baru');

        // ambil 1 data row yg  login 
        $user = $this->userModel->select('*')
            ->where('id', $id)
            ->where('username', $username)
            ->get()->getRowArray();
        // dd($user['password_hash']);

        // password_verify utk menyamakan inputan pwLama denganpassword yg di database
        // dan ditambah menggunakan hash tambahan dari myth/auth
        $result = password_verify(
            base64_encode(hash('sha384', $pwLama, true)),
            $user['password_hash']
        );

        // jika paswod lama tidak sama dengan password yg di database
        if (!$result) {
            session()->setFlashdata('error', 'Maaf, password lama salah');
            return redirect()->back()->withInput();
        } else {
            if ($pwLama == $pwBaru) {
                session()->setFlashdata('error', 'Mohon maaf, password baru tidak boleh sama dengan password lama');
                return redirect()->back()->withInput();
            } else {
                // Success! simpan password baru
                $users = model('UserModel');
                $new = $users->where('id', $id)
                    ->where('username', $username)
                    ->first();
                $new->password  = $pwBaru;
                $users->save($new);
                session()->setFlashdata('message', 'Password berhasil diubah!');
                return redirect()->back();
            }
        }
    }
}
