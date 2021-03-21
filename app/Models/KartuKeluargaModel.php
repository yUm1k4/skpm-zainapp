<?php

namespace App\Models;

use CodeIgniter\Model;

class KartuKeluargaModel extends Model
{
    protected $table = 'kartu_keluarga';
    protected $primaryKey = 'id_kk';
    protected $allowedFields = [
        'no_kk', 'user_id', 'jenis_kelamin', 'agama', 'pekerjaan', 'status_hubungan',
    ];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getKepalaKeluarga()
    {
        return $this->table($this->table)
            ->select('*')
            ->join('users', 'users.id = kartu_keluarga.user_id')
            ->where('status_hubungan', 'Kepala Keluarga')
            ->get()->getResultArray();
    }
    public function getDetailKK($no_kk)
    {
        return $this->table($this->table)
            ->select('*, kartu_keluarga.created_at as anggota_dibuat')
            ->join('users', 'users.id = kartu_keluarga.user_id')
            ->where('no_kk', $no_kk)
            ->orderBy('anggota_dibuat', 'ASC')
            ->get()->getResultArray();
    }

    public function dataNIK($user_id)
    {
        return $this->table($this->table)
            ->select('*, users.id, nik, fullname, user_id')
            ->join('users', 'users.id = kartu_keluarga.user_id')
            ->where('user_id', $user_id)
            ->get()->getRowArray();
    }
}
