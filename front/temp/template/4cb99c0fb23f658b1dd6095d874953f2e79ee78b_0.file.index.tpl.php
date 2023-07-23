<?php
/* Smarty version 3.1.30, created on 2023-07-24 01:34:47
  from "C:\xampp\htdocs\dev23-dmcr-ab\front\controller\script\activity\template\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64bd72c738d917_70237607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cb99c0fb23f658b1dd6095d874953f2e79ee78b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-dmcr-ab\\front\\controller\\script\\activity\\template\\index.tpl',
      1 => 1690133315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pagination.tpl' => 1,
  ),
),false)) {
function content_64bd72c738d917_70237607 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ActivityList']->value, 'valueActivityList', false, 'KeyActivityList');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['KeyActivityList']->value => $_smarty_tpl->tpl_vars['valueActivityList']->value) {
?>
<div class="card col-3">
    <img class="card-img-top" src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['valueActivityList']->value[1];
$_prefixVariable1=ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valueActivityList']->value[6],"pictures",$_prefixVariable1,"link");?>
" alt="Card image cap">
    <div class="card-body">
        <p class="card-text"><?php ob_start();
echo $_smarty_tpl->tpl_vars['langon']->value;
$_prefixVariable2=ob_get_clean();
echo DateThai($_smarty_tpl->tpl_vars['valueActivityList']->value['credate'],'13',$_prefixVariable2,'shot');?>
</p>
      <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['valueActivityList']->value['subject'];?>
</h5>
      
      <small class="card-text"><?php echo $_smarty_tpl->tpl_vars['valueActivityList']->value['title'];?>
</small>
      <br>
      <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/activity/detail/<?php echo $_smarty_tpl->tpl_vars['valueActivityList']->value['id'];?>
" class="btn btn-primary">detail</a>
    </div>
  </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</div>
<?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, false);
}
}
