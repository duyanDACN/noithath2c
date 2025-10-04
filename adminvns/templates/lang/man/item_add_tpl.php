<?php
$linkMan = "index.php?com=lang&act=man&p=".$curPage;
$linkSave = "index.php?com=lang&act=save&p=".$curPage;
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
                        <li class="breadcrumb-item"><a href="<?=$linkMan?>" title="Quản lý ngôn ngữ">Quản lý ngôn ngữ</a></li>
                        <li class="breadcrumb-item active">Chi tiết ngôn ngữ</li>
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
    <div class="card-header-vns">
        <h3 class="card-title" style="float:none"><?=($act=="edit")?"Cập nhật":"Thêm mới";?> ngôn ngữ</h3>
    </div>
    <div class="card card-vns card-vns-detail text-sm">
        <div class="card-body">
            <div class="form-group">
             <label for="giatri">Tên biến:</label>
             <input type="text" class="form-control" name="data[giatri]" id="giatri" placeholder="Tên biến" value="<?=@$item['giatri']?>" required>
         </div>
         <?php foreach($config['website']['lang'] as $key => $value) { ?>
           <div class="form-group">
              <label for="lang<?=$key?>"><?=$value?>:</label>
              <input type="text" class="form-control" name="data[lang<?=$key?>]" id="lang<?=$key?>" placeholder="<?=$value?> *" value="<?=@$item['lang'.$key]?>" required>
          </div>
      <?php } ?>
  </div>
</div>
<input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
</form>
</section>