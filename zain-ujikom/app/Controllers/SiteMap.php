<?php

namespace App\Controllers;

class SiteMap extends BaseController
{
    public function index()
    {
        $data['title'] = 'Site Map ' . setting()->nama_aplikasi_frontend;
        return view('siteMap/siteMap', $data);
    }
}
