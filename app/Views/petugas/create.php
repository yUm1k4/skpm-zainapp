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
            <a href="<?= base_url('/petugas') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
        <form class="tab-wizard2 wizard-circle wizard" action="<?= base_url('/petugas') ?>" method="post" onkeypress="return event.keyCode != 13">
            <?= csrf_field() ?>

            <!-- Step 1 -->
            <h5>Keamanan Akun</h5>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username :</label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid <?php endif ?>" name="username" value="<?= old('username') ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Username harus diisi" data-parsley-length="[3,15]" data-parsley-length-message="Minimal 3 karakter, maksimal 15 karakter" data-parsley-type="alphanum" data-parsley-type-message="Username tidak boleh spesial">
                            <div class="invalid-feedback">
                                <?= session('errors.username') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Email :</label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid <?php endif ?>" name="email" value="<?= old('email') ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Email harus diisi" data-parsley-length="[10,100]" data-parsley-length-message="Minimal 10 karakter, maksimal 100 karakter" data-parsley-type="email" data-parsley-type-message="Email tidak valid">
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
                            <input type="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid <?php endif ?>" name="password" value="<?= old('password') ?>" autocomplete="off" required data-parsley-trigger="keyup" data-parsley-required-message="Password harus diisi" minlength="6" data-parsley-minlength-message="Password terlalu singkat">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Repeat Password :</label>
                            <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid <?php endif ?>" name="pass_confirm" value="<?= old('pass_confirm') ?>" autocomplete="off" required data-parsley-trigger="keyup" data-parsley-required-message="Repeat Password harus diisi" data-parsley-equalto="#password" data-parsley-equalto-message="Password tidak sesuai">
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
                            <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid <?php endif ?>" name="fullname" value="<?= old('fullname') ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Nama harus diisi" data-parsley-length="[3,50]" data-parsley-length-message="Minimal 3 karakter, maksimal 50 karakter">
                            <div class="invalid-feedback">
                                <?= session('errors.fullname') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No Induk Kependudukan :</label>
                            <input type="number" class="form-control <?php if (session('errors.nik')) : ?>is-invalid <?php endif ?>" name="nik" value="<?= old('nik') ?>" required data-parsley-trigger="keyup" data-parsley-required-message="NIK harus diisi" data-parsley-length="[16,16]" data-parsley-length-message="NIK harus berjumlah 16 digit" data-parsley-type="number" data-parsley-type-message="Hanya boleh angka">
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
                            <input type="number" class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid <?php endif ?>" name="no_hp" value="<?= old('no_hp') ?>" required data-parsley-trigger="keyup" data-parsley-required-message="No HP harus diisi" data-parsley-length="[10,13]" data-parsley-length-message="No HP minimal 10 digit, maximal 13 digit" data-parsley-type="number" data-parsley-type-message="Hanya boleh angka">
                            <div class="invalid-feedback">
                                <?= session('errors.no_hp') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Lengkap :</label>
                            <input type="text" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid <?php endif ?>" name="alamat" value="<?= old('alamat') ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Alamat harus diisi" data-parsley-minlength="20" data-parsley-minlength-message="Alamat terlalu singkat" data-parsley-maxlength="200" data-parsley-maxlength-message="Alamat terlalu panjang">
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

<?= $this->section('my-js'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
<?= $this->endSection(); ?>