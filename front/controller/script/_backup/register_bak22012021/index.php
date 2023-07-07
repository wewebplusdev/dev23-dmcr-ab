<?php
$menuActive = "register";
Seo($lang['seo']['title'], $lang['seo']['desc'], $lang['seo']['keyword']);
$listcss[] = '<link rel="stylesheet" type="text/css" href="front/template/default/public/css/front-qa-new.css'."?u=".date("YdmHis").'" />';


$smarty->assign('infoAbout', fncAbout());
// if(empty($infoQuestionare)){
//     header("Location:" . $linklang . "/home");
//     exit();
// }
// print_pre(date('H:i:s'));
// if ($url->segment[0] == 'register' && empty($url->segment[1])) {
    $limitnews = 13;
    $infoFormGroup = callFormGroup();
    $smarty->assign("infoFormGroup",$infoFormGroup);

    if (!empty($_GET['searchGroup'])) {
        $searchGroup = $_GET['searchGroup'];
    }else{
        $searchGroup = 0;
    }
    if (!empty($_GET['keyword'])) {
        $searchKeywords = $_GET['keyword'];
    }else{
        $searchKeywords = '';
    }
    $smarty->assign("searchGroup",$searchGroup);
    $smarty->assign("searchKeywords",$searchKeywords);
    $infoQuestionare = callFormMain('',$page['on'], $limitnews, $searchGroup, $searchKeywords);
    $smarty->assign("infoQuestionare",$infoQuestionare);
    $time = strtotime(date('H:i:s'));
    $dayreal = strtotime(date('Y-m-d'));

    $infoQuestionarePin = callFormMainPin();
    $smarty->assign("infoQuestionarePin",$infoQuestionarePin);

    // print_pre($infoQuestionarePin->_numOfRows);

    
    // print_pre(date('H:i:s', $time));
    $smarty->assign("dayreal",$dayreal);
    $smarty->assign("timeNow",$time);

    // print_pre($infoQuestionare);
    $settingPage = array(
        "page" => $menuActive,
        "template" => "index.tpl",
        "display" => "page"
    );
// }else{
//     header("Location:" . $linklang . "/information/intranet");
//     exit();
// }
##Detail
// if ($url->segment[1] == 'detail') {
// 	// require_once _DIR . '/front/controller/script/speciallist/detail.php';
//   $settingPage = array(
//       "page" => "questionare",
//       "template" => "detail.tpl",
//       "display" => "page"
//   );
// }

$smarty->assign("pagination", $pagination);
$smarty->assign("menu_home",true);
$smarty->assign("fileInclude", $settingPage);
$smarty->assign("header", "inc-header.tpl");
$smarty->assign("footer", "inc-footer.tpl");
