<?php
$menuActive = "report";
Seo($lang['seo']['title'], $lang['seo']['desc'], $lang['seo']['keyword']);
$listcss[] = '<link rel="stylesheet" type="text/css" href="front/template/default/public/css/front-qa-new.css'."?u=".date("YdmHis").'" />';

    /*## Start SEO #####*/
    $seo_desc = "";
    $seo_title = $lang["nav"]["report"];
    $seo_keyword = "";
    Seo($seo_title, $seo_desc, $seo_keyword, $seo_pic);
    /*## End SEO #####*/

    $settingPage = array(
        "page" => $menuActive,
        "template" => "index.tpl",
        "display" => "page"
    );


$smarty->assign("pagination", $pagination);
$smarty->assign("menu_home",true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header.tpl");
$smarty->assign("footer", "inc-footer.tpl");
