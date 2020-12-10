<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythModel;
use Codeigniter\Model;
use Myth\Auth\Entities\User;

class MyUserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
        'nik', 'fullname', 'no_hp', 'alamat',
    ];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function getId($group_id, $id)
    {
        $this->builder->select('users.id as userid, username, email, fullname, nik, user_image, no_hp, alamat, name');
        $this->builder->join('auth_groups_users agu', 'agu.user_id = users.id');
        $this->builder->join('auth_groups ag', 'ag.id = agu.group_id');
        $this->builder->where('users.id =', $id);
        $this->builder->where('ag.id =', $group_id);
        $query = $this->builder->get();
        return $query->getResult();
    }

    public function getTotal($group_id)
    {
        $this->builder = $this->db->table('users');
        $this->builder->select('users.id as userid, group_id, COUNT(group_id) as total');
        $this->builder->join('auth_groups_users agu', 'agu.user_id = users.id');
        $this->builder->join('auth_groups ag', 'ag.id = agu.group_id');
        $this->builder->where('ag.id =', $group_id);
        $this->builder->groupBy('group_id');
        $this->builder->orderBy('total', 'desc');
        $query = $this->builder->get();
        return $query->getResult();
    }
}
