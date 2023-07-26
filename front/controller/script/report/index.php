<?php
$menuActive = "report";
Seo($lang['seo']['title'], $lang['seo']['desc'], $lang['seo']['keyword']);
$listcss[] = '<link rel="stylesheet" type="text/css" href="front/template/default/public/css/front-qa-new.css' . "?u=" . date("YdmHis") . '" />';
$listjs[] = '<script type="text/javascript" src="front/controller/script/'.$menuActive.'/js/script.js'."?u=".date("ydmhis").'"></script>';

$req['masterkey'] = $_REQUEST['m'];
if (empty($req['masterkey'])) {
    $req['masterkey'] = '1f';
}
$smarty->assign("masterkey", $req['masterkey']);
################# Start get RSS Prov #####################
$rssProv = array();
if ($req['masterkey'] == '1f') {
    $rssProv['NavLv1'] = "ฐานข้อมูลปะการังเทียม";
    $rssProv['valTxtTitle'] = 'ปะการังเทียม';
    $rssc = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=coral_artificial&type=prov');
    foreach ($rssc->xpath('/rss/channel/item') as $KeyRssc => $valueRssc) {
        $rssProv['item'][$KeyRssc]['prov_th'] = empty((string) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (string) $valueRssc->prov_th;
        $rssProv['item'][$KeyRssc]['count'] = (int) $valueRssc->count;
        $rssProv['item'][$KeyRssc]['link'] = (string) $valueRssc->link;
        $rssProv['item'][$KeyRssc]['linkmap'] = (string) $valueRssc->linkmap;
    }
} elseif ($req['masterkey'] == '2f') {
    $rssProv['NavLv1'] = "ฐานข้อมูลทุ่นในทะเล";
    $rssProv['valTxtTitle'] = 'ทุ่นในทะเล';
    $rssf = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=floating&type=prov');
    foreach ($rssf->xpath('/rss/channel/item') as $KeyRssc => $valueRssc) {
        $rssProv['item'][$KeyRssc]['prov_th'] = empty((string) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (string) $valueRssc->prov_th;
        $rssProv['item'][$KeyRssc]['count'] = (int) $valueRssc->count;
        $rssProv['item'][$KeyRssc]['link'] = (string) $valueRssc->link;
        $rssProv['item'][$KeyRssc]['linkmap'] = (string) $valueRssc->linkmap;
    }
} elseif ($req['masterkey'] == '3f') {
    $rssProv['NavLv1'] = "ฐานข้อมูลจุดจมเรือ(อุทยานใต้ทะเล)";
    $rssProv['valTxtTitle'] = 'จุดวางเรือ';
    $rsss = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=sinkship&type=prov');
    foreach ($rsss->xpath('/rss/channel/item') as $KeyRssc => $valueRssc) {
        $rssProv['item'][$KeyRssc]['prov_th'] = empty((string) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (string) $valueRssc->prov_th;
        $rssProv['item'][$KeyRssc]['count'] = (int) $valueRssc->count;
        $rssProv['item'][$KeyRssc]['link'] = (string) $valueRssc->link;
        $rssProv['item'][$KeyRssc]['linkmap'] = (string) $valueRssc->linkmap;
    }
}
$smarty->assign("rssProv", $rssProv);

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
$smarty->assign("menu_home", true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header.tpl");
$smarty->assign("footer", "inc-footer.tpl");
