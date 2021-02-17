<aside class="single_sidebar_widget search_widget">
    <form action="<?= base_url('/cari-laporan') ?>" method="get">
        <div class="form-group">
            <div class="input-group mb-3">
                <input minlength="5" type="text" class="form-control" placeholder='Cari pengaduan berdasarkan kode' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari pengaduan berdasarkan kode'" name="keyword" required>
                <div class="input-group-append">
                    <button class="btns" type="button"><i class="ti-search"></i></button>
                </div>
            </div>
        </div>
        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
    </form>
</aside>