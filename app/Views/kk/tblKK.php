<table class="data-table table hover" id="tblKK">
    <thead class="text-center">
        <tr>
            <th>#</th>
            <th>No. KK</th>
            <th>RT/RW</th>
            <th>Kepala Keluarga</th>
            <th>NIK</th>
            <th class="datatable-nosort"><i class="dw dw-settings1"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($tampildata as $row) :
        ?>
            <tr>
                <td class="text-center"><?= $i++ ?>.</td>
                <td><?= $row['no_kk'] ?></td>
                <td><?= $row['no_rt'] ?>/<?= $row['no_rw'] ?></td>
                <td><?= $row['fullname'] ?></td>
                <td><?= $row['nik'] ?></td>

                <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="<?= base_url('/kk/detailFormKK/' . $row['no_kk']) ?>"><i class="dw dw-eye"></i> Detail</a>
                            <button class="dropdown-item" onclick="edit(<?= $row['id_kk'] ?>)"><i class="dw dw-edit2"></i> Edit</button>
                            <button type="button" onclick="hapus(<?= $row['no_kk'] ?>)" class="dropdown-item"><i class="dw dw-delete-3"></i> Hapus</button>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('.data-table').DataTable({
            "destroy": true, //use for reinitialize datatable
            scrollCollapse: true,
            autoWidth: false,
            responsive: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "language": {
                "info": "_START_-_END_ dari _TOTAL_ data",
                "infoEmpty": "Menampilkan 0 data",
                "emptyTable": "Maaf, data kosong. :/",
                "lengthMenu": "Tampilkan _MENU_ data",
                "search": "Cari:",
                "zeroRecords": "Tidak ditemukan keyword yang cocok",
                searchPlaceholder: "Keyword",
                paginate: {
                    next: '<i class="ion-chevron-right"></i>',
                    previous: '<i class="ion-chevron-left"></i>'
                }
            },
        });
    })

    function edit(id_kk) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('kk/formedit') ?>",
            data: {
                id_kk: id_kk
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');

                    // console.log(response.sukses);
                    var selectKepalaKeluarga = new Option(response.kepalaText, response.kepalaId, true, true);
                    $('#kepala_keluarga').append(selectKepalaKeluarga).trigger('change');

                    var selectRW = new Option(response.rwText, response.rwId, true, true);
                    $('#rw_id').append(selectRW).trigger('change');

                    var selectRT = new Option(response.rtText, response.rtId, true, true);
                    $('#rt_id').append(selectRT).trigger('change');

                }
            },
            // menampilkan pesan error:
            // error: function(xhr, ajaxOptions, thrownError) {
            //     alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            // }
        });
    }

    function hapus(no_kk) {
        Swal.fire({
            title: 'Hapus Data',
            text: `Yakin ingin menghapus data? Kepala Keluarga dan semua anggota keluarga akan dihapus dan tidak akan bisa dikembalikan`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Data!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('/kk/hapus') ?>",
                    data: {
                        no_kk: no_kk
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses
                            })
                            dataKK();
                        }
                    },
                    // menampilkan pesan error:
                    // error: function(xhr, ajaxOptions, thrownError) {
                    //     alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    // }
                });
            }
        })
    }
</script>