{* START: Policy Modal *}
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
{* END: Policy Modal *}

{* START: Vote Result Modal *}
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
{* END: Policy Modal *}

{* START: Vote Result Modal *}
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
{* END: Policy Modal *}