<?php

namespace App\Controllers;

use App\Models\SubscriberModel;

class Subscriber extends BaseController
{
    public function __construct()
    {
        $this->subModel = new SubscriberModel;
    }

    public function index()
    {
        $data['title'] = 'Data Subscriber';

        $this->subModel->select('id_subscriber, user_id, subscriber.email as sub_email, subscriber.created_at as terbaru,
        users.username');
        $this->subModel->join('users', 'users.id = subscriber.user_id');
        $this->subModel->orderBy('terbaru', 'DESC');

        $data['subscriber'] = $this->subModel->get()->getResult();

        return view('subscriber/index', $data);
    }

    public function delete($id)
    {
        $this->subModel->where('id_subscriber', $id)->delete();

        session()->setFlashdata('message', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/subscriber'));
    }
}
