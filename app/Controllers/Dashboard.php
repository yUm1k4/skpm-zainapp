<?php

namespace App\Controllers;

use App\Models\MyUserModel;
use App\Models\PengaduanModel;
use App\Models\QuotesModel;
use App\Models\AuthLoginModel;

class Dashboard extends BaseController
{
	// protected $userModel;

	public function __construct()
	{
		$this->user = new MyUserModel;
		$this->pengaduan = new PengaduanModel;
		$this->quotes = new QuotesModel;
		$this->login = new AuthLoginModel;
	}

	public function index()
	{
		$data['title'] = 'Dashboard';

		// Quotes
		$data['quote'] = $this->quotes->getRandom();

		// Data Jumlah Pengaduan
		$data['pengaduan_pending'] = $this->pengaduan->select('status')->where('status', 'pending')->countAllResults();
		$data['pengaduan_proses'] = $this->pengaduan->select('status')->where('status', 'proses')->countAllResults();
		$data['pengaduan_selesai'] = $this->pengaduan->select('status')->where('status', 'selesai')->countAllResults();
		$data['pengaduan_arsip'] = $this->pengaduan->select('status')->where('status', 'arsip')->countAllResults();
		$data['total_pengaduan'] = $this->pengaduan->countAll();

		// Data User
		$groupIdAdmin = 1;
		$data['total_admin'] = $this->user->getTotal($groupIdAdmin);
		$groupIdPetugas = 2;
		$data['total_petugas'] = $this->user->getTotal($groupIdPetugas);
		$groupIdMasyarakat = 3;
		$data['total_masyarakat'] = $this->user->getTotal($groupIdMasyarakat);

		// Chart
		$data['pengaduan_per_kategori'] = $this->pengaduan->select('COUNT(pengaduan.kategori_id) AS jumlah, pk.nama_kategori')
			->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id', 'left')
			->groupBy('pengaduan.kategori_id')
			->get()->getResult();
		$data['pengaduan_dibuat'] = $this->pengaduan->select('MONTH(created_at) as bulan, COUNT(id_pengaduan) AS jumlah')
			->groupBy('MONTH(created_at)')
			->like('created_at', date('Y'))
			->get()->getResult();

		// Data Pengaduan Terbaru
		// $this->pengaduan->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat');
		$this->pengaduan->select('*, fullname, kode_pengaduan, isi_laporan, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat')
			->join('users', 'users.id = pengaduan.user_id')
			->orderBy('pengaduan.id_pengaduan', 'DESC')
			->limit(10);
		$data['pengaduan_terbaru'] = $this->pengaduan->get()->getResult();

		$this->login->select('username, group_id, date, ip_address, auth_logins.email as e_mail')
			->join('users u', 'u.id = auth_logins.user_id')
			->join('auth_groups_users agu', 'agu.user_id = u.id')
			->join('auth_groups ag', 'ag.id = agu.group_id')
			->where('success', 1)
			->orderBy('date', 'DESC')
			->limit(10);
		$data['user_log_terbaru'] = $this->login->get()->getResult();

		return view('dashboard/index', $data);
	}

	//--------------------------------------------------------------------

}
