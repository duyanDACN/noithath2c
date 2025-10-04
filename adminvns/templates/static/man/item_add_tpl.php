<?php
$linkSave = "index.php?com=static&act=save&type=" . $type;

if (isset($config['static'][$type]['images']) && $config['static'][$type]['images'] == true) {
    $colLeft = "col-xl-8";
    $colRight = "col-xl-4";
} else {
    $colLeft = "col-12";
    $colRight = "d-none";
}
?>
<!-- Main content -->
<section class="content">
    <form class="validation-form" novalidate method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
        <!-- Content Header -->
        <div class="content-header content-header-vns">
            <div class="container-fluid container-fluid-vns">
                <div class="card-fluid-vns">
                    <div class="breadcrumb-vns w-clear">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Quản lý trang tĩnh</li>
                        </ol>
                    </div>
                    <div class="card-footer card-footer-detail-vns text-sm sticky-top">
                        <button type="submit" class="btn btn-sm bg-gradient-primary submit-check">Lưu</button>
                        <button type="reset" class="btn btn-sm bg-gradient-secondary">Làm lại</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="<?= $colLeft ?>">
                <div class="card-header-vns">
                    <div class="flex-card-slug">
                        <div class="title-card-slug">
                            <h3 class="card-title">Nội dung <?= $config['static'][$type]['title_main'] ?></h3>
                        </div>
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                                <?php foreach ($config['website']['lang'] as $k => $v) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?= $k ?>" role="tab" aria-controls="tabs-lang-<?= $k ?>" aria-selected="true"><?= $v ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card card-vns-detail text-sm">
                    <div class="card-body">
                        <?php if (isset($config['static'][$type]['file']) && $config['static'][$type]['file'] == true) { ?>
                            <div class="form-group">
                                <label class="change-file mb-1 mr-2" for="file-taptin">
                                    <p>Upload tập tin:</p>
                                    <strong class="ml-2">
                                        <span class="btn btn-sm bg-gradient-success"><i class="fas fa-file-upload mr-2"></i>Chọn tập tin</span>
                                        <div><b class="text-sm text-split"></b></div>
                                    </strong>
                                </label>
                                <strong class="d-block mt-2 mb-2 text-sm"><?php echo $config['static'][$type]['file_type']; ?></strong>
                                <div class="custom-file my-custom-file d-none">
                                    <input type="file" class="custom-file-input" name="file-taptin" id="file-taptin">
                                    <label class="custom-file-label" for="file-taptin">Chọn file</label>
                                </div>
                                <?php if (isset($item['taptin']) && $item['taptin'] != '') { ?>
                                    <a class="btn btn-sm bg-gradient-primary text-dark d-inline-block align-middle p-2 rounded mb-1" href="<?= UPLOAD_FILE . @$item['taptin'] ?>" title="Download tập tin hiện tại"><i class="fas fa-download mr-2"></i>Download tập tin hiện tại</a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if (
                            (isset($config['static'][$type]['tieude']) && $config['static'][$type]['tieude'] == true) ||
                            (isset($config['static'][$type]['mota']) && $config['static'][$type]['mota'] == true) ||
                            (isset($config['static'][$type]['noidung']) && $config['static'][$type]['noidung'] == true)
                        ) { ?>
                            <div class="card card-outline card-outline-tabs">
                                <div class="card-article">
                                    <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                        <?php foreach ($config['website']['lang'] as $k => $v) { ?>
                                            <div class="tab-pane fade show <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang-<?= $k ?>" role="tabpanel" aria-labelledby="tabs-lang">
                                                <?php if (isset($config['static'][$type]['tieude']) && $config['static'][$type]['tieude'] == true) { ?>
                                                    <div class="form-group">
                                                        <label for="ten<?= $k ?>">Tiêu đề (<?= $k ?>):</label>
                                                        <input type="text" class="form-control for-seo" name="data[ten<?= $k ?>]" id="ten<?= $k ?>" placeholder="Tiêu đề (<?= $k ?>)" value="<?= @$item['ten' . $k] ?>" <?= ($k == 'vi') ? 'required' : '' ?>>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['static'][$type]['link']) && $config['static'][$type]['link'] == true) { ?>
                                                    <div class="form-group col-md-6">
                                                        <label for="link">Link:</label>
                                                        <input type="text" class="form-control" name="data[link]" id="link" placeholder="Link" value="<?= @$item['link'] ?>">
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['static'][$type]['mota']) && $config['static'][$type]['mota'] == true) { ?>
                                                    <div class="form-group">
                                                        <label for="mota<?= $k ?>">Mô tả (<?= $k ?>):</label>
                                                        <textarea class="form-control for-seo <?= (isset($config['static'][$type]['mota_cke']) && $config['static'][$type]['mota_cke'] == true) ? 'form-control-ckeditor' : '' ?>" name="data[mota<?= $k ?>]" id="mota<?= $k ?>" rows="5" placeholder="Mô tả (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['mota' . $k]) ?></textarea>
                                                    </div>
                                                <?php } ?>
                                                <?php if (isset($config['static'][$type]['noidung']) && $config['static'][$type]['noidung'] == true) { ?>
                                                    <div class="form-group">
                                                        <label for="noidung<?= $k ?>">Nội dung (<?= $k ?>):</label>
                                                        <textarea class="form-control for-seo <?= (isset($config['static'][$type]['noidung_cke']) && $config['static'][$type]['noidung_cke'] == true) ? 'form-control-ckeditor' : '' ?>" name="data[noidung<?= $k ?>]" id="noidung<?= $k ?>" rows="5" placeholder="Nội dung (<?= $k ?>)"><?= htmlspecialchars_decode(@$item['noidung' . $k]) ?></textarea>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row-form-group">
                            <div class="form-group">
                                <label for="hienthi" class="d-inline-block align-middle mb-0 mr-2">Hiển thị</label>
                                <div class="custom-control custom-checkbox d-inline-block align-middle">
                                    <input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]" id="hienthi-checkbox" <?= (!isset($item['hienthi']) || $item['hienthi'] == 1) ? 'checked' : '' ?>>
                                    <label for="hienthi-checkbox" class="click-checkbox <?= (!isset($item['hienthi']) || $item['hienthi'] == 1) ? 'checked' : '' ?>"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="<?= $colRight ?> mgt-35">
                <?php if (isset($config['static'][$type]['images']) && $config['static'][$type]['images'] == true) { ?>
                    <div class="card card-primary text-sm">
                        <div class="card-body">
                            <div class="card-header-right">
                                <h3 class="card-title">Hình ảnh <?= $config['static'][$type]['title_main'] ?></h3>
                            </div>
                            <?php
                            $photoDetail = UPLOAD_NEWS . @$item['photo'];
                            $dimension = "Width: " . $config['static'][$type]['width'] . " px - Height: " . $config['static'][$type]['height'] . " px (" . $config['static'][$type]['img_type'] . ")";
                            include TEMPLATE . LAYOUT . "image.php";
                            ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($config['static'][$type]['images2']) && $config['static'][$type]['images2'] == true) { ?>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Hình ảnh 2 <?= $config['static'][$type]['title_main'] ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            $photoDetail = UPLOAD_NEWS . @$item['photo2'];
                            $dimension = "Width: " . $config['static'][$type]['width2'] . " px - Height: " . $config['static'][$type]['height2'] . " px (" . $config['static'][$type]['img_type'] . ")";
                            include TEMPLATE . LAYOUT . "image2.php";
                            ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($config['static'][$type]['images3']) && $config['static'][$type]['images3'] == true) { ?>
                    <div class="card card-primary card-outline text-sm">
                        <div class="card-header">
                            <h3 class="card-title">Hình ảnh 3 <?= $config['static'][$type]['title_main'] ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            $photoDetail = UPLOAD_NEWS . @$item['photo3'];
                            $dimension = "Width: " . $config['static'][$type]['width3'] . " px - Height: " . $config['static'][$type]['height3'] . " px (" . $config['static'][$type]['img_type'] . ")";
                            include TEMPLATE . LAYOUT . "image3.php";
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php if (isset($config['static'][$type]['seo']) && $config['static'][$type]['seo'] == true) { ?>
            <?php
            $seoDB = $seo->getSeoDB(0, $com, 'capnhat', $type);
            include TEMPLATE . LAYOUT . "seo.php";
            ?>
        <?php } ?>
    </form>
</section>