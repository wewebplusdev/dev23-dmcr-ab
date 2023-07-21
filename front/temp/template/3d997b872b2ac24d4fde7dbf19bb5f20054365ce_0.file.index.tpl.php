<?php
/* Smarty version 3.1.30, created on 2023-07-21 18:59:14
  from "/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/controller/script/about/template/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64ba73120ad965_99191062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d997b872b2ac24d4fde7dbf19bb5f20054365ce' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/controller/script/about/template/index.tpl',
      1 => 1689940751,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:front/template/default/inc-herobanner.tpl' => 1,
  ),
),false)) {
function content_64ba73120ad965_99191062 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:front/template/default/inc-herobanner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, false);
?>


<div class="default-page about-page" style="position:relative;z-index:1;overflow:hidden">
    <div class="default-head">
        <div class="container-lg">
            <div class="breadcrumb-block">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item breadcrumb-home"><a href="/">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">เกี่ยวกับเรา</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="default-body">
        <div class="container-lg">
            <div class="body-content">
                <div class="whead page-title">
                    <h2 class="title">เกี่ยวกับเรา</h2>
                </div>
                <div class="about-list">
                    <div class="row">
                        <div class="item theme-purple active col-sm-4">
                            <div class="thumbnail">
                                <div class="hexagon-wrapper">
                                    <div class="hexagon-inner">
                                        <div class="icon-wrapper hexagon">
                                            <div class="icon">
                                                <img alt="ปะการังเทียม"
                                                    src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/artificial-coral.svg" class="lazy">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hexagon-outer"></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="action">
                                    <a class="btn btn-purple fluid" href="/about#">วัตถุประสงค์โครงการ
                                        <!-- -->ปะการังเทียม
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item theme-orange  col-sm-4">
                            <div class="thumbnail">
                                <div class="hexagon-wrapper">
                                    <div class="hexagon-inner">
                                        <div class="icon-wrapper hexagon">
                                            <div class="icon">
                                                <img alt="ทุ่นในทะเล"
                                                    src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/buoy.d3df3036.svg" class="lazy">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hexagon-outer"></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="action">
                                    <a class="btn btn-orange fluid" href="/about#">วัตถุประสงค์โครงการ
                                        <!-- -->ทุ่นในทะเล
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item theme-blue  col-sm-4">
                            <div class="thumbnail">
                                <div class="hexagon-wrapper">
                                    <div class="hexagon-inner">
                                        <div class="icon-wrapper hexagon">
                                            <div class="icon">
                                                <img alt="จุดวางเรือ"
                                                    src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/boat.4708dd8b.svg" class="lazy">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hexagon-outer"></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="action">
                                    <a class="btn btn-blue fluid" href="/about#">วัตถุประสงค์โครงการ
                                        <!-- -->จุดวางเรือ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="editor-content">
                    <p>This is Editor Content</p>
                    <p>Commodo adipisicing anim non minim fugiat amet laborum minim aute. Anim irure quis Lorem fugiat
                        veniam deserunt anim nostrud irure Lorem ipsum duis fugiat do. Officia ea deserunt dolor ad
                        mollit aliqua cillum do velit. Anim minim dolore ut occaecat magna cupidatat amet incididunt
                        consectetur laboris.</p>
                </div>
                <div class="gallery-list">
                    <div class="whead">
                        <div class="subtitle">รูปประกอบ</div>
                    </div>
                    <div>
                        <div class="swiper gallery-swiper default-swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/60/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image1"
                                                src="https://lipsum.app/id/60/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide swiper-slide-next">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/61/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image2"
                                                src="https://lipsum.app/id/61/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/62/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image3"
                                                src="https://lipsum.app/id/62/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/63/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image4"
                                                src="https://lipsum.app/id/63/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/64/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image5"
                                                src="https://lipsum.app/id/64/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/65/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image6"
                                                src="https://lipsum.app/id/65/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a data-fancybox="gallery" href="https://lipsum.app/id/66/1600x1200">
                                        <div class="ratio thumbnail ratio-1x1">
                                            <img alt="Description of image is here image7"
                                                src="https://lipsum.app/id/66/1600x1200" class="rounded lazy">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="video-player">
                    <div class="ratio ratio-16x9">
                        <video src="/video/istockphoto-1305339327-640_adpp_is.mp4">
                        </video>
                    </div>
                    <div class="video-control">
                        <button class="btn btn-play">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="play"
                                class="svg-inline--fa fa-play fa-6x " role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512">
                                <path fill="currentColor"
                                    d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="attachment-list">
                    <div class="whead">
                        <div class="subtitle">เอกสารแนบ</div>
                    </div>
                    <div class="swiper attach-swiper default-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a title="โครงการจุดวางเรือ" class="link attach-item" target="_blank"
                                    href="https://lipsum.app/id/60/1600x1200">
                                    <div class="default-card card">
                                        <div class="card-body">
                                            <div class="theme-blue">
                                                <div class="align-items-xxl-center gutters-15 row">
                                                    <div class="col-sm-auto">
                                                        <div class="hexagon-wrapper">
                                                            <div class="hexagon-inner">
                                                                <div class="icon-wrapper hexagon">
                                                                    <div class="icon">
                                                                        <img alt=""
                                                                            src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-attachment.8ed09766.svg"
                                                                            class="lazy">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="hexagon-outer"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="inner">
                                                            <div class="title text-limit"><span
                                                                    class="text-primary fw-bold">โครงการจุดวางเรือ.pdf
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
                                                                    จำนวนดาวน์โหลด : <span
                                                                        class="text-primary">65</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-auto">
                                                        <div class="action">
                                                            <button type="button"
                                                                class="btn btn-outline-primary">ดาวน์โหลด</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="action -back-2-prevoius" style="border-top:1px solid #fff">
                    <div class="justify-content-end row">
                        <div class="col-auto">
                            <button type="button" class="btn btn-gray-light">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left"
                                    class="svg-inline--fa fa-chevron-left fa-sm fa-icon" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path fill="currentColor"
                                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z">
                                    </path>
                                </svg>
                                กลับ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="graphic graphic-inner-page-bottom">
                <div class="bg" style="z-index:0">
                    <img alt="" src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/background/bg-inner-page-bottom.de22dd25.png" class="lazy">
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
