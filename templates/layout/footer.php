<div id="footer">
    <div class="cot1-footer">
        <div class="center d-flex flex-wrap align-items-start justify-content-between">
            <div class="footer-1">
                <?php if ($logo_f) { ?>
                    <div class="logo-f sss d-flex align-items-center">
                        <a href=""><img onerror="this.src='assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $logo_f['photo'] ?>" /></a>
                    </div>
                <?php } ?>
                <div class="footer-content-1"><?= htmlspecialchars_decode($footer['mota']) ?></div>
            </div>
            <div class="footer-2">
                <div class="footer-tit">Thông tin liên hệ</div>
                <div class="footer-content"><?= htmlspecialchars_decode($footer['noidung']) ?></div>
            </div>
            <div class="footer-3">
                <div class="footer-tit">Liên kết</div>
                <ul class="footer-list">
                    <li><a class="text-decoration-none" href="" title="<?= trangchu ?>"><?= trangchu ?></a></li>
                    <li><a class="text-decoration-none" href="gioi-thieu" title="<?= gioithieu ?>"><?= gioithieu ?></a></li>
                    <li><a class="text-decoration-none" href="dich-vu-thiet-ke" title="Dịch vụ thiết kế">Dịch vụ thiết kế</a></li>
                    <li><a class="text-decoration-none" href="dich-vu-thi-cong" title="Dịch vụ thi công">Dịch vụ thi công</a></li>
                    <li><a class="text-decoration-none" href="du-an" title="Dự án">Dự án</a></li>
                    <li><a class="text-decoration-none" href="tin-tuc" title="<?= tintuc ?>"><?= tintuc ?></a></li>
                    <li><a class="text-decoration-none" href="lien-he" title="<?= lienhe ?>"><?= lienhe ?></a></li>
                </ul>
            </div>
            <div class="footer-4">
                <div class="footer-tit">Mạng xã hội</div>
                <?php if (count($mxh) > 0) { ?>
                    <ul class="mxh footer-mxh">
                        <?php for ($i = 0, $count = count($mxh); $i < $count; $i++) { ?>
                            <li>
                                <a href="<?= $mxh[$i]['link'] ?>" target="_blank">
                                    <img style="max-width: 30px;" onerror="this.src='assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $mxh[$i]['photo'] ?>" alt="<?= $mxh[$i]['ten'] ?>">
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="cot2-footer">
        <div class="center d-flex justify-content-between flex-wrap">
            <div class="l-footer">
                <div class="footer-tit" style="margin-bottom: 6px;">Đăng ký nhận thông tin</div>
                <p>Nhanh tay để lại thông tin để được liên hệ tư vấn sớm nhất nhé!</p>
            </div>
            <div class="r-footer">
                <form class="form-newsletter validation-newsletter" novalidate method="post" action="" enctype="multipart/form-data">
                    <div class="newsletter-input">
                        <input type="email" class="form-control" id="email-newsletter" name="email-newsletter" placeholder="<?= nhapemail ?>" required />
                        <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                    </div>
                    <div class="newsletter-button">
                        <input type="submit" name="submit-newsletter" value="Gửi ngay" disabled>
                        <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="center d-flex flex-wrap align-items-center justify-content-center">
            <p class="copyright">Copyright © 2025 <span style="color: #fab517;text-transform: uppercase;"><?= $setting["ten$lang"] ?></span>. Design by <a href="https://vinasoftware.com.vn/">Vina Software (VNS)</a></p>
            <?php /* <ul class="statistic d-flex flex-wrap align-items-center justify-content-center">
                <li><?=dangonline?>: <?=$online?></li>
                <span>|</span>
                <li><?=trongtuan?>: <?=$counter['week']?></li>
                <span>|</span>
                <li><?=trongthang?>: <?=$counter['month']?></li>
                <span>|</span>
                <li><?=tongtruycap?>: <?=$counter['total']?></li>
            </ul>
            */ ?>
        </div>
    </div>
    <?php /*
    <div class="footer-map">
        <div class="center">
            <div class="title-map">
                <?php foreach ($chinhanh as $q => $w): ?>
                    <h2 class="click-map <?php if($q==0) echo 'active';?>" data-id='<?=$w['id']?>' ><?=$w['ten']?></h2>
                <?php endforeach ?>
            </div>
        </div>
        <div class="load-map"></div>
    </div>
    */ ?>
    <?php /* if($source=='index'){ 
        <?=$addons->setAddons('footer-map', 'footer-map', 10);?>
    } */ ?>
</div>