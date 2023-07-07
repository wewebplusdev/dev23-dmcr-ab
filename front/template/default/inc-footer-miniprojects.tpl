        {if $infoContact->fields['type'] eq '1'}
            {assign var="style_footer" value="style='background-color: #{$infoContact->fields['color']}!important;background-image: none!important; '" }
        {elseif $infoContact->fields['type'] eq '2'}
            {assign var="style_footer" value="style='background-image: url({$infoContact->fields['footerpic']|fileinclude:'footer_bg':$infoContact->fields['masterkey']:'link'}) !important; '" }
        {/if}
        
        <footer class="site-footer" {$style_footer}>
            {if $WeblinkProject->_numOfRows > 0}
            <div class="wg-weblink">
                <div class="container">
                    <div class="row-table">
                        <div class="col">
                            <div class="whead">
                                <h6 class="title">
                                    <span class="icon">
                                        <img class="lazy" src="{$template}/publicminisite/img/icon/wh-i4.svg" alt="เว็บลิงค์">
                                    </span>
                                    เว็บลิงค์
                                </h6>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="action">
                                <a href="{$ul}/miniprojects/{$projectId}/directory" class="btn btn-light">
                                    อ่านต่อ <span class="icon arrow_right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                    {foreach from=$WeblinkProject item=listWeblinkProject}
                        <div class="item">
                            <div class="wrapper">
                                <a href="{$listWeblinkProject.url|checkLink}" class="link" {$listWeblinkProject.url|urltarget:$listWeblinkProject.target} >
                                    <div class="row-table">
                                        <div class="col-auto">
                                            <div class="thumb">
                                                <figure class="contain">
                                                    <img class="lazy" src="{$listWeblinkProject.pic|fileinclude:'pictures':$listWeblinkProject.masterkey:"link"}" alt="{$listWeblinkProject.subject}">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="content">
                                                <div class="title">
                                                    {$listWeblinkProject.subject}
                                                </div>
                                            </div>
                                            <div class="line" style="background-color:#{$listWeblinkProject.color}"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    {/foreach}
                    </div>
                </div>
            </div>
            {/if}

            <div class="footer-address">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="address">
                                <div class="title">
                                    กรมทรัพยากรทางทะเลและชายฝั่ง กระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อม
                                    <small>Department of Marine and Coastal Resources</small>
                                </div>
                                {if $contactinfo['contact']['address'] neq ''}
                                <div class="address-info">
                                    <div class="thumb">
                                        <div class="icon">
                                            <span class="flaticon-placeholder"></span>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        {$contactinfo['contact']['address']}
                                    </div>
                                </div>
                                {/if}
                                <div class="row">
                                    {if $contactinfo['contact']['tel'] neq ''}
                                    <div class="col-sm-5">
                                        <div class="address-info">
                                            <div class="thumb">
                                                <div class="icon">
                                                    <span class="flaticon-phone-call" style="font-size: 0.8em;"></span>
                                                </div>
                                            </div>
                                            <div class="inner"><h4><a href="tel:{$contactinfo['contact']['tel']}" class="link" style="color:#fff;">{$contactinfo['contact']['tel']}</a></h4></div>
                                        </div>
                                    </div>
                                    {/if}
                                    {if $contactinfo['contact']['fax'] neq ''}
                                    <div class="col-sm-5">
                                        <div class="address-info">
                                            <div class="thumb">
                                                <div class="icon">
                                                    <span class="flaticon-phone-call" style="font-size: 0.8em;"></span>
                                                    <!-- <span class="flaticon-printer" style="font-size: 0.9em;"></span> -->
                                                </div>
                                            </div>
                                            <div class="inner"><h4>{$contactinfo['contact']['fax']}</h4></div>
                                        </div>
                                    </div>
                                    {/if}
                                </div>
                                {if $contactinfo['contact']['email'] neq ''}
                                <div class="address-info">
                                    <div class="thumb">
                                        <div class="icon">
                                            <span class="flaticon-message" style="font-size: 0.9em;"></span>
                                        </div>
                                    </div>
                                    <div class="inner">อีเมล : <a href="mailto:{$contactinfo['contact']['email']}" style="color:#fff;">{$contactinfo['contact']['email']}</a></div>
                                </div>
                                {/if}
                                <div class="social">
                                    <ul class="item-list">
                                    {if $contactinfo['social']['Facebook']['link'] neq '' && $contactinfo['social']['Facebook']['link'] neq '#'}
                                        <li><a href="{$contactinfo['social']['Facebook']['link']}" title="Facebook" target="_blank" rel="nofollow"><img class="lazy" src="{$template}/publicminisite/img/icon/social-fb.png" alt="Facebook"></a></li>
                                    {/if}
                                    {if $contactinfo['social']['Twitter']['link'] neq '' && $contactinfo['social']['Facebook']['link'] neq '#'}
                                        <li><a href="{$contactinfo['social']['Twitter']['link']}" title="Twitter" target="_blank" rel="nofollow"><img class="lazy" src="{$template}/publicminisite/img/icon/social-tw.png" alt="Twitter"></a></li>
                                    {/if}
                                    {if $contactinfo['social']['Instagram']['link'] neq '' && $contactinfo['social']['Facebook']['link'] neq '#'}
                                        <li><a href="{$contactinfo['social']['Instagram']['link']}" title="Instagram" target="_blank" rel="nofollow"><img class="lazy" src="{$template}/publicminisite/img/icon/social-ig.png" alt="Instagram"></a></li>
                                    {/if}
                                    {if $contactinfo['social']['Youtube']['link'] neq '' && $contactinfo['social']['Facebook']['link'] neq '#'}
                                        <li><a href="{$contactinfo['social']['Youtube']['link']}" title="Youtube" target="_blank" rel="nofollow"><img class="lazy" src="{$template}/publicminisite/img/icon/social-yt.png" alt="Youtube"></a></li>
                                    {/if}
                                    {if $contactinfo['social']['Line']['link'] neq '' && $contactinfo['social']['Facebook']['link'] neq '#'}
                                        <li><a href="http://line.me/ti/p/~@{$contactinfo['social']['Line']['link']}" title="Line" target="_blank" rel="nofollow"><img class="lazy" src="{$template}/publicminisite/img/icon/social-li.png" alt="Line"></a></li>
                                    {/if}
                                        <li><a href="https://www.dmcr.go.th/weadmin" title="Back Office" target="_blank" rel="nofollow"><img class="lazy" src="{$template}/publicminisite/img/icon/social-ic2.png" alt="Back Office"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-lg-block d-md-none d-sm-none d-none">
                            <figure class="brand">
                                <img class="lazy" src="{$template}/publicminisite/img/static/brand-lg.png" title="dmcr" alt="dmcr">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-info">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-7">
                            <div class="wrapper">
                                <div class="title">สงวนลิขสิทธิ์ © พ.ศ.2556 <br> กรมทรัพยากรทางทะเลและชายฝั่ง</div>
                                <div class="desc">
                                    พัฒนาระบบโดย ศูนย์สารสนเทศทรัพยากรทางทะเลและชายฝั่ง<br/>
                                    ห้ามนำส่วนหนึ่งส่วนใดในเว็บไซต์นี้ไปทำซ้ำหรือเผยแพร่ในรูปแบบใดๆ หรือวิธีอื่นใดยกเว้นเพื่อวัตถุประสงค์ทางการศึกษา<br/>
                                    หากมีความประสงค์ใช้ข้อมูลตัวเลขหรือข้อมูลเชิงพื้นที่ในการอ้างอิงโปรดสอบทานความถูกต้องกับหน่วยงานโดยตรง<br/>
                                    เริ่มใช้งานตั้งแต่ กรกฏาคม พ.ศ.2556
                                </div>
                                <ul class="item-list">
                                    <li><a href="{$ul}/miniprojects/{$projectId}/home" class="link" title="Contact Us">Home</a></li>
                                   {foreach $allMenuMod as $keys => $listMenu}
                                    <li><a href="{$ul}/{$listMenu.url}" class="link" title="{$listMenu.name_en}">{$listMenu.name_en}</a></li>
                                    {/foreach}
                                    <li><a href="{$ul}/miniprojects/{$projectId}/contact" class="link" title="Contact Us">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-5">
                            <div class="standard">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="ipv6">
                                            <a href="http://ipv6-test.com/validate.php?url=referer" title="ipv6 ready'" target="_blank" rel="nofollow">
                                                <img class="lazy" src="{$template}/publicminisite/img/icon/button-ipv6-big.png?v=1001" alt="ipv6 ready" title="ipv6 ready">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="w3c">
                                            <a href="http://www.w3.org/WAI/WCAG2A-Conformance" title="Explanation of WCAG 2.0 Level A Conformance" target="_blank" rel="nofollow">
                                                <img class="lazy" style="-webkit-user-select: none" src="https://www.w3.org/WAI/wcag2A" alt="Level A conformance, W3C WAI Web Content Accessibility Guidelines 2.0">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ipv6forum">
                                    <a href="https://www.ipv6forum.com/ipv6_enabled/approval_list.php?type=url&amp;content=www.dmcr.go.th" target="_blank">
                                        <img class="lazy" src="{$template}/publicminisite/img/static/ipv6_edit25082017.jpg" alt="ipv6forum" title="ipv6forum">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-lg-none d-md-block d-sm-block d-block">
                        <div class="footer-mobile">
                            <label for="footer-mobile-sitemap" style="display: none;">sitemap</label> 
                            <select class="select-control" id="footer-mobile-sitemap" style="width: 100%;">
                                <option value="{$ul}/miniprojects/{$projectId}/home">Home</option>
                                {foreach $allMenuMod as $keys => $listMenu}
                                <option value="{$ul}/{$listMenu.url}">{$listMenu.name_en}</option>
                                {/foreach}
                                <option value="{$ul}/miniprojects/{$projectId}/contact">Contact Us</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12">
                            <ul class="item-list">      
                                <li><a href="javascript:void(0)" data-url="policy" data-id="1" id="1" class="clickPolicy" title="นโยบายการรักษาความมั่นคงปลอดภัย">นโยบายการรักษาความมั่นคงปลอดภัย</a></li>
                                <li><a href="javascript:void(0)" data-url="policy" data-id="2" id="2" class="clickPolicy" title="นโยบายเว็บไซต์">นโยบายเว็บไซต์</a></li>
                                <li><a href="javascript:void(0)" data-url="policy" data-id="3" id="3" class="clickPolicy" title="นโยบายการคุ้มครองข้อมูลส่วนบุคคล">นโยบายการคุ้มครองข้อมูลส่วนบุคคล</a></li>
                    
                                {* <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-policy1" class="link" title="นโยบายการรักษาความมั่นคงปลอดภัย">นโยบายการรักษาความมั่นคงปลอดภัย</a></li>
                                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-policy2" class="link" title="นโยบายเว็บไซต์">นโยบายเว็บไซต์</a></li>
                                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-policy3" class="link" title="นโยบายการคุ้มครองข้อมูลส่วนบุคคล">นโยบายการคุ้มครองข้อมูลส่วนบุคคล</a></li> *}
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="hitats">
                                {literal}
                                    <!-- Histats.com  START  (standard)-->
                                    <script >
                                        document.write(unescape("%3Cscript src=%27https://s10.histats.com/js15.js?v=0.75385500 1512618066%27 type=%27text/javascript%27%3E%3C/script%3E"));
                                    </script>
                                        <a href="http://www.histats.com" target="_blank" title="free flash stats"   rel="nofollow">
                                            <script >
                                                try {Histats.start(1,724355,4,1032,150,25,"00011111");
                                                Histats.track_hits();} catch (err){};
                                            </script>
                                        </a>
                                    <noscript>
                                        <a href="http://www.histats.com" target="_blank" title="free flash stats"  rel="nofollow">
                                            <img  src="http://sstatic1.histats.com/0.gif?724355&amp;101" alt="free flash stats"  title="free flash stats"/>
                                        </a>
                                    </noscript> 
                                <!--  Histats.com  END  -->
                                {/literal}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </footer>
        
        <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-policy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        </div>



    </div>
    <!-- JS SOURCE -->
    <script src="{$template}/publicminisite/js/jquery-2.1.4.min.js{$setVersionTemp}"></script>
    <!-- <script src="{$template}/publicminisite/js/jquery-3.2.1.min"></script> -->
    <script src="{$template}/publicminisite/js/popper.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/jquery-ui.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/jquery.ui.touch-punch.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/jquery.easing-1.3.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/modernizr-3.6.0.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/bootstrap.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/validator.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/wow.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/select2.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/jquery.fancybox.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/jquery.mCustomScrollbar.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/slick.js{$setVersionTemp}"></script>
    <!-- <script src="{$template}/publicminisite/js/slick.min.js"></script> -->
    <script src="{$template}/publicminisite/js/lazyload.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/trunk8.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/jquery.matchHeight-min.js{$setVersionTemp}"></script> 
    <script src="{$template}/publicminisite/js/jquery.sticky-sidebar.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/sticky-sidebar.min.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/resizesensor.js{$setVersionTemp}"></script>
    
    <script  src="{$template}/public/component/html2canvas/html2canvas.js{$setVersionTemp}"></script> 

    <!-- JS MAIN -->
    <script src="{$template}/publicminisite/js/main.js{$setVersionTemp}"></script>
    <script src="{$template}/publicminisite/js/fontsize.js{$setVersionTemp}"></script>

    <!-- JS CONCAT -->
    <!-- <script src="{$template}/publicminisite/js/script.concat.js"></script> -->

    <script>
        var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
    </script>

    {strip}
        {if {$assignjs|default:null}}
            {foreach $assignjs as $addAssetScript}
                {$addAssetScript}
            {/foreach}
        {/if}
    {/strip}
    {* <script>
        $('nav.menu li.nav-home').addClass('active');

        $('.wg-into-slide .slide').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false
        });

        $('.wg-info-project .slide').slick({
            prevArrow:"<div class='slick-prev'><span class='feather icon-chevron-left'></span></div>",
            nextArrow:"<div class='slick-next'><span class='feather icon-chevron-right'></span></div>",
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            dots: true,
            arrows: false,
            focusOnSelect: true,
            rows: 1,
            slidesPerRow:1,
            responsive: [
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }
            ]
        });

        $('.wg-news .slide').slick({
            prevArrow:"<div class='slick-prev'><span class='feather icon-chevron-left'></span></div>",
            nextArrow:"<div class='slick-next'><span class='feather icon-chevron-right'></span></div>",
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            arrows: false,
            focusOnSelect: true,
            rows: 1,
            slidesPerRow:1,
            responsive: [
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }
            ]
        });
    </script>

</body>
</html> *}