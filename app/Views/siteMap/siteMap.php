<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>
<div class="min-height-200px">
    <!-- 
        Back-End
    -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <div class="title">
                    <h4><?= $title; ?> | Back-End</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-30">
        <div class="pb-20">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="sitemap">
                        <h5 class="h5">Dashboard</h5>
                        <ul>
                            <li><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li><a href="<?= base_url('/') ?>">Go to Home</a></li>
                        </ul>
                    </div>
                    <div class="sitemap">
                        <h5 class="h5">Pengaduan</h5>
                        <ul>
                            <li><a href="<?= base_url('pengaduan') ?>">Data Pengaduan</a></li>
                            <li><a href="<?= base_url('pengaduan-kategori') ?>">Kategori Pengaduan</a></li>
                            <li><a href="<?= base_url('report') ?>">Laporan Pengaduan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="sitemap">
                        <h5 class="h5">Data Pengguna</h5>
                        <ul>
                            <li><a href="<?= base_url('admin') ?>">Admin</a></li>
                            <li><a href="<?= base_url('petugas') ?>">Petugas</a></li>
                            <li><a href="<?= base_url('masyarakat') ?>">Masyarakat</a></li>
                            <li><a href="<?= base_url('all-user') ?>">Semua Pengguna</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="sitemap">
                        <h5 class="h5">Feedback</h5>
                        <ul>
                            <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
                            <li><a href="<?= base_url('testimoni') ?>">Testimoni</a></li>
                            <li><a href="<?= base_url('subscriber') ?>">Subscriber</a></li>
                        </ul>
                    </div>
                    <div class="sitemap">
                        <h5 class="h5">Quotes</h5>
                        <ul>
                            <li><a href="<?= base_url('quotes') ?>">Quotes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="sitemap">
                        <h5 class="h5">Site Map</h5>
                        <ul>
                            <li><a href="javascript:;">Site Map</a></li>
                        </ul>
                    </div>
                    <div class="sitemap">
                        <h5 class="h5">Settings</h5>
                        <ul>
                            <li><a href="<?= base_url('setting') ?>">Settings Web</a></li>
                        </ul>
                    </div>
                    <div class="sitemap">
                        <h5 class="h5">My Profile</h5>
                        <ul>
                            <?php if (in_groups('Admin')) { ?>
                                <li><a href="<?= base_url('admin-profile/' . user()->id) ?>">My Profile</a></li>
                                <li><a href="<?= base_url('admin-profile/' . user()->id) ?>">Ubah Password</a></li>
                            <?php } elseif (in_groups('Petugas')) { ?>
                                <li><a href="<?= base_url('petugas-profile/' . user()->id) ?>">My Profile</a></li>
                                <li><a href="<?= base_url('petugas-profile/' . user()->id) ?>">Ubah Password</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        Front-End (Home)
    -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <div class="title">
                    <h4><?= $title; ?> | Front-End</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-30">
        <div class="pb-20">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="sitemap">
                        <h5 class="h5">Home</h5>
                        <ul>
                            <li><a href="<?= base_url('/') ?>">Home</a></li>
                        </ul>
                    </div>
                    <div class="sitemap">
                        <h5 class="h5">Lapor</h5>
                        <ul>
                            <li><a href="javascript:;">Sampaikan Laporan <i class="text-blue">(Masyarakat)</i></a></li>
                            <li><a href="javascript:;">Cari Laporan <i class="text-blue">(Masyarakat)</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="sitemap">
                        <h5 class="h5">Tentang</h5>
                        <ul>
                            <li><a href="<?= base_url('tentang') ?>">Tentang Kami</a></li>
                            <li><a href="<?= base_url('hubungi') ?>">Hubungi Kami</a></li>
                            <li><a href="<?= base_url('ketentuan') ?>">Ketentuan Pengguna</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="sitemap">
                        <h5 class="h5">Profile</h5>
                        <ul>
                            <li><a href="javascript:;">Laporan Saya <i class="text-blue">(Masyarakat)</i></a></li>
                            <?php if (in_groups('Admin')) { ?>
                                <li><a href="<?= base_url('admin-profile/' . user()->id) ?>">Profil Saya</a></li>
                            <?php } elseif (in_groups('Petugas')) { ?>
                                <li><a href="<?= base_url('petugas-profile/' . user()->id) ?>">Profil Saya</a></li>
                            <?php } ?>
                            <li><a href="<?= base_url('pengaduan') ?>">Data Pengaduan <i class="text-blue">(Admin & Petugas)</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="sitemap">
                        <h5 class="h5">Authentication</h5>
                        <ul>
                            <li><a href="javascript:;">Login</a></li>
                            <li><a href="javascript:;">Register</a></li>
                            <li><a href="<?= base_url('forgot') ?>">Lupa Password</a></li>
                            <li><a href="javascript:;">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>