<!-- Modal -->
<div class="modal fade bs-example-modal-lg pl-0" id="modaltambah" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Form Tambah Kartu Keluarga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="formKK" id="form" action="<?= site_url('kk/simpandata') ?>">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="wizard-content">
                        <section>
                            <h6 class="text-blue">Section Kartu Keluarga</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="no_kk">No Kartu Keluarga :</label>
                                        <input type="number" id="no_kk" name="no_kk" class="form-control" required data-parsley-required-message="No KK harus diisi jika ingin menyimpan" data-parsley-length="[16,16]" data-parsley-length-message="No KK harus berjumlah 16 digit" data-parsley-trigger="keyup" placeholder="contoh: 3275********1002" data-parsley-type-message="No KK harus berupa angka">
                                        <div class="invalid-feedback errorNoKK">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rw_id">Pilih Rukun Warga</label>
                                        <select name="rw_id" id="rw_id" class="form-control m-0 wide" required data-parsley-required-message="Rukun Warga harus dipilih" data-parsley-trigger="keyup" style="width: 100%">
                                            <option value="0" selected>Cari Nomor RW</option>
                                        </select>
                                        <div class="invalid-feedback errorRW">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rt_id">Pilih Rukun Tetangga <sup class="text-small font-italic text-danger">(Pilih rukun warga dahulu)</sup></label>
                                        <select name="rt_id" id="rt_id" class="form-control m-0 wide" required data-parsley-required-message="Rukun Tetangga harus dipilih" data-parsley-trigger="keyup" style="width: 100%">
                                            <option value="0">Cari Nomor RT</option>
                                        </select>
                                        <div class="invalid-feedback errorRT">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="text-blue">Section Data Kepala Keluarga</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kepala_keluarga">Pilih Kepala Keluarga <sup class="text-small font-italic text-danger">(Harus sudah memiliki akun)</sup></label>
                                        <select name="kepala_keluarga" id="kepala_keluarga" class="form-control m-0 wide" required data-parsley-required-message="Kepala Keluarga harus dipilih" data-parsley-trigger="keyup" style="width: 100%">
                                            <option value="0" selected>Cari berdasarkan NIK</option>
                                        </select>
                                        <div class="invalid-feedback errorKepala">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio mr-4">
                                                <input type="radio" id="laki_laki" name="jenis_kelamin" value="l" class="custom-control-input">
                                                <label class="custom-control-label" for="laki_laki">Laki-Laki</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="perempuan" name="jenis_kelamin" required data-parsley-required-message="Harus dipilih" value="p" class="custom-control-input">
                                                <label class="custom-control-label" for="perempuan">Perempuan</label>
                                            </div>
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
            if (jQuery('#kepala_keluarga').val() == 0) {
                $('#kepala_keluarga').addClass('is-invalid');
                $('.errorKepala').html("Kepala Keluarga harus dipilih");
            } else {
                $('#kepala_keluarga').removeClass('is-invalid');
                $('.errorKepala').html('');
            }
            if (jQuery('#rw_id').val() == 0) {
                $('#rw_id').addClass('is-invalid');
                $('.errorRW').html("RW harus dipilih");
            } else {
                $('#rw_id').removeClass('is-invalid');
                $('.errorRW').html('');
            }
            if (jQuery('#rt_id').val() == 0) {
                $('#rt_id').addClass('is-invalid');
                $('.errorRT').html("RT harus dipilih");
            } else {
                $('#rt_id').removeClass('is-invalid');
                $('.errorRT').html('');
            }
            if (jQuery('#rt_id').val() == 'kosong') {
                $('#rt_id').addClass('is-invalid');
                $('.errorRT').html("Belum ada RT");
            } else {
                $('#rt_id').removeClass('is-invalid');
                $('.errorRT').html('');
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
                    // console.log(response.rt_id);
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
                        if (response.error.kepala_keluarga) {
                            // jika ada error maka tampilkan pesan errornya
                            $('#kepala_keluarga').addClass('is-invalid');
                            $('.errorKepala').html(response.error.kepala_keluarga);
                        } else {
                            // jika tdk ada error
                            $('#kepala_keluarga').removeClass('is-invalid');
                            $('#kepala_keluarga').addClass('is-valid');
                            $('.errorKepala').html('');
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
                        $('#modaltambah').modal('hide');
                        // lalu load tbl dataKK
                        dataKK();
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
        $("#kepala_keluarga").select2({
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
                    return {
                        results: response.data
                    };
                },
                cache: true
            }
        });
        $("#rw_id").select2({
            ajax: {
                url: "<?= site_url('kk/getRW') ?>",
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
        $("#rw_id").change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('kk/getRT') ?>",
                data: {
                    id: id
                },
                dataType: "json",
                delay: 250,
                success: function(response) {
                    // var option = new Option(response.data.text, response.data.id, true, true);
                    // $('#rt_id').append(option).trigger('change');
                    console.log(response.data);
                    $('#rt_id').html(response.data);

                    // var selectValues = response.data;
                    // $.each(selectValues, function(key, value) {
                    //     $('#rt_id').append($("<option></option>")
                    //         .attr("value", key)
                    //         .text(value));
                    // });
                }
            });
            // var selectValues = result.get_data;

            // $("#select--product option").remove();
            // $('#select--product').append($("<option></option>")
            //     .attr("value", '')
            //     .text('Pilih Nama Product'));
            // console.log(selectValues);
            // $.each(selectValues, function(key, value) {
            //     $('#select--product')
            //         .append($("<option></option>")
            //             .attr("value", key)
            //             .text(value));
            // });

        });
        $("#rt_id").select2();
        $("#agama").select2();
    });
</script>