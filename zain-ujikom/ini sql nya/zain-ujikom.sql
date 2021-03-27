-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2021 pada 17.45
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zain-ujikom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', NULL, '2021-03-01 22:18:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Mengelola semua backend'),
(2, 'Petugas', 'Mengelola sebagian backend'),
(3, 'Masyarakat', 'Hanya dapat mengakses frontend');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 3),
(2, 19),
(3, 1),
(3, 15),
(3, 20),
(3, 21),
(3, 21),
(3, 22),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '192.168.0.104', 'petugas@gmail.com', 19, '2021-03-13 23:11:44', 1),
(2, '::1', 'napsiah@gmail.com', 34, '2021-03-14 14:10:48', 1),
(3, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-14 14:29:47', 1),
(4, '::1', 'jajat@gmail.com', 36, '2021-03-14 18:00:56', 1),
(6, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-14 18:26:56', 1),
(7, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-15 13:18:24', 1),
(9, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-15 13:28:32', 1),
(12, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-15 19:43:21', 1),
(13, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-16 07:30:01', 1),
(14, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-16 12:06:14', 1),
(15, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-16 15:27:10', 1),
(16, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-17 07:14:19', 1),
(17, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-17 15:12:20', 1),
(18, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-18 05:40:09', 1),
(19, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-18 14:52:48', 1),
(20, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-18 14:52:50', 1),
(21, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-19 14:43:02', 1),
(22, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-19 14:43:02', 1),
(23, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-20 05:57:16', 1),
(24, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-20 18:13:56', 1),
(25, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-20 18:13:56', 1),
(26, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-21 06:10:52', 1),
(27, '::1', 'hakim@gmail.com', 35, '2021-03-21 15:33:03', 1),
(28, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-23 15:06:37', 1),
(29, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-23 15:06:37', 1),
(30, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-24 07:43:26', 1),
(31, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-24 22:19:19', 1),
(32, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-25 08:34:19', 1),
(33, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-25 09:18:55', 1),
(34, '::1', 'zaiabdullah99@gmail.com', 3, '2021-03-25 17:01:09', 1),
(35, '::1', 'hakim@gmail.com', 35, '2021-03-25 23:04:52', 1),
(36, '::1', 'petugas@gmail.com', 19, '2021-03-25 23:34:47', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `selector`, `hashedValidator`, `user_id`, `expires`) VALUES
(64, 'eb13cc93b86d31b02c3cfebf', '619028d024dd615bf7b74c40fac3ed1af73864a51e8a61f0b8179cfc6880b60e', 35, '2021-04-20 15:33:03'),
(66, '2236bec1c4f5406e8665ebcb', '05c3a1fff06540d31c0b92e0061e1dc64381d6437c86fd4d022e4f59cac8d5de', 35, '2021-04-24 23:04:52'),
(67, 'd554ac2b54605e8458158543', '1ee1963d6821e12b217f4ffa796407f230f884c42f172c578898c8c95299a6e1', 19, '2021-04-24 23:34:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id_contact`, `user_id`, `subject`, `nama_lengkap`, `email`, `pesan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 20, 'testing subject ini adalah subject 6', 'testing nama lengkap 6', 'zaiabdullah99@gmail.com', 'https://tryout.gunadarma.ac.id/ujian/mulai/get.1 https://tryout.gunadarma.ac.id/ujian/mulai/get.1<br>\r\n<br>\r\ntesting pesan https://tryout.gunadarma.ac.id/ujian/mulai/get.1<br>\r\n<br>\r\n^_^', '2021-02-22 10:03:56', '2021-02-22 10:03:56', NULL),
(3, 20, 'testing subject ini adalah subject 7', 'testing nama lengkap 7', 'zaiabdullah99@gmail.com', 'testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan \r\n\r\ntesting pesan cuy isi pesan ^_^', '2021-02-22 10:22:38', '2021-02-22 10:22:38', NULL),
(4, 20, 'testing subject ini adalah subject 8', 'testing nama lengkap 8', 'zaiabdullah99@gmail.com', 'testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan \r\n\r\ntesting pesan cuy isi pesan ^_^', '2021-02-22 10:25:30', '2021-02-22 10:25:30', NULL),
(6, 20, 'testing subject ini adalah subject 9', 'testing nama lengkap 9', 'zaiabdullah99@gmail.com', 'testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan \r\n\r\ntesting pesan cuy isi pesan ^_^', '2021-02-22 10:37:45', '2021-02-22 10:37:45', NULL),
(8, 20, 'testing subject ini adalah subject 11', 'testing nama lengkap 11', 'zaiabdullah99@gmail.com', 'testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan \r\n\r\ntesting pesan cuy isi pesan ^_^', '2021-02-22 10:49:59', '2021-02-22 10:49:59', NULL),
(9, 20, 'Apakah subject ini masuk?', 'Zainudin Abdullah', 'zaiabdullah99@gmail.com', 'Bismillah testing yang terakhir\r\n\r\ntesting isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan testing isi pesan \r\n\r\ntesting pesan cuy isi pesan ^_^', '2021-02-22 10:51:23', '2021-02-22 10:51:23', NULL),
(10, 3, 'subject testing cuy tes', 'nama lengkap', 'gmail@gmail.com', 'testing penerapan form recaptcha agar mengurangi sedikit kemungkinan adanya spam ataupun spammer, t\r\n\r\ntesting recaptcha v2', '2021-02-22 11:47:39', '2021-02-22 11:47:39', NULL),
(11, 36, 'Penawaran Kerjasama - Desa Ciketingudik', 'Muhammad', 'email@ciketingudik.com', 'Yth. SKPM - Zain App\r\nKami selaku pemerintah desa Ciketingudik ingin menawarkan kerjasama, yaitu berupa penggunaan aplikasi ini di desa kami.\r\n\r\nTerimakasih.', '2021-03-14 18:08:11', '2021-03-14 18:08:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `filter_kata_kotor`
--

CREATE TABLE `filter_kata_kotor` (
  `id_filter` int(11) UNSIGNED NOT NULL,
  `kata_kotor` varchar(255) NOT NULL,
  `filter_kata` varchar(22) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `filter_kata_kotor`
--

INSERT INTO `filter_kata_kotor` (`id_filter`, `kata_kotor`, `filter_kata`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'bangsat', 'b*****t', '2021-03-03 08:42:19', '2021-03-14 20:41:11', NULL),
(2, 'anjing', 'a****g', '2021-03-03 08:42:57', '2021-03-14 20:40:51', NULL),
(3, 'bajingan', 'b******n', '2021-03-03 08:44:35', '2021-03-14 20:41:30', NULL),
(4, 'fuck', 'f***', '2021-03-03 09:13:11', '2021-03-03 09:13:11', NULL),
(6, 'fu', '**', '2021-03-03 20:00:43', '2021-03-03 23:28:38', NULL),
(7, 'kotor', 'k***r', '2021-03-03 23:30:05', '2021-03-03 23:30:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `id_kk` int(20) UNSIGNED NOT NULL,
  `rw_id` int(11) UNSIGNED NOT NULL,
  `rt_id` int(11) UNSIGNED NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `jenis_kelamin` enum('l','p') NOT NULL,
  `agama` enum('islam','protestan','katolik','hindu','buddha','konghucu') NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `status_hubungan` enum('Kepala Keluarga','Suami','Istri','Anak','Famili Lain','Lainnya') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`id_kk`, `rw_id`, `rt_id`, `no_kk`, `user_id`, `jenis_kelamin`, `agama`, `pekerjaan`, `status_hubungan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 1, 2, '3275071010021123', 1, 'l', 'islam', 'Web Developer', 'Kepala Keluarga', '2021-03-24 19:25:27', '2021-03-25 17:49:57', NULL),
(14, 2, 4, '3275071010021127', 22, 'p', 'katolik', 'Ibu Rumah Tangga', 'Kepala Keluarga', '2021-03-24 19:27:41', '2021-03-24 23:11:39', NULL),
(15, 1, 2, '3275071010021123', 27, 'p', 'islam', 'Ibu Rumah Tangga', 'Istri', '2021-03-25 17:42:24', '2021-03-25 17:42:24', NULL),
(16, 1, 2, '3275071010021123', 35, 'l', 'islam', 'Karyawan Swasta', 'Famili Lain', '2021-03-25 17:48:13', '2021-03-25 17:48:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(5, '2020-11-29-155331', 'App\\Database\\Migrations\\Pengaduan', 'default', 'App', 1613458991, 1),
(6, '2020-12-24-163743', 'App\\Database\\Migrations\\Quotes', 'default', 'App', 1613458992, 1),
(7, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1613460138, 2),
(8, '2021-01-12-155534', 'App\\Database\\Migrations\\Percakapan', 'default', 'App', 1613462328, 3),
(9, '2021-02-16-075952', 'App\\Database\\Migrations\\Subscriber', 'default', 'App', 1613462873, 4),
(10, '2021-02-16-080021', 'App\\Database\\Migrations\\Percakapan', 'default', 'App', 1613462948, 5),
(11, '2021-02-17-053221', 'App\\Database\\Migrations\\PengaduanKategori', 'default', 'App', 1613922690, 6),
(12, '2021-02-21-153744', 'App\\Database\\Migrations\\Contact', 'default', 'App', 1613922692, 6),
(13, '2021-02-24-020917', 'App\\Database\\Migrations\\Testimoni', 'default', 'App', 1614132719, 7),
(14, '2021-02-24-075751', 'App\\Database\\Migrations\\Testimoni', 'default', 'App', 1614153550, 8),
(15, '2021-02-24-092119', 'App\\Database\\Migrations\\Testimoni', 'default', 'App', 1614158558, 9),
(16, '2021-02-26-185707', 'App\\Database\\Migrations\\Setting', 'default', 'App', 1614426401, 10),
(17, '2021-02-27-174921', 'App\\Database\\Migrations\\Setting', 'default', 'App', 1614448492, 11),
(18, '2021-03-03-010003', 'App\\Database\\Migrations\\FilterKatakotor', 'default', 'App', 1614733542, 12),
(19, '2021-03-10-115340', 'App\\Database\\Migrations\\Pengunjung', 'default', 'App', 1615377570, 13),
(20, '2021-03-15-145840', 'App\\Database\\Migrations\\KartuKeluarga', 'default', 'App', 1615822524, 14),
(21, '2021-03-17-004418', 'App\\Database\\Migrations\\RukunTetangga', 'default', 'App', 1615942060, 15),
(22, '2021-03-17-004428', 'App\\Database\\Migrations\\RukunWarga', 'default', 'App', 1615942061, 15),
(23, '2021-03-24-041357', 'App\\Database\\Migrations\\RukunWarga', 'default', 'App', 1616559477, 16),
(24, '2021-03-24-041405', 'App\\Database\\Migrations\\RukunTetangga', 'default', 'App', 1616559692, 17),
(25, '2021-03-24-041302', 'App\\Database\\Migrations\\KartuKeluarga', 'default', 'App', 1616559720, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) UNSIGNED NOT NULL,
  `kode_pengaduan` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `isi_laporan` longtext NOT NULL,
  `status` enum('arsip','pending','proses','selesai') NOT NULL DEFAULT 'pending',
  `anonim` int(11) DEFAULT 0,
  `lampiran` varchar(255) NOT NULL,
  `hasil_akhir` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `kode_pengaduan`, `user_id`, `kategori_id`, `isi_laporan`, `status`, `anonim`, `lampiran`, `hasil_akhir`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'K1-0002', 1, 6, 'Mau ambil cap sama minta tanda tangan ente Mau ambil cap sama minta tanda tangan ente Mau ambil cap sama minta tanda tangan ente Mau ambil cap sama minta tanda tangan ente Mau ambil cap sama minta tanda tangan ente Mau ambil cap sama minta tanda tangan ente', 'arsip', 1, '1613474524_ab4bc817c8255cb11d55.png', NULL, '2021-01-01 18:22:04', '2021-03-01 15:14:31', NULL),
(6, 'K1-0003', 1, 3, 'Ada sebuah keluarga yang tidak mampu, yang tidak pernah mendapatkan bantuan sosial dari pemerintah. Saya sungguh miris melihat ini,', 'proses', 0, '1613515585_8363dc426605cfa7f3b2.png', NULL, '2021-01-03 05:46:25', '2021-03-05 22:46:35', NULL),
(9, 'K1-0004', 1, 1, 'Terima kasih atas tindak lanjut terhadap laporan kami sebelumnya terkait penggunaan toa masjid dan mushola yang terdengar di wilayah rw 10, kelurahan jati padang, pasar minggu. akan tetapi setelah hampir satu bulan dan kesekian aduan yang kami sampaikan, masjid dan mushola sekitar belum mengikuti aturan karena pada waktu subuh magrib dan isha masjid masih menggunakan toa ke luar untuk zikir sholat berjamaah dan doa/ceramah setelah sholat. dan melanggar aturan yang sudah jelas tercantum di instruksi direktur jenderal bimbingan masyarakat islam nomor kep/d/101/1978 tentang tuntunan penggunaan pengeras suara di masjid, langgar, dan mushalla bahwa hal-hal tersebut hanya boleh menggunakan toa ke dalam.\r\n\r\nkami melaporkan aduan ini karena hal tersebut karena warga ingin istirahat di pagi, sore, atau malam hari tetapi terganggu dengan suara-suara dari masjid yang berlangsung sampai 30 menit setelah azan yang tidak perlu menggunakan toa ke luar, di mana ini juga tidak mengikuti anjuran agama agar tidak meninggikan suara sholat dan dzikir melebih keperluan, yaitu dalam hal ini hanya perlu menggunakan toa ke dalam\r\n\r\nmohon setelah dilakukan koordinasi juga dilakukan pengawasan dan diberi tindakan yang tegas bagi masjid dan mushola yang masih tidak mengikuti aturan, yaitu yang masih menggunakan toa ke luar selain untuk adzan, seperti untuk dzikir doa sholat dan ceramah, agar masjid dan mushola benar-benar memahami aturan yang sudah disosialisasikan\r\n\r\nberikut ini beberapa masjid dan mushola di wilayah di mana kami masih mendengar penggunaan toa ke luar untuk selain azan, yang mungkin dilakukan oleh satu atau dua masjid/mushola di bawah ini\r\n\r\n- mushola madrasah hidayatul anam\r\ngg. madrasah no.45 b, rt.5/rw.10, jati padang, kec. ps. minggu\r\n\r\n- masjid jami al-istiqomah\r\njl. bacang, rt.8/rw.1, jati padang, kec. ps. minggu\r\n\r\n- masjid jami an-nur,\r\njl. ketapang no.63, rt.5/rw.2, jati padang, kec. ps. minggu\r\n\r\n- musholla at-taqwa\r\njl. jati murni no no.dalam, rt.5/rw.002, kel, jati padang, kec. ps. minggu\r\n\r\nkami lampirkan kembali potongan surat edaran mengenai aturan penggunaan toa masjid dan mushola agar dapat disosialisasikan & dipahami kembali dan ditaati', 'selesai', 0, '1613663695_d9a630babc7df2d2eb58.png', 'Laporan sudah kami konfirmasi dan akan kami sampaikan kepada Lurah yang ada di daerah tersebut. Segera mungkin akan ditindaklanjuti.\r\n\r\nTerimakasih atas laporannya ^_^', '2021-01-18 03:16:06', '2021-02-21 11:38:38', NULL),
(25, 'K1-0005', 1, 2, 'Testing kata bangsat anjing bajingan fuck pucek picek testing kata Testing kata bangsat anjing bajingan fuck pucek picek testing kata', 'arsip', 0, '1614782304_6f6ba58d21b4f941dd8a.png', NULL, '2021-02-03 21:38:24', '2021-03-04 11:44:30', NULL),
(27, 'K20-0001', 20, 2, 'Menkes RI yang terhormat, tolong inspeksi ke RSUD WZ. Yohanis, Kupang. Jika pasien tidak mampu, operasi penyakit dalam diminta bayar sekitar 10 juta, meskipun ada keterangan tidak mampu. Apakah ini benar?', 'proses', 0, '1615626019_04218d2f93cd5de9a93c.png', NULL, '2021-02-13 16:00:19', '2021-03-21 12:40:36', NULL),
(28, 'K32-0001', 32, 8, 'Proyek Normalisasi Sungai Juwana di Kabupaten Pati Provinsi Jawa Tengah sejak 2010-2012 sudah menelan biaya lebih dari 60 miliar rupiah. Akan tetapi setelah kami telusuri, uang sebesar itu baru digunakan untuk melakukan pengerukan sungai sepanjang 25,42 kilometer. Sedangkan panjang alur Sungai Juwana adalah 62,50 kilometer.\r\n\r\nSaya melihat proyek ini terlalu mahal; karena berarti setiap 1 kilometer menelan biaya lebih dari 2 miliar. Sedangkan berbagai persoalan baik teknis maupun sosial masih melingkupi proyek ini. mohon disidan atau disidik. Sepertinya kok ada mark up! Anggota DPR RI seperti Marwan Jakfar, Imam Suroso (keduanya berasal dari Kabupaten Pati) mengaku aktif memperjuangkan proyek ini.', 'pending', 0, '1615627557_35fc0e0035a40e60a32c.png', NULL, '2021-03-13 16:25:57', '2021-03-13 16:25:57', NULL),
(29, 'K32-0002', 32, 8, 'Banyak jalan berlubang sepanjang Jalan Raya Jakarta-Bogor. Jalur yang saya lewati dari KM 32 s.d. KM 47, dimana jalan berlubang ada di dua sisi jalan (dari dan ke arah Bogor). Mohon segera diperbaiki.', 'pending', 0, '1615628261_820adb68dc4b08bf806f.png', NULL, '2021-03-13 16:37:41', '2021-03-13 16:37:41', NULL),
(30, 'K33-0001', 33, 3, 'Apakah benar pembuatan E-KTP harus membayar Rp. 5.000 per KTP? Karena di desa saya, Desa Pusaka Rakyat, Kecamatan Tarumajaya, Kabupaten Bekasi Utara, saya dikenakan biaya sebesar itu. Padahal info yang saya terima, biaya E-KTP adalah gratis.\r\nSeperti apa aturan yang sebenarnya? Dan jika memang aturan sebenarnya tidak dikenakan biaya, kami meminta uang kami dikembalikan beserta permintaan maaf dari aparat.', 'pending', 0, '1615628441_6ca03d4424d2887a5687.png', NULL, '2021-03-13 16:40:41', '2021-03-13 16:40:41', NULL),
(31, 'K34-0001', 34, 11, 'Saya ingin melaporkan tentang dugaan tercemarnya air di lingkungan rumah saya yang diduga disebabkan oleh salah satu pabrik di lingkungan rumah tepatnya di Jl. Manyar 2 RT 002 / RW 015 Kelurahan Tegal Alur, Kecamatan Kalideres, Jakarta barat tepatnya di rumah saya no. 95 dan sekitarnya. Saat ini air di lingkungan rumah saya sudah berwarna kuning cerah dan agak bening seperti minuman berenergi dan itu sudah berlangsung beberapa bulan ini dan sangat mengganggu kesehatan, serta menyulitkan warga yang tidak memiliki air PAM. Sebelumnya saya sudah sempat melakukan pengaduan secara online ke Dinas Kesehatan Jakarta, akan tetapi tidak mendapat tanggapan. Semoga dengan saya mengadukan hal tersebut melalui LAPOR!, segera dapat ditindaklanjuti.\r\nTerima kasih.', 'selesai', 0, '1615628756_5d48e9e2859695727ce3.png', 'Laporan sudah ditindaklanjuti oleh pihak yang berwenang.\r\n\r\nTerimakasih ^_^', '2021-03-13 16:45:56', '2021-03-14 19:07:15', NULL),
(32, 'K35-0001', 35, 8, 'Pak lampu jalan mati di depan Adea Mini Mart di Simpang Tiga Padang Ribu-ribu Ampang Kualo Kel. Kampung Jawa Kec Tanjung Harapan, tolong di perbaiki pak.\r\nTerimakasih..', 'pending', 0, '1616315731_379ab885b1dd93a3b65a.png', NULL, '2021-03-21 15:35:31', '2021-03-21 15:35:31', NULL),
(33, 'K35-0002', 35, 1, 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing ', 'pending', 0, '1616688384_d94100ef024349b0f435.png', NULL, '2021-03-25 23:06:24', '2021-03-25 23:06:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_kategori`
--

CREATE TABLE `pengaduan_kategori` (
  `id_pengaduan_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan_kategori`
--

INSERT INTO `pengaduan_kategori` (`id_pengaduan_kategori`, `nama_kategori`) VALUES
(1, 'Agama'),
(2, 'Kesehatan'),
(3, 'Ekonomi dan Keuangan'),
(4, 'Politik dan Hukum'),
(5, 'Kesetaraan Gender'),
(6, 'Ketentraman dan Ketertiban Umum'),
(7, 'Pendidikan dan Kebudayaan'),
(8, 'Pembangunan Desa'),
(9, 'Pertanian dan Peternakan'),
(10, 'Sosial dan Kesejahteraan'),
(11, 'Energi dan Sumberdaya Alam'),
(12, 'Teknologi Informasi dan Komunikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` varchar(255) NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `ip_address`, `date`, `hits`, `online`, `time`) VALUES
(1, '::1', '2021-01-01', 0, '1615391542', '2021-01-01 20:47:20'),
(2, '192.168.0.104', '2021-01-02', 0, '1615391987', '2021-01-02 21:14:45'),
(3, '::1', '2021-01-03', 1, '1615432775', '2021-01-03 10:19:35'),
(4, '::1', '2021-01-04', 0, '1615558981', '2021-01-04 20:22:58'),
(5, '::1', '2021-03-13', 0, '1615642280', '2021-03-13 06:31:58'),
(6, '192.168.0.104', '2021-03-13', 0, '1615651920', '2021-03-13 09:57:46'),
(7, '::1', '2021-02-10', 0, '1615391542', '2021-02-10 20:47:20'),
(8, '192.168.0.104', '2021-02-10', 0, '1615391987', '2021-02-10 21:14:45'),
(9, '::1', '2021-02-11', 1, '1615432775', '2021-02-11 10:19:35'),
(10, '::1', '2021-03-12', 0, '1615558981', '2021-03-12 20:22:58'),
(11, '::1', '2021-03-13', 0, '1615642280', '2021-03-13 06:31:58'),
(12, '192.168.0.104', '2021-03-13', 0, '1615651920', '2021-03-13 09:57:46'),
(13, '::1', '2021-03-14', 0, '1615732672', '2021-03-14 14:10:47'),
(14, '::1', '2021-03-15', 0, '1615812204', '2021-03-15 13:04:57'),
(15, '::1', '2021-03-16', 0, '1615871178', '2021-03-16 07:30:08'),
(16, '::1', '2021-03-18', 1, '1616053968', '2021-03-18 14:52:48'),
(17, '::1', '2021-03-19', 1, '1616139792', '2021-03-19 14:43:12'),
(18, '::1', '2021-03-21', 0, '1616315733', '2021-03-21 06:10:57'),
(19, '::1', '2021-03-23', 1, '1616486795', '2021-03-23 15:06:35'),
(20, '::1', '2021-03-23', 1, '1616486795', '2021-03-23 15:06:35'),
(21, '::1', '2021-03-24', 0, '1616549730', '2021-03-24 07:43:24'),
(22, '::1', '2021-03-25', 0, '1616690091', '2021-03-25 09:19:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `percakapan`
--

CREATE TABLE `percakapan` (
  `id_percakapan` int(11) UNSIGNED NOT NULL,
  `kode_pengaduan` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `petugas_id` int(11) UNSIGNED NOT NULL,
  `percakapan` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `percakapan`
--

INSERT INTO `percakapan` (`id_percakapan`, `kode_pengaduan`, `user_id`, `petugas_id`, `percakapan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'K1-0002', 1, 3, 'oke testing bales', '2021-02-16 18:24:10', '2021-02-16 18:24:10', NULL),
(2, 'K1-0002', 1, 0, 'hai admin apa kabar? gimana lanjutan proses pengaduan say ya?', '2021-02-16 22:18:19', '2021-02-16 22:18:19', NULL),
(3, 'K1-0002', 1, 0, 'oke siap', '2021-02-17 12:02:20', '2021-02-17 12:02:20', NULL),
(6, 'K1-0003', 1, 3, '<script>alert(\'testing testin\')</script>', '2021-02-18 13:34:23', '2021-02-18 13:34:23', NULL),
(7, 'K1-0003', 1, 3, 'testing\r\n\r\nenter 1x\r\n\r\n\r\nenter 2x', '2021-02-18 13:34:43', '2021-02-18 13:34:43', NULL),
(8, 'K1-0003', 1, 3, 'asdasda\r\nasdas\r\n\r\nasdasda\r\n\r\nasdasda', '2021-02-18 13:40:22', '2021-02-18 13:40:22', NULL),
(9, 'K1-0004', 1, 3, 'Baik, informasi sudah kami konfirmasi dan akan kami sampaikan kepada Lurah yang ada di daerah tersebut.\r\n\r\nTerimakasih atas laporannya ^_^', '2021-02-20 23:34:18', '2021-02-20 23:34:18', NULL),
(10, 'K1-0002', 1, 19, 'testing balasan dari petugas.\r\ntesintg', '2021-02-21 09:50:17', '2021-02-21 09:50:17', NULL),
(38, 'K1-0005', 1, 0, 'testing pengaduan kata kasar anjing dari user', '2021-03-03 21:42:10', '2021-03-03 21:42:10', NULL),
(39, 'K1-0005', 1, 0, 'Testing kata kasar anjing 2. testing fuck pucek picek coy', '2021-03-03 22:20:55', '2021-03-03 22:20:55', NULL),
(40, 'K1-0005', 1, 3, 'anda berakta kasar ya, akan saya arsipkan pengaduan Anda, Terimakasih...', '2021-03-03 22:39:02', '2021-03-03 22:39:02', NULL),
(41, 'K1-0003', 1, 19, 'Testing balasan pesan dari Petugas\r\n\r\nusername: petugas', '2021-03-04 11:46:57', '2021-03-04 11:46:57', NULL),
(42, 'K34-0001', 34, 3, 'Baik, Laporan sudah kami konfirmasi dan akan kami tindak sesuai aturan dan peraturan yang berlaku.\r\n\r\nTerimakasih atas Laporannya.', '2021-03-14 19:06:24', '2021-03-14 19:06:24', NULL),
(43, 'K20-0001', 20, 3, 'Teriakasih atas Laporannya,\r\ntapi dapat saya yakini 100% bahwa keterangan tersebut tidak benar, itu merupakan oknum.\r\n\r\nSelanjutnya akan kami tindak tegas, Terimakasih.', '2021-03-21 12:40:36', '2021-03-21 12:40:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotes`
--

CREATE TABLE `quotes` (
  `id_quotes` int(11) UNSIGNED NOT NULL,
  `quote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `quotes`
--

INSERT INTO `quotes` (`id_quotes`, `quote`) VALUES
(1, 'Sesulit apapun masalah yang kita hadapi saat ini, ia bukan sesuatu yang harus dihindari, tetapi harus diselesaikan'),
(2, 'Hubungkan semua urusan hanya pada Allah agar semua yang susah menjadi mudah; semua urusan berkah, berkah, berkah'),
(3, 'Tahapan untuk meraih kesuksesan itu panjang. Dari persiapan, percobaan, ujian dan kemenangan'),
(4, 'Dari mana datangnya inspirasi, dari visi turun ke kerja keras tanpa henti. Tak sedikit orang bervisi, tapi segelintir yang mampu menggerakkan banyak pribadi'),
(5, 'Yakin kepada Allah, bermimpi yang besar, kerja keras, maka kesuksesan akan datang kepadamu'),
(7, 'Ketahuilah bahwa kemenangan bersama kesabaran, kelapangan bersama kesempitan, dan kesulitan bersama kemudahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rukun_tetangga`
--

CREATE TABLE `rukun_tetangga` (
  `id_rt` int(20) UNSIGNED NOT NULL,
  `rw_id` int(11) UNSIGNED NOT NULL,
  `no_rt` varchar(11) NOT NULL,
  `nama_rt` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rukun_tetangga`
--

INSERT INTO `rukun_tetangga` (`id_rt`, `rw_id`, `no_rt`, `nama_rt`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '01', 'Amar Wirasuta', '2021-03-24 11:54:51', '2021-03-24 11:54:51', NULL),
(2, 1, '02', 'Andrian', '2021-03-24 11:55:23', '2021-03-24 11:55:23', NULL),
(3, 3, '01', 'Ilham Pambudi', '2021-03-24 11:56:00', '2021-03-24 11:56:00', NULL),
(4, 2, '01', 'Muhammad Reza Nugraha', '2021-03-24 11:56:17', '2021-03-24 11:56:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rukun_warga`
--

CREATE TABLE `rukun_warga` (
  `id_rw` int(20) UNSIGNED NOT NULL,
  `no_rw` varchar(11) NOT NULL,
  `nama_rw` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rukun_warga`
--

INSERT INTO `rukun_warga` (`id_rw`, `no_rw`, `nama_rw`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '01', 'Zainudin Abdullah', '2021-03-24 11:43:25', '2021-03-24 11:43:25', NULL),
(2, '02', 'Muhammad Sultan', '2021-03-24 11:43:46', '2021-03-24 11:43:46', NULL),
(3, '03', 'Dimas Aryasatya', '2021-03-24 11:43:58', '2021-03-24 11:43:58', NULL),
(4, '04', 'Aditya Hendri', '2021-03-24 11:44:11', '2021-03-24 11:44:11', NULL),
(5, '05', 'Ardila Eka', '2021-03-24 11:44:43', '2021-03-24 11:44:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) UNSIGNED NOT NULL,
  `nama_aplikasi_frontend` varchar(255) NOT NULL,
  `nama_aplikasi_backend` varchar(255) NOT NULL,
  `nohp_setting` varchar(15) NOT NULL,
  `alamat_setting` varchar(255) NOT NULL,
  `email_setting` varchar(255) NOT NULL,
  `lc_1_nama` varchar(255) DEFAULT NULL,
  `lc_1_url` varchar(255) DEFAULT NULL,
  `lc_2_nama` varchar(255) DEFAULT NULL,
  `lc_2_url` varchar(255) DEFAULT NULL,
  `lc_3_nama` varchar(255) DEFAULT NULL,
  `lc_3_url` varchar(255) DEFAULT NULL,
  `lc_4_nama` varchar(255) DEFAULT NULL,
  `lc_4_url` varchar(255) DEFAULT NULL,
  `lc_5_nama` varchar(255) DEFAULT NULL,
  `lc_5_url` varchar(255) DEFAULT NULL,
  `somed_1_font` varchar(255) DEFAULT NULL,
  `somed_1_url` varchar(255) DEFAULT NULL,
  `somed_2_font` varchar(255) DEFAULT NULL,
  `somed_2_url` varchar(255) DEFAULT NULL,
  `somed_3_font` varchar(255) DEFAULT NULL,
  `somed_3_url` varchar(255) DEFAULT NULL,
  `somed_4_font` varchar(255) DEFAULT NULL,
  `somed_4_url` varchar(255) DEFAULT NULL,
  `somed_5_font` varchar(255) DEFAULT NULL,
  `somed_5_url` varchar(255) DEFAULT NULL,
  `map_link` text NOT NULL,
  `footer_frontend` text NOT NULL,
  `footer_backend` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_aplikasi_frontend`, `nama_aplikasi_backend`, `nohp_setting`, `alamat_setting`, `email_setting`, `lc_1_nama`, `lc_1_url`, `lc_2_nama`, `lc_2_url`, `lc_3_nama`, `lc_3_url`, `lc_4_nama`, `lc_4_url`, `lc_5_nama`, `lc_5_url`, `somed_1_font`, `somed_1_url`, `somed_2_font`, `somed_2_url`, `somed_3_font`, `somed_3_url`, `somed_4_font`, `somed_4_url`, `somed_5_font`, `somed_5_url`, `map_link`, `footer_frontend`, `footer_backend`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SKPM - Zain App', 'Zain App', '085157615586', 'Jl. Raya Narogong Km. 12, Bekasi, Indonesia', 'yumikasoftware@gmail.com', 'Home', '/', 'Lapor!', 'lapor', 'Cari Laporan', 'cari-laporan', 'Tentang Kami', 'tentang', 'Hubungi Kami', 'hubungi', 'fab fa-facebook-f', 'https://instagram.com/zaiabdullah_91/', 'fab fa-twitter', 'https://instagram.com/zaiabdullah_91/', 'fas fa-globe', 'https://instagram.com/zaiabdullah_91/', 'fab fa-youtube', 'https://instagram.com/zaiabdullah_91/', 'fab fa-instagram', 'https://instagram.com/zaiabdullah_91/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2958866074787!2d106.98985671434191!3d-6.3557315639462155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c22161d4051%3A0x7a0a35b288779341!2sSMK%20Negeri%202%20Kota%20Bekasi!5e0!3m2!1sid!2sid!4v1607004479421!5m2!1sid!2sid', '<span>\r\n\r\n                                    Copyright ©  All rights reserved | Template by <a target=\"_blank\" rel=\"nofollow\" href=\"https://colorlib.com\">Colorlib</a> | Develop and Re-Design by <a target=\"_blank\" rel=\"nofollow\" href=\"https://instagram.com/zaiabdullah_91/\">Zainudin Abdullah</a>\r\n\r\n                                </span>', '<span>Develop and Re-Design by <a target=\"_blank\" rel=\"nofollow\" href=\"https://instagram.com/zaiabdullah_91/\">Zainudin Abdullah</a> - UJIKOM | Template By <a target=\"_blank\" rel=\"nofollow\" href=\"https://github.com/dropways\">Ankit Hingarajiya</a></span>', NULL, '2021-03-05 14:43:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscriber`
--

CREATE TABLE `subscriber` (
  `id_subscriber` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `subscriber`
--

INSERT INTO `subscriber` (`id_subscriber`, `user_id`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 1, 'yumikasoftware@gmail.com', '2021-02-16 17:22:28', '2021-02-16 17:22:28', NULL),
(5, 1, 'zaiabdullah99@gmail.com', '2021-02-18 22:33:49', '2021-02-18 22:33:49', NULL),
(6, 20, 'testingsubscribe@gmail.com', '2021-03-01 19:26:17', '2021-03-01 19:26:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `testimoni` text NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `user_id`, `testimoni`, `pekerjaan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'Program yang sangat baik, menjadi bukti pemerintah menjunjung tinggi nilai demokrasi. Kita dapat menyampaikan aspirasi, pengaduan dan meminta bantuan untuk menyelesaikan permasalahan warga.  Memanfaatkan media elektronik dan media sosial yang diakrabi oleh generasi muda.', 'Pelajar SMP', '2021-02-24 16:24:28', '2021-02-24 20:23:50', NULL),
(2, 20, 'Pemerintah yang modern mendengarkan keluhan rakyatnya melalui SKPM - Zain App, sebuah inovasi karya anak bangsa. Salut untuk SKPM - Zain App!', 'CEO - Nasihosting', '2021-02-24 16:33:24', '2021-02-24 16:33:24', NULL),
(3, 1, 'SKPM - Zain App adalah sarana partisipasi masyarakat berbasis media sosial yang mudah dan terpadu untuk pengawasan pembangunan infrastruktur desa dan pelayanan publik di Indonesia.', 'Kuli Proyek', '2021-02-24 16:34:11', '2021-02-24 16:34:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `nik` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `email`, `user_image`, `fullname`, `username`, `no_hp`, `alamat`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1234567890123456', 'yumikasoftware@gmail.com', '1613665129_cbbac98cca77aeb8715a.png', 'Zainudin Masyarakat', 'zainudin', '081292676265', 'JL. Raya Narogong Km. 12, Rt. 03/01 No. 41 Kelurahan Cikiwul, Kecamatan Bantargebang, Kota Bekasi', '$2y$10$r2Nfbs5iz4ouyiYcuTC8KeyahoTBZu0FkXhE1w8z2j0EO04LPk8rW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-16 14:28:39', '2021-02-18 23:18:49', NULL),
(3, '1123567890123456', 'zaiabdullah99@gmail.com', '1615392342_a5c21df6a464958d43d8.jpg', 'Zainudin Abdullah', 'yUm1k4', '081292676265', 'JL. Raya Narogong Km. 12, Rt. 03/01 No. 41 Kelurahan Cikiwul, Kecamatan Bantargebang, Kota Bekasi', '$2y$10$SBkXKsnG2C6N7919IGObPOV6P1.FR2DEFgwsVNNdtljVWCP19/JgG', '52cb0ff50cab5ef13b2a3f336fc5a69e', NULL, '2021-03-14 18:43:03', NULL, NULL, NULL, 1, 0, '2021-02-16 14:36:27', '2021-03-14 17:43:03', NULL),
(15, '1234123412341234', 'zainudinmasyarakat2@gmail.com', '1613516667_3e37c7279553f8657b80.png', 'Zainudin Masyarakat Dua', 'zainudinmasyarakat2', '081292676265', 'JL. Raya Narogong Km. 12, Rt. 03/01 No. 41 Kelurahan Cikiwul, Kecamatan Bantargebang, Kota Bekasi', '$2y$10$gukipIGCr3ZcDCBV5g3aC.F4morLyc0ijTyDqpSWnKIyCDO75hB4C', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-17 05:49:11', '2021-02-17 06:04:27', NULL),
(19, '1234541234567891', 'petugas@gmail.com', '1614833520_bfd259b68c1a3a6aa804.jpg', 'Zainudin Petugas', 'petugas', '081292676265', 'JL. Raya Narogong Km. 12, Rt. 03/01 No. 41 Kelurahan Cikiwul, Kecamatan Bantargebang, Kota Bekasi', '$2y$10$0BLLSOZvUg8wXHXxr7.mr.VaWlkjgY2dQspUxzupHuDOcrPFkO85S', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-20 20:11:04', '2021-03-04 11:52:00', NULL),
(20, '1234567890231490', 'zain@gmail.com', '1614601545_dae03a7a1badf98bc88a.jpg', 'Zainudin Abdullah', 'zain', '081292676265', 'JL. Raya Narogong Km. 12, Rt. 03/01 No. 41 Kelurahan Cikiwul, Kecamatan Bantargebang, Kota Bekasi', '$2y$10$cvyLJTpiuf5k5nAYkplGGu5cdpxxF.Tmrr0k5bNpUDb8WswgjSCEC', NULL, NULL, NULL, NULL, 'unban', NULL, 1, 0, '2021-02-20 22:55:52', '2021-03-01 19:25:45', NULL),
(21, '3529031611924447', 'gandi.siregar@farida.mil.id', NULL, 'Tira Wulandari S.Farm', 'usafitri', '(+62) 266 024', 'Jr. Labu No. 927, Yogyakarta 72160, NTB', 'R_@[;&-&5d:3!P$m', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-03-02 06:51:27', '2021-03-02 06:51:27', NULL),
(22, '1218765010078204', 'anggraini.ella@yahoo.co.id', NULL, 'Julia Oktaviani', 'rahmi.nashiruddin', '(+62) 711 250', 'Dk. Baranang Siang Indah No. 386, Mataram 62395, Bali', 'lP)?:,r9Nd<bO\'', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-03-02 06:53:11', '2021-03-02 06:53:11', NULL),
(23, '1672226305147234', 'faker-pardi29@mayasari.info', NULL, 'faker Novi Nasyiah', 'ykusumo', '(+62) 934 963', 'Gg. Bakhita No. 415, Kupang 86809, SumSel', 'goaF:PXl', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-03-02 06:58:46', '2021-03-02 06:58:46', NULL),
(24, '1407964312941019', 'faker-gawati09@latupono.web.id', NULL, 'faker Vanya Novi Novitasari S.Psi', 'zwinarsih', '(+62) 826 501', 'Ds. K.H. Maskur No. 132, Cimahi 43782, Bengkulu', '^tZ~P`ggLh)3J.l}zaF', NULL, NULL, NULL, NULL, 'banned', 'Akun palsu', 0, 0, '2021-03-02 06:58:47', '2021-03-14 20:28:14', NULL),
(25, '7207694303950655', 'faker-ade.mangunsong@gmail.co.id', NULL, 'faker Mujur Waskita S.H.', 'wibisono.daru', '0846 440 142', 'Dk. Lumban Tobing No. 214, Banjarbaru 80721, SulSel', 'G1U#@afcBw9c^PZ^Xwo', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-03-02 06:58:47', '2021-03-02 06:58:47', NULL),
(26, '3319530606106582', 'faker-wijaya.hani@damanik.biz.id', NULL, 'faker Ifa Hariyah', 'elma.tampubolon', '(+62) 996 244', 'Ds. Sam Ratulangi No. 680, Magelang 16514, DIY', 'gOQ/N?>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-03-02 06:58:47', '2021-03-02 06:58:47', NULL),
(27, '3573541710965486', 'faker-nwaskita@sudiati.co.id', NULL, 'faker Titin Hassanah', 'slestari', '026 6130 922', 'Ki. Ikan No. 729, Bandung 10884, Jambi', '=Ijkw>KeM@LFpY=]N', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-03-02 06:58:47', '2021-03-02 06:58:47', NULL),
(28, '1372871806172300', 'faker-hrajata@jailani.ac.id', NULL, 'faker Shakila Agustina S.H.', 'ggunarto', '(+62) 836 674', 'Jln. Ciumbuleuit No. 986, Prabumulih 70141, JaTim', 'SY[x7N', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-03-02 06:58:47', '2021-03-02 06:58:47', NULL),
(29, '7102444407180390', 'faker-inasyiah@pranowo.web.id', NULL, 'faker Raditya Sirait', 'agustina.cornelia', '0312 9836 543', 'Psr. Otista No. 690, Pagar Alam 95673, Bali', '`iA`>Rs$O6,C!p0i', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-03-02 06:58:47', '2021-03-02 06:58:47', NULL),
(30, '3325200304019042', 'faker-yahya34@kusmawati.asia', NULL, 'faker Dasa Hardiansyah', 'rika30', '(+62) 998 079', 'Ki. Ujung No. 180, Tual 29992, SulTra', ';v@uqqq23\\$05^1', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-03-02 06:58:47', '2021-03-02 06:58:47', NULL),
(32, '1231234578910837', 'misan@gmail.com', '1615627292_a604ca202934e5cc6818.jpg', 'Misan', 'misan', '081292676265', 'Jl. Raya Narogong Km. 12 Rt.03/01 Kel. Cikiwul, Kec. Bantargebang', '$2y$10$CAlMC3yKqhcJgeEAlEjpw.P8XTxEL5P2WpKf.muLTIGPGb4kiqbHy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-06 14:52:31', '2021-03-13 16:21:32', NULL),
(33, '1232349723123013', 'mista@gmail.com', '', 'Mista Syarifuddin', 'mista', '081292676265', 'Jl. Raya Narogong Km. 12 Rt.03/01 Kel. Cikiwul, Kec. Bantargebang', '$2y$10$HGhojmvBSSh.mFdUNhR1gus7XgnqGTcAYOGiJvllOYVOUcHC8Bdii', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-06 14:54:29', '2021-03-06 14:59:55', NULL),
(34, '1232138876381223', 'napsiah@gmail.com', '1615628604_3c1716aad46c76d1490c.jpg', 'Napsiah Hernawati', 'napsiah', '081292676265', 'Jl. Raya Narogong Km. 12 Rt.03/01 Kel. Cikiwul, Kec. Bantargebang', '$2y$10$D1Nnk24hIGp.kadJis7ux.r0LOmcpcJ5AcgaLHKbHDPIER4DcIcsS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-13 16:05:38', '2021-03-13 16:43:24', NULL),
(35, '1232137987312724', 'hakim@gmail.com', NULL, 'Abdul Hakim', 'hakim', '081292676265', 'Jl. Raya Narogong Km. 12 Rt.03/01 Kel. Cikiwul, Kec. Bantargebang', '$2y$10$BCGOSrWG/8jaGIFJ3dof2eY/L.OMsz.GZdwDrmhcITmhpvZRlZeWq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-13 16:07:03', '2021-03-13 16:07:03', NULL),
(36, '7928361231232133', 'jajat@gmail.com', NULL, 'Jajat Sanjaya', 'jajat', '081292676265', 'Jl. Raya Narogong Km. 12 Rt.03/01 Kel. Cikiwul, Kec. Bantargebang', '$2y$10$6bDwRIg3QYY1W4myM1CJiuOYlTYe8DD7EOSnKiBpIo6.Pkjv6IwQC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-13 16:07:51', '2021-03-13 16:07:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`),
  ADD KEY `contact_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `filter_kata_kotor`
--
ALTER TABLE `filter_kata_kotor`
  ADD PRIMARY KEY (`id_filter`);

--
-- Indeks untuk tabel `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`id_kk`),
  ADD KEY `kartu_keluarga_user_id_foreign` (`user_id`),
  ADD KEY `kartu_keluarga_rw_id_foreign` (`rw_id`),
  ADD KEY `kartu_keluarga_rt_id_foreign` (`rt_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD UNIQUE KEY `kode_pengaduan` (`kode_pengaduan`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `pengaduan_kategori`
--
ALTER TABLE `pengaduan_kategori`
  ADD PRIMARY KEY (`id_pengaduan_kategori`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `percakapan`
--
ALTER TABLE `percakapan`
  ADD PRIMARY KEY (`id_percakapan`),
  ADD KEY `percakapan_user_id_foreign` (`user_id`),
  ADD KEY `petugas_id` (`petugas_id`);

--
-- Indeks untuk tabel `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id_quotes`);

--
-- Indeks untuk tabel `rukun_tetangga`
--
ALTER TABLE `rukun_tetangga`
  ADD PRIMARY KEY (`id_rt`),
  ADD KEY `rukun_tetangga_rw_id_foreign` (`rw_id`);

--
-- Indeks untuk tabel `rukun_warga`
--
ALTER TABLE `rukun_warga`
  ADD PRIMARY KEY (`id_rw`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id_subscriber`),
  ADD KEY `subscriber_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `testimoni_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `filter_kata_kotor`
--
ALTER TABLE `filter_kata_kotor`
  MODIFY `id_filter` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  MODIFY `id_kk` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_kategori`
--
ALTER TABLE `pengaduan_kategori`
  MODIFY `id_pengaduan_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `percakapan`
--
ALTER TABLE `percakapan`
  MODIFY `id_percakapan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id_quotes` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rukun_tetangga`
--
ALTER TABLE `rukun_tetangga`
  MODIFY `id_rt` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rukun_warga`
--
ALTER TABLE `rukun_warga`
  MODIFY `id_rw` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id_subscriber` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD CONSTRAINT `kartu_keluarga_rt_id_foreign` FOREIGN KEY (`rt_id`) REFERENCES `rukun_tetangga` (`id_rt`),
  ADD CONSTRAINT `kartu_keluarga_rw_id_foreign` FOREIGN KEY (`rw_id`) REFERENCES `rukun_warga` (`id_rw`),
  ADD CONSTRAINT `kartu_keluarga_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `pengaduan_kategori` (`id_pengaduan_kategori`),
  ADD CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `percakapan`
--
ALTER TABLE `percakapan`
  ADD CONSTRAINT `percakapan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `rukun_tetangga`
--
ALTER TABLE `rukun_tetangga`
  ADD CONSTRAINT `rukun_tetangga_rw_id_foreign` FOREIGN KEY (`rw_id`) REFERENCES `rukun_warga` (`id_rw`);

--
-- Ketidakleluasaan untuk tabel `subscriber`
--
ALTER TABLE `subscriber`
  ADD CONSTRAINT `subscriber_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
