<?php
/* Smarty version 3.1.30, created on 2023-07-18 13:36:32
  from "/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/template/default/inc-search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64b632f07f2292_20187855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4a85a6a1144bf299d42f66dc31ac97cee0ce874' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/template/default/inc-search.tpl',
      1 => 1689159175,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64b632f07f2292_20187855 (Smarty_Internal_Template $_smarty_tpl) {
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
