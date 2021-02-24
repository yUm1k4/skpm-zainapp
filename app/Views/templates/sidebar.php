<div class="left-side-bar">
    <div class="brand-logo">
        <a href="<?= base_url('dashboard') ?>">
            <p class="text-white text-center align-center mx-auto my-auto">Zain App</p>
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
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle align-content-center
                    <?= uri_string() === 'pengaduan' ||
                        uri_string() === 'pengaduan-kategori'
                        ? 'active' : '';
                    ?>">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Pengaduan</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('pengaduan') ?>">Data Pengaduan</a></li>
                        <li><a href="<?= base_url('pengaduan-kategori') ?>">Kategori Pengaduan</a></li>
                    </ul>
                </li>
                <?php if (in_groups('Admin')) : ?>
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
                <?php endif ?>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle 
                    <?= uri_string() === 'contact' ||
                        uri_string() === 'testimoni' ||
                        uri_string() === 'subscriber'
                        ? 'active' : '';
                    ?>">
                        <span class="micon dw dw-email1"></span><span class="mtext">Contact</span>
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
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>