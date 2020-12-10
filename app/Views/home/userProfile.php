<?= $this->extend('home/templates/index'); ?>

<?= $this->section('content'); ?>

<!--================User Profile Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="blog-author">
                    <div class="media align-items-center">
                        <img src="<?= base_url('images/user-images') . '/' . user()->user_image ?>" alt="">
                        <div class="media-body">
                            <div class="d-flex justify-content-between">
                                <a href="">
                                    <h4><?= xss(user()->fullname); ?></h4>
                                </a>
                                <div>
                                    <a href="">
                                        <h4 href="#" class="text-biru-gelap text-uppercase"><i class="fa fa-cog"></i> Edit</h4>
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
                        <h4 class="widget_title">Subscribe</h4>
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