<?php
/* Smarty version 3.1.30, created on 2024-06-05 17:31:02
  from "C:\xampp\htdocs\dev23-dmcr-ab\front\controller\script\follow\template\detail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66603e66331b53_24065570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e396b6e5906e23ca53ab69f21a34751c9655976' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-dmcr-ab\\front\\controller\\script\\follow\\template\\detail.tpl',
      1 => 1717553665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:front/template/default/inc-herobanner.tpl' => 1,
  ),
),false)) {
function content_66603e66331b53_24065570 (Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender("file:front/template/default/inc-herobanner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, false);
?>


<div class="default-page news-page" style="position:relative;z-index:1;overflow:hidden">
   <div class="default-head" data-aos="fade-up">
      <div class="container-lg">
         <div class="breadcrumb-block">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item breadcrumb-home"><a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/home">หน้าหลัก</a></li>
                     <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/follow" role="button" tabindex="0">การติดตามการใช้ประโยชน์</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?php echo $_smarty_tpl->tpl_vars['followDetail']->value['subject'];?>
</li>
                  </ol>
               </nav>
         </div>
      </div>
   </div>
   <div class="default-body">
      <div class="container-lg">
         <div class="body-content">
            <div class="detail-head" data-aos="fade-up">
               <div class="row">
                  <div class="col">
                        <div class="whead mb-0">
                           <h2 class="title"><?php echo $_smarty_tpl->tpl_vars['followDetail']->value['subject'];?>
</h2>
                        </div>
                  </div>
                  <div class="col-md-auto">
                        <div class="hstack gap-4">
                           <div class="province">จังหวัด <span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['province']->value;?>
</span></div>
                           <div class="year">ปี <span class="text-primary"><?php ob_start();
echo $_smarty_tpl->tpl_vars['langon']->value;
$_prefixVariable1=ob_get_clean();
echo DateYearThai($_smarty_tpl->tpl_vars['followDetail']->value['year'],$_prefixVariable1);?>
 </span></div>
                        </div>
                  </div>
               </div>
               <div class="row align-items-center justify-content-between">
                  <div class="col-sm-auto">
                        <div class="hstack gap-4">
                           <div class="date" style="display: flex; align-items: center; gap: 0.5rem;">
                              <div class="icon">
                                    <img alt="facebook icon" src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-calendar.svg" class="lazy" style="color: transparent;" width="20" height="20">
                              </div>
                              <?php ob_start();
echo $_smarty_tpl->tpl_vars['langon']->value;
$_prefixVariable2=ob_get_clean();
echo DateThai($_smarty_tpl->tpl_vars['followDetail']->value['credate'],'13',$_prefixVariable2,'shot');?>

                           </div>
                           <div class="view" style="display: flex; align-items: center; gap: 0.5rem;">
                              <div class="icon">
                                    <img alt="facebook icon" src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-eye.svg" class="lazy" style="color: transparent;" width="20" height="20">
                              </div>
                              <?php echo $_smarty_tpl->tpl_vars['followDetail']->value['view'];?>
 ครั้ง
                           </div>
                        </div>
                  </div>
                  <div class="col-sm-auto">
                        <div class="share-block">
                           <div class="hstack gap-2">
                              <a class="link print" title="Print" href="/activity/detail">
                                    <div class="icon rounded-circle">
                                       <img alt="print icon" src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-fax-primary.svg" class="lazy" style="color: transparent;" width="20" height="20">
                                    </div>
                              </a>
                              <a class="link fb" title="Facebook" target="_blank" href="https://www.facebook.com/DMCRTH">
                                    <div class="icon rounded-circle">
                                       <img alt="facebook icon" src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icons-facebook.svg" class="lazy" style="color: transparent;" width="20" height="20">
                                    </div>
                              </a>
                              <a class="link tw" title="Twitter" target="_blank" href="https://twitter.com/dmcrth">
                                    <div class="icon rounded-circle">
                                       <img alt="twitter icon" src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icons-twitter.svg" class="lazy" style="color: transparent;" width="20" height="20">
                                    </div>
                              </a>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['followDetail']->value['htmlfilename'] != '') {?>
               <div class="editor-content" data-aos="fade-up">
                  <?php echo callHtml(fileinclude($_smarty_tpl->tpl_vars['followDetail']->value['htmlfilename'],"html",$_smarty_tpl->tpl_vars['followDetail']->value['masterkey']));?>

               </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['callalbum']->value->_numOfRows > 0) {?>
            <div class="gallery-list" data-aos="fade-up" id="trigger-video-player">
               <div class="whead" data-aos="fade-left">
                  <div class="subtitle">รูปประกอบ</div>
               </div>
               <div class="swiper gallery-swiper default-swiper" data-aos="fade-up">
                  <div class="swiper-wrapper">
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callalbum']->value, 'valuecallalbum', false, 'keycallalbum');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keycallalbum']->value => $_smarty_tpl->tpl_vars['valuecallalbum']->value) {
?>
                     <div class="swiper-slide">
                        <a data-fancybox="gallery" href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['followDetail']->value['masterkey'];
$_prefixVariable3=ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valuecallalbum']->value['filename'],"album",$_prefixVariable3,"link");?>
">
                           <div class="ratio thumbnail ratio-1x1">
                              <img alt="<?php echo $_smarty_tpl->tpl_vars['valuecallalbum']->value['subject'];?>
" data-src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['followDetail']->value['masterkey'];
$_prefixVariable4=ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valuecallalbum']->value['filename'],"album",$_prefixVariable4,"link");?>
" class="rounded lazy">
                           </div>
                        </a>
                     </div>
                     <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                  </div>
                  <div class="swiper-pagination"></div>
               </div>
            </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['followDetail']->value['url'] != '' && $_smarty_tpl->tpl_vars['followDetail']->value['url'] != '#' && $_smarty_tpl->tpl_vars['followDetail']->value['type'] == 'url') {?>
                  <?php $_smarty_tpl->_assignInScope('myUrlArray', explode("v=",$_smarty_tpl->tpl_vars['followDetail']->value['url']));
?>
                  <?php $_smarty_tpl->_assignInScope('myUrlCut', $_smarty_tpl->tpl_vars['myUrlArray']->value[1]);
?>
                  <?php $_smarty_tpl->_assignInScope('myUrlCutArray', explode("&",$_smarty_tpl->tpl_vars['myUrlCut']->value));
?>
                  <?php $_smarty_tpl->_assignInScope('myUrlCutAnd', $_smarty_tpl->tpl_vars['myUrlCutArray']->value[0]);
?>
                  <div class="video-player" data-aos="fade-up" data-aos-anchor="#trigger-video-player" data-aos-anchor-placement="top-top" id="trigger-attach">
                     <div class="row justify-content-center my-xl-5">
                        <div class="col-xl-10">
                            <div class="ratio ratio-16x9">
                                <iframe class="lazy" src="https://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['myUrlCutAnd']->value;?>
" title="YouTube video" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                  </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['followDetail']->value['type'] == 'file' && $_smarty_tpl->tpl_vars['followDetail']->value['filevdo'] != '') {?>
            <div class="video-player" data-aos="fade-up" data-aos-anchor="#trigger-video-player" data-aos-anchor-placement="top-top" id="trigger-attach">
               <div class="ratio ratio-16x9">
                  <video class="lazy" data-src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['followDetail']->value['masterkey'];
$_prefixVariable5=ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['followDetail']->value['filevdo'],"vdo",$_prefixVariable5,"link");?>
">
                     <source data-src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['followDetail']->value['masterkey'];
$_prefixVariable6=ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['followDetail']->value['filevdo'],"vdo",$_prefixVariable6,"link");?>
" type="video/mp4">
                     Your browser does not support the video tag.
                  </video>
               </div>
               <div class="video-control">
                  <button class="btn btn-play">
                        <span class="fa-solid fa-play fa-6x"></span>
                  </button>
               </div>
            </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['callfile']->value->_numOfRows > 0) {?>
            <div class="attachment-list" data-aos="fade-up" data-aos-anchor="#trigger-attach" data-aos-anchor-placement="top-bottom" id="trigger-action">
               <div class="whead">
                  <div class="subtitle">เอกสารแนบ</div>
               </div>
               <div class="swiper attach-swiper default-swiper">
                  <div class="swiper-wrapper">
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callfile']->value, 'valuecallfile', false, 'keycallfile');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keycallfile']->value => $_smarty_tpl->tpl_vars['valuecallfile']->value) {
?>
                     <?php $_smarty_tpl->_assignInScope('fileinfo', get_Icon(fileinclude($_smarty_tpl->tpl_vars['valuecallfile']->value[2],"file",$_smarty_tpl->tpl_vars['valuecallfile']->value[1])));
?>
                     <div class="swiper-slide">
                        <a title="<?php echo $_smarty_tpl->tpl_vars['valuecallfile']->value[3];
echo $_smarty_tpl->tpl_vars['fileinfo']->value['type'];?>
" class="link attach-item" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/downloadFile/<?php echo fileinclude($_smarty_tpl->tpl_vars['valuecallfile']->value[2],"file",$_smarty_tpl->tpl_vars['followDetail']->value['masterkey'],"download");?>
&n=<?php echo $_smarty_tpl->tpl_vars['valuecallfile']->value[3];?>
&id=<?php echo encodeStr($_smarty_tpl->tpl_vars['valuecallfile']->value[0]);?>
">
                           <div class="default-card card">
                              <div class="card-body">
                                 <div class="theme-blue">
                                    <div class="align-items-xxl-center gutters-15 row">
                                       <div class="col-sm-auto">
                                          <div class="hexagon-wrapper">
                                             <div class="hexagon-inner">
                                                <div class="icon-wrapper hexagon">
                                                   <div class="icon">
                                                      <img alt="" data-src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-attachment.svg" class="lazy" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="hexagon-outer"></div>
                                          </div>
                                       </div>
                                       <div class="col">
                                          <div class="inner">
                                             <div class="title text-limit">
                                                <span class="text-primary fw-bold"><?php echo $_smarty_tpl->tpl_vars['valuecallfile']->value[3];
echo $_smarty_tpl->tpl_vars['fileinfo']->value['type'];?>
</span>
                                             </div>
                                             <div class="desc hstack gap-3">
                                                <div class="type">
                                                   ประเภทไฟล์ : <span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['fileinfo']->value['type'];?>
</span>
                                                </div>
                                                <div class="type">
                                                   ขนาด : <span class="text-primary"><?php ob_start();
echo $_smarty_tpl->tpl_vars['followDetail']->value['masterkey'];
$_prefixVariable7=ob_get_clean();
echo get_IconSize(fileinclude($_smarty_tpl->tpl_vars['valuecallfile']->value[2],'file',$_prefixVariable7));?>
</span>
                                                </div>
                                                <div class="download">
                                                   จำนวนดาวน์โหลด : <span class="text-primary"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['valuecallfile']->value[4])===null||$tmp==='' ? 0 : $tmp);?>
</span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-xxl-auto">
                                          <div class="action">
                                             <button type="button" class="btn btn-outline-primary">ดาวน์โหลด</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </a>
                     </div>
                     <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                  </div>
                  <div class="swiper-pagination"></div>
               </div>
            </div>
            <?php }?> 
            <div class="action -back-2-prevoius" style="border-top:1px solid #fff">
               <div class="row justify-content-end">
                  <div class="col-auto">
                        <button type="button" onclick="javascript:window.history.back();" class="btn btn-gray-light">
                           <span class="fa-solid fa-chevron-left"></span>กลับ
                        </button>
                  </div>
               </div>
            </div>
         </div>
         <div class="graphic graphic-inner-page-bottom">
            <div class="bg" style="z-index:0">
               <img alt="" data-src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/background/bg-inner-page-bottom.png" class="lazy">
            </div>
         </div>
      </div>
   </div>
</div><?php }
}
