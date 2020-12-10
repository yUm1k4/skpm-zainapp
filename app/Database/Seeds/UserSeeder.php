<?php

namespace App\Database\Seeds;

// utk menggunakan waktu bawaan dari CI4
use CodeIgniter\I18n\Time;
use Myth\Auth\Models\UserModel;

class UserSeeder extends \CodeIgniter\Database\Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 1; $i++) {
            $data = [
                'nik'           => $faker->nik,
                'email'         => $faker->email,
                'fullname'      => $faker->name,
                'username'      => $faker->userName,
                'password_hash' => $faker->password,
                'no_hp'         => $faker->phoneNumber,
                'alamat'        => $faker->address,
                'active'        => 1,
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ];
            $this->db->table('users')->insert($data);
        }
    }
}
