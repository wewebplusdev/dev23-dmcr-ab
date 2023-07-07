<div class="cookie-tab pdpa" id="Cookie-tap" style="display:none">
    <div class="container">
        <div class="row align-items-center h-tap">
            <div class="col-md">
                <div class="text">
                {$lang['pdpa']['cookie']}
                    <a class="link-cookie-policy" href="{$ul}/policy">{$lang['system']['readmore']}</a>
                </div>
            </div> 
            <div class="col-md-auto">
                <div class="action">
                    <a id="btn-AcceptPdpa" data-accept="Accept" class="link acept-btn acceptCookie"  href="javascript:void(0);">{$lang['pdpa']['accept']}</a>
                    <a class="link reject-btn"  href="javascript:void(0);">{$lang['pdpa']['decline']}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function myFunction() {
    var x = document.getElementById("Cookie-tap");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

{* <div class="cookie-tab pdpa" style="background-color: black;padding:1rem; display:none">
    <div class="container">
        <div class="row align-items-center  h-tap">
            <div class="col-md-auto">
                <div class="icon-pdpa">
                    <img src="{$template}/assets/img/icon/pdpa-icon.svg" class="lazy" alt="pdpa-icon">
                </div>
            </div>
            <div class="col-md">
                <div class="text">
                {$lang['pdpa']['cookie']}
                </div>
            </div>
            <div class="col-md-auto">
                <div class="action">
                    <a class="btn btn-primary acept-btn acceptCookie" id="btn-AcceptPdpa" data-accept="Accept" href="javascript:void(0);">{$lang['pdpa']['accept']}</a>
                    <a class="btn btn-light reject-btn" href="javascript:void(0);">{$lang['pdpa']['decline']}</a>
                </div>
            </div>
        </div>
    </div>
</div> *}