<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
<style>
    .single-post-area .blog-author {
        margin-top: 0px;
    }

    @media (max-width: 767px) {
        .single-post-area .blog-author h4 {
            font-size: 15px;
        }
    }

    @media (max-width: 768px) {
        .section-padding {
            padding-top: 80px;
        }

    }

    @media (max-width: 425px) {
        form label {
            font-weight: 400;
        }

    }

    label {
        font-weight: 600;
        color: #4043bc;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!--================User Profile Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="blog-author">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <div class="d-flex justify-content-between">
                                <h4>Ubah password <?= user()->username ?></h4>
                                <div>
                                    <a href="<?= base_url('user-profile/') ?>">
                                        <h4 href="#" class="text-biru-gelap"><i class="fa fa-arrow-left"></i> Kembali</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="<?= base_url('/user-profile/change-password/' . user()->id . '/' . user()->username) ?>" method="POST" class="mt-3" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Password Lama :</label>
                                <input type="password" class="form-control <?php if (session('errors.password_lama')) : ?>is-invalid <?php endif ?>" name="password_lama" value="<?= (old('password_lama')) ? old('password_lama') : '' ?>" required autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= session('errors.password_lama') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Password Baru :</label>
                                <input type="password" class="form-control <?php if (session('errors.password_baru')) : ?>is-invalid <?php endif ?>" name="password_baru" value="<?= (old('password_baru')) ? old('password_baru') : '' ?>" required autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= session('errors.password_baru') ?>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Ulangi Password :</label>
                                <input type="password" class="form-control <?php if (session('errors.ulangi_password')) : ?>is-invalid <?php endif ?>" name="ulangi_password" value="<?= (old('ulangi_password')) ? old('ulangi_password') : '' ?>" required autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= session('errors.ulangi_password') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 justify-content-start">
                                <button type="submit" class="button button-contactForm boxed-btn btn-block mt-2">Ubah Password</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================ User Profile Area end =================-->

<?= $this->endSection() ?>