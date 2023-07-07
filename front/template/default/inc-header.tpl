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
        <meta name="keywords" content="{$seo.keyword|default:$lang['seo:keywords']}" />
        <meta name="description" content="{$seo.desc|default:$lang['seo:description']}" />
        <meta name='language' content='TH'>

        {assign  var=valLinkImgSeo value="{$base}{$template}/public/image/nopic/noFb.jpg{$setVersionTemp}"}
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
        <link rel="apple-touch-icon" sizes="60x60" href="{$template}/public/image/icon/apple-icon-60x60.png{$setVersionTemp}">
        <link rel="apple-touch-icon" sizes="76x76" href="{$template}/public/image/icon/apple-icon-76x76.png{$setVersionTemp}">
        <link rel="apple-touch-icon" sizes="120x120" href="{$template}/public/image/icon/apple-icon-120x120.png{$setVersionTemp}">
        <link rel="apple-touch-icon" sizes="152x152" href="{$template}/public/image/icon/apple-icon-152x152.png{$setVersionTemp}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{$template}/public/image/icon/android-icon-192x192.png{$setVersionTemp}">
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
        <link rel="stylesheet" type="text/css" href="{$template}/assets/css/feather.css{$setVersionTemp}" />
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
        {* <link rel="stylesheet" type="text/css" href="{$template}/public/css/front-qa-new.css{$setVersionTemp}" /> *}
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/complaint-table.css{$setVersionTemp}" />
        
        <link rel="stylesheet" type="text/css" href="{$template}/public/component/datatable/datatables.min.css{$setVersionTemp}" />

        <link rel="stylesheet" type="text/css" href="{$template}/public/css/wg-dataCmsg.css{$setVersionTemp}" />

        <!-- Plugin -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Dev -->
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/developer.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/pdpa.css{$setVersionTemp}" />
        {if {$assigncss|default:null}}
            {strip}
                {foreach $assigncss as $addAssetCss}
                    {$addAssetCss}
                {/foreach}
            {/strip}
        {/if}
		<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

         <!-- G-Dev -->
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/g-dev.css{$setVersionTemp}" />
        <link rel="stylesheet" type="text/css" href="{$template}/public/css/g-responsive.css{$setVersionTemp}" />
    </head>

    <body>
	
	
	{* <div class="alert alert-dismissible fade in boxdestopsite" role="alert"> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
		{if $viewport == 'desktop'}
			เรียกดูเว็บไซต์ขนาดมือถือ <a href="{$fullurl}{$urlsymbol}viewport=auto" id="destopsite" class="link">คลิก</a>
		{else}
			เรียกดูเว็บไซต์แบบเด็สก์ท็อป <a href="{$fullurl}{$urlsymbol}viewport=desktop" id="destopsite" class="link">คลิก</a>
		{/if}

	</div> *}
	
	
			{*<div class="row">
				<div class="container boxdestopsite " >
					<div class="text-center">
					{if $viewport == 'desktop'}
						<a href="{$fullurl}{$urlsymbol}viewport=auto" id="destopsite" class="btn  btn-medium btn-primary">เรียกดูเว็บไซต์ขนาดมือถือ</a>
					{else}
					  <a href="{$fullurl}{$urlsymbol}viewport=desktop" id="destopsite" class="btn  btn-medium btn-primary">เรียกดูเว็บไซต์แบบเด็สก์ท็อป</a>
					{/if}
				  </div>
				</div>
			</div>*}


        <div class="site-body">
            <div class="sitekey" data-id="{$sitekey}"></div>
            <header class="site-header" style="display: none;">

                <div class="site-header-topbar">
                    <div class="container">
                        <div class="brand">
                            <a href="{$ul}/home" title="กรมทรัพยากรทางทะเลและชายฝั่ง Department of Marine and Coastal Resources, Thailand">
                                <img src="{$template}/public/image/asset/brand.png{$setVersionTemp}?v=20180925" title="กรมทรัพยากรทางทะเลและชายฝั่ง Department of Marine and Coastal Resources, Thailand" alt="กรมทรัพยากรทางทะเลและชายฝั่ง Department of Marine and Coastal Resources, Thailand">
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{$ul}/home" class="brand-txt" title="กรมทรัพยากรทางทะเลและชายฝั่ง Department of Marine and Coastal Resources, Thailand">
                                    <strong>กรมทรัพยากรทางทะเลและชายฝั่ง</strong>
                                    Department of Marine and Coastal Resources
                                </a>
                            </div>
                            <div class="col-md-6">
                                <div class="nav-wrapper">
                                    <div class="nav-mobile visible-sm visible-xs">
                                        <div class="menu-mobile-btn">
                                            <a href="javascript:void(0);" class="btn-mobile">
                                                <span class="bar"></span>
                                                <span class="bar"></span>
                                                <span class="bar"></span>
                                                <span class="bar"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="nav-link">
                                        <ul>
                                            <li><a href="{$ul}/sitemap" title="Sitemap">sitemap</a></li>
                                            <li><a href="{$ul}/board" title="Forum">forum</a></li>
                                        </ul>
                                    </div>


                                    <!-- <div class="nav-member">
                                        <a href="{$ul}/member" class="wrapper">
                                            <div class="thumb">
                                    {if $login|default:''}
                                        <figure class="cover-bg" style="background-image: url('{$userinfo.member_info.6|fileinclude:"pictures":{$userinfo.member_info.5}:"link"}');"></figure>
                                    {else}
                                        <figure class="cover-bg" style="background-image: url('{$template}/public/image/asset/avatar-default.jpg{$setVersionTemp}');"></figure>
                                    {/if}
                                </div>
                                <div class="title">{if $login|default:''}{$userinfo.member_info.1}{else}Member{/if}</div>
                            </a>
                        </div> -->

                                    <div class="nav-member dropdown">
                                        <a {if $login|default:''} href="javascript:void(0);" data-toggle="dropdown"{else} href="{$ul}/member" {/if} class="wrapper" title="Member">
                                            <div class="thumb">
                                                {if $login|default:''}
                                                    <figure class="cover-bg" style="background-image: url('{$userinfo.member_info.6|fileinclude:"pictures":{$userinfo.member_info.5}:"link"}');"></figure>
                                                    {else}
                                                    <figure class="cover-bg" style="background-image: url('{$template}/public/image/asset/avatar-default.jpg{$setVersionTemp}');"></figure>
                                                    {/if}
                                            </div>
                                            <div class="title">{if $login|default:''}{$userinfo.member_info.1}{else}Member{/if}</div>
                                        </a>
                                        {if $login|default:''}
                                            <ul class="dropdown-menu">
                                                <li><a href="{$ul}/member/customer/profile">ข้อมูส่วนตัว</a></li>
                                                <li><a href="{$ul}/member/customer/board">กระทู้ส่วนตัว</a></li>
                                                <li><a href="{$ul}/member/logout">ออกจากระบบ</a></li>
                                            </ul>
                                        {/if}
                                    </div>

                                    <div class="nav-size">
                                        <label class="control-label">ขนาด</label> 
                                        <ul>
                                            <li><a href="javascript:void(0);" id="theme-style-1" title="ขนาดอักษรเล็ก" class="nav-size-small fzSmall active">ก</a></li>
                                            <li><a href="javascript:void(0);" id="theme-style-2" title="ขนาดอักษรกลาง" class="nav-size-medium fzMedium">ก</a></li>
                                            <li><a href="javascript:void(0);" id="theme-style-3" title="ขนาดอักษรใหญ่" class="nav-size-large fzLarge">ก</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="site-header-main">
                    <div class="container">
                        <div class="brand">
                            <a href="{$ul}/home" title="กรมทรัพยากรทางทะเลและชายฝั่ง Department of Marine and Coastal Resources, Thailand">
                                <img src="{$template}/public/image/asset/brand.png{$setVersionTemp}" title="กรมทรัพยากรทางทะเลและชายฝั่ง Department of Marine and Coastal Resources, Thailand" alt="กรมทรัพยากรทางทะเลและชายฝั่ง Department of Marine and Coastal Resources, Thailand">
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                {foreach $infoMenuGroup as $MenuGroup}
                                    {$active = "/"|explode:$MenuGroup.url}
                                    <li class="dropdown {if $navactive == $active[3]} active {/if}">
                                        <!-- <a {if $MenuGroup.title eq 'Home'} href="{$ul}/home" {else} href="javascript:void(0)" data-toggle="dropdown" {/if} >
                                        {* <img style="width:2%;hight:2%" src="{$MenuGroup.pic|fileinclude:"pictures": {$MenuGroup.masterkey}:"link"}"/> *}
                                            {$MenuGroup.subject}
                                            <small>{$MenuGroup.title}</small>
                                        </a> -->
                                        {$infoMenu = callMenu($MenuGroup.masterkey,$MenuGroup.id)}
                                        {if $infoMenu->_numOfRows == 0}
                                            <a href="{$MenuGroup.url|checkLink}" target="{$MenuGroup.target|checkTarget:$MenuGroup.url}">
                                            {* <img style="width:2%;hight:2%" src="{$MenuGroup.pic|fileinclude:"pictures": {$MenuGroup.masterkey}:"link"}"/> *}
                                                {$MenuGroup.subject}
                                                <small>{$MenuGroup.title}</small>
                                            </a>
                                        {else}
                                            <a href="{$MenuGroup.url|checkLink}" target="{$MenuGroup.target|checkTarget:$MenuGroup.url}" data-toggle="dropdown">
                                            {* <img style="width:2%;hight:2%" src="{$MenuGroup.pic|fileinclude:"pictures": {$MenuGroup.masterkey}:"link"}"/> *}
                                                {$MenuGroup.subject}
                                                <small>{$MenuGroup.title}</small>
                                            </a>
                                            <div class="dropdown-menu">
                                                <div class="container">
                                                    <div class="row-table vlign-top">
                                                        <div class="col-auto">
                                                            <div class="cover">
                                                                <img src="{$MenuGroup.pic|fileinclude:"pictures": {$MenuGroup.masterkey}:"link"}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="submenu {if $MenuGroup.columns != ''} {$MenuGroup.columns} {/if}">
                                                                {* <a class="" href="{$MenuGroup.url|checkLink}" target="{$MenuGroup.target|checkTarget:$MenuGroup.url}" title="{$MenuGroup.subject}">
                                                                    <div class="topic">
                                                                        {$MenuGroup.subject}
                                                                    </div>
                                                                </a> *}
                                                                <a class="topic" href="{$MenuGroup.url|checkLink}" target="{$MenuGroup.target|checkTarget:$MenuGroup.url}" title="{$MenuGroup.subject}">
                                                                    {$MenuGroup.subject}
                                                                </a>
                                                                <div class="line1"></div>
                                                                <div class="line2"></div>
                                                                <div class="line3"></div>
                                                                <div class="menu mcscroll">
                                                                    <ul class="nav-list">
                                                                        {foreach $infoMenu as $Menu}
                                                                            <li>
                                                                                <a class="link" href="{$Menu.url|checkLink}" target="{$Menu.target|checkTarget:$Menu.url}" title="{$Menu.subject}">
                                                                                    {$Menu.subject}
                                                                                </a>
                                                                            </li>
                                                                        {/foreach}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {/if}
                                    </li>
                                {/foreach}

                                {* <li {if $navactive == 'home'}  class="active" {/if}>
                                    <a href="{$ul}/home" title="หน้าแรก">
                                        หน้าแรก
                                        <small>Home</small>
                                    </a>
                                </li>
                                <li {if $navactive == 'aboutus'}  class="active" {/if}>
                                    <a href="{$ul}/aboutus" title="เกี่ยวกับเรา">
                                        เกี่ยวกับเรา
                                        <small>About Us</small>
                                    </a>
                                </li>
                                <li {if $navactive == 'newsAll'}  class="active" {/if}>
                                    <a href="{$ul}/newsAll" title="ข่าวสาร">
                                        ข่าวสาร
                                        <small>News</small>
                                    </a>
                                </li>
                                <li {if $navactive == 'information'}  class="active" {/if}>
                                    <a href="{$ul}/information" title="สารสนเทศ">
                                        สารสนเทศ
                                        <small>Information</small>
                                    </a>
                                </li>
                                <li {if $navactive == 'libraryAll'}  class="active" {/if}>
                                    <a href="{$ul}/document" title="เอกสารเผยแพร่">
                                        เอกสารเผยแพร่
                                        <small>Publications</small>
                                    </a>
                                </li>
                                <li {if $navactive == 'multimedia'}  class="active" {/if}>
                                    <a href="{$ul}/multimedia" title="สื่อ ทช.">
                                        สื่อ ทช.
                                        <small>Multimedia</small>
                                    </a>
                                </li>
                                <li {if $navactive == 'contact'}  class="active" {/if}>
                                    <a href="{$ul}/contact" title="ติดต่อเรา">
                                        ติดต่อเรา
                                        <small>Contact Us</small>
                                    </a>
                                </li> *}
                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="top-graphic">
                    <div class="owl-carousel">
                        {foreach $callTGP as $listTGP}
                            <div class="item">
                                {if $listTGP.5 neq '#'} {$linkTGP = $listTGP.5} {else} {$linkTGP = 'javascript:void(0);'} {/if}
                                <a href="{$linkTGP}" title="{$listTGP.2}" class="wrapper" {if $listTGP.5 neq '#' && $listTGP.6 eq 2} target="_blank" {/if}>
                                    <figure class="cover-bg" style="background-image: url('{$listTGP.4|fileinclude:"real":{$listTGP.1}:"link"}?v=20181112');"></figure>
                                </a>
                            </div>
                        {/foreach}
                    </div>
                </div>

                <div class="header-bar">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="brand">
                                    <div class="wrapper">
                                        <div class="thumb">
                                            <figure>
                                                <a href="http://marinegiscenter.dmcr.go.th"><img src="{$template}/public/image/asset/qr-code.png{$setVersionTemp}" alt=""></a>
                                            </figure>
                                        </div>
                                        <div class="inner">
                                            <div class="title">กรมทรัพยากรทางทะเลและชายฝั่ง</div>
                                            <div class="desc">Department of Marine and Coastal Resources</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobileapp">
                                    <a href="https://www.dmcr.go.th/itcenter/detailAll/358/nw" class="wrapper" target="_blank" title="Download DMCR Moblie Applcations">
                                        <div class="desc">DOWNLOAD</div>
                                        <div class="title">DMCR</div>
                                        <div class="desc">MOBLIE <strong>APPLICATIONS</strong></div>
                                        <span class="fa fa-angle-right"></span>
                                    </a>
                                  {*   <a href="http://www.dmcr.go.th/itcenter/detail.php?WP=nKq4oaOCoMO3hHmtoHEaFKEenFM4BUN1oGA3G0lDooya4UERnHy4Ljo7o3Qo7o3Q" class="wrapper" target="_blank" title="Download DMCR Moblie Applcations">
                                        <div class="desc">DOWNLOAD</div>
                                        <div class="title">DMCR</div>
                                        <div class="desc">MOBLIE <strong>APPLICATIONS</strong></div>
                                        <span class="fa fa-angle-right"></span>
                                    </a> *}
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12">
                                <div class="search">
                                    <form class="form-default" action="{$ul}/search" method="GET" data-toggle="validator">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <label class="control-label">search</label>
                                            </div>
                                            <input class="form-control" type="text" name="keywords" value="{$keywords}" placeholder="ค้นหา" required>
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary" type="submit" title="ค้นหา">
                                                    <span class="fa fa-search"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 
                <div class="site-header-navicate" style="background-color: #eee;">
                    <div class="container">
                        <div class="col-xs-12 col-sm-6">
                            <ul>
                                <li><div class="iconhome fa fa-home" aria-hidden="true"></div></li>
                                <li><a href="{$ul}/newpage">หน้าแรก</a></li>
                                <li><a href="{$ul}/newpage">DMCR NEWPAGE</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            {if $nameLogin|default:null}
                                <p class="member_info">
                                    คุณ {$nameLogin} | <a href='{$ul}/newpage?step=logout'>Logout?</a>
                                </p>
                            {/if}
                        </div>
                    </div>
                </div> 
                -->
            </header>

            <header class="site-header">
                <div class="header">
                    <div class="topbar">
                        <div class="container">
                            <div class="logo">
                                <div class="row-table">
                                    <div class="col-auto">
                                        <div data-aos="fade-right" data-aos-once="true">
                                            <div class="thumb">
                                                <a href="{$ul}" class="link">
                                                    <img class="lazy" src="{$template}/assets/img/static/brand.png" alt="dmcr">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="content" data-aos="zoom-in" data-aos-once="true">
                                            <div class="title">
                                                ระบบลงทะเบียนออนไลน์ <br> DMCR REGISTRATION
                                            </div>
                                            <div class="desc">
                                                กรมทรัพยากรทางทะเลและชายฝั่ง
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="language">
                                <div class="dropdown">
                                    <div class="translate">
                                        <div id="google_translate_element"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-size">
                                <div class="txt" data-aos="fade-right" data-aos-once="true">ขนาดอักษร</div>
                                <ul class="item-list" data-aos="fade-left" data-aos-once="true">
                                    <li class="sm active"><a href="javascript:void(0)" class="link size-small">ก</a></li>
                                    <li class="md "><a href="javascript:void(0)" class="link size-medium">ก</a></li>
                                    <li class="lg "><a href="javascript:void(0)" class="link size-large">ก</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <div class="top-header">
                <div class="mainbar">
                    <div class="mbg-top"></div>
                    <div class="container">
                        <div class="action" data-aos="fade-left" data-aos-delay="300" data-aos-once="true">
                            <a href="https://www.dmcr.go.th" class="btn-home" target="_blank">เข้าสู่เว็บ ทช.</a>
                        </div>
                    </div>
                    <div class="main-slider" data-aos="fade-zoom-in" data-aos-once="true">
                    {foreach from=$callTGP item=listTGP }
                        <div class="item">
                            <a href="{$listTGP.url|checkLink}" target="{$listTGP.target|checkTarget:$listTGP.url}">
                            <figure class="cover" style="background-image: url({$listTGP.pic|fileinclude:"real":{$listTGP.masterkey}:"link"});"></figure>
                            </a>
                        </div>
                    {/foreach}
                    </div>
                    <div class="mbg-bottom"></div>
                </div>
            </div>