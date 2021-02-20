<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>
<div class="min-height-200px">
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box">
                <div class="profile-photo">
                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>

                    <?php if ($admin[0]->user_image == null) { ?>
                        <img src="<?= base_url('images/avatar.png/') ?>" class="avatar-photo img-fluid">
                    <?php } else { ?>
                        <img src="<?= base_url() ?>/images/admin-images/<?= user()->user_image ?>" alt="" class="avatar-photo" img-fluid>
                    <?php } ?>

                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <form action="<?= base_url('/admin-profile/updateFoto/' . user()->id) ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="profilLama" value="<?= $admin[0]->user_image ?>">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pd-5">
                                        <div class="img-container">
                                            <?php if ($admin[0]->user_image == null) : ?>
                                                <img src="<?= base_url('images/avatar.png/') ?>" class="img-thumbnail img-preview">
                                            <?php else : ?>
                                                <img src="<?= base_url() ?>/images/admin-images/<?= $admin[0]->user_image ?>" class="img-thumbnail img-preview">
                                            <?php endif; ?>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?php if (session('errors.user_image')) : ?>is-invalid <?php endif ?>" name="user_image" id="user_image" onchange="preViewImg()" required data-parsley-required-message="Pilih foto sebelum memperbarui" data-parsley-max-file-size="1024" data-parsley-trigger="keyup">
                                            <div class="invalid-feedback">
                                                <?= session('errors.user_image') ?>
                                            </div>
                                            <label class="custom-file-label" for="user_image"><?= $admin[0]->user_image ?></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <h5 class="text-center h5 mb-0 text-blue"><?= $admin[0]->username ?></h5>
                <p class="text-center text-muted font-14"><?= $admin[0]->fullname ?></p>
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Kontak Informasi</h5>
                    <ul>
                        <li>
                            <span>Nomor Induk Kependudukan:</span>
                            <?= $admin[0]->nik ?>
                        </li>
                        <li>
                            <span>Alamat Email:</span>
                            <?= $admin[0]->email ?>
                        </li>
                        <li>
                            <span>No Handphone:</span>
                            <?= $admin[0]->no_hp ?>
                        </li>
                        <li>
                            <span>Alamat Rumah:</span>
                            <?= $admin[0]->alamat ?>
                        </li>
                        <li>
                            <span>Role Group:</span>
                            Administrator
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box height-100-p overflow-hidden">
                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
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
                        </ul>
                        <div class="tab-content">
                            <!-- My Profile Tab start -->
                            <div class="tab-pane fade show active" id="myProfile" role="tabpanel">
                                <div class="profile-setting">
                                    <ul class="profile-edit-list row pt-0">
                                        <li class="weight-500 col-md-12">
                                            <h4 class="text-blue h5 mb-10"><?= $title ?></h4>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input class="form-control form-control-lg" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control form-control-lg" type="email">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input class="form-control form-control-lg" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" class="btn btn-primary" value="Update Information">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- My Profile Tab End -->
                        </div>
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