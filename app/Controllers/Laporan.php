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

	public function cetakTgl()
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

		$html = view('laporan/cetakTgl', $data);

		$dompdf = new \Dompdf\Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4');
		$dompdf->render();
		$dompdf->stream('Laporan Data Pengaduan | ' . setting()->nama_aplikasi_frontend . '.pdf', array("Attachment" => false));
	}

	public function cetakKK()
	{
		$rules = [
			'no_kk' => [
				'rules'     => 'required|numeric',
				'errors'    => [
					'required'  => 'Harap masukkan No. KK',
					'numeric'	=> 'Harus berupa nomor'
				]
			]
		];

		// jika tdk tervalidasi, kembalikan dan tampilkan errors
		if (!$this->validate($rules)) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$no_kk = $this->request->getPost('no_kk');
		$result = $this->pengaduanModel->cetakKK($no_kk)->countAllResults();

		// dd($data);
		if ($result == null) {
			session()->setFlashdata('error', 'Maaf Laporan yang anda cari tidak ada. Silahkan cek No. Kartu Keluarga nya atau No KK tersebut belum memiliki laporan.');
			return redirect()->to(base_url('report'));
		} else {
			$pengaduanBerdasarKK = $this->pengaduanModel->cetakKK($no_kk)->get()->getResultArray();
			$data = [
				'title'			=> 'Laporan Data Pengaduan',
				'pengaduan'		=> $pengaduanBerdasarKK
			];
			// dd($result);

			$html = view('laporan/cetakKK', $data);

			$dompdf = new \Dompdf\Dompdf();
			$dompdf->loadHtml($html);
			$dompdf->setPaper('A4');
			$dompdf->render();
			$dompdf->stream('Laporan Data Pengaduan | ' . setting()->nama_aplikasi_frontend . '.pdf', array("Attachment" => false));
		}
	}
}
