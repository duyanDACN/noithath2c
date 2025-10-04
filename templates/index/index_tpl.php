<?php if (count($duan)) { ?>
    <div class="main-duan animate__animated animate__delay-1s wow" style="visibility:hidden;">
        <div class="center">
            <div class="title-1">
                <p><img src="assets/images/i-1_03.png" alt=""> Dự án tiêu biểu</p>
                <h2>Công TRình đã Thi Công </h2>
                <a class="btn-in" href="du-an">Xem tất cả <img src="assets/images/i-in_03.png" alt=""></a>
            </div>
            <div class="duan">
                <div class="slick-da">
                    <?php foreach ($duan as $key => $v) { 
                        ?>
                        <div class="box-da">
                            <div class="pic-da">
                                <div class="img-da">
                                    <a class="text-decoration-none scale-img" href="<?= $v[$sluglang] ?>">
                                        <img onerror="this.src='<?= THUMBS ?>/360x504x2/assets/images/noimage.png';"
                                            src="<?= THUMBS ?>/360x504x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>"
                                            alt="<?= $v['ten'] ?>">
                                    </a>
                                </div>
                                <div class="wrap-da">
                                    <div class="content-da">
                                        <p class="text-split text-split-1"><?= $v['text'] ?></p>
                                        <h3 class="name-da"><a class="text-split text-split-2" href="<?= $v[$sluglang] ?>"><?= $v['ten'] ?></a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="list-duan">
                    <p class="slick-prev-da"><img src="assets/images/p1-da_03.png" alt=""></p>
                    <p class="slick-next-da"><img src="assets/images/n2-da_03.png" alt=""></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (count($giaiphap)) { ?>
    <div class="main-giaiphap">
        <div class="center d-flex justify-content-between flex-wrap">
            <div class="cot1-gp">
                <?php foreach ($giaiphap as $key => $v) { ?>
                    <div class="box-gp">
                        <div class="pic-gp">
                            <div class="img-gp">
                                <p class="text-decoration-none">
                                    <img onerror="this.src='assets/images/noimage.png';"
                                        src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>"
                                        alt="<?= $v['ten'] ?>">
                                </p>
                            </div>
                            <div class="content-gp">
                                <h3 class="text-split text-split-1"><?= $v['ten'] ?></h3>
                                <div class="mota-gp1 text-split text-split-2"><?= htmlspecialchars_decode($v['mota']) ?></div>
                                <a class="btn-gp" href="<?= $v['link'] ?>" target="_blank"><img src="assets/images/i-gp_03.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="cot2-gp">
                <div class="title-1">
                    <p><img src="assets/images/i-1_03.png" alt=""> Dịch vụ của chúng tôi</p>
                    <h2><?= $s_gp['ten'] ?></h2>
                </div>
                <div class="mota-gp"><?= htmlspecialchars_decode($s_gp['mota']) ?></div>
                <a class="btn-id" href="<?=$s_gp['link']?>" target="_blank">Thông tin chi tiết <img src="assets/images/i-xt_03.png" alt=""></a>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (!empty($gioithieu)) { ?>
    <div class="main-gioithieu">
        <div class="center-1366 d-flex justify-content-between flex-wrap">
            <div class="cot1-gt">
                <div class="title-1">
                    <p><img src="assets/images/i-1_03.png" alt=""> Giới thiệu về chúng tôi</p>
                    <h2>Giải Pháp Nội Thất & <br>
                    Xây Dựng Từ A–Z </h2>
                        
                </div>
                <div class="mota-gp"><?= htmlspecialchars_decode($gioithieu['mota']) ?></div>
                <a class="btn-id" href="gioi-thieu">Thông tin chi tiết <img src="assets/images/i-xt_03.png" alt=""></a>
            </div>
            <div class="cot2-gt">
                <p class="img-gt2 text-decoration-none scale-img">
                    <img onerror="this.src='<?= THUMBS ?>/452x552x2/assets/images/noimage.png';"
                        src="<?= THUMBS ?>/452x552x1/<?= UPLOAD_NEWS_L . $gioithieu['photo2'] ?>"
                        alt="<?= $gioithieu['ten'] ?>">
                </p>
                <p class="img-gt1 text-decoration-none scale-img">
                    <img onerror="this.src='<?= THUMBS ?>/424x502x2/assets/images/noimage.png';"
                        src="<?= THUMBS ?>/424x502x1/<?= UPLOAD_NEWS_L . $gioithieu['photo'] ?>"
                        alt="<?= $gioithieu['ten'] ?>">
                </p>
                <p class="img-gt3"><img src="assets/images/i-gt_03.png" alt=""></p>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (count($tintucnb)) { ?>
    <div class="main-tintuc">
        <div class="center">
            <div class="title-1">
                <p><img src="assets/images/i-1_03.png" alt=""> Đồng hành cùng bạn dựng xây tổ ấm</p>
                <h2>Tin tức chia sẻ </h2>
                <a class="btn-in" href="tin-tuc">Xem tất cả <img src="assets/images/i-in_03.png" alt=""></a>
            </div>
            <div class="slick-tt animate__animated animate__fadeIn wow" style="visibility:hidden;">
                <?php foreach ($tintucnb as $key => $v) { ?>
                    <div class="box-tt">
                        <div class="pic-tt">
                            <div class="img-tt">
                                <a class="text-decoration-none scale-img" href="<?= $v[$sluglang] ?>">
                                    <img onerror="this.src='<?= THUMBS ?>/392x252x2/assets/images/noimage.png';"
                                        src="<?= THUMBS ?>/392x252x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>"
                                        alt="<?= $v['ten'] ?>">
                                </a>
                            </div>
                            <div class="content-tt">
                                <?php
                                $days = [
                                    'Sunday' => 'Chủ Nhật',
                                    'Monday' => 'Thứ Hai',
                                    'Tuesday' => 'Thứ Ba',
                                    'Wednesday' => 'Thứ Tư',
                                    'Thursday' => 'Thứ Năm',
                                    'Friday' => 'Thứ Sáu',
                                    'Saturday' => 'Thứ Bảy'
                                ];

                                $today = date("l");
                                ?>
                                <h3 class="name-tt"><a class="text-split text-split-2" href="<?= $v[$sluglang] ?>"><?= $v['ten'] ?></a></h3>
                                <p class="tt-time"> <span><?= $days[date("l", $v['ngaytao'])] ?></span> | <span><?= date("d.m.Y", $v['ngaytao']) ?></span></p>
                                <p class="mota-tt text-split text-split-2"><?= $v['mota'] ?></p>
                                <a class="btn-tt" href="<?= $v[$sluglang] ?>">Xem chi tiết </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php /* if (count($tieuchi)) { ?>
<div class="main-taisao">
    <div class="center-918">
        <div class="title-ts">
            <h2>Chúng tôi có gì</h2>
            <p class="text-ts1">CÔNG TY CỔ PHẦN XÂY DỰNG VÀ THIẾT KẾ <span>H2C</span></p>
            <p class="text-ts2">Hân hạnh đồng hành cùng quý khách hàng trên hành trình xậy dựng tổ ấm Việt</p>
        </div>
        <div class="slick-ts animate__animated animate__fadeIn wow" style="visibility:hidden;">
            <?php foreach ($tieuchi as $key => $v) { ?>
                <div class="box-ts">
                    <div class="pic-ts">
                        <div class="content-ts">
                            <p><span class="ts-so">+</span> <span class="counter"><?= $v['text'] ?></span></p>
                            <h3 class="text-split text-split-1"><?= $v['ten'] ?></h3>
                        </div>
                        <div class="img-ts">
                            <p class="text-decoration-none">
                                <img style="max-width: 39px;" onerror="this.src='assets/images/noimage.png';"
                                    src="<?= UPLOAD_NEWS_L . $v['photo'] ?>"
                                    alt="<?= $v['ten'] ?>">
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } */?>
<?php if (count($doitac)) { ?>
    <div class="main-doitac">
        <div class="center">
            <div class="title-1">
                <p><img src="assets/images/i-1_03.png" alt=""> Đồng hành cùng bạn dựng xây tổ ấm</p>
                <h2>Đối tác </h2>
            </div>
            <div class="slick-dtac animate__animated animate__fadeIn wow" style="visibility:hidden;">
                <?php foreach ($doitac as $key => $v) { ?>
                    <div class="box-dtac">
                        <a class="text-decoration-none" href="<?= $v['link'] ?>" target="_blank"
                            title="<?= $v['ten'] ?>">
                            <img style="max-width: 192px;max-height: 122px; border-radius: 10px;" onerror="this.src='assets/images/noimage.png';"
                                src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>"
                                alt="<?= $v['ten'] ?>" />
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>