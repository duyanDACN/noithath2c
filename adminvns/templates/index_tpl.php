<?php
if((isset($_GET['month']) && $_GET['month'] != '') && (isset($_GET['year']) && $_GET['year'] != ''))
{
    $time = $_GET['year'].'-'.$_GET['month'].'-1';
    $date = strtotime($time);
}
else
{
    $date = strtotime(date('y-m-d')); 
}

$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);
$firstDay = mktime(0,0,0,$month, 1, $year);
$title = strftime('%B', $firstDay);
$dayOfWeek = date('D', $firstDay);
$daysInMonth = cal_days_in_month(0, $month, $year);
$timestamp = strtotime('next Sunday');
$weekDays = array();

for($i=0;$i<7;$i++)
{
    $weekDays[] = strftime('%a', $timestamp);
    $timestamp = strtotime('+1 day', $timestamp);
}

$blank = date('w', strtotime("{$year}-{$month}-01"));

$countIP = $d->rawQuery("select ip, count(id) as countid from #_counter group by ip order by countid desc limit 0,10");
$countUserAgent = $d->rawQuery("select user_agent from #_counter");
$countChrome = $d->rawQueryOne("select count(id) as countid from #_counter where user_agent like '%Chrome%'");
$countDeviceDesktop = $d->rawQueryOne("select count(id) as countid from #_counter where devicetype = 'computer'");
$countDeviceMobile = $d->rawQueryOne("select count(id) as countid from #_counter where devicetype = 'mobile'");
$countThietBi = $d->rawQuery("select id_user, count(user_agent) as cuser_agent from #_user_log group by id_user order by cuser_agent desc limit 0,10");

$counter = $statistic->getCounter();
$online = $statistic->getOnline();

$deviceType = ($detect->isMobile() || $detect->isTablet()) ? 'mobile' : 'computer';

$getUser = $d->rawQuery("select avatar, email, ten from #_member where hienthi > 0 order by stt,id desc limit 0,10");
?>
<!-- Main content -->
<section class="content mb-3">
    <div class="container-fluid">
        <h5 class="pt-4 pb-1">Bảng điều khiển</h5>
        <div class="row-custom mb-2 text-sm">
            <div class="box-custom">
                <a class="my-info-box" href="index.php?com=setting&act=capnhat" title="Cấu hình website">
                    <span class="my-info-box-icon info-box-icon"><img src="assets/images/icon1.png"></span>
                    <div class="info-box-content text-dark">
                        <span class="info-box-text text-capitalize">Cấu hình website</span>
                        <span class="info-box-number">Xem chi tiết</span>
                    </div>
                </a>
            </div>
            <div class="box-custom">
                <a class="my-info-box" href="index.php?com=user&act=admin_edit" title="Tài khoản">
                    <span class="my-info-box-icon info-box-icon"><img src="assets/images/icon2.png"></span>
                    <div class="info-box-content text-dark">
                        <span class="info-box-text text-capitalize">Tài khoản</span>
                        <span class="info-box-number">Xem chi tiết</span>
                    </div>
                </a>
            </div>
            
            <div class="box-custom">
                <a class="my-info-box" href="index.php?com=user&act=admin_edit&changepass=1" title="Đổi mật khẩu">
                    <span class="my-info-box-icon info-box-icon"><img src="assets/images/icon3.png"></span>
                    <div class="info-box-content text-dark">
                        <span class="info-box-text text-capitalize">Đổi mật khẩu</span>
                        <span class="info-box-number">Xem chi tiết</span>
                    </div>
                </a>
            </div>
            <div class="box-custom">
                <a class="my-info-box" href="index.php?com=contact&act=man" title="Thư liên hệ">
                    <span class="my-info-box-icon info-box-icon"><img src="assets/images/icon4.png"></span>
                    <div class="info-box-content text-dark">
                        <span class="info-box-text text-capitalize">Thư liên hệ</span>
                        <span class="info-box-number">Xem chi tiết</span>
                    </div>
                </a>
            </div>
        </div>
        
    </div>
</section>

<section class="content pb-2">
 <div class="container-fluid">
    <div class="flex-header-charts">
        <div class="left-charts">
            <div class="header-charts">
               <div class="title-header-charts mb-0">
                   <h5 class="mb-0">Thống kê truy cập tháng <?=$month?>/<?=$year?></h5>
               </div>
               <form class="form-filter-charts d-flex align-items-center mb-1" action="index.php" method="get" name="form-thongke" accept-charset="utf-8">
                <div class="col-filter-charts">
                    <div class="form-group">
                        <select class="form-control select2" name="month" id="month">
                            <option value="">Chọn tháng</option>
                            <?php for($i=1; $i<=12 ;$i++) { ?>
                                <?php
                                if(isset($_GET['year'])) $selected = ($i==$_GET['month']) ? 'selected':'';
                                else $selected = ($i==date('m')) ? 'selected':'';
                                ?>
                                <option value="<?=$i?>" <?=$selected?>>Tháng <?=$i?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-filter-charts">
                    <div class="form-group">
                        <select class="form-control select2" name="year" id="year">
                            <option value="">Chọn năm</option>
                            <?php for($i=2000;$i<=date('Y')+20;$i++) { ?>
                                <?php
                                if(isset($_GET['year'])) $selected = ($i==$_GET['year']) ? 'selected':'';
                                else $selected = ($i==date('Y')) ? 'selected':'';
                                ?>
                                <option value="<?=$i?>" <?=$selected?>>Năm <?=$i?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-filter-charts">
                    <div class="form-group"><button type="submit" class="btn btn-thongke">Thống kê</button></div>
                </div>
            </form>
        </div>
        <div class="card card-counter">
            <div class="card-body">
                <div id="apexMixedChart"></div>
            </div>
        </div>
    </div>
    <div class="right-charts">
        <div class="box-charts">
            <div class="title-header-charts">
                <h5 class="mb-0">Thống kê truy cập</h5>
            </div>
            <div class="pos-donutTop">
                <div id="donutTop"></div>
                <p class="online-donutTop">Đang online <span><?=$online?></span></p>
            </div>
            <div id="detail-donutTop">
                <p><span></span>Đang online</p>
                <p><span></span>Trong tuần</p>
                <p><span></span>Trong tháng</p>
                <p><span></span>Tổng truy cập</p>
            </div>
            <input type="hidden" class="week" name="week" data-value="<?=$counter['week']?>">
            <input type="hidden" class="month" name="month" data-value="<?=$counter['month']?>">
            <input type="hidden" class="total" name="total" data-value="<?=$counter['total']?>">
        </div>
    </div>
</div>
<div id="statistical">
    <div class="row-custom">
        <div class="col-statistital <?php if($config['user']['visitor'] != true) echo 'col-statistital-3';?>">
            <div class="title-header-charts">
                <h5 class="mb-0">Thống kê trình duyệt</h5>
            </div>
            <div class="box-statistital">
                <div class="count-item">
                    <ul>
                        <?php 
                        $O = 0;
                        $E = 0;
                        $C = 0;
                        $S = 0;
                        $F = 0;
                        $I = 0;
                        $Oth = 0;
                        ?>
                        <?php foreach ($countUserAgent as $q => $w): ?>
                            <?php 
                            if (strpos($w['user_agent'], 'Opera') || strpos($w['user_agent'], 'OPR/')) $O++;
                            elseif (strpos($w['user_agent'], 'Edge')) $E++;
                            elseif (strpos($w['user_agent'], 'Chrome')) $C++;
                            elseif (strpos($w['user_agent'], 'Safari')) $S++;
                            elseif (strpos($w['user_agent'], 'Firefox')) $F++;
                            elseif (strpos($w['user_agent'], 'MSIE') || strpos($w['user_agent'], 'Trident/7')) $I++;
                            else $Oth++;
                            ?>
                        <?php endforeach ?>

                        <li>
                            <span><img src="assets/images/icon_chrome.png" alt="Chorme">Chorme</span><span><?=$countChrome['countid']?></span>
                        </li> 
                        <li>
                            <span><img src="assets/images/icon_edge.png" alt="Microsoft Edge">Microsoft Edge</span><span><?=$E?></span>
                        </li>
                        <li>
                            <span><img src="assets/images/icon_internetex.png" alt="Internet Explorer">Internet Explorer</span><span><?=$I?></span>
                        </li>
                        <li>
                            <span><img src="assets/images/icon_filefox.png" alt="Mozilla Filefox">Mozilla Filefox</span><span><?=$F?></span>
                        </li>
                        <li>
                            <span><img src="assets/images/icon_safari.png" alt="Safari">Safari</span><span><?=$S?></span>
                        </li>
                        <li>
                            <span><img src="assets/images/icon_opera.png" alt="Opera">Opera</span><span><?=$O?></span>
                        </li>
                        <li>
                            <span><img src="assets/images/icon_orther.png" alt="Khác">Khác</span><span><?=$Oth?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-statistital <?php if($config['user']['visitor'] != true) echo 'col-statistital-3';?>">
            <div class="title-header-charts">
                <h5 class="mb-0">Thống kê thiết bị</h5>
            </div>
            <?php 
            $deg = round($countDeviceDesktop['countid']/($countDeviceDesktop['countid']+$countDeviceMobile['countid'])*100)*3.6;
            $deg2 = round($countDeviceMobile['countid']/($countDeviceDesktop['countid']+$countDeviceMobile['countid'])*100)*3.6;
            ?>
            <div class="box-statistital">
                <div class="count-item-device">
                    <div class="box-item-device">
                        <div class="img-item-device">
                            <span><img src="assets/images/icon_maytinh.png"></span>
                            <div class="overlay"></div>
                            
                            <div class="left" style="--deg:<?=($deg > 180) ? 180 : $deg?>deg"></div>
                            <?php if($deg > 180) {?>
                                <div class="right" style="--deg:<?=$deg?>deg"></div>
                            <?php }?>
                        </div>
                        <div class="txt-item-device">
                            <h6 class="mb-0"><?=round($countDeviceDesktop['countid']/($countDeviceDesktop['countid']+$countDeviceMobile['countid'])*100)?>%</h6>
                            <p class="mb-0"><?=$countDeviceDesktop['countid']?> lượt truy cập</p>
                        </div>
                    </div>
                    <div class="box-item-device">
                        <div class="img-item-device">
                            <span><img src="assets/images/icon_mobile.png"></span>
                            <div class="overlay"></div>
                            <div class="left" style="--deg:<?=($deg2 > 180) ? 180 : $deg2?>deg"></div>
                            <?php if($deg2 > 180) {?>
                                <div class="right" style="--deg:<?=$deg2?>deg"></div>
                            <?php }?>
                        </div>
                        <div class="txt-item-device">
                            <h6 class="mb-0"><?=round($countDeviceMobile['countid']/($countDeviceDesktop['countid']+$countDeviceMobile['countid'])*100)?>%</h6>
                            <p class="mb-0"><?=$countDeviceMobile['countid']?> lượt truy cập</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-statistital <?php if($config['user']['visitor'] != true) echo 'col-statistital-3';?>">
            <div class="title-header-charts">
                <h5 class="mb-0">Thống kê IP</h5>
            </div>
            <div class="box-statistital box-statistital-ip">
                <div class="count-item">
                    <ul>
                        <?php foreach ($countIP as $q => $w): ?>
                            <li>
                                <span><?=$w['ip']?></span><span><?=$w['countid']?> lần</span>
                            </li>
                        <?php endforeach ?>  
                    </ul>
                </div>
            </div>
        </div>
        <?php if(isset($config['user']['visitor']) && $config['user']['visitor'] == true) {?>
            <div class="col-statistital">
                <div class="title-header-charts">
                    <h5 class="mb-0">Khách hàng mới</h5>
                </div>
                <div class="box-statistital">
                    <div class="count-item-user">
                        <?php foreach ($getUser as $q => $w): ?>
                            <div class="box-item-user">
                                <div class="img-item-user">
                                    <?php if($w['avatar']) {?>
                                        <img src="<?=THUMBS?>/40x40x1/<?=UPLOAD_USER_L.$w['avatar']?>" alt="<?=$w['ten']?>">
                                    <?php }else {?>
                                        <img src="assets/images/icon_user.png">
                                    <?php }?>
                                </div>
                                <div class="txt-item-user">
                                    <h6 class="mb-0"><?=$w['ten']?></h6>
                                    <p class="mb-0"><?=$w['email']?></p>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div>
</div>
</section>
<style>
    .container-fluid{
        padding-left: 0;
        padding-right: 0;
    }
</style>
<script src="assets/apexcharts/apexcharts.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var apexMixedChart;
        var options = {
            colors: ['#d2bf58'],
            chart:
            {
                id: 'apexMixedChart',
                height: 330,
                type: 'line',
                dropShadow:
                {
                    enabled: true,
                    color: '#d2bf58',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.5
                }
            },
            series: [{
                name: 'Thống kê truy cập tháng <?=$month?>',
                type: 'line',
                data: [
                <?php for($i = 1; $i <= $daysInMonth; $i++) {
                    $k = $i+1;
                    $begin = strtotime($year.'-'.$month.'-'.$i);
                    $end = strtotime($year.'-'.$month.'-'.$k);
                    $todayrc = $d->rawQueryOne("select count(*) as todayrecord from #_counter where tm >= ? and tm < ?",array($begin,$end));
                    $today_visitors = $todayrc['todayrecord']; ?>
                    <?=$today_visitors?>,
                <?php } ?>
                ]
            }],
            stroke: {
              curve: 'smooth'
          },
          grid: {
            borderColor: '#e7e7e7',
            row: {
                colors: ['#f3f3f3', 'transparent'],
                opacity: 0.5
            },
        },
        markers: {
            size: 1
        },
        dataLabels: {
            enabled: false
        },
        labels: [
        <?php for($i = 1; $i <= $daysInMonth; $i++) {
            $k = $i+1;
            $begin = strtotime($year.'-'.$month.'-'.$i);
            $end = strtotime($year.'-'.$month.'-'.$k);
            $todayrc = $d->rawQueryOne("select count(*) as todayrecord from #_counter where tm >= ? and tm < ?",array($begin,$end));
            $today_visitors = $todayrc['todayrecord']; ?>
            'D<?=$i?>',
        <?php } ?>
        ],
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            floating: true,
            offsetY: -25,
            offsetX: -5
        }
    }

    apexMixedChart = new ApexCharts(document.querySelector("#apexMixedChart"), options);
    apexMixedChart.render();

    var cweek = $("input.week").data('value');
    var cmonth = $("input.month").data('value');
    var ctotal = $("input.total").data('value');

    var optionsDonutTop = {
      chart: {
        height: 280,
        type: 'donut',
        offsetY: 20
    },
    plotOptions: {
        pie: {
          customScale: 1,
          donut: {
            size: '58%',
        }
    }
},
colors: ['#f4db55', '#6083e8', '#f96c6c'],
title: {
    text: ''
},
series: [cweek, cmonth, ctotal],

labels: ['', '', ''],
dataLabels: {
    enabled: false,
},
legend: {
    show: false
}
}
var chartDonut2 = new ApexCharts(document.querySelector('#donutTop'), optionsDonutTop);
chartDonut2.render().then(function () {
});
});
</script>