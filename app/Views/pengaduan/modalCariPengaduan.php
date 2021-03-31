<div class="modal fade bs-example-modal-lg" id="modalCariPengaduan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Form Cari Pengaduan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="<?= base_url('pengaduan/cariPengaduan') ?>" method="get" id="form">
                <div class="modal-body">
                    <div class="wizard-content">
                        <section>
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cariPengaduan">Cari Berdasarkan NIK / Username :</label>
                                        <input type="text" class="form-control <?php if (session('errors.cariPengaduan')) : ?>is-invalid <?php endif ?>" name="cariPengaduan" id="cariPengaduan" required data-parsley-required-message="Harus diisi jika ingin mencari pengaduan" data-parsley-minlength="3" data-parsley-minlength-message="Terlalu singkat" data-parsley-trigger="keyup">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btncari">Cari</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>