<div class="mw-800">
	<div class="title-main">
		<h1><?= $static['ten'] ?></h1>
		<p><?= $slogan['ten'] ?></p>
	</div>
	<div class="content w-clear"><?= (isset($static['noidung']) && $static['noidung'] != '') ? htmlspecialchars_decode($static['noidung']) : '' ?></div>
</div>