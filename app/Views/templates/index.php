<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title><?= $title; ?> | <?= setting()->nama_aplikasi_backend ?></title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/images/favicon.ico">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:site_name" content="<?= setting()->nama_aplikasi_frontend ?>">
    <meta property="og:title" content="<?= $title; ?>">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/jquery-steps/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/parsley/custom.css">
    <link href="<?= base_url('/vendors/select2/dist/css/select2.min.css') ?>" rel="stylesheet" />

    <?= $this->renderSection('my-css') ?>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= base_url('/vendors/select2/dist/js/select2.full.min.js') ?>"></script>
</head>

<body class="header-light sidebar-dark">

    <!-- Loader -->
    <?= $this->renderSection('preloader') ?>

    <!-- Sweet Alert login -->
    <div class="swal-loginSuccess" data-swallogin="<?= session()->get('successLogin'); ?>"></div>
    <!-- Sweet Alert CRUD -->
    <div class="swal-crud" data-swalcrud="<?= session()->get('message'); ?>"></div>
    <!-- Sweet Alert Error -->
    <div class="swal-error" data-swalerror="<?= session()->get('error'); ?>"></div>


    <!-- Topbar / Header -->
    <?= $this->include('templates/topbar') ?>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">White</a>
                </div>
            </div>

        </div>
    </div>


    <!-- Sidebar -->
    <?= $this->include('templates/sidebar') ?>

    <!-- Main Container -->
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">

            <!-- Begin Contnet -->
            <?= $this->renderSection('main-content') ?>

            <div class="footer-wrap pd-20 mb-20 card-box">
                <small><?= setting()->footer_backend ?></small>
                <!-- <small>Develop and Re-Design by <a href="https://instagram.com/zaiabdullah_91/" target="_blank">Zainudin Abdullah</a> - UJIKOM | Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a></small> -->
            </div>
        </div>
    </div>


    <!-- Footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- js -->
    <script src="<?= base_url() ?>/vendors/scripts/core.js"></script>
    <script src="<?= base_url() ?>/vendors/scripts/script.min.js"></script>
    <script src="<?= base_url() ?>/vendors/scripts/process.js"></script>
    <script src="<?= base_url() ?>/vendors/scripts/layout-settings.js"></script>

    <!-- Datatable -->
    <script src="<?= base_url() ?>/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/datatables/js/responsive.bootstrap4.min.js"></script>
    <!-- Datatable Setting js -->
    <script src="<?= base_url() ?>/vendors/scripts/datatable-setting.js"></script>

    <!-- Steps -->
    <script src="<?= base_url() ?>/jquery-steps/jquery.steps.js"></script>
    <script src="<?= base_url() ?>/vendors/scripts/steps-setting.js"></script>

    <!-- Sweet Alert 2 -->
    <script src="<?= base_url() ?>/vendors/scripts/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/vendors/scripts/sweetalert2.custom.js"></script>

    <!-- Parsley -->
    <script src="<?= base_url() ?>/vendors/parsley/parsley.min.js"></script>

    <!-- Untuk Foto Profil User -->
    <script>
        // buat function lalu di panggil di viewnya, dan jalankan sebuah event onchange
        function preViewImg() {
            // ambil elemen yg nama id nya sampul
            const profil = document.querySelector('#user_image');
            // ambil elemen label yg nama class nya custom-file-label
            const profilLabel = document.querySelector('.custom-file-label');
            // ambil elemen image nya
            const imgPreview = document.querySelector('.img-preview');

            // === Ini utk tulisan labelnya
            // ambil profilLabel, trus textContent nya (isi nya) di ambil dari files profil yg diupload, index ke 0, ambil namanya
            profilLabel.textContent = profil.files[0].name;
            console.log(profilLabel.textContent);

            // === Ini utk mengganti Preview
            // ini adlh variabel baru utk ngambil file yg diupload
            const fileProfil = new FileReader();
            // lalu ambil alamat penyimpanannya, trus ambil nama file utk di simpan ke gambarya
            fileProfil.readAsDataURL(profil.files[0]);

            // ketika file sumpul ini unload, jalankan function yg mengirimkan event
            fileProfil.onload = function(e) {
                // si image preview, source nya diganti dgn gambar yg baru di upload di atas
                imgPreview.src = e.target.result;
            }
        }
    </script>

    <script>
        // Jam yang ada di topbar
        function jam() {
            var waktu = new Date();
            var jam = waktu.getHours();
            var menit = waktu.getMinutes();
            var detik = waktu.getSeconds();

            if (jam < 10) {
                jam = "0" + jam;
            }
            if (menit < 10) {
                menit = "0" + menit;
            }
            if (detik < 10) {
                detik = "0" + detik;
            }
            var jam_div = document.getElementById('jam');
            jam_div.innerHTML = jam + ":" + menit + ":" + detik;
            setTimeout("jam()", 1000);
        }
        jam();
    </script>

    <?= $this->renderSection('my-js') ?>
</body>

</html>