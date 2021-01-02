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

<?= $this->section('content'); ?>

<!-- Header Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-40">
                    <h1>SKPM Zain App</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Area End-->

<!-- Start Sample Area -->
<section class="sample-text-area p-0">
    <div class="container box_1170">
        <h3>Apa itu SKPM - Zain App?</h3>
        <p class="sample-text">
            Pengelolaan pengaduan pelayanan publik di setiap organisasi penyelenggara di Indonesia belum terkelola secara efektif dan terintegrasi. Masing-masing organisasi penyelenggara mengelola pengaduan secara parsial dan tidak terkoordinir dengan baik. Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan bisa terjadi suatu pengaduan tidak ditangani oleh satupun organisasi penyelenggara, dengan alasan pengaduan bukan kewenangannya.
        </p>
        <p>
            Oleh karena itu, untuk mencapai visi dalam <i> good governance</i> maka perlu untuk mengintegrasikan sistem pengelolaan pengaduan pelayanan publik dalam satu pintu. Tujuannya, masyarakat memiliki satu saluran pengaduan secara Umum.
        </p>
        <p class="sample-text">
            Untuk itulah dibentuk SKPM - Zain App sebagai Sistem Keluhan dan Pengaduan Masyarakat yang dibentuk untuk merealisasikan kebijakan <i> "no wrong door policy"</i> yang menjamin hak masyarakat agar pengaduan dapat disalurkan kepada penyelenggara pelayanan publik yang berwenang
        </p>
    </div>
    <div class="container">
        <h3>Fitur - Fitur Unggulan :</h3>
        <ol class="ordered-list text-dark">
            <li><span><b>Keamanan :</b> Keamanan dan Kerahasiaan Data serta informasi pribadi akan dijamin oleh pengelola layanan</span></li>
            <li><span><b>Gratis :</b> Penyedia layanan tidak memungut biaya sepeserpun terhadap penggunaan layanan. Kecuali kouta internet yang digunakan untuk mengakses halaman-halaman yang ada di SKPM - Zain App.</span></li>
            <li><span><b>Anonim :</b> Pengguna memiliki hak jaminan anonimitas dan kerahasiaan keluhan yang dikirimkan jika saat melapor memilih fitur anonim.</span></li>
            <li><span><b>Tracking ID :</b> Kode Pengaduan yang berguna untuk meninjau proses tindak lanjut laporan yang disampaikan oleh masyarakat.</span></li>
        </ol>
    </div>


</section>
<!-- End Sample Area -->

<?= $this->endSection() ?>