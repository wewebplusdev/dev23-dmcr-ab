<?php
/* Smarty version 3.1.30, created on 2023-07-18 15:29:20
  from "/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/template/default/captcha.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64b64d6026ab58_47291007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f373d817a3c106cb06e1b6856a6aa2a8a320af54' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/template/default/captcha.tpl',
      1 => 1688976162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64b64d6026ab58_47291007 (Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="captcha-img">
    <img src="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/captcha" class="cover-bg" width="200" height="40" alt="captcha">
  </div>
  <div class="captcha-btn captchaFunc">
    <a href="javascript:void(0);" class=""></a>
  </div>
<?php }
}
