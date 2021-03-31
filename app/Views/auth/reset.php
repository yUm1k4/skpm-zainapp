<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="<?= base_url() ?>/vendors/images/forgot-password.png" alt="">
            </div>
            <div class="col-md-6">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Kamu Lupa Password?</h2>
                    </div>
                    <p class="mb-10">Masukkan kode yg kamu terima melalui email.</p>

                    <form action="<?= base_url(route_to('reset-password')) ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="input-group custom">
                            <input type="text" class="form-control form-control-lg mr-5 <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>" name="token">
                            <div class="input-group-append custom">
                                <span class="input-group-text <?php if (session('errors.token')) : ?>mb-4<?php endif ?>"><i class="dw dw-key1" aria-hidden="true"></i></span>
                            </div>
                            <div class="invalid-feedback">
                                <?= session('errors.token') ?>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="email" class="form-control form-control-lg mr-5 <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="Email" name="email" value="<?= old('email') ?>">
                            <div class="input-group-append custom">
                                <span class="input-group-text <?php if (session('errors.email')) : ?>mb-4<?php endif ?>"><i class="dw dw-email1" aria-hidden="true"></i></span>
                            </div>
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg mr-5 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="Password Baru">
                            <div class="input-group-append custom">
                                <span class="input-group-text <?php if (session('errors.password')) : ?>mb-4<?php endif ?>"><i class="dw dw-padlock1" aria-hidden="true"></i></span>
                            </div>
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg mr-5 <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="Ulangi Password Baru">
                            <div class="input-group-append custom">
                                <span class="input-group-text <?php if (session('errors.pass_confirm')) : ?>mb-4<?php endif ?>"><i class="dw dw-open-padlock" aria-hidden="true"></i></span>
                            </div>
                            <div class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Reset Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>