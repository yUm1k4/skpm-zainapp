<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent ">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="<?= base_url('/') ?>" class="text-biru-tua">
                                <h5 class="text--logo">SKPM - Zain App</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="<?= base_url('/') ?>">Home</a></li>
                                    <?php if (!logged_in()) : ?>
                                        <li class="d-lg-none d-sm-block"><a href="<?= base_url('/login') ?>">Login</a></li>
                                    <?php endif; ?>
                                    <?php if (in_groups('Masyarakat')) : ?>
                                        <li><a href="javascript:;">Lapor</a>
                                            <ul class="submenu">
                                                <li><a href="<?= base_url('lapor') ?>">Sampaikan Laporan</a></li>
                                                <li><a href="<?= base_url('cari-laporan') ?>"> Cari Laporan</a></li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                    <li><a href="javascript:;">Tentang</a>
                                        <ul class="submenu">
                                            <li><a href="<?= base_url('/tentang') ?>">Tentang Kami</a></li>
                                            <li><a href="<?= base_url('/hubungi') ?>">Hubungi Kami</a></li>
                                            <li><a href="<?= base_url('/ketentuan') ?>">Ketentuan Pengguna</a></li>
                                        </ul>
                                    </li>
                                    <?php if (logged_in()) : ?>
                                        <li><a href="javascript:;" class="text-decoration-none">Hi, <?= user()->username ?></a>
                                            <ul class="submenu">

                                                <?php if (in_groups('Admin')) : ?>
                                                    <li><a href="<?= base_url('admin-profile/' . user()->id) ?>">Profil Saya</a></li>
                                                    <li><a href="<?= base_url('pengaduan') ?>">Data Pengaduan</a></li>
                                                <?php elseif (in_groups('Petugas')) : ?>
                                                    <li><a href="<?= base_url('petugas-profile/' . user()->id) ?>">Profil Saya</a></li>
                                                    <li><a href="<?= base_url('pengaduan') ?>">Data Pengaduan</a></li>
                                                <?php else : ?>
                                                    <li><a href="<?= base_url('laporan-saya/' . user()->id) ?>">Laporan Saya</a></li>
                                                    <li><a href="<?= base_url('user-profile') ?>" class="text-pink">Profil Saya</a></li>
                                                <?php endif; ?>

                                                <hr class="my-1">
                                                <li><a href="<?= base_url('logout') ?>" class="btn-logout">Log Out</a></li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="header-right-btn f-right d-none d-lg-block">
                            <?php if (in_groups(['Admin', 'Petugas'])) : ?>
                                <a href="<?= base_url('dashboard') ?>" target="_blank" class="btn header-btn">Dashboard</a>
                            <?php elseif (in_groups('Masyarakat')) : ?>
                                <a href="<?= base_url('user-profile') ?>" class="btn header-btn">Profil</a>
                            <?php else : ?>
                                <a href="<?= base_url('login') ?>" class="btn header-btn">Log In</a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>