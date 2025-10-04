<?php
$linkMan = "index.php?com=news&act=man_sub&type=".$type."&p=".$curPage;
if($act=='add_sub') $linkFilter = "index.php?com=news&act=add_sub&type=".$type."&p=".$curPage;
else if($act=='edit_sub') $linkFilter = "index.php?com=news&act=edit_sub&type=".$type."&p=".$curPage."&id=".$id;
$linkSave = "index.php?com=news&act=save_sub&type=".$type."&p=".$curPage;
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
                            <li class="breadcrumb-item active">Chi tiết <?=$config['news'][$type]['title_main_sub']?></li>
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
            <div class="col-xl-8">
                <?php
                if(isset($config['news'][$type]['slug_sub']) && $config['news'][$type]['slug_sub'] == true)
                {
                    $slugchange = ($act=='edit_sub') ? 1 : 0;
                    include TEMPLATE.LAYOUT."slug.php";
                }
                ?>
                <div class="card-header-vns">
                    <div class="flex-card-slug">
                        <div class="title-card-slug">
                            <h3 class="card-title">Nội dung <?=$config['news'][$type]['title_main_sub']?></h3>
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
                                            <?php if(isset($config['news'][$type]['mota_sub']) && $config['news'][$type]['mota_sub'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="mota<?=$k?>">Mô tả (<?=$k?>):</label>
                                                    <textarea class="form-control for-seo <?=(isset($config['news'][$type]['mota_cke_sub']) && $config['news'][$type]['mota_cke_sub'] == true)?'form-control-ckeditor':''?>" name="data[mota<?=$k?>]" id="mota<?=$k?>" rows="5" placeholder="Mô tả (<?=$k?>)"><?=htmlspecialchars_decode(@$item['mota'.$k])?></textarea>
                                                </div>
                                            <?php } ?>
                                            <?php if(isset($config['news'][$type]['noidung_sub']) && $config['news'][$type]['noidung_sub'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="noidung<?=$k?>">Nội dung (<?=$k?>):</label>
                                                    <textarea class="form-control for-seo <?=(isset($config['news'][$type]['noidung_cke_sub']) && $config['news'][$type]['noidung_cke_sub'] == true)?'form-control-ckeditor':''?>" name="data[noidung<?=$k?>]" id="noidung<?=$k?>" rows="5" placeholder="Nội dung (<?=$k?>)"><?=htmlspecialchars_decode(@$item['noidung'.$k])?></textarea>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mgt-35">
                <div class="card card-primary text-sm">
                    <div class="card-body">
                        <div class="form-group-category row">
                            <div class="form-group col-xl-6 col-sm-4">
                                <label class="d-block" for="id_list">Danh mục cấp 1:</label>
                                <?=$func->get_ajax_category('news', 'list', $type)?>
                            </div>
                            <div class="form-group col-xl-6 col-sm-4">
                                <label class="d-block" for="id_cat">Danh mục cấp 2:</label>
                                <?=$func->get_ajax_category('news', 'cat', $type)?>
                            </div>
                            <div class="form-group col-xl-6 col-sm-4">
                                <label class="d-block" for="id_item">Danh mục cấp 3:</label>
                                <?=$func->get_ajax_category('news', 'item', $type)?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(isset($config['news'][$type]['images_sub']) && $config['news'][$type]['images_sub'] == true) { ?>
                    <div class="card card-primary text-sm">
                        <div class="card-body">
                            <div class="card-header-right">
                                <h3 class="card-title">Hình ảnh <?=$config['news'][$type]['title_main_sub']?></h3>
                            </div>
                            <?php
                            $photoDetail = UPLOAD_NEWS.@$item['photo'];
                            $dimension = "Width: ".$config['news'][$type]['width_sub']." px - Height: ".$config['news'][$type]['height_sub']." px (".$config['news'][$type]['img_type_sub'].")";
                            include TEMPLATE.LAYOUT."image.php";
                            ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="card card-primary text-sm">
                    <div class="card-body">
                        <div class="card-header-vns">
                            <div class="flex-card-slug">
                                <div class="title-card-slug">
                                    <h3 class="card-title">Thông tin <?=$config['news'][$type]['title_main_sub']?></h3>
                                </div>
                            </div>
                        </div>
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
        </div>
    </div>
    <?php if(isset($config['news'][$type]['seo_sub']) && $config['news'][$type]['seo_sub'] == true) { ?>
        <?php
        $seoDB = $seo->getSeoDB($id,$com,'man_sub',$type);
        include TEMPLATE.LAYOUT."seo.php";
        ?>
    <?php } ?>
    <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
</form>
</section>