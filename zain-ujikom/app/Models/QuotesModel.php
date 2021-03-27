<?php

namespace App\Models;

use CodeIgniter\Model;

class QuotesModel extends Model
{
    protected $table = 'quotes';
    protected $primaryKey = 'id_quotes';

    protected $allowedFields = [
        'quote'
    ];

    public function getRandom()
    {
        $this->builder = $this->db->table($this->table);
        $this->builder->select('*');
        $this->builder->orderBy('quote', 'RANDOM');
        $this->builder->limit(1);
        $query = $this->builder->get();
        return $query->getResult();
    }
}
