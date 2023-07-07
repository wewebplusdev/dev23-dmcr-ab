
<base href="{$base}">
<!-- <title>{$seo.title|default:$settingWeb.metatitle}</title> -->
<title>DMCR AB</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
{* <meta http-equiv="Content-Security-Policy" content="*"> *}
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
{* <meta name="viewport" content="width=1680"> *}
<meta name="keywords" content="{$seo.keyword|default:$settingWeb.keywords}" />
<meta name="description" content="{$seo.desc|default:$settingWeb.description}" />
<meta name="author" content="">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">
<meta name="icon_web" content="{$icon_web}">

<!-- META OPEN GRAPH (FB) -->
{assign  var=valLinkImgSeo value="{$template}/assets/img/static/social-fb.png"}
<meta property="og:type" content="website">
<meta property="og:url" content="{$fullurl}">
<meta property="og:title" content="{$valSeoTitle|default:$settingWeb.metatitle}">
<meta property="og:description" content="{$valSeoDescription|default:$settingWeb.description}">
<meta property="og:image" content="{$valSeoImages|default:$valLinkImgSeo}">
<meta property="og:site_name" content="">
<meta property="og:locale" content="">
<meta property="og:locale:alternate" content="">
<link rel="image_src" href="{$valSeoImages|default:$valLinkImgSeo}" />

<!-- TWITTER CARD -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="twitter:url" content="">
<meta name="twitter:image:src" content="">

<!-- ICONS -->
<link rel="shortcut icon" href="{$template}/assets/favicon/favicon.ico" type="image/x-icon"/> 
<link rel="apple-touch-icon" sizes="57x57" href="{$template}/assets/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="{$template}/assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="{$template}/assets/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="{$template}/assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="{$template}/assets/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="{$template}/assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="{$template}/assets/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="{$template}/assets/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="{$template}/assets/favicon/apple-icon-180x180.png"> 





