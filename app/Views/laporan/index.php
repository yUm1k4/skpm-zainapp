<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>
<div class="card-box mb-30">
    <div class="col-md-12 col-sm-12">
        <div class="row">
            <div class="col">
                <div class="pd-20">
                    <div class="title">
                        <h4><?= $title; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row col-md-8">
                <div class="col-md-6 col-sm-12">
                    <div class="pb-20">
                        <div class="col-md-12 col-sm-12">
                            <form action="<?= base_url('/cetakTgl') ?>" method="POST" target="_blank">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <label>Berdasarkan Rentan Tanggal</label>
                                    <input class="form-control datetimepicker-range" placeholder="Pilih rentan tanggal" type="text" name="tanggal" autocomplete="off" required data-parsley-trigger="keyup" data-parsley-required-message="Harap pilih tanggal dahulu">
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Cetak</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="pb-20">
                        <div class="col-md-12 col-sm-12">
                            <form action="<?= base_url('/cetakKK') ?>" method="POST" target="_blank">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <label>Berdasarkan Kartu Keluarga</label>
                                    <input class="form-control" placeholder="Masukkan No. KK" type="number" name="no_kk" autocomplete="off" required data-parsley-trigger="keyup" data-parsley-required-message="Harap masukkan No. KK terlebih dahulu" value="<?= old('no_kk') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.no_kk') ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Cetak</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="pb-20">
                        <div class="col-md-12 col-sm-12">
                            <form action="<?= base_url('/cetakRW') ?>" method="POST" target="_blank" class="formRW">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <label>Berdasarkan Nomor RW</label>
                                    <select name="rw_id" id="rw_id" class="form-control m-0 wide" required data-parsley-required-message="Nomor RW harus dipilih" data-parsley-errors-container="#select-errors" style="width: 100%">
                                        <option value="" selected>Cari No. RW</option>
                                    </select>
                                    <div id="select-errors"></div>
                                    <div class="invalid-feedback">
                                        <?= session('errors.rw_id') ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Cetak</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <img src="<?= base_url('/home/img/undraw_date.png') ?>" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('my-js'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();

        $("#rw_id").select2({
            ajax: {
                url: "<?= site_url('kk/getRW') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response.data
                    };
                },
                cache: true
            }
        });
    });
</script>

<?= $this->endSection(); ?>