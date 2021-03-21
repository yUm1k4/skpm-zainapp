<table class="data-table table hover" id="tblDetailKK">
    <thead class="text-center">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Gender</th>
            <th>Agama</th>
            <th>Pekerjaan</th>
            <th>Status</th>
            <th class="datatable-nosort"><i class="dw dw-settings1"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($detaildata as $row) :
        ?>
            <tr>
                <td class="text-center"><?= $i++ ?>.</td>
                <td><?= $row['fullname'] ?></td>
                <td><?= $row['nik'] ?></td>
                <?php if ($row['jenis_kelamin'] == 'l') { ?>
                    <td>Laki-Laki</td>
                <?php } else { ?>
                    <td>Perempuan</td>
                <?php } ?>
                <td><?= ucfirst($row['agama']) ?></td>
                <td><?= ucwords($row['pekerjaan']) ?></td>
                <td><?= $row['status_hubungan'] ?></td>

                <td class="text-center">
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <button class="dropdown-item" onclick="edit(<?= $row['id_kk'] ?>)"><i class="dw dw-edit2"></i> Edit</button>
                            <button type="button" onclick="hapus(<?= $row['id_kk'] ?>)" class="dropdown-item"><i class="dw dw-delete-3"></i> Hapus</button>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#tblDetailKK').DataTable();
    })

    function edit(id_kk) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('kk/formEditDetail') ?>",
            data: {
                id_kk: id_kk
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaleditdetail').modal('show');

                    // console.log(response.sukses);
                    var selectAnggotaKeluarga = new Option(response.anggotaText, response.anggotaId, true, true);
                    $('#anggota_keluarga').append(selectAnggotaKeluarga).trigger('change');
                }
            },
            // menampilkan pesan error:
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function hapus(id_kk) {
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
                    url: "<?= site_url('/kk/hapusDetailKK') ?>",
                    data: {
                        id_kk: id_kk
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses
                            })
                            dataDetailKK();
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