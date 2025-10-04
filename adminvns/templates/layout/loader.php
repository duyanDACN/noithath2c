<?php 
session_start();
$deviceType = ($detect->isMobile() || $detect->isTablet()) ? 'mobile' : 'computer';
?>

<?php if($deviceType=='computer') {?>
    <div class="loading-video"><video width="100%" height="100%" autoplay muted playsinline><source src="assets/images/vns.mp4" type="video/mp4"></video></div>
        <?php $_SESSION['video'] = true; 
    }?>


    <!-- loader js -->
    <script type="text/javascript">
      function Loader(callback) {
        $(window).load(function() {
            setTimeout(function() {
                $(".loading-video").fadeOut(400);
                setTimeout(function() {
                }, 400);
            }, 3000);
        });
    }
    Loader();
</script>