<?php

namespace App\Controllers;

use App\Models\{
	PengaduanModel,
	MyUserModel,
};
use CodeIgniter\I18n\Time;
use \TCPDF;

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

		$data = $this->pengaduanModel->cetakRangeTanggal(['mulai' => $mulai, 'akhir' => $akhir]);
		// dd($query);
		// $this->_cetak($query, $tanggal);

		// require_once(ROOTPATH . '/vendor/tecnickcom/tcpdf/examples/tcpdf_include.php');

		$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

		// lembar informasi
		$pdf->SetCreator('Zainudin Abdullah');
		$pdf->SetAuthor('Zainudin Abdullah');
		$pdf->SetTitle('Laporan Pengaduan');
		$pdf->SetSubject('Laporan Pengaduan');

		// header dan footer
		$pdf->setPrintHeader(false);
		// $pdf->setPrintFooter(false);

		// set margins and number page
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// cell
		//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
		$pdf->addPage();

		// title
		$pdf->SetFont('times', 'B', 16);
		$pdf->Cell(0, 10, 'SKPM - Zain App | Laporan Data Pengaduan', 0, 1, 'C', 0, '', 0);
		$pdf->SetFont('times', '', 10);
		$pdf->Cell(0, 5, date_indo($mulai) . ' s/d ' . date_indo($akhir), 0, 1, 'C', 0, '', 0);
		$pdf->Ln(10);

		// table
		$pdf->SetFont('Helvetica', 'B', 10);
		$pdf->Cell(10, 7, 'No.', 1, 0, 'C');
		$pdf->Cell(25, 7, 'Tgl Buat', 1, 0, 'C');
		$pdf->Cell(55, 7, 'Nama', 1, 0, 'C');
		$pdf->Cell(18, 7, 'Kode', 1, 0, 'C');
		$pdf->Cell(62, 7, 'Kategori', 1, 0, 'C');
		$pdf->Cell(20, 7, 'Status', 1, 0, 'C');
		$pdf->Ln();

		$no = 1;
		foreach ($data as $d) {
			$pdf->SetFont('Helvetica', '', 10);
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$phpdate = strtotime($d['pengaduan_dibuat']);
			$tanggal = date('Y-m-d', $phpdate);
			$pdf->Cell(25, 7, shortdate_indo($tanggal), 1, 0, 'C');
			$pdf->Cell(55, 7, $d['fullname'], 1, 0, 'L');
			$pdf->Cell(18, 7, $d['kode_pengaduan'], 1, 0, 'C');
			$pdf->Cell(62, 7, $d['nama_kategori'], 1, 0, 'L');
			$pdf->Cell(20, 7, $d['ket'], 1, 0, 'C');
			$pdf->Ln();
		}

		// $pdf->writeHTML($html, true, false, true, false, '');
		// response (sangat penting)
		$this->response->setContentType('application/pdf');
		// output
		// header("Content-Disposition: attachment;filename=Laporan Data Pengaduan | SKPM - Zain App.pdf");
		$pdf->Output('Laporan Data Pengaduan | SKPM - Zain App.pdf', 'I');
	}
}
