<table class="data-table table hover" id="tblKategori">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Nama Kategori</th>
            <th class="datatable-nosort"><i class="dw dw-settings1"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($tampildata as $row) :
        ?>
            <tr>
                <td class="text-center" width="7%"><?= $i++ ?>.</td>
                <td class="text-center"><?= $row['nama_kategori'] ?></td>

                <td class="text-center" width="10%">
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <button class="dropdown-item" onclick="edit(<?= $row['id_pengaduan_kategori'] ?>)"><i class="dw dw-edit2"></i> Edit</button>

                            <button type="button" onclick="hapus(<?= $row['id_pengaduan_kategori'] ?>)" class="dropdown-item"><i class="dw dw-delete-3"></i> Hapus</button>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tblKategori').DataTable();
    })

    function edit(id_pengaduan_kategori) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('/pengaduan-kategori/formedit') ?>",
            data: {
                id_pengaduan_kategori: id_pengaduan_kategori
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

    function hapus(id_pengaduan_kategori) {
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
                    url: "<?= site_url('/pengaduan-kategori/hapus') ?>",
                    data: {
                        id_pengaduan_kategori: id_pengaduan_kategori
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses
                            })
                            dataKategori();
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