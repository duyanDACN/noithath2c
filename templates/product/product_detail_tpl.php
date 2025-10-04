<div class="grid-pro-detail w-clear">
    <div class="left-pro-detail w-clear">
        <a id="Zoom-1" class="MagicZoom"
            data-options="zoomMode: on; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;"
            href="<?=THUMBS?>/1000x0x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>" title="<?=$row_detail['ten']?>"><img
                onerror="this.src='<?=THUMBS?>/540x540x2/assets/images/noimage.png';"
                src="<?=THUMBS?>/540x540x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>"
                alt="<?=$row_detail['ten']?>"></a>
        <?php if(isset($hinhanhsp) && count($hinhanhsp) > 0) { ?>
        <div class="gallery-thumb-pro">
            <p class="control-carousel prev-carousel prev-thumb-pro transition"><i class="fas fa-chevron-left"></i></p>
            <div class="owl-carousel owl-theme owl-thumb-pro">
                <a class="thumb-pro-detail" data-zoom-id="Zoom-1"
                    href="<?=THUMBS?>/1000x0x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>"
                    title="<?=$row_detail['ten']?>"><img
                        onerror="this.src='<?=THUMBS?>/540x540x2/assets/images/noimage.png';"
                        src="<?=THUMBS?>/540x540x1/<?=UPLOAD_PRODUCT_L.$row_detail['photo']?>"
                        alt="<?=$row_detail['ten']?>"></a>
                <?php for($i=0,$count=count($hinhanhsp); $i < $count; $i++) { ?>
                <a class="thumb-pro-detail" data-zoom-id="Zoom-1"
                    href="<?=THUMBS?>/1000x0x1/<?=UPLOAD_PRODUCT_L.$hinhanhsp[$i]['photo']?>"
                    title="<?=$row_detail['ten']?>">
                    <img onerror="this.src='<?=THUMBS?>/540x540x2/assets/images/noimage.png';"
                        src="<?=THUMBS?>/540x540x1/<?=UPLOAD_PRODUCT_L.$hinhanhsp[$i]['photo']?>"
                        alt="<?=$row_detail['ten']?>">
                </a>
                <?php } ?>
            </div>
            <p class="control-carousel next-carousel next-thumb-pro transition"><i class="fas fa-chevron-right"></i></p>
        </div>
        <?php } ?>
    </div>

    <div class="right-pro-detail w-clear">
        <h1 class="title-pro-detail"><?=$row_detail['ten']?></h1>
        <div class="social-plugin social-plugin-pro-detail w-clear">
            <!-- AddToAny BEGIN -->
            <div>
                <a href="https://www.addtoany.com/share#url=<?=$func->getCurrentPageURL()?>&amp;title=share"
                    target="_blank"><img src="https://static.addtoany.com/buttons/a2a.svg" width="32" height="32"
                        style="background-color:royalblue"></a>
                <a href="https://www.addtoany.com/add_to/facebook?linkurl=<?=$func->getCurrentPageURL()?>&amp;linkname=share"
                    target="_blank"><img src="https://static.addtoany.com/buttons/facebook.svg" width="32" height="32"
                        style="background-color:royalblue"></a>
                <a href="https://www.addtoany.com/add_to/twitter?linkurl=<?=$func->getCurrentPageURL()?>&amp;linkname=share"
                    target="_blank"><img src="https://static.addtoany.com/buttons/twitter.svg" width="32" height="32"
                        style="background-color:royalblue"></a>
                <a href="https://www.addtoany.com/add_to/email?linkurl=<?=$func->getCurrentPageURL()?>&amp;linkname=share"
                    target="_blank"><img src="https://static.addtoany.com/buttons/email.svg" width="32" height="32"
                        style="background-color:royalblue"></a>
            </div>
            <!-- AddToAny END -->
            <div class="zalo-share-button" data-href="<?=$func->getCurrentPageURL()?>"
                data-oaid="<?=($optsetting['oaidzalo']!='')?$optsetting['oaidzalo']:'579745863508352884'?>"
                data-layout="1" data-color="blue" data-customize=false></div>
        </div>
        <div class="desc-pro-detail">
            <?=(isset($row_detail['mota']) && $row_detail['mota'] != '') ? htmlspecialchars_decode($row_detail['mota']) : ''?>
        </div>
        <ul class="attr-pro-detail" data-type="<?=$type?>">
            <?php if(isset($row_detail['masp']) && $row_detail['masp'] != '') { ?>
            <li class="w-clear">
                <label class="attr-label-pro-detail"><?=masp?>:</label>
                <div class="attr-content-pro-detail"><?=$row_detail['masp']?></div>
            </li>
            <?php } ?>
            <?php /* if(isset($pro_brand['id']) && $pro_brand['id'] > 0) { ?>
            <li class="w-clear">
                <label class="attr-label-pro-detail"><?=thuonghieu?>:</label>
                <div class="attr-content-pro-detail"><a class="text-decoration-none" href="<?=$pro_brand[$sluglang]?>"
                        title="<?=$pro_brand['ten']?>"><?=$pro_brand['ten']?></a></div>
            </li>
            <?php } */?>
            <li class="w-clear">
                <label class="attr-label-pro-detail"><?=gia?>:</label>
                <div class="attr-content-pro-detail attr-price-pro-detail">
                    <?php if($row_detail['giamoi']) { ?>
                    <span class="price-new-pro-detail"><?=$func->format_money($row_detail['giamoi'])?></span>
                    <span class="price-old-pro-detail"><?=$func->format_money($row_detail['gia'])?></span>
                    <?php } else { ?>
                    <span
                        class="price-new-pro-detail"><?=($row_detail['gia']) ? $func->format_money($row_detail['gia']) : lienhe?></span>
                    <?php } ?>
                </div>
            </li>
            <?php /*<?php 
            $getnametygia = $func->get_search_index($v['id_tygia'],'tygia');
            $tygia = $getnametygia['ten'.$lang];
            ?>*/ ?>
            <?php /* if(isset($mau) && count($mau)>0){ ?>
            <li class="w-clear">
                <label class="attr-label-pro-detail d-block"><?=mausac?>:</label>
                <div class="attr-content-pro-detail d-block">
                    <?php for($i=0; $i<count($mau); $i++) { ?>
                    <?php if($mau[$i]['loaihienthi']==1) { ?>
                    <a class="color-pro-detail text-decoration-none" data-idpro="<?=$row_detail['id']?>">
                        <input style="background-image: url(<?=UPLOAD_COLOR_L.$mau[$i]['photo']?>)" type="radio"
                            value="<?=$mau[$i]['id']?>" name="color-pro-detail">
                    </a>
                    <?php } else { ?>
                    <a class="color-pro-detail text-decoration-none" data-idpro="<?=$row_detail['id']?>">
                        <input style="background-color: #<?=$mau[$i]['mau']?>" type="radio" value="<?=$mau[$i]['id']?>"
                            name="color-pro-detail">
                    </a>
                    <?php } ?>
                    <?php } ?>
                </div>
            </li>
            <?php } */?>
            <?php  if(isset($size) && count($size)>0){ ?>
            <li class="w-clear">
                <label class="attr-label-pro-detail d-block"><?=kichthuoc?>:</label>
                <div class="attr-content-pro-detail d-block">
                    <?php for($i=0; $i<count($size); $i++) { ?>
                    <a class="size-pro-detail text-decoration-none">
                        <input type="radio" value="<?=$size[$i]['id']?>" name="size-pro-detail">
                        <?=$size[$i]['ten']?>
                    </a>
                    <?php } ?>
                </div>
            </li>
            <?php } ?>
            <li class="w-clear">
                <label class="attr-label-pro-detail"><?=luotxem?>:</label>
                <div class="attr-content-pro-detail"><?=$row_detail['luotxem']?></div>
            </li>
            <?php if(isset($config['cart']['active']) && $config['cart']['active']==true) { ?>
            <li class="w-clear attr-label-pro-detail-cart">
                <div class="attr-content-pro-detail d-block">
                    <div class="quantity-pro-detail">
                        <span class="quantity-minus-pro-detail">-</span>
                        <input type="number" class="qty-pro" min="1" value="1" readonly />
                        <span class="quantity-plus-pro-detail">+</span>
                    </div>
                </div>

                <div class="cart-pro-detail">
                    <a class="transition addnow addcart text-decoration-none" data-id="<?=$row_detail['id']?>"
                        data-action="addnow"><span>Thêm vào giỏ hàng</span></a>
                    <?php /* <i class="fas fa-shopping-bag"></i>
                            <a class="transition buynow addcart text-decoration-none" data-id="<?=$row_detail['id']?>"
                    data-action="buynow"><i class="fas fa-shopping-bag"></i><span>Đặt hàng</span></a>
                    */ ?>
                </div>

            </li>
            <?php } ?>
        </ul>
    </div>

    <div class="clear"></div>

    <?php /*<div class="tags-pro-detail w-clear">
            <?php if(isset($pro_tags) && count($pro_tags) > 0) { ?>
    <?php for($i=0,$count=count($pro_tags); $i < $count; $i++) { ?>
    <a class="transition text-decoration-none w-clear" href="<?=$pro_tags[$i][$sluglang]?>"
        title="<?=$pro_tags[$i]['ten']?>"><i class="fas fa-tags"></i><?=$pro_tags[$i]['ten']?></a>
    <?php } ?>
    <?php } ?>
</div> */?>

<div class="clear"></div>

<?php if (empty($quickview)) { ?>
<div class="tabs-pro-detail">
    <ul class="ul-tabs-pro-detail w-clear">
        <li class="activeht transition" data-tabs="info-pro-detail"><?= thongtinsanpham ?></li>
    </ul>
    <div class="pro-detail-container">
        <div class="content-tabs-pro-detail info-pro-detail activeht opacity">
            <?= (isset($row_detail['noidung']) && $row_detail['noidung'] != '') ? htmlspecialchars_decode($row_detail['noidung']) : '' ?>
        </div>
    </div>
    <a class="pro-detail-btn-container" data-tab="info-pro-detail" href="javascript:void(0)">Xem thêm</a>
</div>
<?php } ?>
</div>

<?php if(isset($product) && count($product) > 0) { ?>
<div class="title-spcl">
    <h2><?=sanphamcungloai?></h2>
</div>
<div class="w-clear">
    <div class="w-clear position-relative">
        <p class="control-sanphamcungloai prev-sanphamcungloai transition"><i class="fas fa-chevron-left"></i></p>
        <div class="owl-carousel owl-theme owl-sanphamcungloai">
            <?php foreach ($product as $key => $v) { ?>
            <div class="box-sanpham-item">
                <div class="pic-product">
                    <div class="img-product">
                        <a class="text-decoration-none scale-img" href="<?=$v[$sluglang]?>"
                            title="<?=$v['ten']?>">
                            <img onerror="this.src='<?= THUMBS ?>/540x540x2/assets/images/noimage.png';"
                                src="<?= THUMBS ?>/540x540x1/<?=UPLOAD_PRODUCT_L.$v['photo']?>"
                                alt="<?=$v['ten']?>" />
                        </a>
                    </div>
                    <div class="content-product">
                        <h3 class="name-product">
                            <a class="text-decoration-none text-split text-split-2" href="<?=$v[$sluglang]?>"
                                title="<?=$v['ten']?>">
                                <?=$v['ten']?>
                            </a>
                        </h3>
                        <div class="price-product d-flex flex-wrap align-items-center justify-content-center">
                            <?php if($v['giakm']) { ?>
                            <span class="price-new"><?=$func->format_money($v['giamoi'])?></span>
                            <span class="price-old del"><?=$func->format_money($v['gia'])?></span>
                            <span class="price-per"><?='-'.$v['giakm'].'%'?></span>
                            <?php } else { ?>
                            <div><?=gia?>:&nbsp;</div><span
                                class="price-new"><?=($v['gia']) ? $func->format_money($v['gia']) : lienhe?></span>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <p class="control-sanphamcungloai next-sanphamcungloai transition"><i class="fas fa-chevron-right"></i></p>
    </div>
</div>
<div class="clear"></div>

<?php }?>