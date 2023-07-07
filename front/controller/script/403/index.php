<?php


$settingPage = array(
    "page" => "403",
    "template" => "index.tpl",
    "display" => "page"
);

$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "intro-header.tpl");
$smarty->assign("footer", "intro-footer.tpl");