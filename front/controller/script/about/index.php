<?php
$menuActive = "about";
$listcss[] = '<link rel="stylesheet" type="text/css" href="front/template/default/public/css/front-qa-new.css'."?u=".date("YdmHis").'" />';
$aboutPage = new aboutPage;
$contentID = $url->segment[1];

    $callAboutGroup = $aboutPage->callAbout($config['about']['masterkey']);
    $smarty->assign("callAboutGroup", $callAboutGroup);

    if(empty($contentID) || $contentID == ''){
        $contentID = $callAboutGroup->fields['0'];
    }else{
        $contentID = $url->segment[1];
    }

    $callAboutDetail = $aboutPage->callAboutDetail($config['about']['masterkey'],$contentID);
    $smarty->assign("callAboutDetail", $callAboutDetail->fields);

    print_pre($callAboutDetail->fields);

    /*## Start SEO #####*/
    $seo_desc = "";
    $seo_title = $lang["nav"]["about"];
    $seo_keyword = "";
    Seo($seo_title, $seo_desc, $seo_keyword, $seo_pic);
    /*## End SEO #####*/

    $settingPage = array(
        "page" => $menuActive,
        "template" => "index.tpl",
        "display" => "page"
    );


$smarty->assign("pagination", $pagination);
$smarty->assign("contentID",$contentID);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header.tpl");
$smarty->assign("footer", "inc-footer.tpl");
