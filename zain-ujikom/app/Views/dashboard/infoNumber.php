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