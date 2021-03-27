<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Form Edit Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?= form_open(base_url('pengaduan-kategori/updatedata'), ['class' => 'formKategori'], ['id_pengaduan_kategori' => $id_pengaduan_kategori]) ?>
            <div class="modal-body">
                <div class="wizard-content">
                    <section>
                        <?= csrf_field() ?>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori :</label>
                                    <input type="text" id="nama_kategori" name="nama_kategori" class="form-control " required data-parsley-required-message="Kategori harus diisi jika ingin menyimpan" data-parsley-length="[3,40]" data-parsley-length-message="Minimal 3 karakter, maksimal 40 karakter" data-parsley-trigger="keyup" value="<?= set_value('nama_kategori', $nama_kategori) ?>">
                                    <div class="invalid-feedback errorKat">
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
        $('.formKategori').submit(function(e) {
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
                        // respon nama_kategori
                        if (response.error.nama_kategori) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#nama_kategori').addClass('is-invalid');
                            $('.errorKat').html(response.error.nama_kategori);
                        } else {
                            // jika tdk ada error
                            $('#nama_kategori').removeClass('is-invalid');
                            $('#nama_kategori').addClass('is-valid');
                            $('.errorKat').html('');
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
                        // lalu load tbl dataKategori
                        dataKategori();
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