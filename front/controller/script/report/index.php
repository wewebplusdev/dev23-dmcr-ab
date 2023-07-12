<?php
$menuActive = "report";
Seo($lang['seo']['title'], $lang['seo']['desc'], $lang['seo']['keyword']);
$listcss[] = '<link rel="stylesheet" type="text/css" href="front/template/default/public/css/front-qa-new.css'."?u=".date("YdmHis").'" />';

    // print_pre($infoQuestionare);
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
