<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
<style>
    .comments-area {
        border-top: 0px !important;
        padding: 0px;
    }

    @media (min-width: 320px) and (max-width: 425px) {
        .comments-area {
            padding: 30px 0px;
        }

        .comments-area .date {
            font-size: 13px;
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
                <div class="comments-area">
                    <div class="row">
                        <div class="col-lg-12 mb-10 posts-list">
                            <div class="single-post">
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li>
                                        <a href="javascript:;" class="text-primary"><i class="dw dw-edit-file"></i> <?= $totalPengaduan ?> Pengaduan Dibuat</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="text-warning"><i class="dw dw-stop"></i> <?= $pengaduanPending ?> Pending</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="text-success"><i class="dw dw-refresh1"></i> <?= $pengaduanProses ?> Ditanggapi</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" class="text-dark"><i class="dw dw-file-31"></i> <?= $pengaduanSelesai ?> Selesai</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- <h5 class="mb-3"> Pengaduan telah dibuat</h5> -->
                    <?php foreach ($listAduan as $la) { ?>
                        <?php
                        // dd($listAduan)
                        ?>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="col-md-12 user d-flex px-0">
                                    <div class="thumb thumb--img">
                                        <?php if ($la['user_image'] == null) { ?>
                                            <img src="<?= base_url('images/avatar.png') ?>" class="img--user" alt="">
                                        <?php } else { ?>
                                            <img src="<?= base_url('images/user-images/' . $la['user_image']) ?>" class="img--user" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-12 desc px-0">
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

                    <!-- Pagination Start -->
                    <?= $pager->links('pengaduan', 'laporanSayaPagination'); ?>
                    <!-- Pagination End -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>