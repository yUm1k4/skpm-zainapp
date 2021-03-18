<?php

namespace App\Models;

use CodeIgniter\Model;

class RukunWargaModel extends Model
{
    protected $table = 'rukun_warga';
    protected $primaryKey = 'id_rw';

    protected $allowedFields = [
        'no_rw', 'nama_rw'
    ];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getCount()
    {
        return $this->table('rukun_warga')
            ->select('*, no_rw as no')
            ->selectCount('no_rw')
            ->groupBy('no_rw')
            ->join('rukun_tetangga', 'rukun_tetangga.rw_id = rukun_warga.id_rw', 'left')
            ->get()->getResultArray();
    }
}
