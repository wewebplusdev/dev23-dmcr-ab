
{assign var="subjectoffice" value="subjectoffice{$infolang}"}
{assign var="address" value="address{$infolang}"}
<footer class="layout-footer">
    <div class="topbar">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <div class="icon">
                                <img src="{$template}/assets/img/icon/address.svg" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="content">
                                <label class="control-label">{$settingWeb[$subjectoffice]}</label>
                                <p class="desc">
                                {$settingWeb["contact"][$address]}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-md-6">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <div class="icon">
                                <img src="{$template}/assets/img/icon/phone.svg" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="content">
                                <label class="control-label">{$lang['system']['tel']}</label>
                                {foreach $settingWeb["contact"]['tel'] as $key => $valuetel}
                                    <a href="tel:{$valuetel}" class="link">{$valuetel}</a><br/>
                                {/foreach}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-md-6">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <div class="icon">
                                <img src="{$template}/assets/img/icon/fax.svg" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="content">
                                <label class="control-label">{$lang['system']['fax']}</label>
                                <p class="desc">{$settingWeb["contact"]['fax']}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="info">
                        <label class="label-control">{$lang['system']['follow']} :</label>
                        <div class="social">
                            {if $settingWeb['social']['Youtube']['link'] neq "" && $settingWeb['social']['Youtube']['link'] neq "#"}
                            <a href="{$settingWeb['social']['Youtube']['link']}" class="link" target="_blank" title="Youtube">
                                <img src="{$template}/assets/img/icon/social-yt.svg" alt="">
                            </a>
                            {/if}
                            {if $settingWeb['social']['Facebook']['link'] neq "" && $settingWeb['social']['Facebook']['link'] neq "#"}
                            <a href="{$settingWeb['social']['Facebook']['link']}" class="link" target="_blank" title="Facebook">
                                <img src="{$template}/assets/img/icon/social-fb.svg" alt="">
                            </a>
                            {/if}
                            {if $settingWeb['social']['Twitter']['link'] neq "" && $settingWeb['social']['Twitter']['link'] neq "#"}
                            <a href="{$settingWeb['social']['Twitter']['link']}" class="link" target="_blank" title="Twitter">
                                <img src="{$template}/assets/img/icon/social-tw.svg" alt="">
                            </a>
                            {/if}
                            {if $settingWeb['social']['Instagram']['link'] neq "" && $settingWeb['social']['Instagram']['link'] neq "#"}
                            <a href="{$settingWeb['social']['Instagram']['link']}" class="link" target="_blank" title="Instagram">
                                <img src="{$template}/assets/img/icon/social-ig.svg" alt="">
                            </a>
                            {/if}
                            {if $settingWeb['social']['Line']['link'] neq "" && $settingWeb['social']['Line']['link'] neq "#"}
                            <a href="{$settingWeb['social']['Line']['link']}" class="link" target="_blank" title="Line">
                                <img src="{$template}/assets/img/icon/social-li.svg" alt="">
                            </a>
                            {/if}
                        </div>
                    </div>
                    <div class="info">
                        <label class="label-control">{$lang['system']['email']} :</label>
                        {foreach $settingWeb["contact"]['email'] as $key => $valueemail}
                            <p>
                            <a href="mailto:{$valueemail}" class="link">{$valueemail}</a><br/>
                            </p>
                        {/foreach}
                        
                    </div>
                </div>
                <div class="col d-none d-lg-block">
                    <div class="menu">
                        <ul class="nav-list fluid">
                            <li>
                                <a href="{$ul}/home" class="link {if $segment eq "home"}active{/if}">{$lang["menu:home"]}</a>
                            </li>
                            <li>
                                <a href="{$ul}/products" class="link">{$lang["menu:product"]}</a>
                            </li>
                            <li>
                                <a href="{$ul}/company" class="link">{$lang["menu:company"]}	</a>
                            </li>
                            <li>
                                <a href="{$ul}/about" class="link">{$lang["menu:about"]}</a>
                            </li>
                            <li>
                                <a href="{$ul}/news" class="link">{$lang["menu:news"]}</a>
                            </li>
                            <!-- <li>
                                <a href="{$ul}/career" class="link">{$lang["menu:career"]}</a>
                            </li> -->
                            <li>
                                <a href="{$ul}/contactus" class="link">{$lang["menu:contact"]}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="map">
                        <img src="{$settingWeb['addresspic']|fileinclude:"real":{$settingWeb.masterkey}:"link"}" alt="">
                        <div class="action">
                            <a href="{$ul}/contactus/GoogleMap" class="btn">Google Map</a>
                            <a href="{$ul}/contactus/GraphicMap" class="btn">View Map</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md">
                    <p class="desc">©2022 S.E.I. Thai Holding Co, Ltd.</p>
                </div>
                <div class="col-md-auto">
                    <a href="{$ul}/policy" class="link">{$lang['Privacy']}</a>
                </div>
            </div>
        </div>
    </div>
</footer>