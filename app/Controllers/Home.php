<?php

namespace App\Controllers;

use App\Database\Migrations\Pengaduan;
use \App\Models\PengaduanModel;
use \App\Models\KategoriModel;
use \App\Models\PercakapanModel;
use \App\Models\SubscriberModel;
use \App\Models\ContactModel;
use \App\Models\TestimoniModel;
use \App\Models\PengunjungModel;
use Myth\Auth\Entities\User;
use CodeIgniter\I18n\Time;
use phpDocumentor\Reflection\Types\Nullable;
use function Composer\Autoload\includeFile;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Home extends BaseController
{
    // protected $pengaduanModel;
    protected $session;

    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel;
        $this->kategoriModel = new KategoriModel;
        $this->percakapanModel = new PercakapanModel;
        $this->subModel = new SubscriberModel;
        $this->testimoni = new TestimoniModel;
        $this->pengunjung = new PengunjungModel;
        $this->config = config('Auth');

        // $this->session = service('session');
    }

    public function index()
    {
        // Testimoni start
        $testimoni = $this->testimoni->select('*')
            ->join('users', 'users.id = testimoni.user_id')
            ->join('auth_groups_users agu', 'agu.user_id = users.id')
            ->join('auth_groups ag', 'ag.id = agu.group_id')
            ->get()->getResultArray();
        // Testimoni end

        // pengunjung
        $this->_pengungjung();

        $data = [
            'title'         => '',
            'total_pengaduan' => $this->pengaduanModel->countAll(),
            'testimoni'     => $testimoni
        ];

        return view('home/index', $data);
    }

    public function tentang()
    {
        $data['title'] = 'Tentang Kami | ';
        // pengunjung
        $this->_pengungjung();

        return view('home/tentang', $data);
    }

    public function ketentuan()
    {
        $data['title'] = "Ketentuan Pengguna (Terms of Use) | ";
        // pengunjung
        $this->_pengungjung();

        return view('home/ketentuan', $data);
    }

    public function hubungi()
    {
        $data['title'] = 'Hubungi Kami | ';
        // pengunjung
        $this->_pengungjung();

        return view('home/hubungi', $data);
    }

    public function kirimEmail()
    {
        if (user_id() == NULL) {
            session()->setFlashdata('error', "Mohon Maaf, jika ingin mengirim email, harap login terlebih dahulu");
            return redirect()->back();
        } else {
            $rules = [
                'subject' => [
                    'rules'     => 'required|min_length[20]',
                    'errors'    => [
                        'required'   => 'Subject harus di isi',
                        'min_length' => 'Subject terlalu singkat'
                    ]
                ],
                'nama_lengkap' => [
                    'rules'     => 'required|min_length[5]|max_length[50]',
                    'errors'    => [
                        'required'  => 'Mohon isi Nama Anda',
                        'min_length' => 'Nama Lengkap terlalu singkat',
                        'max_length' => 'Nama Lengkap terllau panjang'
                    ]
                ],
                'email'        => [
                    'rules'     => 'required|valid_email|min_length[10]',
                    'errors'    => [
                        'required'        => 'Maaf, alamat email harus di isi',
                        'valid_email'    => 'Maaf, alamat email tidak valid',
                        'min_length'    => 'Email terlalu singkat'
                    ]
                ],
                'pesan'   => [
                    'rules'     => 'required|min_length[110]',
                    'errors'    => [
                        'required'      => 'Harap di isi, dan Mohon di isi secara terperinci dan lengkap',
                        'min_length' => 'Pesan terlalu singkat, isi secara terperinci dan lengkap'
                    ]
                ]
            ];

            if (!$this->validate($rules)) {
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
                echo '<h2>Kamu Spammer!! Silahkan Pergi...!!</h2>';
            }

            $subject         = $this->request->getPost('subject');
            $nama_lengkap    = $this->request->getPost('nama_lengkap');
            $email           = $this->request->getPost('email');
            $pesan           = $this->request->getPost('pesan');
            // --> Kirim Email
            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host       = 'smtp.googlemail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'yumikasoftware@gmail.com'; // silahkan ganti dengan alamat email Anda
                $mail->Password   = 'zxc1123241101002'; // silahkan ganti dengan password email Anda
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;

                $mail->setFrom($email);
                $mail->addReplyTo($email, $nama_lengkap);
                $mail->addAddress('yumikasoftware@gmail.com');
                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = nl2br($pesan, false);

                $send = $mail->send();
            } catch (Exception $e) {
                session()->setFlashdata('error', "Kirim email gagal. Something Wrong");
                session()->setFlashdata('error', "Send Email failed. Error: " . $mail->ErrorInfo);
                return redirect()->back()->withInput();
            }

            // --> kirim data ke DB
            $contactModel = new ContactModel;
            $saveEmail = [
                'user_id'       => user_id(),
                'subject'       => $subject,
                'nama_lengkap'  => $nama_lengkap,
                'email'         => $email,
                'pesan'         => $pesan,
            ];

            $contactModel->save($saveEmail);

            if ($saveEmail && $send) {
                session()->setFlashdata('success', 'Terimakasih, E-Mail berhasil terkirim ^_^');
                return redirect()->back();
            } else {
                session()->setFlashdata('error', 'Maaf, Sepertinya ada sesuatu yang salah');
                return redirect()->back();
            }
        }
    }

    public function subscribeEmail($id, $username = null)
    {
        $rules = [
            'subEmail'        => [
                'rules'     => 'required|valid_email|is_unique[subscriber.email]',
                'errors'    => [
                    'required'        => 'Maaf, alamat email harus di isi',
                    'valid_email'    => 'Maaf, alamat email tidak valid',
                    'is_unique'        => 'Email sudah terdaftar sebagai subscriber kami ^_^'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('errors', service('validation')->getErrors());
        }

        $saveSub = [
            'email'     => $this->request->getPost('subEmail'),
            'user_id'   => $id
        ];

        $this->subModel->save($saveSub);

        if ($saveSub) {
            session()->setFlashdata('success', 'Terimakasih, selanjutnya Anda akan mendapatkan info terbaru melalui Email ^_^');
            return redirect()->back();
        }
    }

    public function lapor()
    {
        // pengunjung
        $this->_pengungjung();

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
        // pengunjung
        $this->_pengungjung();

        // laporan detail
        $query = $this->pengaduanModel
            ->select('*, pengaduan.status as ket, pengaduan.created_at as pengaduan_dibuat, users.id as userid')
            ->join('users', 'users.id = pengaduan.user_id')
            ->join('pengaduan_kategori pk', 'pk.id_pengaduan_kategori = pengaduan.kategori_id')
            ->orderBy('pengaduan_dibuat', 'DESC')
            ->where('pengaduan.kode_pengaduan =', $kodePengaduan)
            ->where('pengaduan.id_pengaduan =', $idPengaduan);
        $qPengaduan = $query->get()->getRow();

        if ($qPengaduan == null) {
            session()->setFlashdata('error', 'Maaf Laporan yang anda cari tidak ada.');
            return redirect()->to(base_url('cari-laporan'));
        } else {
            $data = [
                'title'             => 'Detail Pengaduan | ',
                'pengaduan'         => $qPengaduan,
                'listKategori'      => $this->kategoriModel->get()->getResult(),
                'percakapan'        => $this->percakapanModel->getPercakapan($kodePengaduan)
            ];
            return view('home/detailPengaduan', $data);
        }
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
                    'uploaded' => 'Mohon lampirkan file bukti',
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
        // pengunjung
        $this->_pengungjung();

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
            'totalPengaduan'    => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $id_user)->countAllResults(),
            'pengaduanProses'   => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $id_user)->where('status', 'proses')->countAllResults(),
            'pengaduanPending'  => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $id_user)->where('status', 'pending')->countAllResults(),
            'pengaduanArsip'    => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $id_user)->where('status', 'arsip')->countAllResults(),
            'pengaduanSelesai'  => $this->pengaduanModel->select('id_pengaduan')->where('user_id =', $id_user)->where('status', 'selesai')->countAllResults()
        ];

        return view('home/laporanSaya', $data);
    }

    public function cariLaporan()
    {
        // pengunjung
        $this->_pengungjung();

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

    // -----------------------------------------------------------------------------------------

    private function _pengungjung()
    {
        // Data Pengunjung start
        $ip    = $this->request->getIPAddress(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
        $dataPengunjung = [
            'ip_address'    => $ip,
            'date'          => $date,
            'hits'          => 1,
            'online'        => $waktu,
            'time'          => $timeinsert
        ];

        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        // $s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        $s = $this->pengunjung->select('*')
            ->where('ip_address', $ip)
            ->where('date', $date)
            ->countAllResults();
        $ss = isset($s) ? ($s) : 0;

        // Kalau belum ada, simpan data user tersebut ke database
        if ($ss == 0) {
            // $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
            $this->pengunjung->insert($dataPengunjung);
        } else {
            // Jika sudah ada, update
            // $this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
            $this->pengunjung->set('hits', 'hits+1')
                ->set('online', $waktu)
                ->where('ip_address', $ip)
                ->where('date', $date)
                ->update();
        }
    }
}
