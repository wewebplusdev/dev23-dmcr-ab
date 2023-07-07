<?php
// $path_root = ""; #ถ้า root ไม่ได้อยู่ public
$path_root = "/dev23-dmcr-ab"; #ถ้า root ไม่ได้อยู่ public
// $path_root = "/edailyreport";
define("_http", "http");

if(_http == "http"){
	//$redirect= _http."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	//header("Location:$redirect");
	//exit();
}


define("_DIR", str_replace("\\", '/', dirname(__FILE__)));
define("_URI", basename($_SERVER["REQUEST_URI"]));
define("_URL", _http."://" . $_SERVER['HTTP_HOST'] . $path_root . "/");
define("_FullUrl",_http."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
define("_Domain",_http."://".$_SERVER['HTTP_HOST']);

require_once _DIR . '/front/libs/config.php'; #load config
require_once _DIR . '/front/libs/setting.php'; #load setting
require_once _DIR . '/front/libs/function.php'; #load function
require_once _DIR . '/front/libs/url.php'; #load url
require_once _DIR . '/front/libs/Mobile_Detect.php'; #load url

// print_pre($_SERVER);
// print_pre(_DIR);
// print_pre(str_replace(_DIR . '/', '', str_replace('//', '/', $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])));
// print_pre('xxx');die;
##check divice ##
$detectDivice = new Mobile_Detect;

   // print_pre($detectDivice);

## load modulus ##
#require_once _DIR . '/front/controller/modulus/breadcrumb.php'; #load breadcrumb
require_once _DIR . '/front/controller/modulus/member.php'; #load member status

## member ##
$member = new member;
if (isset($_SESSION[_URL]['token'])) {
    $member->tokenCheck();
} else {
    if (isset($_COOKIE['token']) && !isset($_SESSION[_URL]['reboot'])) {
        $member->reloadUser();
    } else {
        $member->tokenCreate();
    }
}
$memberID = $member->tokenGetUser();

## Core Cketitor #############################################
if (!empty($memberID['member_info'])) {
	$_SESSION["myFrontSession"] = $path_root."/ckeditor/upload/files/id_".$memberID['member_info'][0];
	$valFolderFrontCkEditor = "./ckeditor/upload/files/id_".$memberID['member_info'][0];
	if(!is_dir($valFolderFrontCkEditor)) { mkdir($valFolderFrontCkEditor,0777); }
	//print_pre($_SESSION["myFrontSession"]);
}

if (!empty($memberID['member_info'])) {
    $smarty->assign("userinfo", $memberID);
}
$member->saveCookie();

$memberLogin = method_exists($member, 'login_status') ? $member->login_status() : 0;

if (!empty($memberLogin)) {
    $smarty->assign("login", true);
} else {
    $smarty->assign("login", false);
}

## call page ##
$url = new url;

$linklang = configlang($url->pagelang[2]);
$smarty->assign("ul", $linklang);
$smarty->assign("langon", $url->pagelang[2]);
// print_pre($linklang);
// print_pre($linklang);
// print_pre(_Domain);

## 08/05/66 error this function pagepagination
$page = pagepagination($url);

$smarty->assign("cachdel",date("YmdHis"));

$smarty->assign("page", $page);


// Start viewport
// print_pre($url->uri);

if(!empty($url->uri['viewport'])){
    switch ($url->uri['viewport']){
        case 'desktop':
            $dataviewport = 'desktop';
            $dataviewportClick = 'auto';
            break;

        default:
            $dataviewport = 'auto';
            $dataviewportClick = 'desktop';
            break;
    }
$_SESSION['viewport']  = $dataviewport;
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
// print_pre($_SESSION['viewport']);
if(empty($url->uri)){
    $smarty->assign("urlsymbol","?");
}else{
    $smarty->assign("urlsymbol","&");
}
$smarty->assign("viewport",$_SESSION['viewport']);
// End viewport


##  lang ##
$lang = array();
require_once _DIR . '/front/libs/lang/' . $lang_default . '.php'; #load url
if ($lang_default != $url->pagelang[2]) {
    require_once _DIR . '/front/libs/lang/' . $url->pagelang[2] . '.php'; #load url
}


## addon page ##
$loadcate = $url->loadmodulus(array("_mainpage"));
foreach ($loadcate as $loadmodulus) {
    include_once $loadmodulus;
}

require_once _DIR . '/front/controller/script/_mainpage/index.php'; #load url

## load page ##
$pageload = $url->page();
foreach ($pageload['load'] as $loadpage) {
    include_once $loadpage;
}

if(empty($url->segment[0])){
    header("Location:" . $linklang . "/".$url_show_default);
    exit();
}

## popup ##
// print_pre($_SESSION['alert']);
if (!empty($_SESSION['alert'])) {
    $smarty->assign("alertpopup", $_SESSION['alert']);
}


# assign active menu
if (empty($menuActive)) {
   $menuActive = "home";
}

$smarty->assign("navactive", $menuActive);

$smarty->assign("lastModify", "?u=".date("YdmHis"));
$smarty->assign("home", $url_show_default);
$smarty->assign("lang", $lang);
$smarty->assign("assigncss", $listcss);
$smarty->assign("assignjs", $listjs);
$smarty->assign("template", $path_template[$templateweb][0]);
$smarty->assign("base", _URL);
$smarty->assign("fullurl", _FullUrl);
$smarty->assign("Domain", _Domain);

// print_pre($smarty);

if(!empty($settingPage)){

	// print_pre($settingPage['display']);
    
	$smarty->display($settingPage['display'] . ".tpl");
	// print_pre($url);
}
// $smarty->display("test.tpl");



$db->Close();


#==============================================================##
## page loadder sec ##
// $time = microtime();
// $time = explode(' ', $time);
// $time = $time[1] + $time[0];
// $finish = $time;
// $total_time = round(($finish - $start), 4);
// echo 'Page generated in '.$total_time.' seconds.';
