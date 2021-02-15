<?php

namespace App\Controllers;

use App\Database\Migrations\Pengaduan;
use \App\Models\PengaduanModel;
use \App\Models\KategoriModel;
use \App\Models\PercakapanModel;
use Myth\Auth\Entities\User;
use CodeIgniter\I18n\Time;
use phpDocumentor\Reflection\Types\Nullable;

use function Composer\Autoload\includeFile;

class Home extends BaseController
{
    // protected $pengaduanModel;
    protected $session;

    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel;
        $this->kategoriModel = new KategoriModel;
        $this->percakapanModel = new PercakapanModel;
        $this->config = config('Auth');

        // $this->session = service('session');
    }

    public function index()
    {
        $data['title'] = '';
        $data['total_pengaduan'] = $this->pengaduanModel->countAll();
        return view('home/index', $data);
    }

    public function tentang()
    {
        $data['title'] = 'Tentang Kami | ';
        return view('home/tentang', $data);
    }

    public function ketentuan()
    {
        $data['title'] = "Ketentuan Pengguna (Terms of Use) | ";
        return view('home/ketentuan', $data);
    }

    public function hubungi()
    {
        $data['title'] = 'Hubungi Kami | ';
        return view('home/Hubungi', $data);
    }

    public function subscribeEmail($id, $username)
    {
        $rules = [
            'email'        => [
                'rules'     => 'required|valid_email|is_unique[users.email]',
                'errors'    => [
                    'required'        => 'Maaf, alamat email harus di isi',
                    'valid_email'    => 'Maaf, alamat email tidak valid',
                    'is_unique'        => 'Email sudah terdaftar sebagai subscriber kami ^_^'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        session()->setFlashdata('success', 'Terimakasih! Selanjutnya Anda akan mendapatkan info terbaru mengenai SKPM Zain App');
        return redirect()->back();
    }

    public function lapor()
    {
        $this->pengaduanModel->select('*, pengaduan.created_at as pengaduan_dibuat');
        $this->pengaduanModel->join('users', 'users.id = pengaduan.user_id');
        $this->pengaduanModel->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id');
        $this->pengaduanModel->orderBy('pengaduan_dibuat');

        $query = $this->pengaduanModel->get();
        $data['pengaduan'] = $query->getResult();
        // dd($tess);

        // generate kode v1
        $random = random_string('numeric', 3);
        $ambil_field = $this->pengaduanModel->selectMax('kode_pengaduan')->where('user_id = ' . user_id());
        $query = $ambil_field->get()->getRow();
        $kode_tambah = substr($query->kode_pengaduan, -4, 4);
        $kode_tambah++;
        $nomor = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
        $data['kode_pengaduan'] = 'K' . user_id() . '-' . $nomor;

        $data['title'] = 'Lapor | ';
        $data['validation'] = \Config\Services::validation();
        $data['pengaduan_kategori'] = $this->kategoriModel->findAll();

        return view('home/lapor', $data);
    }

    public function laporanDetail($idPengaduan, $kodePengaduan)
    {
        $qPengaduan = $this->pengaduanModel
            ->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat, users.id as userid')
            ->join('users', 'users.id = pengaduan.user_id')
            ->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id')
            ->orderBy('pengaduan_dibuat', 'DESC')
            ->where('pengaduan.kode_pengaduan =', $kodePengaduan)
            ->where('pengaduan.id_pengaduan =', $idPengaduan)
            ->get();

        $data = [
            'title'             => 'Detail Pengaduan | ',
            'pengaduan'         => $qPengaduan->getRow(),
            'listKategori'      => $this->kategoriModel->get()->getResult(),
            'percakapan'        => $this->percakapanModel->getPercakapan($kodePengaduan)
        ];


        return view('home/detailPengaduan', $data);
    }

    public function kirimLaporan()
    {
        // validasi input
        // $captcha;
        $rules = [
            'kategori_id' => [
                'rules'     => 'required',
                'errors'    => ['required'  => 'Kategori Pengaduan harus dipilih']
            ],
            'isi_laporan'   => [
                'rules'     => 'required|min_length[110]',
                'errors'    => [
                    'required'      => 'Harap di isi, dan Mohon di isi secara terperinci dan lengkap',
                    'min_length' => 'Isi Laporan terlalu singkat, isi secara terperinci dan lengkap'
                ]
            ],
            'lampiran'  => [
                'rules' => 'uploaded[lampiran]|max_size[lampiran,2048]|mime_in[lampiran,image/jpg,image/jpeg,image/pjpeg,image/png,image/x-png,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document]',
                'errors' => [
                    'uploaded' => 'Harap upload file bukti',
                    'max_size' => 'Ukuran file hanya boleh 2MB',
                    'mime_in'  => 'Oops.. yang Anda pilih bukan format file yang diperbolehkan'
                ]
            ]
        ];

        // jika tdk tervalidasi, kembalikan dan tampilkan errors
        if (!$this->validate($rules)) {
            // return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validasi Form reCaptcha
        if (isset($_POST['g-recaptcha-response'])) {
            $captcha = $_POST['g-recaptcha-response'];
        }
        if (!$captcha) {
            return redirect()->back()->withInput()->with('error', 'Silahkan checklist form reCaptcha');
        }
        $secretKey = "6LcAK_oZAAAAAKDwp8_LQAgCSnJM47sKqMJ3u00V";
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response, true);
        if ($responseKeys["success"]) {
            echo '<h2>Terima Kasih...</h2>';
        } else {
            echo '<h2>Kamu Spammer ! Silahkan Pergi...!!</h2>';
        }

        // Cek Anonim
        $anonim = (bool)$this->request->getPost('anonim');

        // Kelola Lampiran File
        $lamp = $this->request->getFile('lampiran');
        // jika tidak ada error
        if ($lamp->getError() == 0) {
            $namaFile = $lamp->getRandomName();
            $lamp->move('laporan/lampiran', $namaFile);
        }

        $savePengaduan = [
            'kode_pengaduan'    => $this->request->getPost('kode_pengaduan'),
            'user_id'           => user_id(),
            'kategori_id'       => $this->request->getPost('kategori_id'),
            'isi_laporan'       => $this->request->getPost('isi_laporan'),
            'status'            => 'pending',
            'anonim'            => $anonim,
            'lampiran'          => $namaFile
        ];
        // dd($savePengaduan);
        $this->pengaduanModel->save($savePengaduan);

        if ($savePengaduan) {
            session()->setFlashdata('kirimSukses', 'Laporan berhasil dikirim, tunggu balasan dari petugas dalam beberapa hari.');
            return redirect()->to(base_url('lapor'));
        }
    }

    public function laporanSaya($id_user)
    {
        $query = $this->pengaduanModel->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat')
            ->join('users', 'users.id = pengaduan.user_id')
            ->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id')
            ->orderBy('pengaduan_dibuat', 'DESC')
            ->where('users.id =', $id_user);

        // paginate() -> @jumlah, @nama_tabel
        $data = [
            'title'             => 'Laporan Saya | ',
            'listAduan'         => $query->paginate(7, 'pengaduan'),
            'pager'             => $this->pengaduanModel->pager,
            'listKategori'      => $this->kategoriModel->get()->getResult(),
            'totalPengaduan'    => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $id_user)->countAllResults(), 'pengaduanProses'  => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $id_user)->where('status', 'proses')->countAllResults(),
            'totalPengaduan'    => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $id_user)->countAllResults(), 'pengaduanPending'  => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $id_user)->where('status', 'pending')->countAllResults(),
            'pengaduanSelesai'  => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $id_user)->where('status', 'selesai')->countAllResults()
        ];

        return view('home/laporanSaya', $data);
    }

    public function cariLaporan()
    {
        $keyword = $this->request->getVar('keyword');

        // jika ada inputan searching
        if ($keyword) {
            $jmlHasil = $this->pengaduanModel->cariLaporan($keyword)->countAllResults();
            // dd($hasil);
            // jika jumlah hasil inputan tidak kosong
            if ($jmlHasil != 0) {
                $hasil2 = $this->pengaduanModel->cariLaporan($keyword);
                $data = [
                    'title'             => 'Cari Laporan | ',
                    'hasil'             => $hasil2->paginate(7, 'pengaduan'),
                    'pager'             => $this->pengaduanModel->pager,
                    'listKategori'      => $this->kategoriModel->get()->getResult(),
                ];
                return view('home/cariLaporan', $data);
                // jika hasil inputan kosong
            } else {
                session()->setFlashdata('error', 'Maaf, Pengaduan yang anda cari tidak ada, silahkan cek kode pengaduannya');
                return redirect()->to(base_url('cari-laporan'));
            }
            // jika tidak ada inputan keyword
        } else {
            $data = [
                'title'             => 'Cari Laporan | ',
                'hasil'             => null,
                'pager'             => null,
                'listKategori'      => $this->kategoriModel->get()->getResult(),
            ];
            return view('home/cariLaporan', $data);
        }
    }
}
