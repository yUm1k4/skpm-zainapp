<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>
<div class="card-box mb-30">
    <div class="pd-20">
        <div class="row">
            <div class="col">
                <div class="title">
                    <h4><?= $title; ?></h4>
                    <code>Kategori yg sudah terpakai tidak bisa dihapus</code>
                </div>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-primary btn-icon-split tomboltambah">
                    <span class="icon">
                        <i class="dw dw-add"></i>
                    </span>
                    <span class="text">
                        Tambah Kategori
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="pb-20">
        <div class="table-responsive viewdata">
        </div>
    </div>
</div>

<div class="viewmodal" style="display: none;"></div>

<script type="text/javascript">
    function dataKategori() {
        $.ajax({
            url: "<?= site_url('pengaduan-kategori/ambildata') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            },
            // menampilkan pesan error:
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    $(document).ready(function() {
        dataKategori();

        $('.tomboltambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('pengaduan-kategori/formtambah') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambah').modal('show');
                },
                // menampilkan pesan error:
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    })
</script>


<?= $this->endSection(); ?>