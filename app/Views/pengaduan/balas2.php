<?= $this->extend('templates/index'); ?>

<?= $this->section('my-css'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/chating.css">
<?= $this->endSection(); ?>

<?= $this->section('main-content'); ?>

<div class="min-height-200px">
    <div class="row mt-3">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box">
                <div class="profile-photo">
                    <?php if ($pengaduan[0]->user_image == null) : ?>
                        <img src="<?= base_url('images/avatar.png/') ?>" class="avatar-photo">
                    <?php else : ?>
                        <img src="<?= base_url() . '/images/user-images/' . $pengaduan[0]->user_image ?>" alt="" class="avatar-photo">
                    <?php endif; ?>
                </div>
                <h5 class="text-center h5 mb-3"><?= (old('fullname')) ? old('fullname') : xss($pengaduan[0]->fullname) ?></h5>
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
                            <!-- <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="<?= base_url('/pengaduan') ?>" role="tab"><span class="icon">
                                        <i class="dw dw-left-arrow2"></i>
                                    </span>
                                    <span class="text">
                                        Kembali
                                    </span>
                                </a>
                            </li> -->
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
                                <ul class="chat">
                                    <li class="left clearfix bachors"><span class="chat-img pull-left d-none d-md-block d-sm-block"><img src="<?= base_url() . '/images/user-images/' . $pengaduan[0]->user_image ?>" alt="User Avatar"></span>
                                        <div class="chat-body clearfix">
                                            <div class="kepala"><strong class="primary-font"><?= $pengaduan[0]->fullname ?></strong><small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 4 yrs ago</small></div>
                                            <p class="msg"><?= xss($pengaduan[0]->isi_laporan) ?></p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="chat-box">
                                    <form>
                                        <div class="input-group">
                                            <input id="message" type="text" data-emojiable="true" class="form-control border no-shadow no-rounded mr-1" placeholder="Ketik pesan">
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
                                            <?php else : ?>
                                                Selesai
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

<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>
<!-- Firebase -->
<script src="//www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
<script src="//www.gstatic.com/firebasejs/3.9.0/firebase-app.js"></script>
<script src="//www.gstatic.com/firebasejs/3.9.0/firebase-database.js"></script>

<script src="<?= base_url() ?>/public/js/chating.js"></script><!-- chat_realtime -->
<script type="text/javascript" src="<?= base_url() ?>/public/js/config.js"></script>
<!-- <script type="text/javascript" src="<?= base_url() ?>/public/js/chat_realtime.js"></script> -->
<?= $this->endSection(); ?>