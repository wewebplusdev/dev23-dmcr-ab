<?php
$menuActive = "offer-demand";
$listcss[] = '<link rel="stylesheet" type="text/css" href="front/template/default/public/css/front-qa-new.css' . "?u=" . date("YdmHis") . '" />';
$listjs[] = '<script type="text/javascript" src="front/controller/script/' . $menuActive . '/js/script.js' . "?u=" . date("ydmhis") . '"></script>';
$listjs[] = '<script type="text/javascript" src="front/controller/script/' . $menuActive . '/js/ajaxfileupload.js' . "?u=" . date("ydmhis") . '"></script>';
$listjs[] = '<script type="text/javascript" src="front/controller/script/' . $menuActive . '/js/jquery.uploadfile.js' . "?u=" . date("ydmhis") . '"></script>';
$listjs[] = '<script type="text/javascript" src="front/controller/script/' . $menuActive . '/js/uploadfile.js' . "?u=" . date("ydmhis") . '"></script>';
$contentID = $url->segment[2];
$offerPage = new OfferPage;
switch ($url->segment[1]) {
    default:
    $listjs[] = '<script src="https://www.google.com/recaptcha/api.js?render='.$sitekey.'"></script>';

        $province = $offerPage->callProvince();
        $smarty->assign("province", $province);

        $callGroupType = $offerPage->callGroupType();
        $smarty->assign("grouptype", $callGroupType);

        $myid = rand(119, 999);
        $smarty->assign("myid",$myid);

        // $test = $offerPage->callDistricCODE('7079');
        // print_pre($test);

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $lang["nav"]["offer"];
        $seo_keyword = "";
        Seo($seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/



        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );
        break;
    case 'insert':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/insertform.php';
        break;
    case 'distric':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/distric.php';
        break;
    case 'amphur':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/amphur.php';
        break;
    case 'districcode':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/districCode.php';
        break;
    case 'deletefile':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/deleteFileInsert.php';
        break;
    case 'insertfile':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/loadInsertFile.php';
        break;
}

$smarty->assign("pagination", $pagination);
// $smarty->assign("menu_home", true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header.tpl");
$smarty->assign("footer", "inc-footer.tpl");
