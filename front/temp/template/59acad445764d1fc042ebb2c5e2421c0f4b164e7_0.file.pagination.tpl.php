<?php
/* Smarty version 3.1.30, created on 2024-06-05 17:27:55
  from "C:\xampp\htdocs\dev23-dmcr-ab\front\template\default\pagination.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66603dab96fb21_84326378',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59acad445764d1fc042ebb2c5e2421c0f4b164e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-dmcr-ab\\front\\template\\default\\pagination.tpl',
      1 => 1717570083,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66603dab96fb21_84326378 (Smarty_Internal_Template $_smarty_tpl) {
if ((($tmp = @$_smarty_tpl->tpl_vars['pagination']->value)===null||$tmp==='' ? null : $tmp)) {?>
    <div class="pagination-block" data-aos="fade-up">
        <div class="align-items-center row">
            <div class="col">
                <div class="pagination-label">จำนวนทั้งหมด <span class="text-primary"><?php echo number_format($_smarty_tpl->tpl_vars['pagination']->value['total']);?>
</span> รายการ</div>
            </div>
            <div class="col-md-auto">
                <ul class="pagination">
                    <?php $_smarty_tpl->_assignInScope('pageStartShow', $_smarty_tpl->tpl_vars['pagination']->value['curent']-2);
?>
                    <?php $_smarty_tpl->_assignInScope('pageEndShow', $_smarty_tpl->tpl_vars['pagination']->value['curent']+2);
?>
                    <?php if ($_smarty_tpl->tpl_vars['pageStartShow']->value < 1) {?>
                        <?php $_smarty_tpl->_assignInScope('pageStartShow', 1);
?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['pageStartShow']->value-2 < 0) {?>
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['pageStartShow']->value-$_smarty_tpl->tpl_vars['pagination']->value['curent'];
$_prefixVariable7=ob_get_clean();
ob_start();
echo 2+$_prefixVariable7;
$_prefixVariable8=ob_get_clean();
$_smarty_tpl->_assignInScope('pageEndShow', $_smarty_tpl->tpl_vars['pageEndShow']->value+$_prefixVariable8);
?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['pageEndShow']->value >= $_smarty_tpl->tpl_vars['pagination']->value['totalpage']) {?>
                        <?php $_smarty_tpl->_assignInScope('pageEndShow', $_smarty_tpl->tpl_vars['pagination']->value['totalpage']);
?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['pagination']->value['total']-$_smarty_tpl->tpl_vars['pagination']->value['curent'] < 2) {?>
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['pagination']->value['totalpage']-$_smarty_tpl->tpl_vars['pagination']->value['curent'];
$_prefixVariable9=ob_get_clean();
$_smarty_tpl->_assignInScope('startAdd', 2-$_prefixVariable9);
?>
                        <?php $_smarty_tpl->_assignInScope('pageStartShow', $_smarty_tpl->tpl_vars['pageStartShow']->value-$_smarty_tpl->tpl_vars['startAdd']->value);
?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['pageStartShow']->value < 1) {?>
                        <?php $_smarty_tpl->_assignInScope('pageStartShow', 1);
?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['pageStartShow']->value > 1) {?>
                        <li class="page-item">
                            <a class="page-link" role="button" tabindex="0" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];?>
1">
                                <span class="fa fa-angles-left"></span>
                                <span class="visually-hidden">First</span>
                            </a>
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['pagination']->value['curent']-1 > 0) {?>
                        <li class="page-item">
                            <a class="page-link" role="button" tabindex="0" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['pagination']->value['curent']-1;?>
">
                                <span class="fa fa-chevron-left"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                        </li>
                    <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['current'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['current']->step = 1;$_smarty_tpl->tpl_vars['current']->total = (int) ceil(($_smarty_tpl->tpl_vars['current']->step > 0 ? $_smarty_tpl->tpl_vars['pageEndShow']->value+1 - ($_smarty_tpl->tpl_vars['pageStartShow']->value) : $_smarty_tpl->tpl_vars['pageStartShow']->value-($_smarty_tpl->tpl_vars['pageEndShow']->value)+1)/abs($_smarty_tpl->tpl_vars['current']->step));
if ($_smarty_tpl->tpl_vars['current']->total > 0) {
for ($_smarty_tpl->tpl_vars['current']->value = $_smarty_tpl->tpl_vars['pageStartShow']->value, $_smarty_tpl->tpl_vars['current']->iteration = 1;$_smarty_tpl->tpl_vars['current']->iteration <= $_smarty_tpl->tpl_vars['current']->total;$_smarty_tpl->tpl_vars['current']->value += $_smarty_tpl->tpl_vars['current']->step, $_smarty_tpl->tpl_vars['current']->iteration++) {
$_smarty_tpl->tpl_vars['current']->first = $_smarty_tpl->tpl_vars['current']->iteration == 1;$_smarty_tpl->tpl_vars['current']->last = $_smarty_tpl->tpl_vars['current']->iteration == $_smarty_tpl->tpl_vars['current']->total;?>
                        <li class="page-item<?php if ($_smarty_tpl->tpl_vars['current']->value == $_smarty_tpl->tpl_vars['pagination']->value['curent']) {?> active<?php }?>">
                            <a class="page-link" role="button" tabindex="0" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['current']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['txtLang']->value['tools:page'];?>
 <?php echo $_smarty_tpl->tpl_vars['current']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['current']->value;?>
</a>
                        </li>
                    <?php }
}
?>

                    <li class="page-item pagination-jumpPage">
                        <select class="select-control" onchange="window.location = $(this).val()" style="width:95px">
                            <option value="javascript:void(0)">ไปหน้า</option>
                            <?php
$_smarty_tpl->tpl_vars['current'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['current']->step = 1;$_smarty_tpl->tpl_vars['current']->total = (int) ceil(($_smarty_tpl->tpl_vars['current']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value['totalpage']+1 - (1) : 1-($_smarty_tpl->tpl_vars['pagination']->value['totalpage'])+1)/abs($_smarty_tpl->tpl_vars['current']->step));
if ($_smarty_tpl->tpl_vars['current']->total > 0) {
for ($_smarty_tpl->tpl_vars['current']->value = 1, $_smarty_tpl->tpl_vars['current']->iteration = 1;$_smarty_tpl->tpl_vars['current']->iteration <= $_smarty_tpl->tpl_vars['current']->total;$_smarty_tpl->tpl_vars['current']->value += $_smarty_tpl->tpl_vars['current']->step, $_smarty_tpl->tpl_vars['current']->iteration++) {
$_smarty_tpl->tpl_vars['current']->first = $_smarty_tpl->tpl_vars['current']->iteration == 1;$_smarty_tpl->tpl_vars['current']->last = $_smarty_tpl->tpl_vars['current']->iteration == $_smarty_tpl->tpl_vars['current']->total;?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['current']->value;?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['current']->value;?>

                                </option>
                            <?php }
}
?>

                        </select>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['pagination']->value['curent']+1 < $_smarty_tpl->tpl_vars['pagination']->value['totalpage']) {?>
                        <li class="page-item">
                            <a class="page-link" role="button" tabindex="0" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['pagination']->value['curent']+1;?>
">
                                <span class="fa fa-chevron-right"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['pagination']->value['curent']+2 < $_smarty_tpl->tpl_vars['pagination']->value['totalpage']) {?>                  
                        <li class="page-item">
                            <a class="page-link" role="button" tabindex="0" href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['pagination']->value['totalpage'];?>
">
                                <span class="fa fa-angles-right"></span>
                                <span class="visually-hidden">Last</span>
                            </a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </div>
<?php }
}
}
