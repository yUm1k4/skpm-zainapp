<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>
<div class="card-box mb-30">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="pd-20">
                <div class="row">
                    <div class="col">
                        <div class="title">
                            <h4><?= $title; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-20">
                <div class="col-md-12 col-sm-12">
                    <form action="<?= base_url('/cetak') ?>" method="POST" target="_blank">
                        <div class="form-group">
                            <label>Rentan Tanggal</label>
                            <input class="form-control datetimepicker-range" placeholder="Pilih rentan tanggal" type="text" name="tanggal" autocomplete="off" autofocus required data-parsley-trigger="keyup" data-parsley-required-message="Harap pilih tanggal dahulu">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <img src="<?= base_url('/home/img/undraw_date.png') ?>" class="img-fluid">
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
<?= $this->endSection(); ?>