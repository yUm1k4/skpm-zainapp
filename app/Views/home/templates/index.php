<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <?php if ($title == null) { ?>
        <title><?= setting()->nama_aplikasi_frontend ?></title>
    <?php } else { ?>
        <title><?= $title; ?><?= setting()->nama_aplikasi_frontend ?> </title>
    <?php } ?>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/images/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="<?= setting()->nama_aplikasi_frontend ?>">
    <meta name="application-name" content="<?= setting()->nama_aplikasi_frontend ?>">

    <!-- Meta -->
    <!-- og : open graph -->
    <meta property="og:site_name" content="<?= setting()->nama_aplikasi_frontend ?>">
    <meta property="og:title" content="<?= setting()->nama_aplikasi_frontend ?>">
    <meta property="og:url" content="<?= base_url('/') ?>">
    <!-- belum buat -->
    <meta property="og:image" content="<?= base_url('/') ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="720">
    <meta name="keywords" content="keluhan, pengaduan, masyarakat, berbagi, ponsel kamera, ponsel, gratis, upload, lapor, indonesia, layanan, aspirasi, pelaporan, laporan, website, web, anonim, peduli, zainudin, zainudin abdullah, zain">
    <meta property="og:description" content="Sistem Keluhan dan Pengaduan Masyarakat <?= setting()->nama_aplikasi_frontend ?> adalah layanan penyampaian semua aspirasi, pelaporan, pengaduan, dan keluhan masyarakat.">
    <meta name="description" content="Sistem Keluhan dan Pengaduan Masyarakat <?= setting()->nama_aplikasi_frontend ?> adalah layanan penyampaian semua aspirasi, pelaporan, pengaduan, dan keluhan masyarakat.">


    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url() ?>/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/home/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- JS here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?= $this->renderSection('my-css') ?>

</head>

<body>

    <?= $this->renderSection('preloader') ?>

    <!-- Sweet Alert login -->
    <div class="swal-loginSuccess" data-swallogin="<?= session()->get('successLogin'); ?>"></div>
    <!-- Sweet Alert berhasil kirim laporan -->
    <div class="swal-kirimSukses" data-swallapor="<?= session()->get('kirimSukses'); ?>"></div>
    <!-- Sweet Alert gagal kirim laporan -->
    <div class="swal-kirimGagal" data-swallapor="<?= session()->get('error'); ?>"></div>
    <!-- Sweet Alert gagal success CRUD -->
    <div class="swal-crud" data-swalcrud="<?= session()->get('success'); ?>"></div>

    <!-- Header / Topbar -->
    <?= $this->include('home/templates/header'); ?>

    <main>
        <!-- Main Content -->
        <?= $this->renderSection('content'); ?>
    </main>

    <!-- Footer -->
    <?= $this->include('home/templates/footer'); ?>

    <!-- Detec Connection start -->
    <!-- <div class="wrapper">
        <div class="toast">
            <div class="content">
                <div class="icon"><i class="uil uil-wifi"></i></div>
                <div class="details">
                    <span>You Online</span>
                    <p>internet connected!.</p>
                </div>
            </div>
            <div class="close-icon"><i class="uil uil-times"></i></div>
        </div>
    </div> -->
    <!-- Detec Connection end -->

    <?php if (in_groups('Admin') || in_groups('Petugas')) { ?>

    <?php } else { ?>
        <!-- Chatbot -->
        <script type="text/javascript">
            window.$crisp = [];
            window.CRISP_WEBSITE_ID = "d56324e3-78c2-44d8-8a6c-218d92457764";
            (function() {
                d = document;
                s = d.createElement("script");
                s.src = "https://client.crisp.chat/l.js";
                s.async = 1;
                d.getElementsByTagName("head")[0].appendChild(s);
            })();
        </script>
    <?php } ?>
    <!-- All JS Custom Plugins Link Here here -->
    <script src="<?= base_url() ?>/home/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <!-- <script src="<?= base_url() ?>/home/js/vendor/jquery-1.12.4.min.js"></script> -->
    <script src="<?= base_url() ?>/home/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/home/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?= base_url() ?>/home/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <!-- <script src="<?= base_url() ?>/home/js/owl.carousel.min.js"></script> -->
    <script src="<?= base_url() ?>/home/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="<?= base_url() ?>/home/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="<?= base_url() ?>/home/js/wow.min.js"></script>
    <!-- <script src="<?= base_url() ?>/home/js/animated.headline.js"></script> -->
    <!-- <script src="<?= base_url() ?>/home/js/jquery.magnific-popup.js"></script> -->

    <!-- Scrollup, nice-select, sticky -->
    <script src="<?= base_url() ?>/home/js/jquery.scrollUp.min.js"></script>
    <!-- <script src="<?= base_url() ?>/home/js/jquery.nice-select.min.js"></script> -->
    <script src="<?= base_url() ?>/home/js/jquery.sticky.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?= base_url() ?>/home/js/plugins.js"></script>
    <script src="<?= base_url() ?>/home/js/main.js"></script>

    <!-- Sweet Alert 2 -->
    <script src="<?= base_url() ?>/vendors/scripts/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/vendors/scripts/sweetalert2.custom.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <?= $this->renderSection('my-js') ?>
</body>

</html>