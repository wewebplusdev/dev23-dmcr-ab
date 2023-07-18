<!-- Core -->
<script src="{$template}/assets/js/libs/jquery-2.2.4.js"></script>
<script src="{$template}/assets/js/libs/jquery.easing.min.js"></script>
<script src="{$template}/assets/js/libs/jquery.lazyload.min.js"></script>
<script src="{$template}/assets/js/libs/modernizr.min.js"></script>
<script src="{$template}/assets/js/libs/bootstrap.min.js"></script>
<script src="{$template}/assets/js/libs/popper.min.js"></script>
<script src="{$template}/assets/js/libs/sweetalert.min.js"></script>
<script src="{$template}/assets/js/libs/validator.min.js"></script>

<!-- Custom -->
<script src="{$template}/assets/js/main.js{$modify}"></script>
<script type="text/javascript">var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
{strip}
    {if {$assignjs|default:null}}
        {foreach $assignjs as $addAssetScript}
            {$addAssetScript}
        {/foreach}
    {/if}
{/strip}