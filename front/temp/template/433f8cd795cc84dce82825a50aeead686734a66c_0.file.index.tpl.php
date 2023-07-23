<?php
/* Smarty version 3.1.30, created on 2023-07-24 01:16:22
  from "C:\xampp\htdocs\dev23-dmcr-ab\front\controller\script\about\template\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64bd6e7648ce00_92913636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '433f8cd795cc84dce82825a50aeead686734a66c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-dmcr-ab\\front\\controller\\script\\about\\template\\index.tpl',
      1 => 1690136178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:front/template/default/inc-herobanner.tpl' => 1,
  ),
),false)) {
function content_64bd6e7648ce00_92913636 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:front/template/default/inc-herobanner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, false);
?>


<div class="default-page about-page" style="position:relative;z-index:1;overflow:hidden">
    <div class="default-head" data-aos="fade-up">
        <div class="container-lg">
            <div class="breadcrumb-block">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item breadcrumb-home"><a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/home">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">เกี่ยวกับเรา</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="default-body">
        <div class="container-lg">
            <div class="body-content">
                <div class="whead page-title" data-aos="fade-left">
                    <h2 class="title">เกี่ยวกับเรา</h2>
                </div>
                <div class="about-list">
                    <div class="row">
                        <div class="item theme-purple active col-sm-4" data-aos="fade-up">
                            <div class="thumbnail">
                                <div class="hexagon-wrapper">
                                    <div class="hexagon-inner">
                                        <div class="icon-wrapper hexagon">
                                            <div class="icon">
                                                <img alt="ปะการังเทียม" data-src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/artificial-coral.svg" class="lazy">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hexagon-outer"></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="action">
                                    <a class="btn btn-purple fluid" href="/about#">วัตถุประสงค์โครงการปะการังเทียม</a>
                                </div>
                            </div>
                        </div>
                        <div class="item theme-orange col-sm-4" data-aos="fade-up">
                            <div class="thumbnail">
                                <div class="hexagon-wrapper">
                                    <div class="hexagon-inner">
                                        <div class="icon-wrapper hexagon">
                                            <div class="icon">
                                                <img alt="ทุ่นในทะเล" data-src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/buoy.svg" class="lazy">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hexagon-outer"></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="action">
                                    <a class="btn btn-orange fluid" href="/about#">วัตถุประสงค์โครงการทุ่นในทะเล</a>
                                </div>
                            </div>
                        </div>
                        <div class="item theme-blue col-sm-4" data-aos="fade-up">
                            <div class="thumbnail">
                                <div class="hexagon-wrapper">
                                    <div class="hexagon-inner">
                                        <div class="icon-wrapper hexagon">
                                            <div class="icon">
                                                <img alt="จุดวางเรือ" data-src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/boat.svg" class="lazy">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hexagon-outer"></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="action">
                                    <a class="btn btn-blue fluid" href="/about#">วัตถุประสงค์โครงการจุดวางเรือ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="editor-content" data-aos="fade-up">
                    <p>This is Editor Content</p>
                    <p>Commodo adipisicing anim non minim fugiat amet laborum minim aute. Anim irure quis Lorem fugiat
                        veniam deserunt anim nostrud irure Lorem ipsum duis fugiat do. Officia ea deserunt dolor ad
                        mollit aliqua cillum do velit. Anim minim dolore ut occaecat magna cupidatat amet incididunt
                        consectetur laboris.</p>
                </div>
                <div class="gallery-list" data-aos="fade-up" id="trigger-video-player">
                    <div class="whead" data-aos="fade-left">
                        <div class="subtitle">รูปประกอบ</div>
                    </div>
                    <div>
                        <div class="swiper gallery-swiper default-swiper" data-aos="fade-up">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/60/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image1" src="https://lipsum.app/id/60/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide swiper-slide-next">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/61/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image2" src="https://lipsum.app/id/61/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/62/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image3" src="https://lipsum.app/id/62/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/63/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image4" src="https://lipsum.app/id/63/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/64/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image5" src="https://lipsum.app/id/64/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/65/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image6" src="https://lipsum.app/id/65/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/66/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image7" src="https://lipsum.app/id/66/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="video-player" data-aos="fade-up" data-aos-anchor="#trigger-video-player" data-aos-anchor-placement="top-top" id="trigger-attach">
                    <div class="ratio ratio-16x9">
                        <video>
                            <source src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/video/istockphoto-1305339327-640_adpp_is.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="video-control">
                        <button class="btn btn-play">
                            <span class="fa-solid fa-play fa-6x"></span>
                        </button>
                    </div>
                </div>
                <div class="attachment-list" data-aos="fade-up" data-aos-anchor="#trigger-attach" data-aos-anchor-placement="top-bottom" id="trigger-action">
                    <div class="whead">
                        <div class="subtitle">เอกสารแนบ</div>
                    </div>
                    <div class="swiper attach-swiper default-swiper">
                        <div class="swiper-wrapper">
                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                <div class="swiper-slide">
                                    <a title="โครงการจุดวางเรือ" class="link attach-item" target="_blank" href="https://lipsum.app/id/60/1600x1200">
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
                                                                <div class="title text-limit"><span class="text-primary fw-bold">โครงการจุดวางเรือ.pdf
                                                                    </span>
                                                                </div>
                                                                <div class="desc hstack gap-3">
                                                                    <div class="type">
                                                                        ประเภทไฟล์ : <span class="text-primary">.pdf</span>
                                                                    </div>
                                                                    <div class="type">
                                                                        ขนาด : <span class="text-primary">0.06 mb</span>
                                                                    </div>
                                                                    <div class="download">
                                                                        จำนวนดาวน์โหลด : <span class="text-primary">65</span>
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
                            <?php }
}
?>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="action -back-2-prevoius" style="border-top:1px solid #fff">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <button type="button" class="btn btn-gray-light">
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
