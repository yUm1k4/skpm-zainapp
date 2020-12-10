<?php

namespace App\Controllers;

class UserProfile extends BaseController
{
    public function index()
    {
        return view('home/userProfile');
    }
}
