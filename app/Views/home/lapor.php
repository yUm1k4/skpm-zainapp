<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/parsley/custom.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- Header Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-40">
                    <h1>Lapor!</h1>
                    <span>Sampaikan pengaduan Anda langsung kepada pemerintah berwenang</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Area End-->

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <!-- <div class="col-sm-12">
                <h2 class="contact-title">Sampaikan pengaduan Anda</h2>
            </div> -->

            <!-- Sweet Alert login -->
            <div class="swal-message" data-swal="<?= session()->get('laporankirim'); ?>"></div>
            <div class="swal-error" data-swal="<?= session()->get('error'); ?>"></div>

            <div class="col-lg-8">
                <form class="form-contact" action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <h3>Informasi Pribadi Anda :</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <!-- <input class="form-control valid" name="fullname" type="text" readonly value=""> -->
                                <input class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" type="text" readonly value="<?= xss(user()->fullname); ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.fullname') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Induk Kependudukan</label>
                                <input class="form-control <?php if (session('errors.nik')) : ?>is-invalid<?php endif ?>" name="nik" type="text" readonly value="<?= xss(user()->nik); ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.nik') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Alamat Email</label>
                                <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" type="email" readonly value="<?= xss(user()->email); ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Handphone</label>
                                <input class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid<?php endif ?>" name="no_hp" type="text" readonly value="<?= xss(user()->no_hp); ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.no_hp') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Sampaikan Pengaduan Anda :</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kode Pengaduan</label>
                                <input class="form-control <?php if (session('errors.kode_pengaduan')) : ?>is-invalid<?php endif ?>" name="kode_pengaduan" type="text" readonly value="<?= xss($kode_pengaduan) ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.kode_pengaduan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kategori Pengaduan</label>
                                <select name="kategori_id" id="kategori_id" class="form-control wide m-0 <?php if (session('errors.kategori_id')) : ?>is-invalid<?php endif ?>" required data-parsley-required-message="Pilih kategori dahulu" data-parsley-trigger="keyup">
                                    <option value="0" selected disabled> Pilih Kategori</option>
                                    <?php foreach ($pengaduan_kategori as $pk) : ?>
                                        <option <?= set_select('kategori_id', $pk['id_pengaduan_kategori']) ?> value="<?= $pk['id_pengaduan_kategori'] ?>"><?= $pk['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= session('errors.kategori_id') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <p class="text-ungu">*Jangan lupa catat Kode Pengaduan untuk melihat status pengaduan</p>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Isi Pengaduan</label>
                                <textarea class="form-control w-100 is-invalid" name="isi_laporan" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Lebih terperinci anda menginput, lebih baik'" required data-parsley-required-message="Laporan harus di isi" data-parsley-minlength="110" data-parsley-minlength-message="Isi Laporan terlalu singkat, isi secara terperinci dan lengkap"><?= set_value('isi_laporan'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= session('errors.isi_laporan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Lampirkan File Bukti</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?php if (session('errors.lampiran')) : ?>is-invalid <?php endif ?>" name="lampiran" id="lampiran" onchange="lampView()" required data-parsley-required-message="Mohon lampirkan file bukti">
                                    <div class="invalid-feedback">
                                        <?= session('errors.lampiran') ?>
                                    </div>
                                    <label class="custom-file-label" for="lampiran">Upload File</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <p class="text-ungu">*Format File yang diperbolehkan: *.JPG, *.PNG, *.DOC, *.DOCX, *.PDF dan ukuran maksimal 2MB</p>
                        </div>
                        <div class="col-sm-12">
                            <div class="form d-flex mb-2">
                                <label class="mr-2">Lapor Sebagai Anonim <i class="dw dw-question" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Nama Anda tidak akan terpublikasikan di laporan" title="Informasi"></i></label>
                                <div class="confirm-checkbox">
                                    <input type="checkbox" name="anonim" id="confirm-checkbox" <?php if (old('anonim')) : ?> checked <?php endif ?>>
                                    <label for="confirm-checkbox" style="border-color: #000;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="6LcAK_oZAAAAAKTxUO0ICHecOSGwN4iTqswXm_mw"></div>
                                <div class="invalid-feedback">
                                    <?= session('errors.g-recaptcha-response') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="button boxed-btn">Lapor!</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Right Side -->
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <!-- Search Start -->
                    <?= $this->include('home/widget/search') ?>
                    <!-- Search End -->

                    <!-- Sub Email Start -->
                    <?= $this->include('home/widget/subscribeEmail') ?>
                    <!-- Sub Email End -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>

<!-- Sweet Alert 2 -->
<script src="<?= base_url() ?>/vendors/scripts/sweetalert2.all.min.js"></script>

<script>
    function lampView() {
        // ---> Untuk Lampiran input laporan
        const lamp = document.querySelector('#lampiran');
        const lampLabel = document.querySelector('.custom-file-label');

        lampLabel.textContent = lamp.files[0].name;
    }
    // $('textarea.form-control').watermark();
</script>

<script src="<?= base_url() ?>/vendors/parsley/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>

<?= $this->endSection(); ?>