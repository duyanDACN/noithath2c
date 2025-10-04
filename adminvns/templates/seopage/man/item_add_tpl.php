<?php
$linkSave = "index.php?com=seopage&act=save&type=".$_GET['type'];
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
                            <li class="breadcrumb-item active">Quản lý Seo page</li>
                        </ol>
                    </div>
                    <div class="card-footer card-footer-detail-vns text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check">Lưu</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary">Làm lại</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header-vns">
            <div class="title-card-slug">
                <h3 class="card-title" style="float:none;">Thông tin SEO page - <?=$config['seopage']['page'][$_GET['type']]?></h3>
            </div>
        </div>
        <div class="card card-vns text-sm">
            <div class="card-body mb-3">
                <div class="form-group col-md-4 pr-0 pl-0">
                    <?php 
                    $photoDetail = UPLOAD_SEOPAGE.@$item['photo'];
                    $dimension = "Width: ".$config['seopage']['width']." px - Height: ".$config['seopage']['height']." px (".$config['seopage']['img_type'].")";
                    ?>
                    <div class="photoUpload-zone">
                        <div class="photoUpload-detail" id="photoUpload-preview"><img class="rounded" src="<?=@$photoDetail?>" onerror="src='assets/images/noimage.png'" alt="Alt Photo"/></div>
                        <div class="background-photoUpload">
                            <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                <input type="file" name="file" id="file-zone">
                                <img src="assets/images/icon_noimage.png">
                                <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                <p class="photoUpload-or">hoặc</p>
                                <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                            </label>
                        </div>
                        <div class="photoUpload-dimension"><?=@$dimension?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $seoDB = $item;
        include TEMPLATE.LAYOUT."seo.php";
        ?>
    </form>
</section>