<?php
$linkMan = "index.php?com=photo&act=man_photo&type=".$type."&p=".$curPage;
$linkSave = "index.php?com=photo&act=save_photo&type=".$type."&p=".$curPage;

if(isset($config['photo']['man_photo'][$type]['images_photo']) && $config['photo']['man_photo'][$type]['images_photo'] == true)
{
    $colLeft = "col-xl-8";
    $colRight = "col-xl-4";
}
else
{
    $colLeft = "col-12";
    $colRight = "d-none";
}
?>

<!-- Main content -->
<section class="content">
    <form method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <!-- Content Header -->
        <div class="content-header content-header-vns">
            <div class="container-fluid container-fluid-vns">
                <div class="card-fluid-vns">
                    <div class="breadcrumb-vns w-clear">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item"><a href="<?=$linkMan?>" title="<?=$config['photo']['man_photo'][$type]['title_main_photo']?>">Quản lý <?=$config['photo']['man_photo'][$type]['title_main_photo']?></a></li>
                            <li class="breadcrumb-item active">Cập nhật <?=$config['photo']['man_photo'][$type]['title_main_photo']?></li>
                        </ol>
                    </div>
                    <div class="card-footer card-footer-detail-vns text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check">Lưu</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary">Làm lại</button>
                        <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát">Thoát</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
           <div class="<?=$colLeft?>">
            <div class="card-header-vns">
                <div class="flex-card-slug">
                    <div class="title-card-slug">
                        <h3 class="card-title">Chi tiết <?=$config['photo']['man_photo'][$type]['title_main_photo']?></h3>
                    </div>
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                            <?php foreach($config['website']['lang'] as $k => $v) { ?>
                                <li class="nav-item">
                                    <a class="nav-link <?=($k=='vi')?'active':''?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?=$k?>" role="tab" aria-controls="tabs-lang-<?=$k?>" aria-selected="true"><?=$v?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card card-vns-detail text-sm">
                <div class="card-body">
                    <?php if(isset($config['photo']['man_photo'][$type]['link_photo']) && $config['photo']['man_photo'][$type]['link_photo'] == true) { ?>
                        <div class="form-group">
                            <label for="link">Link:</label>
                            <input type="text" class="form-control" name="data[link]" id="link" placeholder="Link" value="<?=@$item['link']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['photo']['man_photo'][$type]['link2_photo']) && $config['photo']['man_photo'][$type]['link2_photo'] == true) { ?>
                        <div class="form-group">
                            <label for="link2">Link 2:</label>
                            <input type="text" class="form-control" name="data[link2]" id="link2" placeholder="Link 2" value="<?=@$item['link2']?>">
                        </div>
                    <?php } ?>
                    <?php if(isset($config['photo']['man_photo'][$type]['video_photo']) && $config['photo']['man_photo'][$type]['video_photo'] == true) { ?>
                        <div class="form-group">
                            <label for="link_video">Video:</label>
                            <input type="text" class="form-control" name="data[link_video]" id="link_video" onchange="youtubePreview(this.value,'#loadVideo');" placeholder="Video" value="<?=@$item['link_video']?>">
                        </div>
                        <div class="form-group">
                            <label for="link_video">Video preview:</label>
                            <div><iframe id="loadVideo" width="250" src="//www.youtube.com/embed/<?=$func->getYoutube($item['link_video'])?>" <?=(@$item["link_video"] == '')?"height='0'":"height='150'";?> frameborder="0" allowfullscreen></iframe></div>
                        </div>
                    <?php } ?>

                    <?php if(isset($config['photo']['man_photo'][$type]['video-file']) && $config['photo']['man_photo'][$type]['video-file'] == true) {?>
                        <div class="form-group">
                            <label class="change-photo" for="video-file-<?=$i?>">
                                <p>Upload video:</p>
                                <div class="rounded">
                                    <video id="myVideo" controls loop muted data-autoplay style="max-width:300px;">
                                        <source src="../<?=UPLOAD_FILE_L.$item['taptin']?>" type="video/mp4" >
                                    </video>
                                    <strong>
                                        <b class="text-sm text-split"></b>
                                        <span class="btn btn-sm bg-gradient-success"><i class="fas fa-camera mr-2"></i>Chọn video</span>
                                    </strong>
                                </div>
                            </label>
                            <strong class="d-block mt-2 mb-2 text-sm"><?php echo "File type: (".$config['photo']['man_photo'][$type]['file_type'].")" ?></strong>
                            <div class="custom-file my-custom-file d-none">
                                <input type="file" class="custom-file-input" name="video-file-<?=$i?>" id="video-file-<?=$i?>">
                                <label class="custom-file-label" for="video-file-<?=$i?>">Chọn file</label>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <?php if(
                        (isset($config['photo']['man_photo'][$type]['tieude_photo']) && $config['photo']['man_photo'][$type]['tieude_photo'] == true) || 
                        (isset($config['photo']['man_photo'][$type]['mota_photo']) && $config['photo']['man_photo'][$type]['mota_photo'] == true) || 
                        (isset($config['photo']['man_photo'][$type]['noidung_photo']) && $config['photo']['man_photo'][$type]['noidung_photo'] == true)
                    ) { ?>
                        <div class="card card-outline card-outline-tabs">
                            <div class="card-article">
                                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                    <?php foreach($config['website']['lang'] as $k => $v) { ?>
                                        <div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-lang-<?=$k?>" role="tabpanel" aria-labelledby="tabs-lang">
                                            <?php if(isset($config['photo']['man_photo'][$type]['tieude_photo']) && $config['photo']['man_photo'][$type]['tieude_photo'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="ten<?=$k?>">Tiêu đề (<?=$k?>):</label>
                                                    <input type="text" class="form-control" name="data[ten<?=$k?>]" id="ten<?=$k?>" placeholder="Tiêu đề (<?=$k?>)" value="<?=@$item['ten'.$k]?>">
                                                </div>
                                            <?php } ?>
                                            <?php if(isset($config['photo']['man_photo'][$type]['mota_photo']) && $config['photo']['man_photo'][$type]['mota_photo'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="mota<?=$k?>">Mô tả (<?=$k?>):</label>
                                                    <textarea class="form-control <?=(isset($config['photo']['man_photo'][$type]['mota_cke_photo']) && $config['photo']['man_photo'][$type]['mota_cke_photo'] == true)?'form-control-ckeditor':''?>" name="data[mota<?=$k?>]" id="mota<?=$k?>" rows="5" placeholder="Mô tả (<?=$k?>)"><?=htmlspecialchars_decode(@$item['mota'.$k])?></textarea>
                                                </div>
                                            <?php } ?>
                                            <?php if(isset($config['photo']['man_photo'][$type]['noidung_photo']) && $config['photo']['man_photo'][$type]['noidung_photo'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="noidung<?=$k?>">Nội dung (<?=$k?>):</label>
                                                    <textarea class="form-control <?=(isset($config['photo']['man_photo'][$type]['noidung_cke_photo']) && $config['photo']['man_photo'][$type]['noidung_cke_photo'] == true)?'form-control-ckeditor':''?>" name="data[noidung<?=$k?>]" id="noidung<?=$k?>" rows="5" placeholder="Nội dung (<?=$k?>)"><?=htmlspecialchars_decode(@$item['noidung'.$k])?></textarea>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row-form-group mt-1">
                        <div class="form-group">
                            <label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự</label>
                            <input type="number" class="form-control-mini d-inline-block align-middle" min="0" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?=isset($item['stt']) ? $item['stt'] : 1?>">
                        </div>
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
        <div class="<?=$colRight?> mgt-35">
            <div class="card card-primary text-sm">
                <div class="card-body">
                    <div class="card-header-right">
                        <h3 class="card-title">Hình ảnh <?=$config['photo']['man_photo'][$type]['title_main_photo']?></h3>
                    </div>
                    <?php 
                    $photoDetail = UPLOAD_PHOTO.@$item['photo'];
                    $dimension = "Width: ".$config['photo']['man_photo'][$type]['width_photo']." px - Height: ".$config['photo']['man_photo'][$type]['height_photo']." px (".$config['photo']['man_photo'][$type]['img_type_photo'].")";
                    include TEMPLATE.LAYOUT."image.php";
                    ?>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
</form>
</section>