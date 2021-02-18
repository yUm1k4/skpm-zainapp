<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>
<div class="card-box mb-30">
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
        <div class="col-md-4 col-sm-12">
            <form action="<?= base_url('/cetak') ?>" method="POST">
                <div class="form-group">
                    <label>Datedpicker Range View</label>
                    <input class="form-control datetimepicker-range" placeholder="Pilih rentan tanggal" type="text" name="tanggal">
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>