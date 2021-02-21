<div class="modal fade bs-example-modal-lg" id="modalselesai" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Konfirmasi Pengaduan</h4>
                <button type="button" class="close" data-dismiss="modalselesai" aria-hidden="true">×</button>
            </div>
            <?= form_open(base_url('pengaduan/updateSelesai'), ['class' => 'formSelesai', 'id' => 'form'], ['id_pengaduan' => $id_pengaduan]) ?>
            <div class="modal-body">
                <div class="wizard-content">
                    <section>
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="hasil_akhir">Kesimpulan / Hasil Akhir :</label>
                                    <textarea name="hasil_akhir" class="form-control <?php if (session('errors.hasil_akhir')) : ?>is-invalid <?php endif ?>" id="hasil_akhir" required data-parsley-required-message="Hasil Akhir harus diisi jika ingin menyimpan" data-parsley-minlength="50" data-parsley-minlength-message="Terlalu singkat, Mohon isi hasil akhir dengan lengkap" data-parsley-trigger="keyup"></textarea>
                                    <div class="invalid-feedback errorSelesai">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        $('.formSelesai').submit(function(e) {
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
                    if (response.error) {
                        // respon quote
                        if (response.error.hasil_akhir) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#hasil_akhir').addClass('is-invalid');
                            $('.errorSelesai').html(response.error.hasil_akhir);
                        } else {
                            // jika tdk ada error
                            $('#hasil_akhir').removeClass('is-invalid');
                            $('#hasil_akhir').addClass('is-valid');
                            $('.errorSelesai').html('');
                        }
                    } else {
                        // jika tidak ada error
                        // munculkan pesan sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        });

                        // tutup modal
                        $('#modalselesai').modal('hide');
                        // reload page
                        location.reload();

                    }
                },
                // menampilkan pesan error:
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        })
    })
</script>