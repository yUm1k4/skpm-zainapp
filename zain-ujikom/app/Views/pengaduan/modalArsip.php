<div class="modal fade bs-example-modal-lg" id="modalarsip" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Konfirmasi Pengaduan Arsip, Kode: <?= $kode_pengaduan ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?= form_open(base_url('pengaduan/updateArsip'), ['class' => 'formArsip', 'id' => 'form'], ['id_pengaduan' => $id_pengaduan]) ?>
            <div class="modal-body">
                <div class="wizard-content">
                    <section>
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="alert alert-warning" role="alert">
                                        <h6 class="alert-heading h4">Apakah kamu yakin ingin mengarsipkan pengaduan ini? </h6>
                                        <p>Pengaduan yang di arsipkan adalah pengaduan yang mengandung SARA, Tidak Memiliki Bukti Dukung, Tidak Jelas, Tidak Relevan dengan Kinerja Pemerintah, atau Melanggar <a class="alert-link" href="<?= base_url('/ketentuan') ?>" target="_blank">Ketentuan Pengguna</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <p></p>
                <button type="submit" class="btn btn-warning btnsimpan">Ya, Arsipkan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

<script>
    $(document).ready(function() {
        $('.formArsip').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disabled');
                    $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable');
                    $('.btnsimpan').html('Simpan');
                },
                success: function(response) {
                    // jika ada error
                    // jika tidak ada error
                    // munculkan pesan sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses,
                    });

                    // tutup modal
                    $('#modalarsip').modal('hide');
                    // reload page
                    location.reload();
                },
                // menampilkan pesan error:
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        })
    })
</script>