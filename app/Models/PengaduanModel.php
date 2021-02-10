<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class PengaduanModel extends Model
{
    protected $table      = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    protected $allowedFields = ['id_pengaduan', 'user_id', 'kategori_id', 'kode_pengaduan', 'isi_laporan', 'status', 'anonim', 'lampiran'];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('pengaduan');
    }

    public function getData()
    {
        $this->builder->select('*, pengaduan.created_at as pengaduan_dibuat');
        $this->builder->join('users', 'users.id = pengaduan.user_id');
        $this->builder->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id');
        $this->builder->orderBy('pengaduan_dibuat');

        return $this->builder->get();
        // return $query->getResult();
    }

    // public function getPengaduanId($kode_pengaduan)
    // {
    //     $this->builder->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat');
    //     $this->builder->join('users', 'users.id = pengaduan.user_id');
    //     $this->builder->where('pengaduan.kode_pengaduan =', $kode_pengaduan);

    //     $query = $this->builder->get();
    //     return $query->getResult();
    // }

    public function getKode()
    {
        // // generate kode v1
        // $ambil_field = $this->pengaduanModel->selectMax('kode_pengaduan');
        // $query = $ambil_field->get()->getRow();
        // $kode_tambah = substr($query->kode_pengaduan, -5, 5);
        // $kode_tambah++;
        // $nomor = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
        // // dd($nomor);
        // $data['kode_pengaduan'] = 'K-' . user_id() . '-' . $nomor;

        // // generate kode v2
        // $ambil_field = $this->pengaduanModel->selectMax('kode_pengaduan')->where('user_id = ' . user_id());
        // $query = $ambil_field->get()->getRow();
        // $kode_tambah = substr($query->kode_pengaduan, -4, 4);
        // $kode_tambah++;
        // $nomor = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
        // $data['kode_pengaduan'] = 'K' . user_id() . '-' . $nomor;

    }
}
