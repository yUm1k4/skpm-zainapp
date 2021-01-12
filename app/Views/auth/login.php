<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="<?= base_url() ?>/vendors/images/login-page-img.png" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Login To Zain App</h2>
                    </div>

                    <?php
                    // view('Myth\Auth\Views\_message_block') 
                    ?>
                    <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>

                    <form action="<?= base_url(route_to('login')) ?>" method="post">
                        <?= csrf_field() ?>

                        <?php if ($config->validFields === ['email']) : ?>
                            <div class="input-group custom">
                                <input type="email" name="login" class="form-control form-control-md mr-5 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.email') ?>">
                                <div class="input-group-append custom">
                                    <span class="input-group-text <?php if (session('errors.login')) : ?>mb-4<?php endif ?>"><i class="icon-copy dw dw-email1"></i></span>
                                </div>
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="input-group custom">
                                <input type="text" name="login" class="form-control form-control-md mr-5 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                <div class="input-group-append custom">
                                    <span class="input-group-text <?php if (session('errors.login')) : ?>mb-4<?php endif ?>"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-md mr-5 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="**********" name="password">
                            <div class="input-group-append custom">
                                <span class="input-group-text <?php if (session('errors.login')) : ?>mb-4<?php endif ?>"><i class="dw dw-padlock1"></i></span>
                            </div>
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>


                        <div class="row pb-30">
                            <?php if ($config->allowRemembering) : ?>
                                <div class="col">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" <?php if (old('remember')) : ?> checked <?php endif ?> id="customCheck1" name="remember">
                                        <label class="custom-control-label" for="customCheck1"><?= lang('Auth.rememberMe') ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ($config->activeResetter) : ?>
                                <div class="col-auto">
                                    <div class="forgot-password"><a href="<?= base_url('forgot') ?>">Forgot Password</a></div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <button class="btn btn-primary btn-md btn-block" type="submit">Log In</button>
                                </div>
                                <?php if ($config->allowRegistration) : ?>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373"> OR</div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-md btn-block" href="<?= base_url('register') ?>">Register</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>