<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>

<div class="pd-20 card-box mb-30">
    <div class="row">
        <div class="col">
            <div class="title">
                <h4><?= $title; ?></h4>
            </div>
        </div>
        <div class="col-auto">
            <a href="<?= base_url('/masyarakat') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                <span class="icon">
                    <i class="dw dw-left-arrow2"></i>
                </span>
                <span class="text">
                    Kembali
                </span>
            </a>
        </div>
    </div>
    <div class="wizard-content">
        <form class="tab-wizard2 wizard-circle wizard" action="<?= base_url('/masyarakat/update/' . $pengaduan[0]->id_pengaduan) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <input type="hidden" name="id_pengaduan" value="<?= $pengaduan[0]->id_pengaduan ?>">
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center my-2">
                            <img class="img-fluid" src="<?= base_url() . '/images/user-images/' . $pengaduan[0]->user_image ?>" width="200" alt="User Image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-primary">Nama Pengirim :</label>
                            <input type="text" readonly class="form-control-plaintext <?php if (session('errors.fullname')) : ?>is-invalid <?php endif ?>" name="fullname" value="<?= (old('fullname')) ? old('fullname') : xss($pengaduan[0]->fullname) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.fullname') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-primary">No Induk Kependudukan :</label>
                            <input type="number" readonly class="form-control-plaintext <?php if (session('errors.nik')) : ?>is-invalid <?php endif ?>" name="nik" value="<?= (old('nik')) ? old('nik') : xss($pengaduan[0]->nik) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.nik') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-primary">Username :</label>
                            <input type="text" readonly class="form-control-plaintext <?php if (session('errors.username')) : ?>is-invalid <?php endif ?>" name="username" value="<?= (old('username')) ? old('username') : xss($pengaduan[0]->username) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.username') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-primary">Nomor Handphone :</label>
                            <input type="text" readonly class="form-control-plaintext <?php if (session('errors.no_hp')) : ?>is-invalid <?php endif ?>" name="no_hp" value="<?= (old('no_hp')) ? old('no_hp') : xss($pengaduan[0]->no_hp) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.no_hp') ?>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-4">
                        <div class="form-group">
                            <label class="text-primary">Email :</label>
                            <input type="email" readonly class="form-control-plaintext <?php if (session('errors.email')) : ?>is-invalid <?php endif ?>" name="email" value="<?= (old('email')) ? old('email') : xss($pengaduan[0]->email) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-primary">Alamat Pelapor :</label>
                            <input type="text" readonly class="form-control-plaintext <?php if (session('errors.alamat')) : ?>is-invalid <?php endif ?>" name="alamat" value="<?= (old('alamat')) ? old('alamat') : xss($pengaduan[0]->alamat) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.alamat') ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Status Pengaduan :</label>
                            <?php if ($pengaduan[0]->ket == 'pending') : ?>
                                <input type="text" readonly class="form-control-plaintext <?php if (session('errors.status')) : ?>is-invalid <?php endif ?>" name="status" value="Pending">
                            <?php elseif ($pengaduan[0]->ket == 'proses') : ?>
                                <input type="text" readonly class="form-control-plaintext <?php if (session('errors.status')) : ?>is-invalid <?php endif ?>" name="status" value="Proses">
                            <?php else : ?>
                                <input type="text" readonly class="form-control-plaintext <?php if (session('errors.status')) : ?>is-invalid <?php endif ?>" name="status" value="Selesai">
                            <?php endif; ?>
                            <div class="invalid-feedback">
                                <?= session('errors.status') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Kode Pengaduan :</label>
                            <input type="text" readonly class="form-control-plaintext <?php if (session('errors.kode_pengaduan')) : ?>is-invalid <?php endif ?>" name="kode_pengaduan" value="<?= (old('kode_pengaduan')) ? old('kode_pengaduan') : xss($pengaduan[0]->kode_pengaduan) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.kode_pengaduan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Kategori Pengaduan :</label>
                            <input type="text" readonly class="form-control-plaintext <?php if (session('errors.nama_kategori')) : ?>is-invalid <?php endif ?>" name="nama_kategori" value="<?= (old('nama_kategori')) ? old('nama_kategori') : xss($pengaduan[0]->nama_kategori) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.nama_kategori') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tanggal Pengaduan :</label>
                            <input type="text" readonly class="form-control-plaintext <?php if (session('errors.pengaduan_dibuat')) : ?>is-invalid <?php endif ?>" name="pengaduan_dibuat" value="<?= (old('pengaduan_dibuat')) ? old('pengaduan_dibuat') : xss($pengaduan[0]->pengaduan_dibuat) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.pengaduan_dibuat') ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-12">
                        <label>Isi Pengaduan :</label>
                        <textarea type="text" readonly class="form-control-plaintext <?php if (session('errors.isi_laporan')) : ?>is-invalid <?php endif ?>" name="isi_laporan"><?= (old('isi_laporan')) ? old('isi_laporan') : xss($pengaduan[0]->isi_laporan) ?></textarea>
                        <div class="invalid-feedback">
                            <?= session('errors.isi_laporan') ?>
                        </div>
                    </div>
                </div>
            </section>

            <div class="form-group row">
                <div class="col-md-12 justify-content-start">
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                    <a href="<?= base_url('/pengaduan') ?>" type="button" class="btn btn-warning text-white">Kembali</a>
                </div>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>