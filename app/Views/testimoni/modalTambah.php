<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="modaltambah" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Form Tambah Custom Testimoni</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="formTestimoni" id="form" action="<?= site_url('testimoni/simpandata') ?>">
                <div class="modal-body">
                    <div class="wizard-content">
                        <section>
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="user_id">User</label>
                                        <select name="user_id" id="user_id" class="form-control m-0 wide" required data-parsley-required-message="User harus dipilih" data-parsley-trigger="keyup" style="width: 100%">
                                            <option value="0">Cari user berdasarkan Username</option>
                                        </select>
                                        <div class="invalid-feedback errorUser">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required data-parsley-required-message="Pekerjaan harus diisi jika ingin menyimpan" data-parsley-length="[5,20]" data-parsley-length-message="Minimal 5 karakter, maximal 20 karakter" data-parsley-trigger="keyup">
                                        <div class="invalid-feedback errorPekerjaan">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="testimoni">Testi :</label>
                                        <textarea id="testimoni" name="testimoni" class="form-control" required data-parsley-required-message="Testimoni harus diisi jika ingin menyimpan" data-parsley-length="[130,300]" data-parsley-length-message="Minimal 130 karakter, maksimal 300 karakter" data-parsley-trigger="keyup"></textarea>
                                        <div class="invalid-feedback errorTestimoni">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
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
            if (jQuery('#user_id').val() == 0) {
                $('#user_id').addClass('is-invalid');
                $('.errorUser').html("User harus dipilih");
            } else {
                $('#user_id').removeClass('is-invalid');
                $('.errorUser').html('');
            }

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
                        if (response.error.user_id) {
                            $('#user_id').addClass('is-invalid');
                            $('.errorUser').html(response.error.user_id);
                        } else {
                            $('#user_id').removeClass('is-invalid');
                            $('#user_id').addClass('is-valid');
                            $('.errorUser').html('');
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
                        $('#modaltambah').modal('hide');
                        // lalu load tbl dataQuotes
                        dataTestimoni();
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

<script type="text/javascript">
    $(document).ready(function() {
        // Initialize select2
        $("#user_id").select2({
            ajax: {
                url: "<?= site_url('testimoni/getUsers') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response.data
                    };
                },
                cache: true
            }
        });
    });
</script>