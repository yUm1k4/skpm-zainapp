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
            <div class="col-auto">
                <a href="<?= base_url('/admin/create') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="dw dw-add-user"></i>
                    </span>
                    <span class="text">
                        Tambah Data
                    </span>
                </a>
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
                        <th class="datatable-nosort"><i class="dw dw-settings1"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($admin as $a) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?>.</td>
                            <td>
                                <?php if ($a->user_image == null) : ?>
                                    <img src="<?= base_url('images/avatar.png/') ?>" width="90" class="img-fluid">
                                <?php else : ?>
                                    <img src="<?= base_url('images/admin-images/' . $a->user_image) ?>" width="90" class="img-fluid">
                                <?php endif; ?>
                            </td>
                            <td><?= xss(limit_word($a->fullname, 2)) ?></td>
                            <td><?= xss($a->nik) ?></td>
                            <td><?= xss($a->no_hp) ?></td>

                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a href="#" class="dropdown-item" id="detailData" data-toggle="modal" data-target="#show-admin-modal" type="button" data-userid="<?= $a->userid; ?>" data-username="<?= $a->username; ?>" data-email="<?= $a->email; ?>" data-fullname="<?= $a->fullname; ?>" data-nik="<?= $a->nik; ?>" data-nohp="<?= $a->no_hp; ?>" data-alamat="<?= $a->alamat; ?>">
                                            <i class="dw dw-eye"></i> Detail
                                        </a>
                                        <!-- <a class="dropdown-item" href="<?= base_url('/admin/edit/' . $a->userid) ?>"><i class="dw dw-edit2"></i> Edit</a> -->
                                        <a href="<?= base_url('/admin/delete/' . $a->userid) . '/' . $a->username ?>" class="dropdown-item btn-delete"><i class="dw dw-delete-3"></i> Hapus</a>
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

<div class="modal fade bs-example-modal-lg" id="show-admin-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Data Admin</h4>
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
            var alamat = $(this).data('alamat');

            // mengirim ke modal sesuai nama classnya
            $('#userid').val(userid);
            $('#username').val(username);
            $('#email').val(email);
            $('#fullname').val(fullname);
            $('#nik').val(nik);
            $('#no_hp').val(nohp);
            $('#alamat').val(alamat);
        });
    });
</script>

<?= $this->endSection(); ?>