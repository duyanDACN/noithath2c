<?php
$countNotify = 0;
$contactNotify = $d->rawQuery("select id from #_contact where hienthi = 0");

$countNotify += count($contactNotify);
if(isset($config['newsletter']))
{
    foreach($config['newsletter'] as $k => $v) 
    {
        $emailNotify = $d->rawQuery("select id from #_newsletter where type = ? and hienthi = 0",array($k));
        $countNotify += count($emailNotify);
    }
}

if(isset($config['order']['active']) && $config['order']['active'] == true)
{
    $orderNotify = $d->rawQuery("select id from #_order where tinhtrang=1");
    $countNotify += count($orderNotify);
}

$avatarUser = $d->rawQueryOne("select avatar, username, ten from #_user where id = ?",array($_SESSION[$login_admin]['id']));
?>
<!-- Header -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm" data-background-color="<?=$setting['color_header']?>" data-themes-main="<?=$setting['themes_main']?>">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link nav-link-menu" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item nav-item-hello d-sm-inline-block">
            <a class="nav-link"><span class="text-split">Xin chào, <b><?=$avatarUser['ten']?></b>!</span></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto navbar-header">
        <li class="nav-item d-sm-inline-block">
            <a href="../" target="_blank" class="nav-link nav-back"><i class="fa fa-undo" aria-hidden="true"></i></a>
        </li>
        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a class="nav-link nav-bell mr-0" data-toggle="dropdown" href="#">
                <i class="fas fa-bell"></i>
                <span class="badge badge-danger"><?=$countNotify?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-notify shadow">
                <span class="dropdown-item dropdown-item-notify dropdown-header">Thông báo</span>
                <a href="index.php?com=contact&act=man" class="dropdown-item"><span class="icon-notify"><img src="assets/images/chuong.png"></span>Liên hệ</a>
                <?php if(isset($config['order']['active']) && $config['order']['active'] == true) { ?>

                    <a href="index.php?com=order&act=man" class="dropdown-item"><span class="icon-notify"><img src="assets/images/chuong.png"></span>Đơn hàng</a>
                <?php } ?>
                <?php if(isset($config['newsletter'])) { ?>

                    <?php foreach($config['newsletter'] as $k => $v) { 
                        $emailNotify = $d->rawQuery("select id from #_newsletter where type = ? and hienthi = 0",array($k)); 
                        ?>
                        <a href="index.php?com=newsletter&act=man&type=<?=$k?>" class="dropdown-item"><span class="icon-notify"><img src="assets/images/chuong.png"></span><?=$v['title_main']?></a>
                        
                    <?php } ?>
                <?php } ?>
            </div>
        </li>
        <li class="nav-item d-sm-inline-block">
            <a href="index.php?com=phone&act=edit" class="nav-link nav-bell" title="Cấu hình điện thoại"><i class="fa fa-phone" aria-hidden="true"></i></a>
        </li>
        <li class="nav-item dropdown">
            <div id="dropdownSubMenu-info" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                <div class="img-dropdownSubMenu">
                    <?php if($avatarUser['avatar']!='') {?>
                        <img src="<?=THUMBS?>/46x46x1/<?=UPLOAD_USER_L.$avatarUser['avatar']?>" alt="<?=$avatarUser['username']?>">
                    <?php }else {?>
                        <img src="assets/images/icon_user.png">
                    <?php }?>
                </div>
                <div class="txt-dropdownSubMenu">
                    <b>Nhà quản trị</b>
                    <p><?=$avatarUser['ten']?></p>
                </div>
            </div>
            <ul aria-labelledby="dropdownSubMenu-info" class="dropdown-menu dropdown-menu-right border-0 shadow">
                <?php if($config['website']['debug-developer'] && count($config['website']['lang']) >= 2) { ?>
                    <li>
                        <a href="index.php?com=lang&act=man" class="dropdown-item">
                            <img src="assets/images/f1.png" alt="Quản lý ngôn ngữ">
                            <span>Quản lý ngôn ngữ</span>
                        </a>
                    </li>
                <?php } ?>
                <?php /*
                <li>
                    <a href="index.php?com=phone&act=edit" class="dropdown-item">
                        <img src="assets/images/menu15.png" alt="Cấu hình điện thoại">
                        <span>Cấu hình điện thoại</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?com=user&act=admin_edit" class="dropdown-item">
                        <img src="assets/images/menu15.png" alt="Cấu hình mạng xã hội">
                        <span>Cấu hình mạng xã hội</span>
                    </a>
                </li>
                */ ?>
                <li>
                    <a href="index.php?com=user&act=admin_edit" class="dropdown-item">
                        <img src="assets/images/f2.png" alt="Thông tin admin">
                        <span>Thông tin admin</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?com=user&act=admin_edit&changepass=1" class="dropdown-item">
                        <img src="assets/images/f3.png" alt="Đổi mật khẩu">
                        <span>Đổi mật khẩu</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?com=history&act=man" class="dropdown-item">
                        <img src="assets/images/f4.png" alt="Lịch sử truy cập">
                        <span>Lịch sử truy cập</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?com=cache&act=delete" class="dropdown-item">
                        <img src="assets/images/f5.png" alt="Xóa bộ nhớ tạm">
                        <span>Xóa bộ nhớ tạm</span>
                    </a>
                </li>
                <div class="dropdown-divider"></div>
                <li>
                    <a href="index.php?com=user&act=logout" class="dropdown-item">
                        <img src="assets/images/f6.png" alt="Đăng xuất">
                        <span>Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>