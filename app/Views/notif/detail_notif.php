<div class="modal fade modal-approval" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">test</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form-notifikasi">
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url() . '/images/user-images/' . $detail_notif['user_image'] ?>" alt="User Image">
                    </div>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th scope="row">Kode Pengaduan</th>
                                <td><?= $detail_notif['kode_pengaduan'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Lengkap</th>
                                <td><?= $detail_notif['pengirim'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Masuk</th>
                                <td><?= date('d F Y', strtotime($detail_notif['tanggal'])) ?></td>
                            </tr>
                            <!-- <tr>
                                <th scope="row">Keterangan Cuti</th>
                                <td><?= $detail_notif['alasan'] ?></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>