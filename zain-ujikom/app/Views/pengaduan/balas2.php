<?= $this->extend('templates/index'); ?>

<?= $this->section('my-css'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/chating.css">
<style>
    .blockquote-footer small.text-muted {
        font-size: 100% !important;
    }

    textarea.form-control {
        height: 87px;
    }

    .img-fluid {
        height: 170px;
        width: 170px;
        object-fit: cover;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('main-content'); ?>

<div class="min-height-200px">
    <div class="row mt-3">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box">
                <div class="profile-photo">
                    <?php if ($pengaduan[0]->user_image == null) : ?>
                        <!-- jika user image nya kosong tampilkan default -->
                        <img src="<?= base_url('images/avatar.png/') ?>" class="avatar-photo img-fluid mx-auto d-block">
                    <?php else : ?>
                        <img src="<?= base_url() . '/images/user-images/' . $pengaduan[0]->user_image ?>" alt="" class="avatar-photo img-fluid mx-auto d-block">
                    <?php endif; ?>
                </div>
                <h5 class="text-center h5 mb-3">
                    <?php if ($pengaduan[0]->anonim == 1) : ?>
                        <!-- jika melapor sebagai anonim -->
                        <?= (old('fullname')) ? old('fullname') : xss($pengaduan[0]->fullname) ?> <br><i>(Melapor sebagai Anonim)</i>
                    <?php else : ?>
                        <?= (old('fullname')) ? old('fullname') : xss($pengaduan[0]->fullname) ?>
                    <?php endif; ?>
                </h5>
                <div class="profile-info">
                    <h5 class="mb-10 h5 text-blue">Informasi User</h5>
                    <ul>
                        <li>
                            <span>No Induk Kependudukan:</span>
                            <?= xss($pengaduan[0]->nik) ?>
                        </li>
                        <li>
                            <span>Alamat Email:</span>
                            <?= xss($pengaduan[0]->email) ?>
                        </li>
                        <li>
                            <span>No Handphone:</span>
                            <?= xss($pengaduan[0]->no_hp) ?>
                        </li>
                        <li>
                            <span>Alamat Rumah:</span>
                            <?= xss($pengaduan[0]->alamat) ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box overflow-hidden">
                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a href="<?= base_url('/pengaduan') ?>" class="nav-link">
                                    <i class="dw dw-left-arrow2"></i>
                                    Kembali
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#chating" role="tab">Chating</a>
                            </li>
                            <li class="nav-item hr-right">
                                <a class="nav-link" data-toggle="tab" href="#info" role="tab">Info Pengaduan</a>
                            </li>
                            <?php if ($pengaduan[0]->hasil_akhir && $pengaduan[0]->ket == "selesai") { ?>
                                <li class="nav-item hr-right">
                                    <a class="nav-link" data-toggle="tab" href="#hasil" role="tab">Hasil Akhir</a>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content">
                            <!-- Chat Pengaduan start -->
                            <div class="tab-pane show active col-md" id="chating" role="tabpanel">
                                <ul class="chat pr-2">
                                    <li class="left clearfix bachors">
                                        <span class="chat-img pull-left d-none d-md-block d-sm-block">
                                            <?php if ($pengaduan[0]->user_image != null) { ?>
                                                <img src="<?= base_url() . '/images/user-images/' . $pengaduan[0]->user_image ?>" alt="User Avatar">
                                            <?php } else { ?>
                                                <img src="<?= base_url('images/avatar.png/') ?>" alt="User Avatar">
                                            <?php } ?>
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="kepala"><strong class="primary-font"><?= $pengaduan[0]->fullname ?></strong></div>
                                            <p class="msg m-0">
                                                <?= nl2br_xss(sensor($pengaduan[0]->isi_laporan)) ?>
                                            </p>
                                        </div>
                                    </li>
                                    <?php foreach ($percakapan as $chat) { ?>
                                        <?php
                                        if ($chat->petugas_id != 0) : ?>
                                            <!-- Petugas/Admin chat -->
                                            <li class="right clearfix">
                                                <span class="chat-img pull-right d-none d-md-block d-sm-block">
                                                    <?php if ($chat->user_image == null) { ?>
                                                        <img src="<?= base_url() . '/images/admin-images/indonesia.png' ?>">
                                                    <?php } else { ?>
                                                        <img src="<?= base_url() . '/images/admin-images/' . $chat->user_image ?>">
                                                    <?php } ?>
                                                </span>
                                                <div class="chat-body clearfix">
                                                    <div class="kepala">
                                                        <strong class="primary-font"> Admin | </strong> <?= $chat->fullname ?>
                                                        <a href="<?= base_url('pengaduan/hapusPesan/' . $chat->id_percakapan) ?>" class="dw dw-trash text-danger float-right mt-1 hapusPesan" type="button"></a>
                                                    </div>
                                                    <p class="msg m-0">
                                                        <?= nl2br_xss(sensor($chat->percakapan)) ?>
                                                    </p>
                                                </div>
                                            </li>
                                        <?php else : ?>
                                            <!-- User Chat -->
                                            <li class="left clearfix">
                                                <span class="chat-img pull-left d-none d-md-block d-sm-block">
                                                    <?php if ($pengaduan[0]->user_image != null) { ?>
                                                        <img src="<?= base_url() . '/images/user-images/' . $pengaduan[0]->user_image ?>" alt="User Avatar">
                                                    <?php } else { ?>
                                                        <img src="<?= base_url('images/avatar.png/') ?>" alt="User Avatar">
                                                    <?php } ?>
                                                </span>
                                                <div class="chat-body clearfix">
                                                    <div class="kepala">
                                                        <strong class="primary-font"><?= $pengaduan[0]->fullname ?></strong>
                                                    </div>
                                                    <p class="msg m-0">
                                                        <?= nl2br_xss(sensor($chat->percakapan)) ?>
                                                        <?php // xss()->nama_field 
                                                        ?>
                                                    </p>
                                                </div>
                                            </li>
                                        <?php endif ?>
                                    <?php } ?>
                                </ul>
                                <div class="chat-box">
                                    <form action="<?= base_url('/pengaduan/balas/' . $pengaduan[0]->id_pengaduan . '/' . $pengaduan[0]->kode_pengaduan . '/' . $pengaduan[0]->userid) ?>" method="post">
                                        <div class="input-group">
                                            <textarea name="pesan" rows="1" class="form-control border no-shadow no-rounded mr-1" placeholder="Ketik pesan" required></textarea>
                                            <!-- textarea -->
                                            <span class="input-group-btn">
                                                <button class="btn btn-success no-rounded" id="send" type="submit">Kirim</button>
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
                                            <?= xss($pengaduan[0]->kode_pengaduan) ?>
                                        </li>
                                        <li>
                                            <span>Status Pengaduan:</span>
                                            <?php if ($pengaduan[0]->ket == 'pending') : ?>
                                                Pending
                                            <?php elseif ($pengaduan[0]->ket == 'proses') : ?>
                                                Proses
                                            <?php elseif ($pengaduan[0]->ket == 'arsip') : ?>
                                                Diarsipkan
                                            <?php elseif ($pengaduan[0]->ket == 'selesai') : ?>
                                                Selesai
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <span>Anonimitas:</span>
                                            <?php if ($pengaduan[0]->anonim == 1) : ?>
                                                Ya
                                            <?php else : ?>
                                                Tidak
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <span>Kategori Pengaduan:</span>
                                            <?= $pengaduan[0]->nama_kategori ?>
                                        </li>
                                        <li>
                                            <span>Tanggal Pengaduan:</span>
                                            <?= format_indo($pengaduan[0]->pengaduan_dibuat) ?>
                                        </li>
                                        <li>
                                            <span>Lampiran Pengaduan :</span>
                                            <a target="_blank" href="<?= base_url('/laporan/lampiran/' . $pengaduan[0]->lampiran) ?>"><?= $pengaduan[0]->lampiran ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Setting Tab End -->
                            <?php if ($pengaduan[0]->hasil_akhir && $pengaduan[0]->ket == "selesai") { ?>
                                <!-- Hasil Tab start -->
                                <div class="tab-pane fade height-100-p p-3" id="hasil" role="tabpanel">
                                    <div class="profile-setting">
                                        <div class="alert alert-primary" role="alert">
                                            <h4 class="alert-heading h4">Hasil Akhir!</h4>
                                            <p><?= nl2br_xss($pengaduan[0]->hasil_akhir) ?></p>
                                            <hr>
                                            <footer class="blockquote-footer">
                                                <small class="text-muted"><cite title="Source Title"><?= setting()->nama_aplikasi_frontend ?></cite>
                                                </small>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hasil Tab end -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="viewmodal" style="display: none;"></div>

<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>
<!-- Firebase -->
<!-- <script src="//www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
<script src="//www.gstatic.com/firebasejs/3.9.0/firebase-app.js"></script>
<script src="//www.gstatic.com/firebasejs/3.9.0/firebase-database.js"></script> -->

<!-- <script src="<?= base_url() ?>/public/js/chating.js"></script>chat_realtime -->
<!-- <script type="text/javascript" src="<?= base_url() ?>/public/js/config.js"></script> -->
<!-- <script type="text/javascript" src="<?= base_url() ?>/public/js/chat_realtime.js"></script> -->

<script>
    $(document).on('click', '.hapusPesan', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Pesan akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true,
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Batal Dihapus',
                    'Pesan masih aman ^_^',
                    'error'
                )
            }
        })
    })
</script>
<?= $this->endSection(); ?>