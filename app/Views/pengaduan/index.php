<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>
<div class="card-box mb-30">
    <div class="pd-20">
        <div class="row">
            <div class="col">
                <div class="title">
                    <h4><?= $title; ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-20">
        <div class="table-responsive">
            <table class="data-table table hover">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kode Pengaduan</th>
                        <th>Isi Laporan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th class="datatable-nosort"><i class="dw dw-settings1"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pengaduan as $p) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?>.</td>
                            <td><?= $p->fullname ?></td>

                            <td><?= $p->kode_pengaduan ?></td>

                            <td><?= limit_word($p->isi_laporan, 10) ?></td>

                            <?php
                            $phpdate = strtotime($p->pengaduan_dibuat);
                            $tanggal = date('Y-m-d', $phpdate)
                            ?>
                            <td><?= mediumdate_indo($tanggal) ?></td>

                            <?php if ($p->ket == 'pending') : ?>
                                <td><button class="badge badge-warning">Pending</button></td>
                            <?php elseif ($p->ket == 'proses') : ?>
                                <td><button class="badge badge-success">Proses</button></td>
                            <?php else : ?>
                                <td><button class="badge badge-primary">Selesai</button></td>
                            <?php endif; ?>

                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a href="#" class="dropdown-item" id="detailData" data-toggle="modal" data-target="#show-detail-pengaduan" type="button" data-userid="<?= xss($p->id_pengaduan); ?>" data-username="<?= xss($p->username); ?>" data-email="<?= xss($p->email); ?>" data-fullname="<?= xss($p->fullname); ?>" data-nik="<?= xss($p->nik); ?>" data-nohp="<?= xss($p->no_hp); ?>" data-alamat="<?= xss($p->alamat); ?>" data-ket="<?= xss($p->ket) ?>" data-kode="<?= xss($p->kode_pengaduan) ?>" data-kategori="<?= xss($p->nama_kategori); ?>" data-tanggal="<?= xss(longdate_indo($tanggal)); ?>" data-isi="<?= xss($p->isi_laporan); ?>" data-lampiran="<?= xss($p->lampiran); ?>">
                                            <i class=" dw dw-eye"></i> Detail
                                        </a>

                                        <a class="dropdown-item" href="<?= base_url('/pengaduan/balas/' . $p->kode_pengaduan) ?>"><i class="dw dw-chat3"></i> Balas</a>

                                        <a href="<?= base_url('/pengaduan/delete/' . $p->id_pengaduan) ?>" class="dropdown-item btn-delete"><i class="dw dw-delete-3"></i> Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="show-detail-pengaduan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Pengaduan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="wizard-content">
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap :</label>
                                    <input readonly type="text" class="form-control" id="fullname">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No Induk Kependudukan :</label>
                                    <input readonly type="number" class="form-control" id="nik">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username :</label>
                                    <input readonly type="hidden" class="form-control" name="userid" id="userid">
                                    <input readonly type="text" class="form-control" id="username">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Pelapor :</label>
                                    <input class="form-control" id="alamat" rows="2" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Handphone :</label>
                                    <input readonly type="text" class="form-control" id="no_hp">
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label>Email :</label>
                                    <input readonly type="email" class="form-control" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status Pengaduan :</label>
                                    <input readonly type="text" class="form-control" id="status">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode Pengaduan :</label>
                                    <input readonly type="text" class="form-control" id="kode">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori Pengaduan :</label>
                                    <input readonly type="text" class="form-control" id="kategori">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Pengaduan :</label>
                                    <input readonly type="text" class="form-control" id="tanggal">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Isi Pengaduan :</label>
                                <textarea class="form-control" id="isi_laporan" readonly></textarea>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Detail Data
    $(document).ready(function() {
        $(document).on('click', '#detailData', function() {
            // mendeklarasikan variable
            var userid = $(this).data('userid');
            var username = $(this).data('username');
            var email = $(this).data('email');
            var fullname = $(this).data('fullname');
            var nik = $(this).data('nik');
            var nohp = $(this).data('nohp');
            var alamat = $(this).data('alamat');
            var status = $(this).data('ket');
            var kode = $(this).data('kode');
            var kategori = $(this).data('kategori');
            var tanggal = $(this).data('tanggal');
            var isi = $(this).data('isi');
            // var lampiran = $(this).data('lampiran');

            // mengirim ke modal sesuai nama idnya
            $('#userid').val(userid);
            $('#username').val(username);
            $('#email').val(email);
            $('#fullname').val(fullname);
            $('#nik').val(nik);
            $('#no_hp').val(nohp);
            $('#alamat').val(alamat);
            $('#status').val(status);
            $('#kode').val(kode);
            $('#kategori').val(kategori);
            $('#tanggal').val(tanggal);
            $('#isi_laporan').val(isi);
            // $('#lampiran').href(lampiran);
        });
    });
</script>

<?= $this->endSection(); ?>