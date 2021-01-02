<?= $this->extend('home/templates/index'); ?>

<?= $this->section('my-css'); ?>
<style>
    .single-post-area .blog-author {
        margin-top: 0px;
    }

    @media (max-width: 767px) {
        .single-post-area .blog-author h4 {
            font-size: 15px;
        }
    }

    @media (max-width: 768px) {
        .section-padding {
            padding-top: 80px;
        }

    }

    @media only screen and (min-width: 426px) and (max-width: 768px) {
        .single-post-area .blog-author img {
            width: 150px !important;
            height: 150px !important;
        }
    }

    @media (max-width: 425px) {
        form label {
            font-weight: 400;
        }

        .single-post-area .blog-author img {
            width: 100px !important;
            height: 100px !important;
            margin-bottom: 20px;
        }
    }

    label {
        font-weight: 600;
        color: #4043bc;
    }

    .single-post-area .blog-author img {
        width: 200px;
        height: 200px;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!--================User Profile Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                <div class="blog-author">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <div class="d-flex justify-content-between">
                                <h4>Edit <?= xss(user()->fullname); ?></h4>
                                <div>
                                    <a href="<?= base_url('user-profile/') ?>">
                                        <h4 href="#" class="text-biru-gelap"><i class="fa fa-arrow-left"></i> Kembali</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="<?= base_url('/user-profile/update/' . user()->id) ?>" method="POST" class="mt-3" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <input type="hidden" name="profilLama" value="<?= user()->user_image ?>">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Foto Profil :</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url() ?>/images/user-images/<?= user()->user_image ?>" class="img-thumbnail img-preview">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input <?php if (session('errors.user_image')) : ?>is-invalid <?php endif ?>" name="user_image" id="user_image" onchange="preViewImg()">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.user_image') ?>
                                                </div>
                                                <label class="custom-file-label" for="user_image">Ganti Foto Profil?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Username :</label>
                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid <?php endif ?>" name="username" value="<?= (old('username')) ? old('username') : user()->username ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.username') ?>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Alamat Email :</label>
                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid <?php endif ?>" name="email" value="<?= (old('email')) ? old('email') : user()->email ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Nama Lengkap :</label>
                                <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid <?php endif ?>" name="fullname" value="<?= user()->fullname ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.fullname') ?>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>No Induk Kependudukan :</label>
                                <input type="number" class="form-control <?php if (session('errors.nik')) : ?>is-invalid <?php endif ?>" name="nik" value="<?= (old('nik')) ? old('nik') : user()->nik ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.nik') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Nomor Handphone :</label>
                                <input type="text" class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid <?php endif ?>" name="no_hp" value="<?= user()->no_hp ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.no_hp') ?>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Alamat Lengkap :</label>
                                <input type="text" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid <?php endif ?>" name="alamat" value="<?= user()->alamat ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.alamat') ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 justify-content-start">
                                <button type="submit" class="button button-contactForm boxed-btn">Edit Data</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================ User Profile Area end =================-->

<script>
    // buat function lalu di panggil di viewnya, dan jalankan sebuah event onchange
    function preViewImg() {
        // ambil elemen yg nama id nya sampul
        const profil = document.querySelector('#user_image');
        // ambil elemen label yg nama class nya custom-file-label
        const profilLabel = document.querySelector('.custom-file-label');
        // ambil elemen image nya
        const imgPreview = document.querySelector('.img-preview');

        // === Ini utk tulisan labelnya
        // ambil profilLabel, trus textContent nya (isi nya) di ambil dari files profil yg diupload, index ke 0, ambil namanya
        profilLabel.textContent = profil.files[0].name;

        // === Ini utk mengganti Preview
        // ini adlh variabel baru utk ngambil file yg diupload
        const fileProfil = new FileReader();
        // lalu ambil alamat penyimpanannya, trus ambil nama file utk di simpan ke gambarya
        fileProfil.readAsDataURL(profil.files[0]);

        // ketika file sumpul ini unload, jalankan function yg mengirimkan event
        fileProfil.onload = function(e) {
            // si image preview, source nya diganti dgn gambar yg baru di upload di atas
            imgPreview.src = e.target.result;
        }

    }
</script>

<?= $this->endSection() ?>