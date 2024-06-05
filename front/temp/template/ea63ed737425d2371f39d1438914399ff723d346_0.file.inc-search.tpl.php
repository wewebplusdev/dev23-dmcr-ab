<?php
/* Smarty version 3.1.30, created on 2024-06-05 17:26:46
  from "C:\xampp\htdocs\dev23-dmcr-ab\front\template\default\inc-search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66603d66654cd0_00446935',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea63ed737425d2371f39d1438914399ff723d346' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-dmcr-ab\\front\\template\\default\\inc-search.tpl',
      1 => 1717553665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66603d66654cd0_00446935 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="search-input hide">
    <form action="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/search" class="form-default">
        <div class="input-group">
            <label class="floating-label form-label">
                <span class="fa-solid fa-magnifying-glass"></span>
            </label>
            <input placeholder="ค้นหา" aria-label="ค้นหา" aria-describedby="ค้นหา" type="text" class="form-control"><button type="button" class="btn-close" aria-label="Close"></button>
        </div>
    </form>
</div><?php }
}
