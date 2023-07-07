<!DOCTYPE html>
<html lang="th">
<head>
    <base href="{$base}" >
    <meta charset="utf-8">
    <title>{$seo.title|default:$lang['seo:title']}</title>
    {if $viewport == "desktop"}
        <meta name="viewport" content="width=1360">
    {else}
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    {/if}
    <meta name="copyright" content="DMCR" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{$seo.keyword|default:$lang['seo:keywords']}">
    <meta name="description" content="{$seo.desc|default:$lang['seo:description']}">
    <meta name="author" content="">
    <meta name="HandheldFriendly" content="true">
    <meta name="format-detection" content="telephone=no">
    <!-- META OPEN GRAPH (FB) -->
    {assign  var=valLinkImgSeo value="{$base}{$template}/public/image/nopic/noFb.jpg{$setVersionTemp}"}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{$fullurl}">
    <meta property="og:title" content="{$seo.title|default:$lang['seo:title']}">
    <meta property="og:description" content="{$seo.desc|default:$lang['seo:description']}">
    <meta property="og:image" content="{$valSeoImages|default:$valLinkImgSeo}">
    <meta property="og:site_name" content="{$lang['site:fullName']}">
    <meta property="og:locale" content="">
    <meta property="og:locale:alternate" content="">

    <!-- TWITTER CARD -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:url" content="">
    <meta name="twitter:image:src" content="">

    <!-- ICONS -->
    <link rel="shortcut icon" href="{$template}/publicminisite/favicon/favicon.ico{$setVersionTemp}" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="57x57" href="{$template}/publicminisite/favicon/apple-icon-57x57.png{$setVersionTemp}">
    <link rel="apple-touch-icon" sizes="60x60" href="{$template}/publicminisite/favicon/apple-icon-60x60.png{$setVersionTemp}">
    <link rel="apple-touch-icon" sizes="72x72" href="{$template}/publicminisite/favicon/apple-icon-72x72.png{$setVersionTemp}">
    <link rel="apple-touch-icon" sizes="76x76" href="{$template}/publicminisite/favicon/apple-icon-76x76.png{$setVersionTemp}">
    <link rel="apple-touch-icon" sizes="114x114" href="{$template}/publicminisite/favicon/apple-icon-114x114.png{$setVersionTemp}">
    <link rel="apple-touch-icon" sizes="120x120" href="{$template}/publicminisite/favicon/apple-icon-120x120.png{$setVersionTemp}">
    <link rel="apple-touch-icon" sizes="144x144" href="{$template}/publicminisite/favicon/apple-icon-144x144.png{$setVersionTemp}">
    <link rel="apple-touch-icon" sizes="152x152" href="{$template}/publicminisite/favicon/apple-icon-152x152.png{$setVersionTemp}">
    <link rel="apple-touch-icon" sizes="180x180" href="{$template}/publicminisite/favicon/apple-icon-180x180.png{$setVersionTemp}">
    <link rel="icon" type="image/png" href="{$template}/publicminisite/favicon/favicon-16x16.png{$setVersionTemp}" sizes="16x16">
    <link rel="icon" type="image/png" href="{$template}/publicminisite/favicon/favicon-32x32.png{$setVersionTemp}" sizes="32x32">
    <link rel="icon" type="image/png" href="{$template}/publicminisite/favicon/favicon-96x96.png{$setVersionTemp}" sizes="96x96">
    <link rel="icon" type="image/png" href="{$template}/publicminisite/favicon/android-192x192.png{$setVersionTemp}" sizes="192x192">

    <!-- CSS SOURCE -->
    <link rel="stylesheet" type="text/css" href="{$template}/publicminisite/font/flaticon.css{$setVersionTemp}">
    <link rel="stylesheet" type="text/css" href="{$template}/publicminisite/css/import.css{$setVersionTemp}">
    <link rel="stylesheet" type="text/css" href="{$template}/publicminisite/css/source.css{$setVersionTemp}">

    <!-- CSS CONCAT -->
    <!-- <link rel="stylesheet" type="text/css" href="{$template}/publicminisite/css/style.concat.css"> -->

    <!-- CSS MODIFY -->
    <link rel="stylesheet" type="text/css" href="{$template}/publicminisite/css/modify.css{$setVersionTemp}">
    {if {$assigncss|default:null}}
        {strip}
            {foreach $assigncss as $addAssetCss}
                {$addAssetCss}
            {/foreach}
        {/strip}
    {/if}
    <script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
</head>
<body>
    <div class="global-container">
        {* <div id="preload">
            <div class="preload">
                <div class="logo">
                    <div class="loader"></div>
                    <img class="lazy" src="{$template}/publicminisite/img/static/brand.png{$setVersionTemp}" alt="dmcr">
                </div>
            </div>
        </div> *}
        <header class="site-header">
            <div class="header">
                <div class="topbar">
                    <div class="container">
                        <div class="text-size">
                            <div class="txt">ขนาดอักษร</div>
                            <ul class="item-list">
                                <li class="sm active"><a href="javascript:void(0)" class="link size-small">ก</a></li>
                                <li class="md"><a href="javascript:void(0)" class="link size-medium">ก</a></li>
                                <li class="lg"><a href="javascript:void(0)" class="link size-large">ก</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="navbar">
                    <div class="container">
                        <div class="row row-0 fluid">
                            <div class="col-auto">
                                <div class="logo">
                                    <div class="row-table">
                                        <div class="col-auto">
                                            <div class="thumb">
                                                <a href="{$ul}/miniprojects/{$projectId}" class="link">
                                                    <img class="lazy" src="{$template}/publicminisite/img/static/brand.png{$setVersionTemp}" alt="dmcr">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="content">
                                                <h4 class="title">
                                                    {$infoContact->fields['subject']}
                                                </h4>
                                                {* <h6 class="desc">{$infoContact->fields['description']|nl2br}</h6> *}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="menu-box">
                                    <div class="menu-mobile-btn">
                                        <a href="javascript:void(0);" class="btn-mobile" data-toggle="menu-mobile">
                                            <span class="bar active"></span>
                                            <span class="bar active"></span>
                                            <span class="bar active"></span>
                                            <span class="bar active"></span>
                                        </a>
                                    </div>
                                    <nav class="menu">
                                        <ul class="nav-list">
                                            <li class="nav-home">
                                                <a href="{$ul}/miniprojects/{$projectId}/home" class="link">
                                                    หน้าแรก
                                                    <small>Home</small>
                                                </a>
                                            </li>
                                            
                                            
                                            {foreach $allMenuMod as $keys => $listMenu}
                                            {if $keys eq 'description' || $keys eq 'news' || $keys eq 'download'}
                                                <li class="nav-{strtolower($listMenu.name_en)} dropdown">
                                                    <a href="javascript:void(0)" class="link dropdown-toggle" data-toggle="dropdown">
                                                        {$listMenu.name_th}
                                                        <small>{$listMenu.name_en}</small>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <div class="thumb">
                                                                        <figure class="contain">
                                                                            <img class="lazy" src="{$template}/publicminisite/img/upload/sub-m.png" alt="{$listMenu.name_th}">
                                                                        </figure>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <ul class="nav-list">
                                                                        {* <li class="active"><a href="about.php" class="link">submenu</a></li> *}
                                                                        {if $keys eq 'description'}
                                                                            {foreach from=$menuAbout item=listAbout}
                                                                            <li {$listAbout.active}><a href="{$ul}/miniprojects/{$projectId}/description/{$listAbout.id}" class="link">{$listAbout.subject}</a></li>
                                                                            {/foreach}
                                                                        {elseif $keys eq 'news'}
                                                                            {foreach from=$menuNews item=listNews}
                                                                            <li {$listNews.active}><a href="{$ul}/miniprojects/{$projectId}/news/{$listNews.id}" class="link">{$listNews.subject}</a></li>
                                                                            {/foreach}
                                                                        {elseif $keys eq 'download'}
                                                                            {foreach from=$menuDownload item=listDownload}
                                                                            <li {$listDownload.active}><a href="{$ul}/miniprojects/{$projectId}/download/{$listDownload.id}" class="link">{$listDownload.subject}</a></li>
                                                                            {/foreach}
                                                                        {/if}
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            {else}
                                                <li class="nav-{strtolower($listMenu.name_en)}">
                                                    <a href="{$ul}/{$listMenu.url}" class="link">
                                                        {$listMenu.name_th}
                                                        <small>{$listMenu.name_en}</small>
                                                    </a>
                                                </li>
                                            {/if}
                                            {/foreach}

                                            <li class="nav-contact">
                                                <a href="{$ul}/miniprojects/{$projectId}/contact" class="link">
                                                    ติดต่อเรา
                                                    <small>Contact us</small>
                                                </a>
                                            </li>
                                            <li class="search-box">
                                                <div class="nav-search">
                                                    <div class="search-form">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <a href="javascript:void(0)" class="link">
                                                                    <span class="feather icon-search"></span>
                                                                </a>
                                                            </div>
                                                            <form action="{$ul}/miniprojects/{$projectId}/search" method="GET">
                                                                <label for="nav-search-form" style="display: none;">Search</label> 
                                                                <input class="form-control" id="nav-search-form" name="keywords" type="search" placeholder="Search">
                                                                <button class="submit btn btn-primary" type="submit"><span class="feather icon-search"></span> SEARCH</button>
                                                            </form>
                                                        </div>
                                                        <a href="javascript:void(0)" class="icon-close close" title="close"></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-slider">
            {foreach $TGPProject as $listTGP}
                <div class="item image">
                    {if $listTGP.5 neq '#'} {$linkTGP = $listTGP.5} {else} {$linkTGP = 'javascript:void(0);'} {/if}
                    <a href="{$linkTGP}" title="{$listTGP.2}" class="link" {if $listTGP.5 neq '#' && $listTGP.6 eq 2} target="_blank" {/if}>
                        <div class="wrapper">
                            <figure class="cover">
                                <img class="lazy" src="{$listTGP.4|fileinclude:"real":{$listTGP.1}:"link"}" alt="top-graphic">
                            </figure>
                        </div>
                    </a>
                </div>
            {/foreach}
        </div>

