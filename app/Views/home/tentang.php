<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
<style>
    .ordered-list li span {
        color: #707b8e;
    }

    b {
        font-weight: bold;
        color: #707b8e;
    }

    @media (max-width: 600px) {
        .ordered-list {
            margin-left: 0px;
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
                    <h1><?= setting()->nama_aplikasi_frontend ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Area End-->

<!-- Start Sample Area -->
<section class="sample-text-area p-0">
    <div class="container box_1170">
        <h3>Apa itu <?= setting()->nama_aplikasi_frontend ?>?</h3>
        <p class="sample-text">
            Pengelolaan pengaduan pelayanan publik di setiap daerah di Indonesia belum terkelola secara efektif dan terintegrasi. Masing-masing daerah mengelola pengaduan secara parsial dan tidak terkoordinir dengan baik. Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan bisa terjadi suatu pengaduan tidak ditangani.
        </p>
        <p>
            Oleh karena itu, untuk mencapai visi dalam <i> good governance</i> maka perlu untuk mengintegrasikan sistem pengelolaan pengaduan pelayanan publik. Tujuannya, masyarakat memiliki saluran pengaduan secara Umum.
        </p>
        <p class="sample-text">
            Untuk itulah dibentuk <?= setting()->nama_aplikasi_frontend ?> sebagai Sistem Keluhan dan Pengaduan Masyarakat yang dibentuk untuk merealisasikan kebijakan yang menjamin hak masyarakat agar pengaduan dapat disalurkan kepada pelayanan publik.
        </p>
    </div>
    <div class="container">
        <h3>Fitur - Fitur Unggulan :</h3>
        <ol class="ordered-list text-dark">
            <li><span><b>Keamanan :</b> Keamanan dan Kerahasiaan Data serta informasi pribadi akan dijamin oleh pengelola layanan</span></li>
            <li><span><b>Gratis :</b> Penyedia layanan tidak memungut biaya sepeserpun terhadap penggunaan layanan. Kecuali kouta internet yang digunakan untuk mengakses halaman-halaman yang ada di <?= setting()->nama_aplikasi_frontend ?>.</span></li>
            <li><span><b>Anonim :</b> Pengguna memiliki hak jaminan anonimitas dan kerahasiaan keluhan jika saat melapor memilih fitur anonim, memiliki fungsi yaitu data pelapor tidak dapat dilihat oleh khalayak umum kecuali Admin</span></li>
            <li><span><b>Tracking ID :</b> Kode Pengaduan yang berguna untuk meninjau proses tindak lanjut laporan yang disampaikan oleh masyarakat.</span></li>
            <li><span><b>Chatting :</b> Pengguna dapat berbicara melalui aplikasi atau chatting kepada petugas, untuk menindaklanjuti laporannya.</span></li>
        </ol>
    </div>


</section>
<!-- End Sample Area -->

<?= $this->endSection() ?>