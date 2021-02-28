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
                    <a href="javascript:;" class="dropdown-toggle <?= uri_string() === 'dashboard' ? 'active' : ''; ?>">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                        <li><a href="<?= base_url('/') ?>" target="_blank">Home</a></li>
                    </ul>
                </li>

                <?php if (in_groups('Petugas')) { ?>
                    <li>
                        <a href="<?= base_url('pengaduan') ?>" class="dropdown-toggle no-arrow 
                    <?= uri_string() === 'pengaduan' ? 'active' : '' ?>">
                            <span class="micon dw dw-edit-2"></span><span class="mtext">Data Pengaduan</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('contact') ?>" class="dropdown-toggle no-arrow 
                    <?= uri_string() === 'contact' ? 'active' : '' ?>">
                            <span class="micon dw dw-email1"></span><span class="mtext">Contact Us</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('testimoni') ?>" class="dropdown-toggle no-arrow 
                    <?= uri_string() === 'testimoni' ? 'active' : '' ?>">
                            <span class="micon dw dw-chat-3"></span><span class="mtext">Testimoni</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('subscriber') ?>" class="dropdown-toggle no-arrow 
                    <?= uri_string() === 'subscriber' ? 'active' : '' ?>">
                            <span class="micon dw dw-star"></span><span class="mtext">Subscriber</span>
                        </a>
                    </li>


                <?php } ?>

                <?php if (in_groups('Admin')) { ?>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle align-content-center
                    <?= uri_string() === 'pengaduan' ||
                        uri_string() === 'pengaduan-kategori'
                        ? 'active' : '';
                    ?>">
                            <span class="micon dw dw-edit-2"></span><span class="mtext">Pengaduan</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?= base_url('pengaduan') ?>">Data Pengaduan</a></li>
                            <li><a href="<?= base_url('pengaduan-kategori') ?>">Kategori Pengaduan</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle 
                    <?= uri_string() === 'admin' ||
                        uri_string() === 'petugas' ||
                        uri_string() === 'masyarakat' || uri_string() === 'masyarakat/create' || uri_string() === 'masyarakat/update' ||
                        uri_string() === 'all-user'
                        ? 'active' : '';
                    ?>">
                            <span class="micon dw dw-user-11"></span><span class="mtext">Data Pengguna</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?= base_url('/admin') ?>">Admin</a></li>
                            <li><a href="<?= base_url('/petugas') ?>">Petugas</a></li>
                            <li><a href="<?= base_url('/masyarakat') ?>">Masyarakat</a></li>
                            <li><a href="<?= base_url('/all-user') ?>">Semua Pengguna</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url('report') ?>" class="dropdown-toggle no-arrow 
                        <?= uri_string() === 'report' ? 'active' : '' ?>">
                            <span class="micon dw dw-invoice"></span><span class="mtext">Laporan</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle 
                    <?= uri_string() === 'contact' ||
                        uri_string() === 'testimoni' ||
                        uri_string() === 'subscriber'
                        ? 'active' : '';
                    ?>">
                            <span class="micon dw dw-email1"></span><span class="mtext">Feedback</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="<?= base_url('/contact') ?>">Contact Us</a></li>
                            <li><a href="<?= base_url('/testimoni') ?>">Testimoni</a></li>
                            <li><a href="<?= base_url('/subscriber') ?>">Subscriber</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?= base_url('quotes') ?>" class="dropdown-toggle no-arrow 
                    <?= uri_string() === 'quotes' ? 'active' : '' ?>">
                            <span class="micon dw dw-quotation"></span><span class="mtext">Quotes</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('setting') ?>" class="dropdown-toggle no-arrow 
                    <?= uri_string() === 'setting' ? 'active' : '' ?>">
                            <span class="micon dw dw-settings1"></span><span class="mtext">Settings</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>