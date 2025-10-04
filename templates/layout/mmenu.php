<div id="menu-mobile">
    <nav id="mmenu">
        <ul>
        <li>
                <a class="transition <?php if ($com == '' || $com == 'index') echo 'active'; ?>" href="" title="<?= trangchu ?>"><?= trangchu ?></a>
            </li>
            <li>
                <a class="transition <?php if ($com == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu" title="<?= gioithieu ?>"><?= gioithieu ?></a>
            </li>
            <li>
                <a class="transition <?php if ($com == 'dich-vu-thiet-ke') echo 'active'; ?>" href="dich-vu-thiet-ke" title="Thiết kế">Thiết kế</a>
                <?php if (count($tklistmenu)) { ?>
                    <ul>
                        <?php for ($i = 0; $i < count($tklistmenu); $i++) {
                            $tkcatmenu = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, id from #_news_cat where id_list = ? and hienthi > 0 order by stt,id desc", array($tklistmenu[$i]['id'])); ?>
                            <li>
                                <a class="transition" title="<?= $tklistmenu[$i]['ten'] ?>" href="<?= $tklistmenu[$i][$sluglang] ?>"><span><?= $tklistmenu[$i]['ten'] ?></span></a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </li>
            <li>
                <a class="transition <?php if ($com == 'bao-gia') echo 'active'; ?>" href="bao-gia" title="Báo giá">Báo giá</a>
                <?php /* if (count($tclistmenu)) { ?>
                    <ul>
                        <?php for ($i = 0; $i < count($tclistmenu); $i++) {
                            $tccatmenu = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, id from #_news_cat where id_list = ? and hienthi > 0 order by stt,id desc", array($tclistmenu[$i]['id'])); ?>
                            <li>
                                <a class="transition" title="<?= $tclistmenu[$i]['ten'] ?>" href="<?= $tclistmenu[$i][$sluglang] ?>"><span><?= $tclistmenu[$i]['ten'] ?></span></a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } */?>
            </li>
            <li>
                <a class="transition <?php if ($com == 'du-an') echo 'active'; ?>" href="du-an" title="Dự án">Dự án</a>
                <?php if (count($ttlistmenu)) { ?>
                    <ul>
                        <?php for ($i = 0; $i < count($ttlistmenu); $i++) {
                            $ttcatmenu = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, id from #_news_cat where id_list = ? and hienthi > 0 order by stt,id desc", array($ttlistmenu[$i]['id'])); ?>
                            <li>
                                <a class="transition" title="<?= $ttlistmenu[$i]['ten'] ?>" href="<?= $ttlistmenu[$i][$sluglang] ?>"><span><?= $ttlistmenu[$i]['ten'] ?></span></a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </li>
            <li>
                <a class="transition <?php if ($com == 'tin-tuc') echo 'active'; ?>" href="tin-tuc" title="<?= tintuc ?>"><?= tintuc ?></a>
            </li>
            <li>
                <a class="transition <?php if ($com == 'lien-he') echo 'active'; ?>" href="lien-he" title="<?= lienhe ?>"><?= lienhe ?></a>
            </li>
        </ul>
    </nav>
</div>