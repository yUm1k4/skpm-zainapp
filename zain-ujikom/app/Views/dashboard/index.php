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
<div class="pre-loader">
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
</div>
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
                    <?= salam(date('H:i')) ?>, <div class="weight-600 font-30 text-blue"><?= xss(limit_word(user()->fullname, 4)) ?>!</div>
                </h4>
                <p class="font-18 max-width-600">
                    <i class="fa fa-quote-left"></i>
                    <?php if ($quote) { ?>
                        <?php foreach ($quote as $quotes) { ?>
                            <?= $quotes->quote ?>
                        <?php } ?>
                    <?php } else { ?>
                        Yakin kepada Allah, bermimpi yang besar, kerja keras, maka kesuksesan akan datang kepadamu
                    <?php } ?>
                    <i class="fa fa-quote-right"></i>
                </p>
            </div>
        </div>
    </div>

    <?= $this->include('dashboard/infoNumber') ?>
</div>


<?= $this->include('dashboard/infoChart') ?>

<?= $this->include('dashboard/infoTerbaru') ?>

<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>
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