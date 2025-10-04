<?php
function get_mau($id=0)
{
	global $d, $type;
	if($id)
	{
		$temps = $d->rawQueryOne("select id_mau from #_product where id = ? and type = ? limit 0,1",array($id,$type));
		$arr_mau = explode(',', $temps['id_mau']);
		for($i=0;$i<count($arr_mau);$i++) $temp[$i]=$arr_mau[$i];
	}
	$row_mau = $d->rawQuery("select tenvi, id from #_product_mau where type = ? order by stt,id desc",array($type));
	$str = '<select id="mau_group" name="mau_group[]" class="select multiselect" multiple="multiple" >';
	for($i=0;$i<count($row_mau);$i++)
	{
		if(isset($temp) && count($temp) > 0)
		{
			if(in_array($row_mau[$i]['id'],$temp)) $selected = 'selected="selected"';
			else $selected = '';
		}
		else
		{
			$selected = '';
		}
		$str .= '<option value="'.$row_mau[$i]["id"].'" '.$selected.' /> '.$row_mau[$i]["tenvi"].'</option>';
	}
	$str .= '</select>';
	return $str;
}
function get_size($id=0)
{
	global $d, $type;
	if($id)
	{
		$temps = $d->rawQueryOne("select id_size from #_product where id = ? and type = ? limit 0,1",array($id,$type));
		$arr_size = explode(',', $temps['id_size']);
		for($i=0;$i<count($arr_size);$i++) $temp[$i]=$arr_size[$i];
	}
	$row_size = $d->rawQuery("select tenvi, id from #_product_size where type = ? order by stt,id desc",array($type));
	$str = '<select id="size_group" name="size_group[]" class="select multiselect" multiple="multiple" >';
	for($i=0;$i<count($row_size);$i++)
	{
		if(isset($temp) && count($temp) > 0)
		{	
			if(in_array($row_size[$i]['id'],$temp)) $selected = 'selected="selected"';
			else $selected = '';
		}
		else
		{
			$selected = '';
		}
		$str .= '<option value="'.$row_size[$i]["id"].'" '.$selected.' /> '.$row_size[$i]["tenvi"].'</option>';
	}
	$str .= '</select>';
	return $str;
}
$getSize = $d->rawQuery("select tenvi, id from #_product_size where type = ? order by stt,id desc",array($type));
if($act=="add") $labelAct = "Thêm mới";
else if($act=="edit") $labelAct = "Chỉnh sửa";
else if($act=="copy")  $labelAct = "Sao chép";
$linkMan = "index.php?com=product&act=man&type=".$type."&p=".$curPage;
if($act=='add') $linkFilter = "index.php?com=product&act=add&type=".$type."&p=".$curPage;
else if($act=='edit') $linkFilter = "index.php?com=product&act=edit&type=".$type."&p=".$curPage."&id=".$id;
if($act=="copy") $linkSave = "index.php?com=product&act=save_copy&type=".$type."&p=".$curPage;
else $linkSave = "index.php?com=product&act=save&type=".$type."&p=".$curPage;
/* Check cols */
if(isset($config['product'][$type]['gallery']) && count($config['product'][$type]['gallery']) > 0)
{
	foreach($config['product'][$type]['gallery'] as $key => $value)
	{
		if($key == $type)
		{
			$flagGallery = true;
			break;
		}
	}
}
if(
	(isset($config['product'][$type]['dropdown']) && $config['product'][$type]['dropdown'] == true) || 
	(isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true) || 
	(isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true) || 
	(isset($config['product'][$type]['mau']) && $config['product'][$type]['mau'] == true) || 
	(isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true) || 
	(isset($config['product'][$type]['images']) && $config['product'][$type]['images'] == true))
{
	$colLeft = "col-xl-12";
	$colRight = "col-xl-12";
}
else
{
	$colLeft = "col-12";
	$colRight = "d-none";	
}
?>
<!-- Main content -->
<section class="content">
	<form class="validation-form" novalidate method="post" action="<?=$linkSave?>" enctype="multipart/form-data">
		<!-- Content Header -->
		<div class="content-header content-header-vns">
			<div class="container-fluid container-fluid-vns">
				<div class="card-fluid-vns">
					<div class="breadcrumb-vns w-clear">
						<ol class="breadcrumb float-sm-left">
							<li class="breadcrumb-item"><a href="index.php" title="Bảng điều khiển">Bảng điều khiển</a></li>
							<li class="breadcrumb-item active"><?=$labelAct?> <?=$config['product'][$type]['title_main']?></li>
						</ol>
					</div>
					<div class="card-footer card-footer-detail-vns text-sm sticky-top">
						<button type="submit" class="btn btn-sm bg-gradient-primary submit-check">Lưu</button>
						<button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here">Lưu tại trang</button>
						<button type="reset" class="btn btn-sm bg-gradient-secondary">Làm lại</button>
						<a class="btn btn-sm bg-gradient-danger" href="<?=$linkMan?>" title="Thoát">Thoát</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="<?=$colLeft?>">
				<?php if(
					(isset($config['product'][$type]['dropdown']) && $config['product'][$type]['dropdown'] == true) || 
					(isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true) || 
					(isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true) || 
					(isset($config['product'][$type]['mau']) && $config['product'][$type]['mau'] == true) || 
					(isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true)
				) { ?>
					<div class="card card-vns card-vns-detail text-sm">
						<div class="card-header-vns">
							<h3 class="card-title">Danh mục <?=$config['product'][$type]['title_main']?></h3>
						</div>
						<div class="card-body">
							<div class="form-group-category row">
								<?php if(isset($config['product'][$type]['dropdown']) && $config['product'][$type]['dropdown'] == true) { ?>
									<?php if(isset($config['product'][$type]['list']) && $config['product'][$type]['list'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-4">
											<label class="d-block" for="id_list">Danh mục cấp 1:</label>
											<?=$func->get_ajax_category('product', 'list', $type)?>
										</div>
									<?php } ?>
									<?php if(isset($config['product'][$type]['cat']) && $config['product'][$type]['cat'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-4">
											<label class="d-block" for="id_cat">Danh mục cấp 2:</label>
											<?=$func->get_ajax_category('product', 'cat', $type)?>
										</div>
									<?php } ?>
									<?php if(isset($config['product'][$type]['item']) && $config['product'][$type]['item'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-4">
											<label class="d-block" for="id_item">Danh mục cấp 3:</label>
											<?=$func->get_ajax_category('product', 'item', $type)?>
										</div>
									<?php } ?>
									<?php if(isset($config['product'][$type]['sub']) && $config['product'][$type]['sub'] == true) { ?>
										<div class="form-group col-xl-6 col-sm-4">
											<label class="d-block" for="id_sub">Danh mục cấp 4:</label>
											<?=$func->get_ajax_category('product', 'sub', $type)?>
										</div>
									<?php } ?>
								<?php } ?>
								<?php if(isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true) { ?>
									<div class="form-group col-xl-6 col-sm-4">
										<label class="d-block" for="id_brand">Danh mục hãng:</label>
										<?=$func->get_ajax_category('product', 'brand', $type, 'Chọn hãng')?>
									</div>
								<?php } ?>
								<?php if(isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true) { ?>
									<div class="form-group col-xl-6 col-sm-4">
										<label class="d-block" for="id_tags">Danh mục tags:</label>
										<?=$func->get_tags(@$item['id'], 'tags_group', 'product', $type)?>
									</div>
								<?php } ?>
								<?php if(isset($config['product'][$type]['mau']) && $config['product'][$type]['mau'] == true) { ?>
									<div class="form-group col-xl-6 col-sm-4">
										<label class="d-block" for="id_mau">Danh mục màu sắc:</label>
										<?=get_mau(@$item['id'])?>
									</div>
								<?php } ?>
								<?php /*
								<?php if(isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true) { ?>
									<div class="form-group col-xl-6 col-sm-4">
										<label class="d-block" for="id_size">Danh mục kích thước:</label>
										<?=get_size(@$item['id'])?>
									</div>
								<?php } ?>
								*/ ?>
								<?php if(isset($config['product'][$type]['huong']) && $config['product'][$type]['huong'] == true) { ?>
									<div class="form-group col-xl-6 col-sm-4">
										<label class="d-block" for="id_huong">Hướng:</label>
										<?php foreach($config['website']['lang'] as $k => $v) { ?>
											<?=$func->get_search('search','huong',$k)?>
										<?php }?>
									</div>
								<?php } ?>
								<?php if(isset($config['product'][$type]['tinhthanh']) && $config['product'][$type]['tinhthanh'] == true) { ?>
									<div class="form-group col-xl-6 col-sm-4">
										<label class="d-block" for="id_tinhthanh">Tỉnh thành:</label>
										<?php foreach($config['website']['lang'] as $k => $v) { ?>
											<?=$func->get_search('search','tinhthanh',$k,'Chọn tỉnh thành')?>
										<?php }?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>
				<?php
				if(isset($config['product'][$type]['slug']) && $config['product'][$type]['slug'] == true)
				{
					$slugchange = ($act=='edit') ? 1 : 0;
					$copy = ($act!='copy') ? 0 : 1;
					include TEMPLATE.LAYOUT."slug.php";
				}
				?>
				<div class="card-header-vns">
					<div class="flex-card-slug">
						<div class="title-card-slug">
							<h3 class="card-title">Nội dung <?=$config['product'][$type]['title_main']?></h3>
						</div>
						<div class="card-header p-0 border-bottom-0">
							<ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
								<?php foreach($config['website']['lang'] as $k => $v) { ?>
									<li class="nav-item">
										<a class="nav-link <?=($k=='vi')?'active':''?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?=$k?>" role="tab" aria-controls="tabs-lang-<?=$k?>" aria-selected="true"><?=$v?></a>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="card card-color text-sm">
					<div class="card-body">
						<div class="card card-outline card-outline-tabs">
							<div class="card-article">
								<div class="tab-content" id="custom-tabs-three-tabContent-lang">
									<?php foreach($config['website']['lang'] as $k => $v) { ?>
										<div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-lang-<?=$k?>" role="tabpanel" aria-labelledby="tabs-lang">
											<div class="form-group">
												<label for="ten<?=$k?>">Tiêu đề (<?=$k?>):</label>
												<input type="text" class="form-control for-seo" name="data[ten<?=$k?>]" id="ten<?=$k?>" placeholder="Tiêu đề (<?=$k?>)" value="<?=@$item['ten'.$k]?>" <?=($k=='vi')?'required':''?>>
											</div>
											<?php if(isset($config['product'][$type]['diachi']) && $config['product'][$type]['diachi'] == true) { ?>
												<div class="form-group">
													<label for="diachi<?=$k?>">Địa chỉ:</label>
													<input type="text" class="form-control for-seo" name="data[diachi<?=$k?>]" id="diachi<?=$k?>" placeholder="Địa chỉ:" value="<?=@$item['diachi'.$k]?>">
												</div>
											<?php }?>
											<div class="row">
												<?php if(isset($config['product'][$type]['giatext']) && $config['product'][$type]['giatext'] == true) { ?>
													<div class="form-group col-md-4">
														<label class="d-block" for="giatext">Giá text:</label>
														<input type="text" class="form-control" name="data[giatext]" id="giatext" placeholder="Giá text" value="<?=@$item['giatext']?>">
													</div>
													<div class="form-group col-md-4">
														<label class="d-block" for="tygia">Tỷ giá:</label>
														<?php foreach($config['website']['lang'] as $k => $v) { ?>
															<?=$func->get_search('search','tygia',$k,"Chọn tỷ giá")?>
														<?php }?>
													</div>
												<?php } ?>
												<?php if(isset($config['product'][$type]['dientich']) && $config['product'][$type]['dientich'] == true) { ?>
													<div class="form-group col-md-4">
														<label class="d-block" for="dientich">Diện tích:
														</label>
														<div class="input-group">
															<input type="text" class="form-control" name="data[dientich]" id="dientich" placeholder="Diện tích" value="<?=@$item['dientich']?>">
															<div class="input-group-append">
																<div class="input-group-text"><strong>m<sup>2</sup></strong></div>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
											<div class="row">
												<?php if(isset($config['product'][$type]['phongngu']) && $config['product'][$type]['phongngu'] == true) { ?>
													<div class="form-group col-md-6">
														<label class="d-block" for="phongngu">Phòng ngủ:
														</label>
														<div class="input-group">
															<input type="text" class="form-control" name="data[phongngu]" id="phongngu" placeholder="Phòng ngủ" value="<?=@$item['phongngu']?>">
														</div>
													</div>
												<?php } ?>
												<?php if(isset($config['product'][$type]['phongtam']) && $config['product'][$type]['phongtam'] == true) { ?>
													<div class="form-group col-md-6">
														<label class="d-block" for="phongtam">Phòng tắm:
														</label>
														<div class="input-group">
															<input type="text" class="form-control" name="data[phongtam]" id="phongtam" placeholder="Phòng ngủ" value="<?=@$item['phongtam']?>">
														</div>
													</div>
												<?php } ?>
											</div>
											<?php if(isset($config['product'][$type]['iframe']) && $config['product'][$type]['iframe'] == true) { ?>
												<div class="form-group">
													<label for="iframe">Iframe bản đồ:</label>
													<input type="text" class="form-control for-seo" name="data[iframe]" id="iframe" placeholder="Iframe bản đồ" value="<?=@$item['iframe']?>" >
												</div>
											<?php }?>
											<?php if(isset($config['product'][$type]['mota']) && $config['product'][$type]['mota'] == true) { ?>
												<div class="form-group">
													<label for="mota<?=$k?>">Mô tả (<?=$k?>):</label>
													<textarea class="form-control for-seo <?=(isset($config['product'][$type]['mota_cke']) && $config['product'][$type]['mota_cke'] == true)?'form-control-ckeditor':''?>" name="data[mota<?=$k?>]" id="mota<?=$k?>" rows="5" placeholder="Mô tả (<?=$k?>)"><?=htmlspecialchars_decode(@$item['mota'.$k])?></textarea>
												</div>
											<?php } ?>
											<?php if(isset($config['product'][$type]['noidung']) && $config['product'][$type]['noidung'] == true) { ?>
												<div class="form-group">
													<label for="noidung<?=$k?>">Nội dung (<?=$k?>):</label>
													<textarea class="form-control for-seo <?=(isset($config['product'][$type]['noidung_cke']) && $config['product'][$type]['noidung_cke'] == true)?'form-control-ckeditor':''?>" name="data[noidung<?=$k?>]" id="noidung<?=$k?>" rows="5" placeholder="Nội dung (<?=$k?>)"><?=htmlspecialchars_decode(@$item['noidung'.$k])?></textarea>
												</div>
											<?php } ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="<?=$colRight?>">
				<?php if(isset($config['product'][$type]['images']) && $config['product'][$type]['images'] == true) { ?>
					<div class="card card-vns card-vns-detail text-sm">
						<div class="card-header-vns">
							<h3 class="card-title">Hình ảnh <?=$config['product'][$type]['title_main']?></h3>
						</div>
						<div class="card-body">
							<?php
							$photoDetail = ($act != 'copy') ? UPLOAD_PRODUCT.@$item['photo'] : '';
							$dimension = "Width: ".$config['product'][$type]['width']." px - Height: ".$config['product'][$type]['height']." px (".$config['product'][$type]['img_type'].")";
							include TEMPLATE.LAYOUT."image.php";
							?>
						</div>
					</div>
				<?php } ?>
				<?php if(isset($config['product'][$type]['images2']) && $config['product'][$type]['images2'] == true) { ?>
					<div class="card card-vns card-vns-detail text-sm">
						<div class="card-header-vns">
							<h3 class="card-title">Hình ảnh <?=$config['product'][$type]['title_main']?> 2</h3>
						</div>
						<div class="card-body">
							<?php
							$photoDetail = ($act != 'copy') ? UPLOAD_PRODUCT.@$item['photo2'] : '';
							$dimension = "Width: ".$config['product'][$type]['width2']." px - Height: ".$config['product'][$type]['height2']." px (".$config['product'][$type]['img_type'].")";
							include TEMPLATE.LAYOUT."image2.php";
							?>
							<br>
						</div>
					</div>
				<?php } ?>
				<?php if(isset($flagGallery) && $flagGallery == true) { ?>
					<div class="card card-vns card-vns-detail text-sm">
						<div class="card-header-vns">
							<h3 class="card-title">Bộ sưu tập <?=$config['product'][$type]['title_main']?></h3>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="filer-gallery" class="label-filer-gallery mb-3">Album hình: (<?=$config['product'][$type]['gallery'][$key]['img_type_photo']?>)</label>
								<input type="file" name="files[]" id="filer-gallery" multiple="multiple">
								<input type="hidden" class="col-filer" value="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 moved">
								<input type="hidden" class="act-filer" value="man">
								<input type="hidden" class="folder-filer" value="product">
							</div>
							<?php if(isset($gallery) && count($gallery) > 0) { ?>
								<div class="form-group form-group-gallery">
									<label class="label-filer">Album hiện tại:</label>
									<?php /*
									<div class="alert my-alert alert-sort-filer alert-info text-sm text-white bg-gradient-info"><i class="fas fa-info-circle mr-2"></i>Có thể chọn nhiều hình để di chuyển</div>
									*/ ?>
									<div class="jFiler-items my-jFiler-items jFiler-row">
										<ul class="jFiler-items-list jFiler-items-grid row scroll-bar" id="jFilerSortable">
											<?php foreach($gallery as $v) echo $func->galleryFiler($v['stt'],$v['id'],$v['photo'],$v['tenvi'],'product','col-md-3 col-sm-4 col-6'); ?>
										</ul>
									</div>
									<div class="card-footer-detail-vns action-filer mb-3">
										<a class="btn btn-sm bg-gradient-primary check-all-filer mr-1">Chọn tất cả</a>
										<button type="button" class="btn btn-sm bg-gradient-success sort-filer mr-1 dp-none" id="sort-filer">Sắp xếp</button>
										<a class="btn btn-sm bg-gradient-danger delete-all-filer">Xóa tất cả</a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				<div class="card card-vns card-vns-detail text-sm">
					<div class="card-header-right">
						<h3 class="card-title">Thông tin <?=$config['product'][$type]['title_main']?></h3>
					</div>
					<div class="card-body">
						<div class="row">
							<?php if(isset($config['product'][$type]['ma']) && $config['product'][$type]['ma'] == true) { ?>
								<div class="form-group col-md-6">
									<label class="d-block" for="masp">Mã sản phẩm:</label>
									<input type="text" class="form-control" name="data[masp]" id="masp" placeholder="Mã sản phẩm" value="<?=@$item['masp']?>">
								</div>
							<?php } ?>
							<?php if(isset($config['product'][$type]['gia']) && $config['product'][$type]['gia'] == true) { ?>
								<div class="form-group col-md-6">
									<label class="d-block" for="gia">Giá bán:</label>
									<div class="input-group">
										<input type="text" class="form-control format-price gia_ban" name="data[gia]" id="gia" placeholder="Giá bán" value="<?=@$item['gia']?>">
										<div class="input-group-append">
											<div class="input-group-text"><strong>VNĐ</strong></div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if(isset($config['product'][$type]['giamoi']) && $config['product'][$type]['giamoi'] == true) { ?>
								<div class="form-group col-md-6">
									<label class="d-block" for="giamoi">Giá mới:</label>
									<div class="input-group">
										<input type="text" class="form-control format-price gia_moi" name="data[giamoi]" id="giamoi" placeholder="Giá mới" value="<?=@$item['giamoi']?>">
										<div class="input-group-append">
											<div class="input-group-text"><strong>VNĐ</strong></div>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if(isset($config['product'][$type]['giakm']) && $config['product'][$type]['giakm'] == true) { ?>
								<div class="form-group col-md-6">
									<label class="d-block" for="giakm">Chiết khấu:</label>
									<div class="input-group">
										<input type="text" class="form-control gia_km" name="data[giakm]" id="giakm" placeholder="Chiết khấu" value="<?=@$item['giakm']?>" maxlength="3" readonly>
										<div class="input-group-append">
											<div class="input-group-text"><strong>%</strong></div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="row-form-group">
							<div class="form-group">
								<label for="stt" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự</label>
								<input type="number" class="form-control-mini d-inline-block align-middle" min="0" name="data[stt]" id="stt" placeholder="Số thứ tự" value="<?=isset($item['stt']) ? $item['stt'] : 1?>">
							</div>
							<div class="form-group">
								<label for="hienthi" class="d-inline-block align-middle mb-0 mr-2">Hiển thị</label>
								<div class="custom-control custom-checkbox d-inline-block align-middle">
									<input type="checkbox" class="custom-control-input hienthi-checkbox" name="data[hienthi]" id="hienthi-checkbox" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>>
									<label for="hienthi-checkbox" class="click-checkbox <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked':''?>"></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if(isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true) { ?>
					<?php 
					/* Lấy size */
					if(isset($item['id_size'])) $showSize = $d->rawQuery("select id_size from #_product_price where type='".$type."' and id_product = '".$item['id']."' and hienthi > 0 order by stt asc");
					?>
					<div class="card card-vns card-vns-detail text-sm">
						<div class="flex-card-slug mb-2">
							<div class="card-header-right mb-0">
								<h3 class="card-title">Nhóm <?=$config['product'][$type]['title_main']?> (kích thước)</h3>
							</div>
							<div class="addSize" id="addSize">
								<span>Thêm kích thước <i class="fa fa-plus" aria-hidden="true"></i></span>
							</div>
						</div>
						<div class="card-body table-responsive">
							<table class="table table-size form-group-category">
								<thead>
									<tr>
										<th class="align-middle text-center" width="47px">STT</th>
										<th class="align-middle" width="15%">Kích thước</th>
										<th class="align-middle text-center" width="150px">Hình ảnh</th>
										<?php if(isset($config['product'][$type]['gia']) && $config['product'][$type]['gia'] == true && $config['product'][$type]['size_gia'] == true) { ?>
											<th class="align-middle">Giá bán</th>
										<?php }?>
										<?php if(isset($config['product'][$type]['giamoi']) && $config['product'][$type]['giamoi'] == true && $config['product'][$type]['size_giamoi'] == true) { ?>
											<th class="align-middle">Giá mới</th>
										<?php } ?>
										<th class="align-middle text-center" width="100px">Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<tr id="groupSize-0" class="groupSize">
										<td class="align-middle" width="47px">
											<input type="number" class="form-control form-control-mini m-auto" name="dataSize[0][stt]" min="0" value="0" data-id="">
										</td>
										<td class="align-middle" width="15%">
											<select name="dataSize[0][sizeProduct]" class="form-control select3">
												<option value="0">Chọn kích thước</option>
												<?php foreach ($getSize as $q => $w): ?>
													<option value="<?=$w['id']?>"><?=$w['tenvi']?></option>
												<?php endforeach ?>
											</select>
										</td>
										<td class="align-middle text-center" width="150px">
											<?php
											$photoDetail = ($act != 'copy') ? UPLOAD_PRODUCT.@$item['photo3'] : '';
											$dimension = "Width: ".$config['product'][$type]['width']." px - Height: ".$config['product'][$type]['height']." px (".$config['product'][$type]['img_type'].")";
											?>
											<div class="photoUpload-zone photoUpload-zone-size">
												<div class="photoUpload-detail" id="photoUpload-preview-size-0">
													<img class="rounded" src="assets/images/noimage.png" alt="Alt Photo" />
												</div>
												<label class="photoUpload-file" id="photo-zone-size-0" for="file-zone-size-0">
													<input type="file" name="file-size[0]" id="file-zone-size-0">
													<i class="fas fa-cloud-upload-alt"></i>
												</label>
											</div>
										</td>
										<?php if(isset($config['product'][$type]['gia']) && $config['product'][$type]['gia'] == true && $config['product'][$type]['size_gia'] == true) { ?>
											<td class="align-middle">
												<div class="input-group">
													<input type="text" class="form-control format-price" name="dataSize[0][gia]" placeholder="Giá bán" value="">
													<div class="input-group-append">
														<div class="input-group-text"><strong>VNĐ</strong></div>
													</div>
												</div>
											</td>
										<?php }?>
										<?php if(isset($config['product'][$type]['giamoi']) && $config['product'][$type]['giamoi'] == true && $config['product'][$type]['size_giamoi'] == true) { ?>
											<td class="align-middle">
												<div class="input-group">
													<input type="text" class="form-control format-price" name="dataSize[0][giamoi]" placeholder="Giá mới" value="">
													<div class="input-group-append">
														<div class="input-group-text"><strong>VNĐ</strong></div>
													</div>
												</div>
											</td>
										<?php }?>
										<td class="align-middle text-center" width="100px">
											<button type="button" class="action-icon action-icon-btn bg-action-2 mg-at btn-delete-row"></button>
										</td>
									</tr>
									<?php if(isset($showSize)) {?>
										<?php for($i=0,$count=count($showSize); $i < $count; $i++) { ?>
											<?php 
											$getPriceSize = $d->rawQueryOne("select id, gia, giamoi, photo, stt from #_product_price where type='".$type."' and id_product = '".$item['id']."' and id_size = ".$showSize[$i]['id_size']."");
											?>
											<tr class="groupSize">
												<td class="align-middle" width="47px">
													<input type="number" class="form-control form-control-mini m-auto" name="dataSize[<?=$i+1?>][stt]" min="0" value="<?=$getPriceSize['stt']?>" data-id="<?=$getPriceSize['id']?>">
												</td>
												<td class="align-middle" width="15%">
													<select name="dataSize[<?=$i+1?>][sizeProduct]" class="form-control select2">
														<option value="0">Chọn kích thước</option>
														<?php foreach ($getSize as $q => $w): ?>
															<option value="<?=$w['id']?>" <?php if($w['id']==$showSize[$i]['id_size']) echo 'selected';?>><?=$w['tenvi']?></option>
														<?php endforeach ?>
													</select>
												</td>
												<td class="align-middle text-center" width="150px">
													<div class="photoUpload-zone photoUpload-zone-size">
														<div class="photoUpload-detail" id="photoUpload-preview-size-<?=$i+1?>">
															<img class="rounded" onerror="this.src='assets/images/noimage.png';" src="<?=THUMBS?>/50x50x1/<?=UPLOAD_PRODUCT_L.$getPriceSize['photo']?>"/>
														</div>
														<label class="photoUpload-file" id="photo-zone-size-<?=$i+1?>" for="file-zone-size-<?=$i+1?>">
															<input type="file" name="file-zone-size-<?=$i+1?>" id="file-zone-size-<?=$i+1?>">
															<i class="fas fa-cloud-upload-alt"></i>
														</label>
													</div>
												</td>
												<?php if(isset($config['product'][$type]['gia']) && $config['product'][$type]['gia'] == true && $config['product'][$type]['size_gia'] == true) { ?>
													<td class="align-middle">
														<div class="input-group">
															<input type="text" class="form-control format-price" name="dataSize[<?=$i+1?>][gia]" placeholder="Giá bán" value="<?=$getPriceSize['gia']?>">
															<div class="input-group-append">
																<div class="input-group-text"><strong>VNĐ</strong></div>
															</div>
														</div>
													</td>
												<?php }?>
												<?php if(isset($config['product'][$type]['gia']) && $config['product'][$type]['giamoi'] == true && $config['product'][$type]['size_giamoi'] == true) { ?>
													<td class="align-middle">
														<div class="input-group">
															<input type="text" class="form-control format-price" name="dataSize[<?=$i+1?>][giamoi]" placeholder="Giá mới" value="<?=$getPriceSize['giamoi']?>">
															<div class="input-group-append">
																<div class="input-group-text"><strong>VNĐ</strong></div>
															</div>
														</div>
													</td>
												<?php }?>
												<td class="align-middle text-center" width="100px">
													<button type="button" class="action-icon action-icon-btn bg-action-2 mg-at btn-delete-row"></button>
												</td>
											</tr>
										<?php }?>
										<input type="hidden" name="countSize" value="<?=count($showSize)?>">
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
		<?php if(isset($config['product'][$type]['seo']) && $config['product'][$type]['seo'] == true) { ?>
			<?php
			$seoDB = $seo->getSeoDB($id,$com,'man',$type);
			include TEMPLATE.LAYOUT."seo.php";
			?>
		<?php } ?>
		<input type="hidden" name="id" value="<?=(isset($item['id']) && $item['id'] > 0) ? $item['id'] : ''?>">
		<input type="hidden" name="actS" value="<?=(isset($_REQUEST['act']) && $_REQUEST['act']=='add') ? 'add' : 'none'?>">
	</form>
</section>
<?php if(isset($config['product'][$type]['giakm']) && $config['product'][$type]['giakm'] == true) { ?>
	<script type="text/javascript">
		function roundNumber(rnum, rlength)
		{
			return Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
		}
		$(document).ready(function(){
			$(".gia_ban, .gia_moi").keyup(function(){
				var gia_ban = $('.gia_ban').val();
				var gia_moi = $('.gia_moi').val();
				var gia_km = 0;
				if(gia_ban=='' || gia_ban=='0' || gia_moi=='' || gia_moi=='0')
				{
					gia_km=0;
				}
				else
				{
					gia_ban = gia_ban.replace(/,/g,"");
					gia_moi = gia_moi.replace(/,/g,"");
					gia_ban = parseInt(gia_ban);
					gia_moi = parseInt(gia_moi);
					if(gia_moi < gia_ban)
					{
						gia_km = 100-((gia_moi * 100) / gia_ban);
						gia_km = roundNumber(gia_km,0);
					}
					else
					{
						gia_km=0;
					}
				}
				$('.gia_km').val(gia_km);
			})
		});
	</script>
<?php } ?>
<?php if(isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true) { ?>
	<script type="text/javascript">
		var countSize = $("input[name=countSize]").val();
		if(countSize > 0){
			var rowIndex = parseInt(countSize) + 1; // Biến theo dõi index
		}else{
			var rowIndex = 1; // Biến theo dõi index
		}
		document.getElementById('addSize').addEventListener('click', function() {
		    // Lấy hàng mẫu
		    const templateRow = document.querySelector('#groupSize-0');
		    // Nhân bản hàng
		    const clone = templateRow.cloneNode(true);
		    // Xóa ID để tránh trùng lặp
		    clone.removeAttribute('id');
		    // Cập nhật các trường name và id với index mới
		    const inputs = clone.querySelectorAll('input, select, div, label, img');
		    inputs.forEach(input => {
		    	if (input.name) {
            input.name = input.name.replace('[0]', `[${rowIndex}]`); // Cập nhật chỉ số
        }
        if (input.id) {
            input.id = input.id.replace('-0', `-${rowIndex}`); // Cập nhật id
        }
        // Cập nhật for (nếu là label)
        if (input.tagName === 'LABEL' && input.htmlFor) {
        input.htmlFor = input.htmlFor.replace('-0', `-${rowIndex}`); // Cập nhật for
    }
    if (input.tagName === 'IMG') {
            input.src = 'assets/images/noimage.png'; // Reset hình ảnh về mặc định
        }
        if (input.type === 'file') {
            input.value = ''; // Xóa file đã chọn trước đó
        }
    });
		    // Cập nhật preview ảnh (reset về ảnh mặc định)
		    const imgPreview = clone.querySelector('img');
		    if (imgPreview) {
       		 		imgPreview.src = 'assets/images/noimage.png'; // Đặt lại ảnh mặc định
       		 	}
		    // Thêm hàng nhân bản vào bảng
		    templateRow.parentNode.appendChild(clone);
		    // Kích hoạt lại Select2 cho các dropdown trong hàng mới
		    $(clone).find('.select3').select2();
		    // Format price
		    $(".format-price").priceFormat({
		    	limit: 13,
		    	prefix: '',
		    	centsLimit: 0
		    });
		    // Tăng index
		    rowIndex++;
		});
		document.addEventListener('change', function (event) {
    // Kiểm tra nếu người dùng chọn file từ input type="file"
    if (event.target.type === 'file' && event.target.files.length > 0) {
        const fileInput = event.target;  // Lấy input file
        const file = fileInput.files[0]; // Lấy file đầu tiên
        const reader = new FileReader(); // Khởi tạo FileReader để đọc file ảnh
        // Lấy phần tử ảnh xem trước trong hàng tương ứng
        const rowIndex = fileInput.id.split('-').pop(); // Lấy index từ id của input
        const preview = document.getElementById('photoUpload-preview-size-' + rowIndex).querySelector('img'); 
        // Khi đọc file xong, cập nhật ảnh vào phần tử img
        reader.onload = function (e) {
        	if (preview) {
                preview.src = e.target.result; // Cập nhật ảnh xem trước
            }
        };
        reader.readAsDataURL(file); // Đọc file dưới dạng URL
    }
});
		// Xóa hàng và cập nhật index
		document.addEventListener('click', function (event) {
			if (event.target.classList.contains('btn-delete-row')) {
				const row = event.target.closest('tr');
        row.remove(); // Xóa hàng
        // Cập nhật lại index cho các hàng còn lại
        const rows = document.querySelectorAll('.groupSize');
        rows.forEach((row, index) => {
            row.id = `groupSize-${index}`; // Cập nhật ID của hàng
            const inputs = row.querySelectorAll('input, select, div ,label, img');
            inputs.forEach(input => {
            	if (input.name) {
            		input.name = input.name.replace(/\[\d+\]/, `[${index}]`);
            	}
            	if (input.id) {
            		input.id = input.id.replace(/-\d+/, `-${index}`);
            	}
            	if (input.tagName === 'LABEL' && input.htmlFor) {
            		input.htmlFor = input.htmlFor.replace(/-\d+/, `-${index}`);
            	}
            });
        });
    }
});
</script>
<?php }?>