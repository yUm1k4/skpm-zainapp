<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>

<div class="card-box mb-30">
    <div class="pd-20 pb-0">
        <div class="row">
            <div class="col">
                <div class="title">
                    <h4>Settings Website</h4>
                </div>
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
    function dataSetting() {
        $.ajax({
            url: "<?= site_url('setting/ambildata') ?>",
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
        dataSetting();
    })
</script>

<?= $this->endSection(); ?>