<?php
$linkMan = "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage;
$linkSave = "index.php?com=product&act=save_mau&type=".$type."&p=".$curPage;
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
                            <li class="breadcrumb-item active">Chi tiết màu sắc <?=$config['product'][$type]['title_main']?></li>
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

        <div class="card card-vns card-vns-detail text-sm">
            <div class="card-header-vns">
                <h3 class="card-title"><?=($act=="edit_mau")?"Cập nhật":"Thêm mới";?> màu sắc <?=$config['product'][$type]['title_main']?></h3>
            </div>
            <div class="card-body">
                <?php if(isset($config['product'][$type]['mau_images']) && $config['product'][$type]['mau_images'] == true) { ?>
                    <div class="form-group col-md-4 pl-0 pr-0">
                        <?php 
                        $photoDetail = UPLOAD_COLOR.@$item['photo'];
                        $dimension = "Width: ".$config['product'][$type]['width_mau']." px - Height: ".$config['product'][$type]['height_mau']." px (".$config['product'][$type]['img_type_mau'].")";
                        include TEMPLATE.LAYOUT."image.php";
                        ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <?php if(isset($config['product'][$type]['mau_mau']) && $config['product'][$type]['mau_mau'] == true) { ?>
                     <div class="form-group col-md-3 col-sm-4">
                        <label class="d-block" for="mau">Màu sắc:</label>
                        <input type="text" class="form-control jscolor" name="data[mau]" id="mau" maxlength="7" value="<?=(@$item['mau'])?$item['mau']:'#000000'?>">
                    </div>
                <?php } ?>
                <?php if(
                    (isset($config['product'][$type]['mau_loai']) && $config['product'][$type]['mau_loai'] == true) && 
                    (isset($config['product'][$type]['mau_images']) && $config['product'][$type]['mau_images'] == true)
                ) { ?>
                 <div class="form-group col-md-3 col-sm-4">
                    <label for="loaihienthi">Loại hiển thị:</label>
                    <select class="form-control" name="data[loaihienthi]" id="loaihienthi">
                        <option value="0">Chọn loại hiển thị</option>
                        <option <?=(isset($item['loaihienthi']) && $item['loaihienthi'] == 0)?"selected":""?> value="0">Màu sắc</option>
                        <option <?=(isset($item['loaihienthi']) && $item['loaihienthi'] == 1)?"selected":""?> value="1">Hình ảnh</option>
                    </select>
                </div>
            <?php } ?>
        </div>

        <div class="card card-vns-detail card-outline card-outline-tabs">
            <div class="card-article">
                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                    <?php foreach($config['website']['lang'] as $k => $v) { ?>
                        <div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-lang-<?=$k?>" role="tabpanel" aria-labelledby="tabs-lang">
                            <div class="form-group">
                                <label for="ten<?=$k?>">Tiêu đề (<?=$k?>):</label>
                                <input type="text" class="form-control for-seo" name="data[ten<?=$k?>]" id="ten<?=$k?>" placeholder="Tiêu đề (<?=$k?>)" value="<?=@$item['ten'.$k]?>" <?=($k=='vi')?'required':''?>>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
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
<input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
</form>
</section>