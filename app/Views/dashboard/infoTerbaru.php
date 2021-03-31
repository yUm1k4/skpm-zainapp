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
                                        <td width="50%"><?= xss(sensor(limit_word($pt->isi_laporan, 15))) ?></td>
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