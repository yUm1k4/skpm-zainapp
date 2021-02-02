<?php

namespace App\Models;

use CodeIgniter\Model;

class PercakapanModel extends Model
{
    protected $table = 'percakapan';
    protected $primaryKey = 'id_percakapan';

    protected $allowedFields = [
        'pengaduan_id', 'user_id', 'percakapan'
    ];

    protected $useTimestamps = false;
}
