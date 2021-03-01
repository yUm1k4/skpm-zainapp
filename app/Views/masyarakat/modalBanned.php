<div class="modal fade bs-example-modal-lg" id="modalbanned" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Konfirmasi Banned User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?= form_open(base_url('masyarakat/banned'), ['class' => 'formBanned', 'id' => 'form'], ['user_id' => $user_id]) ?>
            <div class="modal-body">
                <div class="wizard-content">
                    <section>
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading h4">Perhatian!</h4>
                                    <p>User yang <a class="alert-link" href="javascript:;">dibanned</a> adalah yang melanggar <a class="alert-link" href="<?= base_url('/ketentuan') ?>" target="_blank">Ketentuan Pengguna</a>. User tersebut tidak akan memiliki hak akses lagi terhadap akun beserta data-datanya.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alasan">Alasan Ngebanned:</label>
                                    <input type="text" name="alasan" class="form-control <?php if (session('errors.alasan')) : ?>is-invalid <?php endif ?>" id="alasan" required data-parsley-required-message="Alasan harus diisi agar jelas" data-parsley-minlength="10" data-parsley-minlength-message="Terlalu singkat, Mohon isi dengan jelas" data-parsley-trigger="keyup" autocomplete="off">
                                    <div class="invalid-feedback errorBan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btnsimpan">Banned</button>
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
        $('.formBanned').submit(function(e) {
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
                        if (response.error.alasan) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#alasan').addClass('is-invalid');
                            $('.errorBan').html(response.error.alasan);
                        } else {
                            // jika tdk ada error
                            $('#alasan').removeClass('is-invalid');
                            $('#alasan').addClass('is-valid');
                            $('.errorBan').html('');
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
                        $('#modalbanned').modal('hide');
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