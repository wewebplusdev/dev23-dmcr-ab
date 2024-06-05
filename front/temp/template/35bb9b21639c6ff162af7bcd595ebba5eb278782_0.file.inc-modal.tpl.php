<?php
/* Smarty version 3.1.30, created on 2024-06-05 17:26:46
  from "C:\xampp\htdocs\dev23-dmcr-ab\front\template\default\inc-modal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_66603d669ea512_30789761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35bb9b21639c6ff162af7bcd595ebba5eb278782' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dev23-dmcr-ab\\front\\template\\default\\inc-modal.tpl',
      1 => 1717553665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66603d669ea512_30789761 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="policyModal1" class="modal modal-policy fade" role="dialog" aria-modal="true" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title h4">นโยบายการคุ้มครองข้อมูลส่วนบุคคล</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="editor-content">
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                    piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a
                    Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin
                    words,
                    consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical
                    literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33
                    of
                    "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This
                    book
                    is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem
                    Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<div id="voteResult" class="modal modal-vote fade" role="dialog" aria-modal="true" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title h4">ผลโหวต</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="chart-container">
                    <canvas id="voteChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="voteComplete" class="modal modal-vote fade" role="dialog" aria-modal="true" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title h4">ผลโหวต</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="status  text-center" id="status">
                    <div role="alert" class="fade alert alert-light show">
                        <div class="icon">
                            <!-- <span class="material-symbols-rounded">check_circle</span>
                            <span class="material-symbols-outlined">
                                cancel
                                </span> -->
                        </div>
                        <div class="alert-heading h4" id="msg-vote">โหวตสำเร็จ</div>
                        <p>ขอบพระคุณที่ใช้บริการ</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php }
}
