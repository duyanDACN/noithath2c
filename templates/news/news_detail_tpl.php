<div class="mw-800">
    <div class="title-detail">
        <h1><?= $row_detail['ten'] ?></h1>
    </div>
    <?php if (isset($row_detail['noidung']) && $row_detail['noidung'] != '') { ?>
        <div class="meta-toc">
            <div class="box-readmore">
                <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
            </div>
        </div>
        <div class="content w-clear" id="toc-content"><?= htmlspecialchars_decode($row_detail['noidung']) ?></div>
        <div class="share">
            <b><?= chiase ?>:</b>
            <div class="social-plugin w-clear">
                <div>
                    <a href="https://www.addtoany.com/share#url=<?= $func->getCurrentPageURL() ?>&amp;title=share" target="_blank"><img src="https://static.addtoany.com/buttons/a2a.svg" width="32" height="32" style="background-color:royalblue"></a>
                    <a href="https://www.addtoany.com/add_to/facebook?linkurl=<?= $func->getCurrentPageURL() ?>&amp;linkname=share" target="_blank"><img src="https://static.addtoany.com/buttons/facebook.svg" width="32" height="32" style="background-color:royalblue"></a>
                    <a href="https://www.addtoany.com/add_to/twitter?linkurl=<?= $func->getCurrentPageURL() ?>&amp;linkname=share" target="_blank"><img src="https://static.addtoany.com/buttons/twitter.svg" width="32" height="32" style="background-color:royalblue"></a>
                    <a href="https://www.addtoany.com/add_to/email?linkurl=<?= $func->getCurrentPageURL() ?>&amp;linkname=share" target="_blank"><img src="https://static.addtoany.com/buttons/email.svg" width="32" height="32" style="background-color:royalblue"></a>
                </div>
                <!-- AddToAny END -->
                <div class="zalo-share-button" data-href="<?= $func->getCurrentPageURL() ?>" data-oaid="<?= ($optsetting['oaidzalo'] != '') ? $optsetting['oaidzalo'] : '579745863508352884' ?>" data-layout="1" data-color="blue" data-customize=false></div>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
            <strong><?= noidungdangcapnhat ?></strong>
        </div>
    <?php } ?>
</div>