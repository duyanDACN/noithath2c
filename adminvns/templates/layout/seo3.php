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
<div class="card-seo">
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

            <li class="nav-item">
                <a class="nav-link" id="tabs-lang" data-toggle="pill" href="#tabs-robots" role="tab" aria-controls="tabs-robots" aria-selected="true">Robots meta tag</a>
            </li>
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
                    <div class="form-group ">
                        <div class="label-seo">
                            <label for="title<?=$k?>">SEO Title (<?=$k?>):</label>
                            <strong class="count-seo"><span><?=strlen(utf8_decode(@$seoDB['title'.$k]))?></span>/70 ký tự</strong>
                        </div>
                        <input x-model="title['<?=$k?>'].value" @keyup.debounce.50ms="seoRankMathGroup()" type="text"  class="form-control check-seo title-seo" name="dataSeo[title<?=$k?>]" id="title<?=$k?>" placeholder="SEO Title (<?=$k?>)" value="<?=@$seoDB['title'.$k]?>">
                    </div>
                    <div class="form-group ">
                        <div class="label-seo">
                            <label for="keywords<?=$k?>">SEO Keywords (<?=$k?>):</label>
                            <strong class="count-seo"><span><?=strlen(utf8_decode(@$seoDB['keywords'.$k]))?></span>/70 ký tự</strong>
                        </div>
                        <input type="text" class="form-control check-seo keywords-seo" name="dataSeo[keywords<?=$k?>]" id="keywords<?=$k?>" placeholder="SEO Keywords (<?=$k?>)" value="<?=@$seoDB['keywords'.$k]?>">
                    </div>
                    <div class="form-group ">
                        <div class="label-seo">
                            <label for="description<?=$k?>">SEO Description (<?=$k?>):</label>
                            <strong class="count-seo"><span><?=strlen(utf8_decode(@$seoDB['description'.$k]))?></span>/160 ký tự</strong>
                        </div>
                        <textarea class="form-control check-seo description-seo" name="dataSeo[description<?=$k?>]" id="description<?=$k?>" rows="5" placeholder="SEO Description (<?=$k?>)"><?=@$seoDB['description'.$k]?></textarea>
                    </div>
                    <div class="seo-panel-group mb-0 seo-general" id="seo-general-<?=$k?>">
                        <div class="form-group">
                           <label for=""><strong>Keyword chính</strong></label>
                           <div class="input-group">
                               <input x-model="keyword['vi'].value" x-on:change.debounce.50ms="seoRankMathGroup()" type="text" class="form-control seo_focus_keyword" value="" placeholder="Chèn từ khóa bạn muốn xếp hạng" id="seo_focus_keyword_vi" name="dataSeo[seo_focusvi]">
                               <span class="input-group-text"><span class="seo_point" id="seo_point_vi">0</span>/100</span>
                           </div>
                           <p style="margin: 5px 0; color: #ccc;">Chèn từ khóa bạn muốn xếp hạng.</p>
                       </div>
                       <ul>
                          <li key="keywordNotUsed" class="seo-check-keywordNotUsed test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Đặt Từ khóa tập trung cho nội dung này.</span>
                         </li>
                         <li key="keywordInTitle" class="seo-check-keywordInTitle test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Thêm Từ khóa chính vào tiêu đề SEO.</span>
                         </li>
                         <li key="titleStartWithKeyword" class="seo-check-titleStartWithKeyword test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Sử dụng từ khóa chính gần đầu tiêu đề SEO.</span>
                         </li>
                         <li key="lengthTitle" class="seo-check-lengthTitle test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Tiêu đề 0 ký tự (ngắn). Cố gắng có được 70 ký tự</span>
                         </li>
                         <li key="keywordInMetaDescription" class="seo-check-keywordInMetaDescription test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Thêm Từ khóa tập trung vào Mô tả meta SEO của bạn.</span>
                         </li>
                         <li key="lengthMetaDescription" class="seo-check-lengthMetaDescription test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Mô tả meta SEO có 0 ký tự (ngắn). Cố gắng thành 160 ký tự</span>
                         </li>
                         <li key="keywordInPermalink" class="seo-check-keywordInPermalink test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Sử dụng từ khóa chính trong URL.</span>
                         </li>
                         <li key="lengthPermalink" class="seo-check-lengthPermalink test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Url có 15 ký tự (ngắn).</span>
                         </li>
                         <li key="keywordIn10Percent" class="seo-check-keywordIn10Percent test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Sử dụng từ khóa chính ở đầu nội dung của bạn.</span>
                         </li>
                         <li key="keywordInContent" class="seo-check-keywordInContent test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Sử dụng từ khóa chính trong nội dung.</span>
                         </li>
                         <li key="lengthContent" class="seo-check-lengthContent test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Nội dung phải dài 600-2500 từ.</span>
                         </li>
                         <li key="linksHasInternal" class="seo-check-linksHasInternal test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Thêm liên kết nội bộ vào nội dung của bạn.</span>
                         </li>
                         <li key="keywordInSubheadings" class="seo-check-keywordInSubheadings test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Sử dụng từ khóa chính trong (các) tiêu đề phụ như H2, H3, H4, v.v..</span>
                         </li>
                         <li key="keywordInImageAlt" class="seo-check-keywordInImageAlt test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Thêm từ khóa vào thuộc tính alt của hình ảnh</span>
                         </li>
                         <li key="keywordDensity" class="seo-check-keywordDensity test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Mật độ từ khóa là 0. Nhắm đến khoảng 1% Mật độ từ khóa.</span>
                         </li>
                         <li key="contentHasShortParagraphs" class="seo-check-contentHasShortParagraphs test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Thêm các đoạn văn ngắn và súc tích để dễ đọc và UX hơn.</span>
                         </li>
                         <li key="contentHasAssets" class="seo-check-contentHasAssets test-fail">
                             <span class="icon"><i class="fa fa-times"></i></span>
                             <span class="txt">Thêm một vài hình ảnh để làm cho nội dung của bạn hấp dẫn.</span>
                         </li>
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
<script>
   /* SEO */
   function seoExist() {
       var inputs = $('.card-seo input.check-seo');
       var textareas = $('.card-seo textarea.check-seo');
       var flag = false;
       if (!flag) {
           inputs.each(function (index) {
               var input = $(this).attr('id');
               value = $('#' + input).val();
               if (value) {
                   flag = true;
                   return false;
               }
           });
       }

       if (!flag) {
           textareas.each(function (index) {
               var textarea = $(this).attr('id');
               value = $('#' + textarea).val();
               if (value) {
                   flag = true;
                   return false;
               }
           });
       }
       return flag;
   }
   function seoCreate() {
       var flag = true;
       var seolang = $('#seo-create').val();

       var seolangArray = seolang.split(',');
       var seolangCount = seolangArray.length;
       var inputArticle = $('.card-article input.for-seo');
       var textareaArticle = $('.card-article textarea.for-seo');
       var textareaArticleCount = textareaArticle.length;
       var count = 0;
       var inputSeo = $('.card-seo input.check-seo');
       var textareaSeo = $('.card-seo textarea.check-seo');

       /* SEO Create - Input */
       inputArticle.each(function (index) {
           var input = $(this).attr('id');
           var lang = input.substr(input.length - 2);
           if (seolang.indexOf(lang) >= 0) {
               name = $('#' + input).val();
               name = name.substr(0, 70);
               name = name.trim();
               $('#title' + lang + ', #keywords' + lang).val(name);
               seoCount($('#title' + lang));
               seoCount($('#keywords' + lang));
           }
       });
       for (var i = 0; i < seolangArray.length; i++)
           if (seolangArray[i]) {
               seoPreview(seolangArray[i]);
           }
       }
       function seoPreview(lang) {
           var titlePreview = '#title-seo-preview' + lang;
           var descriptionPreview = '#description-seo-preview' + lang;
           var title = $('#title' + lang).val();
           var description = $('#description' + lang).val();

           if ($(titlePreview).length) {
               if (title) $(titlePreview).html(title);
               else $(titlePreview).html('Title');
           }
           if ($(descriptionPreview).length) {
               if (description) $(descriptionPreview).html(description);
               else $(descriptionPreview).html('Description');
           }
       }
       function seoCount(obj) {
           if (obj.length) {
               var countseo = parseInt(obj.val().toString().length);
               countseo = countseo ? countseo++ : 0;

               obj.parents('div.form-group').children('div.label-seo').find('.count-seo span').html(countseo);
           }
       }
       function seoChange() {
           var seolang = 'vi,en';
           var elementSeo = $('.card-seo .check-seo');

           elementSeo.each(function (index) {
               var element = $(this).attr('id');
               var lang = element.substr(element.length - 2);
               if (seolang.indexOf(lang) >= 0) {
                   if ($('#' + element).length) {
                       $('body').on('keyup', '#' + element, function () {
                           seoPreview(lang);
                       });
                   }
               }
           });
       }
       seoChange();
       if ($('.create-seo').length) {
           $('body').on('click', '.create-seo', function () {
               if (seoExist()) confirmDialog('create-seo', 'Bạn muốn tạo lại nội dung seo', '');
               else seoCreate();
           });
       }
       if ($('.title-seo').length && $('.keywords-seo').length && $('.description-seo').length) {
           $('body').on('keyup', '.title-seo, .keywords-seo, .description-seo', function () {
               seoCount($(this));
           });
       }
   </script>
   <script>
       function seoRankMath() {
           return {
               icon : {
                   'error'   : '<i class="fa fa-times"></i>',
                   'success' : '<i class="ti ti-check"></i>'
               },
               messageError : {
                   'keywordInTitle' : 'Thêm Từ khóa chính vào tiêu đề SEO.'
               },
               messageSuccess : {
                   'keywordInTitle' : 'Tuyệt vời! Bạn đang sử dụng Keyword chính trong tiêu đề SEO.',
                   'lengthTitle' : 'Tuyệt vời! Tiêu đề của bạn đã có độ dài tối ưu',
                   'lengthMetaDescription' : 'Tuyệt vời! Mô tả meta seo của bạn đã có độ dài tối ưu'
               },
               domain : '<?=$config_base?>',
               lang: `vi`,
               content:{
                  'vi':'',
              },

              get keyword(){
               return {
                  'vi':{'this'  : $('#seo_focus_keyword_vi'),'value': $('#seo_focus_keyword_vi').val()},
              }
          },
          get title(){
           return {
              'vi':{'this'  : $('#namevi'),'value': $('#namevi').val()},
          };
      },
      get description(){
       return {
          'vi': {'this': $('#descriptionvi'), 'value': $('#descriptionvi').val()},
      }
  },
  get slug(){
   return {
      'vi': $('#slugvi').val(),
  }
},
init() {
   var root = this;
   setTimeout(function (){
       for (var editorId in CKEDITOR.instances) {
           let subID = editorId.substring(7);
           root.content[subID] =  CKEDITOR.instances[editorId].getData();
       }
   },100);
   this.title[`vi`].value = this.title[`vi`].value.toLowerCase();
   this.keyword[`vi`].value = this.keyword[`vi`].value.toLowerCase();
   this.description[`vi`].value = this.description[`vi`].value.toLowerCase();
   let targetvi = document.getElementById('slugurlpreviewvi').firstElementChild;
   let observervi = new MutationObserver(function(mutations) {
       mutations.forEach(function(mutation) {
           root.slug['vi'] = mutation.target.textContent.toLowerCase();
       });
   });
   observervi.observe(targetvi, { childList: true });
   setTimeout(function (){
       for (var editorId in CKEDITOR.instances) {
           let subID = editorId.substring(7);
           var editor = CKEDITOR.instances[editorId];
           if (editor) {
               editor.on('change', function(evt) {
                   var nnn = evt.editor.getData();
                   root.setContent(subID,nnn);
                   root.seoRankMathGroup();
               }, this);
           }
       }
   },100);
   setTimeout(function (){
       root.seoRankMathGroup();
   },200);
},
setContent(key,value){
   this.content[key] = value;
},
getContent(key){
   return this.content[key];
},
async seoRankMathGroup(){
   let point = 0;
   let root = this;
   let seoPanel = $(`#seo-general-`+this.lang);
   let regex = new RegExp(root.keyword[root.lang].value, "i");
   if(this.keyword[this.lang].value.length !== 0) {
       if(root.title[root.lang].value.search(regex) !== -1) {
           point++;
           root.seoRankMathChangeStatus(`keywordInTitle`, `success`);
       }else root.seoRankMathChangeStatus(`keywordInTitle`, `error`);
       let beginTitle = root.title[root.lang].value.search(regex);
       if(beginTitle === 0) {
           point++;
           root.seoRankMathChangeStatus(`titleStartWithKeyword`, `success`);
       }else if(beginTitle == -1) {
           root.seoRankMathChangeStatus(`titleStartWithKeyword`, `error`);
       }else {
           let endTitle = beginTitle + root.keyword[root.lang].value.length;
           if(endTitle === root.title[root.lang].value.length) {
               root.seoRankMathChangeStatus(`titleStartWithKeyword`, `error`);
           }else {
               point++;
               root.seoRankMathChangeStatus(`titleStartWithKeyword`, `success`);
           }
       }
   }
   let titleLength = root.title[root.lang].value.length;
   if(titleLength >= 10 && titleLength <= 70) {
       point++;
       root.seoRankMathChangeStatus('lengthTitle', 'success');
   }
   else {
       if(titleLength > 70) mess = 'Tiêu đề có '+ titleLength +' ký tự. Hãy xem xét rút ngắn nó.';
       if(titleLength < 10) mess = 'Tiêu đề '+ titleLength +' ký tự (ngắn). Cố gắng có được 70 ký tự'; seoPanel.find('li[key="lengthTitle"]').removeClass('test-success').addClass('test-fail'); seoPanel.find('li[key="lengthTitle"]').find('span.txt').html(mess); seoPanel.find('li[key="lengthTitle"]').find('span.icon').html(this.icon.error);
   }
   if(root.keyword[root.lang].value.length !== 0) {
       if (root.description[root.lang].value.search(regex) !== -1) {
           point++;
           root.seoRankMathChangeStatus('keywordInMetaDescription', 'success');
       }else root.seoRankMathChangeStatus('keywordInMetaDescription', 'error');
   }
   let descriptionLength = root.description[root.lang].value.length;
   if(descriptionLength >= 160 && descriptionLength <= 300) {
       point++;
       root.seoRankMathChangeStatus('lengthMetaDescription', 'success');
   }
   else {
       if(descriptionLength > 300) mess = 'Mô tả meta SEO có '+ descriptionLength +' ký tự. Hãy xem xét rút ngắn nó.';
       if(descriptionLength < 160) mess = 'Mô tả meta SEO có '+ descriptionLength +' ký tự (ngắn). Cố gắng thành 160 ký tự';
       seoPanel.find('li[key="lengthMetaDescription"]').removeClass('test-success').addClass('test-fail');
       seoPanel.find('li[key="lengthMetaDescription"]').find('span.txt').html(mess);
       seoPanel.find('li[key="lengthMetaDescription"]').find('span.icon').html(root.icon.error);
   }
   if(root.keyword[root.lang].value.length !== 0) {
       if (root.slug[root.lang].search(root.ChangeToSlug(root.keyword[root.lang].value)) !== -1) {
           point++;
           root.seoRankMathChangeStatus('keywordInPermalink', 'success');
       }
   }
   let object = seoPanel.find('li[key="lengthPermalink"]');
   let slugLength = root.slug[root.lang].length + root.domain.length - 8;
   if(slugLength > 75 || slugLength < 35) {
       if(slugLength > 75) mess = 'Url có '+ slugLength +' ký tự (dài). Hãy xem xét rút ngắn nó.';
       if(slugLength < 35) mess = 'Url có '+ slugLength +' ký tự (ngắn).';
       object.removeClass('test-success').addClass('test-fail');
       object.find('span.txt').html(mess);
       object.find('span.icon').html(root.icon.error);
   }
   else {
       point++;
       mess = 'Url có '+ slugLength +' ký tự. Tuyệt vời!';
       object.removeClass('test-fail').addClass('test-success');
       object.find('span.txt').html(mess);
       object.find('span.icon').html(root.icon.success);
   }
   let contentRemoveHtml = await root.stripHtml(root.content[root.lang]).toLowerCase();
   if(root.keyword[root.lang].value.length !== 0) {
       let regex = new RegExp(root.keyword[root.lang].value, "i");
       let searchKey = contentRemoveHtml.search(regex);
       if (searchKey !== -1) {
           point++;
           root.seoRankMathChangeStatus('keywordInContent', 'success');
           let firstKeyword = contentRemoveHtml.substr(0,root.keyword[root.lang].value.length).toLowerCase();
           if (root.keyword[root.lang].value.toLowerCase() === firstKeyword) {
               point++;
               root.seoRankMathChangeStatus('keywordIn10Percent', 'success');
           }
       }
   }
   let contentWord = contentRemoveHtml.split(/[\s.,;]+/).length;
   if(contentWord >= 600 && contentWord <= 2500) {
       point++;
       root.seoRankMathChangeStatus('lengthContent', 'success');
   }
   else root.seoRankMathChangeStatus('lengthContent', 'error');
   let tmp = document.createElement('div');
   tmp.innerHTML = root.content[root.lang];
   let internalLinks = tmp.getElementsByTagName("a");
   if (internalLinks.length === 0) root.seoRankMathChangeStatus('linksHasInternal', 'error');
   else {
       let linksHasInternal = false;
       $.each(internalLinks, function (index, value) {
           if (internalLinks[index].href.toLowerCase().search(root.domain) !== -1) {
               point++;
               root.seoRankMathChangeStatus('linksHasInternal', 'success');
               linksHasInternal = true;
               return true;
           }
       });
       if (linksHasInternal === false) root.seoRankMathChangeStatus('linksHasInternal', 'error');
   }
   if (root.keyword[root.lang].value.length !== 0) {
       let regex = new RegExp(root.keyword[root.lang].value, "i");
       let keywordInSubheadings = false;
       let headingH2 = tmp.getElementsByTagName('h2');
       if (headingH2.length !== 0) {
           $.each(headingH2, function (index, value) {

               if (headingH2[index].innerText.toLowerCase().search(regex) !== -1) {
                   point++;
                   root.seoRankMathChangeStatus('keywordInSubheadings', 'success');
                   keywordInSubheadings = true;
                   return true;
               }
           });
       }
       let headingH3 = tmp.getElementsByTagName('h3');
       if (keywordInSubheadings === false && headingH3.length !== 0) {
           $.each(headingH3, function (index, value) {
               if (headingH3[index].innerText.toLowerCase().search(regex) !== -1) {
                   point++;
                   root.seoRankMathChangeStatus('keywordInSubheadings', 'success');
                   keywordInSubheadings = true;
                   return true;
               }
           });
       }
       let headingH4 = tmp.getElementsByTagName('h4');
       if (keywordInSubheadings === false && headingH4.length !== 0) {
           $.each(headingH4, function (index, value) {
               if (headingH4[index].innerText.toLowerCase().search(regex) !== -1) {
                   point++;
                   root.seoRankMathChangeStatus('keywordInSubheadings', 'success');
                   keywordInSubheadings = true;
                   return true;
               }
           });
       }
       let headingH5 = tmp.getElementsByTagName('h5');
       if (keywordInSubheadings === false && headingH5.length !== 0) {
           $.each(headingH5, function (index, value) {
               if (headingH5[index].innerText.toLowerCase().search(regex) !== -1) {
                   point++;
                   root.seoRankMathChangeStatus('keywordInSubheadings', 'success');
                   keywordInSubheadings = true;
                   return true;
               }
           });
       }
       let headingH6 = tmp.getElementsByTagName('h5');
       if (keywordInSubheadings === false && headingH6.length !== 0) {
           $.each(headingH6, function (index, value) {
               if (headingH6[index].innerText.toLowerCase().search(regex) !== -1) {
                   point++;
                   root.seoRankMathChangeStatus('keywordInSubheadings', 'success');
                   keywordInSubheadings = true;
                   return true;
               }
           });
       }
       if(keywordInSubheadings === false) root.seoRankMathChangeStatus('keywordInSubheadings', 'error');
   }
   let img = tmp.getElementsByTagName('img');
   if (img.length === 0) {
       root.seoRankMathChangeStatus('keywordInImageAlt', 'error');
       root.seoRankMathChangeStatus('contentHasAssets', 'error');
   } else {
       if(root.keyword[root.lang].value.length !== 0) {
           let keywordInImageAlt = false;
           if (img.length >= 2) {
               point++;
               root.seoRankMathChangeStatus('contentHasAssets', 'success');
           } else root.seoRankMathChangeStatus('contentHasAssets', 'error');
           $.each(img, function (index, value) {
               let regex = new RegExp(root.keyword[root.lang].value, "i");
               if (img[index].alt.toLowerCase().search(regex) !== -1) {
                   point++;
                   root.seoRankMathChangeStatus('keywordInImageAlt', 'success');
                   keywordInImageAlt = true;
                   return true;
               }
           });
           if (keywordInImageAlt === false) root.seoRankMathChangeStatus('keywordInImageAlt', 'error');
       }
   }
   if (root.keyword[root.lang].value.length !== 0) {
       object = seoPanel.find('li[key="keywordDensity"]');
       let mess;
       let contentRemoveHtml = await root.stripHtml(root.content[root.lang]).toLowerCase();
       let contentWord = contentRemoveHtml.split(/[\s.,;]+/).length;
       let nkr = root.occurrences(contentRemoveHtml, root.keyword[root.lang].value.toLowerCase());
       let keywordDensity = (nkr / contentWord) * 100;
       keywordDensity = keywordDensity.toFixed(2);
       if(keywordDensity > 2.5 || keywordDensity < 0.75) {
           if(keywordDensity > 2.5) mess = 'Mật độ từ khóa là '+ keywordDensity +' (cao). Số lần từ khóa xuất hiện là ' +nkr+'.';
           if(keywordDensity < 0.75) mess = 'Mật độ từ khóa là '+ keywordDensity +' (thấp). Số lần từ khóa xuất hiện là ' +nkr+'.';
           object.removeClass('test-success').addClass('test-fail');
           object.find('span.txt').html(mess);
           object.find('span.icon').html(root.icon.error);
       }
       else {
           point++;
           mess = 'Mật độ từ khóa là '+ keywordDensity +'. Số lần từ khóa xuất hiện là ' +nkr+'.';
           object.removeClass('test-fail').addClass('test-success');
           object.find('span.txt').html(mess);
           object.find('span.icon').html(root.icon.success);
       }
   }
   let tagP = tmp.getElementsByTagName('p');
   if (tagP.length >= 2) {
       point++;
       root.seoRankMathChangeStatus('contentHasShortParagraphs', 'success');
   } else root.seoRankMathChangeStatus('contentHasShortParagraphs', 'error');
   if(root.keyword[root.lang].value.length === 0) {
       root.seoRankMathChangeStatus('keywordNotUsed', 'error');
       root.seoRankMathChangeStatus('keywordInTitle', 'error');
       root.seoRankMathChangeStatus('titleStartWithKeyword', 'error');
       root.seoRankMathChangeStatus('keywordInMetaDescription', 'error');
       root.seoRankMathChangeStatus('keywordInPermalink', 'error');
       root.seoRankMathChangeStatus('keywordInContent', 'error');
       root.seoRankMathChangeStatus('keywordIn10Percent', 'error');
       root.seoRankMathChangeStatus('keywordInImageAlt', 'error');
       root.seoRankMathChangeStatus('keywordDensity', 'error');
       root.seoRankMathChangeStatus('keywordInSubheadings', 'error');
   }
   else {
       point++;
       root.seoRankMathChangeStatus('keywordNotUsed', 'success');
   }
   point = ((point>17?17:point)/17)*100;
   $('#seo_point_'+root.lang).html(Math.ceil(point));
},
seoRankMathChangeStatus(key, status){
   let object = $(`#seo-general-`+this.lang).find('li[key="'+key+'"]');
   if(status === 'success') {
       object.removeClass('test-fail').addClass('test-success');
       object.find('span.txt').html(this.messageSuccess[key]);
       object.find('span.icon').html(this.icon.success);
   } else {
       object.removeClass('test-success').addClass('test-fail');
       object.find('span.txt').html(this.messageError[key]);
       object.find('span.icon').html(this.icon.error);
   }
},
stripHtml(html) {
   let tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   return tmp.textContent || tmp.innerText || "";
},
ChangeToSlug(title) {
   let slug = title.toLowerCase();
   slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
   slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
   slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
   slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
   slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
   slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
   slug = slug.replace(/đ/gi, 'd');
   slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
   slug = slug.replace(/ /gi, "-");
   slug = slug.replace(/\-\-\-\-\-/gi, '-');
   slug = slug.replace(/\-\-\-\-/gi, '-');
   slug = slug.replace(/\-\-\-/gi, '-');
   slug = slug.replace(/\-\-/gi, '-');
   slug = '@' + slug + '@';
   slug = slug.replace(/\@\-|\-\@|\@/gi, '');
   return slug;
},
occurrences(string, subString, allowOverlapping) {
   string += "";
   subString += "";
   if (subString.length <= 0) return (string.length + 1);
   var n = 0,
   pos = 0,
   step = allowOverlapping ? 1 : subString.length;
   while (true) {
       pos = string.indexOf(subString, pos);
       if (pos >= 0) {
           ++n;
           pos += step;
       } else break;
   }
   return n;
}
}
}
</script>
