<?php
$menuActive = "activity";
$activityPage = new activityPage;
$contentID = $url->segment[2];
switch ($url->segment[1]) {
    default:
    #### call activity ####
    $limit = 8;
    $ActivityList = $activityPage->callActivity($config['activity']['masterkey'],$page['on'],$limit);
    $smarty->assign("ActivityList", $ActivityList);
    
      $pagination['total'] = $ActivityList->_maxRecordCount;
      $pagination['totalpage'] = ceil(($pagination['total'] / $limit));
      $pagination['limit'] = $limit;
      $pagination['curent'] = $page['on'];
      $pagination['method'] = $page;

    /*## Start SEO #####*/
    $seo_desc = "";
    $seo_title = $lang["nav"]["activity"];
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
        if ($_COOKIE['VIEW_NEWS_' . $contentID]) {

        } else {
           setcookie("VIEW_NEWS_" . $contentID, true, time() + 300);
           $viewNews = updateView($contentID, $config['news']['masterkey']);
        }

    $ActivityDetail =  $activityPage->callActivityDetail($config['activity']['masterkey'],$contentID);
    $smarty->assign("ActivityDetail", $ActivityDetail->fields);

    $callalbum = Call_Album($contentID,$config['cms']['album']);
    $smarty->assign("callalbum", $callalbum);
    $callfile = Call_File($contentID,$config['cms']['file']);
    $smarty->assign("callfile", $callfile);


    /*## Start SEO #####*/
    $seo_desc = "";
    $seo_title = $lang["nav"]["activity"];
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
$smarty->assign("menu_home",true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header.tpl");
$smarty->assign("footer", "inc-footer.tpl");
