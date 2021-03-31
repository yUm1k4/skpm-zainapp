<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="modaledit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Form Edit Testimoni</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?= form_open(base_url('testimoni/updatedata'), ['class' => 'formTestimoni'], ['id_testimoni' => $id_testimoni]) ?>
            <div class="modal-body">
                <div class="wizard-content">
                    <section>
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullname">Nama Lengkap</label>
                                    </select>
                                    <input type="text" readonly class="form-control" required data-parsley-required-message="Nama tidak boleh kosong" data-parsley-trigger="keyup" name="fullname" id="fullname" value="<?= set_value('fullname', $fullname) ?>">
                                    <div class="invalid-feedback errorFullname">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    </select>
                                    <input type="text" readonly class="form-control" required data-parsley-required-message="Username tidak boleh kosong" data-parsley-trigger="keyup" name="username" id="username" value="<?= set_value('username', $username) ?>">
                                    <div class="invalid-feedback errorUsername">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required data-parsley-required-message="Pekerjaan harus diisi jika ingin menyimpan" data-parsley-length="[5,20]" data-parsley-length-message="Minimal 5 karakter, maximal 20 karakter" data-parsley-trigger="keyup" value="<?= set_value('pekerjaan', $pekerjaan) ?>">
                                    <div class="invalid-feedback errorPekerjaan">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="testimoni">Testimoni :</label>
                                    <textarea id="testimoni" name="testimoni" class="form-control" required data-parsley-required-message="Testimoni harus diisi jika ingin menyimpan" data-parsley-length="[130,300]" data-parsley-length-message="Minimal 130 karakter, maksimal 300 karakter" data-parsley-trigger="keyup"><?= set_value('testimoni', $testimoni) ?></textarea>
                                    <div class="invalid-feedback errorTestimoni">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<!-- End Modal -->

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

<script>
    $(document).ready(function() {
        $('.formTestimoni').submit(function(e) {
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
                    $('.btnsimpan').html('Update');
                },
                success: function(response) {
                    // jika ada error
                    if (response.error) {
                        if (response.error.fullname) {
                            $('#fullname').addClass('is-invalid');
                            $('.errorFullname').html(response.error.fullname);
                        } else {
                            $('#fullname').removeClass('is-invalid');
                            $('#fullname').addClass('is-valid');
                            $('.errorFullname').html('');
                        }
                        if (response.error.username) {
                            $('#username').addClass('is-invalid');
                            $('.errorUsername').html(response.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('#username').addClass('is-valid');
                            $('.errorUsername').html('');
                        }
                        if (response.error.pekerjaan) {
                            $('#pekerjaan').addClass('is-invalid');
                            $('.errorPekerjaan').html(response.error.pekerjaan);
                        } else {
                            $('#pekerjaan').removeClass('is-invalid');
                            $('#pekerjaan').addClass('is-valid');
                            $('.errorPekerjaan').html('');
                        }
                        if (response.error.testimoni) {
                            $('#testimoni').addClass('is-invalid');
                            $('.errorTestimoni').html(response.error.testimoni);
                        } else {
                            $('#testimoni').removeClass('is-invalid');
                            $('#testimoni').addClass('is-valid');
                            $('.errorTestimoni').html('');
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
                        $('#modaledit').modal('hide');
                        // lalu load tbl dataQuotes
                        dataTestimoni();
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