<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>
<div class="min-height-200px">
    <div class="row">

        <!-- Sidebar Start -->
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box">
                <div class="profile-photo">
                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>

                    <?php if ($petugas[0]->user_image == null) { ?>
                        <img src="<?= base_url('images/avatar.png/') ?>" class="avatar-photo img-fluid">
                    <?php } else { ?>
                        <img src="<?= base_url() ?>/images/admin-images/<?= user()->user_image ?>" alt="" class="avatar-photo" img-fluid>
                    <?php } ?>

                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <form action="<?= base_url('/petugas-profile/updateFoto/' . user()->id) ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="profilLama" value="<?= $petugas[0]->user_image ?>">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-4">
                                        <div class="img-container">
                                            <?php if ($petugas[0]->user_image == null) : ?>
                                                <img src="<?= base_url('images/avatar.png/') ?>" class="img-thumbnail img-preview">
                                            <?php else : ?>
                                                <img src="<?= base_url() ?>/images/admin-images/<?= $petugas[0]->user_image ?>" class="img-thumbnail img-preview">
                                            <?php endif; ?>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?php if (session('errors.user_image')) : ?>is-invalid <?php endif ?>" name="user_image" id="user_image" onchange="preViewImg()" required data-parsley-required-message="Pilih foto sebelum memperbarui" data-parsley-max-file-size="1024" data-parsley-trigger="keyup">
                                            <div class="invalid-feedback">
                                                <?= session('errors.user_image') ?>
                                            </div>
                                            <label class="custom-file-label" for="user_image"><?= $petugas[0]->user_image ?></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <h5 class="text-center h5 mb-0 text-blue"><?= $petugas[0]->username ?></h5>
                <p class="text-center text-muted font-14"><?= $petugas[0]->fullname ?></p>
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Kontak Informasi</h5>
                    <ul>
                        <li>
                            <span>Role Group:</span>
                            Petugas
                        </li>
                        <li>
                            <span>Nomor Induk Kependudukan:</span>
                            <?= $petugas[0]->nik ?>
                        </li>
                        <li>
                            <span>Alamat Email:</span>
                            <?= $petugas[0]->email ?>
                        </li>
                        <li>
                            <span>No Handphone:</span>
                            <?= $petugas[0]->no_hp ?>
                        </li>
                        <li>
                            <span>Alamat Rumah:</span>
                            <?= $petugas[0]->alamat ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box overflow-hidden">
                <div class="profile-tab">
                    <div class="tab">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a href="<?= previous_url() ?>" class="nav-link">
                                    <i class="dw dw-left-arrow2"></i>
                                    Kembali
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#myProfile" role="tab">My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#changePassword" role="tab">Ubah Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- My Profile Tab start -->
                            <div class="tab-pane fade show active" id="myProfile" role="tabpanel">
                                <div class="profile-setting">
                                    <form action="<?= base_url('/petugas-profile/update/' . user()->id) ?>" method="post">
                                        <?= csrf_field() ?>
                                        <ul class="profile-edit-list row py-0">
                                            <li class="weight-500 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nama Lengkap</label>
                                                            <input class="form-control form-control-lg <?php if (session('errors.fullname')) : ?>is-invalid <?php endif ?>" type="text" name="fullname" value="<?= xss($petugas[0]->fullname) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Nama harus diisi" data-parsley-length="[3,50]" data-parsley-length-message="Minimal 3 karakter, maksimal 50 karakter">
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.fullname') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input class="form-control form-control-lg <?php if (session('errors.username')) : ?>is-invalid <?php endif ?>" type="text" name="username" value="<?= (old('username')) ? old('username') : xss($petugas[0]->username) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Username harus diisi" data-parsley-length="[3,15]" data-parsley-length-message="Minimal 3 karakter, maksimal 15 karakter" data-parsley-type="alphanum" data-parsley-type-message="Username tidak boleh spesial">
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.username') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Alamat Email</label>
                                                            <input type="email" class="form-control form-control-lg <?php if (session('errors.email')) : ?>is-invalid <?php endif ?>" name="email" value="<?= (old('email')) ? old('email') : xss($petugas[0]->email) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Email harus diisi" data-parsley-length="[10,100]" data-parsley-length-message="Minimal 10 karakter, maksimal 100 karakter" data-parsley-type="email" data-parsley-type-message="Email tidak valid">
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.email') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Nomor Induk Kependudukan</label>
                                                            <input type="number" class="form-control form-control-lg <?php if (session('errors.nik')) : ?>is-invalid <?php endif ?>" name="nik" value="<?= (old('nik')) ? old('nik') : xss($petugas[0]->nik) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="NIK harus diisi" data-parsley-length="[16,16]" data-parsley-length-message="NIK harus berjumlah 16 digit" data-parsley-type="number" data-parsley-type-message="Hanya boleh angka">
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.nik') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>No Handphone</label>
                                                            <input class="form-control form-control-lg <?php if (session('errors.no_hp')) : ?>is-invalid <?php endif ?>" name="no_hp" value="<?= xss($petugas[0]->no_hp) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="No HP harus diisi" data-parsley-length="[10,13]" data-parsley-length-message="No HP minimal 10 digit, maximal 13 digit" data-parsley-type="number" data-parsley-type-message="Hanya boleh angka">
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.no_hp') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Alamat Tempat Tinggal</label>
                                                            <textarea class="form-control <?php if (session('errors.alamat')) : ?>is-invalid <?php endif ?>" name="alamat" required data-parsley-trigger="keyup" data-parsley-required-message="Alamat harus diisi" data-parsley-minlength="20" data-parsley-minlength-message="Alamat terlalu singkat" data-parsley-maxlength="200" data-parsley-maxlength-message="Alamat terlalu panjang"><?= xss($petugas[0]->alamat) ?></textarea>
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.alamat') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-primary">Update Informasi</button>
                                                </div>
                                            </li>
                                        </ul>

                                    </form>
                                </div>
                            </div>
                            <!-- My Profile Tab End -->

                            <!-- Ubah Password Tab Start -->
                            <div class="tab-pane fade" id="changePassword" role="tabpanel">
                                <div class="profile-setting">
                                    <form action="<?= base_url('/petugas-profile/change-password/' . user()->id . '/' . user()->username) ?>" method="post">
                                        <?= csrf_field() ?>
                                        <ul class="profile-edit-list row py-0">
                                            <li class="weight-500 col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Password Lama</label>
                                                            <input class="form-control form-control-lg <?php if (session('errors.password_lama')) : ?>is-invalid <?php endif ?>" type="password" name="password_lama" required data-parsley-trigger="keyup" data-parsley-required-message="Password harus diisi">
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.password_lama') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Password Baru</label>
                                                            <input class="form-control form-control-lg <?php if (session('errors.password_baru')) : ?>is-invalid <?php endif ?>" type="password" name="password_baru" id="password_baru" required data-parsley-trigger="keyup" data-parsley-required-message="Password Baru harus diisi" data-parsley-minlength="8" data-parsley-minlength-message="Password terlalu singkat">
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.password_baru') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Ulangi Password</label>
                                                            <input type="password" class="form-control form-control-lg <?php if (session('errors.ulangi_password')) : ?>is-invalid <?php endif ?>" name="ulangi_password" required data-parsley-trigger="keyup" data-parsley-required-message="Ulangi Password harus diisi" data-parsley-equalto="#password_baru" data-parsley-equalto-message="Password tidak sesuai">
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.ulangi_password') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                                </div>
                                            </li>
                                        </ul>

                                    </form>
                                </div>
                            </div>
                            <!-- Ubah Password Tab End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content End -->

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