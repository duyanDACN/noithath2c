<!-- SEO -->
<?php
$slugurlArray = '';
$seo_create = '';
if(($com == "static" || $com == "seopage") && isset($config['website']['comlang']))
{
    foreach($config['website']['comlang'] as $k => $v)
    {
        if($type == $k)
        {
            $slugurlArray = $v;
            break;
        }
    }
}
?>
<div class="card-seo" x-data="seoRankMath()" x-init="init()">
    <div class="card-header-vns">
        <div class="flex-card-slug">
            <div class="title-card-slug">
                <h3 class="card-title">Nội dung SEO</h3>
            </div>
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                    <?php foreach($config['website']['seo'] as $k => $v) { $seo_create .= $k.","; ?>
                    <li class="nav-item">
                        <a class="nav-link <?=($k=='vi')?'active':''?>" id="tabs-lang" data-toggle="pill" href="#tabs-seolang-<?=$k?>" role="tab" aria-controls="tabs-seolang-<?=$k?>" aria-selected="true"><?=$v?>
                    </a>
                </li>
            <?php } ?>
            <?php if($com!='setting') {?>
                <li class="nav-item">
                    <a class="nav-link" id="tabs-lang" data-toggle="pill" href="#tabs-robots" role="tab" aria-controls="tabs-robots" aria-selected="true">Robots meta tag</a>
                </li>
            <?php }?>
            <?php if($com!='seopage') {?>
                <li class="nav-item">
                    <a class="btn btn-sm btn-create-seo d-inline-block text-white float-right create-seo" title="Tạo SEO"><i class="fa fa-plus" aria-hidden="true"></i> Tạo SEO</a>
                </li>
            <?php }?>
        </ul>
    </div>
</div>
</div>
<div class="card card-primary card-outline-tabs">
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-three-tabContent-lang">
            <?php foreach($config['website']['seo'] as $k => $v) { ?>
                <div class="tab-pane fade show <?=($k=='vi')?'active':''?>" id="tabs-seolang-<?=$k?>" role="tabpanel" aria-labelledby="tabs-lang">
                    <div class="form-group">
                        <div class="label-seo">
                            <label for="title<?=$k?>">SEO Title (<?=$k?>):</label>
                            <strong class="count-seo"><span><?=strlen(utf8_decode(@$seoDB['title'.$k]))?></span>/70 ký tự</strong>
                        </div>
                        <input type="text" class="form-control check-seo title-seo" name="dataSeo[title<?=$k?>]" id="title<?=$k?>" placeholder="SEO Title (<?=$k?>)" value="<?=@$seoDB['title'.$k]?>">
                    </div>
                    <div class="form-group">
                        <div class="label-seo">
                            <label for="keywords<?=$k?>">SEO Keywords (<?=$k?>):</label>
                            <strong class="count-seo"><span><?=strlen(utf8_decode(@$seoDB['keywords'.$k]))?></span>/70 ký tự</strong>
                        </div>
                        <input type="text" class="form-control check-seo keywords-seo" name="dataSeo[keywords<?=$k?>]" id="keywords<?=$k?>" placeholder="SEO Keywords (<?=$k?>)" value="<?=@$seoDB['keywords'.$k]?>">
                    </div>
                    <div class="form-group">
                        <div class="label-seo">
                            <label for="description<?=$k?>">SEO Description (<?=$k?>):</label>
                            <strong class="count-seo"><span><?=strlen(utf8_decode(@$seoDB['description'.$k]))?></span>/160 ký tự</strong>
                        </div>
                        <textarea class="form-control check-seo description-seo" name="dataSeo[description<?=$k?>]" id="description<?=$k?>" rows="5" placeholder="SEO Description (<?=$k?>)"><?=@$seoDB['description'.$k]?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="label-seo">
                            <label for="seo_focus<?=$k?>">Keyword chính (<?=$k?>):</label>
                            <strong class="count-seo"><span><?=strlen(utf8_decode(@$seoDB['seo_focus'.$k]))?></span>/100 ký tự</strong>
                        </div>
                        <input type="text" class="form-control check-seo focus-keyword-seo" name="dataSeo[seo_focus<?=$k?>]" id="seo_focus<?=$k?>" placeholder="Keyword chính (<?=$k?>)" value="<?=@$seoDB['seo_focus'.$k]?>">
                    </div>
                    <div class="seo-panel-group mb-0 seo-general" id="seo-general-<?=$k?>">
                     <ul>
                        <?php if((($config['product'][$type]['noidung'] == true) || ($config['news'][$type]['noidung'] == true)) && $com!= 'seopage' && ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')) { ?>
                            <!-- Kiểm tra từ khóa đã được nhập hay chưa -->
                            <li key="keywordNotUsed" class="seo-check-keywordNotUsed test-fail <?= !empty($seoDB['seo_focus'.$k]) ? 'test-success' : '' ?>">
                                <span class="icon">
                                    <i class="fa <?= !empty($seoDB['seo_focus'.$k]) ? 'fa-check' : 'fa-times' ?>"></i>
                                </span>
                                <span class="txt">
                                    <?= !empty($seoDB['seo_focus'.$k]) ? 'Từ khóa chính đã được nhập.' : 'Đặt Từ khóa tập trung cho nội dung này.' ?>
                                </span>
                            </li>
                            <!-- Kiểm tra nếu từ khóa có trong tiêu đề -->
                            <li key="keywordInTitle" class="seo-check-keywordInTitle test-fail 
                            <?= (!empty($seoDB['title'.$k]) && !empty($seoDB['seo_focus'.$k]) && strpos(strtolower($seoDB['title'.$k]), strtolower($seoDB['seo_focus'.$k])) !== false) ? 'test-success' : '' ?>">
                            <span class="icon">
                                <i class="fa 
                                <?= (!empty($seoDB['title'.$k]) && !empty($seoDB['seo_focus'.$k]) && strpos(strtolower($seoDB['title'.$k]), strtolower($seoDB['seo_focus'.$k])) !== false) ? 'fa-check' : 'fa-times' ?>">
                            </i>
                        </span>
                        <span class="txt">
                            <?= (!empty($seoDB['title'.$k]) && !empty($seoDB['seo_focus'.$k]) && strpos(strtolower($seoDB['title'.$k]), strtolower($seoDB['seo_focus'.$k])) !== false) 
                            ? 'Từ khóa chính đã có trong tiêu đề.' 
                            : (!empty($seoDB['seo_focus'.$k]) 
                                ? 'Thêm Từ khóa chính vào tiêu đề SEO.' 
                                : 'Chưa có từ khóa để kiểm tra.') ?>
                            </span>
                        </li>
                        <!-- Kiểm tra tiêu đề có bắt đầu bằng từ khóa chính -->
                        <li key="titleStartWithKeyword" class="seo-check-titleStartWithKeyword test-fail 
                        <?= (!empty($seoDB['title'.$k]) && !empty($seoDB['seo_focus'.$k]) && strpos(strtolower($seoDB['title'.$k]), strtolower($seoDB['seo_focus'.$k])) === 0) ? 'test-success' : '' ?>">
                        <span class="icon">
                            <i class="fa 
                            <?= (!empty($seoDB['title'.$k]) && !empty($seoDB['seo_focus'.$k]) && strpos(strtolower($seoDB['title'.$k]), strtolower($seoDB['seo_focus'.$k])) === 0) ? 'fa-check' : 'fa-times' ?>">
                        </i>
                    </span>
                    <span class="txt">
                        <?= (!empty($seoDB['title'.$k]) && !empty($seoDB['seo_focus'.$k]) && strpos(strtolower($seoDB['title'.$k]), strtolower($seoDB['seo_focus'.$k])) === 0)
                        ? 'Tiêu đề bắt đầu bằng từ khóa chính.'
                        : (!empty($seoDB['seo_focus'.$k]) 
                            ? 'Sử dụng từ khóa chính gần đầu tiêu đề SEO.'
                            : 'Chưa có từ khóa để kiểm tra.') ?>
                        </span>
                    </li>
                <?php }?>
                <!-- Kiểm tra độ dài tiêu đề -->
                <li key="lengthTitle" class="seo-check-lengthTitle test-fail <?= (strlen(utf8_decode(@$seoDB['title'.$k])) >= 10 && strlen(utf8_decode(@$seoDB['title'.$k])) <= 70) ? 'test-success' : '' ?>">
                    <span class="icon">
                        <i class="fa <?= (strlen(utf8_decode(@$seoDB['title'.$k])) >= 10 && strlen(utf8_decode(@$seoDB['title'.$k])) <= 70) ? 'fa-check' : 'fa-times' ?>"></i>
                        </span>
                        <span class="txt">
                            <?= (strlen(utf8_decode(@$seoDB['title'.$k])) >= 10 && strlen(utf8_decode(@$seoDB['title'.$k])) <= 70) ? 'Độ dài tiêu đề phù hợp' : 'Độ dài thẻ tiêu đề ngắn (10 - 70 ký tự)' ?>
                        </span>
                    </li>
                    <!-- Kiểm tra từ khóa trong mô tả meta -->
                    <li key="keywordInMetaDescription" class="seo-check-keywordInMetaDescription test-fail <?= !empty($seoDB['keywords'.$k]) ? 'test-success' : '' ?>">
                        <span class="icon">
                            <i class="fa <?= !empty($seoDB['keywords'.$k]) ? 'fa-check' : 'fa-times' ?>"></i>
                        </span>
                        <span class="txt">
                            <?= !empty($seoDB['keywords'.$k]) ? 'Đã có từ khóa' : 'Thêm Từ khóa tập trung vào Mô tả meta SEO của bạn.' ?>
                        </span>
                    </li>
                    <!-- Kiểm tra độ dài mô tả meta -->
                    <li key="lengthMetaDescription" class="seo-check-lengthMetaDescription test-fail <?= (strlen(utf8_decode(@$seoDB['description'.$k])) >= 100 && strlen(utf8_decode(@$seoDB['description'.$k])) <= 160) ? 'test-success' : '' ?>">
                        <span class="icon">
                            <i class="fa <?= (strlen(utf8_decode(@$seoDB['description'.$k])) >= 100 && strlen(utf8_decode(@$seoDB['description'.$k])) <= 160) ? 'fa-check' : 'fa-times' ?>"></i>
                            </span>
                            <span class="txt">
                                <?= (strlen(utf8_decode(@$seoDB['description'.$k])) >= 100 && strlen(utf8_decode(@$seoDB['description'.$k])) <= 160) ? 'Độ dài mô tả phù hợp' : 'Độ dài thẻ mô tả ngắn từ 100 - 160 kí tự' ?>
                            </span>
                        </li>
                        <?php if((($config['product'][$type]['noidung'] == true) || ($config['news'][$type]['noidung'] == true)) && $com!= 'seopage' && ($_REQUEST['act'] == 'add' || $_REQUEST['act'] == 'edit')) { ?>
                            <!-- Kiểm tra từ khóa chính trong URL -->
                            <li key="keywordInPermalink" class="seo-check-keywordInPermalink test-fail <?= !empty(@$item['tenkhongdau'.$k]) && strpos(strtolower(@$item['tenkhongdau'.$k]), str_replace(" ","-",strtolower($seoDB['seo_focus'.$k]))) !== false ? 'test-success' : '' ?>">
                                <span class="icon">
                                    <i class="fa <?= !empty(@$item['tenkhongdau'.$k]) && strpos(strtolower(@$item['tenkhongdau'.$k]), str_replace(" ","-",strtolower($seoDB['seo_focus'.$k]))) !== false ? 'fa-check' : 'fa-times' ?>"></i>
                                </span>
                                <span class="txt">
                                    <?= !empty(@$item['tenkhongdau'.$k]) && strpos(strtolower(@$item['tenkhongdau'.$k]), str_replace(" ","-",strtolower($seoDB['seo_focus'.$k]))) !== false ? 'Từ khóa chính đã có trong URL.' : 'Sử dụng từ khóa chính trong URL.' ?>
                                </span>
                            </li>
                            <?php
                                // Kiểm tra độ dài URL
                            $lengthPermalinkValid = strlen(utf8_decode(@$item['tenkhongdau'.$k])) >= 15;
                            // Kiểm tra từ khóa trong 10% đầu nội dung
                            if (!empty($item['noidung'.$k]) && !empty($seoDB['seo_focus'.$k])) {

                                $keywordIn10Percent = isset($item['noidung'.$k]) && strpos(substr($item['noidung'.$k], 0, floor(strlen($item['noidung'.$k]) * 0.1)), @$seoDB['seo_focus'.$k]) !== false;
                            }else {

                                $keywordIn10Percent = false;
                                $missingDataMessage = empty($seoDB['seo_focus'.$k]) ? 'Chưa có từ khóa để kiểm tra.' : 'Nội dung chưa có dữ liệu.';
                            }
                                // Kiểm tra từ khóa xuất hiện trong toàn bộ nội dung
                            if (!empty($item['noidung'.$k]) && !empty($seoDB['seo_focus'.$k])) {
                                $keywordInContent = isset($item['noidung'.$k]) && strpos($item['noidung'.$k], @$seoDB['seo_focus'.$k]) !== false;
                            }else {
                                $keywordInContent = false;
                            }

                                // Kiểm tra độ dài nội dung
                            $contentLength = isset($item['noidung'.$k]) ? str_word_count($item['noidung'.$k]) : 0;
                            $lengthContentValid = $contentLength >= 600 && $contentLength <= 2500;
                                // Tên miền nội bộ (thay thế bằng tên miền trang web của bạn)
                            $internalDomain = $config_base;
                                // Sử dụng DOMDocument để phân tích nội dung
                            libxml_use_internal_errors(true);
                            $dom = new DOMDocument();
                            $dom->loadHTML('<?xml encoding="UTF-8">'.htmlspecialchars_decode($item['noidung'.$k]), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                            libxml_clear_errors();
                                // Danh sách các liên kết nội bộ
                            $hasInternalLink = [];
                                // Tìm tất cả các thẻ <a>
                            $anchors = $dom->getElementsByTagName('a');

                            foreach ($anchors as $anchor) {
                                    $href = $anchor->getAttribute('href'); // Lấy giá trị thuộc tính href
                                    if (strpos($href, $internalDomain) !== false) {
                                        $hasInternalLink[] = $href; // Thêm vào danh sách liên kết nội bộ
                                    }
                                }
                                // Từ khóa chính cần kiểm tra
                                $mainKeyword = @$seoDB['seo_focus'.$k];
                                $subheadings = ['h2', 'h3', 'h4', 'h5', 'h6'];
                                $keywordInSubheadings = false;
                                foreach ($subheadings as $tag) {
                                    $elements = $dom->getElementsByTagName($tag);
                                    foreach ($elements as $element) {
                                        if (stripos($element->textContent, $mainKeyword) !== false) {
                                            $keywordInSubheadings = true;
                                            break 2; // Thoát ngay khi tìm thấy
                                        }
                                    }
                                }
                                // Kiểm tra từ khóa trong thuộc tính alt của hình ảnh
                                $images = $dom->getElementsByTagName('img');
                                $keywordInImageAlt = false;
                                foreach ($images as $image) {
                                    $alt = $image->getAttribute('alt'); // Lấy thuộc tính alt
                                    if (stripos($alt, $mainKeyword) !== false) {
                                        $keywordInImageAlt = true;
                                        break; // Thoát ngay khi tìm thấy
                                    }
                                }
                                // Loại bỏ các thẻ HTML để lấy nội dung thuần
                                $textContent = strip_tags(htmlspecialchars_decode($item['noidung'.$k]));
                                // Tổng số từ trong nội dung
                                $totalWords = str_word_count($textContent);
                                // Đếm số lần xuất hiện của từ khóa chính (không phân biệt hoa thường)
                                if($mainKeyword==''){
                                    $keywordCount = 0;
                                }else{
                                    $keywordCount = substr_count(strtolower($textContent), strtolower($mainKeyword));
                                }
                                // Tính mật độ từ khóa (Keyword Density)
                                $keywordDensity = $totalWords > 0 ? ($keywordCount / $totalWords) * 100 : 0;
                                // Kiểm tra nếu mật độ từ khóa nằm trong khoảng 1% - 3%
                                $isKeywordDensityValid = $keywordDensity >= 1 && $keywordDensity <= 3;
                                // Lấy tất cả các thẻ <p>
                                $paragraphs = $dom->getElementsByTagName('p');
                                // Thiết lập giới hạn cho độ dài đoạn văn (ví dụ 20-100 từ)
                                $minWordsPerParagraph = 20; // Tối thiểu 20 từ
                                $maxWordsPerParagraph = 100; // Tối đa 100 từ
                                $shortParagraphs = false;
                                foreach ($paragraphs as $paragraph) {
                                    // Đếm số từ trong đoạn văn
                                    $paragraphText = strip_tags($paragraph->textContent);
                                    $wordCount = str_word_count($paragraphText);
                                    if ($wordCount >= $minWordsPerParagraph || $wordCount <= $maxWordsPerParagraph) {
                                        $shortParagraphs = true;
                                        break;
                                    }
                                }
                                // Kiểm tra các thẻ <img>, <video>, <iframe> (cho video)
                                $images = $dom->getElementsByTagName('img');
                                $videos = $dom->getElementsByTagName('video');
                                $iframes = $dom->getElementsByTagName('iframe');
                                // Kiểm tra có hình ảnh hoặc video không
                                $hasAssets = false;
                                if ($images->length > 0 || $videos->length > 0 || $iframes->length > 0) {
                                    $hasAssets = true;
                                }
                                ?>
                                <!-- Kiểm tra độ dài URL -->
                                <li key="lengthPermalink" class="seo-check-lengthPermalink <?= $lengthPermalinkValid ? 'test-success' : 'test-fail' ?>">
                                    <span class="icon">
                                        <i class="fa <?= $lengthPermalinkValid ? 'fa-check' : 'fa-times' ?>"></i>
                                    </span>
                                    <span class="txt">
                                        <?= $lengthPermalinkValid ? 'Độ dài URL phù hợp.' : 'URL phải có ít nhất 15 ký tự.' ?>
                                    </span>
                                </li>
                                <!-- Kiểm tra từ khóa trong 10% đầu -->
                                <li key="keywordIn10Percent" class="seo-check-keywordIn10Percent <?= $keywordIn10Percent ? 'test-success' : 'test-fail' ?>">
                                    <span class="icon">
                                        <i class="fa <?= $keywordIn10Percent ? 'fa-check' : 'fa-times' ?>"></i>
                                    </span>
                                    <span class="txt">
                                        <?= $keywordIn10Percent
                                        ? 'Từ khóa chính xuất hiện ở đầu nội dung.'
                                        : (!empty($missingDataMessage)
                                            ? $missingDataMessage
                                            : 'Sử dụng từ khóa chính ở đầu nội dung của bạn.') ?>
                                        </span>
                                    </li>
                                    <!-- Kiểm tra từ khóa trong nội dung -->
                                    <li key="keywordInContent" class="seo-check-keywordInContent <?= $keywordInContent ? 'test-success' : 'test-fail' ?>">
                                        <span class="icon">
                                            <i class="fa <?= $keywordInContent ? 'fa-check' : 'fa-times' ?>"></i>
                                        </span>
                                        <span class="txt">
                                            <?= $keywordInContent ? 'Từ khóa chính đã được sử dụng trong nội dung.' : 'Sử dụng từ khóa chính trong nội dung.' ?>
                                        </span>
                                    </li>
                                    <!-- Kiểm tra độ dài nội dung -->
                                    <li key="lengthContent" class="seo-check-lengthContent <?= $lengthContentValid ? 'test-success' : 'test-fail' ?>">
                                        <span class="icon">
                                            <i class="fa <?= $lengthContentValid ? 'fa-check' : 'fa-times' ?>"></i>
                                        </span>
                                        <span class="txt">
                                            <?= $lengthContentValid ? 'Độ dài nội dung phù hợp (600-2500 từ).' : 'Nội dung phải dài 600-2500 từ.' ?>
                                        </span>
                                    </li>
                                    <!-- Kiểm tra liên kết nội bộ -->
                                    <li key="linksHasInternal" class="seo-check-linksHasInternal <?= $hasInternalLink ? 'test-success' : 'test-fail' ?>">
                                        <span class="icon">
                                            <i class="fa <?= $hasInternalLink ? 'fa-check' : 'fa-times' ?>"></i>
                                        </span>
                                        <span class="txt">
                                            <?= $hasInternalLink ? 'Đã thêm liên kết nội bộ vào nội dung.' : 'Thêm liên kết nội bộ vào nội dung của bạn.' ?>
                                        </span>
                                    </li>
                                    <!-- Kiểm tra từ khóa trong tiêu đề phụ -->
                                    <li key="keywordInSubheadings" class="seo-check-keywordInSubheadings <?= $keywordInSubheadings ? 'test-success' : 'test-fail' ?>">
                                        <span class="icon">
                                            <i class="fa <?= $keywordInSubheadings ? 'fa-check' : 'fa-times' ?>"></i>
                                        </span>
                                        <span class="txt">
                                            <?= $keywordInSubheadings ? 'Từ khóa chính có trong (các) tiêu đề phụ.' : 'Sử dụng từ khóa chính trong (các) tiêu đề phụ như H2, H3, H4, H5, H6.' ?>
                                        </span>
                                    </li>
                                    <!-- Kiểm tra từ khóa trong thuộc tính alt của hình ảnh -->
                                    <li key="keywordInImageAlt" class="seo-check-keywordInImageAlt <?= $keywordInImageAlt ? 'test-success' : 'test-fail' ?>">
                                        <span class="icon">
                                            <i class="fa <?= $keywordInImageAlt ? 'fa-check' : 'fa-times' ?>"></i>
                                        </span>
                                        <span class="txt">
                                            <?= $keywordInImageAlt ? 'Từ khóa đã được thêm vào thuộc tính alt của hình ảnh.' : 'Thêm từ khóa vào thuộc tính alt của hình ảnh.' ?>
                                        </span>
                                    </li>
                                    <!-- Kiểm tra mật độ từ khóa -->
                                    <li key="keywordDensity" class="seo-check-keywordDensity <?= $isKeywordDensityValid ? 'test-success' : 'test-fail' ?>">
                                        <span class="icon">
                                            <i class="fa <?= $isKeywordDensityValid ? 'fa-check' : 'fa-times' ?>"></i>
                                        </span>
                                        <span class="txt">
                                            <?= $isKeywordDensityValid 
                                            ? 'Mật độ từ khóa là ' . round($keywordDensity, 2) . '%. Phù hợp với mục tiêu (1% - 3%).' 
                                            : 'Mật độ từ khóa là ' . round($keywordDensity, 2) . '%. Nhắm đến khoảng 1% - 3%.' ?>
                                        </span>
                                    </li>
                                    <!-- Kiểm tra đoạn văn ngắn và súc tích -->
                                    <li key="contentHasShortParagraphs" class="seo-check-contentHasShortParagraphs <?= $shortParagraphs ? 'test-success' : 'test-fail' ?>">
                                        <span class="icon">
                                            <i class="fa <?= $shortParagraphs ? 'fa-check' : 'fa-times' ?>"></i>
                                        </span>
                                        <span class="txt">
                                            <?= $shortParagraphs ? 'Các đoạn văn ngắn và súc tích, dễ đọc.' : 'Thêm các đoạn văn ngắn và súc tích để dễ đọc và UX hơn.' ?>
                                        </span>
                                    </li>
                                    <!-- Kiểm tra có hình ảnh hoặc video trong bài viết -->
                                    <li key="contentHasAssets" class="seo-check-contentHasAssets <?= $hasAssets ? 'test-success' : 'test-fail' ?>">
                                        <span class="icon">
                                            <i class="fa <?= $hasAssets ? 'fa-check' : 'fa-times' ?>"></i>
                                        </span>
                                        <span class="txt">
                                            <?= $hasAssets ? 'Có hình ảnh hoặc video trong bài viết.' : 'Thêm hình ảnh hoặc video vào bài viết để làm phong phú nội dung.' ?>
                                        </span>
                                    </li>
                                <?php }?>
                            </ul>
                        </div>
                        <!-- SEO preview -->
                        <div class="form-group form-group-seo-preview mb-0 mt-3">
                            <label class="label-seo-preview"><img class="mr-2" src="assets/images/icon_info.png">Khi lên top, page này sẽ hiển thị theo dạng mẫu như sau:</label>
                            <div class="seo-preview">
                                <?php if($slugurlArray) { ?>
                                    <p class="slug-seo-preview" id="seourlpreview<?=$k?>" data-seourlstatic="0"><?=$config_base?><strong><?=$slugurlArray[$k]?></strong></p>
                                <?php } else { ?>
                                    <p class="slug-seo-preview" id="seourlpreview<?=$k?>" data-seourlstatic="<?=($com == 'setting') ? 0 : 1?>"><?=$config_base?><strong><?=@$item['tenkhongdau'.$k]?></strong></p>
                                <?php } ?>
                                <p class="title-seo-preview text-split" id="title-seo-preview<?=$k?>"><?php if(isset($seoDB['title'.$k])) { echo @$seoDB['title'.$k]; } else if(isset($item['ten'.$k])) { echo @$item['ten'.$k]; } else { echo "Title"; } ?></p>
                                <p class="description-seo-preview text-split" id="description-seo-preview<?=$k?>"><?=(isset($seoDB['description'.$k])) ? @$seoDB['description'.$k] : "Description"?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if($com!='setting') {?>
                    <div class="tab-pane fade show" id="tabs-robots" role="tabpanel" aria-labelledby="tabs-robots">
                        <div class="flex-radio-seo">
                            <div class="radio-seo custom-control custom-radio">
                                <input type="radio" id="rbindex" name="dataSeo[rbindex]" class="custom-control-input" value="1" <?php if(@$seoDB['rbindex']==1) echo 'checked';?> checked required>
                                <label class="custom-control-label" for="rbindex">Index</label>
                            </div>
                            <div class="radio-seo custom-control custom-radio">
                                <input type="radio" id="norbindex" name="dataSeo[rbindex]" class="custom-control-input" value="2" <?php if(@$seoDB['rbindex']==2) echo 'checked';?> required>
                                <label class="custom-control-label" for="norbindex">No Index</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="meta-tags col-md-3">
                                <label for="canonical">Canonical</label>
                                <input type="text" id="canonical" name="dataSeo[canonical]" class="form-control" value="<?=@$seoDB['canonical']?>">
                            </div>
                            <div class="meta-tags col-md-3">
                                <label for="ogsitename">Og:site_name</label>
                                <input type="text" id="ogsitename" name="dataSeo[ogsitename]" class="form-control" value="<?=@$seoDB['ogsitename']?>">
                            </div>
                            <div class="meta-tags col-md-3">
                                <label for="ogtype">Og:type</label>
                                <input type="text" id="ogtype" name="dataSeo[ogtype]" class="form-control" value="<?=@$seoDB['ogtype']?>">
                            </div>
                            <div class="meta-tags col-md-3">
                                <label for="ogurl">Og:url</label>
                                <input type="text" id="ogurl" name="dataSeo[ogurl]" class="form-control" value="<?=@$seoDB['ogurl']?>">
                            </div>  
                        </div>
                    </div>
                <?php }?>
            </div>
            <input type="hidden" id="seo-create" value="<?=(isset($seo_create)) ? rtrim($seo_create,",") : ''?>">
        </div>
    </div>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
     if ($('.form-control-ckeditor').length) {
         $('.form-control-ckeditor').each(function() {
             var id = $(this).attr('id');
             CKEDITOR.replace(id);
         });
     }
 </script>
 <script>
 // Hàm cập nhật kết quả kiểm tra SEO cho các điều kiện
 function updateSeoStatus(key, isSuccess, message) {
    var listItem = $("li[key=" + key + "]");
    var iconHtml = isSuccess ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times"></i>';
    var statusClass = isSuccess ? 'test-success' : 'test-fail';
    listItem.removeClass('test-fail test-success').addClass(statusClass);
    listItem.find('span.icon').html(iconHtml);
    listItem.find('span.txt').html(message);
}
// Hàm kiểm tra độ dài của input
function checkSeoCondition(inputElement, minLength, maxLength, key, successMessage, failMessages) {
    var inputLength = inputElement.val().length;
    var message = (inputLength < minLength) ? failMessages.min : (inputLength > maxLength) ? failMessages.max : successMessage;
    updateSeoStatus(key, inputLength >= minLength && inputLength <= maxLength, message.replace("{length}", inputLength));
}
// Hàm kiểm tra từ khóa trong trường từ khóa chính
function checkKeywordInFocus(k) {
    var focusKeyword = $("#seo_focus" + k).val().trim();
    updateSeoStatus('keywordNotUsed', focusKeyword.length > 0, focusKeyword.length > 0 ? 'Từ khóa chính đã được nhập.' : 'Đặt Từ khóa tập trung cho nội dung này.');
}
// Hàm kiểm tra từ khóa có trong tiêu đề
function checkKeywordInTitle(k) {
    var title = $("#ten" + k).val().toLowerCase();
    var seoFocus = $("#seo_focus" + k).val().toLowerCase();
    var message = title.indexOf(seoFocus) !== -1 ? 'Từ khóa chính đã có trong tiêu đề.' : 'Thêm Từ khóa chính vào tiêu đề SEO.';
    updateSeoStatus('keywordInTitle', title.indexOf(seoFocus) !== -1 && seoFocus.length > 0, message);
}
// Hàm kiểm tra tiêu đề có bắt đầu với từ khóa chính
function checkTitleStartWithKeyword(k) {
    var title = $("#ten" + k).val().toLowerCase();
    var seoFocus = $("#seo_focus" + k).val().toLowerCase();
    var message = title.startsWith(seoFocus) ? 'Tiêu đề bắt đầu bằng từ khóa chính.' : 'Sử dụng từ khóa chính gần đầu tiêu đề SEO.';
    updateSeoStatus('titleStartWithKeyword', title.startsWith(seoFocus) && seoFocus.length > 0, message);
}
// Hàm kiểm tra URL có chứa từ khóa chính và kiểm tra chiều dài URL
function checkSeoUrl(k) {
    var seoFocusValue = $("#seo_focus" + k).val().trim().toLowerCase();
    var slugValue = $("#slug" + k).val().trim().toLowerCase();
    // Loại bỏ khoảng trắng trong từ khóa và slug để thay thế thành dấu gạch ngang cho dễ so sánh
    seoFocusValue = seoFocusValue.replace(/\s+/g, '-');
    slugValue = slugValue.replace(/\s+/g, '-');
    // Kiểm tra từ khóa có trong URL
    updateSeoStatus('keywordInPermalink', slugValue.includes(seoFocusValue) && seoFocusValue.length > 0, 
        slugValue.includes(seoFocusValue) ? 'Từ khóa chính đã có trong URL.' : 'Sử dụng từ khóa chính trong URL.');
    // Kiểm tra chiều dài URL
    var isSlugLengthValid = slugValue.length >= 15;
    updateSeoStatus('lengthPermalink', isSlugLengthValid, isSlugLengthValid ? 'Độ dài URL phù hợp.' : 'URL có 15 ký tự (ngắn).');
}
// Hàm xử lý sự kiện keyup chung
function handleKeyup(k) {
    checkKeywordInFocus(k);
    checkKeywordInTitle(k);
    checkTitleStartWithKeyword(k);
    checkSeoUrl(k);
}
// Gắn sự kiện keyup cho các trường nhập liệu
$('body').on("keyup", ".focus-keyword-seo, .title-seo, .description-seo, .keywords-seo", function() {
    var k = $(this).attr('id').includes("seo_focus") ? $(this).attr('id').replace("seo_focus", "") : $(this).attr('id').replace("ten", "");
    if ($(this).hasClass('focus-keyword-seo')) {
        // Kiểm tra từ khóa đã nhập hay chưa
        checkKeywordInFocus(k);
    } else if ($(this).hasClass('title-seo')) {
        // Kiểm tra độ dài tiêu đề
        checkSeoCondition($(this), 10, 70, "lengthTitle", "Độ dài tiêu đề phù hợp", { min: "Tiêu đề {length} ký tự (ngắn). Cố gắng có được 70 ký tự", max: "Tiêu đề có {length} ký tự. Hãy xem xét rút ngắn nó." });
    } else if ($(this).hasClass('description-seo')) {
        // Kiểm tra độ dài mô tả
        checkSeoCondition($(this), 100, 160, "lengthMetaDescription", "Độ dài mô tả phù hợp", { min: "Mô tả {length} ký tự (ngắn). Cố gắng có được 160 ký tự", max: "Mô tả có {length} ký tự. Hãy xem xét rút ngắn nó." });
    } else if ($(this).hasClass('keywords-seo')) {
        // Kiểm tra từ khóa trong mô tả meta
        var keywordLength = $(this).val().length;
        updateSeoStatus('keywordInMetaDescription', keywordLength > 0, keywordLength > 0 ? 'Đã có từ khóa' : 'Thêm Từ khóa tập trung vào Mô tả meta SEO của bạn.');
    }
    // Kiểm tra các điều kiện SEO chung
    handleKeyup(k);
});
$(document).ready(function () {
    // Kích hoạt CKEditor
    $(".form-control-ckeditor").each(function () {
        var id = $(this).attr("id");
        CKEDITOR.replace(id);
    });
    // Lắng nghe sự kiện keyup trên input focus-keyword-seo
    $(".focus-keyword-seo").on("keyup", function () {
        var keyword = $(this).val().trim(); // Lấy từ khóa chính
        var relatedTextareaId = $(this).attr("id").replace("seo_focus", "noidung"); // Tìm textarea CKEditor liên quan
        var editorInstance = CKEDITOR.instances[relatedTextareaId];
        // Nếu CKEditor có tồn tại
        if (editorInstance) {
            // Lấy nội dung CKEditor
            var editorData = editorInstance.getData().trim();
            // Loại bỏ các thẻ HTML đầu
            var plainText = $("<div>").html(editorData).text().trim();
            // Điều kiện 1: Từ khóa xuất hiện ở đầu nội dung
            var keywordInStart = plainText.toLowerCase().startsWith(keyword.toLowerCase());
            if (keyword && keywordInStart) {
                $("li[key='keywordIn10Percent']")
                .removeClass("test-fail")
                .addClass("test-success")
                .find(".icon")
                .html('<i class="fa fa-check"></i>');
            } else {
                $("li[key='keywordIn10Percent']")
                .removeClass("test-success")
                .addClass("test-fail")
                .find(".icon")
                .html('<i class="fa fa-times"></i>');
            }
            // Điều kiện 2: Từ khóa xuất hiện ở bất kỳ vị trí nào trong nội dung
            var keywordInContent = plainText.toLowerCase().includes(keyword.toLowerCase());
            if (keyword && keywordInContent) {
                $("li[key='keywordInContent']")
                .removeClass("test-fail")
                .addClass("test-success")
                .find(".icon")
                .html('<i class="fa fa-check"></i>');
            } else {
                $("li[key='keywordInContent']")
                .removeClass("test-success")
                .addClass("test-fail")
                .find(".icon")
                .html('<i class="fa fa-times"></i>');
            }
            // Điều kiện 3: Độ dài nội dung nằm trong khoảng 600-2500 từ
            var wordCount = plainText.split(/\s+/).filter(word => word.length > 0).length;
            if (wordCount >= 600 && wordCount <= 2500) {
                $("li[key='lengthContent']")
                .removeClass("test-fail")
                .addClass("test-success")
                .find(".icon")
                .html('<i class="fa fa-check"></i>');
            } else {
                $("li[key='lengthContent']")
                .removeClass("test-success")
                .addClass("test-fail")
                .find(".icon")
                .html('<i class="fa fa-times"></i>');
            }
            // Điều kiện 4: Kiểm tra xem có liên kết nội bộ hay không
            var hasInternalLinks = /href=["'].*?["']/i.test(editorData);
            if (hasInternalLinks) {
                $("li[key='linksHasInternal']")
                .removeClass("test-fail")
                .addClass("test-success")
                .find(".icon")
                .html('<i class="fa fa-check"></i>');
            } else {
                $("li[key='linksHasInternal']")
                .removeClass("test-success")
                .addClass("test-fail")
                .find(".icon")
                .html('<i class="fa fa-times"></i>');
            }
            // Điều kiện kiểm tra từ khóa trong tiêu đề phụ
            var keywordInSubheadings = false;
            // Biểu thức chính quy để kiểm tra các thẻ H2, H3, H4, H5, H6
            var escapedKeyword = keyword.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
            var subheadingsRegex = new RegExp(`<h[2-6][^>]*>[^<]*\\b${escapedKeyword}\\b[^<]*</h[2-6]>`, "i");
            if (subheadingsRegex.test(editorData)) {
                keywordInSubheadings = true;
            }
            // Cập nhật giao diện
            if (keyword && keywordInSubheadings) {
                $("li[key='keywordInSubheadings']")
                .removeClass("test-fail")
                .addClass("test-success")
                .find(".icon")
                .html('<i class="fa fa-check"></i>')
                .end()
                .find(".txt")
                .text("Từ khóa xuất hiện trong (các) tiêu đề phụ.");
            } else {
                $("li[key='keywordInSubheadings']")
                .removeClass("test-success")
                .addClass("test-fail")
                .find(".icon")
                .html('<i class="fa fa-times"></i>')
                .end()
                .find(".txt")
                .text("Sử dụng từ khóa chính trong (các) tiêu đề phụ như H2, H3, H4, H5, H6.");
            }
            // Điều kiện 6: Kiểm tra xem từ khóa có xuất hiện trong thuộc tính alt của hình ảnh hay không
            var keywordInImageAlt = false;
            // Lấy tất cả các thẻ <img> trong CKEditor và kiểm tra thuộc tính alt
            var doc = editorInstance.document;
            var images = doc.getElementsByTag('img');
            // Lặp qua các thẻ <img> và kiểm tra alt
            for (var i = 0; i < images.count(); i++) {
                var imgElement = images.getItem(i);
                var altText = imgElement.getAttribute('alt');
                if (altText && altText.toLowerCase().includes(keyword.toLowerCase())) {
                    keywordInImageAlt = true;
                    break; // Nếu tìm thấy từ khóa trong alt, không cần kiểm tra các ảnh còn lại
                }
            }
            // Kiểm tra kết quả và cập nhật trạng thái
            if (keyword && keywordInImageAlt) {
                $("li[key='keywordInImageAlt']")
                .removeClass("test-fail")
                .addClass("test-success")
                .find(".icon")
                .html('<i class="fa fa-check"></i>');
            } else {
                $("li[key='keywordInImageAlt']")
                .removeClass("test-success")
                .addClass("test-fail")
                .find(".icon")
                .html('<i class="fa fa-times"></i>');
            }
            // Điều kiện 7: Kiểm tra xem nội dung có chứa hình ảnh hoặc video hay không
            var contentHasAssets = false;
            // Kiểm tra sự tồn tại của thẻ <img> hoặc <video> trong nội dung
            var mediaElements = doc.getElementsByTag('img').count() > 0 || doc.getElementsByTag('video').count() > 0;
            if (mediaElements) {
                contentHasAssets = true;
            }
            // Cập nhật trạng thái cho điều kiện này
            if (contentHasAssets) {
                $("li[key='contentHasAssets']")
                .removeClass("test-fail")
                .addClass("test-success")
                .find(".icon")
                .html('<i class="fa fa-check"></i>');
            } else {
                $("li[key='contentHasAssets']")
                .removeClass("test-success")
                .addClass("test-fail")
                .find(".icon")
                .html('<i class="fa fa-times"></i>');
            }
        }
    });
});
// Lắng nghe sự kiện keyup trên input focus-keyword-seo
$(".focus-keyword-seo").on("keyup", function () {
        var keyword = $(this).val().trim(); // Lấy từ khóa chính
        var relatedTextareaId = $(this).attr("id").replace("seo_focus", "noidung"); // Tìm textarea CKEditor liên quan
        var editorInstance = CKEDITOR.instances[relatedTextareaId];
        // Nếu CKEditor có tồn tại
        if (editorInstance) {
            // Lấy nội dung CKEditor
            var editorData = editorInstance.getData().trim();
            // Loại bỏ các thẻ HTML đầu
            var plainText = $("<div>").html(editorData).text().trim();
            // Tính tổng số từ trong nội dung
            var totalWords = plainText.split(/\s+/).filter(word => word.length > 0).length;
            // Đếm số lần từ khóa xuất hiện trong nội dung (không phân biệt hoa thường)
            var keywordRegex = new RegExp("\\b" + keyword.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + "\\b", "gi");
            var keywordCount = (plainText.match(keywordRegex) || []).length;
            // Tính mật độ từ khóa (%)
            var keywordDensity = totalWords > 0 ? (keywordCount / totalWords) * 100 : 0;
            // Kiểm tra mật độ từ khóa
            if (keyword && keywordDensity >= 0.5 && keywordDensity <= 1.5) {
                $("li[key='keywordDensity']")
                .removeClass("test-fail")
                .addClass("test-success")
                .find(".icon")
                .html('<i class="fa fa-check"></i>')
                .end()
                .find(".txt")
                .text(`Mật độ từ khóa là ${keywordDensity.toFixed(2)}%. Mật độ tốt.`);
            } else {
                $("li[key='keywordDensity']")
                .removeClass("test-success")
                .addClass("test-fail")
                .find(".icon")
                .html('<i class="fa fa-times"></i>')
                .end()
                .find(".txt")
                .text(`Mật độ từ khóa là ${keywordDensity.toFixed(2)}%. Nhắm đến khoảng 1% Mật độ từ khóa.`);
            }
        }
    });
// Hàm kiểm tra đoạn văn ngắn
function checkShortParagraphs(editorData) {
    // Chuyển đổi nội dung HTML sang plain text
    var plainText = $("<div>").html(editorData).text().trim();
    // Tách nội dung thành từng đoạn văn bằng cách tìm các thẻ <p>
    var paragraphs = plainText.split(/\n+/); // Hoặc dùng cách khác nếu có định dạng đoạn văn rõ hơn
    // Kiểm tra độ dài của từng đoạn văn
    var allShort = false; // Giả định ban đầu là tất cả đoạn văn đều ngắn
    paragraphs.forEach(function(paragraph) {
        var wordCount = paragraph.split(/\s+/).filter(word => word.length > 0).length;
        if (wordCount >= 20 && wordCount <= 100) {
            allShort = true; // Nếu có đoạn văn dài hơn 100 từ, đánh dấu là true
        }
    });
    // Cập nhật trạng thái kiểm tra
    if (allShort) {
        $("li[key='contentHasShortParagraphs']")
        .removeClass("test-fail")
        .addClass("test-success")
        .find(".icon")
        .html('<i class="fa fa-check"></i>')
        .end()
        .find(".txt")
        .text("Các đoạn văn ngắn và súc tích giúp cải thiện UX.");
    } else {
        $("li[key='contentHasShortParagraphs']")
        .removeClass("test-success")
        .addClass("test-fail")
        .find(".icon")
        .html('<i class="fa fa-times"></i>')
        .end()
        .find(".txt")
        .text("Thêm các đoạn văn ngắn và súc tích để dễ đọc và UX hơn.");
    }
}
// Tích hợp vào sự kiện keyup trên CKEditor
$(".focus-keyword-seo").on("keyup", function() {
    var relatedTextareaId = $(this).attr("id").replace("seo_focus", "noidung"); // Tìm textarea CKEditor liên quan
    var editorInstance = CKEDITOR.instances[relatedTextareaId];
    // Nếu CKEditor có tồn tại
    if (editorInstance) {
        var editorData = editorInstance.getData().trim();
        // Kiểm tra đoạn văn ngắn
        checkShortParagraphs(editorData);
        // Thêm các logic kiểm tra khác nếu cần
    }
});
</script>