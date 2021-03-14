<?php

namespace App\Controllers;

use App\Models\MyUserModel;
use App\Models\PengaduanModel;
use App\Models\QuotesModel;
use App\Models\AuthLoginModel;
use App\Models\PengunjungModel;
use CodeIgniter\I18n\Time;

class Dashboard extends BaseController
{
	// protected $userModel;

	public function __construct()
	{
		$this->user = new MyUserModel;
		$this->pengaduan = new PengaduanModel;
		$this->quotes = new QuotesModel;
		$this->login = new AuthLoginModel;
		$this->pengunjung = new PengunjungModel;
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

		// Chart start
		$data['pengunjung_per_bulan'] = $this->pengunjung->select('MONTH(date) as bulan, COUNT(id_pengunjung) AS jumlah')
			->groupBy('MONTH(date)')
			->like('date', date('Y'))
			->get()->getResult();
		$data['pengaduan_per_kategori'] = $this->pengaduan->select('COUNT(pengaduan.kategori_id) AS jumlah, pk.nama_kategori')
			->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id', 'left')
			->groupBy('pengaduan.kategori_id')
			->limit(5)
			->orderBy('jumlah', 'desc')
			->get()->getResult();
		$data['pengaduan_dibuat'] = $this->pengaduan->select('MONTH(created_at) as bulan, COUNT(id_pengaduan) AS jumlah')
			->groupBy('MONTH(created_at)')
			->like('created_at', date('Y'))
			->get()->getResult();
		$data['pengaduan_per_status'] = $this->pengaduan->select('COUNT(id_pengaduan) as jumlah, status')
			->groupBy('id_pengaduan')
			->orderBy('jumlah', 'desc')
			->get()->getResult();
		// Chart end

		// Data Pengaduan Terbaru start
		// $this->pengaduan->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat');
		$this->pengaduan->select('*, fullname, kode_pengaduan, isi_laporan, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat')
			->join('users', 'users.id = pengaduan.user_id')
			->like('pengaduan.created_at', date('d'))
			->orderBy('pengaduan.created_at', 'DESC');
		// ->limit(10);
		$data['pengaduan_terbaru'] = $this->pengaduan->get()->getResult();
		// Data Pengaduan Terbaru end

		// Login Terbaru start
		// $lastmonth = date("d");
		$this->login->select('username, group_id, date, ip_address, auth_logins.email as e_mail')
			->join('users u', 'u.id = auth_logins.user_id')
			->join('auth_groups_users agu', 'agu.user_id = u.id')
			->join('auth_groups ag', 'ag.id = agu.group_id')
			->where('success', 1)
			->like('date', date('d'))
			->orderBy('date', 'DESC');
		// ->limit(10);
		$data['user_log_terbaru'] = $this->login->get()->getResult();
		// Login Terbaru end

		// Data Pengunjung start
		$date  = date("Y-m-d");
		$pengunjunghariini = $this->pengunjung->select('*')
			->where('date', $date)
			->groupBy('ip_address')
			->countAllResults();
		// $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row();
		$dbpengunjung = $this->pengunjung->selectCount('hits')->get()->getRow();
		$totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung
		$bataswaktu = time() - 60;
		// $pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online
		$pengunjungonline  = $this->pengunjung->select('*')
			->where('online >', $bataswaktu)
			->countAllResults();

		// dd($bataswaktu);
		$data['pengunjunghariini'] = $pengunjunghariini;
		$data['totalpengunjung'] = $totalpengunjung;
		$data['pengunjungonline'] = $pengunjungonline;
		// Data Pengunjung end

		return view('dashboard/index', $data);
	}

	//--------------------------------------------------------------------

}
