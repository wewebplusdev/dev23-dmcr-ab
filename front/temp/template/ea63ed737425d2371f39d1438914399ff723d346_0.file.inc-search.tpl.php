<?php
/* Smarty version 3.1.30, created on 2023-07-24 00:35:46
  from "C:\xampp\htdocs\dev23-dmcr-ab\front\template\default\inc-search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64bd64f29c94d7_93544252',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea63ed737425d2371f39d1438914399ff723d346' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-dmcr-ab\\front\\template\\default\\inc-search.tpl',
      1 => 1690133316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64bd64f29c94d7_93544252 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="search-input hide">
    <form action="/search" class="form-default">
        <div class="input-group">
            <label class="floating-label form-label">
                <span class="fa-solid fa-magnifying-glass"></span>
            </label>
            <input placeholder="ค้นหา" aria-label="ค้นหา" aria-describedby="ค้นหา" type="text" class="form-control"><button type="button" class="btn-close" aria-label="Close"></button>
        </div>
    </form>
</div><?php }
}
