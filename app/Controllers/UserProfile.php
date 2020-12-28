<?php

namespace App\Controllers;

class UserProfile extends BaseController
{
    public function index()
    {
        $userName = user()->fullname;
        $data = [
            'title' => "User Profile $userName | "
        ];
        return view('home/userProfile', $data);
    }
}
