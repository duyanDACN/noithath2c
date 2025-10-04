<?php
$linkMan = "index.php?com=".$com."&act=man_photo&idc=".$idc."&kind=".$kind."&val=".$val."&type=".$type."&p=".$curPage;
$linkSave = "index.php?com=".$com."&act=save_photo&idc=".$idc."&kind=".$kind."&val=".$val."&type=".$type."&p=".$curPage;
?>

<!-- Main content -->
<section class="content">
	<form method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
		<!-- Content Header -->
		<div class="content-header content-header-vns">
			<div class="container-fluid container-fluid-vns">
				<div class="card-fluid-vns">
					<div class="breadcrumb-vns w-clear">
						<ol class="breadcrumb float-sm-left">
							<li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
							<li class="breadcrumb-item active">Thêm mới <?=$config[$com][$type][$dfgallery][$val]['title_main_photo']?></li>
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

		<?php if(isset($config[$com][$type][$dfgallery][$val]['cart_photo']) && $config[$com][$type][$dfgallery][$val]['cart_photo'] == true) { ?>
			<?php
			$mau = $d->rawQueryOne("select id_mau from #_product where id = ? limit 0,1",array($idc));
			if(isset($mau['id_mau']))
			{
				$idMau = explode(",",$mau['id_mau']);
				$cols = ["tenvi","id","mau","loaihienthi"];
				$d->where('id', $idMau, 'IN');
				$d->where('type', $type);
				$resMau = $d->get("product_mau", null, $cols);
			}
			?>
			<div class="card card-vns card-vns-detail text-sm">
				<div class="card-header-vns">
					<h3 class="card-title">Danh mục màu sắc</h3>
				</div>
				<div class="card-body">
					<?php if(isset($resMau) && count($resMau) > 0) { foreach($resMau as $k => $v) { ?>
						<div class="custom-control custom-radio d-inline-block mr-3 text-md">
							<input class="custom-control-input" type="radio" id="id_mau<?=$k?>" name="data[id_mau]" value="<?=@$v['id']?>">
							<label for="id_mau<?=$k?>" class="custom-control-label font-weight-normal"><?=$v['tenvi']?></label>
						</div>
					<?php } } else { ?>
						<div class="alert alert-warning" role="alert">
							<strong>Không có màu sắc</strong>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
		<?php $numberPhoto = (isset($config[$com][$type][$dfgallery][$val]['number_photo'])) ? $config[$com][$type][$dfgallery][$val]['number_photo'] : 0; ?>
		<?php for($i=0;$i<$numberPhoto;$i++) { $stt = $i+1; ?>
			<div class="card-header-vns">
				<div class="flex-card-slug">
					<div class="title-card-slug">
						<h3 class="card-title"><?=$config[$com][$type][$dfgallery][$val]['title_main_photo'].": ".$stt?></h3>
					</div>
					<div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
							<?php foreach($config['website']['lang'] as $k => $v) { ?>
								<li class="nav-item">
									<a class="nav-link <?=($k=='vi')?'active':''?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?=$k?>-<?=$i?>" role="tab" aria-controls="tabs-lang-<?=$k?>-<?=$i?>" aria-selected="true"><?=$v?></a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="card card-vns-detail text-sm">
				
				<div class="card-body">
					<?php if(isset($config[$com][$type][$dfgallery][$val]['images_photo']) && $config[$com][$type][$dfgallery][$val]['images_photo'] == true) { ?>
						<div class="form-group col-md-4 pl-0 pr-0">
							<?php 
							$photoDetail = UPLOAD_NEWS.@$item['photo'];
							$dimension = "Width: ".$config[$com][$type][$dfgallery][$val]['width_photo']." px - Height: ".$config[$com][$type][$dfgallery][$val]['height_photo']." px (".$config[$com][$type][$dfgallery][$val]['img_type_photo'].")";
							?>
							<div class="photoUpload-zone">
								<div class="photoUpload-detail" id="photoUpload-preview<?=$i?>"><img class="rounded" src="<?=@$photoDetail?>" onerror="src='assets/images/noimage.png'" alt="Alt Photo"/></div>
								<div class="background-photoUpload">
									<label class="photoUpload-file" id="photo-zone<?=$i?>" for="file-zone<?=$i?>">
										<input type="file" name="file<?=$i?>" id="file-zone<?=$i?>">
										<img src="assets/images/icon_noimage.png">
										<p class="photoUpload-drop">Kéo và thả hình vào đây</p>
										<p class="photoUpload-or">hoặc</p>
										<p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
									</label>
								</div>
								<div class="photoUpload-dimension"><?=@$dimension?></div>
							</div>
						</div>
					<?php } ?>
					<?php if(isset($config[$com][$type][$dfgallery][$val]['file_photo']) && $config[$com][$type][$dfgallery][$val]['file_photo'] == true) { ?>
						<div class="form-group">
							<label class="change-file mb-1 mr-2" for="file-taptin<?=$i?>">
								<p>Upload tập tin:</p>
								<strong class="ml-2">
									<span class="btn btn-sm bg-gradient-success"><i class="fas fa-file-upload mr-2"></i>Chọn tập tin</span>
									<div><b class="text-sm text-split"></b></div>
								</strong>
							</label>
							<strong class="d-block mt-2 mb-2 text-sm"><?php echo $config[$com][$type][$dfgallery][$val]['file_type_photo']; ?></strong>
							<div class="custom-file my-custom-file d-none">
								<input type="file" class="custom-file-input" name="file-taptin<?=$i?>" id="file-taptin<?=$i?>">
								<label class="custom-file-label" for="file-taptin<?=$i?>">Chọn file</label>
							</div>
						</div>
					<?php } ?>
					<?php if(isset($config[$com][$type][$dfgallery][$val]['video_photo']) && $config[$com][$type][$dfgallery][$val]['video_photo'] == true) { ?>
						<div class="form-group">
							<label for="link_video<?=$i?>">Video:</label>
							<input type="text" class="form-control" name="dataMulti[<?=$i?>][link_video]" id="link_video<?=$i?>" onchange="youtubePreview(this.value,'#loadVideo<?=$i?>');" placeholder="Video">
						</div>
						<div class="form-group">
							<label for="link_video">Video preview:</label>
							<div><iframe id="loadVideo<?=$i?>" width="0px" height="0px" frameborder="0" allowfullscreen></iframe></div>
						</div>
					<?php } ?>
					<div class="form-group">
						<label for="hienthi<?=$i?>" class="d-inline-block align-middle mb-0 mr-2">Hiển thị:</label>
						<div class="custom-control custom-checkbox d-inline-block align-middle">
							<input type="checkbox" class="custom-control-input hienthi-checkbox" name="dataMulti[<?=$i?>][hienthi]" id="hienthi-checkbox<?=$i?>" checked>
							<label for="hienthi-checkbox<?=$i?>" class="custom-control-label"></label>
						</div>
					</div>
					<div class="form-group">
						<label for="stt<?=$i?>" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
						<input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0" name="dataMulti[<?=$i?>][stt]" id="stt<?=$i?>" placeholder="Số thứ tự" value="1">
					</div>
					<?php if(isset($config[$com][$type][$dfgallery][$val]['tieude_photo']) && $config[$com][$type][$dfgallery][$val]['tieude_photo'] == true) { ?>
						<div class="card card-vns-detail card-outline card-outline-tabs">
							<div class="card-header p-0 border-bottom-0">
								<ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
									<?php foreach($config['website']['lang'] as $k => $v) { ?>
										<li class="nav-item">
											<a class="nav-link <?=($k=='vi')?'active':''?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?=$k?>-<?=$i?>" role="tab" aria-controls="tabs-lang-<?=$k?>-<?=$i?>" aria-selected="true"><?=$v?></a>
										</li>
									<?php } ?>
								</ul>
							</div>
							<div class="card-body">
								<div class="tab-content" id="custom-tabs-three-tabContent-lang">
									<?php foreach($config['website']['lang'] as $k => $v) { ?>
										<div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-lang-<?=$k?>-<?=$i?>" role="tabpanel" aria-labelledby="tabs-lang">
											<?php if(isset($config[$com][$type][$dfgallery][$val]['tieude_photo']) && $config[$com][$type][$dfgallery][$val]['tieude_photo'] == true) { ?>
												<div class="form-group">
													<label for="ten<?=$k?><?=$i?>">Tiêu đề (<?=$k?>):</label>
													<input type="text" class="form-control" name="dataMulti[<?=$i?>][ten<?=$k?>]" id="ten<?=$k?><?=$i?>" placeholder="Tiêu đề (<?=$k?>)">
												</div>
											<?php } ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
		<div class="card-footer text-sm">
			<button type="submit" class="btn btn-sm bg-gradient-primary"><i class="far fa-save mr-2"></i>Lưu</button>
			<button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
			<a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
		</div>
	</form>
</section>