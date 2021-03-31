<?php

namespace App\Models;

use CodeIgniter\Model;

class FilterKataModel extends Model
{
    protected $table      = 'filter_kata_kotor';
    protected $primaryKey = 'id_filter';

    protected $allowedFields = ['kata_kotor', 'filter_kata'];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
