<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>

<div class="pd-20 card-box mb-30">
    <div class="row">
        <div class="col">
            <div class="title">
                <h4><?= $title; ?></h4>
            </div>
        </div>
        <div class="col-auto">
            <a href="<?= base_url('/masyarakat') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="dw dw-left-arrow2"></i>
                </span>
                <span class="text">
                    Kembali
                </span>
            </a>
        </div>
    </div>
    <div class="wizard-content">
        <form class="tab-wizard2 wizard-circle wizard" action="<?= base_url('/masyarakat') ?>" method="post" onkeypress="return event.keyCode != 13">
            <?= csrf_field() ?>

            <!-- Step 1 -->
            <h5>Keamanan Akun</h5>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username :</label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid <?php endif ?>" name="username" value="<?= old('username') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.username') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Email :</label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid <?php endif ?>" name="email" value="<?= old('email') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password :</label>
                            <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid <?php endif ?>" name="password" value="<?= old('password') ?>" autocomplete="off">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Repeat Password :</label>
                            <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid <?php endif ?>" name="pass_confirm" value="<?= old('pass_confirm') ?>" autocomplete="off">
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Lengkap :</label>
                            <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid <?php endif ?>" name="fullname" value="<?= old('fullname') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.fullname') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No Induk Kependudukan :</label>
                            <input type="number" class="form-control <?php if (session('errors.nik')) : ?>is-invalid <?php endif ?>" name="nik" value="<?= old('nik') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.nik') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Handphone :</label>
                            <input type="number" class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid <?php endif ?>" name="no_hp" value="<?= old('no_hp') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.no_hp') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Lengkap :</label>
                            <input type="text" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid <?php endif ?>" name="alamat" value="<?= old('alamat') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.alamat') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <button id="register-submit" hidden type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>