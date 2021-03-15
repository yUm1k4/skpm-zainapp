<?= $this->extend('templates/index'); ?>

<?= $this->section('main-content'); ?>

<div class="header-left">
    <div class="menu-icon dw dw-menu"></div>
    <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
    <div class="header-search" style="display: block;">
        <form>
            <div class="form-group mb-0">
                <i class="dw dw-search2 search-icon"></i>
                <input type="text" class="form-control search-input" placeholder="Search Here">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="ion-arrow-down-c"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">From</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control form-control-sm form-control-line" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">To</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control form-control-sm form-control-line" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control form-control-sm form-control-line" type="text">
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
        <div class="row">
            <div class="col">
                <div class="title">
                    <h4><?= $title; ?></h4>
                </div>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-primary btn-icon-split tomboltambah">
                    <span class="icon">
                        <i class="dw dw-add"></i>
                    </span>
                    <span class="text">
                        Tambah Quotes
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="pb-20">
        <div class="table-responsive viewdata">
        </div>
    </div>
</div>

<!-- Modal -->
<div class="viewmodal" style="display: none;"></div>

<script type="text/javascript">
    function dataQuotes() {
        $.ajax({
            url: "<?= site_url('quotes/ambildata') ?>",
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
        dataQuotes();

        $('.tomboltambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('quotes/formtambah') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambah').modal('show');
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