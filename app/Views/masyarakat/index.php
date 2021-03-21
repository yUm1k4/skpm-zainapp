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
                <a href="<?= base_url('/masyarakat/create') ?>" class="btn btn-sm btn-primary btn-icon-split">
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
                        <th>Username</th>
                        <th>NIK</th>
                        <th>No HP</th>
                        <th class="datatable-nosort"><i class="dw dw-settings1"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($masyarakat as $m) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?>.</td>
                            <td>
                                <?php if ($m->user_image == null) : ?>
                                    <img src="<?= base_url('images/avatar.png/') ?>" width="90" class="img-fluid">
                                <?php else : ?>
                                    <img src="<?= base_url('images/user-images/' . $m->user_image) ?>" width="90" class="img-fluid">
                                <?php endif; ?>
                            </td>
                            <?php if ($m->status == 'banned') { ?>
                                <td class="text-danger"><?= xss(limit_word($m->fullname, 3)) ?> <i>(Banned)</i></td>
                                <td class="text-danger"><?= xss($m->username) ?></td>
                            <?php } else { ?>
                                <td><?= xss(limit_word($m->fullname, 2)) ?></td>
                                <td><?= xss($m->username) ?></td>
                            <?php } ?>
                            <td><?= xss($m->nik) ?></td>
                            <td><?= xss($m->no_hp) ?></td>

                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <!-- <a href="#" class="dropdown-item" id="detailData" data-toggle="modal" data-target="#show-masyarakat-modal" type="button" data-userid="<?= $m->userid; ?>" data-username="<?= $m->username; ?>" data-email="<?= $m->email; ?>" data-fullname="<?= $m->fullname; ?>" data-nik="<?= $m->nik; ?>" data-nohp="<?= $m->no_hp; ?>" data-alamat="<?= $m->alamat; ?>">
                                            <i class="dw dw-eye"></i> Detail
                                        </a> -->

                                        <a class="dropdown-item" href="<?= base_url('/masyarakat/detail/' . $m->username) ?>"><i class="dw dw-eye"></i> Detail</a>

                                        <a class="dropdown-item" href="<?= base_url('/masyarakat/edit/' . $m->userid) ?>"><i class="dw dw-edit2"></i> Edit</a>

                                        <?php if ($m->status == 'banned') { ?>
                                            <a href="<?= base_url('/masyarakat/unban/' . $m->userid) ?>" class="dropdown-item btn-unban"><i class=" dw dw-ban"></i> unBan!</a>
                                        <?php } else { ?>
                                            <a href="javascript:;" class="dropdown-item" onclick="banned(<?= $m->userid ?>)"><i class="dw dw-ban"></i> Ban!</a>
                                        <?php } ?>
                                        <a href="<?= base_url('/masyarakat/delete/' . $m->userid) ?>" class="dropdown-item btn-delete"><i class="dw dw-delete-3"></i> Hapus</a>
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

<div class="modal fade bs-example-modal-lg" id="show-masyarakat-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Data Masyarakat</h4>
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


<div class="viewmodal" style="display: none;"></div>

<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>
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

    function banned(userid) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('/masyarakat/bannedForm/' . $m->userid) ?>",
            data: {
                userid: userid
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalbanned').modal('show');
                }
            },
            // menampilkan pesan error:
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    $(document).on('click', '.btn-unban', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: 'Jika kamu Unban user tersebut, akun user dan hak aksesnya akan dikembalikan',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Unban',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Batal Unban',
                    'Akun tersebut masih berstatus banned!',
                    'error'
                )
            }
        })
    })
</script>
<?= $this->endSection(); ?>