<!-- Core -->
<script src="{$template}/assets/js/jquery-2.2.4.min.js"></script>
<script src="{$template}/assets/js/jquery.easing.min.js"></script>
<script src="{$template}/assets/js/modernizr.min.js"></script>
<script src="{$template}/assets/js/popper.min.js"></script>
<script src="{$template}/assets/js/bootstrap.min.js"></script>

<script src="{$template}/assets/js/swiper-bundle.min.js"></script>
<script src="{$template}/assets/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Custom -->
<script src="{$template}/assets/js/main.js{$lastModify}"></script> 
<script type="text/javascript">var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;</script> 

<!-- JS PDPA -->
<script src="{$template}/assets/js/cookie.js{$lastModify}"></script>
<script src="{$template}/assets/js/pdpa.js{$lastModify}"></script>


{strip}
    {if {$assignjs|default:null}}
        {foreach $assignjs as $addAssetScript}
            {$addAssetScript}
        {/foreach}
    {/if}
{/strip}