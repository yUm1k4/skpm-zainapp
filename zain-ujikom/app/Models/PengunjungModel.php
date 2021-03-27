<?php

namespace App\Models;

use CodeIgniter\Model;

class PengunjungModel extends Model
{
    protected $table      = 'pengunjung';
    protected $primaryKey = 'id_pengunjung';

    protected $allowedFields = ['ip_address', 'date', 'hits', 'online', 'time'];
}
