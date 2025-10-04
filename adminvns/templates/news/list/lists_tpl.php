<?php 
$linkMan = "index.php?com=news&act=man_list&type=".$type."&p=".$curPage;
$linkAdd = "index.php?com=news&act=add_list&type=".$type."&p=".$curPage;
$linkEdit = "index.php?com=news&act=edit_list&type=".$type."&p=".$curPage;
$linkDelete = "index.php?com=news&act=delete_list&type=".$type."&p=".$curPage;
$linkMulti = "index.php?com=news&act=man_photo&kind=man_list&type=".$type."&p=".$curPage;
?>
<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý <?=$config['news'][$type]['title_main_list']?></li>
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
    <div class="card card-vns text-sm mb-0">
        <div class="card-header-vns">
            <h3 class="card-title">Danh sách <?=$config['news'][$type]['title_main_list']?></h3>
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
                        <?php if(isset($config['news'][$type]['show_images_list']) && $config['news'][$type]['show_images_list'] == true) { ?>
                         <th class="align-middle text-center">Hình</th>
                     <?php } ?>
                     <th class="align-middle" style="width:40%">Tiêu đề</th>
                     <?php if(isset($config['news'][$type]['gallery_list']) && count($config['news'][$type]['gallery_list']) > 0) { ?>
                        <th class="align-middle text-center">Gallery</th>
                    <?php } ?>
                    <?php if(isset($config['news'][$type]['check_list'])) { foreach($config['news'][$type]['check_list'] as $key => $value) { ?>
                     <th class="align-middle text-center"><?=$value?></th>
                 <?php } } ?>
                 <th class="align-middle text-center">Số bài viết</th>
                 <th class="align-middle text-center">Hiển thị</th>
                 <th class="align-middle text-center">Thao tác</th>
             </tr>
         </thead>
         <?php if(empty($items)) { ?>
            <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
        <?php } else { ?>
            <tbody>
                <?php for($i=0;$i<count($items);$i++) { ?>
                    <?php 
                    $countItems = $d->rawQuery("select id from #_news where id_list = ? and type = ? and hienthi > 0 order by stt,id desc",array($items[$i]['id'],$type));
                    ?>
                    <tr>
                        <td class="align-middle" width="47px">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-<?=$items[$i]['id']?>" value="<?=$items[$i]['id']?>">
                                <label for="select-checkbox-<?=$items[$i]['id']?>" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle" width="47px">
                            <input type="number" class="form-control form-control-mini m-auto update-stt" min="0" value="<?=$items[$i]['stt']?>" data-id="<?=$items[$i]['id']?>" data-table="news_list">
                        </td>
                        <?php if(isset($config['news'][$type]['show_images_list']) && $config['news'][$type]['show_images_list'] == true) { ?>
                            <td class="align-middle text-center">
                               <a href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['tenvi']?>"><img class="rounded img-preview" onerror="src='assets/images/noimage.png'" src="<?=THUMBS?>/<?=$config['news'][$type]['thumb_list']?>/<?=UPLOAD_NEWS_L.$items[$i]['photo']?>" alt="<?=$items[$i]['tenvi']?>"></a>
                           </td>
                       <?php } ?>
                       <td class="align-middle">
                        <a class="text-dark" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['tenvi']?>"><?=$items[$i]['tenvi']?></a>
                    </td>

                    <?php if(isset($config['news'][$type]['gallery_list']) && count($config['news'][$type]['gallery_list']) > 0) { ?>
                        <td class="align-middle text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm bg-gradient-success dropdown-toggle" id="dropdown-gallery" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thêm</button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-gallery">
                                    <?php foreach($config['news'][$type]['gallery_list'] as $key => $value) { ?>
                                        <a class="dropdown-item text-dark" href="<?=$linkMulti?>&idc=<?=$items[$i]['id']?>&val=<?=$key?>" title="<?=$value['title_sub_photo']?>"><i class="far fa-caret-square-right text-secondary mr-2"></i><?=$value['title_sub_photo']?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </td>
                    <?php } ?>
                    <?php if(isset($config['news'][$type]['check_list'])) { foreach($config['news'][$type]['check_list'] as $key => $value) { ?>
                     <td class="align-middle text-center">
                      <div class="custom-control custom-checkbox my-checkbox">
                       <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" data-table="news_list" data-id="<?=$items[$i]['id']?>" data-loai="<?=$key?>" <?=($items[$i][$key])?'checked':''?>>
                       <label for="show-checkbox-<?=$key?>-<?=$items[$i]['id']?>" class="custom-control-label"></label>
                   </div>
               </td>
           <?php } } ?>
           <td class="align-middle text-center">
            <a class="text-dark" title="Số bài viết"><?=count($countItems)?></a>
        </td>
        <td class="align-middle text-center">
           <div class="custom-control custom-checkbox my-checkbox">
            <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?=$items[$i]['id']?>" data-table="news_list" data-id="<?=$items[$i]['id']?>" data-loai="hienthi" <?=($items[$i]['hienthi'])?'checked':''?>>
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