<?php
/* Smarty version 3.1.30, created on 2023-07-18 13:36:32
  from "/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/template/default/page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64b632f07c43e4_48709589',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe9213950b39102f35923f66a9f768cff9500d75' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/template/default/page.tpl',
      1 => 1689612713,
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
function content_64b632f07c43e4_48709589 (Smarty_Internal_Template $_smarty_tpl) {
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


        <section class="site-container" style="margin-top: 150px;">
            <?php ob_start();
echo templateInclude($_smarty_tpl->tpl_vars['fileInclude']->value,$_smarty_tpl->tpl_vars['settemplate']->value);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'pageContent'), 0, true);
?>

        </section>

        
    </div>

	<?php $_smarty_tpl->_subTemplateRender("file:inc-loadscript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, false);
?>

</body>
</html><?php }
}
