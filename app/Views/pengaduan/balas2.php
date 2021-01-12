<?= $this->extend('templates/index'); ?>

<style>
    .bg-gray {
        background-color: #ccc;
    }

    .friend-list {
        list-style: none;
        margin-left: -40px;
    }

    .friend-list li {
        border-bottom: 1px solid #eee;
    }

    .friend-list li a img {
        float: left;
        width: 45px;
        height: 45px;
        margin-right: 10px;
    }

    .friend-list li a {
        position: relative;
        display: block;
        padding: 10px;
        transition: all .2s ease;
        -webkit-transition: all .2s ease;
        -moz-transition: all .2s ease;
        -ms-transition: all .2s ease;
        -o-transition: all .2s ease;
    }

    .friend-list li.active a {
        background-color: #f1f5fc;
    }

    .friend-list li a .friend-name,
    .friend-list li a .friend-name:hover {
        color: #777;
    }

    .friend-list li a .last-message {
        width: 65%;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .friend-list li a .time {
        position: absolute;
        top: 10px;
        right: 8px;
    }

    small,
    .small {
        font-size: 85%;
    }

    .friend-list li a .chat-alert {
        position: absolute;
        right: 8px;
        top: 27px;
        font-size: 10px;
        padding: 3px 5px;
    }

    .chat-message {
        padding: 60px 20px 115px;
    }

    .chat {
        list-style: none;
        margin: 0;
    }

    .chat-message {
        background: #f9f9f9;
    }

    .chat li img {
        width: 45px;
        height: 45px;
        border-radius: 50em;
        -moz-border-radius: 50em;
        -webkit-border-radius: 50em;
    }

    img {
        max-width: 100%;
    }

    .chat-body {
        padding-bottom: 20px;
    }

    .chat li.left .chat-body {
        margin-left: 70px;
        background-color: #fff;
    }

    .chat li .chat-body {
        position: relative;
        font-size: 11px;
        padding: 10px;
        border: 1px solid #f1f5fc;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .chat li .chat-body .header {
        padding-bottom: 5px;
        border-bottom: 1px solid #f1f5fc;
    }

    .chat li .chat-body p {
        margin: 0;
    }

    .chat li.left .chat-body:before {
        position: absolute;
        top: 10px;
        left: -8px;
        display: inline-block;
        background: #fff;
        width: 16px;
        height: 16px;
        border-top: 1px solid #f1f5fc;
        border-left: 1px solid #f1f5fc;
        content: '';
        transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
    }

    .chat li.right .chat-body:before {
        position: absolute;
        top: 10px;
        right: -8px;
        display: inline-block;
        background: #fff;
        width: 16px;
        height: 16px;
        border-top: 1px solid #f1f5fc;
        border-right: 1px solid #f1f5fc;
        content: '';
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
    }

    .chat li {
        margin: 15px 0;
    }

    .chat li.right .chat-body {
        margin-right: 70px;
        background-color: #fff;
    }

    .chat-box {
        /*
  position: fixed;
  bottom: 0;
  left: 444px;
  right: 0;
*/
        padding: 15px;
        border-top: 1px solid #eee;
        transition: all .5s ease;
        -webkit-transition: all .5s ease;
        -moz-transition: all .5s ease;
        -ms-transition: all .5s ease;
        -o-transition: all .5s ease;
    }

    .primary-font {
        color: #3c8dbc;
    }

    a:hover,
    a:active,
    a:focus {
        text-decoration: none;
        outline: 0;
    }
</style>

<?= $this->section('main-content'); ?>

<div class="min-height-200px">
    <div class="row">
        <div class="col">
            <div class="title">
                <h4><?= $title; ?></h4>
            </div>
        </div>
        <div class="col-auto">
            <a href="<?= base_url('/pengaduan') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="dw dw-left-arrow2"></i>
                </span>
                <span class="text">
                    Kembali
                </span>
            </a>
        </div>
    </div>
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
                    <h5 class="mb-20 h5 text-blue">Informasi User</h5>
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
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Informasi Pengaduan</h5>
                    <ul>
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
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box height-100-p overflow-hidden">
                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#isi" role="tab">Isi Pengaduan</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Isi Pengaduan start -->
                            <div class="tab-pane show active" id="isi" role="tabpanel">
                                <div class="profile-setting">
                                </div>
                            </div>
                            <!-- Isi Pengaduan End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>