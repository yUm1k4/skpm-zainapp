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
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid <?php endif ?>" name="username" value="<?= (old('username')) ? old('username') : xss($masyarakat[0]->username) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Username harus diisi" data-parsley-length="[3,15]" data-parsley-length-message="Minimal 3 karakter, maksimal 15 karakter" data-parsley-type="alphanum" data-parsley-type-message="Username tidak boleh spesial">
                            <div class="invalid-feedback">
                                <?= session('errors.username') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Email :</label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid <?php endif ?>" name="email" value="<?= (old('email')) ? old('email') : xss($masyarakat[0]->email) ?>">
                            <div class="invalid-feedback" required data-parsley-trigger="keyup" data-parsley-required-message="Email harus diisi" data-parsley-length="[10,100]" data-parsley-length-message="Minimal 10 karakter, maksimal 100 karakter" data-parsley-type="email" data-parsley-type-message="Email tidak valid">
                                <?= session('errors.email') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Lengkap :</label>
                            <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid <?php endif ?>" name="fullname" value="<?= xss($masyarakat[0]->fullname) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Nama harus diisi" data-parsley-length="[3,50]" data-parsley-length-message="Minimal 3 karakter, maksimal 50 karakter">
                            <div class="invalid-feedback">
                                <?= session('errors.fullname') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No Induk Kependudukan :</label>
                            <input type="number" class="form-control <?php if (session('errors.nik')) : ?>is-invalid <?php endif ?>" name="nik" value="<?= (old('nik')) ? old('nik') : xss($masyarakat[0]->nik) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="NIK harus diisi" data-parsley-length="[16,16]" data-parsley-length-message="NIK harus berjumlah 16 digit" data-parsley-type="number" data-parsley-type-message="Hanya boleh angka">
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
                            <input type="text" class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid <?php endif ?>" name="no_hp" value="<?= xss($masyarakat[0]->no_hp) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="No HP harus diisi" data-parsley-length="[10,13]" data-parsley-length-message="No HP minimal 10 digit, maximal 13 digit" data-parsley-type="number" data-parsley-type-message="Hanya boleh angka">
                            <div class="invalid-feedback">
                                <?= session('errors.no_hp') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat Lengkap :</label>
                            <input type="text" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid <?php endif ?>" name="alamat" value="<?= xss($masyarakat[0]->alamat) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Alamat harus diisi" data-parsley-minlength="20" data-parsley-minlength-message="Alamat terlalu singkat" data-parsley-maxlength="200" data-parsley-maxlength-message="Alamat terlalu panjang">
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
                                    <?php if ($masyarakat[0]->user_image == null) : ?>
                                        <img src="<?= base_url('images/avatar.png/') ?>" width="90" class="img-thumbnail img-preview">
                                    <?php else : ?>
                                        <img src="<?= base_url() ?>/images/user-images/<?= $masyarakat[0]->user_image ?>" class="img-thumbnail img-preview">
                                    <?php endif; ?>

                                </div>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?php if (session('errors.user_image')) : ?>is-invalid <?php endif ?>" name="user_image" id="user_image" onchange="preViewImg()" data-parsley-max-file-size="1024" data-parsley-trigger="click">
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