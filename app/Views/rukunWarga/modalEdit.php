<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Form Edit RW</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?= form_open(base_url('rw/updatedata'), ['class' => 'formRT'], ['id_rw' => $id_rw]) ?>
            <div class="modal-body">
                <div class="wizard-content">
                    <section>
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="no_rw">Nomor RW :</label>
                                    <input type="number" id="no_rw" name="no_rw" class="form-control" required data-parsley-required-message="Nomor RW harus diisi jika ingin menyimpan" data-parsley-length="[2,3]" data-parsley-length-message="Minimal 2 digit, maksimal 3 digit" data-parsley-type-message="Harus berupa angka" data-parsley-trigger="keyup" placeholder="contoh: 03" value="<?= set_value('no_rw', $no_rw) ?>">
                                    <div class="invalid-feedback errorNo">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_rw">Nama Lengkap RW :</label>
                                    <input type="text" id="nama_rw" name="nama_rw" class="form-control" required data-parsley-required-message="Nomor RW harus diisi jika ingin menyimpan" data-parsley-length="[5,50]" data-parsley-length-message="Minimal 5 karakter, maksimal 50 karakter" data-parsley-trigger="keyup" placeholder="contoh: Zainudin Abdullah" value="<?= set_value('nama_rw', $nama_rw) ?>">
                                    <div class="invalid-feedback errorNama">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
        $('.formRT').submit(function(e) {
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
                        // respon 
                        if (response.error.no_rw) {
                            $('#no_rw').addClass('is-invalid');
                            $('.errorNo').html(response.error.no_rw);
                        } else {
                            // jika tdk ada error
                            $('#no_rw').removeClass('is-invalid');
                            $('#no_rw').addClass('is-valid');
                            $('.errorNo').html('');
                        }
                        if (response.error.nama_rw) {
                            $('#nama_rw').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama_rw);
                        } else {
                            // jika tdk ada error
                            $('#nama_rw').removeClass('is-invalid');
                            $('#nama_rw').addClass('is-valid');
                            $('.errorNama').html('');
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
                        // lalu load tbl dataRW
                        dataRW();
                    }
                },
                // menampilkan pesan error:
                // error: function(xhr, ajaxOptions, thrownError) {
                //     alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                // }
            });
        })
    })
</script>