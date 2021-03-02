<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
<style>
    .parsley-errors-list {
        margin-top: .25rem;
        font-size: 80%;
        color: #dc3545;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('preloader'); ?>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text mx-auto my-auto">
                <p><?= setting()->nama_aplikasi_backend ?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- Header Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Area End-->

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">
        <div class="mb-5 pb-4">
            <?php
            $width = '100%';
            $height = '200px';
            ?>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2958866074787!2d106.98985671434191!3d-6.3557315639462155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c22161d4051%3A0x7a0a35b288779341!2sSMK%20Negeri%202%20Kota%20Bekasi!5e0!3m2!1sid!2sid!4v1607004479421!5m2!1sid!2sid" style="width:100%; height:200px;" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
            <iframe src="<?= setting()->map_link ?>" style="width:<?= $width ?>; height:<?= $height ?>;" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Hubungi Kami</h2>
            </div>
            <div class="col-lg-8">
                <form class="form-contact" action="<?= base_url('home/kirimEmail') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control <?php if (session('errors.subject')) : ?>is-invalid <?php endif ?>" name="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" placeholder="Subject" value="<?= old('subject') ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Subject harus diisi" data-parsley-minlength="20" data-parsley-minlength-message="Subject terlalu singkat">
                                <div class="invalid-feedback">
                                    <?= session('errors.subject') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control <?php if (session('errors.nama_lengkap')) : ?>is-invalid <?php endif ?>" name="nama_lengkap" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Lengkap Anda'" placeholder="Nama Lengkap Anda" value="<?= old('nama_lengkap') ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Nama harus diisi" data-parsley-length="[5,50]" data-parsley-length-message="Minimal 5 karakter, maksimal 50 karakter">
                                <div class="invalid-feedback">
                                    <?= session('errors.nama_lengkap') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control <?php if (session('errors.email')) : ?>is-invalid <?php endif ?>" name="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'contoh@gmail.com'" placeholder="contoh@gmail.com" value="<?= old('email') ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Email harus diisi" data-parsley-length="[10,100]" data-parsley-length-message="Minimal 10 karakter, maksimal 100 karakter" data-parsley-type="email" data-parsley-type-message="Email tidak valid">
                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="pesan" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Isi Pesan Anda'" placeholder="Isi Pesan Anda" required data-parsley-required-message="Pesan harus di isi" data-parsley-minlength="110" data-parsley-minlength-message="Isi Pesan terlalu singkat, isi secara terperinci dan lengkap" data-parsley-trigger="keyup"><?= set_value('pesan'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= session('errors.pesan') ?>
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

                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn">Kirim</button>
                    </div>
                </form>
            </div>

            <!-- Right Side -->
            <div class="col-lg-3 offset-lg-1">
                <?= $this->include('home/widget/kontak') ?>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<?= $this->endSection() ?>

<?= $this->section('my-js'); ?>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<script src="<?= base_url() ?>/vendors/parsley/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
<?= $this->endSection(); ?>