<!-- <div class="div-modal-update"></div> -->

<!-- Modal Notif -->
<div class="modal fade bs-example-modal-lg" id="show-detail-notif" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <!-- $data_notif dari Notif::update -->
                <h4 class="modal-title" id="myLargeModalLabel">Detail Notifikasi <?= $data_notif['jenis'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="post" id="form-notifikasi">
                <input type="hidden" name="id_notif" value="<?= $data_notif['id_notif'] ?>" />
                <div class="modal-body">
                    <div class="wizard-content">
                        <div class="text-center mb-3">
                            <img class="img-circle my-n3" width="200px" src="<?= base_url() . '/images/user-images/' . $data_notif['user_image'] ?>" alt="User Image">
                        </div>
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
                                        <label>Kode Pengaduan :</label>
                                        <input readonly type="text" class="form-control" id="kode">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Notif :</label>
                                        <input readonly type="text" class="form-control" id="jenis">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Pengaduan :</label>
                                        <input readonly type="text" class="form-control" id="tanggal">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label>Isi Pengaduan :</label>
                                    <textarea class="form-control" id="isi_notif" readonly></textarea>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="hapusNotif" class="btn btn-warning" data-dismiss="modal">Hapus Notif</button>
                    <button class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Detail Notif
    $(document).ready(function() {
        $(document).on('click', '#detailNotif', function() {
            var userid = $(this).data('userid');
            var fullname = $(this).data('fullname');
            var image = $(this).data('image');
            var kode = $(this).data('kode');
            var tanggal = $(this).data('tanggal');
            var isi = $(this).data('isi');
            var jenis = $(this).data('jenis');

            // mengirim ke modal sesuai nama idnya
            $('#userid').val(userid);
            $('#fullname').val(fullname);
            $('#image').attr("src", image);
            $('#kode').val(kode);
            $('#tanggal').val(tanggal);
            $('#isi_notif').val(isi);
            $('#jenis').val(jenis);
        });
    });
</script>