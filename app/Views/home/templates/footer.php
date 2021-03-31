<footer>
    <!-- Footer Start-->
    <div class="footer-main" data-background="<?= base_url() ?>/home/img/shape/footer_bg.png">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-4 col-md-4 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="<?= base_url() ?>" class="text-primary">
                                        <h5><?= setting()->nama_aplikasi_frontend ?></h5>
                                    </a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1"><?= setting()->nohp_setting ?></p>
                                        <p class="info1"><?= setting()->email_setting ?></p>
                                        <p class="info2"><?= setting()->alamat_setting ?></p>
                                    </div>
                                </div>
                                <div class="footer-social">
                                    <a href="<?= setting()->somed_1_url ?>" target="_blank"><i class="<?= setting()->somed_1_font ?>"></i></a>
                                    <a href="<?= setting()->somed_2_url ?>" target="_blank"><i class="<?= setting()->somed_2_font ?>"></i></a>
                                    <a href="<?= setting()->somed_3_url ?>" target="_blank"><i class="<?= setting()->somed_3_font ?>"></i></a>
                                    <?php if (setting()->somed_4_url && setting()->somed_4_font) { ?>
                                        <a href="<?= setting()->somed_4_url ?>" target="_blank"><i class="<?= setting()->somed_4_font ?>"></i></a>
                                    <?php } ?>
                                    <?php if (setting()->somed_5_url && setting()->somed_5_font) { ?>
                                        <a href="<?= setting()->somed_5_url ?>" target="_blank"><i class="<?= setting()->somed_5_font ?>"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Link Cepat</h4>
                                <ul>
                                    <li><a href="<?= base_url(setting()->lc_1_url) ?>"><?= setting()->lc_1_nama ?></a></li>
                                    <li><a href="<?= base_url(setting()->lc_2_url) ?>"><?= setting()->lc_2_nama ?></a></li>
                                    <li><a href="<?= base_url(setting()->lc_3_url) ?>"><?= setting()->lc_3_nama ?></a></li>
                                    <?php if (setting()->lc_4_url && setting()->lc_4_nama) { ?>
                                        <li><a href="<?= setting()->lc_4_url ?>"><?= setting()->lc_4_nama ?></a></li>
                                    <?php } ?>
                                    <?php if (setting()->lc_5_url && setting()->lc_5_nama) { ?>
                                        <li><a href="<?= setting()->lc_5_url ?>"><?= setting()->lc_5_nama ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-6">
                        <!-- <div class="single-footer-caption mb-50"> -->
                        <!-- <div id="show_maps" style="width:100%; height:100%;">
                        </div> -->
                        <iframe src="<?= setting()->map_link ?>" style="width:100%; height:80%;" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
        <?php  ?>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <!-- <p>

                                    Copyright &copy; <?= date('Y') ?> All rights reserved | Template by <a href="https://colorlib.com" target="_blank">Colorlib</a> | Develop and Re-Design by <a href="https://instagram.com/zaiabdullah_91/" target="_blank">Zainudin Abdullah</a>

                                </p> -->
                                <p><?= setting()->footer_frontend ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>