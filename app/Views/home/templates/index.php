<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php if ($title == null) { ?>
        <title>SKPM - Zain App </title>
    <?php } else { ?>
        <title><?= $title; ?>SKPM - Zain App </title>
    <?php } ?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- JS here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <?= $this->renderSection('my-css') ?>

</head>

<body>

    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text mx-auto my-auto">
                    <p>Zain App</p>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->

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
    <script>
        AOS.init();
    </script>
</body>

</html>