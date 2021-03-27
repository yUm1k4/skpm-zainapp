<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimoniModel extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey = 'id_testimoni';

    protected $allowedFields = [
        'user_id', 'testimoni', 'pekerjaan'
    ];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('testimoni');
    }

    public function getData()
    {
        return $this->table('testimoni')
            ->select('*')
            ->join('users', 'users.id = testimoni.user_id')
            ->get()->getResultArray();
    }

    public function getJoin($id_testimoni)
    {
        return $this->builder->select('*')
            ->join('users', 'users.id = testimoni.user_id')
            ->where('testimoni.id_testimoni', $id_testimoni)
            ->get()->getRowArray();
    }
}
