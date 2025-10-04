<?php
if($act=="add") $labelAct = "Thêm mới";
else if($act=="edit") $labelAct = "Chỉnh sửa";
else if($act=="copy")  $labelAct = "Sao chép";

$linkMan = "index.php?com=news&act=man&type=".$type."&p=".$curPage;
if($act=='add') $linkFilter = "index.php?com=news&act=add&type=".$type."&p=".$curPage;
else if($act=='edit') $linkFilter = "index.php?com=news&act=edit&type=".$type."&p=".$curPage."&id=".$id;
if($act=="copy") $linkSave = "index.php?com=news&act=save_copy&type=".$type."&p=".$curPage;
else $linkSave = "index.php?com=news&act=save&type=".$type."&p=".$curPage;

/* Check cols */
if(isset($config['news'][$type]['gallery']) && count($config['news'][$type]['gallery']) > 0)
{
    foreach($config['news'][$type]['gallery'] as $key => $value)
    {
        if($key == $type)
        {
            $flagGallery = true;
            break;
        }
    }
}

if(
    (isset($config['news'][$type]['dropdown']) && $config['news'][$type]['dropdown'] == true) || 
    (isset($config['news'][$type]['tags']) && $config['news'][$type]['tags'] == true) || 
    (isset($config['news'][$type]['images']) && $config['news'][$type]['images'] == true))
{
    $colLeft = "col-xl-12";
    $colRight = "col-xl-12";
}
else
{
    $colLeft = "col-12";
    $colRight = "d-none";   
}
?>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <!-- Content Header -->
        <div class="content-header content-header-vns">
            <div class="container-fluid container-fluid-vns">
                <div class="card-fluid-vns">
                    <div class="breadcrumb-vns w-clear">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active"><?=$labelAct?> <?=$config['news'][$type]['title_main']?></li>
                        </ol>
                    </div>
                    <div class="card-footer card-footer-detail-vns text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check">Lưu</button>
                        <button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here">Lưu tại trang</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary">Làm lại</button>
                        <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát">Thoát</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="<?=$colRight?>">
                <?php if(
                    (isset($config['news'][$type]['dropdown']) && $config['news'][$type]['dropdown'] == true) || 
                    (isset($config['news'][$type]['tags']) && $config['news'][$type]['tags'] == true)
                ) { ?>
                    <div class="card card-primary text-sm">
                        <div class="card-body">
                            <div class="form-group-category row">
                                <?php if(isset($config['news'][$type]['dropdown']) && $config['news'][$type]['dropdown'] == true) { ?>
                                    <?php if(isset($config['news'][$type]['list']) && $config['news'][$type]['list'] == true) { ?>
                                        <div class="form-group col-xl-6 col-sm-4">
                                            <label class="d-block" for="id_list">Danh mục cấp 1:</label>
                                            <?=$func->get_ajax_category('news', 'list', $type)?>
                                        </div>
                                    <?php } ?>
                                    <?php if(isset($config['news'][$type]['cat']) && $config['news'][$type]['cat'] == true) { ?>
                                        <div class="form-group col-xl-6 col-sm-4">
                                            <label class="d-block" for="id_cat">Danh mục cấp 2:</label>
                                            <?=$func->get_ajax_category('news', 'cat', $type)?>
                                        </div>
                                    <?php } ?>
                                    <?php if(isset($config['news'][$type]['item']) && $config['news'][$type]['item'] == true) { ?>
                                        <div class="form-group col-xl-6 col-sm-4">
                                            <label class="d-block" for="id_item">Danh mục cấp 3:</label>
                                            <?=$func->get_ajax_category('news', 'item', $type)?>
                                        </div>
                                    <?php } ?>
                                    <?php if(isset($config['news'][$type]['sub']) && $config['news'][$type]['sub'] == true) { ?>
                                        <div class="form-group col-xl-6 col-sm-4">
                                            <label class="d-block" for="id_sub">Danh mục cấp 4:</label>
                                            <?=$func->get_ajax_category('news', 'sub', $type)?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <?php if(isset($config['news'][$type]['tags']) && $config['news'][$type]['tags'] == true) { ?>
                                    <div class="form-group col-xl-6 col-sm-4">
                                        <label class="d-block" for="id_tags">Danh mục tags:</label>
                                        <?=$func->get_tags(@$item['id'], 'tags_group', 'news', $type)?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="<?=$colLeft?>">
                <?php
                if(isset($config['news'][$type]['slug']) && $config['news'][$type]['slug'] == true)
                {
                    $slugchange = ($act=='edit') ? 1 : 0;
                    $copy = ($act!='copy') ? 0 : 1;
                    include TEMPLATE.LAYOUT."slug.php";
                }
                ?>
                <div class="card-header-vns">
                    <div class="flex-card-slug">
                        <div class="title-card-slug">
                            <h3 class="card-title">Nội dung <?=$config['news'][$type]['title_main']?></h3>
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
                        <div class="card card-outline card-outline-tabs">
                            <div class="card-article">
                                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                    <?php foreach($config['website']['lang'] as $k => $v) { ?>
                                        <div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-lang-<?=$k?>" role="tabpanel" aria-labelledby="tabs-lang">
                                            <div class="form-group">
                                                <label for="ten<?=$k?>">Tiêu đề (<?=$k?>):</label>
                                                <input type="text" class="form-control for-seo" name="data[ten<?=$k?>]" id="ten<?=$k?>" placeholder="Tiêu đề (<?=$k?>)" value="<?=@$item['ten'.$k]?>" <?=($k=='vi')?'required':''?>>
                                            </div>
                                            <?php if(isset($config['news'][$type]['text']) && $config['news'][$type]['text'] == true) { ?>
												<div class="form-group">
													<label for="text<?=$k?>">text:</label>
													<input type="text" class="form-control for-seo" name="data[text<?=$k?>]" placeholder="text:" value="<?=@$item['text'.$k]?>">
												</div>
											<?php }?>
                                            <?php if(isset($config['news'][$type]['mota']) && $config['news'][$type]['mota'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="mota<?=$k?>">Mô tả (<?=$k?>):</label>
                                                    <textarea class="form-control for-seo <?=(isset($config['news'][$type]['mota_cke']) && $config['news'][$type]['mota_cke'] == true)?'form-control-ckeditor':''?>" name="data[mota<?=$k?>]" id="mota<?=$k?>" rows="5" placeholder="Mô tả (<?=$k?>)"><?=htmlspecialchars_decode(@$item['mota'.$k])?></textarea>
                                                </div>
                                            <?php } ?>
                                            <?php if(isset($config['news'][$type]['noidung']) && $config['news'][$type]['noidung'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="noidung<?=$k?>">Nội dung (<?=$k?>):</label>
                                                    <textarea class="form-control for-seo <?=(isset($config['news'][$type]['noidung_cke']) && $config['news'][$type]['noidung_cke'] == true)?'form-control-ckeditor':''?>" name="data[noidung<?=$k?>]" id="noidung<?=$k?>" rows="5" placeholder="Nội dung (<?=$k?>)"><?=htmlspecialchars_decode(@$item['noidung'.$k])?></textarea>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(isset($config['news'][$type]['images']) && $config['news'][$type]['images'] == true) { ?>
                    <div class="card card-primary text-sm">
                        <div class="card-body">
                            <div class="card-header-right">
                                <h3 class="card-title">Hình ảnh <?=$config['news'][$type]['title_main']?></h3>
                            </div>
                            <?php
                            $photoDetail = ($act != 'copy') ? UPLOAD_NEWS.@$item['photo'] : '';
                            $dimension = "Width: ".$config['news'][$type]['width']." px - Height: ".$config['news'][$type]['height']." px (".$config['news'][$type]['img_type'].")";
                            include TEMPLATE.LAYOUT."image.php";
                            ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($config['news'][$type]['images2']) && $config['news'][$type]['images2'] == true) { ?>
                    <div class="card card-primary text-sm">
                        <div class="card-body">
                            <div class="card-header-right">
                                <h3 class="card-title">Hình ảnh 2 <?=$config['news'][$type]['title_main']?></h3>
                            </div>
                            <?php
                            $photoDetail = ($act != 'copy') ? UPLOAD_NEWS.@$item['photo2'] : '';
                            $dimension = "Width 2: ".$config['news'][$type]['width2']." px - Height 2: ".$config['news'][$type]['height2']." px (".$config['news'][$type]['img_type'].")";
                            include TEMPLATE.LAYOUT."image2.php";
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
        <?php if(isset($flagGallery) && $flagGallery == true) { ?>
            <div class="card card-vns card-vns-detail text-sm">
                <div class="card-header-vns">
                    <h3 class="card-title">Bộ sưu tập <?=$config['news'][$type]['title_main']?></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="filer-gallery" class="label-filer-gallery mb-3">Album hình: (<?=$config['news'][$type]['gallery'][$key]['img_type_photo']?>)</label>
                        <input type="file" name="files[]" id="filer-gallery" multiple="multiple">
                        <input type="hidden" class="col-filer" value="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                        <input type="hidden" class="act-filer" value="man">
                        <input type="hidden" class="folder-filer" value="news">
                    </div>
                    <?php if(isset($gallery) && count($gallery) > 0) { ?>
                        <div class="form-group form-group-gallery">
                            <label class="label-filer">Album hiện tại:</label>
                            
                            <?php /*
                            <div class="alert my-alert alert-sort-filer alert-info text-sm text-dark bg-gradient-info"><i class="fas fa-info-circle mr-2"></i>Có thể chọn nhiều hình để di chuyển</div>
                            */ ?>
                            <div class="jFiler-items my-jFiler-items jFiler-row">
                                <ul class="jFiler-items-list jFiler-items-grid row scroll-bar" id="jFilerSortable">
                                    <?php foreach($gallery as $v) echo $func->galleryFiler($v['stt'],$v['id'],$v['photo'],$v['tenvi'],'news','col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6'); ?>
                                </ul>
                            </div>
                            <div class="card-footer-detail-vns action-filer mb-3">
                                <a class="btn btn-sm bg-gradient-primary check-all-filer mr-1"></i>Chọn tất cả</a>
                                <button type="button" class="btn btn-sm bg-gradient-success sort-filer mr-1 dp-none" id="sort-filer">Sắp xếp</button>
                                <a class="btn btn-sm bg-gradient-danger delete-all-filer">Xóa tất cả</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <div class="card card-vns card-vns-detail text-sm">
            <div class="card-header-right">
                <h3 class="card-title">Thông tin <?=$config['news'][$type]['title_main']?></h3>
            </div>
            <div class="card-body">
                <div class="row-form-group">
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
    <?php if(isset($config['news'][$type]['seo']) && $config['news'][$type]['seo'] == true) { ?>
        <?php
        $seoDB = $seo->getSeoDB($id,$com,'man',$type);
        include TEMPLATE.LAYOUT."seo.php";
        ?>
    <?php } ?>   
    <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>"> 
    <input type="hidden" name="actS" value="<?=($_REQUEST['act']=='add') ? 'add' : ''?>">
</form>
</section>