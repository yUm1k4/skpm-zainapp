<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'pengaduan_kategori';
    protected $primaryKey = 'id_pengaduan_kategori';

    protected $allowedFields = ['nama_kategori'];

    public function getCount()
    {
        return $this->table('pengaduan_kategori pk')
            ->select('*, nama_kategori as nama')
            ->selectCount('nama_kategori')
            ->groupBy('nama_kategori')
            ->join('pengaduan', 'pengaduan.kategori_id = pengaduan_kategori.id_pengaduan_kategori', 'left')
            ->get()->getResultArray();
    }
}
