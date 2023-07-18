<?php
/* Smarty version 3.1.30, created on 2023-07-18 13:37:09
  from "/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/controller/script/follow/template/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64b63315cd2919_99282729',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50cf005d476f347a7ff5dfccfd2387e591924bf4' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/controller/script/follow/template/index.tpl',
      1 => 1689612713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pagination.tpl' => 1,
  ),
),false)) {
function content_64b63315cd2919_99282729 (Smarty_Internal_Template $_smarty_tpl) {
?>

  <p>
    <a class="btn btn-primary" role="button" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/follow?m=1f">
        ติดตามปะการังเทียม
    </a>
    <a class="btn btn-primary" role="button" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/follow?m=2f">
        ติดตามทุ่นในทะเล
    </a>
    <a class="btn btn-primary" role="button" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/follow?m=3f">
        ติดตามจุดจมเรือ
    </a>
  </p>
  <div>
    <div class="row">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['followListC']->value, 'valuefollowList', false, 'KeyfollowList');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['KeyfollowList']->value => $_smarty_tpl->tpl_vars['valuefollowList']->value) {
?>
        <div class="card col-3">
            <img class="card-img-top" src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['valuefollowList']->value[1];
$_prefixVariable1=ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valuefollowList']->value[6],"pictures",$_prefixVariable1,"link");?>
" alt="Card image cap">
            <div class="card-body">
                <p class="card-text"><?php ob_start();
echo $_smarty_tpl->tpl_vars['langon']->value;
$_prefixVariable2=ob_get_clean();
echo DateThai($_smarty_tpl->tpl_vars['valuefollowList']->value['credate'],'13',$_prefixVariable2,'shot');?>
</p>
              <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['valuefollowList']->value['subject'];?>
</h5>
              
              <small class="card-text"><?php echo $_smarty_tpl->tpl_vars['valuefollowList']->value['title'];?>
</small>
              <br>
              <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/follow/detail/<?php echo $_smarty_tpl->tpl_vars['valuefollowList']->value['id'];?>
?m=<?php echo $_smarty_tpl->tpl_vars['masterkey']->value;?>
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
?>

  </div><?php }
}
