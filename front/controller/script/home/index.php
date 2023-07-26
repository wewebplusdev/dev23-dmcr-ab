<?php
$menuActive = "home";
$listjs[] = '<script type="text/javascript" src="front/controller/script/'.$menuActive.'/js/script.js'."?u=".date("ydmhis").'"></script>';
$homePage = new homePage;
################# Start get count RSS #####################
$rssSet = array();
$rssSet['Coral']['NavLv1'] = 'ฐานข้อมูลปะการังเทียม';
$rssSet['Coral']['valTxtTitle'] = 'ปะการังเทียม';
$rssCoral = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=coral_artificial&type=count');
$rssSet['Coral']['count'] = (int) $rssCoral->channel->item[0]->count;

$rssSet['floating']['NavLv1'] = 'ฐานข้อมูลทุ่นในทะเล';
$rssSet['floating']['valTxtTitle'] = 'ทุ่นในทะเล';
$rssfloating = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=floating&type=count');
$rssSet['floating']['count'] = (int) $rssfloating->channel->item[0]->count;

$rssSet['sinkship']['NavLv1'] = 'ฐานข้อมูลจุดวางเรือ(อุทยานใต้ทะเล)';
$rssSet['sinkship']['valTxtTitle'] = 'จุดวางเรือ';
$rsssinkship = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=sinkship&type=count');
$rssSet['sinkship']['count'] = (int) $rsssinkship->channel->item[0]->count;

$smarty->assign("rss", $rssSet);
################# End get count RSS #####################

################# Start get RSS Prov #####################
$rssProv = array();
$rssProv['Coral']['NavLv1'] = "ฐานข้อมูลปะการังเทียม";
$rssProv['Coral']['valTxtTitle'] = 'ปะการังเทียม';
$rssc = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=coral_artificial&type=prov');
foreach ($rssc->xpath('/rss/channel/item') as $KeyRssc => $valueRssc){
    $rssProv['Coral']['item'][$KeyRssc]['prov_th'] = empty((String) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (String) $valueRssc->prov_th;
    $rssProv['Coral']['item'][$KeyRssc]['coral']['count'] = (int) $valueRssc->count;
    $rssProv['Coral']['item'][$KeyRssc]['coral']['link'] = (String) $valueRssc->link;
    $rssProv['Coral']['item'][$KeyRssc]['coral']['linkmap'] = (String) $valueRssc->linkmap;
}

$rssProv['floating']['NavLv1'] = "ฐานข้อมูลทุ่นในทะเล";
$rssProv['floating']['valTxtTitle'] = 'ทุ่นในทะเล';
$rssf = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=floating&type=prov');
foreach ($rssf->xpath('/rss/channel/item') as $KeyRssc => $valueRssc){
    $rssProv['floating']['item'][$KeyRssc]['prov_th'] = empty((String) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (String) $valueRssc->prov_th;
    $rssProv['floating']['item'][$KeyRssc]['floating']['count'] = (int) $valueRssc->count;
    $rssProv['floating']['item'][$KeyRssc]['floating']['link'] = (String) $valueRssc->link;
    $rssProv['floating']['item'][$KeyRssc]['floating']['linkmap'] = (String) $valueRssc->linkmap;
}
$rssProv['sinkship']['NavLv1'] = "ฐานข้อมูลจุดจมเรือ(อุทยานใต้ทะเล)";
$rssProv['sinkship']['valTxtTitle'] = 'จุดจมเรือ(อุทยานใต้ทะเล)';
$rsss = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=sinkship&type=prov');
foreach ($rsss->xpath('/rss/channel/item') as $KeyRssc => $valueRssc){
    $rssProv['sinkship']['item'][$KeyRssc]['prov_th'] = empty((String) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (String) $valueRssc->prov_th;
    $rssProv['sinkship']['item'][$KeyRssc]['sinkship']['count'] = (int) $valueRssc->count;
    $rssProv['sinkship']['item'][$KeyRssc]['sinkship']['link'] = (String) $valueRssc->link;
    $rssProv['sinkship']['item'][$KeyRssc]['sinkship']['linkmap'] = (String) $valueRssc->linkmap;
}
foreach (array_merge($rssProv['Coral']['item'], $rssProv['floating']['item'],$rssProv['sinkship']['item']) as $entry) {
    if (!isset($result[$entry['prov_th']])) {
        $result[$entry['prov_th']] = $entry;
    } else {
        foreach ($entry as $key => $value) {
            $result[$entry['prov_th']][$key] = $value;
        }
    }
}

$smarty->assign("rssProv", $result);
// print_pre($result);

################# End get RSS Prov #####################

    #### call province ####
    $province = $homePage->callprovince();
    $smarty->assign("province", $province);

    #### year ####
    $arryear = array();
    $year_real=date('Y');
    $year_end=$year_real-10;
    for($year_star=$year_real; $year_star>=$year_end; $year_star--){ 
        array_push($arryear,($year_star+543));
    }
    $smarty->assign("arryear", $arryear);

    #### call activity ####
    $ActivityLaist = $homePage->callActivity($config['activity']['masterkey']);
    $smarty->assign("ActivityLaist", $ActivityLaist);

     #### call vote ####
    $vote = $homePage->callVote($config['vote']['masterkey']);
    $smarty->assign("vote", $vote);
    if(!empty($vote)){
        $voteAns = $homePage->callVoteAns($config['vote']['masterkey'],$vote->fields['id']);
    }
    $smarty->assign("voteAns", $voteAns);

    #### call follow ####
    $FollowCoral = $homePage->callFollow($config['follow']['coral']['masterkey']);
    $smarty->assign("FollowCoral", $FollowCoral);
    $Followfloating = $homePage->callFollow($config['follow']['buoy']['masterkey']);
    $smarty->assign("Followfloating", $Followfloating);
    $Followsinkship = $homePage->callFollow($config['follow']['sinkpoint']['masterkey']);
    $smarty->assign("Followsinkship", $Followsinkship);

    #### call weblink ####
    $BannerList = $homePage->callBanner($config['weblink']['masterkey']);
    $smarty->assign("BannerList", $BannerList);

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
