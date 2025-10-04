<div class="card-vns text-sm">
    <div class="card-header-vns">
        <div class="flex-card-slug">
            <div class="title-card-slug">
                <h3 class="card-title">Đường dẫn</h3>
                <span class="pl-2">(Vui lòng không nhập trùng tiêu đề)</span>
            </div>
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                    <?php foreach($config['website']['slug'] as $k => $v) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?=($k=='vi')?'active':''?>" id="tabs-lang" data-toggle="pill" href="#tabs-sluglang-<?=$k?>" role="tab" aria-controls="tabs-sluglang-<?=$k?>" aria-selected="true"><?=$v?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <input type="hidden" class="slug-id" value="<?=isset($id) ? $id : ''?>">
            <input type="hidden" class="slug-copy" value="<?=(isset($copy) && $copy == true) ? 1 : 0?>">
        </div>
    </div>
    <div class="card-body card-slug">
        <?php if(isset($slugchange) && $slugchange == 1) { ?>
            <div class="form-group mb-2">
                <label for="slugchange" class="d-inline-block align-middle slug-vns mb-0 mr-2">Thay đổi đường dẫn theo tiêu đề mới:</label>
                <div class="custom-control custom-checkbox d-inline-block align-middle">
                    <input type="checkbox" class="custom-control-input" name="slugchange" id="slugchange">
                    <label for="slugchange" class="custom-control-label"></label>
                </div>
            </div>
        <?php } ?>
        <div class="card card-vns card-primary-vns">
            <div class="card-body-vns">
                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                    <?php foreach($config['website']['slug'] as $k => $v) { ?>
                        <div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-sluglang-<?=$k?>" role="tabpanel" aria-labelledby="tabs-lang">
                            <div class="form-gourp form-gourp-slug-vns mb-0">
                                <label class="d-block">Đường dẫn mẫu (<?=$k?>):<span class="pl-2 font-weight-normal" id="slugurlpreview<?=$k?>"><?=$config_base?><?=@$item['tenkhongdau'.$k]?></span></label>
                                <input type="text" class="form-control slug-input no-validate" name="slug<?=$k?>" id="slug<?=$k?>" placeholder="Link đường dẫn (<?=$k?>)" value="<?=@$item['tenkhongdau'.$k]?>">
                                <input type="hidden" id="slug-default<?=$k?>" value="<?=@$item['tenkhongdau'.$k]?>">
                                <p class="alert-slug<?=$k?> text-danger d-none mt-2 mb-0" id="alert-slug-danger<?=$k?>">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    <span>Đường dẫn đã tồn tại. Đường dẫn truy cập mục này có thể bị trùng lặp.</span>
                                </p>
                                <p class="alert-slug<?=$k?> text-success d-none mt-2 mb-0" id="alert-slug-success<?=$k?>">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    <span>Đường dẫn hợp lệ.</span>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>