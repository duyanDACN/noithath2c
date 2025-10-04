<?php
$linkMan = "index.php?com=contact&act=man&p=".$curPage;
?>

<!-- Content Header -->
<section class="content-header text-sm">
    <div class="container-fluid">
        <div class="row">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active">Quản lý lịch sử truy cập</li>
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

        </div>
    </div>

    <div class="card card-vns text-sm mb-0">
        <div class="card-header-vns">
            <h3 class="card-title">Danh sách lịch sử truy cập</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle" width="10%">Thiết bị</th>
                        <th class="align-middle">Trình duyệt</th>
                        <th class="align-middle">IP</th>
                        <th class="align-middle">User</th>
                        <th class="align-middle">Thời gian</th>
                    </tr>
                </thead>
                <?php if(empty($items)) { ?>
                    <tbody><tr><td colspan="100" class="text-center">Không có dữ liệu</td></tr></tbody>
                <?php } else { ?>
                    <tbody>
                        <?php for($i=0;$i<count($items);$i++) { ?>
                            <?php 
                            $username = $d->rawQueryOne("select username from #_user where id = ? and hienthi>0 limit 0,1",array($items[$i]['id_user']));
                            ?>
                            <tr>
                                <td class="align-middle">
                                    <a class="text-dark" title="<?=($items[$i]['devicetype']=='computer') ? 'Máy tính' : 'Điện thoại'?>"><?=($items[$i]['devicetype']=='computer') ? 'Máy tính' : 'Điện thoại'?></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark" title="<?=$items[$i]['user_agent']?>"><?=$items[$i]['user_agent']?></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark" title="<?=$items[$i]['ip']?>"><?=$items[$i]['ip']?></a>
                                </td>
                                <td class="align-middle">
                                    <a class="text-dark" title="<?=$items[$i]['id_user']?>"><?=$username['username']?></a>
                                </td>
                                <td class="align-middle"><?=date("h:i:s A - d/m/Y", $items[$i]['timelog'])?></td>
                                
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