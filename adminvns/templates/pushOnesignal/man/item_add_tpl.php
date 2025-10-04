<?php
$linkMan = "index.php?com=pushOnesignal&act=man&p=".$curPage;
$linkSave = "index.php?com=pushOnesignal&act=save&p=".$curPage;
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
                            <li class="breadcrumb-item active">Chi tiết thông báo đẩy</li>
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
                <h3 class="card-title"><?=($act=="edit")?"Cập nhật":"Thêm mới";?> thông báo đẩy</h3>
            </div>
            <div class="card-body">
                <div class="form-group col-md-4 pr-0 pl-0">
                    <?php
                    $photoDetail = UPLOAD_SYNC.@$item['photo'];
                    $dimension = "Width: 100px - Height: 100px (.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF)";
                    include TEMPLATE.LAYOUT."image.php";
                    ?>
                </div>
                <div class="form-group">
                   <label for="name">Tiêu đề:</label>
                   <input type="text" class="form-control" name="data[name]" id="name" placeholder="Tiêu đề" value="<?=@$item['name']?>" required>
               </div>
               <div class="form-group">
                   <label for="link">Link:</label>
                   <input type="text" class="form-control" name="data[link]" id="link" placeholder="Link" value="<?=@$item['link']?>" required>
               </div>
               <div class="form-group">
                   <label for="description">Mô tả:</label>
                   <textarea class="form-control" name="data[description]" id="description" rows="5" placeholder="Mô tả" required><?=@$item['description']?></textarea>
               </div>
               <div class="row-form-group mt-1">
                   <div class="form-group">
                       <label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                       <input type="number" class="form-control-mini d-inline-block align-middle" min="0" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?=isset($item['stt']) ? $item['stt'] : 1?>">
                   </div>
               </div>
           </div>
       </div>
       <input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
   </form>
</section>