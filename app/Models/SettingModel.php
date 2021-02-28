<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table      = 'setting';
    protected $primaryKey = 'id_setting';

    protected $allowedFields = ['nama_aplikasi_frontend', 'nama_aplikasi_backend', 'nohp_setting', 'alamat_setting', 'email_setting', 'map_link', 'footer_frontend', 'footer_backend', 'lc_1_nama', 'lc_2_nama', 'lc_3_nama', 'lc_4_nama', 'lc_5_nama', 'lc_1_url', 'lc_2_url', 'lc_3_url', 'lc_4_url', 'lc_5_url', 'somed_1_font', 'somed_2_font', 'somed_3_font', 'somed_4_font', 'somed_5_font', 'somed_1_url', 'somed_2_url', 'somed_3_url', 'somed_4_url', 'somed_5_url'];
}
