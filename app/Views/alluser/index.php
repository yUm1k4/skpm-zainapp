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
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No HP</th>
                        <th>Role</th>
                        <th class="datatable-nosort"><i class="dw dw-settings1"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($alluser as $au) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?>.</td>
                            <td>
                                <?php if ($au->user_image == null) : ?>
                                    <img src="<?= base_url('images/avatar.png/') ?>" width="90" class="img-fluid">
                                <?php else : ?>
                                    <?php if ($au->group_id == 3) { ?>
                                        <img src="<?= base_url('images/user-images/' . $au->user_image) ?>" width="90" class="img-fluid">
                                    <?php } else { ?>
                                        <img src="<?= base_url('images/admin-images/' . $au->user_image) ?>" width="90" class="img-fluid">
                                    <?php } ?>
                                <?php endif; ?>
                            </td>
                            <?php if ($au->status == 'banned') { ?>
                                <td class="text-danger"><?= xss(limit_word($au->fullname, 2)) ?> <i>(Banned)</i></td>
                            <?php } else { ?>
                                <td><?= xss(limit_word($au->fullname, 2)) ?></td>
                            <?php } ?>
                            <td><?= xss($au->nik) ?></td>
                            <td><?= xss($au->no_hp) ?></td>
                            <td>
                                <?php if ($au->group_id == 1) { ?>
                                    <button class="badge badge-primary">Admin</button>
                                <?php } elseif ($au->group_id == 2) { ?>
                                    <button class="badge badge-success">Petugas</button>
                                <?php } elseif ($au->group_id == 3) { ?>
                                    <button class="badge badge-warning">Masyarakat</button>
                                <?php } ?>
                            </td>

                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <?php if ($au->group_id == 1) {
                                            $role = 'Admin';
                                        } elseif ($au->group_id == 2) {
                                            $role = 'Petugas';
                                        } else {
                                            $role = 'Masyarakat';
                                        } ?>

                                        <a href="#" class="dropdown-item" id="detailData" data-toggle="modal" data-target="#show-alluser-modal" type="button" data-userid="<?= $au->userid; ?>" data-username="<?= $au->username; ?>" data-email="<?= $au->email; ?>" data-fullname="<?= $au->fullname; ?>" data-nik="<?= $au->nik; ?>" data-nohp="<?= $au->no_hp; ?>" data-alamat="<?= $au->alamat; ?>" data-role="<?= $role; ?>">
                                            <i class="dw dw-eye"></i> Detail
                                        </a>

                                        <?php if ($au->group_id == 1) { ?>
                                            <a href="<?= base_url('/admin/delete/' . $au->userid) . '/' . $au->username ?>" class="dropdown-item btn-delete"><i class="dw dw-delete-3"></i> Hapus</a>
                                        <?php } elseif ($au->group_id == 2) { ?>
                                            <a class="dropdown-item" href="<?= base_url('/petugas/edit/' . $au->userid) ?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a href="<?= base_url('/petugas/delete/' . $au->userid . '/' . $au->username) ?>" class="dropdown-item btn-delete"><i class="dw dw-delete-3"></i> Hapus</a>
                                        <?php } else { ?>
                                            <a class="dropdown-item" href="<?= base_url('/masyarakat/edit/' . $au->userid) ?>"><i class="dw dw-edit2"></i> Edit</a>
                                            <a href="<?= base_url('/masyarakat/delete/' . $au->userid) ?>" class="dropdown-item btn-delete"><i class="dw dw-delete-3"></i> Hapus</a>
                                        <?php } ?>
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

<div class="modal fade bs-example-modal-lg" id="show-alluser-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Data Pengguna</h4>
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
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label>Alamat Email :</label>
                                    <input readonly type="email" class="form-control" id="email">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role :</label>
                                    <input readonly type="text" class="form-control" id="role">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat Lengkap :</label>
                                    <input readonly type="text" class="form-control" id="alamat">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
            var role = $(this).data('role');
            var alamat = $(this).data('alamat');

            // mengirim ke modal sesuai nama classnya
            $('#userid').val(userid);
            $('#username').val(username);
            $('#email').val(email);
            $('#fullname').val(fullname);
            $('#nik').val(nik);
            $('#no_hp').val(nohp);
            $('#role').val(role);
            $('#alamat').val(alamat);
        });
    });
</script>

<?= $this->endSection(); ?>