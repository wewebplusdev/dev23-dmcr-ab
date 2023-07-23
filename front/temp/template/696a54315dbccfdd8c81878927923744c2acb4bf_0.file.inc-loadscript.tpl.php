<?php
/* Smarty version 3.1.30, created on 2023-07-24 00:35:49
  from "C:\xampp\htdocs\dev23-dmcr-ab\front\template\default\inc-loadscript.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64bd64f5122c89_62502341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '696a54315dbccfdd8c81878927923744c2acb4bf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-dmcr-ab\\front\\template\\default\\inc-loadscript.tpl',
      1 => 1690133316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64bd64f5122c89_62502341 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Core -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/jquery-2.2.4.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/jquery.easing.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/jquery.lazyload.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/modernizr.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/sweetalert.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/validator.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/swiper-bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/chart.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/select2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/aos.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/lazyload.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/libs/fancybox.umd.js"><?php echo '</script'; ?>
>

<!-- Custom -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/main.js<?php echo $_smarty_tpl->tpl_vars['modify']->value;?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://code.highcharts.com/highcharts.js"><?php echo '</script'; ?>
>
<?php ob_start();
echo (($tmp = @$_smarty_tpl->tpl_vars['assignjs']->value)===null||$tmp==='' ? null : $tmp);
$_prefixVariable2=ob_get_clean();
if ($_prefixVariable2) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['assignjs']->value, 'addAssetScript');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['addAssetScript']->value) {
echo $_smarty_tpl->tpl_vars['addAssetScript']->value;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
}
