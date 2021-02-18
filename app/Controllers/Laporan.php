<?php

namespace App\Controllers;

use App\Models\{
	PengaduanModel,
	MyUserModel,
};

class Laporan extends BaseController
{
	public function __construct()
	{
		$this->pengaduanModel = new PengaduanModel;
	}

	public function index()
	{
		$data['title'] = 'Laporan Pengaduan';
		return view('laporan/index', $data);
	}

	public function cetak()
	{
		$tanggal = $this->request->getPost('tanggal');
		$pecah = explode(' - ', $tanggal);
		$mulai = date('Y-m-d', strtotime($pecah[0]));
		$akhir = date('Y-m-d', strtotime(end($pecah)));

		$query = '';
		$query = $this->pengaduanModel->cetakRangeTanggal(['mulai' => $mulai, 'akhir' => $akhir]);

		$this->_cetak($query, $tanggal);
	}

	private function _cetak($query, $tanggal)
	{
		require_once ROOTPATH . '/vendor/autoload.php';

		// $mpdf = new Mpdf(['debug' => FALSE, 'mode' => 'utf-8', 'orientation' => 'L']);
		dd($query);
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($tanggal);
		$mpdf->Output();
	}
}
