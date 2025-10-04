<?php
$linkSave = "index.php?com=photo&act=save_static&type=".$type;
$options = (isset($item['options']) && $item['options'] != '') ? json_decode($item['options'],true) : null;
?>
<!-- Main content -->
<section class="content">
    <form method="post" id="form-watermark" action="<?=$linkSave?>" enctype="multipart/form-data">
        <!-- Content Header -->
        <div class="content-header content-header-vns">
            <div class="container-fluid container-fluid-vns">
                <div class="card-fluid-vns">
                    <div class="breadcrumb-vns w-clear">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Quản lý hình ảnh - video</li>
                        </ol>
                    </div>
                    <div class="card-footer card-footer-detail-vns text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check">Lưu</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary">Làm lại</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-vns card-detail-vns text-sm">
            <div class="card-header-vns">
                <h3 class="card-title">Chi tiết <?=$config['photo']['photo_static'][$type]['title_main']?></h3>
            </div>
            <div class="card-body">
                <?php if(isset($config['photo']['photo_static'][$type]['images']) && $config['photo']['photo_static'][$type]['images'] == true) { ?>
                    <div class="form-group col-md-4 pr-0 pl-0">
                        <?php
                        $photoDetail = UPLOAD_PHOTO.@$item['photo'];
                        $dimension = "Width: ".$config['photo']['photo_static'][$type]['width']." px - Height: ".$config['photo']['photo_static'][$type]['height']." px (".$config['photo']['photo_static'][$type]['img_type'].")";
                        include TEMPLATE.LAYOUT."image.php";
                        ?>
                    </div>
                <?php } ?>
                
                <?php if (isset($config['photo']['photo_static'][$type]['video-file']) && $config['photo']['photo_static'][$type]['video-file'] == true) { ?>
                    <div class="form-group">
                        <label class="change-photo" for="video-file">
                            <p>Upload video:</p>
                            <div class="rounded">
                                <video id="myVideo" controls loop muted data-autoplay style="max-width:300px;">
                                    <source src="../<?= UPLOAD_FILE_L . $item['taptin'] ?>" type="video/mp4">
                                </video>
                                <strong>
                                    <b class="text-sm text-split"></b>
                                    <span class="btn btn-sm bg-gradient-success"><i class="fas fa-camera mr-2"></i>Chọn video</span>
                                </strong>
                            </div>
                        </label>
                        <strong class="d-block mt-2 mb-2 text-sm"><?php echo "File type: (" . $config['photo']['photo_static'][$type]['file_type'] . ")" ?></strong>
                        <div class="custom-file my-custom-file d-none">
                            <input type="file" class="custom-file-input" name="video-file" id="video-file">
                            <label class="custom-file-label" for="video-file">Chọn file</label>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if(isset($config['photo']['photo_static'][$type]['watermark-advanced']) && $config['photo']['photo_static'][$type]['watermark-advanced'] == true) { ?>
                    <?php
                    $tl = (isset($options) && $options != null && $options['watermark']['position'] == 1 || !isset($options['watermark']['position'])) ? 'checked' : '';
                    $tc = (isset($options) && $options != null && $options['watermark']['position'] == 2) ? 'checked' : '';
                    $tr = (isset($options) && $options != null && $options['watermark']['position'] == 3) ? 'checked' : '';
                    $mr = (isset($options) && $options != null && $options['watermark']['position'] == 4) ? 'checked' : '';
                    $br = (isset($options) && $options != null && $options['watermark']['position'] == 5) ? 'checked' : '';
                    $bc = (isset($options) && $options != null && $options['watermark']['position'] == 6) ? 'checked' : '';
                    $bl = (isset($options) && $options != null && $options['watermark']['position'] == 7) ? 'checked' : '';
                    $ml = (isset($options) && $options != null && $options['watermark']['position'] == 8) ? 'checked' : '';
                    $cc = (isset($options) && $options != null && $options['watermark']['position'] == 9) ? 'checked' : '';
                    $watermark = THUMBS.'/'.$config['photo']['photo_static'][$type]['thumb'].'/'.UPLOAD_PHOTO_L.@$item['photo'];
                    ?>
                    <div class="row">
                        <div class="col-xl-4 row">
                            <div class="form-group col-12">
                                <label>Vị trí đóng dấu:</label>
                                <div class="watermark-position rounded">
                                    <label for="tl">
                                        <input type="radio" name="data[options][watermark][position]" id="tl" value="1" <?=$tl?>>
                                        <img class="rounded" onerror="src='assets/images/noimage.png'" src="<?=($tl) ? $watermark : ''?>" alt="watermark-cover">
                                    </label>
                                    <label for="tc">
                                        <input type="radio" name="data[options][watermark][position]" id="tc" value="2" <?=$tc?>>
                                        <img class="rounded" onerror="src='assets/images/noimage.png'" src="<?=($tc) ? $watermark : ''?>" alt="watermark-cover">
                                    </label>
                                    <label for="tr">
                                        <input type="radio" name="data[options][watermark][position]" id="tr" value="3" <?=$tr?>>
                                        <img class="rounded" onerror="src='assets/images/noimage.png'" src="<?=($tr) ? $watermark : ''?>" alt="watermark-cover">
                                    </label>
                                    <label for="mr">
                                        <input type="radio" name="data[options][watermark][position]" id="mr" value="4" <?=$mr?>>
                                        <img class="rounded" onerror="src='assets/images/noimage.png'" src="<?=($mr) ? $watermark : ''?>" alt="watermark-cover">
                                    </label>
                                    <label for="br">
                                        <input type="radio" name="data[options][watermark][position]" id="br" value="5" <?=$br?>>
                                        <img class="rounded" onerror="src='assets/images/noimage.png'" src="<?=($br) ? $watermark : ''?>" alt="watermark-cover">
                                    </label>
                                    <label for="bc">
                                        <input type="radio" name="data[options][watermark][position]" id="bc" value="6" <?=$bc?>>
                                        <img class="rounded" onerror="src='assets/images/noimage.png'" src="<?=($bc) ? $watermark : ''?>" alt="watermark-cover">
                                    </label>
                                    <label for="bl">
                                        <input type="radio" name="data[options][watermark][position]" id="bl" value="7" <?=$bl?>>
                                        <img class="rounded" onerror="src='assets/images/noimage.png'" src="<?=($bl) ? $watermark : ''?>" alt="watermark-cover">
                                    </label>
                                    <label for="ml">
                                        <input type="radio" name="data[options][watermark][position]" id="ml" value="8" <?=$ml?>>
                                        <img class="rounded" onerror="src='assets/images/noimage.png'" src="<?=($ml) ? $watermark : ''?>" alt="watermark-cover">
                                    </label>
                                    <label for="cc">
                                        <input type="radio" name="data[options][watermark][position]" id="cc" value="9" <?=$cc?>>
                                        <img class="rounded" onerror="src='assets/images/noimage.png'" src="<?=($cc) ? $watermark : ''?>" alt="watermark-cover">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 row">
                            <?php /* ?>
                            <div class="form-group col-xl-12 col-sm-4">
                                <label>Độ trong suốt:</label>
                                <input type="text" class="form-control " name="data[options][watermark][opacity]" placeholder="70" value="<?=$options['watermark']['opacity']?>">
                            </div>
                            <?php */ ?>
                            <div class="form-group col-xl-12 col-sm-4">
                                <label>Tỉ lệ:</label>
                                <input type="text" class="form-control " name="data[options][watermark][per]"  placeholder="2" value="<?=(isset($options['watermark']['per']) && $options['watermark']['per'] != '') ? $options['watermark']['per'] : ''?>">
                            </div>
                            <div class="form-group col-xl-12 col-sm-4">
                                <label>Tỉ lệ < 300px:</label>
                                <input type="text" class="form-control " name="data[options][watermark][small_per]" placeholder="3" value="<?=(isset($options['watermark']['small_per']) && $options['watermark']['small_per'] != '') ? $options['watermark']['small_per'] : ''?>">
                            </div>
                            <div class="form-group col-xl-12 col-sm-4">
                                <label>Kích thước tối đa:</label>
                                <input type="text" class="form-control " name="data[options][watermark][max]" placeholder="600" value="<?=(isset($options['watermark']['max']) && $options['watermark']['max'] != '') ? $options['watermark']['max'] : ''?>">
                            </div>
                            <div class="form-group col-xl-12 col-sm-4">
                                <label>Kích thước tối thiểu:</label>
                                <input type="text" class="form-control " name="data[options][watermark][min]" placeholder="100" value="<?=(isset($options['watermark']['min']) && $options['watermark']['min'] != '') ? $options['watermark']['min'] : ''?>">
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm bg-gradient-success mb-3 text-dark" href="javascript:previewWatermark();"><i class="fas fa-photo-video mr-2"></i>Preivew</a>
                <?php } ?>
                <div class="row">
                    <?php if(isset($config['photo']['photo_static'][$type]['background']) && $config['photo']['photo_static'][$type]['background'] == true) { ?>
                        <div class="form-group col-md-3">
                            <label for="background_repeat">Tùy chọn lặp:</label>
                            <select id="background_repeat" name="data[options][background][repeat]" class="form-control select2">
                                <option value="0">Chọn thuộc tính</option>
                                <option <?php if(isset($options['background']['repeat']) && $options['background']['repeat']=='no-repeat') echo 'selected="selected"' ?> value="no-repeat">Không lặp lại</option>
                                <option <?php if(isset($options['background']['repeat']) && $options['background']['repeat']=='repeat') echo 'selected="selected"' ?> value="repeat">Lặp lại</option>
                                <option <?php if(isset($options['background']['repeat']) && $options['background']['repeat']=='repeat-x') echo 'selected="selected"' ?> value="repeat-x">Lặp lại theo chiều ngang</option>
                                <option <?php if(isset($options['background']['repeat']) && $options['background']['repeat']=='repeat-y') echo 'selected="selected"' ?> value="repeat-y">Lặp lại theo chiều dọc</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="background_size">Kích thước:</label>
                            <select id="background_size" name="data[options][background][size]" class="form-control select2">
                                <option value="0">Chọn thuộc tính</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='auto') echo 'selected="selected"' ?> value="auto">Auto</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='cover') echo 'selected="selected"' ?> value="cover">Cover</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='contain') echo 'selected="selected"' ?> value="contain">Contain</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='100% 100%') echo 'selected="selected"' ?> value="100% 100%">Toàn màn hình</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='100% auto') echo 'selected="selected"' ?> value="100% auto">Toàn màn hình theo chiều ngang</option>
                                <option <?php if(isset($options['background']['size']) && $options['background']['size']=='auto 100%') echo 'selected="selected"' ?> value="auto 100%">Toàn màn hình theo chiều dọc</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="background_position">Vị trí:</label>
                            <select id="background_position" name="data[options][background][position]" class="form-control select2">
                                <option value="0">Chọn thuộc tính</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='left top') echo 'selected="selected"' ?> value="left top">Canh Trái - Canh Trên</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='left bottom') echo 'selected="selected"' ?> value="left bottom">Canh Trái - Canh Dưới</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='left center') echo 'selected="selected"' ?> value="left center">Canh Trái - Canh Giữa</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='right top') echo 'selected="selected"' ?> value="right top">Canh Phải - Canh Trên</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='right bottom') echo 'selected="selected"' ?> value="right bottom">Canh Phải - Canh Dưới</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='right center') echo 'selected="selected"' ?> value="right center">Canh Phải - Canh Giữa</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='center top') echo 'selected="selected"' ?> value="center top">Canh Giữa - Canh Trên</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='center bottom') echo 'selected="selected"' ?> value="center bottom">Canh Giữa - Canh Dưới</option>
                                <option <?php if(isset($options['background']['position']) && $options['background']['position']=='center center') echo 'selected="selected"' ?> value="center center">Canh Giữa - Canh Giữa</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="background_attachment">Cố định:</label>
                            <select class="form-control" name="data[options][background][attachment]" id="background_attachment">
                                <option <?=(isset($options['background']['attachment']) && $options['background']['attachment']=='')?"selected":""?> value="0">Không cố định</option>
                                <option <?=(isset($options['background']['attachment']) && $options['background']['attachment']=='fixed')?"selected":""?> value="fixed">Cố định</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="background_color">Màu nền:</label>
                            <input type="text" class="form-control jscolor" name="data[options][background][color]" id="background_color" maxlength="7" value="<?=(isset($options['background']['color']) && $options['background']['color'] != '')?$options['background']['color']:'#000000'?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="loaihienthi">Loại hiển thị:</label>
                            <select class="form-control" name="data[options][background][loaihienthi]" id="loaihienthi">
                                <option value="0">Chọn tình trạng</option>
                                <option <?=(isset($options['background']['loaihienthi']) && $options['background']['loaihienthi']==1)?"selected":""?> value="1">Hình nền</option>
                                <option <?=(isset($options['background']['loaihienthi']) && $options['background']['loaihienthi']==0)?"selected":""?> value="0">Màu nền</option>
                            </select>
                        </div>
                    <?php } ?>
                    <?php if(isset($config['photo']['photo_static'][$type]['link']) && $config['photo']['photo_static'][$type]['link'] == true) { ?>
                        <div class="form-group col-md-6">
                            <label for="link">Link:</label>
                            <input type="text" class="form-control" name="data[link]" id="link" placeholder="Link" value="<?=@$item['link']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['photo']['photo_static'][$type]['video']) && $config['photo']['photo_static'][$type]['video'] == true) { ?>
                        <div class="form-group col-md-6">
                            <label for="link_video">Video:</label>
                            <input type="text" class="form-control" name="data[link_video]" id="link_video" placeholder="Video" value="<?=@$item['link_video']?>">
                        </div>
                    <?php } ?>
                </div>


                <div class="card card-outline card-outline-tabs">
                    <?php if(
                        (isset($config['photo']['photo_static'][$type]['tieude']) && $config['photo']['photo_static'][$type]['tieude'] == true) || 
                        (isset($config['photo']['photo_static'][$type]['mota']) && $config['photo']['photo_static'][$type]['mota'] == true) || 
                        (isset($config['photo']['photo_static'][$type]['noidung']) && $config['photo']['photo_static'][$type]['noidung'] == true)
                    ) { ?>
                        <div class="card-article">
                            <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                <?php foreach($config['website']['lang'] as $k => $v) { ?>
                                    <div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-lang-<?=$k?>" role="tabpanel" aria-labelledby="tabs-lang">
                                        <?php if((isset($config['photo']['photo_static'][$type]['tieude']) && $config['photo']['photo_static'][$type]['tieude'] == true)) { ?>
                                            <div class="form-group">
                                                <label for="ten<?=$k?>">Tiêu đề (<?=$k?>):</label>
                                                <input type="text" class="form-control" name="data[ten<?=$k?>]" id="ten<?=$k?>" placeholder="Tiêu đề (<?=$k?>)" value="<?=@$item['ten'.$k]?>">
                                            </div>
                                        <?php } ?>
                                        <?php if((isset($config['photo']['photo_static'][$type]['mota']) && $config['photo']['photo_static'][$type]['mota'] == true)) { ?>
                                            <div class="form-group">
                                                <label for="mota<?=$k?>">Mô tả (<?=$k?>):</label>
                                                <textarea class="form-control <?=((isset($config['photo']['photo_static'][$type]['mota_cke']) && $config['photo']['photo_static'][$type]['mota_cke'] == true))?'form-control-ckeditor':''?>" name="data[mota<?=$k?>]" id="mota<?=$k?>" rows="5" placeholder="Mô tả (<?=$k?>)"><?=htmlspecialchars_decode(@$item['mota'.$k])?></textarea>
                                            </div>
                                        <?php } ?>
                                        <?php if((isset($config['photo']['photo_static'][$type]['noidung']) && $config['photo']['photo_static'][$type]['noidung'] == true)) { ?>
                                            <div class="form-group">
                                                <label for="noidung<?=$k?>">Nội dung (<?=$k?>):</label>
                                                <textarea class="form-control <?=((isset($config['photo']['photo_static'][$type]['noidung_cke']) && $config['photo']['photo_static'][$type]['noidung_cke'] == true))?'form-control-ckeditor':''?>" name="data[noidung<?=$k?>]" id="noidung<?=$k?>" rows="5" placeholder="Nội dung (<?=$k?>)"><?=htmlspecialchars_decode(@$item['noidung'.$k])?></textarea>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row-form-group mt-1">
                        <div class="form-group">
                            <label for="hienthi" class="d-inline-block align-middle mb-0 mr-2">Hiển thị</label>
                            <div class="custom-control custom-checkbox d-inline-block align-middle">
                                <input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]" id="hienthi-checkbox" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                                <label for="hienthi-checkbox" class="click-checkbox <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>"></label>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </form>
</section>