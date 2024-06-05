<?php
/* Smarty version 3.1.30, created on 2024-06-05 17:26:46
  from "C:\xampp\htdocs\dev23-dmcr-ab\front\template\default\popup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66603d66a23b29_10358249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68440d7a29588a215831e495a8f691d9b13a12d1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-dmcr-ab\\front\\template\\default\\popup.tpl',
      1 => 1717553665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66603d66a23b29_10358249 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ((($tmp = @$_smarty_tpl->tpl_vars['alertpopup']->value)===null||$tmp==='' ? null : $tmp)) {?>

    <?php if ((($tmp = @$_smarty_tpl->tpl_vars['alertpopup']->value['status'])===null||$tmp==='' ? null : $tmp)) {?>

    <div class="modal-block">
        <div class="modal fade" id="modalformalert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body confirm">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                        <?php if ((($tmp = @$_smarty_tpl->tpl_vars['alertpopup']->value['html'])===null||$tmp==='' ? null : $tmp)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['alertpopup']->value['html'];?>

                        <?php } else { ?>                                    
                            <div class="logo"></div>
                            <div class="title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['sys']['save-success:contact'];?>
</div>
                            <div class="desc">
                            <?php echo $_smarty_tpl->tpl_vars['alertpopup']->value['msg'];?>
<br class="hidden-xs">
                            <?php echo $_smarty_tpl->tpl_vars['lang']->value['sys']['thank'];?>

                            </div>
                        <?php }?>
                        
                        <!-- <a href="#" class="modal-close" data-dismiss="modal">ปิด</a> -->
                    </div>
                </div>
            </div>
        </div>

	</div>


    <?php } else { ?>
       <div class="modal-block">
       <div class="modal fade" id="modalformalert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body confirm">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                        <?php if ((($tmp = @$_smarty_tpl->tpl_vars['alertpopup']->value['html'])===null||$tmp==='' ? null : $tmp)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['alertpopup']->value['html'];?>

                        <?php } else { ?>                                    
                            <div class="logo"></div>
                            <div class="title"> <?php echo $_smarty_tpl->tpl_vars['alertpopup']->value['msg'];?>
</div>
                            <div class="desc">
                            กรุณาลองใหม่อีกครั้ง
                            </div>
                        <?php }?>
                        

                        <!-- <a href="#" class="modal-close" data-dismiss="modal">ปิด</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php }?>

    <?php 
    unset($_SESSION['alert']);
}?>

<?php }
}
