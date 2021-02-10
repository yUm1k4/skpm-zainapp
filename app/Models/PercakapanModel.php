<?php

namespace App\Models;

use CodeIgniter\Model;

class PercakapanModel extends Model
{
    protected $table = 'percakapan';
    protected $primaryKey = 'id_percakapan';

    protected $allowedFields = [
        'kode_pengaduan', 'user_id', 'petugas_id', 'percakapan'
    ];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('percakapan');
    }

    public function getPercakapan($kode_pengaduan, $petugasid)
    {
        $this->builder->select('*, percakapan.petugas_id as nama_petugas');
        $this->builder->join('users', 'users.id = percakapan.petugas_id');
        // $this->builder->join('users', 'users.id = pengaduan.user_id');
        // $this->builder->where('percakapan.petugas_id =', $petugasid);
        $this->builder->where('percakapan.kode_pengaduan =', $kode_pengaduan);

        $query = $this->builder->get();
        return $query->getResult();
    }
}
