<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Form Edit Filter Kata Kotor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <?= form_open(base_url('filter-kata/updatedata'), ['class' => 'formFilter'], ['id_filter' => $id_filter]) ?>
            <div class="modal-body">
                <div class="wizard-content">
                    <section>
                        <?= csrf_field() ?>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kata_kotor">Kata Kotor :</label>
                                    <input type="text" name="kata_kotor" id="kata_kotor" class="form-control" required data-parsley-required-message="Kata Kotor harus diisi jika ingin menyimpan" data-parsley-length="[2,50]" data-parsley-length-message="Minimal 2 karakter, maksimal 50 karakter" data-parsley-trigger="keyup" value="<?= set_value('kata_kotor', $kata_kotor) ?>">
                                    <div class="invalid-feedback errorKataKotor">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="filter_kata">Filter Kata Menjadi :</label>
                                    <input type="text" name="filter_kata" id="filter_kata" class="form-control" required data-parsley-required-message="Filter Kata harus diisi jika ingin menyimpan" data-parsley-length="[2,10]" data-parsley-length-message="Minimal 2 karakter, maksimal 10 karakter" data-parsley-trigger="keyup" value="<?= set_value('filter_kata', $filter_kata) ?>">
                                    <div class="invalid-feedback errorFilterKata">
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
        $('.formFilter').submit(function(e) {
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
                        // respon quote
                        if (response.error.kata_kotor) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#kata_kotor').addClass('is-invalid');
                            $('.errorKataKotor').html(response.error.kata_kotor);
                        } else {
                            // jika tdk ada error
                            $('#kata_kotor').removeClass('is-invalid');
                            $('#kata_kotor').addClass('is-valid');
                            $('.errorKataKotor').html('');
                        }
                        if (response.error.filter_kata) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#filter_kata').addClass('is-invalid');
                            $('.errorKataKotor').html(response.error.filter_kata);
                        } else {
                            // jika tdk ada error
                            $('#filter_kata').removeClass('is-invalid');
                            $('#filter_kata').addClass('is-valid');
                            $('.errorFilterKata').html('');
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
                        // lalu load tbl dataFilter
                        dataFilter();
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