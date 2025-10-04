<?php 	$row_detail_2 = $d->rawQueryOne("select id, photo2 from #_news where id = ? and type = ? and noibat > 0 and hienthi > 0 limit 0,1",array($id,$type));?>
<?php if ($row_detail_2['photo2']) { ?>
    <div class="banner-del">
        <p class="text-decoration-none">
            <img onerror="this.src='assets/images/noimage.png';" src="<?= UPLOAD_NEWS_L . $row_detail_2['photo2'] ?>" alt="<?= $row_detail_2['ten'] ?>">
        </p>
    </div>
<?php } ?>
<div class="breadCrumbs"><div class="center"><?=$breadcrumbs?></div></div>