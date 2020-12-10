<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <!-- <i class="dw dw-search2 search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Cari sesuatu.."> -->
                    <?= "<span>" . format_indo(date('Y-m-d')) . " - <span id='jam'></span>"; ?>
                </div>
            </form>
        </div>
    </div>
    <div class="header-right">
        <!-- Notif Info -->
        <div class="user-notification">
            <!-- .list-notifikasi ada di footer -->
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="<?= sizeof(list_notifikasi()) != 0 ? 'badge notification-active' : '' ?>"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <!-- <li>
                                </li> -->
                            <?php if (sizeof(list_notifikasi()) == 0) { ?>
                                <a href="#" class="text-center">
                                    <h6>Tidak ada Notifikasi</h6>
                                </a>
                            <?php }
                            foreach (list_notifikasi() as $ln) { ?>
                                <li>
                                    <a href="#" data-notifid="<?= $ln['id_notif'] ?>" data-userid="<?= $ln['id'] ?>" data-fullname="<?= xss($ln['fullname']) ?>" data-image="<?= $ln['user_image'] ?>" data-kode="<?= xss($ln['kode_pengaduan_ref']) ?>" data-tanggal="<?= format_indo($ln['tanggal']) ?>" data-isi="<?= limit_word($ln['isi_notif']) ?>" data-jenis="<?= $ln['jenis'] ?>">
                                        <img src="<?= base_url('/images/user-images/' . $ln['user_image']) ?>" alt="User Image">
                                        <div class="d-flex justify-content-between">
                                            <h3><?= xss(limit_word($ln['fullname'], 3)) ?></h3>
                                            <p><?= xss($ln['jenis']) ?></p>
                                        </div>
                                        <p><?= xss(limit_word($ln['isi_notif'], 10)) ?></p>
                                        <p><small><?= format_indo($ln['tanggal']) ?></small></p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Info -->
        <div class="user-info-dropdown mr-3">
            <div class="dropdown">
                <a class="dropdown-toggle" href="javascript:;" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="<?= base_url() ?>/images/admin-images/<?= user()->user_image ?>" alt="">
                    </span>
                    <span class="user-name"><?= user()->username; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="<?= base_url('/profile') ?>"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                    <a class="dropdown-item btn-logout" href="<?= base_url('logout') ?>"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>