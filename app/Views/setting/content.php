<div class="row">
    <div class="col-xl-12 col-md 12">
        <div class="height-100-p overflow-hidden">
            <div class="profile-tab height-100-p">
                <div class="tab height-100-p">
                    <div class="tab-content">
                        <!-- Setting Tab start -->
                        <div class="tab-pane fade show active" id="setting" role="tabpanel">
                            <div class="profile-setting">
                                <?= form_open(base_url('setting/update'), ['class' => 'formSetting'], ['id_setting' => $id_setting]) ?>
                                <?= csrf_field() ?>

                                <ul class="profile-edit-list row p-0">
                                    <li class="weight-500 col-md-6">
                                        <!-- Personal Setting Start -->
                                        <h4 class="text-blue h5 mb-20">Personal Setting Web</h4>
                                        <div class="form-group">
                                            <label>Nama Web <i class="text-blue">(front-end)</i></label>
                                            <input class="form-control form-control-lg" id="nama_app_front" type="text" name="nama_app_front" value="<?= set_value('nama_app_front', $nama_app_front) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Nama Web harus diisi" data-parsley-length="[4,15]" data-parsley-length-message="Minimal 4 karakter, maksimal 15 karakter">
                                            <div class="invalid-feedback errorNamaAppFront">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Web <i class="text-blue">(back-end)</i></label>
                                            <input class="form-control form-control-lg" id="nama_app_back" type="text" name="nama_app_back" value="<?= set_value('nama_app_back', $nama_app_back) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Nama Web harus diisi" data-parsley-length="[4,15]" data-parsley-length-message="Minimal 4 karakter, maksimal 15 karakter">
                                            <div class="invalid-feedback errorNamaAppBack">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>No Handphone</label>
                                            <input class="form-control form-control-lg" type="number" id="no_hp" name="no_hp" value="<?= set_value('no_hp', $no_hp) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="No HP harus diisi" data-parsley-length="[10,15]" data-parsley-length-message="No HP minimal 10 digit, maximal 15 digit" data-parsley-type="number" data-parsley-type-message="Hanya boleh angka">
                                            <div class="invalid-feedback errorNoHp">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Email</label>
                                            <input class="form-control form-control-lg" id="email" type="email" name="email" value="<?= set_value('email', $email) ?>" required data-parsley-trigger="keyup" data-parsley-required-message="Email harus diisi" data-parsley-length="[10,100]" data-parsley-length-message="Minimal 10 karakter, maksimal 100 karakter" data-parsley-type="email" data-parsley-type-message="Email tidak valid">
                                            <div class="invalid-feedback errorEmail">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Kantor</label>
                                            <textarea class="form-control" id="alamat" name="alamat" required data-parsley-trigger="keyup" data-parsley-required-message="Alamat harus diisi" data-parsley-minlength="25" data-parsley-minlength-message="Alamat terlalu singkat" data-parsley-maxlength="50" data-parsley-maxlength-message="Alamat terlalu panjang"><?= set_value('alamat', $alamat) ?></textarea>
                                            <div class="invalid-feedback errorAlamat">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Google Map Link <i class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Ambil link nya saja dari google map, yang iframe src" title="Peraturan"></i></label>
                                            <textarea class="form-control" id="map_link" name="map_link" required data-parsley-trigger="keyup" data-parsley-required-message="Link harus diisi" data-parsley-minlength="20" data-parsley-minlength-message="Link terlalu singkat" data-parsley-maxlength="500" data-parsley-maxlength-message="Link terlalu panjang" data-parsley-type="url" data-parsley-type-message="Link tidak valid" placeholder="contoh: https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2958866074787!2d106.98985671434191!3d-6.3557315639462155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c22161d4051%3A0x7a0a35b288779341!2sSMK%20Negeri%202%20Kota%20Bekasi!5e0!3m2!1sid!2sid!4v1614485670237!5m2!1sid!2sid"><?= set_value('map_link', $map_link) ?></textarea>
                                            <div class="invalid-feedback errorMap">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Footer <i class="text-blue">(front-end)</i></label>
                                            <textarea class="form-control textarea_editor1" id="footer_frontend" name="footer_frontend" required data-parsley-trigger="keyup" data-parsley-required-message="Footer harus diisi" data-parsley-minlength="50" data-parsley-minlength-message="Footer terlalu singkat" data-parsley-maxlength="500" data-parsley-maxlength-message="Footer terlalu panjang"><?= set_value('footer_frontend', $footer_frontend) ?></textarea>
                                            <div class="invalid-feedback errorFooterFront">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Footer <i class="text-blue">(backend-end)</i></label>
                                            <textarea class="form-control textarea_editor2" id="footer_backend" name="footer_backend" required data-parsley-trigger="keyup" data-parsley-required-message="Footer harus diisi" data-parsley-minlength="50" data-parsley-minlength-message="Footer terlalu singkat" data-parsley-maxlength="500" data-parsley-maxlength-message="Footer terlalu panjang"><?= set_value('footer_backend', $footer_backend) ?></textarea>
                                            <div class="invalid-feedback errorFooterBack">
                                            </div>
                                        </div>
                                        <!-- Personal Setting End -->
                                        <!-- Buttun Update -->
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary btnsimpan" id="form">Update Inormasi</button>
                                        </div>
                                    </li>
                                    <li class="weight-500 col-md-6">
                                        <!-- Social Media Start -->
                                        <h4 class="text-blue h5 mb-20">Social Media</h4>
                                        <label>Sosmed ke-1</label>
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-6 p-0 mr-1">
                                                    <div class="form-group">
                                                        <label>Font Awesome Icon <i class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Ambil font icon di website fontawesome.com" title="Peraturan"></i></label>
                                                        <input type="text" class="form-control" value="<?= set_value('somed_1_font', $somed_1_font) ?>" id="somed_1_font" name="somed_1_font" required data-parsley-required-message="Icon harus diisi" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-minlength-message="Icon terlalu singkat" data-parsley-maxlength="20" data-parsley-maxlength-message="Icon terlalu panjang">
                                                        <div class="invalid-feedback errorSm1Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group">
                                                        <label>Link Sosmed</label>
                                                        <input type="url" class="form-control" value="<?= set_value('somed_1_url', $somed_1_url) ?>" id="somed_1_url" name="somed_1_url" required data-parsley-required-message="Link harus diisi" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-minlength-message="Url terlalu singkat" data-parsley-maxlength="100" data-parsley-maxlength-message="Url terlalu panjang" data-parsley-type-message="Link tidak valid">
                                                        <div class="invalid-feedback errorSm2Url">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Sosmed ke-2</label>
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-6 p-0 mr-1">
                                                    <div class="form-group">
                                                        <label>Font Awesome Icon <i class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Ambil font icon di website fontawesome.com" title="Peraturan"></i></label>
                                                        <input type="text" class="form-control" value="<?= set_value('somed_2_font', $somed_2_font) ?>" id="somed_2_font" name="somed_2_font" required data-parsley-required-message="Icon harus diisi" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-minlength-message="Icon terlalu singkat" data-parsley-maxlength="20" data-parsley-maxlength-message="Icon terlalu panjang">
                                                        <div class="invalid-feedback errorSm2Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group">
                                                        <label>Link Sosmed</label>
                                                        <input type="url" class="form-control" value="<?= set_value('somed_2_url', $somed_2_url) ?>" id="somed_2_url" name="somed_2_url" required data-parsley-required-message="Link harus diisi" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-minlength-message="Url terlalu singkat" data-parsley-maxlength="100" data-parsley-maxlength-message="Url terlalu panjang" data-parsley-type-message="Link tidak valid">
                                                        <div class="invalid-feedback errorSm2Url">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Sosmed ke-3</label>
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-6 p-0 mr-1">
                                                    <div class="form-group">
                                                        <label>Font Awesome Icon <i class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Ambil font icon di website fontawesome.com" title="Peraturan"></i></label>
                                                        <input type="text" class="form-control" value="<?= set_value('somed_3_font', $somed_3_font) ?>" id="somed_3_font" name="somed_3_font" required data-parsley-required-message="Icon harus diisi" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-minlength-message="Icon terlalu singkat" data-parsley-maxlength="20" data-parsley-maxlength-message="Icon terlalu panjang">
                                                        <div class="invalid-feedback errorSm3Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group">
                                                        <label>Link Sosmed</label>
                                                        <input type="url" class="form-control" value="<?= set_value('somed_3_url', $somed_3_url) ?>" id="somed_3_url" name="somed_3_url" required data-parsley-required-message="Link harus diisi" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-minlength-message="Url terlalu singkat" data-parsley-maxlength="100" data-parsley-maxlength-message="Url terlalu panjang" data-parsley-type-message="Link tidak valid">
                                                        <div class="invalid-feedback errorSm3Url">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Sosmed ke-4 <small class="text-blue font-italic">(Option)</small></label>
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-6 p-0 mr-1">
                                                    <div class="form-group">
                                                        <label>Font Awesome Icon <i class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Ambil font icon di website fontawesome.com" title="Peraturan"></i></label>
                                                        <input type="text" class="form-control" <?php if ($somed_4_font) : ?>value="<?= set_value('somed_4_font', $somed_4_font) ?>" <?php endif ?> id="somed_4_font" name="somed_4_font" data-parsley-trigger="keyup" data-parsley-maxlength="20" data-parsley-maxlength-message="Icon terlalu panjang">
                                                        <div class="invalid-feedback errorSm4Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group">
                                                        <label>Link Sosmed</label>
                                                        <input type="url" class="form-control" <?php if ($somed_4_url) : ?>value="<?= set_value('somed_4_url', $somed_4_url) ?>" <?php endif ?> id="somed_4_url" name="somed_4_url" data-parsley-trigger="keyup" data-parsley-maxlength="100" data-parsley-maxlength-message="Url terlalu panjang" data-parsley-type-message="Link tidak valid">
                                                        <div class="invalid-feedback errorSm4Url">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Sosmed ke-5 <small class="text-blue font-italic">(Option)</small></label>
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-6 p-0 mr-1">
                                                    <div class="form-group">
                                                        <label>Font Awesome Icon <i class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Ambil font icon di website fontawesome.com" title="Peraturan"></i></label>
                                                        <input type="text" class="form-control" <?php if ($somed_5_font) : ?>value="<?= set_value('somed_5_font', $somed_5_font) ?>" <?php endif ?> id="somed_5_font" name="somed_5_font" data-parsley-trigger="keyup" data-parsley-maxlength="20" data-parsley-maxlength-message="Icon terlalu panjang">
                                                        <div class="invalid-feedback errorSm5Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group">
                                                        <label>Link Sosmed</label>
                                                        <input type="url" class="form-control" <?php if ($somed_5_url) : ?>value="<?= set_value('somed_5_url', $somed_5_url) ?>" <?php endif ?> id="somed_5_url" name="somed_5_url" data-parsley-trigger="keyup" data-parsley-maxlength="100" data-parsley-maxlength-message="Url terlalu panjang" data-parsley-type-message="Link tidak valid">
                                                        <div class="invalid-feedback errorSm5Url">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Social Media End -->

                                        <!-- Link Cepat Start -->
                                        <h4 class="text-blue h5 mb-20 mt-1">Link Cepat <small class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Akan ditampilkan di home bagian footer" title="Informasi"></small></h4>
                                        <label>Link Cepat 1</label>
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-6 p-0 mr-1">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" value="<?= set_value('lc_1_nama', $lc_1_nama) ?>" id="lc_1_nama" name="lc_1_nama" required data-parsley-trigger="keyup" data-parsley-required-message="Nama harus diisi" data-parsley-minlength="3" data-parsley-minlength-message="Nama terlalu singkat" data-parsley-maxlength="20" data-parsley-maxlength-message="Nama terlalu panjang">
                                                        <div class="invalid-feedback errorLc1Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group">
                                                        <label>Url <i class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Url harus sudah terdaftar di Routes" title="Peraturan"></i></label>
                                                        <input type="text" class="form-control" value="<?= set_value('lc_1_url', $lc_1_url) ?>" id="lc_1_url" name="lc_1_url" required data-parsley-trigger="keyup" data-parsley-required-message="Url harus diisi" data-parsley-minlength="1" data-parsley-minlength-message="Url terlalu singkat" data-parsley-maxlength="50" data-parsley-maxlength-message="Url terlalu panjang">
                                                        <div class="invalid-feedback errorLc1Url">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Link Cepat 2</label>
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-6 p-0 mr-1">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" value="<?= set_value('lc_2_nama', $lc_2_nama) ?>" id="lc_2_nama" name="lc_2_nama" required data-parsley-trigger="keyup" data-parsley-required-message="Nama harus diisi" data-parsley-minlength="3" data-parsley-minlength-message="Nama terlalu singkat" data-parsley-maxlength="20" data-parsley-maxlength-message="Nama terlalu panjang">
                                                        <div class="invalid-feedback errorLc2Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group">
                                                        <label>Url <i class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Url harus sudah terdaftar di Routes" title="Peraturan"></i></label>
                                                        <input type="text" class="form-control" value="<?= set_value('lc_2_url', $lc_2_url) ?>" id="lc_2_url" name="lc_2_url" required data-parsley-trigger="keyup" data-parsley-required-message="Url harus diisi" data-parsley-minlength="1" data-parsley-minlength-message="Url terlalu singkat" data-parsley-maxlength="50" data-parsley-maxlength-message="Url terlalu panjang">
                                                        <div class="invalid-feedback errorLc2Url">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Link Cepat 3</label>
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-6 p-0 mr-1">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" value="<?= set_value('lc_3_nama', $lc_3_nama) ?>" id="lc_3_nama" name="lc_3_nama" required data-parsley-trigger="keyup" data-parsley-required-message="Nama harus diisi" data-parsley-minlength="3" data-parsley-minlength-message="Nama terlalu singkat" data-parsley-maxlength="20" data-parsley-maxlength-message="Nama terlalu panjang">
                                                        <div class="invalid-feedback errorLc3Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group">
                                                        <label>Url <i class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Url harus sudah terdaftar di Routes" title="Peraturan"></i></label>
                                                        <input type="text" class="form-control" value="<?= set_value('lc_3_url', $lc_3_url) ?>" id="lc_3_url" name="lc_3_url" required data-parsley-trigger="keyup" data-parsley-required-message="Url harus diisi" data-parsley-minlength="1" data-parsley-minlength-message="Url terlalu singkat" data-parsley-maxlength="50" data-parsley-maxlength-message="Url terlalu panjang">
                                                        <div class="invalid-feedback errorLc3Url">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Link Cepat 4 <small class="text-blue font-italic">(Option)</small></label>
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-6 p-0 mr-1">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" <?php if ($lc_4_nama) : ?>value="<?= set_value('lc_4_nama', $lc_4_nama) ?>" <?php endif ?> id="lc_4_nama" name="lc_4_nama" data-parsley-trigger="keyup" data-parsley-maxlength="20" data-parsley-maxlength-message="Nama terlalu panjang">
                                                        <div class="invalid-feedback errorLc4Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group">
                                                        <label>Url <i class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Url harus sudah terdaftar di Routes" title="Peraturan"></i></label>
                                                        <input type="text" class="form-control" <?php if ($lc_4_url) : ?>value="<?= set_value('lc_4_url', $lc_4_url) ?>" <?php endif ?> id="lc_4_url" name="lc_4_url" data-parsley-trigger="keyup" data-parsley-maxlength="50" data-parsley-maxlength-message="Url terlalu panjang">
                                                        <div class="invalid-feedback errorLc4Url">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Link Cepat 5 <small class="text-blue font-italic">(Option)</small></label>
                                        <div class="row">
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-6 p-0 mr-1">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" <?php if ($lc_5_nama) : ?>value="<?= set_value('lc_5_nama', $lc_5_nama) ?>" <?php endif ?> id="lc_5_nama" name="lc_5_nama" data-parsley-trigger="keyup" data-parsley-maxlength="20" data-parsley-maxlength-message="Nama terlalu panjang">
                                                        <div class="invalid-feedback errorLc5Nama">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group">
                                                        <label>Url <i class="dw dw-question text-blue align-text-top" type="button" data-container="body" data-toggle="popover" data-placement="top" data-content="Url harus sudah terdaftar di Routes" title="Peraturan"></i></label>
                                                        <input type="text" class="form-control" <?php if ($lc_5_url) : ?>value="<?= set_value('lc_5_url', $lc_5_url) ?>" <?php endif ?> id="lc_5_url" name="lc_5_url" data-parsley-trigger="keyup" data-parsley-maxlength="50" data-parsley-maxlength-message="Url terlalu panjang">
                                                        <div class="invalid-feedback errorLc5Url">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Link Cepat End -->

                                        <!-- Buttun Update -->
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary btnsimpan" id="form">Update Link</button>
                                        </div>
                                    </li>
                                </ul>
                                <?= form_close() ?>
                            </div>
                        </div>
                        <!-- Setting Tab End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('form').parsley();
    })
</script>
<script>
    $(".textarea_editor1").wysihtml5({
        html: !0
    });
    $(".textarea_editor2").wysihtml5({
        html: !0
    });
</script>
<script>
    $(document).ready(function() {

        $('.formSetting').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disabled');
                    $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable');
                    $('.btnsimpan').html('Save & Update');
                },
                success: function(response) {
                    // jika ada error
                    if (response.error) {
                        // validasi personal web
                        if (response.error.nama_app_front) {
                            $('#nama_app_front').addClass('is-invalid');
                            $('.errorNamaAppFront').html(response.error.nama_app_front);
                        } else {
                            $('#nama_app_front').removeClass('is-invalid');
                            $('#nama_app_front').addClass('is-valid');
                            $('.errorNamaAppFront').html('');
                        }
                        if (response.error.nama_app_back) {
                            $('#nama_app_back').addClass('is-invalid');
                            $('.errorNamaAppBack').html(response.error.nama_app_back);
                        } else {
                            $('#nama_app_back').removeClass('is-invalid');
                            $('#nama_app_back').addClass('is-valid');
                            $('.errorNamaAppBack').html('');
                        }
                        if (response.error.no_hp) {
                            $('#no_hp').addClass('is-invalid');
                            $('.errorNoHp').html(response.error.no_hp);
                        } else {
                            $('#no_hp').removeClass('is-invalid');
                            $('#no_hp').addClass('is-valid');
                            $('.errorNoHp').html('');
                        }
                        if (response.error.email) {
                            $('#email').addClass('is-invalid');
                            $('.errorEmail').html(response.error.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('#email').addClass('is-valid');
                            $('.errorEmail').html('');
                        }
                        if (response.error.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.errorAlamat').html(response.error.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('#alamat').addClass('is-valid');
                            $('.errorAlamat').html('');
                        }
                        if (response.error.map_link) {
                            $('#map_link').addClass('is-invalid');
                            $('.errorMap').html(response.error.map_link);
                        } else {
                            $('#map_link').removeClass('is-invalid');
                            $('#map_link').addClass('is-valid');
                            $('.errorMap').html('');
                        }
                        if (response.error.footer_frontend) {
                            $('#footer_frontend').addClass('is-invalid');
                            $('.errorFooterFront').html(response.error.footer_frontend);
                        } else {
                            $('#footer_frontend').removeClass('is-invalid');
                            $('#footer_frontend').addClass('is-valid');
                            $('.errorFooterFront').html('');
                        }
                        if (response.error.footer_backend) {
                            $('#footer_backend').addClass('is-invalid');
                            $('.errorFooterBack').html(response.error.footer_backend);
                        } else {
                            $('#footer_backend').removeClass('is-invalid');
                            $('#footer_backend').addClass('is-valid');
                            $('.errorFooterBack').html('');
                        }

                        // validasi link cepat
                        if (response.error.lc_1_nama) {
                            $('#lc_1_nama').addClass('is-invalid');
                            $('.errorLc1Nama').html(response.error.lc_1_nama);
                        } else {
                            $('#lc_1_nama').removeClass('is-invalid');
                            $('#lc_1_nama').addClass('is-valid');
                            $('.errorLc1Nama').html('');
                        }
                        if (response.error.lc_1_url) {
                            $('#lc_1_url').addClass('is-invalid');
                            $('.errorLc1Url').html(response.error.lc_1_url);
                        } else {
                            $('#lc_1_url').removeClass('is-invalid');
                            $('#lc_1_url').addClass('is-valid');
                            $('.errorLc1Url').html('');
                        }
                        if (response.error.lc_2_nama) {
                            $('#lc_2_nama').addClass('is-invalid');
                            $('.errorLc2Nama').html(response.error.lc_2_nama);
                        } else {
                            $('#lc_2_nama').removeClass('is-invalid');
                            $('#lc_2_nama').addClass('is-valid');
                            $('.errorLc2Nama').html('');
                        }
                        if (response.error.lc_2_url) {
                            $('#lc_2_url').addClass('is-invalid');
                            $('.errorLc2Url').html(response.error.lc_2_url);
                        } else {
                            $('#lc_2_url').removeClass('is-invalid');
                            $('#lc_2_url').addClass('is-valid');
                            $('.errorLc2Url').html('');
                        }
                        if (response.error.lc_3_nama) {
                            $('#lc_3_nama').addClass('is-invalid');
                            $('.errorLc3Nama').html(response.error.lc_3_nama);
                        } else {
                            $('#lc_3_nama').removeClass('is-invalid');
                            $('#lc_3_nama').addClass('is-valid');
                            $('.errorLc3Nama').html('');
                        }
                        if (response.error.lc_3_url) {
                            $('#lc_3_url').addClass('is-invalid');
                            $('.errorLc3Url').html(response.error.lc_3_url);
                        } else {
                            $('#lc_3_url').removeClass('is-invalid');
                            $('#lc_3_url').addClass('is-valid');
                            $('.errorLc3Url').html('');
                        }
                        if (response.error.lc_4_nama) {
                            $('#lc_4_nama').addClass('is-invalid');
                            $('.errorLc4Nama').html(response.error.lc_4_nama);
                        } else {
                            $('#lc_4_nama').removeClass('is-invalid');
                            $('#lc_4_nama').addClass('is-valid');
                            $('.errorLc4Nama').html('');
                        }
                        if (response.error.lc_4_url) {
                            $('#lc_4_url').addClass('is-invalid');
                            $('.errorLc4Url').html(response.error.lc_4_url);
                        } else {
                            $('#lc_4_url').removeClass('is-invalid');
                            $('#lc_4_url').addClass('is-valid');
                            $('.errorLc4Url').html('');
                        }
                        if (response.error.lc_5_nama) {
                            $('#lc_5_nama').addClass('is-invalid');
                            $('.errorLc5Nama').html(response.error.lc_5_nama);
                        } else {
                            $('#lc_5_nama').removeClass('is-invalid');
                            $('#lc_5_nama').addClass('is-valid');
                            $('.errorLc5Nama').html('');
                        }
                        if (response.error.lc_5_url) {
                            $('#lc_5_url').addClass('is-invalid');
                            $('.errorLc5Url').html(response.error.lc_5_url);
                        } else {
                            $('#lc_5_url').removeClass('is-invalid');
                            $('#lc_5_url').addClass('is-valid');
                            $('.errorLc5Url').html('');
                        }

                        // validasi sosmed
                        if (response.error.somed_1_font) {
                            $('#somed_1_font').addClass('is-invalid');
                            $('.errorSm1Nama').html(response.error.somed_1_font);
                        } else {
                            $('#somed_1_font').removeClass('is-invalid');
                            $('#somed_1_font').addClass('is-valid');
                            $('.errorSm1Nama').html('');
                        }
                        if (response.error.somed_1_url) {
                            $('#somed_1_url').addClass('is-invalid');
                            $('.errorSm1Url').html(response.error.somed_1_url);
                        } else {
                            $('#somed_1_url').removeClass('is-invalid');
                            $('#somed_1_url').addClass('is-valid');
                            $('.errorSm1Url').html('');
                        }
                        if (response.error.somed_2_font) {
                            $('#somed_2_font').addClass('is-invalid');
                            $('.errorSm2Nama').html(response.error.somed_2_font);
                        } else {
                            $('#somed_2_font').removeClass('is-invalid');
                            $('#somed_2_font').addClass('is-valid');
                            $('.errorSm2Nama').html('');
                        }
                        if (response.error.somed_2_url) {
                            $('#somed_2_url').addClass('is-invalid');
                            $('.errorSm2Url').html(response.error.somed_2_url);
                        } else {
                            $('#somed_2_url').removeClass('is-invalid');
                            $('#somed_2_url').addClass('is-valid');
                            $('.errorSm2Url').html('');
                        }
                        if (response.error.somed_3_font) {
                            $('#somed_3_font').addClass('is-invalid');
                            $('.errorSm3Nama').html(response.error.somed_3_font);
                        } else {
                            $('#somed_3_font').removeClass('is-invalid');
                            $('#somed_3_font').addClass('is-valid');
                            $('.errorSm3Nama').html('');
                        }
                        if (response.error.somed_3_url) {
                            $('#somed_3_url').addClass('is-invalid');
                            $('.errorSm3Url').html(response.error.somed_3_url);
                        } else {
                            $('#somed_3_url').removeClass('is-invalid');
                            $('#somed_3_url').addClass('is-valid');
                            $('.errorSm3Url').html('');
                        }
                        if (response.error.somed_4_font) {
                            $('#somed_4_font').addClass('is-invalid');
                            $('.errorSm4Nama').html(response.error.somed_4_font);
                        } else {
                            $('#somed_4_font').removeClass('is-invalid');
                            $('#somed_4_font').addClass('is-valid');
                            $('.errorSm4Nama').html('');
                        }
                        if (response.error.somed_4_url) {
                            $('#somed_4_url').addClass('is-invalid');
                            $('.errorSm4Url').html(response.error.somed_4_url);
                        } else {
                            $('#somed_4_url').removeClass('is-invalid');
                            $('#somed_4_url').addClass('is-valid');
                            $('.errorSm4Url').html('');
                        }
                        if (response.error.somed_5_font) {
                            $('#somed_5_font').addClass('is-invalid');
                            $('.errorSm5Nama').html(response.error.somed_5_font);
                        } else {
                            $('#somed_5_font').removeClass('is-invalid');
                            $('#somed_5_font').addClass('is-valid');
                            $('.errorSm5Nama').html('');
                        }
                        if (response.error.somed_5_url) {
                            $('#somed_5_url').addClass('is-invalid');
                            $('.errorSm5Url').html(response.error.somed_5_url);
                        } else {
                            $('#somed_5_url').removeClass('is-invalid');
                            $('#somed_5_url').addClass('is-valid');
                            $('.errorSm5Url').html('');
                        }
                    } else {
                        // jika sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        });
                        dataSetting();
                    }
                },
                // menampilkan pesan error:
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        })
    })

    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>