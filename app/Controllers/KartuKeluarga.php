<?php

namespace App\Controllers;

use App\Models\MyUserModel;
use App\Models\KartuKeluargaModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;

class KartuKeluarga extends BaseController
{
    public function __construct()
    {
        $this->kkModel = new KartuKeluargaModel;
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
}
