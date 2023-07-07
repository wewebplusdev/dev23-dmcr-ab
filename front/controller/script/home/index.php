<?php
$menuActive = "home";

//API//
/*## Start SEO #####*/
$seo_desc = "";
$seo_title = $lang['menu']['home'];
$seo_keyword = "";
Seo($seo_title, $seo_desc, $seo_keyword, $seo_pic);
/*## End SEO #####*/

$settingPage = array(
  "page" => $menuActive,
  "template" => "index.tpl",
  "display" => "page"
);

$smarty->assign("menuActive", $menuActive);
$smarty->assign("menu_client", true);
$smarty->assign("fileInclude", $settingPage);
