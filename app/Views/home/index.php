<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>

<style>
    .numberCount {
        line-height: 100px;
        color: white;
        /* margin-left: 30px; */
        font-size: 100px;
    }

    .numberDiv {
        padding-top: 0px;
    }

    .we-padding {
        padding-bottom: 140px;
    }

    @media (max-width: 767px) {
        .numberDiv {
            padding-bottom: 80px;
            padding-top: 0px;
        }

        .haveAproject .numberText p {
            font-size: 3.5rem;
        }

        .haveAproject .numberText h2 {
            font-size: 21px;
        }

        .we-padding {
            padding-bottom: 70px;
        }

        .testimonial-caption .testimonial-founder .founder-text span {
            font-size: 18px !important;
        }

        .testimonial-area .testimonial-main .testimonial-title {
            margin-bottom: -30px;
        }
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Slider Area Start-->
<div class="slider-area ">
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center" data-background="<?= base_url() ?>/home/img/hero/h1_hero.png">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-7 col-md-9 ">
                        <div class="hero__caption">
                            <h2 data-animation="fadeInLeft" data-delay=".4s"> Sampaikan <span id="typed"></span> Anda</h2>
                            <p data-animation="fadeInLeft" data-delay=".4s">Sistem Keluhan dan Pengaduan Masyarakat <?= setting()->nama_aplikasi_frontend ?> adalah layanan penyampaian semua aspirasi, pelaporan, pengaduan, dan keluhan masyarakat.</p>
                            <div class="hero__btn" data-animation="fadeInLeft" data-delay=".4s">
                                <a href="<?= base_url('lapor') ?>" class="btn hero-btn">LAPOR!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay=".4s">
                            <img src="<?= base_url() ?>/home/img/hero/hero_right.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-height d-flex align-items-center" data-background="<?= base_url() ?>/home/img/hero/h1_hero.png">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-7 col-md-9 ">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay=".4s">Sampaikan<br> Pengaduan Anda</h1>
                            <p data-animation="fadeInLeft" data-delay=".6s">Sistem Keluhan dan Pengaduan Masyarakat <?= setting()->nama_aplikasi_frontend ?> adalah layanan penyampaian semua aspirasi, pelaporan, pengaduan, dan keluhan masyarakat.</p>
                            <!-- Hero-btn -->
                            <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                <a href="<?= base_url() ?>" class="btn hero-btn">Cari Pengaduan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero__img d-none d-lg-block">
                            <img src="<?= base_url() ?>/home/img/hero/hero_right.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End-->

<!-- What We do start-->
<div class="what-we-do we-padding">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center">
                    <h2>Keunggualan Aplikasi Kami</h2>
                    <!-- <div id="counter">100</div> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-do text-center mb-30">
                    <div class="do-icon">
                        <span class="flaticon-chart"></span>
                    </div>
                    <div class="do-caption">
                        <h4>Keamanan</h4>
                        <p>Keamanan dan Kerahasiaan data serta informasi pribadi akan dijamin oleh pengelola layanan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-do active text-center mb-30">
                    <div class="do-icon">
                        <span class="flaticon-growth"></span>
                    </div>
                    <div class="do-caption">
                        <h4>Gratis</h4>
                        <p>Penyedia layanan tidak memungut biaya sepeserpun terhadap penggunaan layanan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-do text-center mb-30">
                    <div class="do-icon">
                        <span class="flaticon-speaker"></span>
                    </div>
                    <div class="do-caption">
                        <h4>Anonim</h4>
                        <p>Pengguna memiliki hak jaminan anonimitas dan kerahasiaan keluhan yang dikirimkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- What We do End-->

<!-- Jumlah Laporan Start-->
<div class="have-project footer-padding numberDiv">
    <div class="container">
        <div class="haveAproject" data-background="<?= base_url() ?>/home/img/hero/have.jpg">
            <div class="row d-flex align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="wantToWork-caption numberText text-center">
                        <h2>Jumlah Laporan Saat Ini</h2>
                        <p class="numberCount"><?= number_format($total_pengaduan) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jumlah Laporan End -->

<!-- We Create Start -->
<div class="we-create-area create-padding">
    <div class="container">
        <div class="row d-flex align-items-end">
            <div class="col-lg-6 col-md-12">
                <div class="we-create-img">
                    <img src="<?= base_url() ?>/home/img/service/we-create.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="we-create-cap">
                    <h3 class="mb-5">Kami Sangat Peduli Dengan Keluh Kesah Anda</h3>
                    <p>Untuk itulah kami membuat aplikasi ini. Sistem Keluhan dan Pengaduan Masyarak <?= setting()->nama_aplikasi_frontend ?> adalah layanan penyampaian semua aspirasi, pelaporan, pengaduan, dan keluhan untuk masyarakat Indonesia, yang dapat diakses Online dengan mudah melalui web browser.</p>
                    <div></div>
                    <!-- <a href="#" class="btn">Contact Us</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- We Create End -->

<!-- Testimonial Start -->
<div class="testimonial-area">
    <div class="container">
        <div class="testimonial-main">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 px-0 testimonial-title">
                    <div class="section-tittle text-center">
                        <h2>Apa Kata Mereka?</h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="h1-testimonial-active">
                        <?php foreach ($testimoni as $t) { ?>
                            <div class="single-testimonial text-center">
                                <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap">
                                        <p><?= $t['testimoni'] ?></p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                        <div class="founder-img">
                                            <?php if ($t['group_id'] == 3) { ?>
                                                <?php if ($t['user_image'] == null) { ?>
                                                    <img src="<?= base_url() ?>/images/avatar.png" class="img-fluid rounded-circle" width="90" alt="">
                                                <?php } else { ?>
                                                    <img src="<?= base_url() ?>/images/user-images/<?= $t['user_image'] ?>" class="img-fluid rounded-circle" width="90" alt="">
                                                <?php } ?>
                                            <?php } else { ?>
                                                <?php if ($t['user_image'] == null) { ?>
                                                    <img src="<?= base_url() ?>/images/avatar.png" class="img-fluid rounded-circle" width="90" alt="">
                                                <?php } else { ?>
                                                    <img src="<?= base_url() ?>/images/admin-images/<?= $t['user_image'] ?>" class="img-fluid rounded-circle" width="90" alt="">
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                        <div class="founder-text">
                                            <span><?= $t['fullname'] ?></span>
                                            <p><?= $t['pekerjaan'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Saran Start-->
<div class="have-project footer-padding">
    <div class="container">
        <div class="haveAproject" data-background="<?= base_url() ?>/home/img/hero/have.jpg">
            <div class="row d-flex align-items-center">
                <div class="col-xl-7 col-lg-9 col-md-12">
                    <div class="wantToWork-caption">
                        <h2>Punya saran untuk kami?</h2>
                        <p>Segera kontak kami karena kami selalu terbuka dalam menerima kritik, saran, dan masukkan untuk pengembangan aplikasi menjadi lebih baik.</p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-3 col-md-12">
                    <div class="wantToWork-btn f-right">
                        <a href="<?= base_url('/hubungi') ?>" class="btn btn-ans">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Saran End -->

<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>
<!-- Typed Script -->
<script src="<?= base_url() ?>/home/js/typed.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var typed = new Typed('#typed', {
            strings: [
                'Aspirasi',
                'Laporan',
                'Pengaduan',
                'Keluhan'
            ],
            typeSpeed: 120,
            backSpeed: 120,
            backDelay: 5000,
            loop: true
        });

        var section = document.querySelector('.numberDiv');
        var hasEntered = false;

        window.addEventListener('scroll', (e) => {
            var shouldAnimate = (window.scrollY + window.innerHeight) >= section.offsetTop;

            if (shouldAnimate && !hasEntered) {
                hasEntered = true;

                $('.numberCount').each(function() {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 5000,
                        easing: 'swing',
                        step: function(now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });

            }
        });
    })
</script>
<?= $this->endSection(); ?>