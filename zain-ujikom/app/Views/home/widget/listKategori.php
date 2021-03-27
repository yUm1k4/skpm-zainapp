<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title">List Kategori</h4>
    <ul class="list cat-list">
        <?php foreach ($listKategori as $lk) { ?>
            <li>
                <a href="javascript:;" class="d-flex">
                    <p><?= $lk->nama_kategori ?></p>
                </a>
            </li>
        <?php } ?>
    </ul>
</aside>