<?php
/* Smarty version 3.1.30, created on 2023-07-24 01:34:47
  from "C:\xampp\htdocs\dev23-dmcr-ab\front\template\default\pagination.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64bd72c7788872_74516250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59acad445764d1fc042ebb2c5e2421c0f4b164e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-dmcr-ab\\front\\template\\default\\pagination.tpl',
      1 => 1690133316,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64bd72c7788872_74516250 (Smarty_Internal_Template $_smarty_tpl) {
if ((($tmp = @$_smarty_tpl->tpl_vars['pagination']->value)===null||$tmp==='' ? null : $tmp)) {?>
<div class="pagination-block mt0 border-no">
  <div class="row">
    <div class="col-sm-4">
      <div class="pagination-label">
        จำนวน <span><?php echo number_format($_smarty_tpl->tpl_vars['pagination']->value['total']);?>
</span> รายการ
      </div>
    </div>
    <div class="col-sm-8">
      <div class="pagination">
        <ul>
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
$_prefixVariable3=ob_get_clean();
ob_start();
echo 2+$_prefixVariable3;
$_prefixVariable4=ob_get_clean();
$_smarty_tpl->_assignInScope('pageEndShow', $_smarty_tpl->tpl_vars['pageEndShow']->value+$_prefixVariable4);
?>
          <?php }?>

          <?php if ($_smarty_tpl->tpl_vars['pageEndShow']->value >= $_smarty_tpl->tpl_vars['pagination']->value['totalpage']) {?>
              <?php $_smarty_tpl->_assignInScope('pageEndShow', $_smarty_tpl->tpl_vars['pagination']->value['totalpage']);
?>
          <?php }?>

          <?php if ($_smarty_tpl->tpl_vars['pagination']->value['total']-$_smarty_tpl->tpl_vars['pagination']->value['curent'] < 2) {?>
              <?php ob_start();
echo $_smarty_tpl->tpl_vars['pagination']->value['totalpage']-$_smarty_tpl->tpl_vars['pagination']->value['curent'];
$_prefixVariable5=ob_get_clean();
$_smarty_tpl->_assignInScope('startAdd', 2-$_prefixVariable5);
?>
              <?php $_smarty_tpl->_assignInScope('pageStartShow', $_smarty_tpl->tpl_vars['pageStartShow']->value-$_smarty_tpl->tpl_vars['startAdd']->value);
?>
          <?php }?>


          <?php if ($_smarty_tpl->tpl_vars['pageStartShow']->value < 1) {?>
              <?php $_smarty_tpl->_assignInScope('pageStartShow', 1);
?>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['pageStartShow']->value > 1) {?>
              <li class="pagination-nav"><a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];?>
1">หน้าแรก</a></li>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['pagination']->value['curent']-1 > 0) {?>
              <li class="pagination-prev"><a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['pagination']->value['curent']-1;?>
"><span class="fa fa-angle-left"></span></a></li>
          <?php }?>

          <?php
$_smarty_tpl->tpl_vars['current'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['current']->step = 1;$_smarty_tpl->tpl_vars['current']->total = (int) ceil(($_smarty_tpl->tpl_vars['current']->step > 0 ? $_smarty_tpl->tpl_vars['pageEndShow']->value+1 - ($_smarty_tpl->tpl_vars['pageStartShow']->value) : $_smarty_tpl->tpl_vars['pageStartShow']->value-($_smarty_tpl->tpl_vars['pageEndShow']->value)+1)/abs($_smarty_tpl->tpl_vars['current']->step));
if ($_smarty_tpl->tpl_vars['current']->total > 0) {
for ($_smarty_tpl->tpl_vars['current']->value = $_smarty_tpl->tpl_vars['pageStartShow']->value, $_smarty_tpl->tpl_vars['current']->iteration = 1;$_smarty_tpl->tpl_vars['current']->iteration <= $_smarty_tpl->tpl_vars['current']->total;$_smarty_tpl->tpl_vars['current']->value += $_smarty_tpl->tpl_vars['current']->step, $_smarty_tpl->tpl_vars['current']->iteration++) {
$_smarty_tpl->tpl_vars['current']->first = $_smarty_tpl->tpl_vars['current']->iteration == 1;$_smarty_tpl->tpl_vars['current']->last = $_smarty_tpl->tpl_vars['current']->iteration == $_smarty_tpl->tpl_vars['current']->total;?>
              <li class="<?php if ($_smarty_tpl->tpl_vars['current']->value == $_smarty_tpl->tpl_vars['pagination']->value['curent']) {?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['current']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['txtLang']->value['tools:page'];?>
 <?php echo $_smarty_tpl->tpl_vars['current']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['current']->value;?>
</a></li>
          <?php }
}
?>

		  <li class="pagination-jumpPage">
			<select class="select-control" onchange="window.location = $(this).val()">
				<option value="javascript:void(0)" >ไปหน้า</option>
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
" ><?php echo $_smarty_tpl->tpl_vars['current']->value;?>
</option>
				<?php }
}
?>

			</select>
		  </li>
          <?php if ($_smarty_tpl->tpl_vars['pagination']->value['curent']+1 < $_smarty_tpl->tpl_vars['pagination']->value['totalpage']) {?>
              <li class="pagination-next"><a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['pagination']->value['curent']+1;?>
"><span class="fa fa-angle-right"></span></a></li>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['pagination']->value['curent']+2 < $_smarty_tpl->tpl_vars['pagination']->value['totalpage']) {?>
            <li class="pagination-nav"><a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['pagination']->value['method']['page'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parambefor'];
echo $_smarty_tpl->tpl_vars['pagination']->value['method']['parameter'];
echo $_smarty_tpl->tpl_vars['pagination']->value['totalpage'];?>
">หน้าสุดท้าย</a></li>
          <?php }?>
        </ul>
      </div>
    </div>
  </div>
</div>


<?php }
}
}
