<?php
$linkMan = "index.php?com=user&act=man&p=".$curPage;
$linkAdd = "index.php?com=user&act=add&p=".$curPage;
$linkEdit = "index.php?com=user&act=edit&p=".$curPage;
$linkDelete = "index.php?com=user&act=delete&p=".$curPage;
?>

<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý tài khoản khách</li>
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
            <h3 class="card-title">Danh sách tài khoản khách</h3>
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
                        <th class="align-middle text-center">Hình ảnh</th>
                        <th class="align-middle">Tài khoản</th>
                        <th class="align-middle">Họ tên</th>
                        <th class="align-middle">Email</th>
                        <th class="align-middle text-center">Kích hoạt</th>
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
                                    <input type="number" class="form-control form-control-mini m-auto update-stt" min="0" value="<?=$items[$i]['stt']?>" data-id="<?=$items[$i]['id']?>" data-table="member">
                                </td>
                                <td class="align-middle text-center" width="100px">
                                    <a href="<?=$linkEdit?><?=$linkID?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['ten']?>"><img class="rounded img-preview" onerror="src='assets/images/noimage.png'" src="<?=THUMBS?>/<?=$config['user']['thumb']?>/<?=UPLOAD_USER_L.$items[$i]['avatar']?>" alt="<?=$items[$i]['ten']?>"></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['username']?>"><?=$items[$i]['username']?></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['ten']?>"><?=$items[$i]['ten']?></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark" href="<?=$linkEdit?>&id=<?=$items[$i]['id']?>" title="<?=$items[$i]['email']?>"><?=$items[$i]['email']?></a>
                                </td>
                                <td class="align-middle text-center">
                                   <div class="custom-control custom-checkbox my-checkbox">
                                    <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?=$items[$i]['id']?>" data-table="member" data-id="<?=$items[$i]['id']?>" data-loai="hienthi" <?=($items[$i]['hienthi'])?'checked':''?>>
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