<?= $this->extend('templates/index'); ?>

<?= $this->section('my-css'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/chating.css">
<style>
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
            <div class="px-1 py-3 card-box">
                <div class="profile-photo">
                    <?php if ($hasil['user_image'] == null) : ?>
                        <!-- jika user image nya kosong tampilkan default -->
                        <img src="<?= base_url('images/avatar.png/') ?>" class="avatar-photo img-fluid">
                    <?php else : ?>
                        <img src="<?= base_url() . '/images/user-images/' . $hasil['user_image'] ?>" alt="" class="avatar-photo img-fluid">
                    <?php endif; ?>
                </div>
                <h5 class="text-center h5 mb-0 text-blue"><?= $hasil['username'] ?></h5>
                <p class="text-center mb-0"><?= $hasil['fullname'] ?></p>
                <div class="profile-info mt-2">
                    <h5 class="mb-10 h5 text-blue">Informasi User</h5>
                    <ul>
                        <li>
                            <span>No Induk Kependudukan:</span>
                            <?= xss($hasil['nik']) ?>
                        </li>
                        <li>
                            <span>Alamat Email:</span>
                            <?= xss($hasil['email']) ?>
                        </li>
                        <li>
                            <span>No Handphone:</span>
                            <?= xss($hasil['no_hp']) ?>
                        </li>
                        <li>
                            <span>Alamat Rumah:</span>
                            <?= xss($hasil['alamat']) ?>
                        </li>
                    </ul>
                </div>
                <div class="profile-info mt-3">
                    <h5 class="mb-10 h5 text-blue">Informasi Pengaduan</h5>
                    <ul>
                        <li>
                            <span><i class="dw dw-stop"></i> Pengaduan Pending: </span>
                            <?= $pengaduanPending ?>
                        </li>
                        <li>
                            <span><i class="dw dw-refresh1"></i> Pengaduan Proses: </span>
                            <?= $pengaduanProses ?>
                        </li>
                        <li>
                            <span><i class="dw dw-folder"></i> Pengaduan Diarsipkan: </span>
                            <?= $pengaduanArsip ?>
                        </li>
                        <li>
                            <span><i class="dw dw-file-31"></i> Pengaduan Selesai: </span>
                            <?= $pengaduanSelesai ?>
                        </li>
                        <li>
                            <span><i class="dw dw-edit-file"></i> Total Pengaduan: </span>
                            <?= $totalPengaduan ?>
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
                                <a class="nav-link active" data-toggle="tab" href="#pengaduan" role="tab">Pengaduan</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active pt-3" id="pengaduan" role="tabpanel">
                                <div class="profile-setting">
                                    <small>
                                        <div class="table-responsive">
                                            <table class="data-table table hover table-sm">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Kode</th>
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
                                                            <td class="text-center" width="7%"><?= $i++ ?>.</td>

                                                            <td class="text-nowrap"><?= $p['kode_pengaduan'] ?></td>

                                                            <td><?= sensor(limit_word($p['isi_laporan'], 15)) ?></td>

                                                            <?php
                                                            $phpdate = strtotime($p['pengaduan_dibuat']);
                                                            $tanggal = date('Y-m-d', $phpdate);
                                                            ?>
                                                            <td><?= str_replace('-', ' ', mediumdate_indo($tanggal)) ?></td>

                                                            <?php if ($p['ket'] == 'pending') : ?>
                                                                <td><button class="badge badge-warning">Pending</button></td>
                                                            <?php elseif ($p['ket'] == 'proses') : ?>
                                                                <td><button class="badge badge-success">Proses</button></td>
                                                            <?php elseif ($p['ket'] == 'selesai') : ?>
                                                                <td><button class="badge badge-primary">Selesai</button></td>
                                                            <?php elseif ($p['ket'] == 'arsip') : ?>
                                                                <td><button class="badge badge-danger">Diarsipkan</button></td>
                                                            <?php endif; ?>

                                                            <td class="text-center">
                                                                <div class="dropdown">
                                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                                        <i class="dw dw-more"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                                        <a href="#" class="dropdown-item" id="detailData" data-toggle="modal" data-target="#show-detail-pengaduan" type="button" data-userid="<?= xss($p['id_pengaduan']); ?>" data-username="<?= xss($p['username']); ?>" data-email="<?= xss($p['email']); ?>" data-fullname="<?= xss($p['fullname']); ?>" data-nik="<?= xss($p['nik']); ?>" data-nohp="<?= xss($p['no_hp']); ?>" data-alamat="<?= xss($p['alamat']); ?>" data-ket="<?= xss($p['ket']) ?>" data-kode="<?= xss($p['kode_pengaduan']) ?>" data-kategori="<?= xss($p['nama_kategori']); ?>" data-tanggal="<?= xss(longdate_indo($tanggal)); ?>" data-isi="<?= xss(sensor($p['isi_laporan'])); ?>" data-lampiran="<?= xss($p['lampiran']); ?>">
                                                                            <i class=" dw dw-eye"></i> Detail
                                                                        </a>

                                                                        <a class="dropdown-item" href="<?= base_url('/pengaduan/balas/' . $p['kode_pengaduan']) ?>"><i class="dw dw-chat3"></i> Balas</a>

                                                                        <?php if ($p['ket'] == 'pending') : ?>
                                                                            <a href="javascript:;" class="dropdown-item" onclick="arsipkan(<?= $p['id_pengaduan'] ?>)"><i class="dw dw-folder1"></i> Arsipkan</a>
                                                                        <?php elseif ($p['ket'] == 'proses') : ?>
                                                                            <a class="dropdown-item" href="javascript:;" onclick="selesai(<?= $p['id_pengaduan'] ?>)"><i class="dw dw-checked"></i> Selesai</a>
                                                                            <a href="javascript:;" class="dropdown-item" onclick="arsipkan(<?= $p['id_pengaduan'] ?>)"><i class="dw dw-folder1"></i> Arsipkan</a>
                                                                        <?php elseif ($p['ket'] == 'arsip') : ?>
                                                                            <a href="javascript:;" class="dropdown-item" onclick="batalarsip(<?= $p['id_pengaduan'] ?>)"><i class="dw dw-undo2"></i> Batal Arsip</a>
                                                                        <?php endif; ?>
                                                                        <a href="<?= base_url('/pengaduan/delete/' . $p['id_pengaduan'] . '/' . $p['kode_pengaduan']) ?>" class="dropdown-item btn-delete"><i class="dw dw-delete-3"></i> Hapus</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
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
                                    <input readonly type="text" class="form-control text-capitalize" id="status">
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

<div class="viewmodal" style="display: none;"></div>
<!-- End Modal -->

<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>

<script>
    function arsipkan(id_pengaduan) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('pengaduan/formArsip/' . $p['id_pengaduan']) ?>",
            data: {
                id_pengaduan: id_pengaduan
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalarsip').modal('show');
                }
            },
            // menampilkan pesan error:
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function batalarsip(id_pengaduan) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('pengaduan/formBatalArsip/' . $p['id_pengaduan']) ?>",
            data: {
                id_pengaduan: id_pengaduan
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalbatalarsip').modal('show');
                }
            },
            // menampilkan pesan error:
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function selesai(id_pengaduan) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('pengaduan/formSelesai/' . $p['id_pengaduan']) ?>",
            data: {
                id_pengaduan: id_pengaduan
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalselesai').modal('show');
                }
            },
            // menampilkan pesan error:
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function cariPengaduan() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('pengaduan/formCariPengaduan') ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalCariPengaduan').modal('show');
                }
            },
            // menampilkan pesan error:
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

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