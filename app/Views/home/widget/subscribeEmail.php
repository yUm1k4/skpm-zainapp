<aside class="single_sidebar_widget newsletter_widget">
    <h4 class="widget_title mb-3">Subscribe</h4>
    <p>Untuk Mendapatkan Info Terbaru</p>
    <form action="<?= base_url('subscribe-email/' . user()->id . '/' . user()->username) ?>" method="POST">
        <div class="form-group">
            <input type="email" minlength="10" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Email'" placeholder='Alamat Email' name="email">
            <div class="invalid-feedback mt-3">
                <?= session('errors.email') ?>
            </div>
        </div>
        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Subscribe</button>
    </form>
</aside>