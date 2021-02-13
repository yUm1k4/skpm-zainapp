<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
<style>
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- Header Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Area End-->

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">
        <div class="mb-5 pb-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2958866074787!2d106.98985671434191!3d-6.3557315639462155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c22161d4051%3A0x7a0a35b288779341!2sSMK%20Negeri%202%20Kota%20Bekasi!5e0!3m2!1sid!2sid!4v1607004479421!5m2!1sid!2sid" style="width:100%; height:200px;" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Hubungi Kami</h2>
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Lengkap Anda'" placeholder="Nama Lengkap Anda">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Email Anda'" placeholder="Alamat Email Anda">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Isi Pesan Anda'" placeholder="Isi Pesan Anda"></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn">Kirim</button>
                    </div>
                </form>
            </div>

            <!-- Right Side -->
            <div class="col-lg-3 offset-lg-1">
                <?= $this->include('home/widget/kontak') ?>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<?= $this->endSection() ?>