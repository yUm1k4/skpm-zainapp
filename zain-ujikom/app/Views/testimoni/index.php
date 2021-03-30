<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>
<div class="card-box mb-30">
    <div class="pd-20">
        <div class="row">
            <div class="col">
                <div class="title">
                    <h4><?= $title; ?> </h4>
                    <code>Maksimal 7 testimoni, minimal 1 testimoni</code>
                </div>
            </div>
            <?php
            if ($jmlData < 7) { ?>
                <div class="col-auto">
                    <button type="button" class="btn btn-sm btn-primary btn-icon-split tomboltambah">
                        <span class="icon">
                            <i class="dw dw-add"></i>
                        </span>
                        <span class="text">
                            Tambah Testimoni
                        </span>
                    </button>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="pb-20">
        <div class="table-responsive viewdata">
        </div>
    </div>
</div>

<!-- Modal -->
<div class="viewmodal" style="display: none;"></div>

<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>

<script type="text/javascript">
    function dataTestimoni() {
        $.ajax({
            url: "<?= site_url('testimoni/ambildata') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
                // $('#tblTestimoni').DataTable({
                //     "destroy": true, //use for reinitialize datatable
                // });
            },
            // menampilkan pesan error:
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    $(document).ready(function() {
        dataTestimoni();

        $('.tomboltambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('testimoni/formtambah') ?>",
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