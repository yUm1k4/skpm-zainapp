<?= $this->extend('templates/index'); ?>

<?= $this->section('my-css'); ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/chating.css">
<?= $this->endSection(); ?>

<?= $this->section('main-content'); ?>

<div class="min-height-200px">
    <div class="row mt-3">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="px-1 py-3 card-box">
                <div class="profile-photo">
                    <?php if ($hasil['user_image'] == null) : ?>
                        <!-- jika user image nya kosong tampilkan default -->
                        <img src="<?= base_url('images/avatar.png/') ?>" class="avatar-photo">
                    <?php else : ?>
                        <img src="<?= base_url() . '/images/user-images/' . $hasil['user_image'] ?>" alt="" class="avatar-photo">
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

<?= $this->endSection(); ?>