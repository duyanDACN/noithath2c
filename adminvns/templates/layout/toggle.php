<?php 
$sqlCache = "select * from #_setting";
$setting = $cache->getCache($sqlCache,'fetch',600);
?>
<div class="custom-template">
	<div class="title">Tùy chỉnh</div>
	<div class="custom-content">
		<div class="switcher">
			<div class="switch-block">
				<h4>Slidebar</h4>
				<div class="btnSwitch">
					<button
					type="button"
					class="<?=($setting['color_logo']=='dark') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="dark"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='blue') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="blue"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='purple') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="purple"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='light-blue') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="light-blue"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='green') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="green"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='orange') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="orange"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='red') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="red"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='white') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="white"
					></button>
					<br />
					<button
					type="button"
					class="<?=($setting['color_logo']=='dark2') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="dark2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='blue2') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="blue2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='purple2') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="purple2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='light-blue2') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="light-blue2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='green2') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="green2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='orange2') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="orange2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='red2') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="red2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_logo']=='custom') ? 'selected' : ''?> changeLogoHeaderColor"
					data-color="custom"
					></button>
					
				</div>
			</div>
			<div class="switch-block">
				<h4>Navbar Header</h4>
				<div class="btnSwitch">
					<button
					type="button"
					class="<?=($setting['color_header']=='dark') ? 'selected' : ''?> changeTopBarColor"
					data-color="dark"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='bule') ? 'selected' : ''?> changeTopBarColor"
					data-color="blue"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='purple') ? 'selected' : ''?> changeTopBarColor"
					data-color="purple"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='light-blue') ? 'selected' : ''?> changeTopBarColor"
					data-color="light-blue"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='green') ? 'selected' : ''?> changeTopBarColor"
					data-color="green"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='orange') ? 'selected' : ''?> changeTopBarColor"
					data-color="orange"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='red') ? 'selected' : ''?> changeTopBarColor"
					data-color="red"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='white') ? 'selected' : ''?> changeTopBarColor"
					data-color="white"
					></button>
					<br />
					<button
					type="button"
					class="<?=($setting['color_header']=='dark2') ? 'selected' : ''?> changeTopBarColor"
					data-color="dark2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='blue2') ? 'selected' : ''?> changeTopBarColor"
					data-color="blue2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='purple2') ? 'selected' : ''?> changeTopBarColor"
					data-color="purple2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='light-blue2') ? 'selected' : ''?> changeTopBarColor"
					data-color="light-blue2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='green2') ? 'selected' : ''?> changeTopBarColor"
					data-color="green2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='orange2') ? 'selected' : ''?> changeTopBarColor"
					data-color="orange2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='red2') ? 'selected' : ''?> changeTopBarColor"
					data-color="red2"
					></button>
					<button
					type="button"
					class="<?=($setting['color_header']=='custom') ? 'selected' : ''?> changeTopBarColor"
					data-color="custom"
					></button>
					
				</div>
			</div>
			<div class="switch-block">
				<h4>Light mode</h4>
				<div class="btnSwitch">
					<div class="row template-customizer-styles-options"><div class="col-4 px-2">
						<div class="form-check custom-option custom-option-light custom-option-icon mb-0 <?=($setting['color_header']=='white') ? 'checked' : ''?>">
							<label class="form-check-label custom-option-content p-0" for="customRadioIconlight">
								<span class="custom-option-body mb-0">
									<img src="assets/images/light.svg" alt="Light" class="img-fluid scaleX-n1-rtl">
								</span>
								<input name="customRadioIcon" class="form-check-input form-check-input-light d-none" type="radio" value="white" id="customRadioIconlight">
							</label>
						</div>
						<label class="form-check-label small text-nowrap" for="customRadioIconlight">Light</label>
					</div>
					<div class="col-4 px-2">
						<div class="form-check custom-option custom-option-light custom-option-icon mb-0 <?=($setting['color_header']=='dark-main') ? 'checked' : ''?>">
							<label class="form-check-label custom-option-content p-0" for="customRadioIcondark">
								<span class="custom-option-body mb-0">
									<img src="assets/images/dark.svg" alt="Dark" class="img-fluid scaleX-n1-rtl">
								</span>
								<input name="customRadioIcon" class="form-check-input form-check-input-light d-none" type="radio" value="dark-main" id="customRadioIcondark">
							</label>
						</div>
						<label class="form-check-label small text-nowrap" for="customRadioIcondark">Dark</label>
					</div>
					<div class="col-4 px-2">
						<div class="form-check custom-option custom-option-light custom-option-icon mb-0 <?=($setting['color_header']=='custom') ? 'checked' : ''?>">
							<label class="form-check-label custom-option-content p-0" for="customRadioIconsystem">
								<span class="custom-option-body mb-0">
									<img src="assets/images/system.svg" alt="System" class="img-fluid scaleX-n1-rtl">
								</span>
								<input name="customRadioIcon" class="form-check-input form-check-input-light d-none" type="radio" value="custom" id="customRadioIconsystem">
							</label>
						</div>
						<label class="form-check-label small text-nowrap" for="customRadioIconsystem">System</label>
					</div>
				</div>
			</div>
		</div>
		<div class="switch-block">
			<h4>Themes</h4>
			<div class="btnSwitch">
				<div class="row template-customizer-themes-options">
					<div class="col-4 px-2">
						<div class="form-check custom-option custom-option-themes custom-option-icon mb-0 <?=($setting['themes_main']=='theme-default') ? 'checked' : ''?>">
							<label class="form-check-label custom-option-content p-0" for="themeRadiostheme-default">
								<span class="custom-option-body mb-0">
									<img src="assets/images/default.svg" alt="Default" class="img-fluid scaleX-n1-rtl">
								</span>
								<input name="themeRadios" class="form-check-input form-check-input-themes d-none" type="radio" value="theme-default" id="themeRadiostheme-default">
							</label>
						</div>
						<label class="form-check-label small text-nowrap" for="themeRadiostheme-default">Default</label>
					</div>
					<div class="col-4 px-2">
						<div class="form-check custom-option custom-option-themes custom-option-icon mb-0 <?=($setting['themes_main']=='theme-bordered') ? 'checked' : ''?>">
							<label class="form-check-label custom-option-content p-0" for="themeRadiostheme-bordered">
								<span class="custom-option-body mb-0">
									<img src="assets/images/border.svg" alt="Bordered" class="img-fluid scaleX-n1-rtl">
								</span>
								<input name="themeRadios" class="form-check-input form-check-input-themes d-none" type="radio" value="theme-bordered" id="themeRadiostheme-bordered">
							</label>
						</div>
						<label class="form-check-label small text-nowrap" for="themeRadiostheme-bordered">Bordered</label>
					</div>
					<div class="col-4 px-2">
						<div class="form-check custom-option custom-option-themes custom-option-icon mb-0 <?=($setting['themes_main']=='theme-semi-dark') ? 'checked' : ''?>">
							<label class="form-check-label custom-option-content p-0" for="themeRadiostheme-semi-dark">
								<span class="custom-option-body mb-0">
									<img src="assets/images/semi-dark.svg" alt="Semi Dark" class="img-fluid scaleX-n1-rtl">
								</span>
								<input name="themeRadios" class="form-check-input form-check-input-themes d-none" type="radio" value="theme-semi-dark" id="themeRadiostheme-semi-dark">
							</label>
						</div>
						<label class="form-check-label small text-nowrap" for="themeRadiostheme-semi-dark">Semi Dark</label>
					</div></div>
				</div>
			</div>
			<?php /*
			<div class="switch-block">
				<h4>Sidebar</h4>
				<div class="btnSwitch">
					<button
					type="button"
					class="selected changeSideBarColor"
					data-color="custom"
					></button>
					<button
					type="button"
					class="changeSideBarColor"
					data-color="white"
					></button>
					<button
					type="button"
					class="changeSideBarColor"
					data-color="dark"
					></button>
					<button
					type="button"
					class="changeSideBarColor"
					data-color="dark2"
					></button>
				</div>
			</div>
			*/ ?>
		</div>
	</div>
	<div class="custom-toggle">
		<i class="fa fa-cog" aria-hidden="true"></i>
	</div>
</div>

<script>
	// Setting Color
	function layoutsColors(){
		if($('.main-sidebar').is('[data-background-color]')) { 
			$('html').addClass('sidebar-color');
		} else {
			$('html').removeClass('sidebar-color');
		}
	}

	$(window).resize(function () {
		$(window).width();
	});

	getCheckmark();

	$(".changeBodyBackgroundFullColor").on("click", function () {
		if ($(this).attr("data-color") == "default") {
			$("body").removeAttr("data-background-full");
		} else {
			$("body").attr("data-background-full", $(this).attr("data-color"));
		}

		$(this).parent().find(".changeBodyBackgroundFullColor").removeClass("selected");
		$(this).addClass("selected");
		layoutsColors();
		getCheckmark();
	});

	$(".changeLogoHeaderColor").on("click", function () {
		if ($(this).attr("data-color") == "default") {
			$(".main-sidebar").removeAttr("data-background-color");
		} else {
			$(".main-sidebar").attr("data-background-color", $(this).attr("data-color"));
		}

		$(this).parent().find(".changeLogoHeaderColor").removeClass("selected");
		$(this).addClass("selected");
		customCheckColor();
		layoutsColors();
		getCheckmark();

		var color = $(this).attr('data-color');
		var type = 'slidebar';
		
		$.ajax({
			url: 'ajax/ajax_color.php',
			type: 'POST',
			dataType: 'html',
			data: {type:type,color:color}
		});

		return false;
	});

	$(".form-check-input-light").on("click", function () {
		if ($(this).val() == "default") {
			$(".main-sidebar").removeAttr("data-background-color");
			$(".main-header.navbar").removeAttr("data-background-color");
		} else {
			$(".main-sidebar").attr("data-background-color", $(this).val());
			$(".main-header.navbar").attr("data-background-color", $(this).val());
			$(".content-wrapper").attr("data-background-color", $(this).val());
			$(".main-footer").attr("data-background-color", $(this).val());
		}
		
		$(".custom-option-light").removeClass("checked");
		$(this).parents(".custom-option-light").addClass("checked");
		
		var color = $(this).val();
		var type = "header-slidebar";
		
		$.ajax({
			url: 'ajax/ajax_color.php',
			type: 'POST',
			dataType: 'html',
			data: {type:type,color:color}
		});

		return false;
	});

	$(".form-check-input-themes").on("click", function () {
		var color_main = $(".main-header").attr("data-background-color");
		if ($(this).val() == "default") {
			$(".main-sidebar").removeAttr("data-background-color");
			$(".main-header.navbar").removeAttr("data-background-color");
		} else {
			if($(this).val() == "theme-semi-dark"){
				$(".main-sidebar").attr("data-background-color", 'dark2');
			}else{
				$(".main-sidebar").attr("data-background-color", color_main);
			}
			$(".content-wrapper").attr("data-themes-main", $(this).val());
			$(".main-footer").attr("data-themes-main", $(this).val());
		}
		
		$(".custom-option-themes").removeClass("checked");
		$(this).parents(".custom-option-themes").addClass("checked");
		
		var themes = $(this).val();
		var type = "themes-main";
		
		$.ajax({
			url: 'ajax/ajax_color.php',
			type: 'POST',
			dataType: 'html',
			data: {type:type,themes:themes,color_main:color_main}
		});

		return false;
	});

	$(".changeTopBarColor").on("click", function () {
		if ($(this).attr("data-color") == "default") {
			$(".main-header.navbar").removeAttr("data-background-color");
		} else {
			$(".main-header.navbar").attr("data-background-color", $(this).attr("data-color"));
		}

		$(this).parent().find(".changeTopBarColor").removeClass("selected");
		$(this).addClass("selected");
		layoutsColors();
		getCheckmark();


		var color = $(this).attr('data-color');
		var type = 'header';
		
		$.ajax({
			url: 'ajax/ajax_color.php',
			type: 'POST',
			dataType: 'html',
			data: {type:type,color:color}
		});

		return false;
	});

	$(".changeSideBarColor").on("click", function () {
		if ($(this).attr("data-color") == "default") {
			$(".main-sidebar").removeAttr("data-background-color");
		} else {
			$(".main-sidebar").attr("data-background-color", $(this).attr("data-color"));
		}

		$(this).parent().find(".changeSideBarColor").removeClass("selected");
		$(this).addClass("selected");
		layoutsColors();
		getCheckmark();
	});

	$(".changeBackgroundColor").on("click", function () {
		$("body").removeAttr("data-background-color");
		$("body").attr("data-background-color", $(this).attr("data-color"));
		$(this).parent().find(".changeBackgroundColor").removeClass("selected");
		$(this).addClass("selected");
		getCheckmark();
	});

	function customCheckColor() {
		var logoHeader = $(".logo-header").attr("data-background-color");
		if (logoHeader !== "white") {
			$(".logo-header .navbar-brand").attr("src", "assets/img/kaiadmin/logo_light.svg");
		} else {
			$(".logo-header .navbar-brand").attr("src", "assets/img/kaiadmin/logo_dark.svg");
		}
	}

	var toggle_customSidebar = false,
	custom_open = 0;

	if (!toggle_customSidebar) {
		var toggle = $(".custom-template .custom-toggle");

		toggle.on("click", function () {
			if (custom_open == 1) {
				$(".custom-template").removeClass("open");
				toggle.removeClass("toggled");
				custom_open = 0;
			} else {
				$(".custom-template").addClass("open");
				toggle.addClass("toggled");
				custom_open = 1;
			}
		});
		toggle_customSidebar = true;
	}

	function getCheckmark() {
		var checkmark = `<i class="gg-check"></i>`;
		$(".btnSwitch").find("button").empty();
		$(".btnSwitch").find("button.selected").append(checkmark);
	}
</script>