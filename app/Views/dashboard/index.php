<?= $this->extend('templates/index'); ?>

<?= $this->section('my-css'); ?>
<style>
    @media (min-width: 646px) {
        td .badge {
            width: 100%;
        }
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('preloader'); ?>
<!-- <div class="pre-loader">
    <div class="pre-loader-box">
        <div class="loader-logo">
            <h5 class="text-blue"><?= setting()->nama_aplikasi_frontend ?></h5>
        </div>
        <div class='loader-progress' id="progress_div">
            <div class='bar' id='bar1'></div>
        </div>
        <div class='percent' id='percent1'>0%</div>
        <div class="loading-text">
            Mohon Tunggu...
        </div>
    </div>
</div> -->
<?= $this->endSection(); ?>

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
        <div class="mb-30 <?= in_groups('Admin') ? 'col-xl-3 col-md-4' : 'col-xl-4 col-md-4'; ?>">
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
        <div class="mb-30 <?= in_groups('Admin') ? 'col-xl-3 col-md-4' : 'col-xl-4 col-md-4'; ?>">
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
        <div class="mb-30 <?= in_groups('Admin') ? 'col-xl-3 col-md-4' : 'col-xl-4 col-md-4'; ?>">
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
        <div class="mb-30 <?= in_groups('Admin') ? 'col-xl-3 col-md-4' : 'col-xl-4 col-md-4'; ?>">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <div class="h4 mb-0"><?= $pengaduan_arsip ?></div>
                        <div class="weight-600 font-14">Pengaduan Diarsipkan</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-folder1 fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div>

    <div class="row"> -->
        <div class="mb-30 <?= in_groups('Admin') ? 'col-xl-3 col-md-4' : 'col-xl-4 col-md-4'; ?>">
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
        <div class="mb-30 <?= in_groups('Admin') ? 'col-xl-3 col-md-4' : 'd-none'; ?>">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <?php if ($total_admin == null) : ?>
                            <div class="h4 mb-0">0</div>
                        <?php else : ?>
                            <div class="h4 mb-0"><?= xss($total_admin[0]->total); ?></div>
                        <?php endif ?>
                        <div class="weight-600 font-14">Jumlah Admin</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-insurance fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-30 <?= in_groups('Admin') ? 'col-xl-3 col-md-4' : 'd-none'; ?>">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <?php if ($total_petugas == null) : ?>
                            <div class="h4 mb-0">0</div>
                        <?php else : ?>
                            <div class="h4 mb-0"><?= xss($total_petugas[0]->total); ?></div>
                        <?php endif ?>
                        <div class="weight-600 font-14">Jumlah Petugas</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-user-13 fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-30 <?= in_groups('Admin') ? 'col-xl-3 col-md-4' : 'col-xl-4 col-md-4'; ?>">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <?php if ($total_masyarakat == null) : ?>
                            <div class="h4 mb-0">0</div>
                        <?php else : ?>
                            <div class="h4 mb-0"><?= xss($total_masyarakat[0]->total); ?></div>
                        <?php endif ?>
                        <div class="weight-600 font-14">Jumlah Masyarakat</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-group fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-30 <?= in_groups('Admin') ? 'col-xl-4 col-md-4' : 'col-xl-4 col-md-4'; ?>">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <?php if ($pengunjunghariini == null) : ?>
                            <div class="h4 mb-0">0</div>
                        <?php else : ?>
                            <div class="h4 mb-0"><?= xss($pengunjunghariini); ?></div>
                        <?php endif ?>
                        <div class="weight-600 font-14">Pengunjung Hari Ini</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-meeting fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-30 <?= in_groups('Admin') ? 'col-xl-4 col-md-4' : 'col-xl-4 col-md-4'; ?>">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <?php if ($totalpengunjung == null) : ?>
                            <div class="h4 mb-0">0</div>
                        <?php else : ?>
                            <div class="h4 mb-0"><?= xss($totalpengunjung); ?></div>
                        <?php endif ?>
                        <div class="weight-600 font-14">Total Pengunjung</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-deal fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-30 <?= in_groups('Admin') ? 'col-xl-4 col-md-4' : 'col-xl-4 col-md-4'; ?>">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <?php if ($pengunjungonline == null) : ?>
                            <div class="h4 mb-0">0</div>
                        <?php else : ?>
                            <div class="h4 mb-0"><?= xss($pengunjungonline); ?></div>
                        <?php endif ?>
                        <div class="weight-600 font-14">Pengunjung Online</div>
                    </div>
                    <div class="col-auto">
                        <i class="dw dw-counterclockwise fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card-box mb-30 py-2">
            <div class="pd-10">
                <div class="text-center">
                    <div class="col">
                        <div class="title mb-3">
                            <h5>Pengunjung dan Pengaduan per Bulan di Tahun <?= date('Y') ?></h5>
                        </div>
                    </div>
                </div>
                <canvas id="pengunjung_bulan" height="130"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card-box mb-30 py-2">
            <div class="pd-10">
                <div class="text-center">
                    <div class="col">
                        <div class="title mb-3">
                            <h5>Top 5 Kategori Pengaduan</h5>
                        </div>
                    </div>
                </div>
                <canvas id="pengaduan_kategori" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-box mb-30 py-2">
            <div class="pd-10">
                <div class="row px-3">
                    <div class="col text-center">
                        <div class="title mb-3">
                            <h5>Data Status Pengaduan</h5>
                        </div>
                    </div>
                </div>
                <canvas id="data_pengaduan" height="200"></canvas>
            </div>
        </div>
    </div>
</div>


<!-- Pengaduan Terbaru start -->
<div class="row">
    <div class="col-md-12">
        <div class="card-box mb-30">
            <div class="pd-20">
                <div class="row text-center">
                    <div class="col">
                        <div class="title">
                            <h5>Pengaduan Hari Ini</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-20">
                <small>
                    <div class="table-responsive">
                        <table class="data-table table hover" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>Tgl</th>
                                    <th>Nama</th>
                                    <th>Kode</th>
                                    <th>Laporan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pengaduan_terbaru as $pt) {
                                ?>
                                    <tr class="text-center">
                                        <?php
                                        // $phpdate = strtotime($pt->pengaduan_dibuat);
                                        // $tanggal = date('Y-m-d', $phpdate)
                                        ?>
                                        <td><?= xss(format_indo($pt->pengaduan_dibuat)) ?></td>
                                        <td><?= xss(limit_word($pt->fullname, 2)) ?></td>
                                        <td><?= xss($pt->kode_pengaduan) ?></td>
                                        <td width="50%"><?= xss(sensor(limit_word($pt->isi_laporan, 11))) ?></td>
                                        <?php if ($pt->ket == 'pending') : ?>
                                            <td><button class="badge badge-warning">Pending</button></td>
                                        <?php elseif ($pt->ket == 'proses') : ?>
                                            <td><button class="badge badge-success">Proses</button></td>
                                        <?php elseif ($pt->ket == 'selesai') : ?>
                                            <td><button class="badge badge-primary">Selesai</button></td>
                                        <?php elseif ($pt->ket == 'arsip') : ?>
                                            <td><button class="badge badge-danger">Diarsipkan</button></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </small>
            </div>
        </div>
    </div>
</div>
<!-- Pengaduan Terbaru end -->

<!-- Login Terbaru start -->
<div class="row">
    <div class="col-md-12">
        <div class="card-box mb-30">
            <div class="pd-20">
                <div class="row text-center">
                    <div class="col">
                        <div class="title">
                            <h5>Login Hari Ini</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-20">
                <small>
                    <div class="table-responsive">
                        <table class="data-table table hover" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>Tanggal</th>
                                    <th class="datatable-nosort">Username</th>
                                    <th class="datatable-nosort">Email</th>
                                    <th class="datatable-nosort">IP Address</th>
                                    <th class="datatable-nosort">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($user_log_terbaru as $ult) {
                                ?>
                                    <tr class="text-center">
                                        <td><?= format_indo($ult->date) ?></td>
                                        <td><?= $ult->username ?></td>
                                        <td><?= $ult->e_mail ?></td>
                                        <td><?= $ult->ip_address ?></td>
                                        <td>
                                            <?php if ($ult->group_id == 1) { ?>
                                                <button class="badge badge-primary">Admin</button>
                                            <?php } elseif ($ult->group_id == 2) { ?>
                                                <button class="badge badge-success">Petugas</button>
                                            <?php } elseif ($ult->group_id == 3) { ?>
                                                <button class="badge badge-warning">Masyarakat</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </small>
            </div>
        </div>
    </div>
</div>
<!-- Login Terbaru end -->

<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>
</script>
<script src="<?= base_url('/vendors/chart/Chart.bundle.min.js') ?>"></script>

<!-- Chart Pengunjung dan Pengaduan start -->
<script>
    var pengunjung_bulan = document.getElementById('pengunjung_bulan').getContext('2d');
    var data_pengunjung_bulan = [];
    var data_pengaduan_bulan = [];
    var label_pengunjung_bulan = [];
    var label_pengaduan_bulan = [];

    <?php
    foreach ($pengunjung_per_bulan as $key => $value) : ?>
        data_pengunjung_bulan.push(<?= $value->jumlah ?>);
        label_pengunjung_bulan.push('<?= bulan($value->bulan) ?>');
    <?php endforeach; ?>

    <?php
    foreach ($pengaduan_dibuat as $key => $value) : ?>
        data_pengaduan_bulan.push('<?= $value->jumlah ?>');
        label_pengaduan_bulan.push('<?= bulan($value->bulan) ?>');
    <?php endforeach; ?>

    var data_pengunjung_dan_pengaduan = {
        // labels: label_pengunjung_bulan,
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        datasets: [{
            label: 'Pengunjung',
            fill: true,
            data: data_pengunjung_bulan,
            backgroundColor: 'rgb(0, 227, 150, 0.1)',
            borderColor: 'rgb(0, 227, 150)'
        }, {
            label: 'Pengaduan',
            fill: true,
            data: data_pengaduan_bulan,
            backgroundColor: 'rgba(0, 0, 0, 0.1)',
            borderColor: 'rgba(27, 0, 255, 0.7)'
        }],
    }

    var chart_pengunjung_bulan = new Chart(pengunjung_bulan, {
        type: 'line',
        data: data_pengunjung_dan_pengaduan,
        options: {
            // legend: {
            //     display: false,
            // },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            responsive: true,
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Bulan'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Jumlah'
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 10
                    }
                }]
            }
        }
    });
</script>
<!-- Chart Pengunjung dan Pengaduan end -->

<!-- Chart Kategori start -->
<script>
    var pengaduan_kategori = document.getElementById('pengaduan_kategori');
    var data_pengaduan_kategori = [];
    var label_pengaduan_kategori = [];

    <?php foreach ($pengaduan_per_kategori as $key => $value) : ?>
        data_pengaduan_kategori.push(<?= $value->jumlah ?>);
        // karena label itu minta string, kasih aja ''
        label_pengaduan_kategori.push('<?= $value->nama_kategori ?>');
    <?php endforeach; ?>

    var data_pengaduan_per_kategori = {
        datasets: [{
            data: data_pengaduan_kategori,
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
            ],
        }],
        labels: label_pengaduan_kategori,
    }

    var chart_pengaduan_kategori = new Chart(pengaduan_kategori, {
        type: 'doughnut',
        data: data_pengaduan_per_kategori,
        options: {
            legend: {
                display: true,
                position: 'bottom',
            },
        },
    })
</script>
<!-- Chart Kategori end -->

<!-- Chart Data Pengaduan start -->
<script>
    var chart_data_pengaduan = document.getElementById('data_pengaduan');
    var data_pengaduan = [];
    var label_pengaduan = [];

    <?php foreach ($pengaduan_per_status as $key => $value) : ?>
        data_pengaduan.push(<?= $value->jumlah ?>);
        label_pengaduan.push('<?= $value->status ?>');
    <?php endforeach; ?>

    var data_pengaduan_per_status = {
        labels: ['Pending', 'Proses', 'Arsip', 'Selesai'],
        datasets: [{
            data: [
                <?= $pengaduan_pending ?>,
                <?= $pengaduan_proses ?>,
                <?= $pengaduan_arsip ?>,
                <?= $pengaduan_selesai ?>,
            ],
            backgroundColor: [
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
            ],
        }],
    }

    var chart_pengaduan = new Chart(chart_data_pengaduan, {
        type: 'doughnut',
        data: data_pengaduan_per_status,
        options: {
            legend: {
                display: true,
                position: 'bottom',
            },
        },
    })
</script>
<!-- Chart Data Pengaduan end -->
<?= $this->endSection(); ?>