<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController
{
    public function __construct()
    {
        $this->contactModel = new ContactModel;
    }

    public function index()
    {
        $data['title'] = 'Data Contact';

        $this->contactModel->select('*, contact.email as contact_email, contact.created_at as terbaru');
        $this->contactModel->join('users', 'users.id = contact.user_id');
        $this->contactModel->orderBy('terbaru', 'DESC');

        $data['contact'] = $this->contactModel->get()->getResult();

        return view('contact/index', $data);
    }

    public function delete($id)
    {
        $this->contactModel->where('id_contact', $id)->delete();

        session()->setFlashdata('message', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
