<?php
$menuActive = "offer-demand";
$listcss[] = '<link rel="stylesheet" type="text/css" href="front/template/default/public/css/front-qa-new.css' . "?u=" . date("YdmHis") . '" />';
$contentID = $url->segment[2];
switch ($url->segment[1]) {
    default:
        

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $lang["nav"]["offer"] ;
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

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $lang["nav"]["offer"] ;
        $seo_keyword = "";
        Seo($seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/

        $settingPage = array(
            "page" => $menuActive,
            "template" => "detail.tpl",
            "display" => "page"
        );
        break;
}

$smarty->assign("pagination", $pagination);
// $smarty->assign("menu_home", true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header.tpl");
$smarty->assign("footer", "inc-footer.tpl");
