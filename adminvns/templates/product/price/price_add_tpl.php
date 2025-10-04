<?php
$linkMan = "index.php?com=product&act=man_price&type=".$type."&idc=".$idc."&p=".$curPage;
$linkSave = "index.php?com=product&act=save_price&type=".$type."&idc=".$idc."&p=".$curPage;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Chi tiết giá sản phẩm <?=$config['product'][$type]['title_main']?></li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title"><?=($act=="edit_price")?"Cập nhật":"Thêm mới";?> giá sản phẩm <?=$config['product'][$type]['title_main']?></h3>
            </div>
            <div class="card-body">
                <?php if($idc){
                    $product_detail = $d->rawQueryOne("select id_mau,id_size,gia,giamoi from #_product where id = ? limit 0,1",array($idc));

                    if($product_detail['id_size']!=''){
                        $size = $d->rawQuery("select tenvi as ten, id from #_product_size where type = ? and id in (".$product_detail['id_size'].") order by stt,id desc",array($type));
                    }
                } ?>
                <div class="row">
                    <?php if(isset($size) && count($size)>0){ ?>
                     <div class="form-group col-md-3 col-sm-4">
                        <label for="id_size">Size:</label>
                        <select class="form-control" name="data[id_size]" id="id_size" required>
                            <option value="">Chọn size</option>
                            <?php for($i=0; $i < count($size); $i++) { ?>
                                <option value="<?=$size[$i]['id']?>" <?php if($i==0) echo 'selected';?> <?php if($item['id_size'] == $size[$i]['id']){ echo "selected"; } ?>><?=$size[$i]['ten']?></option>
                            <?php } ?>
                        </select>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="d-block" for="gia">Giá bán:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><strong>VND</strong></div>
                        </div>
                        <input type="text" class="form-control format-price gia_ban" name="data[gia]" id="gia" placeholder="Giá bán" value="<?=$func->format_money($item['gia'])?>">
                    </div>
                </div>
                <?php if($product_detail['giamoi']) {?>
                    <div class="form-group col-md-4">
                        <label class="d-block" for="gia">Giá mới:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><strong>VND</strong></div>
                            </div>
                            <input type="text" class="form-control format-price gia_moi" name="data[giamoi]" id="giamoi" placeholder="Giá mới" value="<?=$func->format_money($item['giamoi'])?>">
                        </div>
                    </div>

                <?php }?>
            </div>
            <div class="form-group">
                <label for="hienthi" class="d-inline-block align-middle mb-0 mr-2">Hiển thị:</label>
                <div class="custom-control custom-checkbox d-inline-block align-middle">
                    <input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]" id="hienthi-checkbox" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
                    <label for="hienthi-checkbox" class="custom-control-label"></label>
                </div>
            </div>
            <div class="form-group">
                <label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                <input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?=isset($item['stt']) ? $item['stt'] : 1?>">
            </div>
        </div>
    </div>
    <div class="card-footer text-sm">
        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
        <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
        <a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
    </div>
</form>
</section>