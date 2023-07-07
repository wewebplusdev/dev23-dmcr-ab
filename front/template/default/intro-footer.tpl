<!-- Core -->
<script  src="{$template}/public/js/jquery-1.12.4.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/js/jquery-ui.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/js/jquery.ui.touch-punch.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/js/bootstrap.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/js/jquery.easing-1.3.pack.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/js/jquery.mousewheel.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/js/jquery.placeholder.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/js/validator.min.js{$setVersionTemp}"></script>
<!--[if IE]>
    <script src="{$template}/public/js/html5shiv.js"></script>
<![endif]-->

<!-- Componant -->
<script  src="{$template}/public/component/mmenu-master/jquery.mmenu.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/component/mmenu-master/jquery.mmenu.fixedelements.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/component/mmenu-master/jquery.mmenu.navbars.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/component/select2/select2.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/component/owl-carousel/owl.carousel.js{$setVersionTemp}"></script>
<script  src="{$template}/public/component/owl-carousel/owl.carousel.sync.js{$setVersionTemp}"></script>
<script  src="{$template}/public/component/tabcollapse-master/bootstrap-tabcollapse.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/component/fancybox/jquery.fancybox.min.js{$setVersionTemp}"></script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script  src="{$template}/public/component/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/component/slick/slick.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/component/isotope-master/isotope.pkgd.min.js{$setVersionTemp}"></script>
{*<script  src="{$template}/public/component/dotdotdot-master/jquery.dotdotdot.min.js{$setVersionTemp}"></script>*}
<script  src="{$template}/public/component/ellipsis/jquery.ellipsis.min.js{$setVersionTemp}"></script>
<script  src="{$template}/public/component/html2canvas/html2canvas.js{$setVersionTemp}"></script> 
<script  src="{$template}/public/component/percircle-master/percircle.js{$setVersionTemp}"></script>

{* <script src="{$template}/public/component/html2canvas/html2canvas.js"></script> *}

{literal}
<script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-51886109-1', 'dmcr.go.th');
        ga('send', 'pageview');

    </script>


    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'th', includedLanguages: 'en,th', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
    </script>
{/literal}
<!-- Main -->
<script src="{$template}/public/js/main.js"></script>
<!-- Dev -->
<script src="{$template}/public/js/develop.js"></script>
{strip}
    {if {$assignjs|default:null}}
        {foreach $assignjs as $addAssetScript}
            {$addAssetScript}
        {/foreach}
    {/if}
{/strip}

</body>
</html>
