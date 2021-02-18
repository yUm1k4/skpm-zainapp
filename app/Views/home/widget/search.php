<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/parsley/custom.css">

<aside class="single_sidebar_widget search_widget">
    <form action="<?= base_url('/cari-laporan') ?>" method="get" id="form">
        <div class="form-group">
            <div class="input-group mb-3">
                <input minlength="5" type="text" class="form-control" placeholder='Cari pengaduan berdasarkan kode' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari pengaduan berdasarkan kode'" name="keyword" required data-parsley-required-message="Kode Pengaduan harus di isi" data-parsley-minlength="5" data-parsley-minlength-message="Kode terlalu singkat" data-parsley-maxlength="10" data-parsley-maxlength-message="Kode terlalu panjang" data-parsley-trigger="keyup" data-parsley-errors-container="#errSearch">
                <div class="input-group-append">
                    <button class="btns" type="button"><i class="ti-search"></i></button>
                </div>
            </div>
            <div id="errSearch">
            </div>
        </div>
        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
    </form>
</aside>

<script src="<?= base_url() ?>/vendors/parsley/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>