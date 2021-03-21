<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="modaltambahdetail" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Form Tambah Anggota Keluarga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="formKK" id="form" action="<?= site_url('kk/simpanDataDetail') ?>">
                <div class="modal-body">
                    <div class="wizard-content">
                        <section>
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="no_kk">No Kartu Keluarga :</label>
                                        <input type="text" class="form-control" readonly value="<?= $no_kk ?>" name="no_kk">
                                        <div class="invalid-feedback errorNoKK">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="anggota_keluarga">Pilih Anggota Keluarga <sup class="text-small font-italic text-danger">(Harus sudah memiliki akun)</sup></label>
                                        <select name="anggota_keluarga" id="anggota_keluarga" class="form-control m-0 wide" required data-parsley-required-message="Anggota Keluarga harus dipilih" data-parsley-trigger="keyup" style="width: 100%">
                                            <option value="0" selected>Cari berdasarkan NIK</option>
                                        </select>
                                        <div class="invalid-feedback errorAnggota">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status Hubungan Dalam Keluarga</label>
                                        <select name="status" id="status" class="form-control m-0 wide" required data-parsley-required-message="Status harus dipilih" data-parsley-trigger="keyup" style="width: 100%">
                                            <option value="0" selected>Pilih Status Hubungan</option>
                                            <option value="Suami">Suami</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Famili Lain">Famili Lain</option>
                                        </select>
                                        <div class="invalid-feedback errorStatus">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" id="laki_laki" name="jenis_kelamin" value="l" class="custom-control-input">
                                            <label class="custom-control-label" for="laki_laki">Laki-Laki</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-5">
                                            <input type="radio" id="perempuan" name="jenis_kelamin" required data-parsley-required-message="Harus dipilih" value="p" class="custom-control-input">
                                            <label class="custom-control-label" for="perempuan">Perempuan</label>
                                        </div>
                                        <div class="invalid-feedback errorJK">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select name="agama" id="agama" class="form-control m-0 wide" required data-parsley-required-message="Agama harus dipilih" data-parsley-trigger="keyup" style="width: 100%">
                                            <option value="0" selected>Pilih Agama</option>
                                            <option value="islam">Islam</option>
                                            <option value="protestan">Protestan</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="buddha">Buddha</option>
                                            <option value="konghucu">Konghucu</option>
                                        </select>
                                        <div class="invalid-feedback errorAgama">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan :</label>
                                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" required data-parsley-required-message="Pekerjaan harus diisi" data-parsley-length="[5,50]" data-parsley-length-message="Minimal 5 huruf, Maximal 50 huruf" data-parsley-trigger="keyup" placeholder="Masukkan nama pekerjaan">
                                        <div class="invalid-feedback errorPekerjaan">
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
        $('.formKK').submit(function(e) {
            if (jQuery('#agama').val() == 0) {
                $('#agama').addClass('is-invalid');
                $('.errorAgama').html("Agama harus dipilih");
            } else {
                $('#agama').removeClass('is-invalid');
                $('.errorAgama').html('');
            }
            if (jQuery('#status').val() == 0) {
                $('#status').addClass('is-invalid');
                $('.errorStatus').html("Status Hubungan harus dipilih");
            } else {
                $('#status').removeClass('is-invalid');
                $('.errorStatus').html('');
            }
            if (jQuery('#anggota_keluarga').val() == 0) {
                $('#anggota_keluarga').addClass('is-invalid');
                $('.errorAnggota').html("Kepala Keluarga harus dipilih");
            } else {
                $('#anggota_keluarga').removeClass('is-invalid');
                $('.errorAnggota').html('');
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
                        // respon quote
                        if (response.error.no_kk) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#no_kk').addClass('is-invalid');
                            $('.errorNoKK').html(response.error.no_kk);
                        } else {
                            // jika tdk ada error
                            $('#no_kk').removeClass('is-invalid');
                            $('#no_kk').addClass('is-valid');
                            $('.errorNoKK').html('');
                        }
                        if (response.error.nik) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#nik').addClass('is-invalid');
                            $('.errorNIK').html(response.error.nik);
                        } else {
                            // jika tdk ada error
                            $('#nik').removeClass('is-invalid');
                            $('#nik').addClass('is-valid');
                            $('.errorNIK').html('');
                        }
                        if (response.error.anggota_keluarga) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#anggota_keluarga').addClass('is-invalid');
                            $('.errorAnggota').html(response.error.anggota_keluarga);
                        } else {
                            // jika tdk ada error
                            $('#anggota_keluarga').removeClass('is-invalid');
                            $('#anggota_keluarga').addClass('is-valid');
                            $('.errorAnggota').html('');
                        }
                        if (response.error.jenis_kelamin) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#jenis_kelamin').addClass('is-invalid');
                            $('.errorJK').html(response.error.jenis_kelamin);
                        } else {
                            // jika tdk ada error
                            $('#jenis_kelamin').removeClass('is-invalid');
                            $('#jenis_kelamin').addClass('is-valid');
                            $('.errorJK').html('');
                        }
                        if (response.error.agama) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#agama').addClass('is-invalid');
                            $('.errorAgama').html(response.error.agama);
                        } else {
                            // jika tdk ada error
                            $('#agama').removeClass('is-invalid');
                            $('#agama').addClass('is-valid');
                            $('.errorAgama').html('');
                        }
                        if (response.error.status) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#status').addClass('is-invalid');
                            $('.errorStatus').html(response.error.status);
                        } else {
                            // jika tdk ada error
                            $('#status').removeClass('is-invalid');
                            $('#status').addClass('is-valid');
                            $('.errorStatus').html('');
                        }
                        if (response.error.pekerjaan) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#pekerjaan').addClass('is-invalid');
                            $('.errorPekerjaan').html(response.error.pekerjaan);
                        } else {
                            // jika tdk ada error
                            $('#pekerjaan').removeClass('is-invalid');
                            $('#pekerjaan').addClass('is-valid');
                            $('.errorPekerjaan').html('');
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
                        $('#modaltambahdetail').modal('hide');
                        // lalu load tbl dataDetailKK
                        dataDetailKK();
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
        $("#anggota_keluarga").select2({
            ajax: {
                url: "<?= site_url('kk/getUsers') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                    };
                },
                processResults: function(response) {
                    // console.log(response.data);
                    return {
                        results: response.data
                    };
                },
                cache: true
            }
        });
        $("#agama").select2();
        $("#status").select2();
    });
</script>