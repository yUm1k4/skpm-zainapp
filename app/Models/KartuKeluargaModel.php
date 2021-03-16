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

    public function getData()
    {
        return $this->table($this->table)
            ->select('*')
            ->join('users', 'users.id = kartu_keluarga.user_id')
            ->get()->getResultArray();
    }
}
