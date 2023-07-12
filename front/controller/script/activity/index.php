<?php
$menuActive = "activity";
$listcss[] = '<link rel="stylesheet" type="text/css" href="front/template/default/public/css/front-qa-new.css'."?u=".date("YdmHis").'" />';
$contentID = $url->segment[2];
switch ($url->segment[1]) {
    default:

    $settingPage = array(
        "page" => $menuActive,
        "template" => "index.tpl",
        "display" => "page"
    );
    break;
    case 'detail':

        $settingPage = array(
            "page" => $menuActive,
            "template" => "detail.tpl",
            "display" => "page"
        );
        break;
}


$smarty->assign("pagination", $pagination);
$smarty->assign("menu_home",true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header.tpl");
$smarty->assign("footer", "inc-footer.tpl");
