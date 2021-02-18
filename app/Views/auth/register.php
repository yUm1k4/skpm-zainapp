<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="<?= base_url() ?>/vendors/images/register-page-img.png">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="register-box bg-white box-shadow border-radius-10">
                    <div class="wizard-content">

                        <form class="tab-wizard2 wizard-circle wizard" action="<?= base_url(route_to('register')) ?>" method="post" onkeypress="return event.keyCode != 13" id="form">
                            <?= csrf_field() ?>

                            <!-- Step 1 -->
                            <h5>Keamanan Akun</h5>
                            <section class="form-section">
                                <div class="form-wrap max-width-600 mx-auto">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?= lang('Auth.email') ?><i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" value="<?= old('email') ?>" name="email" required data-parsley-required-message="Email harus diisi" data-parsley-length="[10,100]" data-parsley-length-message="Minimal 10 karakter, maksimal 100 karakter" data-parsley-type="email" data-parsley-type-message="Email tidak valid" data-parsley-trigger="keyup">
                                            <div class="invalid-feedback">
                                                <?= session('errors.email') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?= lang('Auth.username') ?><i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control  <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>" required data-parsley-required-message="Username harus diisi" data-parsley-length="[3,15]" data-parsley-length-message="Minimal 3 karakter, maksimal 15 karakter" data-parsley-type="alphanum" data-parsley-type-message="Username tidak boleh spesial" data-parsley-trigger="keyup">
                                            <div class="invalid-feedback">
                                                <?= session('errors.username') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?= lang('Auth.password') ?><i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="password" id="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" autocomplete="off" value="<?= old('password') ?>" required data-parsley-required-message="Password harus diisi" minlength="6" data-parsley-minlength-message="Password terlalu singkat" data-parsley-trigger="keyup">
                                            <div class="invalid-feedback">
                                                <?= session('errors.password') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?= lang('Auth.repeatPassword') ?><i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off" value="<?= old('pass_confirm') ?>" required data-parsley-required-message="Repeat Password harus diisi" data-parsley-equalto="#password" data-parsley-equalto-message="Password tidak sesuai" data-parsley-trigger="keyup">
                                            <div class="invalid-feedback">
                                                <?= session('errors.pass_confirm') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Step 2 -->
                            <h5>Informasi Pribadi</h5>
                            <section class="form-section">
                                <div class="form-wrap max-width-600 mx-auto">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Nama Lengkap<i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" value="<?= old('fullname') ?>" required data-parsley-required-message="Nama harus diisi" data-parsley-length="[3,40]" data-parsley-length-message="Minimal 3 karakter, maksimal 40 karakter" data-parsley-trigger="keyup">
                                            <div class="invalid-feedback">
                                                <?= session('errors.fullname') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">No Induk Kependudukan<i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control <?php if (session('errors.nik')) : ?>is-invalid<?php endif ?>" name="nik" value="<?= old('nik') ?>" required data-parsley-required-message="NIK harus diisi" data-parsley-length="[16,16]" data-parsley-length-message="NIK harus berjumlah 16 digit" data-parsley-type="number" data-parsley-type-message="Hanya boleh angka" data-parsley-trigger="keyup">
                                            <div class="invalid-feedback">
                                                <?= session('errors.nik') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Nomor Handphone<i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid<?php endif ?>" name="no_hp" value="<?= old('no_hp') ?>" required data-parsley-required-message="No HP harus diisi" data-parsley-length="[10,13]" data-parsley-length-message="No HP minimal 10 digit, maximal 13 digit" data-parsley-type="number" data-parsley-type-message="Hanya boleh angka" data-parsley-trigger="keyup">
                                            <div class="invalid-feedback">
                                                <?= session('errors.no_hp') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Alamat Lengkap<i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" name="alamat" value="<?= old('alamat') ?>" required data-parsley-required-message="Alamat harus diisi" data-parsley-minlength="20" data-parsley-minlength-message="Alamat terlalu singkat" data-parsley-maxlength="100" data-parsley-maxlength-message="Alamat terlalu panjang" data-parsley-trigger="keyup">
                                            <div class="invalid-feedback">
                                                <?= session('errors.alamat') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <button id="register-submit" hidden type="submit" onKeyPress="return disableEnterKey(event)" class="btn btn-primary"><?= lang('Auth.register') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('my-js'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
<?= $this->endSection(); ?>