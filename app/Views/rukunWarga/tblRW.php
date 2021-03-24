<table class="data-table table hover" id="tblRW">
    <thead class="text-center">
        <tr>
            <th>#</th>
            <th>Nomor RW</th>
            <th>Nama RW</th>
            <th>Jumlah RT</th>
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
                <td class="text-center"><?= $row['no'] ?></td>
                <td><?= $row['nama_rw'] ?></td>
                <?php if ($row['id_rt'] == null) { ?>
                    <td class="text-center">0</td>
                <?php } else { ?>
                    <td class="text-center"><?= $row['no_rw'] ?></td>
                <?php } ?>

                <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                            <button class="dropdown-item" onclick="edit(<?= $row['id_rw'] ?>)"><i class="dw dw-edit2"></i> Edit</button>

                            <button type="button" onclick="hapus(<?= $row['id_rw'] ?>)" class="dropdown-item"><i class="dw dw-delete-3"></i> Hapus</button>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#tblRW').DataTable();
    })

    function edit(id_rw) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('/rw/formedit') ?>",
            data: {
                id_rw: id_rw
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');
                }
            },
            // menampilkan pesan error:
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function hapus(id_rw) {
        Swal.fire({
            title: 'Hapus Data',
            text: `Yakin ingin menghapus data? Data yang terhapus tidak akan bisa dikembalikan`,
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
                    url: "<?= site_url('/rw/hapus') ?>",
                    data: {
                        id_rw: id_rw
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses
                            })
                            dataRW();
                        }
                    },
                    // menampilkan pesan error:
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
        })
    }
</script>