<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
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


<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="comments-area">
                    <?php if ($hasil == null) { ?>
                        <div class="search-img row justify-content-center mt-3">
                            <!-- <h5>Cari Laporan Berdasarkan Kode Pengaduan</h5> -->
                            <img src="<?= base_url('/home/img/undraw_search.png') ?>" class="img-responsive" alt="" width="50%">
                        </div>
                    <?php } else { ?>
                        <?php foreach ($hasil as $la) { ?>
                            <?php
                            // dd($hasil)
                            ?>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user d-flex">
                                        <div class="thumb thumb--img">
                                            <?php if ($la['user_image'] == null) { ?>
                                                <img src="<?= base_url('images/avatar.png') ?>" class="img--user" alt="">
                                            <?php } else { ?>
                                                <img src="<?= base_url('images/user-images/' . $la['user_image']) ?>" class="img--user" alt="">
                                            <?php } ?>
                                        </div>
                                        <div class="desc">
                                            <a href="javascript:;" class="text-dark"><?= $la['fullname'] ?></a>
                                            <p class="comment">
                                                <?= limit_word($la['isi_laporan'], 50) ?>
                                            </p>
                                            <?php
                                            $phpdate = strtotime($la['pengaduan_dibuat']);
                                            $tanggal = date('Y-m-d H:i:s', $phpdate)
                                            ?>
                                            <div class="row">
                                                <p class="col-md-4 col-sm-12 date ml-0"><?= format_indo($tanggal) ?></p>
                                                <p class="col-md-3 col-sm-12 date ml-0">Kode: <?= $la['kode_pengaduan'] ?></p>
                                                <p class="col-md-5 col-sm-12 date ml-0">Kategori: <?= $la['nama_kategori'] ?></p>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <?php if ($la['ket'] == 'pending') : ?>
                                                            <a href="javascript:;" class="text-warning text-uppercase">Pending</a>
                                                        <?php elseif ($la['ket'] == 'arsip') : ?>
                                                            <a href="javascript:;" class="text-danger text-uppercase">Diarsipkan</a>
                                                        <?php elseif ($la['ket'] == 'proses') : ?>
                                                            <a href="javascript:;" class="text-success text-uppercase">Ditanggapi</a>
                                                        <?php else : ?>
                                                            <a href="javascript:;" class="text-primary text-uppercase">Selesai</a>
                                                        <?php endif; ?>
                                                    </h5>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="<?= base_url('laporan/' . $la['id_pengaduan'] . '/' . $la['kode_pengaduan']) ?>" class="btn-reply">Cek Detail <i class="dw dw-search1"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <!-- Pagination Start -->
                    <?php if ($pager == null) { ?>
                    <?php } else { ?>
                        <?= $pager->links('pengaduan', 'laporanSayaPagination'); ?>
                    <?php } ?>
                    <!-- Pagination End -->

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