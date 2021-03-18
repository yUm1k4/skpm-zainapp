<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="modaltambah" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Form Tambah RT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="formRT" id="form" action="<?= site_url('rt/simpandata') ?>">
                <div class="modal-body">
                    <div class="wizard-content">
                        <section>
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_rt">Nomor RT :</label>
                                        <input type="number" id="no_rt" name="no_rt" class="form-control" required data-parsley-required-message="Nomor RT harus diisi jika ingin menyimpan" data-parsley-length="[2,3]" data-parsley-length-message="Minimal 2 digit, maksimal 3 digit" data-parsley-type-message="Harus berupa angka" data-parsley-trigger="keyup" placeholder="contoh: 03">
                                        <div class="invalid-feedback errorNo">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rw_id">Bagian dari RW</label>
                                        <select name="rw_id" id="rw_id" class="form-control m-0 wide" required data-parsley-required-message="Kepala Keluarga harus dipilih" data-parsley-trigger="keyup" style="width: 100%">
                                            <option value="0" selected>Cari Berdasarkan Nomor RW</option>
                                        </select>
                                        <div class="invalid-feedback errorRW">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_rt">Nama Lengkap RT :</label>
                                        <input type="text" id="nama_rt" name="nama_rt" class="form-control" required data-parsley-required-message="Nomor RW harus diisi jika ingin menyimpan" data-parsley-length="[5,50]" data-parsley-length-message="Minimal 5 karakter, maksimal 50 karakter" data-parsley-trigger="keyup" placeholder="contoh: Zainudin Abdullah">
                                        <div class="invalid-feedback errorNama">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
        $('.formRT').submit(function(e) {
            if (jQuery('#rw_id').val() == 0) {
                $('#rw_id').addClass('is-invalid');
                $('.errorRW').html("RW harus dipilih");
            } else {
                $('#rw_id').removeClass('is-invalid');
                $('.errorRW').html('');
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
                        if (response.error.no_rt) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#no_rt').addClass('is-invalid');
                            $('.errorNo').html(response.error.no_rt);
                        } else {
                            // jika tdk ada error
                            $('#no_rt').removeClass('is-invalid');
                            $('#no_rt').addClass('is-valid');
                            $('.errorNo').html('');
                        }
                        if (response.error.rw_id) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#rw_id').addClass('is-invalid');
                            $('.errorRW').html(response.error.rw_id);
                        } else {
                            // jika tdk ada error
                            $('#rw_id').removeClass('is-invalid');
                            $('#rw_id').addClass('is-valid');
                            $('.errorRW').html('');
                        }
                        if (response.error.nama_rt) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#nama_rt').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama_rt);
                        } else {
                            // jika tdk ada error
                            $('#nama_rt').removeClass('is-invalid');
                            $('#nama_rt').addClass('is-valid');
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
                        $('#modaltambah').modal('hide');
                        // lalu load tbl dataRT
                        dataRT();
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

<script type="text/javascript">
    $(document).ready(function() {
        // Initialize select2
        $("#rw_id").select2({
            ajax: {
                url: "<?= site_url('/rt/getRW') ?>",
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