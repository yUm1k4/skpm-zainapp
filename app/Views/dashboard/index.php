<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>
<div class="min-height-200px">
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="<?= base_url() ?>/vendors/images/banner-img.png">
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    <?= salam(date('H:i')) ?>, <div class="weight-600 font-30 text-blue"><?= xss(user()->fullname) ?>!</div>
                </h4>
                <p class="font-18 max-width-600">
                    <i class="fa fa-quote-left"></i>
                    <?php foreach ($quote as $quotes) { ?>
                        <?= $quotes->quote ?>
                    <?php } ?>
                    <i class="fa fa-quote-right"></i>
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= $pengaduan_pending ?></div>
                        <div class="weight-600 font-14">Pengaduan Pending</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-stop fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= $pengaduan_proses ?></div>
                        <div class="weight-600 font-14">Pengaduan Proses</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-refresh1 fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= $pengaduan_selesai ?></div>
                        <div class="weight-600 font-14">Pengaduan Selesai</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-file-31 fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= $total_pengaduan ?></div>
                        <div class="weight-600 font-14">Jumlah Pengaduan</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-edit-file fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= xss($total_admin[0]->total); ?></div>
                        <div class="weight-600 font-14">Jumlah Admin</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-insurance fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= xss($total_petugas[0]->total); ?></div>
                        <div class="weight-600 font-14">Jumlah Petugas</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-user-13 fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= xss($total_masyarakat[0]->total); ?></div>
                        <div class="weight-600 font-14">Jumlah Masyarakat</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-group fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Data Laporan -->
<div class="card-box mb-30">
    <div class="pd-20">
        <div class="row text-center">
            <div class="col">
                <div class="title">
                    <h5>10 Data Pengaduan Terbaru</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-20">
        <div class="table-responsive">
            <table class="data-table table hover" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>Nama</th>
                        <th>Kode Pengaduan</th>
                        <th>Isi Laporan</th>
                        <th>Hari/Tgl</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pengaduan_terbaru as $pt) {
                    ?>
                        <tr class="text-center">
                            <td><?= xss($pt->fullname) ?></td>
                            <td><?= xss($pt->kode_pengaduan) ?></td>
                            <td><?= xss(limit_word($pt->isi_laporan, 20)) ?></td>
                            <?php
                            $phpdate = strtotime($pt->pengaduan_dibuat);
                            $tanggal = date('Y-m-d', $phpdate)
                            ?>
                            <td><?= xss(format_indo($tanggal)) ?></td>
                            <?php if ($pt->ket == 'pending') : ?>
                                <td><button class="badge badge-warning">Pending</button></td>
                            <?php elseif ($pt->ket == 'proses') : ?>
                                <td><button class="badge badge-success">Proses</button></td>
                            <?php else : ?>
                                <td><button class="badge badge-primary">Selesai</button></td>
                            <?php endif; ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>