<?php

namespace App\Controllers;

use \App\Models\NotifModel;

class Notif extends BaseController
{

    public function __construct()
    {
        $this->notifModel = new NotifModel;
    }

    public function kirimNotif()
    {
        return view('notif/header_notif');
    }

    public function update()
    {
        if ($this->request->getPost('jenis_notif') == 'Keluhan Masyarakat') {
            $data['data_notif'] = $this->notifModel->detailNotif();
            $this->load->view('templates/notifikasi', $data);
        }
    }

    public function updateNotif($id_notif)
    {
        $id = $this->request->getPost($id_notif);

        $data = [
            'baca' => 'Y'
        ];
        $this->notifModel->update($id, $data);
        redirect()->to(base_url('dashboard'));
    }
}
