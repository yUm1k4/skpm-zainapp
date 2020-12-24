<?php

namespace App\Controllers;

use App\Models\MyUserModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;

class Alluser extends BaseController
{
    public function __construct()
    {
        $this->userModel = new MyUserModel;
        $this->mythUserModel = new UserModel;
    }

    public function index()
    {
        $data['title'] = 'Data Semua Pengguna';

        $this->userModel->select('users.id as userid, username, email, fullname, nik, user_image, no_hp, alamat, name');
        $this->userModel->join('auth_groups_users agu', 'agu.user_id = users.id');
        $this->userModel->join('auth_groups ag', 'ag.id = agu.group_id');
        // $this->userModel->where('ag.id =', 1);
        $this->userModel->orderBy('fullname', 'ASC');
        $query = $this->userModel->get();

        $data['alluser'] = $query->getResult();

        return view('alluser/index', $data);
    }
}
