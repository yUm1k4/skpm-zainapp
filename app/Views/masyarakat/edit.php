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
        <form class="tab-wizard2 wizard-circle wizard" action="<?= base_url('/masyarakat/update/' . $masyarakat[0]->userid) ?>" method="post" onkeypress="return event.keyCode != 13" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <input type="hidden" name="id" value="<?= $masyarakat[0]->userid ?>">
            <input type="hidden" name="profilLama" value="<?= $masyarakat[0]->user_image ?>">
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username :</label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid <?php endif ?>" name="username" value="<?= (old('username')) ? old('username') : xss($masyarakat[0]->username) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.username') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Email :</label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid <?php endif ?>" name="email" value="<?= (old('email')) ? old('email') : xss($masyarakat[0]->email) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Lengkap :</label>
                            <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid <?php endif ?>" name="fullname" value="<?= xss($masyarakat[0]->fullname) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.fullname') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No Induk Kependudukan :</label>
                            <input type="number" class="form-control <?php if (session('errors.nik')) : ?>is-invalid <?php endif ?>" name="nik" value="<?= (old('nik')) ? old('nik') : xss($masyarakat[0]->nik) ?>">
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
                            <input type="text" class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid <?php endif ?>" name="no_hp" value="<?= xss($masyarakat[0]->no_hp) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.no_hp') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Lengkap :</label>
                            <input type="text" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid <?php endif ?>" name="alamat" value="<?= xss($masyarakat[0]->alamat) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.alamat') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Foto Profil :</label>
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="<?= base_url() ?>/images/user-images/<?= $masyarakat[0]->user_image ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?php if (session('errors.user_image')) : ?>is-invalid <?php endif ?>" name="user_image" id="user_image" onchange="preViewImg()">
                                        <div class="invalid-feedback">
                                            <?= session('errors.user_image') ?>
                                        </div>
                                        <label class="custom-file-label" for="user_image"><?= $masyarakat[0]->user_image ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="form-group row">
                <div class="col-md-12 justify-content-start">
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                    <button type="reset" class="btn btn-warning text-white">Reset</button>
                </div>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>