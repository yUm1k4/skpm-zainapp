<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>

<div class="card-box mb-30">
    <div class="pd-20">
        <div class="row">
            <div class="col">
                <div class="title">
                    <h4>KK No. <?= $no_kk ?></h4>
                </div>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-primary btn-icon-split tomboltambahdetail">
                    <span class="icon">
                        <i class="dw dw-add"></i>
                    </span>
                    <span class="text">
                        Anggota Keluarga
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="pb-20">
        <div class="min-height-200px viewdata">
        </div>
    </div>
</div>

<!-- Modal -->
<div class="viewmodal" style="display: none;"></div>

<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>
<script type="text/javascript">
    function dataDetailKK() {
        $.ajax({
            type: "POST",
            url: "<?= site_url('kk/tblDetailKK') ?>",
            data: {
                no_kk: <?= $no_kk ?>
            },
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
        dataDetailKK();

        $('.tomboltambahdetail').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('kk/formTambahDetail') ?>",
                data: {
                    no_kk: <?= $no_kk ?>
                },
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambahdetail').modal('show');
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