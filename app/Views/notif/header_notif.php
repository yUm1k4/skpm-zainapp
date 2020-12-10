<div class="user-notification list-notifikasi">
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
                            <a href="<?= $ln['id'] ?>" data-id="<?= $ln['id'] ?>">
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