<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'pengaduan_kategori';
    protected $primaryKey = 'id_pengaduan_kategori';

    protected $allowedFields = ['nama_kategori'];
}
