<div id="banner">
	<div class="center">
		<div class="flex-banner">
			<div class="menu-bar-res">
				<a id="hamburger" href="#mmenu" title="Menu"><span></span></a>
			</div>
			<?php if ($logo) { ?>
				<div class="logo sss d-flex align-items-center">
					<a href=""><img style="max-width: 60px;" onerror="this.src='assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" /></a>
				</div>
			<?php } ?>
			<a class="btn-gia btn-tour-click" data-tab="info-pro-detail" href="javascript:void(0)">Tư vấn báo giá</a>
		</div>
	</div>
</div>