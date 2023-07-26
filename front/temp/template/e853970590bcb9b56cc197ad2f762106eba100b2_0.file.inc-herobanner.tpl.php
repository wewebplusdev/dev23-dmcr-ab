<?php
/* Smarty version 3.1.30, created on 2023-07-26 15:27:44
  from "/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/template/default/inc-herobanner.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64c0d9007b8093_82645895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e853970590bcb9b56cc197ad2f762106eba100b2' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/template/default/inc-herobanner.tpl',
      1 => 1690360063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64c0d9007b8093_82645895 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="hero-banner" data-aos="fade-up">
    <div class="hero-banner-swiper swiper">
        <div class="swiper-wrapper">
            <?php if ($_smarty_tpl->tpl_vars['callTGP']->value->_numOfRows > 0) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['callTGP']->value, 'valueTGP', false, 'keyTGP');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keyTGP']->value => $_smarty_tpl->tpl_vars['valueTGP']->value) {
?>
            <div class="swiper-slide">
                <figure class="cover">
                    <img
                    alt="<?php echo $_smarty_tpl->tpl_vars['valueTGP']->value[2];?>
" 
                    src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['valueTGP']->value[1];
$_prefixVariable22=ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valueTGP']->value[4],"office",$_prefixVariable22,"link");?>
" 
                    data-src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['valueTGP']->value[1];
$_prefixVariable23=ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valueTGP']->value[4],"pictures",$_prefixVariable23,"link");?>
" class="img-cover lazy">
                </figure>
                <div class="hero-banner-content">
                    <div class="wrapper">
                        <div class="container-lg">
                            <h2 class="title">ฐานข้อมูลปะการังเทียมและทุ่นในทะเล</h2>
                            <p class="desc">กรมทรัพยากรทางทะเลและชายฝั่ง</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php } else { ?>
            <div class="swiper-slide">
                <figure class="cover">
                    <img alt="boats harbour lerici liguria italy"
                        src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/upload/boats-harbour-lerici-liguria-italy-lowQuality.png"
                        data-src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/upload/boats-harbour-lerici-liguria-italy.png" class="lazy">
                </figure>
                <div class="hero-banner-content">
                    <div class="wrapper">
                        <div class="container-lg">
                            <h2 class="title">ฐานข้อมูลปะการังเทียมและทุ่นในทะเล</h2>
                            <p class="desc">กรมทรัพยากรทางทะเลและชายฝั่ง</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <figure class="cover">
                    <img alt="boats harbour lerici liguria italy"
                        src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/upload/boats-harbour-lerici-liguria-italy-lowQuality.png"
                        data-src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/upload/boats-harbour-lerici-liguria-italy.png" class="lazy">
                </figure>
                <div class="hero-banner-content">
                    <div class="wrapper">
                        <div class="container-lg">
                            <h2 class="title">ฐานข้อมูลปะการังเทียมและทุ่นในทะเล</h2>
                            <p class="desc">กรมทรัพยากรทางทะเลและชายฝั่ง</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="custom-shape-divider-bottom-1684911385">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V7.23C0,65.52,268.63,112.77,600,112.77S1200,65.52,1200,7.23V0Z" class="shape-fill"></path>
        </svg>
    </div>
</div><?php }
}
