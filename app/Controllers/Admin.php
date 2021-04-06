<?php

namespace App\Controllers;

use App\Models\MasyarakatModel;
use App\Models\MyUserModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->userModel = new MyUserModel;
        $this->mythUserModel = new UserModel;
        $this->masyarakatModel = new MasyarakatModel;
        $this->config = config('Auth');
    }

    public function index()
    {
        $data['title'] = 'Data Administrator';

        $this->userModel->select('users.id as userid, username, email, fullname, nik, user_image, no_hp, alamat, name');
        $this->userModel->join('auth_groups_users agu', 'agu.user_id = users.id');
        $this->userModel->join('auth_groups ag', 'ag.id = agu.group_id');
        $this->userModel->where('ag.id =', 1);
        $this->userModel->orderBy('fullname', 'ASC');
        $query = $this->userModel->get();

        $data['admin'] = $query->getResult();

        return view('admin/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Admin',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/create', $data);
    }

    public function save()
    {
        // validasi input
        $rules = [
            'username' => [
                'rules' => 'required|alpha_numeric|min_length[3]|max_length[15]|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus di isi',
                    'alpha_numeric' => 'Username tidak boleh spesial',
                    'min_length' => 'Username minimal 3 karakter',
                    'max_length' => 'Username maximal 15 karakter',
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

        // Pastikan masuk group Admin
        if (!empty($this->config->defaultUserGroup)) {
            $users = $this->mythUserModel->withGroup('Admin');
        }

        // jika uset tdk tersave tampilkan error
        if (!$users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // Jika berhasil tersimpan tampilkan pesan success
        if ($user) {
            session()->setFlashdata('message', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('admin'));
        }
    }

    public function delete($id, $username)
    {
        // cari file berdasarkan id
        $admin = $this->masyarakatModel->where('id', $id)->where('username', $username)->get()->getResultArray();
        // dd($admin);

        // jika file nya bukan bukan null
        if ($admin[0]['user_image'] != NULL) {
            unlink('images/user-images/' . $admin[0]['user_image']);
        }

        $this->userModel->delete($id);
        session()->setFlashdata('message', 'Data berhasil bihapus');
        return redirect()->to(base_url('/admin'));
    }
}
