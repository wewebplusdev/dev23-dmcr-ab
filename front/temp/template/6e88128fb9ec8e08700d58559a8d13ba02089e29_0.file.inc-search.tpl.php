<?php
/* Smarty version 3.1.30, created on 2023-07-12 09:10:30
  from "C:\xampp8.1\htdocs\dev23-dmcr-ab\front\template\default\inc-search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64ae0b963330e9_73684992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e88128fb9ec8e08700d58559a8d13ba02089e29' => 
    array (
      0 => 'C:\\xampp8.1\\htdocs\\dev23-dmcr-ab\\front\\template\\default\\inc-search.tpl',
      1 => 1689127326,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64ae0b963330e9_73684992 (Smarty_Internal_Template $_smarty_tpl) {
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
