<?php
$linkMan = "index.php?com=photo&act=man_photo&type=".$type."&p=".$curPage;
$linkAdd = "index.php?com=photo&act=add_photo&type=".$type."&p=".$curPage;
$linkEdit = "index.php?com=photo&act=edit_photo&type=".$type."&p=".$curPage;
$linkDelete = "index.php?com=photo&act=delete_photo&type=".$type."&p=".$curPage;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý hình ảnh - video</li>
            </ol>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card-footer text-sm sticky-top">
        <div class="flex-btn-top">
            <div class="flex-btn-vns">
                <a class="btn btn-sm text-dark bg-btn1" href="<?=$linkAdd?>" title="Thêm mới"><i class="fas fa-plus mr-1"></i>Thêm mới</a>
                <a class="btn btn-sm text-white bg-btn2" id="delete-all" data-url="<?=$linkDelete?><?=$strUrl?>" title="Xóa tất cả">Xóa tất cả</a>
            </div>
        </div>
    </div>
    <div class="card card-vns text-sm mb-0">
        <div class="card-header-vns">
            <h3 class="card-title">Danh sách <?=$config['photo']['man_photo'][$type]['title_main_photo']?></h3>
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
                        <?php if(isset($config['photo']['man_photo'][$type]['avatar_photo']) && $config['photo']['man_photo'][$type]['avatar_photo'] == true) { ?>
                        	<th class="align-middle text-center" width="100px">Hình</th>
                        <?php } ?>
                        <?php if(isset($config['photo']['man_photo'][$type]['tieude_photo']) && $config['photo']['man_photo'][$type]['tieude_photo'] == true) { ?>
                           <th class="align-middle" style="width:40%">Tiêu đề</th>
                       <?php } ?>
                       <?php if(isset($config['photo']['man_photo'][$type]['link_photo']) && $config['photo']['man_photo'][$type]['link_photo'] == true) { ?>
                           <th class="align-middle">Link</th>
                       <?php } ?>
                       <?php if(isset($config['photo']['man_photo'][$type]['video_photo']) && $config['photo']['man_photo'][$type]['video_photo'] == true) { ?>
                           <th class="align-middle">Link video</th>
                       <?php } ?>
                       <?php if(isset($config['photo']['man_photo'][$type]['check_photo'])) { foreach($config['photo']['man_photo'][$type]['check_photo'] as $key => $value) { ?>
                           <th class="align-middle text-center"><?=$value?></th>
                       <?php } } ?>
                       <th class="align-middle text-center">Hiển thị</th>
                       <th class="align-middle text-center">Thao tác</th>
                   </tr>
               </thead>
               <?php if(empty($items)) { ?>
                <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
            <?php } else { ?>
                <tbody>
                    <?php for($i=0;$i<count($items);$i++) { ?>
                        <tr>
                            <td class="align-middle" width="47px">
                                <div class="custom-control custom-checkbox my-checkbox">
                                    <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-<?=$items[$i]['id']?>" value="<?=$items[$i]['id']?>">
                                    <label for="select-checkbox-<?=$items[$i]['id']?>" class="custom-control-label"></label>
                                </div>
                            </td>
                            <td class="align-middle" width="47px">
                                <input type="number" class="form-control form-control-mini m-auto update-stt" min="0" value="<?=$items[$i]['stt']?>" data-id="<?=$items[$i]['id']?>" data-table="photo">
                            </td>
                            <?php if(isset($config['photo']['man_photo'][$type]['avatar_photo']) && $config['photo']['man_photo'][$type]['avatar_photo'] == true) { ?>
                               <td class="align-middle text-center" width="100px">
                                   <a href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['tenvi']?>"><img class="rounded img-preview" onerror="src='assets/images/noimage.png'" src="<?=THUMBS?>/<?=$config['photo']['man_photo'][$type]['thumb_photo']?>/<?=UPLOAD_PHOTO_L.$items[$i]['photo']?>" alt="<?=$items[$i]['tenvi']?>"></a>
                               </td>
                           <?php } ?>
                           <?php if(isset($config['photo']['man_photo'][$type]['tieude_photo']) && $config['photo']['man_photo'][$type]['tieude_photo'] == true) { ?>
                               <td class="align-middle">
                                   <a class="text-dark" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['tenvi']?>"><?=$items[$i]['tenvi']?></a>
                               </td>
                           <?php } ?>
                           <?php if(isset($config['photo']['man_photo'][$type]['link_photo']) && $config['photo']['man_photo'][$type]['link_photo'] == true) { ?>
                               <td class="align-middle"><?=$items[$i]['link']?></td>
                           <?php } ?>
                           <?php if(isset($config['photo']['man_photo'][$type]['video_photo']) && $config['photo']['man_photo'][$type]['video_photo'] == true) { ?>
                               <td class="align-middle"><?=$items[$i]['link_video']?></td>
                           <?php } ?>
                           <?php if(isset($config['photo']['man_photo'][$type]['check_photo'])) { foreach($config['photo']['man_photo'][$type]['check_photo'] as $key => $value) { ?>
                             <td class="align-middle text-center">
                              <div class="custom-control custom-checkbox my-checkbox">
                               <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" data-table="photo" data-id="<?=$items[$i]['id']?>" data-loai="<?=$key?>" <?=($items[$i][$key])?'checked':''?>>
                               <label for="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" class="custom-control-label"></label>
                           </div>
                       </td>
                   <?php } } ?>
                   <td class="align-middle text-center">
                       <div class="custom-control custom-checkbox my-checkbox">
                        <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?=$items[$i]['id']?>" data-table="photo" data-id="<?=$items[$i]['id']?>" data-loai="hienthi" <?=($items[$i]['hienthi'])?'checked':''?>>
                        <label for="show-checkbox-<?=$items[$i]['id']?>" class="custom-control-label"></label>
                    </div>
                </td>
                <td class="align-middle text-center text-md text-nowrap">
                    <div class="d-flex justify-content-center">
                        <a class="action-icon bg-action-1" href="<?=$linkEdit?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="Chỉnh sửa"><span class="action-icon-vns"><img src="assets/images/icon_edit.png"></span></a>
                        <a class="action-icon bg-action-2 mr-0" id="delete-item" data-url="<?=$linkDelete?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="Xóa"><span class="action-icon-vns"><img src="assets/images/icon_delete.png"></span></a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
<?php } ?>
</table>
</div>
</div>
<?php if($paging) { ?>
    <div class="card-footer card-footer-vns text-sm pb-0">
        <?=$paging?>
    </div>
<?php } ?>
</section>