<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/chating-frontend.css">
<style>
    .comments-area {
        border-top: 0px !important;
        padding: 0px;
    }

    .comments-area .date {
        font-size: 13px;
    }

    @media (min-width: 320px) and (max-width: 425px) {
        .comments-area {
            padding: 30px 0px;
        }

        .comments-area .thumb.thumb--img img {
            width: 50px !important;
        }

        .comments-area .user .thumb.thumb--img {
            margin-right: 7px;
        }

        .comments-area .comment-list .single-comment .comment,
        .date {
            font-size: 13px;
            line-height: 20px;
        }
    }

    @media (max-width: 768px) {
        .section-padding {
            padding-top: 10px;
            padding-bottom: 10px;
        }
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div>
                    <div class="comments-area">
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user d-flex">
                                    <div class="thumb thumb--img">
                                        <?php if ($pengaduan->user_image == null) { ?>
                                            <img src="<?= base_url('images/avatar.png') ?>" class="img--user" alt="">
                                        <?php } else { ?>
                                            <img src="<?= base_url('images/user-images/' . $pengaduan->user_image) ?>" class="img--user" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            <?= xss(limit_word($pengaduan->isi_laporan, 50)) ?>
                                        </p>
                                        <?php
                                        $phpdate = strtotime($pengaduan->pengaduan_dibuat);
                                        $tanggal = date('Y-m-d H:i:s', $phpdate)
                                        ?>
                                        <div class="row">
                                            <p class="col-md-4 col-sm-12 date ml-0"><?= format_indo($tanggal) ?></p>
                                            <p class="col-md-3 col-sm-12 date ml-0">Kode: <?= $pengaduan->kode_pengaduan ?></p>
                                            <p class="col-md-5 col-sm-12 date ml-0">Kategori: <?= $pengaduan->nama_kategori ?></p>
                                        </div>
                                        <div class="d-flex">
                                            <div class="reply-btn">
                                                <a href="<?= base_url('laporan-saya/' . '/' . user()->id) ?>" class="btn-reply"><i class="fa fa-arrow-left"></i> Kembali</a>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    <?php if ($pengaduan->ket == 'pending') : ?>
                                                        <a href="javascript:;" class="text-warning text-uppercase">Pending</a>
                                                    <?php elseif ($pengaduan->ket == 'arsip') : ?>
                                                        <a href="javascript:;" class="text-danger text-uppercase">Diarsipkan</a>
                                                    <?php elseif ($pengaduan->ket == 'proses') : ?>
                                                        <a href="javascript:;" class="text-success text-uppercase">Ditanggapi</a>
                                                    <?php else : ?>
                                                        <a href="javascript:;" class="text-primary text-uppercase">Selesai</a>
                                                    <?php endif; ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chating -->
                <div class="row mt-20">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <?php if (!$percakapan) { ?>
                            <p class="primary-font"><strong> Pengaduan belum ada percakapan</strong></p>
                        <?php } ?>
                        <div class="card-box overflow-hidden">
                            <div class="profile-tab height-100-p">
                                <div class="tab height-100-p">
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#chating" role="tab">Chating</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#info" role="tab">Info Pengaduan</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Chat Pengaduan start -->
                                        <div class="tab-pane show active col-md" id="chating" role="tabpanel">
                                            <ul class="chat pr-2">
                                                <li class="right clearfix bachors">
                                                    <span class="chat-img pull-right d-none d-md-block d-sm-block">
                                                        <?php if ($pengaduan->user_image != null) { ?>
                                                            <img src="<?= base_url() . '/images/user-images/' . $pengaduan->user_image ?>" alt="User Avatar">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url('images/avatar.png/') ?>" alt="User Avatar">
                                                        <?php } ?>
                                                    </span>
                                                    <div class="chat-body clearfix mb-1">
                                                        <div class="kepala"><strong class="primary-font"><?= $pengaduan->fullname ?></strong>
                                                        </div>
                                                        <p class="msg m-0">
                                                            <?= xss($pengaduan->isi_laporan) ?>
                                                        </p>
                                                    </div>
                                                </li>

                                                <!-- Chating Start -->
                                                <?php foreach ($percakapan as $chat) { ?>
                                                    <?php if ($chat->petugas_Id == 0) : ?>
                                                        <li class="right clearfix bachors">
                                                            <span class="chat-img pull-right d-none d-md-block d-sm-block">
                                                                <?php if ($chat->user_image != null) { ?>
                                                                    <img src="<?= base_url() . '/images/user-images/' . $chat->user_image ?>" alt="User Avatar">
                                                                <?php } else { ?>
                                                                    <img src="<?= base_url('images/avatar.png/') ?>" alt="User Avatar">
                                                                <?php } ?>
                                                            </span>
                                                            <div class="chat-body clearfix mb-1">
                                                                <div class="kepala"><strong class="primary-font"><?= $pengaduan->fullname ?></strong>
                                                                </div>
                                                                <p class="msg m-0">
                                                                    <?= nl2br($chat->percakapan, false) ?>
                                                                </p>
                                                            </div>
                                                        </li>
                                                    <?php else : ?>
                                                        <li class="left clearfix">
                                                            <span class="chat-img pull-left d-none d-md-block d-sm-block">
                                                                <img src="<?= base_url('images/admin-images/indonesia.png/') ?>" alt="User Avatar">
                                                            </span>
                                                            <div class="chat-body clearfix mb-1">
                                                                <div class="kepala"><strong class="primary-font">Admin | </strong><?= $chat->fullname ?>
                                                                </div>
                                                                <p class="msg m-0">
                                                                    <?= nl2br($chat->percakapan, false) ?>
                                                                </p>
                                                            </div>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php } ?>
                                                <!-- Chating End -->
                                            </ul>
                                            <div class="chat-box mt-1 pb-3">
                                                <form action="<?= base_url('/pengaduan/balasMasyarakat/' . $pengaduan->id_pengaduan . '/' . $pengaduan->kode_pengaduan . '/' . $pengaduan->userid) ?>" method="post">
                                                    <div class="input-group">
                                                        <textarea name="pesan" rows="1" class="form-control border no-shadow no-rounded mr-1" placeholder="Ketik pesan" required></textarea>
                                                        <span class="input-group-btn">
                                                            <button class="btn-primary" id="send" type="submit"><i class="dw dw-paper-plane"></i></button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Chat Pengaduan End -->
                                        <!-- Setting Tab start -->
                                        <div class="tab-pane fade height-100-p p-3" id="info" role="tabpanel">
                                            <div class="profile-setting">
                                                <ul class="col">
                                                    <li>
                                                        <span>Kode Pengaduan:</span>
                                                        <?= xss($pengaduan->kode_pengaduan) ?>
                                                    </li>
                                                    <li>
                                                        <span>Status Pengaduan:</span>
                                                        <?php if ($pengaduan->ket == 'pending') : ?>
                                                            <!-- Pending -->
                                                            <a href="javascript:;" class="text-warning text-uppercase">Pending</a>
                                                        <?php elseif ($pengaduan->ket == 'proses') : ?>
                                                            <!-- Ditanggapi -->
                                                            <a href="javascript:;" class="text-success text-uppercase">Ditanggapi</a>
                                                        <?php else : ?>
                                                            <!-- Selesai -->
                                                            <a href="javascript:;" class="text-primary text-uppercase">Selesai</a>
                                                        <?php endif; ?>
                                                    </li>
                                                    <li>
                                                        <span>Kategori Pengaduan:</span>
                                                        <?= $pengaduan->nama_kategori ?>
                                                    </li>
                                                    <li>
                                                        <span>Tanggal Pengaduan:</span>
                                                        <?= format_indo($pengaduan->pengaduan_dibuat) ?>
                                                    </li>
                                                    <li>
                                                        <span>Lampiran Pengaduan :</span>
                                                        <a target="_blank" href="<?= base_url('/laporan/lampiran/' . $pengaduan->lampiran) ?>"><?= $pengaduan->lampiran ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Setting Tab End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog_right_sidebar mt-5">
                    <!-- Search Start -->
                    <?= $this->include('home/widget/search') ?>
                    <!-- Search End -->

                    <!-- List Kategori Start -->
                    <?= $this->include('home/widget/listKategori') ?>
                    <!-- List Kategori End -->
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>