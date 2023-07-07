<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en-US" class="ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en-US" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="th">
    <!--<![endif]-->
    <head>
        <base href="{$base}" >
        <meta charset="utf-8">
        <title>{$seo.title|default:$lang['seo:title']}</title>
		{if $viewport == "desktop"}
		<meta name="viewport" content="width=1360">
		{else}
		 <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
		{/if}
		
		
        <meta name="copyright" content="DMCR" />
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="HandheldFriendly" content="True">
        <meta name="apple-touch-fullscreen" content="yes"/>
        <meta name="MobileOptimized" content="320">
        <meta name="keywords" content="{$seo.keyword|default:$lang['seo:description']}" />
        <meta name="description" content="{$seo.desc|default:$lang['seo:keywords']}" />
        <meta name='language' content='TH'>

        {assign  var=valLinkImgSeo value="{$base}{$template}/public/image/nopic/noFb.jpg"}
        <meta property="og:url" content="{$fullurl}" />
        <meta property="og:type" content="website"/>
        <meta property="og:image" content="{$valSeoImages|default:$valLinkImgSeo}" />
        <meta property="og:title" content="{$seo.title|default:$lang['seo:title']}" />
        <meta property="og:description" content="{$seo.desc|default:$lang['seo:description']}" />
        <meta property="og:site_name" content="{$lang['site:fullName']}" />
        <link rel="image_src"    href="{$valSeoImages|default:$valLinkImgSeo}" />

        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name ="format-detection" content = "telephone=no">
        <meta name="Rating" content="general" />
        <meta name="ROBOTS" content="index, follow" />
        <meta name="GOOGLEBOT" content="index, follow" />
        <meta name="FAST-WebCrawler" content="index, follow" />
        <meta name="Scooter" content="index, follow" />
        <meta name="Slurp" content="index, follow" />
        <meta name="REVISIT-AFTER" content="7 days" />
        <meta name="distribution" content="global" />

        <link rel="apple-touch-icon" sizes="60x60" href="{$template}/public/image/icon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{$template}/public/image/icon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="120x120" href="{$template}/public/image/icon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{$template}/public/image/icon/apple-icon-152x152.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="{$template}/public/image/icon/android-icon-192x192.png">
        <link rel="shortcut icon" type="image/x-icon" href="{$template}/public/image/icon/favicon.ico">


        <!-- Core -->
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/bootstrap.min.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/bootstrap-theme.min.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/animation.min.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/hover.min.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/reset.min.css{$setVersionTemp}" />

        <!-- Componant -->
        <link rel="stylesheet" type="text/css" href="{$template}/public/font/font.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/font/fontawesome.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/icon.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/component/mmenu-master/jquery.mmenu.all.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/component/select2/select2.min.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/component/owl-carousel/owl.carousel.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/component/owl-carousel/owl.theme.default.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/component/fancybox/jquery.fancybox.min.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/component/slick/slick.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/component/slick/slick-theme.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/component/mcustomscrollbar/jquery.mCustomScrollbar.min.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/component/percircle-master/percircle.css{$setVersionTemp}" />

        <!-- Main -->
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/jquery-ui.min.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/animation.min.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/default.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/front1.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/front2.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/front3.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/responsive-custom.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/responsive-custom2.css{$setVersionTemp}" />

        <!-- Dev -->
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/developer.css{$setVersionTemp}" />
        {if {$assigncss|default:null}}
            {strip}
                {foreach $assigncss as $addAssetCss}
                    {$addAssetCss}
                {/foreach}
            {/strip}
        {/if}
    </head>

    <body>


        