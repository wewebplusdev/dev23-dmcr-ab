<?php
$menuActive = "follow";
$listcss[] = '<link rel="stylesheet" type="text/css" href="front/template/default/public/css/front-qa-new.css' . "?u=" . date("YdmHis") . '" />';
$followPage = new followPage;
$contentID = $url->segment[2];
// print_pre($contentID);
switch ($url->segment[1]) {
    default:
    $req['masterkey'] = $_REQUEST['m'];
    $limit = 11;
    if (empty($req['masterkey'])){
        $req['masterkey'] = '1f';
    }
    $smarty->assign("masterkey", $req['masterkey']);
        
        $followListC = $followPage->callFollow($req['masterkey'],$page['on'],$limit);
        $smarty->assign("followListC", $followListC);


      $pagination['total'] = $followListC->_maxRecordCount;
      $pagination['totalpage'] = ceil(($pagination['total'] / $limit));
      $pagination['limit'] = $limit;
      $pagination['curent'] = $page['on'];
      $pagination['method'] = $page;

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $lang["nav"]["follow"];
        $seo_keyword = "";
        Seo($seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/

        

        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );
        break;
    case 'detail':
        $req['masterkey'] = $_REQUEST['m'];
        if ($_COOKIE['VIEW_NEWS_' . $contentID]) {

        } else {
           setcookie("VIEW_NEWS_" . $contentID, true, time() + 300);
           $viewNews = updateView($contentID, $req['masterkey']);
        }

        $followDetail =  $followPage->callFollowDetail($req['masterkey'],$contentID);
        $smarty->assign("followDetail", $followDetail->fields);

        $province = $followPage->callProvince($followDetail->fields['gid']);
        $smarty->assign("province", $province->fields['name']);

        $callalbum = Call_Album($contentID,$config['cms']['album']);
        $smarty->assign("callalbum", $callalbum);

        $callfile = Call_File($contentID,$config['cms']['file']);
        $smarty->assign("callfile", $callfile);

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = $lang["nav"]["follow"];
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
$smarty->assign("followPage", $followPage);
$smarty->assign("pagination", $pagination);
// $smarty->assign("menu_home", true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header.tpl");
$smarty->assign("footer", "inc-footer.tpl");
