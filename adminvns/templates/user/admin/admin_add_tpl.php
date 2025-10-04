<?php
if(isset($_GET['changepass']) && ($_GET['changepass'] == 1)) $changepass = "&changepass=1";
else $changepass = "";
$linkSave = "index.php?com=user&act=admin_edit".$changepass;
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
							<li class="breadcrumb-item active">Thông tin tài khoản</li>
						</ol>
					</div>
					<div class="card-footer card-footer-detail-vns text-sm sticky-top">
						<button type="submit" class="btn btn-sm bg-gradient-primary submit-check">Lưu</button>
						<button type="reset" class="btn btn-sm bg-gradient-secondary">Làm lại</button>
					</div>
				</div>
			</div>
		</div>
		<div class="card-header-vns">
			<h3 class="card-title" style="float:none;">Thông tin admin</h3>
		</div>
		<?php if(isset($changepass) && $changepass != '') { ?>
			<div class="card card-vns card-vns-detail text-sm">
				<div class="card-body">
					<div class="row">
						<div class="form-group col-xl-4 col-lg-6 col-md-6">
							<label for="old-password">Mật khẩu cũ:</label>
							<input type="password" class="form-control" name="old-password" id="old-password" placeholder="Mật khẩu cũ">
						</div>
						<div class="form-group col-xl-4 col-lg-6 col-md-6">
							<label for="new-password" style="line-height:22.7px;">
								<span class="d-inline-block align-middle">Mật khẩu mới:</span>
								<span class="text-danger ml-2" id="show-password"></span>
							</label>
							<div class="row align-items-center justify-content-between">
								<div class="col-9-vns"><input type="password" class="form-control" name="new-password" id="new-password" placeholder="Mật khẩu mới"></div>
								<div class="col-3-vns"><a class="btn btn-sm bg-gradient-primary text-sm text-dark btn-change-password" href="#" onclick="randomPassword()">Tạo mật khẩu</a></div>
							</div>
						</div>
						<div class="form-group col-xl-4 col-lg-6 col-md-6">
							<label for="renew-password">Nhập lại mật khẩu mới:</label>
							<input type="password" class="form-control" name="renew-password" id="renew-password" placeholder="Nhập lại mật khẩu mới">
						</div>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="row">
				<div class="col-xl-8">
					<div class="card card-vns text-sm">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="username">Tài khoản: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="data[username]" id="username" placeholder="Tài khoản" value="<?=@$item['username']?>" required>
								</div>
								<div class="form-group col-md-6">
									<label for="ten">Họ tên: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="data[ten]" id="ten" placeholder="Họ tên" value="<?=@$item['ten']?>" required>
								</div>
								<div class="form-group col-md-6">
									<label for="email">Email:</label>
									<input type="email" class="form-control" name="data[email]" id="email" placeholder="Email" value="<?=@$item['email']?>">
								</div>
								<div class="form-group col-md-6">
									<label for="dienthoai">Điện thoại:</label>
									<input type="text" class="form-control" name="data[dienthoai]" id="dienthoai" placeholder="Điện thoại" value="<?=@$item['dienthoai']?>">
								</div>
								<div class="form-group col-md-6">
									<label for="gioitinh">Giới tính:</label>
									<select class="form-control" name="data[gioitinh]" id="gioitinh">
										<option value="0">Chọn giới tính</option>
										<option <?=(@$item['gioitinh']==1)?"selected":""?> value="1">Nam</option>
										<option <?=(@$item['gioitinh']==2)?"selected":""?> value="2">Nữ</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="ngaysinh">Ngày sinh:</label>
									<input type="text" class="form-control" name="data[ngaysinh]" id="ngaysinh" placeholder="Ngày sinh" value="<?=(@$item['ngaysinh'])?date('d/m/Y',@$item['ngaysinh']):"";?>" readonly>
								</div>
								<div class="form-group col-md-6">
									<label for="diachi">Địa chỉ:</label>
									<input type="text" class="form-control" name="data[diachi]" id="diachi" placeholder="Địa chỉ" value="<?=@$item['diachi']?>">
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="col-xl-4">
					<div class="card card-vns card-vns-detail text-sm">
						<div class="card-body">
							<?php if(isset($config['user']['images']) && $config['user']['images'] == true) { ?>
								<div class="card-header-right">
									<h3 class="card-title">Hình ảnh đại diện</h3>
								</div>
								<div class="form-group">
									<?php
									$photoDetail = UPLOAD_USER.@$item['avatar'];
									$dimension = "Width: ".$config['user']['width']." px - Height: ".$config['user']['height']." px (".$config['user']['img_type'].")";
									include TEMPLATE.LAYOUT."image.php";
									?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
	</form>
</section>

<!-- User js -->
<script type="text/javascript">
	function randomPassword()
	{
		var chuoi = "";
		for(i=0;i<9;i++)
		{
			chuoi += "!@#$%^&*()?abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890".charAt(Math.floor(Math.random()*62));
		}
		jQuery('#new-password').val(chuoi);
		jQuery('#renew-password').val(chuoi);
		jQuery('#show-password').html(chuoi);
	}
	
	$(document).ready(function(){
		$('#ngaysinh').datetimepicker({
			timepicker: false,
			format: 'd/m/Y',
			formatDate: 'd/m/Y',
	        // minDate: '1950/01/01',
	        maxDate: '<?=date("Y/m/d",time())?>'
	    });
	});
</script>