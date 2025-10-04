<?php if (count($slider)) { ?>
    <div class="slideshow">
        <p class="control-slideshow prev-slideshow transition"><i class="fas fa-chevron-left"></i></p>
        <div class="owl-carousel owl-theme owl-slideshow">
            <?php for ($i = 0, $count = count($slider); $i < $count; $i++) { ?>
                <div style="position: relative;">
                    <div class="img-slide">
                        <a href="<?= $slider[$i]['link'] ?>" target="_blank" title="<?= $slider[$i]['ten'] ?>"><img onerror="this.src='<?= THUMBS ?>/1366x768x2/assets/images/noimage.png';" src="<?= THUMBS ?>/1366x768x1/<?= UPLOAD_PHOTO_L . $slider[$i]['photo'] ?>" alt="<?= $slider[$i]['ten'] ?>" title="<?= $slider[$i]['ten'] ?>" /></a>
                    </div>
                    <div class="content-silde">
                        <div class="center">
                            <div class="wrap-slide">
                                <span class="text-slide">Best Service For You</span>
                                <h3 class="name-slide text-split text-split-2"><?= $slider[$i]['ten'] ?></h3>
                                <div class="mtoa-slide text-split text-split-2"><?= htmlspecialchars_decode($slider[$i]['mota']) ?></div>
                                <div class="slide-btn">
                                    <a class="si-1 btn-id" href="<?= $slider[$i]['link'] ?>" target="_blank">Tư vấn miễn phí</a>
                                    <a class="si-2 btn-id" href="<?= $slider[$i]['link2'] ?>" target="_blank">Xem dự án</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <p class="control-slideshow next-slideshow transition"><i class="fas fa-chevron-right"></i></p>
    </div>
<?php } ?>