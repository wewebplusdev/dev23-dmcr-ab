<?php
/* Smarty version 3.1.30, created on 2024-06-05 17:26:46
  from "C:\xampp\htdocs\dev23-dmcr-ab\front\template\default\page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66603d6643c948_74589196',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88a31c0f53573d39a7a04af94da9431fc366ab5a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-dmcr-ab\\front\\template\\default\\page.tpl',
      1 => 1717553665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc-metatag.tpl' => 1,
    'file:inc-style.tpl' => 1,
    'file:inc-loadscript.tpl' => 1,
  ),
),false)) {
function content_66603d6643c948_74589196 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <?php $_smarty_tpl->_subTemplateRender("file:inc-metatag.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:inc-style.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, false);
?>

</head>
<body>
	
    <div class="global-container">

        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['header']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, true);
?>


        <section class="layout-container">
            <?php ob_start();
echo templateInclude($_smarty_tpl->tpl_vars['fileInclude']->value,$_smarty_tpl->tpl_vars['settemplate']->value);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'pageContent'), 0, true);
?>

        </section>

        <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['footer']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, true);
?>

        
    </div>

	<?php $_smarty_tpl->_subTemplateRender("file:inc-loadscript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, false);
?>

</body>
</html><?php }
}
