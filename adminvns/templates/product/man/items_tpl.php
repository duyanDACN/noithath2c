<?php 
$linkView = $config_base;
$linkMan = $linkFilter = "index.php?com=product&act=man&type=".$type."&p=".$curPage;
$linkAdd = "index.php?com=product&act=add&type=".$type."&p=".$curPage;
$linkCopy = "index.php?com=product&act=copy&type=".$type."&p=".$curPage;
$linkEdit = "index.php?com=product&act=edit&type=".$type."&p=".$curPage;
$linkDelete = "index.php?com=product&act=delete&type=".$type."&p=".$curPage;
$linkMulti = "index.php?com=product&act=man_photo&kind=man&type=".$type."&p=".$curPage;
$copyImg = (isset($config['product'][$type]['copy_image']) && $config['product'][$type]['copy_image'] == true) ? TRUE : FALSE;
?>
<!-- Content Header -->
<section class="content-header text-sm">
  <div class="container-fluid">
    <div class="row">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
        <li class="breadcrumb-item active">Quản lý <?=$config['product'][$type]['title_main']?></li>
      </ol>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="card-footer text-sm sticky-top">
    <div class="flex-btn-top">
      <div class="form-inline form-search d-inline-block align-middle">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="Tìm kiếm nhanh" aria-label="Tìm kiếm nhanh" value="<?=(isset($_GET['keyword'])) ? $_GET['keyword'] : ''?>" onkeypress="doEnter(event,'keyword','<?=$linkMan?>')">
          <div class="input-group-append bg-white rounded-right">
            <button class="btn btn-navbar" type="button" onclick="onSearch('keyword','<?=$linkMan?>')">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="flex-btn-vns">
        <a class="btn btn-sm text-dark bg-btn1" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-1"></i>Thêm mới</a>
        <a class="btn btn-sm text-white bg-btn2" id="delete-all" data-url="<?=$linkDelete?><?=$strUrl?>" title="Xóa tất cả">Xóa tất cả</a>
      </div>
    </div>
  </div>
  <?php if(
    (isset($config['product'][$type]['dropdown']) && $config['product'][$type]['dropdown'] == true) || 
    (isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true)
  ) { ?>
   <div class="card-footer-list form-group-category text-sm bg-white row ml-0">
     <?php if(isset($config['product'][$type]['list']) && $config['product'][$type]['list'] == true) { ?>
      <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?=$func->get_link_category('product', 'list', $type)?></div>
    <?php } ?>
    <?php if(isset($config['product'][$type]['cat']) && $config['product'][$type]['cat'] == true) { ?>
      <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?=$func->get_link_category('product', 'cat', $type)?></div>
    <?php } ?>
    <?php if(isset($config['product'][$type]['item']) && $config['product'][$type]['item'] == true) { ?>
      <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?=$func->get_link_category('product', 'item', $type)?></div>
    <?php } ?>
    <?php if(isset($config['product'][$type]['sub']) && $config['product'][$type]['sub'] == true) { ?>
      <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?=$func->get_link_category('product', 'sub', $type)?></div>
    <?php } ?>
    <?php if(isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true) { ?>
      <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?=$func->get_link_category('product', 'brand', $type, 'Chọn hãng')?></div>
    <?php } ?>
  </div>
<?php } ?>
<div class="card card-vns text-sm mb-0">
  <div class="card-header-vns">
    <h3 class="card-title">Danh sách <?=$config['product'][$type]['title_main']?></h3>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover">
      <thead>
        <tr>
          <th class="align-middle" width="47px">
            <div class="custom-control custom-checkbox my-checkbox">
              <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
              <label for="selectall-checkbox" class="custom-control-label"></label>
            </div>
          </th>
          <th class="align-middle text-center" width="47px">STT</th>
          <?php if(isset($config['product'][$type]['show_images']) && $config['product'][$type]['show_images'] == true) { ?>
           <th class="align-middle text-center">Hình</th>
         <?php } ?>
         <th class="align-middle" style="width:40%">Tiêu đề</th>
         <?php if(isset($config['product'][$type]['gallery']) && count($config['product'][$type]['gallery']) > 0) { ?>
           <th class="align-middle text-center">Hình ảnh</th>
         <?php } ?>
         <?php if(isset($config['product'][$type]['check'])) { foreach($config['product'][$type]['check'] as $key => $value) { ?>
           <th class="align-middle text-center"><?=$value?></th>
         <?php } } ?>
         <th class="align-middle text-center">Số lượt xem</th>
         <th class="align-middle text-center">Hiển thị</th>
         <th class="align-middle text-center">Thao tác</th>
       </tr>
     </thead>
     <?php if(empty($items)) { ?>
      <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
    <?php } else { ?>
      <tbody>
        <?php for($i=0;$i<count($items);$i++) {
         $linkID = "";
         if($items[$i]['id_list']) $linkID .= "&id_list=".$items[$i]['id_list'];
         if($items[$i]['id_cat']) $linkID .= "&id_cat=".$items[$i]['id_cat'];
         if($items[$i]['id_item']) $linkID .= "&id_item=".$items[$i]['id_item'];
         if($items[$i]['id_sub']) $linkID .= "&id_sub=".$items[$i]['id_sub'];
         if($items[$i]['id_brand']) $linkID .= "&id_brand=".$items[$i]['id_brand']; 
         if($items[$i]['id_huong']) $linkID .= "&id_huong=".$items[$i]['id_huong'];
         if($items[$i]['id_tygia']) $linkID .= "&id_tygia=".$items[$i]['id_tygia'];
         if($items[$i]['id_tinhthanh']) $linkID .= "&id_tinhthanh=".$items[$i]['id_tinhthanh'];
         ?>
         <tr>
          <td class="align-middle" width="47px">
            <div class="custom-control custom-checkbox my-checkbox">
              <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-<?=$items[$i]['id']?>" value="<?=$items[$i]['id']?>">
              <label for="select-checkbox-<?=$items[$i]['id']?>" class="custom-control-label"></label>
            </div>
          </td>
          <td class="align-middle" width="47px">
            <input type="number" class="form-control form-control-mini m-auto update-stt" min="0" value="<?=$items[$i]['stt']?>" data-id="<?=$items[$i]['id']?>" data-table="product">
          </td>
          <?php if(isset($config['product'][$type]['show_images']) && $config['product'][$type]['show_images'] == true) { ?>
            <td class="align-middle text-center">
             <a href="<?=$linkEdit?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['tenvi']?>"><img class="rounded img-preview" onerror="src='assets/images/noimage.png'" src="<?=THUMBS?>/<?=$config['product'][$type]['thumb']?>/<?=UPLOAD_PRODUCT_L.$items[$i]['photo']?>" alt="<?=$items[$i]['tenvi']?>"></a>
           </td>
         <?php } ?>
         <td class="align-middle">
          <a class="text-dark" href="<?=$linkEdit?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['tenvi']?>"><?=$items[$i]['tenvi']?></a>
          <div class="tool-action mt-2 w-clear">
            <?php if(isset($config['product'][$type]['view']) && $config['product'][$type]['view'] == true) { ?>
              <a class="text-dark" href="<?=$linkView?><?=$items[$i]['tenkhongdauvi']?>" target="_blank" title="<?=$items[$i]['tenvi']?>">Xem</a>
            <?php } ?>
            <a class="text-info" href="<?=$linkEdit?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['tenvi']?>">Sửa</a>
            <?php if(isset($config['product'][$type]['copy']) && $config['product'][$type]['copy'] == true) { ?>
              <div class="dropdown">
               <a id="dropdownCopy" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-success p-0">Sao chép</a>
               <ul aria-labelledby="dropdownCopy" class="dropdown-menu border-0 shadow">
                <li><a href="#" class="dropdown-item copy-now" data-id="<?=$items[$i]['id']?>" data-table="product" data-copyimg="<?=$copyImg?>">Sao chép ngay</a></li>
                <li><a href="<?=$linkCopy?><?=$linkID?>&id_copy=<?=$items[$i]['id']?>" class="dropdown-item">Chỉnh sửa thông tin</a></li>
              </ul>
            </div>
          <?php } ?>
          <a class="text-danger" id="delete-item" data-url="<?=$linkDelete?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['tenvi']?>">Xóa</a>
        </div>
      </td>
      <?php if(isset($config['product'][$type]['gallery']) && count($config['product'][$type]['gallery']) > 0) { ?>
        <td class="align-middle text-center">
         <div class="dropdown">
          <button type="button" class="btn btn-sm bg-gradient-success dropdown-toggle text-dark" id="dropdown-gallery" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thêm</button>
          <div class="dropdown-menu" aria-labelledby="dropdown-gallery">
           <?php foreach($config['product'][$type]['gallery'] as $key => $value) { ?>
             <a class="dropdown-item text-dark" href="<?=$linkMulti?>&idc=<?=$items[$i]['id']?>&val=<?=$key?>" title="<?=$value['title_sub_photo']?>"><?=$value['title_sub_photo']?></a>
           <?php } ?>
         </div>
       </div>
     </td>
   <?php } ?>
   <?php if(isset($config['product'][$type]['check'])) { foreach($config['product'][$type]['check'] as $key => $value) { ?>
     <td class="align-middle text-center">
      <div class="custom-control custom-checkbox my-checkbox">
       <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" data-table="product" data-id="<?=$items[$i]['id']?>" data-loai="<?=$key?>" <?=($items[$i][$key])?'checked':''?>>
       <label for="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" class="custom-control-label"></label>
     </div>
   </td>
 <?php } } ?>
 <td class="align-middle text-center">
  <a class="text-dark" href="<?=$linkEdit?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['tenvi']?>"><?=$items[$i]['luotxem']?></a>
</td>
<td class="align-middle text-center">
 <div class="custom-control custom-checkbox my-checkbox">
  <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?=$items[$i]['id']?>" data-table="product" data-id="<?=$items[$i]['id']?>" data-loai="hienthi" <?=($items[$i]['hienthi'])?'checked':''?>>
  <label for="show-checkbox-<?=$items[$i]['id']?>" class="custom-control-label"></label>
</div>
</td>
<td class="align-middle text-center text-md text-nowrap">
 <div class="d-flex justify-content-center">
  <?php if(isset($config['product'][$type]['copy']) && $config['product'][$type]['copy'] == true) { ?>
   <div class="dropdown d-inline-block align-middle">
    <a id="dropdownCopy" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link action-icon" title="Sao chép"><span class="action-icon-vns"><img src="assets/images/icon_copy.png"></span></a>
    <ul aria-labelledby="dropdownCopy" class="dropdown-menu border-0 shadow">
      <li><a href="#" class="dropdown-item copy-now" data-id="<?=$items[$i]['id']?>" data-table="product">Sao chép ngay</a></li>
      <li><a href="<?=$linkCopy?><?=$linkID?>&id=<?=$items[$i]['id']?>" class="dropdown-item">Chỉnh sửa thông tin</a></li>
    </ul>
  </div>
<?php } ?>
<a class="action-icon bg-action-1" href="<?=$linkEdit?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="Chỉnh sửa"><span class="action-icon-vns"><img src="assets/images/icon_edit.png"></span></a>
<a class="action-icon bg-action-2 mr-0" id="delete-item" data-url="<?=$linkDelete?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="Xóa"><span class="action-icon-vns"><img src="assets/images/icon_delete.png"></span></a>
</div>
</tr>
<?php } ?>
</tbody>
<?php } ?>
</table>
</div>
</div>
<?php if($paging) { ?>
  <div class="card-footer card-footer-vns text-sm pb-0"><?=$paging?></div>
<?php } ?>
</section>