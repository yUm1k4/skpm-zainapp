<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <?php if (uri_string() === 'login') : ?>
        <title>Login | Zain App</title>
    <?php elseif (uri_string() === 'register') : ?>
        <title>Register | Zain App</title>
    <?php else : ?>
        <title>Reset Password | Zain App</title>
    <?php endif; ?>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/jquery-steps/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/styles/style.css">
</head>

<body class="login-page">

    <!-- Loader -->
    <!-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <h5 class="text-blue">SKPM - Zain App</h5>
            </div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>10%</div>
            <div class="loading-text">
                Mohon Tunggu...
            </div>
        </div>
    </div> -->

    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="<?= base_url('') ?>" class="text-primary">
                    SKPM - Zain App
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <?php if (uri_string() === 'register') : ?>
                        <li><a href="<?= base_url('login') ?>">Login</a></li>
                    <?php else : ?>
                        <li><a href="<?= base_url('register') ?>">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- sweet alert 2 -->
    <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
    <div class="swalError" data-swal="<?= session()->get('error'); ?>"></div>
    <div class="swalWarn" data-swal="<?= session()->get('warning'); ?>"></div>

    <?= $this->renderSection('content') ?>

    <!-- js -->
    <script src="<?= base_url() ?>/vendors/scripts/core.js"></script>
    <script src="<?= base_url() ?>/vendors/scripts/script.min.js"></script>
    <script src="<?= base_url() ?>/vendors/scripts/process.js"></script>
    <script src="<?= base_url() ?>/vendors/scripts/layout-settings.js"></script>
    <script src="<?= base_url() ?>/jquery-steps/jquery.steps.js"></script>
    <script src="<?= base_url() ?>/vendors/scripts/steps-setting.js"></script>

    <!-- Sweet Alert 2 -->
    <script src="<?= base_url() ?>/vendors/scripts/sweetalert2.all.min.js"></script>
    <!-- Sweet Alert Setting -->
    <script>
        // ambil pesan
        const swal = $('.swal').data('swal');
        const swalError = $('.swalError').data('swal');
        const swalWarn = $('.swalWarn').data('swal');

        if (swal) {
            Swal.fire({
                icon: 'success',
                title: swal,
                timer: 5000,
                timerProgressBar: true,
                showConfirmButton: true,
            })
        }

        if (swalError) {
            Swal.fire({
                icon: 'error',
                title: swalError,
                timer: 5000,
                timerProgressBar: true,
                showConfirmButton: true,
            })
        }

        if (swalWarn) {
            Swal.fire({
                icon: 'warning',
                title: swalWarn,
                timer: 5000,
                timerProgressBar: true,
                showConfirmButton: true,
            })
        }
    </script>
</body>

</html>