<?php
$linkMan = "index.php?com=product&act=man_item&type=".$type."&p=".$curPage;
if($act=='add_item') $linkFilter = "index.php?com=product&act=add_item&type=".$type."&p=".$curPage;
else if($act=='edit_item') $linkFilter = "index.php?com=product&act=edit_item&type=".$type."&p=".$curPage."&id=".$id;
$linkSave = "index.php?com=product&act=save_item&type=".$type."&p=".$curPage;
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
                            <li class="breadcrumb-item active">Chi tiết <?=$config['product'][$type]['title_main_item']?></li>
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
                if(isset($config['product'][$type]['slug_item']) && $config['product'][$type]['slug_item'] == true)
                {
                    $slugchange = ($act=='edit_item') ? 1 : 0;
                    include TEMPLATE.LAYOUT."slug.php";
                }
                ?>
                <div class="card-header-vns">
                    <div class="flex-card-slug">
                        <div class="title-card-slug">
                            <h3 class="card-title">Nội dung <?=$config['product'][$type]['title_main_item']?></h3>
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
                <div class="card card-vns-detail card-outline text-sm">
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
                                            <?php if(isset($config['product'][$type]['mota_item']) && $config['product'][$type]['mota_item'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="mota<?=$k?>">Mô tả (<?=$k?>):</label>
                                                    <textarea class="form-control for-seo <?=(isset($config['product'][$type]['mota_cke_item']) && $config['product'][$type]['mota_cke_item'] == true)?'form-control-ckeditor':''?>" name="data[mota<?=$k?>]" id="mota<?=$k?>" rows="5" placeholder="Mô tả (<?=$k?>)"><?=htmlspecialchars_decode(@$item['mota'.$k])?></textarea>
                                                </div>
                                            <?php } ?>
                                            <?php if(isset($config['product'][$type]['noidung_item']) && $config['product'][$type]['noidung_item'] == true) { ?>
                                                <div class="form-group">
                                                    <label for="noidung<?=$k?>">Nội dung (<?=$k?>):</label>
                                                    <textarea class="form-control for-seo <?=(isset($config['product'][$type]['noidung_cke_item']) && $config['product'][$type]['noidung_cke_item'] == true)?'form-control-ckeditor':''?>" name="data[noidung<?=$k?>]" id="noidung<?=$k?>" rows="5" placeholder="Nội dung (<?=$k?>)"><?=htmlspecialchars_decode(@$item['noidung'.$k])?></textarea>
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
                                <?=$func->get_ajax_category('product', 'list', $type)?>
                            </div>
                            <div class="form-group col-xl-6 col-sm-4">
                                <label class="d-block" for="id_cat">Danh mục cấp 2:</label>
                                <?=$func->get_ajax_category('product', 'cat', $type)?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(isset($config['product'][$type]['images_item']) && $config['product'][$type]['images_item'] == true) { ?>
                    <div class="card card-primary text-sm">
                        <div class="card-body">
                            <div class="card-header-right">
                                <h3 class="card-title">Hình ảnh <?=$config['product'][$type]['title_main_item']?></h3>
                            </div>
                            <?php
                            $photoDetail = UPLOAD_PRODUCT.@$item['photo'];
                            $dimension = "Width: ".$config['product'][$type]['width_item']." px - Height: ".$config['product'][$type]['height_item']." px (".$config['product'][$type]['img_type_item'].")";
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
                                    <h3 class="card-title">Thông tin <?=$config['product'][$type]['title_main_item']?></h3>
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

    <?php if(isset($config['product'][$type]['seo_item']) && $config['product'][$type]['seo_item'] == true) { ?>
        <?php
        $seoDB = $seo->getSeoDB($id,$com,'man_item',$type);
        include TEMPLATE.LAYOUT."seo.php";
        ?>
    <?php } ?>
    <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
</form>
</section>