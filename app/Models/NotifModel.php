<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifModel extends Model
{
    protected $table = 'notif';
    protected $primaryKey = 'id_notif';
    protected $allowedFields = [
        'kode_pengaduan_ref', 'user_id_pengirim', 'baca', 'jenis', 'isi_notif', 'tanggal'
    ];

    public function detailNotif()
    {
        return $this->notifModel->select('notif.id_notif, notif.user_id_pengirim as pengirim, notif.tanggal, notif.jenis, u.*')
            ->join('pengaduan p', 'p.kode_pengaduan = n.kode_pengaduan_ref', 'left')
            ->join('users u', 'u.id = p.pengirim')
            ->where(['notif.id_notif' => $this->input->post('id_notif')])
            ->get()->getRowArray();
    }

    public function updateNotif()
    {
        // get data notif
        $notif = $this->notifModel->where('notif', ['id_notif' => $this->input->post('id_notif')])->get()->getRowArray();

        $ok = $this->notifModel->affected_rows();

        if ($ok) {
            // kondisi hapus notif
            $this->notifModel->where('id_notif', $this->input('id_notif')
                ->update('notif', ['baca' => 'Y']));

            return json_encode(['status' => 'success', 'pesan' => 'Data Berhasil Disimpan']);
        } else {
            return json_encode(['status' => 'error', 'Gagal, Data tidak sesuai']);
        }
    }
}
