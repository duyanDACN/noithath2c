<?php $banner = $d->rawQueryOne("select photo from #_photo where type = ? and act = ? and hienthi > 0 limit 0,1", array('banner', 'photo_static')); ?>
<!-- Modal popup -->
<?php if (($source == 'index') || ($type == 'bao-gia')) { ?>
    <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <img class="banner-form-mb" style="max-width: 100%;width:100%;height: 300px;" onerror="this.src='assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $banner_po['photo'] ?>" alt="<?= $banner_po['ten'] ?>">
                <div class="modal-body">
                    <div class="modal-name">
                        <h3 id="popupnewsletter-name">Yêu cầu báo giá</h3>
                    </div>
                    <div class="form-nhantin">
                        <form class="form-contact validation-contact" novalidate method="post" action="lien-he" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-contact col-sm-6">
                                    <input type="text" class="form-control" id="congtrinh" name="congtrinh" placeholder="Công trình" required />
                                </div>
                                <div class="input-contact col-sm-6">
                                    <input type="phongcach" class="form-control" id="phongcach" name="phongcach" placeholder="Phong cách" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-contact col-sm-12">
                                    <input type="text" class="form-control" id="ten" name="ten" placeholder="<?= hoten ?>" required />
                                    <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                                </div>
                                <div class="input-contact col-sm-12">
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= sodienthoai ?>" required />
                                    <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                                </div>
                            </div>
                            <div class="input-contact">
                                <textarea class="form-control" id="noidung" name="noidung" placeholder="<?= noidung ?>" required /></textarea>
                                <div class="invalid-feedback"><?= vuilongnhapnoidung ?></div>
                            </div>
                            <div class="btn-submit-form-home">
                                <input type="submit" class="btn btn-primary btn-primary-edit" name="submit-contact" value="Gửi thông tin" disabled />
                            </div>
                            <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                        </form>
                    </div>
                </div>
                <div class="banner-pop">
                    <?php if ($banner) { ?>
                        <div class="banner">
                            <a href=""><img style="max-width: 448px;" onerror="this.src='assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $banner_po['photo'] ?>" alt="<?= $banner_po['ten'] ?>"></a>
                        </div>
                    <?php } ?>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
            </div>
        </div>
    </div>
<?php } ?>


<?php /*
<div class="modal fade" id="popupnewsletter" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-name">
                    <h3 id="popupnewsletter-name">Yêu cầu báo giá</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="form-nhantin">
                    <form class="form-newsletter validation-newsletter" novalidate method="post" action=""
                        enctype="multipart/form-data">
						<div class="row-1">
                            <div class="newsletter-input congtrinh">
                                <input type="congtrinh" class="form-control" id="congtrinh-newsletter" name="congtrinh-newsletter"
                                    placeholder="Loại công trình" required />

                            </div>
                            <div class="newsletter-input phongcach">
                                <input type="phongcach" class="form-control" id="phongcach-newsletter"
                                    name="phongcach-newsletter" placeholder="Phong cách" required />
                            </div>
                        </div>
                        <div class="row-1">
                            <div class="newsletter-input ten">
                                <input type="ten" class="form-control" id="ten-newsletter" name="ten-newsletter"
                                    placeholder="Họ và tên" required />

                            </div>
                            <div class="newsletter-input dienthoai">
                                <input type="dienthoai" class="form-control" id="dienthoai-newsletter"
                                    name="dienthoai-newsletter" placeholder="Số điện thoại" required />
                            </div>
                        </div>
                        <div class="newsletter-input noidung">
                            <textarea class="form-control" id="noidung-newsletter" name="noidung-newsletter"
                                placeholder="Nội dung cần tư vấn.." required /></textarea>
                            <div class="invalid-feedback"><?= vuilongnhapnoidung ?></div>
                        </div>
                        <div class="newsletter-button">
                            <input type="submit" name="submit-newsletter" value="Gửi thông tin" disabled>
                            <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal notify -->
<div class="modal modal-custom fade" id="popup-notify" tabindex="-1" role="dialog" aria-labelledby="popup-notify-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="popup-notify-label"><?=thongbao?></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><?=thoat?></button>
			</div>
		</div>
	</div>
</div>

<?php if(isset($config['cart'])){ ?>
<!-- Modal cart -->
<div class="modal fade" id="popup-cart" tabindex="-1" role="dialog" aria-labelledby="popup-cart-label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-top modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="popup-cart-label"><?=giohangcuaban?></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"></div>
		</div>
	</div>
</div>
<?php } ?>

<?php /*
<!-- Modal prototype -->
<button type="button" class="btn btn-primary open-modal-cart" data-toggle="modal" data-target=".exampleModal">
	Open Modal
</button>
<div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Modal title</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
*/ ?>