<?php

namespace App\Models;

use CodeIgniter\Model;

class KartuKeluargaModel extends Model
{
    protected $table = 'kartu_keluarga';
    protected $primaryKey = 'id_kk';
    protected $allowedFields = [
        'no_kk', 'rw_id', 'rt_id', 'user_id', 'jenis_kelamin', 'agama', 'pekerjaan', 'status_hubungan',
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
            ->join('rukun_warga', 'rukun_warga.id_rw = kartu_keluarga.rw_id')
            ->join('rukun_tetangga', 'rukun_tetangga.id_rt = kartu_keluarga.rt_id')
            ->where('status_hubungan', 'Kepala Keluarga')
            ->orderBy('no_kk', 'asc')
            ->get()->getResultArray();
    }
    public function getDetailKK($no_kk)
    {
        return $this->table($this->table)
            ->select('*, kartu_keluarga.created_at as anggota_dibuat')
            ->join('users', 'users.id = kartu_keluarga.user_id')
            ->join('rukun_warga', 'rukun_warga.id_rw = kartu_keluarga.rw_id')
            ->join('rukun_tetangga', 'rukun_tetangga.id_rt = kartu_keluarga.rt_id')
            ->where('no_kk', $no_kk)
            ->orderBy('anggota_dibuat', 'ASC')
            ->get()->getResultArray();
    }

    public function editDataNIK($user_id)
    {
        return $this->table($this->table)
            ->select('*, users.id, nik, fullname, user_id')
            ->join('users', 'users.id = kartu_keluarga.user_id')
            ->where('user_id', $user_id)
            ->get()->getRowArray();
    }

    public function editDataRW($rw_id)
    {
        return $this->table($this->table)
            ->select('*')
            ->join('rukun_warga', 'rukun_warga.id_rw = kartu_keluarga.rw_id')
            ->where('rw_id', $rw_id)
            ->get()->getRowArray();
    }

    public function editDataRT($rt_id)
    {
        return $this->table($this->table)
            ->select('*')
            ->join('rukun_tetangga', 'rukun_tetangga.id_rt = kartu_keluarga.rt_id')
            ->where('rt_id', $rt_id)
            ->get()->getRowArray();
    }
}
