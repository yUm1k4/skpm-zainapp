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

    public function getData()
    {
        return $this->table('testimoni')
            ->select('*')
            ->join('users', 'users.id = testimoni.user_id')
            ->get()->getResultArray();
    }
}
