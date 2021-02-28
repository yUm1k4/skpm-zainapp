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
		$rules = [
			'tanggal' => [
				'rules'     => 'required',
				'errors'    => [
					'required'  => 'Harap pilih rentan tanggal',
				]
			]
		];

		if (!$this->validate($rules)) {
			// return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
			session()->setFlashdata('error', 'Harap pilih rentang tanggal');
			return redirect()->back();
		}

		$tanggal = $this->request->getPost('tanggal');
		$pecah = explode(' - ', $tanggal);
		$mulai = date('Y-m-d', strtotime($pecah[0]));
		$akhir = date('Y-m-d', strtotime(end($pecah)));

		$data = [
			'title'		=> 'Laporan Data Pengaduan',
			'mulai'		=> $mulai,
			'akhir'		=> $akhir,
			'data'		=> $this->pengaduanModel->cetakRangeTanggal(['mulai' => $mulai, 'akhir' => $akhir]),
		];

		$html = view('laporan/mpdf', $data);

		$dompdf = new \Dompdf\Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4');
		$dompdf->render();
		$dompdf->stream('Laporan Data Pengaduan | ' . setting()->nama_aplikasi_frontend . '.pdf', array("Attachment" => false));
	}
}
