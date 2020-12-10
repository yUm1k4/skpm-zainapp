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

                        <form class="tab-wizard2 wizard-circle wizard" action="<?= base_url(route_to('register')) ?>" method="post" onkeypress="return event.keyCode != 13">
                            <?= csrf_field() ?>

                            <!-- Step 1 -->
                            <h5>Keamanan Akun</h5>
                            <section>
                                <div class="form-wrap max-width-600 mx-auto">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?= lang('Auth.email') ?><i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" value="<?= old('email') ?>" name="email">
                                            <div class="invalid-feedback">
                                                <?= session('errors.email') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?= lang('Auth.username') ?><i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control  <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.username') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?= lang('Auth.password') ?><i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" autocomplete="off" value="<?= old('password') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.password') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?= lang('Auth.repeatPassword') ?><i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off" value="<?= old('pass_confirm') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.pass_confirm') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!-- Step 2 -->
                            <h5>Informasi Pribadi</h5>
                            <section>
                                <div class="form-wrap max-width-600 mx-auto">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Nama Lengkap<i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" value="<?= old('fullname') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.fullname') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">No Induk Kependudukan<i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control <?php if (session('errors.nik')) : ?>is-invalid<?php endif ?>" name="nik" value="<?= old('nik') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.nik') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Nomor Handphone</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid<?php endif ?>" name="no_hp" value="<?= old('no_hp') ?>">
                                            <div class="invalid-feedback">
                                                <?= session('errors.no_hp') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Alamat Lengkap<i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" name="alamat" value="<?= old('alamat') ?>">
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