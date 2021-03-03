<div class="left-side-bar">
    <div class="brand-logo">
        <a href="<?= base_url('dashboard') ?>">
            <p class="text-white text-center align-center mx-auto my-auto"><?= setting()->nama_aplikasi_backend ?></p>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle 
                    <?= url(2) == 'dashboard'
                        ? 'active' : ''; ?>">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('/dashboard') ?>" class="<?= url(2) == 'dashboard' ? 'active' : ''; ?>">Dashboard</a></li>
                        <li><a href="<?= base_url('/') ?>" target="_blank">Home</a></li>
                    </ul>
                </li>

                <!-- Sidebar Petugas start -->
                <?php if (in_groups('Petugas')) { ?>
                    <li>
                        <a href="<?= base_url('pengaduan') ?>" class="dropdown-toggle no-arrow 
                        <?= url(2) == 'pengaduan' ? 'active' : '' ?>">
                            <span class="micon dw dw-edit-2"></span><span class="mtext">Data Pengaduan</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('contact') ?>" class="dropdown-toggle no-arrow 
                    <?= url(2) == 'contact' ? 'active' : '' ?>">
                            <span class="micon dw dw-email1"></span><span class="mtext">Contact Us</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('testimoni') ?>" class="dropdown-toggle no-arrow 
                    <?= url(2) == 'testimoni' ? 'active' : '' ?>">
                            <span class="micon dw dw-chat-3"></span><span class="mtext">Testimoni</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('subscriber') ?>" class="dropdown-toggle no-arrow 
                    <?= url(2) == 'subscriber' ? 'active' : '' ?>">
                            <span class="micon dw dw-star"></span><span class="mtext">Subscriber</span>
                        </a>
                    </li>
                <?php } ?>
                <!-- Sidebar Petugas end -->

                <!-- Sidebar Admin start-->
                <?php if (in_groups('Admin')) { ?>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle align-content-center
                    <?= url(2) == 'pengaduan' ||
                        url(2) == 'pengaduan-kategori' ||
                        url(2) == 'report'
                        ? 'active' : '';
                    ?>">
                            <span class="micon dw dw-edit-2"></span><span class="mtext">Pengaduan</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?= base_url('pengaduan') ?>" class="<?= url(2) == 'pengaduan' ? 'active' : ''; ?>">Data Pengaduan</a></li>
                            <li><a href="<?= base_url('pengaduan-kategori') ?>" class="<?= url(2) == 'pengaduan-kategori' ? 'active' : ''; ?>">Kategori Pengaduan</a></li>
                            <li><a href="<?= base_url('report') ?>" class="<?= url(2) == 'report' ? 'active' : ''; ?>">Laporan</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle 
                        <?= url(2) == 'admin' ||
                            url(2) == 'petugas' ||
                            url(2) == 'masyarakat' ||
                            url(2) == 'all-user'
                            ? 'active' : '';
                        ?>">
                            <span class="micon dw dw-user-11"></span><span class="mtext">Data Pengguna</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?= base_url('/admin') ?>" class="<?= url(2) == 'admin' ? 'active' : ''; ?>">Admin</a></li>
                            <li><a href="<?= base_url('/petugas') ?>" class="<?= url(2) == 'petugas' ? 'active' : ''; ?>">Petugas</a></li>
                            <li><a href="<?= base_url('/masyarakat') ?>" class="<?= url(2) == 'masyarakat' ? 'active' : ''; ?>">Masyarakat</a></li>
                            <li><a href="<?= base_url('/all-user') ?>" class="<?= url(2) == 'all-user' ? 'active' : ''; ?>">Semua Pengguna</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle 
                    <?= url(2) == 'contact' ||
                        url(2) == 'testimoni' ||
                        url(2) == 'subscriber'
                        ? 'active' : '';
                    ?>">
                            <span class="micon dw dw-email1"></span><span class="mtext">Feedback</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?= base_url('/contact') ?>" class="<?= url(2) == 'contact' ? 'active' : ''; ?>">Contact Us</a></li>
                            <li><a href="<?= base_url('/testimoni') ?>" class="<?= url(2) == 'testimoni' ? 'active' : ''; ?>">Testimoni</a></li>
                            <li><a href="<?= base_url('/subscriber') ?>" class="<?= url(2) == 'subscriber' ? 'active' : ''; ?>">Subscriber</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?= base_url('quotes') ?>" class="dropdown-toggle no-arrow 
                    <?= url(2) == 'quotes' ? 'active' : '' ?>">
                            <span class="micon dw dw-quotation"></span><span class="mtext">Quotes</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('site-map') ?>" class="dropdown-toggle no-arrow 
                    <?= url(2) == 'site-map' ? 'active' : '' ?>">
                            <span class="micon dw dw-diagram"></span><span class="mtext">Sitemap</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('setting') ?>" class="dropdown-toggle no-arrow 
                    <?= url(2) == 'setting' ? 'active' : '' ?>">
                            <span class="micon dw dw-settings1"></span><span class="mtext">Settings</span>
                        </a>
                    </li>
                <?php } ?>
                <!-- Sidebar Admin end -->
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>