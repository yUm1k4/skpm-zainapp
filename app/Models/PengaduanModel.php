<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class PengaduanModel extends Model
{
    protected $table      = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    protected $allowedFields = ['id_pengaduan', 'user_id', 'kategori_id', 'kode_pengaduan', 'isi_laporan', 'status', 'anonim', 'lampiran', 'hasil_akhir'];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // public function __construct()
    // {
    //     $this->db = \Config\Database::connect();
    //     $this->builder = $this->db->table('pengaduan');
    // }

    public function getData()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('pengaduan');
        $this->builder->select('*, pengaduan.created_at as pengaduan_dibuat');
        $this->builder->join('users', 'users.id = pengaduan.user_id');
        $this->builder->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id');
        $this->builder->orderBy('pengaduan_dibuat');

        return $this->builder->get();
        // return $query->getResult();
    }

    public function cariLaporan($keyword)
    {
        return $this->table('pengaduan')
            ->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat')
            ->join('users', 'users.id = pengaduan.user_id')
            ->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id')
            ->orderBy('pengaduan_dibuat', 'DESC')->like('kode_pengaduan', $keyword);
    }

    public function cariBerdasarNikUsername($keyword)
    {
        return $this->table('pengaduan')
            ->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat')
            ->join('users', 'users.id = pengaduan.user_id')
            ->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id')
            ->where('nik', $keyword)
            ->orWhere('username', $keyword)
            ->orderBy('pengaduan_dibuat', 'desc');
    }

    public function cetakRangeTanggal($range)
    {
        $query = $this->table('pengaduan')
            ->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat')
            ->join('users', 'users.id = pengaduan.user_id')
            ->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id')
            ->where('pengaduan.created_at' . ' >=', $range['mulai'])
            ->where('pengaduan.created_at' . ' <=', $range['akhir'])
            ->orderBy('pengaduan_dibuat', 'ASC');
        return $query->get()->getResultArray();
    }

    public function cetakKK($no_kk)
    {
        $query = $this->table('pengaduan')
            ->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat')
            ->join('users', 'users.id = pengaduan.user_id')
            ->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id')
            ->join('kartu_keluarga kk', 'kk.user_id = users.id')
            ->where('no_kk', $no_kk)
            ->orderBy('pengaduan_dibuat', 'ASC');
        return $query;
    }
}
