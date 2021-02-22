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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Tgl Kirim</th>
                        <th class="datatable-nosort"><i class="dw dw-settings1"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($contact as $c) :
                    ?>
                        <tr>
                            <td class="text-center" width="7%"><?= $i++ ?>.</td>
                            <td><?= $c->nama_lengkap ?></td>
                            <td><?= $c->contact_email ?></td>
                            <td><?= $c->subject ?></td>
                            <td><?= format_indo($c->terbaru) ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a href="#" class="dropdown-item" id="detailData" data-toggle="modal" data-target="#show-detail-contact" type="button" data-contactid="<?= xss($c->id_contact); ?>" data-username="<?= xss($c->username); ?>" data-cemail="<?= xss($c->contact_email); ?>" data-nama_lengkap="<?= xss($c->nama_lengkap); ?>" data-fullname="<?= xss($c->fullname); ?>" data-subject="<?= xss($c->subject); ?>" data-pesan="<?= nl2br_xss($c->pesan); ?>">
                                            <i class=" dw dw-eye"></i> Detail
                                        </a>

                                        <a href="<?= base_url('/contact/delete/' . $c->id_contact) ?>" class="dropdown-item btn-delete"><i class="dw dw-delete-3"></i> Hapus</a>
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

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="show-detail-contact" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Pesan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="wizard-content">
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username Pengirim :</label>
                                    <input readonly type="text" class="form-control" id="username">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap :</label>
                                    <input readonly type="text" class="form-control" id="nama_lengkap">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subject :</label>
                                    <input readonly type="text" class="form-control" id="subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email :</label>
                                    <input class="form-control" id="cemail" type="text" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Isi Pesan :</label>
                                <textarea class="form-control" id="pesan" readonly></textarea>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>
<script>
    // Detail Data
    $(document).ready(function() {
        $(document).on('click', '#detailData', function() {
            // mendeklarasikan variable
            var contactid = $(this).data('contactid');
            var username = $(this).data('username');
            var fullname = $(this).data('fullname');
            var cemail = $(this).data('cemail');
            var nama_lengkap = $(this).data('nama_lengkap');
            var subject = $(this).data('subject');
            var pesan = $(this).data('pesan');

            // mengirim ke modal sesuai nama idnya
            $('#contactid').val(contactid);
            $('#username').val(username);
            $('#fullname').val(fullname);
            $('#cemail').val(cemail);
            $('#nama_lengkap').val(nama_lengkap);
            $('#subject').val(subject);
            $('#pesan').val(pesan);
            $('#alamat').val(alamat);
        });
    });
</script>
<?= $this->endSection(); ?>