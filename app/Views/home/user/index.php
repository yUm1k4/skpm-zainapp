<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
<style>
    .single-post-area .blog-author {
        margin-top: 0px;
    }

    @media (max-width: 768px) {
        .single-post-area .blog-author h4 {
            font-size: 15px;
        }

        .section-padding {
            padding-top: 80px;
        }
    }

    @media (max-width: 600px) {
        .single-post-area .blog-author img {
            width: 75px !important;
            height: 75px !important;
            margin-left: 15px;
        }
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
                        <?php if (user()->user_image == null) { ?>
                            <img src="<?= base_url('images/avatar.png') ?>" alt="">
                        <?php } else { ?>
                            <img src="<?= base_url('images/user-images') . '/' . user()->user_image ?>" alt="">
                        <?php } ?>
                        <div class="media-body">
                            <div>

                                <h4><?= xss(user()->fullname); ?></h4>

                                <div>
                                    <a href="<?= base_url('user-profile/edit/' . user()->id) ?>">
                                        <h4 href="javascript:;" class="text-biru-gelap"><i class="fa fa-cog"></i> Edit Profil</h4>
                                    </a>
                                </div>

                                <div>
                                    <a href="<?= base_url('user-profile/change-password/' . user()->id . '/' .  user()->username) ?>">
                                        <h4 href="javascript:;" class="text-biru-gelap">
                                            <i class="fa fa-lock"></i> Ganti Password
                                        </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="text" class="single-input" value="<?= xss(user()->username); ?>">
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <input type="text" class="single-input" value="<?= xss(user()->email); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-id-card" aria-hidden="true"></i></div>
                                <input type="text" class="single-input" value="<?= xss(user()->nik); ?>">
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <input type="text" class="single-input" value="<?= xss(user()->no_hp); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <div class="input-group-icon mt-10">
                                <div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                <input type="text" class="single-input" value="<?= xss(user()->alamat); ?>">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Cari Laporan Berdasarkan Kode' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Laporan Berdasarkan Kode'">
                                    <div class="input-group-append">
                                        <button class="btns" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Cari</button>
                        </form>
                    </aside>
                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title mb-3">Subscribe</h4>
                        <p>Untuk Mendapatkan Info Terbaru</p>
                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Email'" placeholder='Alamat Email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Subscribe</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ User Profile Area end =================-->

<?= $this->endSection() ?>