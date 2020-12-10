<?= $this->extend('home/templates/index'); ?>

<?= $this->section('content'); ?>

<!-- Slider Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-40">
                    <h1>Lapor!</h1>
                    <span>Sampaikan keluhan Anda langsung kepada pemerintah berwenang</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End-->

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <!-- <div class="col-sm-12">
                <h2 class="contact-title">Sampaikan Keluhan Anda</h2>
            </div> -->

            <!-- Sweet Alert login -->
            <div class="swal-message" data-swal="<?= session()->get('laporankirim'); ?>"></div>
            <div class="swal-error" data-swal="<?= session()->get('error'); ?>"></div>

            <div class="col-lg-8">
                <form class="form-contact" action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <h3>Informasi Pribadi Anda :</h3>
                    <div class="row ml-3">
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
                    <h3>Sampaikan Keluhan Anda :</h3>
                    <div class="row ml-3">
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
                                <select name="kategori_id" id="kategori_id" class="form-control wide m-0 <?php if (session('errors.kategori_id')) : ?>is-invalid<?php endif ?>">
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
                                <label>Isi Laporan</label>
                                <textarea class="form-control w-100 is-invalid" name="isi_laporan" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Lebih terperinci anda menginput, lebih baik'" placeholder=" Lebih terperinci anda menginput, lebih baik"><?= set_value('isi_laporan'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= session('errors.isi_laporan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Lampirkan File Bukti</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?php if (session('errors.lampiran')) : ?>is-invalid <?php endif ?>" name="lampiran" id="lampiran" onchange="lampView()">
                                    <div class="invalid-feedback">
                                        <?= session('errors.lampiran') ?>
                                    </div>
                                    <label class="custom-file-label" for="lampiran">Upload File</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <p class="text-ungu">*Format File yang diperbolehkan: *.JPG, *.PNG, *.DOC, *.DOCX, *.PDF dan ukuran maksimal file 2MB</p>
                        </div>
                        <div class="col-sm-12">
                            <div class="form d-flex mb-2">
                                <label class="mr-2" data-toggle="tooltip" data-placement="top" title="Nama Anda tidak akan terpublikasikan di laporan">Lapor Sebagai Anonim <i class="fa fa-question"></i></label>
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
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fa fa-home"></i></span>
                    <div class="media-body">
                        <h3>Jl. Lap. Bola Rawa Butun</h3>
                        <p>Bekasi, 17153 - Indonesia</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fa fa-tablet-alt"></i></span>
                    <div class="media-body">
                        <h3>+62 812 9267 6265</h3>
                        <p>Biasanya membalas cepat</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fa fa-envelope section-tittle"></i></span>
                    <div class="media-body">
                        <h3>yumikasoftware@gmail.com</h3>
                        <p>Kirim pertanyaan mu!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<script src='https://www.google.com/recaptcha/api.js' async defer></script>

<!-- JS here -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Sweet Alert 2 -->
<script src="<?= base_url() ?>/vendors/scripts/sweetalert2.all.min.js"></script>

<script>
    function lampView() {
        // ---> Untuk Lampiran input laporan
        const lamp = document.querySelector('#lampiran');
        const lampLabel = document.querySelector('.custom-file-label');

        lampLabel.textContent = lamp.files[0].name;

    }
</script>

<?= $this->endSection(); ?>