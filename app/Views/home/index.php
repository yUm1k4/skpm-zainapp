<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
<style>
    .numberCount {
        line-height: 100px;
        color: white;
        /* margin-left: 30px; */
        font-size: 100px;
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
                            <p data-animation="fadeInLeft" data-delay=".4s">Sistem Keluhan dan Pengaduan Masyarakat (SKPM) - Zain App adalah layanan penyampaian semua aspirasi, pelaporan, pengaduan, dan keluhan masyarakat.</p>
                            <div class="hero__btn">
                                <a href="<?= base_url('lapor') ?>" class="btn hero-btn">LAPOR!</a>
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
                <div class="section-tittle text-center" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
                    <h2>Keunggualan Aplikasi Kami</h2>
                    <!-- <div id="counter">100</div> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="zoom-in-left" data-aos-duration="1000" data-aos-delay="300">
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
            <div class="col-lg-4 col-md-6" data-aos="zoom-in-up" data-aos-duration="1000" data-aos-delay="300">
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
                <div class="single-do text-center mb-30" data-aos="zoom-in-right" data-aos-duration="1000" data-aos-delay="300">
                    <div class="do-icon">
                        <span class="flaticon-speaker"></span>
                    </div>
                    <div class="do-caption">
                        <h4>Anonim</h4>
                        <!-- <p>Pengguna mendapatkan jaminan anonimitas dan kerahasian keluhan yang dikirimkan.</p> -->
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
    <div class="container" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000">
        <div class="haveAproject" data-background="<?= base_url() ?>/home/img/hero/have.jpg">
            <div class="row d-flex align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="wantToWork-caption numberText text-center">
                        <h2>Jumlah Laporan Saat Ini</h2>
                        <p class="numberCount"><?= $total_pengaduan ?></p>
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
                <div class="we-create-img" data-aos-easing="inline" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
                    <img src="<?= base_url() ?>/home/img/service/we-create.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="we-create-cap">
                    <h3 class="mb-5" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">Kami Sangat Peduli Dengan Keluh Kesah Anda</h3>
                    <p data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">Untuk itulah kami membuat aplikasi ini. Sistem Keluhan dan Pengaduan Masyarak (SKPM) - Zain App adalah layanan penyampaian semua aspirasi, pelaporan, pengaduan, dan keluhan untuk masyarakat Indonesia, yang dapat diakses Online dengan mudah melalui web browser.</p>
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
                <div class="col-lg-5  col-md-8 pr-0">
                    <div class="section-tittle text-center" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
                        <h2>Apa Kata Mereka?</h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 col-md-9">
                    <div class="h1-testimonial-active">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>Pemerintah yang modern mendengarkan keluhan rakyatnya melalui SKPM - Zain App, sebuah inovasi karya anak bangsa. Salut untuk SKPM - Zain App! </p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="<?= base_url() ?>/home/img/testmonial/testimonial.png" alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Bu Olivia</span>
                                        <p>Ibu Rumah Tangga</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Single Testimonial 2 -->
                        <div class="single-testimonial text-center">
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>Program yang sangat baik, menjadi bukti pemerintah menjunjung tinggi nilai demokrasi. Kita dapat menyampaikan aspirasi, pengaduan dan meminta bantuan untuk menyelesaikan permasalahan warga. Serta sejalan dengan perkembangan zaman dengan memanfaatkan media elektronik dan media sosial yang diakrabi generasi muda.</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="<?= base_url() ?>/home/img/testmonial/testi2.png" alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Seapudin</span>
                                        <p>Mahasiswa</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Single Testimonial 3 -->
                        <div class="single-testimonial text-center">
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>SKPM - Zain App adalah sarana partisipasi masyarakat berbasis media sosial yang mudah dan terpadu untuk pengawasan pembangunan infrastruktur desa dan pelayanan publik di Indonesia. </p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="<?= base_url() ?>/home/img/testmonial/testi3.png" alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Mang Asep</span>
                                        <p>Kuli Proyek</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Saran Start-->
<div class="have-project footer-padding">
    <div class="container" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000">
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
                        <a href="#" class="btn btn-ans">Kontak Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Saran End -->

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
                        duration: 4000,
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