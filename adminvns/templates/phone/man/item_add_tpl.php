<?php 
$linkMan = "index.php?com=phone&act=save";
$linkSave = "index.php?com=phone&act=save";
$options = (isset($item['options']) && $item['options'] != '') ? json_decode($item['options'],true) : null;
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
							<li class="breadcrumb-item active">Cấu hình điện thoại</li>
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
				<h3 class="card-title">Mẫu điện thoại</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="form-group col-md-4 col-sm-6">
						<div class="view-ext">
							<img src="assets/images/hotline1.png" alt="hotline1">
						</div>
						<div class="custom-control custom-radio text-md mt-3">
							<input class="custom-control-input" type="radio" id="hotline1" value="hotline1" name="data[options][hotline]" <?=($options['hotline']=='hotline1')?'checked':''?>>
							<label for="hotline1" class="custom-control-label font-weight-normal">
								Mẫu 1
							</label>
						</div>
					</div>
					<div class="form-group col-md-4 col-sm-6">
						<div class="view-ext">
							<img src="assets/images/hotline2.png" alt="hotline2">
						</div>
						<div class="custom-control custom-radio text-md mt-3">
							<input class="custom-control-input" type="radio" id="hotline2" value="hotline2" name="data[options][hotline]" <?=($options['hotline']=='hotline2')?'checked':''?>>
							<label for="hotline2" class="custom-control-label font-weight-normal">
								Mẫu 2
							</label>
						</div>
					</div>
					<div class="form-group col-md-4 col-sm-6">
						<div class="view-ext">
							<img src="assets/images/hotline3.png" alt="hotline3">
						</div>
						<div class="custom-control custom-radio text-md mt-3">
							<input class="custom-control-input" type="radio" id="hotline3" value="hotline3" name="data[options][hotline]" <?=($options['hotline']=='hotline3')?'checked':''?>>
							<label for="hotline3" class="custom-control-label font-weight-normal">
								Mẫu 3
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4 col-sm-4">
						<div class="mb-2">
							<label class="d-block">Background (icon)</label>
							<input type="text" class="form-control jscolor text-sm" name="data[options][background]" maxlength="7" value="<?=$options['background']?>">
						</div>
					</div>
					<div class="form-group col-md-4 col-sm-4">
						<div class="mb-2">
							<label class="d-block">Background (hotline)</label>
							<input type="text" class="form-control jscolor text-sm" name="data[options][background-text]" maxlength="7" value="<?=$options['background-text']?>">
						</div>
					</div>
					<div class="form-group col-md-4 col-sm-4">
						<div class="mb-2">
							<label class="d-block">Màu chữ</label>
							<input type="text" class="form-control jscolor text-sm" name="data[options][color]" maxlength="7" value="<?=$options['color']?>">
						</div>
					</div>
					<div class="form-group col-md-12 col-sm-12">
						<label class="mb-2 tt-15">Thiết bị</label>
						<div class="row-form-group row-form-group-phone mb-3 mt-0">
							<div class="form-group mb-0">
								<div class="custom-control custom-checkbox d-inline-block align-middle">
									<input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[options][destop][device]" id="hienthi-checkbox" <?=($options['destop']['device']=='on')?'checked':''?>>
									<label for="hienthi-checkbox" class="click-checkbox <?=($options['destop']['device']=='on')?'checked':''?>"></label>
								</div>
								<label for="hienthi" class="d-inline-block align-middle mb-0 ml-2">Desktop</label>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12 col-sm-12 row">
								<div class="form-group col-md-4 col-sm-12">
									<label class="d-block">Khoảng cách trái (px)</label>
									<input type="numb" name="data[options][destop][left]" value="<?=($options['destop']['left'] > 0) ? $options['destop']['left'] : 0?>" class="form-control">
								</div>
								<div class="form-group col-md-4 col-sm-12">
									<label class="d-block">Khoảng cách phải (px)</label>
									<input type="numb" name="data[options][destop][right]" value="<?=($options['destop']['right'] > 0) ? $options['destop']['right'] : 0?>" class="form-control">
								</div>
								<div class="form-group col-md-4 col-sm-12">
									<label class="d-block">Khoảng cách bottom (px)</label>
									<input type="numb" name="data[options][destop][bottom]" value="<?=($options['destop']['bottom'] > 0) ? $options['destop']['bottom'] : 0?>" class="form-control">
								</div>
							</div>
							<div class="form-group mt-3 col-md-6 col-sm-6">
								<div class="row-form-group row-form-group-phone mb-3 mt-0">
									<div class="form-group mb-0">
										<div class="custom-control custom-checkbox d-inline-block align-middle">
											<input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[options][mobile][device]" id="hienthi-checkbox-mobile" <?=($options['mobile']['device']=='on')?'checked':''?>>
											<label for="hienthi-checkbox-mobile" class="click-checkbox <?=($options['mobile']['device']=='on')?'checked':''?>"></label>
										</div>
										<label for="hienthi" class="d-inline-block align-middle mb-0 ml-2">Mobile</label>
									</div>
								</div>
							</div>
							<div class="form-group col-md-12 col-sm-12 row">
								<div class="form-group col-md-4 col-sm-12">
									<h6 class="mb-2 tt-15">Khoảng cách trái (px)</h6>
									<input type="numb" name="data[options][mobile][left]" value="<?=($options['mobile']['left'] > 0) ? $options['mobile']['left'] : 0?>" class="form-control">
								</div>
								<div class="form-group col-md-4 col-sm-12">
									<h6 class="mb-2 tt-15">Khoảng cách phải (px)</h6>
									<input type="numb" name="data[options][mobile][right]" value="<?=($options['mobile']['right'] > 0) ? $options['mobile']['right'] : 0?>" class="form-control">
								</div>
								<div class="form-group col-md-4 col-sm-12">
									<h6 class="mb-2 tt-15">Khoảng cách bottom (px)</h6>
									<input type="numb" name="data[options][mobile][bottom]" value="<?=($options['mobile']['bottom'] > 0) ? $options['mobile']['bottom'] : 0?>" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="sodienthoai">Số điện thoại</label>
					<input type="text" class="form-control" name="data[sodienthoai]" id="sodienthoai" placeholder="Số điện thoại" value="<?=@$item['sodienthoai']?>">
					<p class="note mt-2">Nếu nhiều hơn 2 số điện thoại bạn vui lòng nhập ký tự "-" giữa các số, ví dụ 098... - 097...</p>
				</div>
				<div class="row-form-group row-form-group-phone mb-3 mt-0">
					<div class="form-group mb-0">
						<div class="custom-control custom-checkbox d-inline-block align-middle">
							<input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]" id="hienthi-checkbox-all" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
							<label for="hienthi-checkbox-all" class="click-checkbox <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>"></label>
						</div>
						<label for="hienthi" class="d-inline-block align-middle mb-0 ml-2">Hiển thị</label>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
	</form>
</section>