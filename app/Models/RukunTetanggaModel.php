<?php

namespace App\Models;

use CodeIgniter\Model;

class RukunTetanggaModel extends Model
{
    protected $table = 'rukun_tetangga';
    protected $primaryKey = 'id_rt';

    protected $allowedFields = [
        'no_rt', 'nama_rt', 'rw_id'
    ];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getId($id_rt)
    {
        return $this->table('rukun_tetangga')
            ->select('*')
            ->where('id_rt', $id_rt)
            ->get()
            ->getResult();
    }

    public function getData()
    {
        return $this->table('rukun_tetangga')
            ->select('*')
            ->join('rukun_warga', 'rukun_warga.id_rw = rukun_tetangga.rw_id')
            ->orderBy('no_rw', 'asc')
            ->orderBy('no_rt', 'asc')
            ->get()->getResultArray();
    }

    public function dataRW($row)
    {
        return $this->table('rukun_tetangga')
            ->select('*')
            ->join('rukun_warga', 'rukun_warga.id_rw = rukun_tetangga.rw_id')
            ->where('rw_id', $row)
            ->get()->getRowArray();
    }
}
