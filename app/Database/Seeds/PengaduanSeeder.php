<?php

namespace App\Database\Seeds;

// utk menggunakan waktu bawaan dari CI4
use CodeIgniter\I18n\Time;

class PengaduanSeeder extends \CodeIgniter\Database\Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 3; $i++) {
            $id_user = rand(21, 30);
            $status = ['pending', 'proses', 'arsip'];
            $data = [
                'kode_pengaduan'    => 'K' . $id_user . '-' . rand(1001, 1020),
                'user_id'           => $id_user,
                'kategori_id'       => rand(1, 12),
                'isi_laporan'       => $faker->text,
                'status'            => array_rand($status, 1),
                'anonim'            => rand(0, 1),
                'lampiran'          => $faker->imageUrl(800, 450, 'people', true, 'SKPM - Zain App'),
                'hasil_akhir'       => null,
                'created_at'        => Time::now(),
                'updated_at'        => Time::now(),
            ];

            $this->db->table('pengaduan')->insert($data);
        }
    }
}
