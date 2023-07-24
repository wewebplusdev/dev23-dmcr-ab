<?php
$menuActive = "search";
$listjs[] = '<script type="text/javascript" src="front/controller/script/'.$menuActive.'/js/script.js'."?u=".date("ydmhis").'"></script>';

$settingPage = array(
    "page" => $menuActive,
    "template" => "index.tpl",
    "display" => "page"
);


$smarty->assign("pagination", $pagination);
$smarty->assign("menu_home", true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header.tpl");
$smarty->assign("footer", "inc-footer.tpl");
