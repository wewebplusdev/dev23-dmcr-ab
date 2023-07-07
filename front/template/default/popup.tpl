
{if $alertpopup|default:null}

    {if $alertpopup.status|default:null}

    <div class="modal-block">
        <div class="modal fade" id="modalformalert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body confirm">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                        {if $alertpopup.html|default:null}
                            {$alertpopup.html}
                        {else}                                    
                            <div class="logo"></div>
                            <div class="title">{$lang['sys']['save-success:contact']}</div>
                            <div class="desc">
                            {$alertpopup.msg}<br class="hidden-xs">
                            {$lang['sys']['thank']}
                            </div>
                        {/if}
                        
                        <!-- <a href="#" class="modal-close" data-dismiss="modal">ปิด</a> -->
                    </div>
                </div>
            </div>
        </div>

	</div>


    {else}
       <div class="modal-block">
       <div class="modal fade" id="modalformalert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body confirm">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                        {if $alertpopup.html|default:null}
                            {$alertpopup.html}
                        {else}                                    
                            <div class="logo"></div>
                            <div class="title"> {$alertpopup.msg}</div>
                            <div class="desc">
                            กรุณาลองใหม่อีกครั้ง
                            </div>
                        {/if}
                        

                        <!-- <a href="#" class="modal-close" data-dismiss="modal">ปิด</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    {/if}

    {php}
    unset($_SESSION['alert']);
    {/php}
{/if}

