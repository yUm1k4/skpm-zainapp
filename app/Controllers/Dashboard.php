<?php

namespace App\Controllers;

use App\Models\MyUserModel;
use App\Models\PengaduanModel;

class Dashboard extends BaseController
{
	// protected $userModel;

	public function __construct()
	{
		$this->user = new MyUserModel;
		$this->pengaduan = new PengaduanModel;
	}

	public function index()
	{
		$data['title'] = 'Dashboard';

		// Data Jumlah Pengaduan
		$data['pengaduan_pending'] = $this->pengaduan->select('status')->where('status', 'pending')->countAllResults();
		$data['pengaduan_proses'] = $this->pengaduan->select('status')->where('status', 'proses')->countAllResults();
		$data['pengaduan_selesai'] = $this->pengaduan->select('status')->where('status', 'selesai')->countAllResults();
		$data['total_pengaduan'] = $this->pengaduan->countAll();


		// Data User
		$groupIdAdmin = 1;
		$data['total_admin'] = $this->user->getTotal($groupIdAdmin);
		$groupIdPetugas = 2;
		$data['total_petugas'] = $this->user->getTotal($groupIdPetugas);
		$groupIdMasyarakat = 3;
		$data['total_masyarakat'] = $this->user->getTotal($groupIdMasyarakat);

		// Data Pengaduan Terbaru
		// $this->pengaduan->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat');
		$this->pengaduan->select('fullname, kode_pengaduan, isi_laporan, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat');
		$this->pengaduan->join('users', 'users.id = pengaduan.user_id');
		$this->pengaduan->orderBy('pengaduan_dibuat', 'DESC');
		$this->pengaduan->limit(10);

		$query = $this->pengaduan->get();
		$data['pengaduan_terbaru'] = $query->getResult();

		return view('dashboard/index', $data);
	}

	//--------------------------------------------------------------------

}
