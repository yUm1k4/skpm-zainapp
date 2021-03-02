<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
<style>
    .ordered-list li span {
        color: #707b8e;
    }

    b {
        font-weight: bold;
        color: #4043bc;
    }

    @media (max-width: 600px) {
        .ordered-list {
            padding-left: 20px;
        }

        h1 {
            font-size: 2rem;
        }
    }

    @media (max-width: 320px) {
        h1 {
            font-size: 1.5rem;
        }
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('preloader'); ?>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text mx-auto my-auto">
                <p><?= setting()->nama_aplikasi_backend ?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- Header Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-40">
                    <h1>Ketentuan Pengguna <i>(Terms of Use)</i></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Area End-->

<!-- Start Sample Area -->
<section class="sample-text-area p-0">
    <div class="container">
        <ol class="ordered-list text-dark pl-0">

            <li><span><b>Definisi :</b></span>
                <ol class="ordered-list-alpha pl-0">
                    <li><span>Sistem Keluhan dan Pengaduan Masyarakat (SKPM) - Zain App adalah layanan penyampaian semua aspirasi dan pengaduan masyarakat melalui website.</span></li>
                    <li><span>Pengguna adalah pihak yang menggunakan layanan SKPM - Zain App untuk menyampaikan keluhan, aspirasi, laporan, pengaduan, komentar dan permintaan informasi terkait dengan pelayanan publik.</span></li>
                    <li><span>Akun adalah informasi yang digunakan oleh pengguna, pengelola, dan penanggung jawab untuk masuk ke SKPM - Zain App </span></li>
                    <li><span>Fitur adalah segala bentuk fungsi yang terdapat dalam SKPM Zain App</span></li>
                </ol>
            </li>

            <li><span><b>Pentingnya Ketentuan Penggunaan Layanan</b></span>
                <ol class="ordered-list-alpha pl-0">
                    <li><span>Dengan mengunduh, mengakses, menjelajahi dan atau menggunakan layanan SKPM - Zain App ini, berarti Pengguna setuju untuk terikat oleh Ketentuan Penggunaan Layanan ini. Jika Pengguna tidak setuju dengan Syarat dan Ketentuan Penggunaan ini, pengguna harus segera menghentikan akses dan penggunaan layanan yang ditawarkan pada SKPM - Zain App</span></li>
                    <li><span>Kebijakan ini berlaku untuk semua pengguna layanan SKPM - Zain App</span></li>
                </ol>
            </li>
            <li><span><b>Syarat Penggunaan</b></span>
                <ol class="ordered-list-alpha pl-0">
                    <li><span>Aplikasi SKPM - Zain App hanya digunakan untuk menyampaikan keluhan, aspirasi, laporan, pengaduan, komentar dan permintaan informasi terkait dengan pelayanan publik.</span></li>
                    <li><span>Pengguna tidak diperbolehkan untuk menggunakan identitas pribadi milik orang lain untuk menggunakan layanan SKPM - Zain App dan wajib menjaga kerahasiaan informasi yang didapatkan di aplikasi SKPM - Zain App.</span></li>
                    <li><span>Pengguna tidak diperkenankan menyalahgunakan data dan informasi yang terdapat dalam layanan aplikasi SKPM - Zain App untuk tujuan yang merugikan pihak lain serta melanggar peraturan perundang-undangan yang berlaku.</span></li>
                    <li><span>Pengguna tidak diperbolehkan memberikan pengaduan dan informasi yang mengandung unsur diskriminasi atau berpotensi menimbulkan konflik suku, agama, ras, dan antar-golongan (SARA), menistakan, melecehkan, dan/atau menodai nilai-nilai agama.</span></li>
                    <li><span>Penggunaan layanan SKPM - Zain App adalah untuk kepentingan pribadi, non-komersial, dan tidak boleh digunakan untuk tujuan yang merugikan pihak lain.</span></li>
                    <li><span>Dengan mengirimkan teks, gambar, video, file dan lampiran lain saat menggunakan layanan, pengguna dengan ini memberikan lisensi kepada pengelola layanan atas materi tersebut dengan ketentuan bebas royalti atas penggunaan dan pendistribusian materi tersebut kepada pihak ketiga.</span></li>
                    <li><span>Penyedia layanan tidak memungut biaya apapun terhadap penggunaan layanan. Namun segala bentuk biaya yang diperlukan termasuk penyediaan telepon seluler, komputer, dan atau peralatan lain yang diperlukan untuk mengakses layanan, koneksi internet, dan keperluan telekomunikasi lainnya merupakan tanggung jawab pengguna. </span></li>
                </ol>
            </li>
            <li><span><b>Kerahasiaan dan Informasi Pribadi</b></span>
                <ol class="ordered-list-alpha pl-0">
                    <li><span>Dengan menggunakan layanan pengaduan ini, pengguna setuju dan memahami bahwa informasi yang terkait dengan data pribadi dan data pengaduan atau aspirasi dari pengguna akan diberikan kepada penyedia layanan. Namun demikian, pengelola layanan memberikan jaminan kerahasiaan data dan informasi pada SKPM - Zain App.</span></li>
                    <li><span>Layanan SKPM - Zain App mengumpulkan data pribadi pengguna sebagai jaminan keabsahan dari aduan atau aspirasi yang disampaikan. Adapun data pribadi yang dikumpulkan adalah sebagai berikut:</span>
                        <ol class="ordered-list-roman pl-0">
                            <li><span>Nama pengguna sebagai pengenal identitas.</span></li>
                            <li><span>No identitas yang berupa Nomor Induk Penduduk (NIK) sebagai pengenal identitas.</span></li>
                            <li><span>No handphone dan alamat email pengguna untuk memverifikasi akun dan mengirim notifikasi laporan.</span></li>
                        </ol>
                    </li>
                </ol>
            </li>
            <li><span><b>Hak-hak Pengguna</b></span>
                <ol class="ordered-list-alpha pl-0">
                    <li><span>Pengguna berhak memiliki akun dalam menggunakan layanan pengaduan ini.</span></li>
                    <li><span>Pengguna berhak memanfaatkan fitur yang terdapat dalam layanan ini.</span></li>
                    <li><span>Pengguna dapat mengganti kata sandi dan informasi akun miliknya.</span></li>
                    <li><span>Pengguna mendapatkan jaminan anonimitas dan kerahasiaan aduan yang dikirimkan selama pengguna memberikan keterangan bahwa informasi yang diberikan adalah anonim dan rahasia.</span></li>
                    <li><span>Pengguna dapat meminta pemusnahan data pribadi.</span></li>
                    <li><span>Jika diminta oleh pengguna, pengelola layanan dapat membantu pengguna untuk mengoperasikan akun tersebut dalam batas yang wajar. Dalam hal demikian, pengelola layanan dapat mengakses akun pengguna dan menjalankan akun tersebut sejauh yang diperlukan untuk menyediakan bantuan.</span></li>
                </ol>
            </li>
            <li><span><b>Kewajiban Pengguna</b></span>
                <ol class="ordered-list-alpha pl-0">
                    <li><span>Pengguna wajib menggunakan data pribadi milik sendiri.</span></li>
                    <li><span>Pengguna wajib menjaga kerahasiaan data pribadinya saat menggunakan layanan ini.</span></li>
                    <li><span>Pengguna wajib menyampaikan laporan secara jelas, lengkap, dan dapat dipertanggungjawabkan.</span></li>
                    <li><span>Pengguna wajib menjaga informasi yang didapatkan dari pelayanan pengaduan ini apabila informasi tersebut mengandung kerahasiaan data negara dan/atau pihak lain.</span></li>
                    <li><span>Jika akun pengguna diretas atau dicuri sehingga pengguna kehilangan kontrol atas akunnya, maka pengguna wajib memberitahu pengelola layanan sesegera mungkin agar pengelola layanan dapat menonaktifkan akun pengguna dan melakukan tindak pencegahan lainnya.</span></li>
                </ol>
            </li>
            <li><span><b>Kewajiban Pengelola SKPM - Zain App</b></span>
                <ol class="ordered-list-alpha pl-0">
                    <li><span>Pengelola layanan wajib memiliki mekanisme untuk menjamin kerahasiaan data dan informasi yang tersimpan di dalam sistem.</span></li>
                    <li><span>Pengelola layanan wajib memiliki mekanisme untuk menjaga kerahasiaan informasi pribadi pengguna yang tersimpan di dalam sistem.</span></li>
                    <li><span>Pengelola layanan wajib memiliki mekanisme yang mendukung pemenuhan hak-hak pengguna.</span></li>
                </ol>
            </li>
            <li><span><b>Hak-hak Pengelola SKPM - Zain App</b></span>
                <ol class="ordered-list-alpha pl-0">
                    <li><span>Pengelola layanan berhak mengelola informasi yang disampaikan oleh pengguna dalam menyampaikan aduan atau aspirasi untuk kepentingan tindak lanjut.</span></li>
                    <li><span>Pengelola layanan berhak menghapus pengaduan yang tidak sesuai dengan syarat penggunaan dan kewajiban pengguna.</span></li>
                    <li><span>Pengelola layanan berhak menonaktifkan akun pengguna jika pengguna terbukti melanggar syarat penggunaan dan kewajiban pengguna.</span></li>
                    <li><span>Pengelola layanan berhak membatalkan segala transaksi yang mencurigakan atau tidak sesuai dengan syarat penggunaan dan kewajiban pengguna.</span></li>
                </ol>
            </li>
            <li><span><b>Pernyataan dan Pengecualian Kewajiban Penyedia Layanan</b></span>
                <ol class="ordered-list-alpha pl-0">
                    <li><span>Pengelola layanan tidak menjamin bahwa SKPM - Zain App akan selalu dapat diakses, tanpa gangguan, tepat waktu, aman, bebas dari kesalahan atau bebas dari virus komputer atau hal yang merusak lainnya, dan atau bahwa layanan tidak akan terpengaruh oleh fasilitas infrastruktur, listrik atau telekomunikasi, kurangnya infrastruktur atau kegagalan teknologi informasi.</span></li>
                    <li><span>Pengelola layanan tidak bertanggung jawab atas kesalahan menjelajahi situs yang dilakukan pengguna dan ketidakcocokan perangkat yang digunakan pengguna, serta dampak resiko yang terjadi akibatnya. </span></li>
                    <li><span>Jika pengguna terbukti menggunakan aplikasi untuk tujuan yang membahayakan, merugikan, atau di luar tujuan penggunaan yang dimaksudkan dalam aplikasi ini, maka penyedia layanan aplikasi tidak bertanggung jawab terhadap dampak yang ditimbulkan.</span></li>
                    <li><span>Pengelola layanan tidak memiliki kewajiban menghilangkan informasi pengguna atau laporan yang tampil pada hasil pencarian mesin pencari.</span></li>
                </ol>
            </li>
            <li><span><b>Perubahan Ketentuan Penggunaan Layanan</b></span>
                <span>Penyedia layanan berhak untuk mengubah ketentuan penggunaan ini setiap saat dan ketentuan yang baru akan menggantikan ketentuan yang sebelumnya telah disetujui.</span>
            </li>
            <li><span><b>Pelanggaran terhadap syarat dan ketentuan</b></span><br>
                <span>Pelanggaran terhadap syarat dan ketentuan yang berlaku dapat dikenakan sanksi sesuai peraturan pengelola layanan, hukum dan/atau perundang-undangan yang berlaku.</span>
            </li>


        </ol>
    </div>


</section>
<!-- End Sample Area -->

<?= $this->endSection() ?>