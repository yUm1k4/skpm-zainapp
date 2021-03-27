<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/vendors/parsley/custom.css">

<?php if (user() == true) : ?>
    <aside class="single_sidebar_widget newsletter_widget">
        <h4 class="widget_title mb-3">Subscribe</h4>
        <p>Untuk Mendapatkan Info Terbaru</p>
        <form action="<?= base_url('subscribe-email/' . user()->id . '/' . user()->username) ?>" method="POST" id="form">
            <div class="form-group">
                <div class="input-group">

                    <input type="email" minlength="10" class="form-control <?php if (session('errors.subEmail')) : ?>is-invalid<?php endif ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Email'" placeholder='Alamat Email' name="subEmail" required data-parsley-required-message="Masukkan alamat email" data-parsley-minlength="11" data-parsley-minlength-message="Email terlalu singkat" data-parsley-trigger="keyup" data-parsley-type="email" data-parsley-type-message="Email tidak valid" data-parsley-errors-container="#errSub">
                    <div class="invalid-feedback mt-3">
                        <?= session('errors.subEmail') ?>
                    </div>
                </div>
                <div id="errSub">
                </div>
            </div>
            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Subscribe</button>
        </form>
    </aside>
<?php else : ?>

<?php endif; ?>

<script src="<?= base_url() ?>/vendors/parsley/parsley.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>