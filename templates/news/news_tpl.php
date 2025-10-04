<?php $newsnb = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, mota$lang as mota, ngaytao, id, photo from #_news where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc", array($type));

?>
<div class="w-clear center">
<div class="title-main">
    <h1><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></h1>
    <p><?= $slogan['ten'] ?></p>
</div>

<div class="row-newss">
    <?php if (count($news) > 0) { ?>
        <?php foreach ($news as $key => $value) { ?>
            <div class="wrap-news">
                <div class="box-news">
                    <div class="pic-news">
                        <a class="text-decoration-none scale-img" href="<?= $value[$sluglang] ?>" title="<?= $value['ten'] ?>">
                            <img onerror="this.src='<?=THUMBS?>/392x530x2/assets/images/noimage.png';" src="<?=THUMBS?>/392x530x1/<?= UPLOAD_NEWS_L . $value['photo'] ?>" alt="<?= $value['ten'] ?>">
                        </a>
                    </div>
                    <div class="desc-box-news">
                        <h3 class="name-news">
                            <a class="text-decoration-none scale-img" href="<?= $value[$sluglang] ?>" title="<?= $value['ten'] ?>">
                                <?= $value['ten'] ?>
                            </a>
                        </h3>
                        <p class="desc-news text-split"><?= $value['mota'] ?></p>
                        <a href="<?= $value[$sluglang] ?>" class="btn-news"><?= xemthem ?></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
            <strong><?= khongtimthayketqua ?></strong>
        </div>
    <?php } ?>
</div>
<div class="w-clear"></div>
<div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
</div>
</div>


<style>
    .row-newss {
        display: flex;
        flex-wrap: wrap;
        margin: -10px;
    }

    .wrap-news {
        padding: 10px;
        width: calc(100% / 3);
    }

    .box-news {
        display: block;
        border: 1px solid #EFEFEF;
    }

    .pic-news {
        width: 100%;
    }

    .pic-news img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .name-news {
        color: #000;
        font-size: 18px;
        line-height: 25px;
        display: block;
        margin-bottom: 3px;
    }

    .name-news a {
        color: #000;
    }

    .name-news a:hover {
        color: var(--color-main);
    }

    .desc-box-news {
        padding: 4%;
    }

    .btn-news {
        color: #000;
        display: block;
        padding-top: 10px;
        border-top: 1px solid #EFEFEF;
        margin-top: 10px;
    }

    .btn-news:hover {
        color: var(--color-main)
    }

    .share {
        padding: 20px 10px 10px 15px;
        background: rgba(128, 128, 128, 0.15);
        margin-top: 15px;
        border-radius: 5px;
    }

    .share b {
        display: block;
        margin-bottom: 5px;
    }

    .news-hot-right .desc-news {
        font-size: 13px;
        line-height: 15px;
        margin-top: 4px;
    }

    .news-title-right {
        border-bottom: 1px solid #FDFDFD;
        position: relative;
        font-size: 24px;
        margin-top: 15px;
        margin-bottom: 20px;
    }

    .news-title-right span {
        display: inline-block;
        font-weight: 700;
        border-bottom: 2px solid var(--color-main);
        margin-bottom: -1px;
    }

    @media (max-width:767px) {
        .news-hot-right-content {
            display: flex;
            flex-wrap: wrap;
        }

        .news-hot-right {
            width: calc(50% - 5px);
        }

        .news-hot-right-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 0px -15px;
        }

        .news-hot-right {
            width: calc(50% - 0px);
            margin: 0px;
        }
    }
</style>