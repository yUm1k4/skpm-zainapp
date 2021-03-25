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