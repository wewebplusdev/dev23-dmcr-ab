<?php
// recaptcha v2
$sitekey = '6LeZ0OQeAAAAAIY6RetHSCs9To8U_ewnPafgMllU';
$secretkey = '6LeZ0OQeAAAAAD3lb4O6IHJIDeZLq8hGc-5UQvpM';
// // recaptcha v3
// $sitekey = '6LfH7xkeAAAAAPFz-fYiFvAIIVZP0aMQU6CCCdX6';
// $secretkey = '6LfH7xkeAAAAALzFVzS3VPGR4xAle6rfqX9U8a7v';
$smarty->assign("sitekey", $sitekey);
$smarty->assign("secretkey", $resultSetting->fields);

// if (!empty($memberLogin)) {
// // $profileMember = callProfileMember($config['member']['masterkey'],$memberID['member_info']['id']);
// // $smarty->assign("listProfile",$profileMember);
//     // print_pre($url);
//     $sql = "SELECT
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_id,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_masterkey,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_fname,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_lname,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_email,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_date,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_month,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_year,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_credate,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_logindate,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_status,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_pic,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_tel,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_sex,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_type,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_address,
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_lastdate
//
// FROM
//   " . $config['member']['db'] . "
// WHERE
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_masterkey = 'mem' and
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_status = 'Enable' and
//   " . $config['member']['db'] . "." . $config['member']['db'] . "_id = $memberID['member_info']['id']
//   ";
//
//
//
//
// //print_pre($sql);
//
//     $result = $db->execute($sql);
//     return $result;
//
// print_pre($result);
// }
$sqlSetting = "SELECT
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_subject as subject,
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_title as title,
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_subjectoffice as subjectoffice,
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_masterkey as masterkey,
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_description as description,
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_keywords as keywords,
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_metatitle as metatitle,
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_social as social,
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_config as config,
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_addresspic as addresspic,
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_qr as qr,
   " . $config['system']['setting'] . "." . $config['system']['setting'] . "_fac as fac
 FROM
   " . $config['system']['setting'] . "";
 $sqlSetting .= " where " . $config['system']['setting'] . "." . $config['system']['setting'] . "_masterkey = '" . $config['system']['setting:key'] . "'";
//print_pre($sqlSetting);
 $resultSetting = $db->execute($sqlSetting);
//print_pre($resultSetting);
 $smarty->assign("settingpage", $resultSetting->fields);
// // print_pre($resultSetting->fields);
//
// $sqlRelatelink = "SELECT
// " . $config['banner']['db'] . "." . $config['banner']['db'] . "_id,
// " . $config['banner']['db'] . "." . $config['banner']['db'] . "_masterkey,
// " . $config['banner']['db'] . "." . $config['banner']['db'] . "_subject,
// " . $config['banner']['db'] . "." . $config['banner']['db'] . "_title,
// " . $config['banner']['db'] . "." . $config['banner']['db'] . "_pic,
// " . $config['banner']['db'] . "." . $config['banner']['db'] . "_url
//
// FROM
// " . $config['banner']['db'] . "
// WHERE
// " . $config['banner']['db'] . "." . $config['banner']['db'] . "_masterkey = '".$config['banner']['masterkey'] ."' and
// " . $config['banner']['db'] . "." . $config['banner']['db'] . "_status = 'Home'
//
// ";
//   $sql .= "
// ORDER  BY " . $config['banner']['db'] . "." . $config['banner']['db'] . "_order DESC
// ";
// $resultRelatelink = $db->execute($sqlRelatelink);
// $smarty->assign("listrelatelink", $resultRelatelink);
//
//
// $langenews = $url->pagelang[3];
// function callGroupEnews($id){
// global $config, $db, $url;
//   $sqlenewsgroup = "SELECT
//   " . $config['e-news-group']['db'] . "." . $config['e-news-group']['db'] . "_id,
//   " . $config['e-news-group']['db'] . "." . $config['e-news-group']['db'] . "_masterkey,
//   " . $config['e-news-group']['db'] . "." . $config['e-news-group']['db'] . "_subject$langenews
//
//   FROM
//   " . $config['e-news-group']['db'] . "
//   WHERE
//   " . $config['e-news-group']['db'] . "." . $config['e-news-group']['db'] . "_masterkey = '".$config['e-news']['masterkey'] ."'
//   ";
//   if (!empty($id)) {
//     $sqlenewsgroup .= " AND " . $config['e-news-group']['db'] . "." . $config['e-news-group']['db'] . "_id = $id ";
//   }
//     $sqlenewsgroup .= "
//   ORDER  BY " . $config['e-news-group']['db'] . "." . $config['e-news-group']['db'] . "_order DESC
//   ";
//   $resultenewsgroup = $db->execute($sqlenewsgroup);
//   return $resultenewsgroup;
// }
// $resultgenews = callGroupEnews();
// $smarty->assign("listenewsgroup", $resultgenews);
// // print_pre($resultenewsgroup);
//
//
// # setting modulus _mainpage
// $contact = array();
//
// // print_pre($resultSetting);
//
// $contact['contact'] = unserialize($resultSetting->fields['7']);
// // print_pre($contact['contact']);
// // $smarty->assign("contactinfo", $contact);
// # setting social _mainpage
// $contact['social'] = unserialize($resultSetting->fields['6']);
// # setting slogan _mainpage
// // $contact['slogan'] = unserialize($resultSetting->fields['14']);
// // $contact['fac'] = unserialize($resultSetting->fields['15']);
// // print_pre($contact['fac']);
// // $contact['addresspic'] = $resultSetting->fields['8'];
// // $listDataDetail= array();
// // foreach ($contact['fac'] as $titleKey => $value){
// //   foreach ($value as $key => $valueDetail){
// //     $listDataDetail[$key][$titleKey] =  $valueDetail;
// //   }
// //
// // }
//
// // $contact['fac'] = $listDataDetail;
// $smarty->assign("contactinfo", $contact);
// // print_pre($contact);
//
// // $urlYoutubeHome = explode("v=",$contact['contact']['LinkVdo']);
// // $smarty->assign("urlYoutubeHome",$urlYoutubeHome[1]);
//
//
//
#function assign seo & title page

// function Seo($title, $desc, $keyword) {
//     global $smarty, $resultSetting;
//     $list = array();
//     if (!empty($title)) {
//
//         if (!empty($resultSetting->fields['3'])) {
//             $list_last = $resultSetting->fields['3'];
//         } else {
//             $list_last = $resultSetting->fields['5'];
//         }
//
//
//         $list['title'] = trim($title) . " - " . $list_last;
//     } else {
//         if (!empty($resultSetting->fields['3'])) {
//             $list['title'] = $resultSetting->fields['3'];
//         } else {
//             $list['title'] = $resultSetting->fields['5'];
//         }
//     }
//
//     if (!empty($desc)) {
//         $list['desc'] = trim($desc);
//     } else {
//         $list['desc'] = $resultSetting->fields['1'];
//     }
//
//     if (!empty($keyword)) {
//         $list['keyword'] = trim($keyword);
//     } else {
//         $list['keyword'] = $resultSetting->fields['2'];
//     }
//     // print_pre($list);
//     $smarty->assign("seo", $list);
// }

function Seo($title, $desc, $keyword) {
    global $smarty, $lang;
    $list = array();
    if (!empty($title)) {
        //
        // if (!empty($resultSetting->fields['3'])) {
        //     $list_last = $resultSetting->fields['3'];
        // } else {
            // $list_last = $resultSetting->fields['5'];
        // }

        $list_last = $lang['site']['name'];
        $list['title'] = trim($title) . " - " . $list_last;
    } else {
        if (!empty($resultSetting->fields['3'])) {
            $list['title'] = $resultSetting->fields['3'];
        } else {
            $list['title'] = $resultSetting->fields['5'];
        }
    }

    if (!empty($desc)) {
        $list['desc'] = trim($desc);
    } else {
        $list['desc'] = $resultSetting->fields['1'];
    }

    if (!empty($keyword)) {
        $list['keyword'] = trim($keyword);
    } else {
        $list['keyword'] = $resultSetting->fields['2'];
    }
    // print_pre($list);
    $smarty->assign("seo", $list);
}



function callTopgraphic(){
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_id as id,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey as masterkey,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_subject as subject,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_title as title,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_pic as pic,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_url as url,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_target as target,
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_credate as credate

  FROM
  " . $config['tgp']['db'] . "
  WHERE
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey = '".$config['tgp']['masterkey']."' and
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_status = 'Enable' and
  ((" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00')   OR
  (" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
  TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
  (TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00' )  OR
  (TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW())  ))

  ";


  $sql .= "
  ORDER  BY " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_order DESC
  ";

// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}



$callTGP = callTopgraphic();
$smarty->assign("callTGP",$callTGP);


function callPolicy($masterkey){
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['about']['policy'] . "." . $config['about']['policy'] . "_id,
  " . $config['about']['policy'] . "." . $config['about']['policy'] . "_masterkey,
  " . $config['about']['policy'] . "." . $config['about']['policy'] . "_htmlfilename,
  " . $config['about']['policy'] . "." . $config['about']['policy'] . "_description,
  " . $config['about']['policy'] . "." . $config['about']['policy'] . "_keywords,
  " . $config['about']['policy'] . "." . $config['about']['policy'] . "_metatitle

  FROM
  " . $config['about']['policy'] . "
  WHERE
  " . $config['about']['policy'] . "." . $config['about']['policy'] . "_masterkey = '".$masterkey."' and
  " . $config['about']['policy'] . "." . $config['about']['policy'] . "_status = 'Enable' 

  ";

// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

// print_pre($config['about']['policyfile']);
 function callAboutPolicyFile($id) {
     global $config, $db, $url;
     $sql = "SELECT
    *,
    '" . $config['about']['policyfile'] . "' as td
  FROM
    " . $config['about']['policyfile'] . "
  WHERE
    " . $config['about']['policyfile'] . "." . $config['about']['policyfile'] . "_contantid = $id
    ";
// print_pre($sql);
     $result = $db->execute($sql);
     return $result;
 }
 

$callPolicyP1 = callPolicy($config['masterkey']['policy']['secure']);
$callPolicyP2 = callPolicy($config['masterkey']['policy']['site']);
$callPolicyP3 = callPolicy($config['masterkey']['policy']['protect']);
$smarty->assign("callPolicyP1",$callPolicyP1);
$smarty->assign("callPolicyP2",$callPolicyP2);
$smarty->assign("callPolicyP3",$callPolicyP3);

$infoPolicyFileP1 = callAboutPolicyFile($callPolicyP1->fields[0]);
$infoPolicyFileP2 = callAboutPolicyFile($callPolicyP2->fields[0]);
$infoPolicyFileP3 = callAboutPolicyFile($callPolicyP3->fields[0]);
$smarty->assign("infoPolicyFileP1",$infoPolicyFileP1);
$smarty->assign("infoPolicyFileP2",$infoPolicyFileP2);
$smarty->assign("infoPolicyFileP3",$infoPolicyFileP3);

// print_pre($callPolicyP2);
  $smarty->assign("masterkeyPl1",$config['masterkey']['policy']['secure']);
  $smarty->assign("masterkeyPl2",$config['masterkey']['policy']['site']);
  $smarty->assign("masterkeyPl3",$config['masterkey']['policy']['protect']);
  
  
  
  //POPUP
  
  function callPopup($masterkey){
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['popup']['db'] . "." . $config['popup']['db'] . "_id as id,
  " . $config['popup']['db'] . "." . $config['popup']['db'] . "_masterkey as masterkey,
  " . $config['popup']['db'] . "." . $config['popup']['db'] . "_subject as subject,
  " . $config['popup']['db'] . "." . $config['popup']['db'] . "_file as file,
  " . $config['popup']['db'] . "." . $config['popup']['db'] . "_url as url,
  " . $config['popup']['db'] . "." . $config['popup']['db'] . "_target as target

  FROM
  " . $config['popup']['db'] . "
  WHERE
  " . $config['popup']['db'] . "." . $config['popup']['db'] . "_masterkey = '".$masterkey."' and
  " . $config['popup']['db'] . "." . $config['popup']['db'] . "_status = 'Enable' and
  ((" . $config['popup']['db'] . "." . $config['popup']['db'] . "_sdate='0000-00-00 00:00:00' AND
  " . $config['popup']['db'] . "." . $config['popup']['db'] . "_edate='0000-00-00 00:00:00')   OR
  (" . $config['popup']['db'] . "." . $config['popup']['db'] . "_sdate='0000-00-00 00:00:00' AND
  TO_DAYS(" . $config['popup']['db'] . "." . $config['popup']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
  (TO_DAYS(" . $config['popup']['db'] . "." . $config['popup']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  " . $config['popup']['db'] . "." . $config['popup']['db'] . "_edate='0000-00-00 00:00:00' )  OR
  (TO_DAYS(" . $config['popup']['db'] . "." . $config['popup']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
  TO_DAYS(" . $config['popup']['db'] . "." . $config['popup']['db'] . "_edate)>=TO_DAYS(NOW())  ))

  ";

// print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}

$infoPopup = callPopup($config['popup']['masterkey']);
$smarty->assign('infoPopup',$infoPopup);

/**Call Menu */
function callMenuGroup($masterkey=null){
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['menu']['group'] . "." . $config['menu']['group'] . "_id as id,
  " . $config['menu']['group'] . "." . $config['menu']['group'] . "_masterkey as masterkey,
  " . $config['menu']['group'] . "." . $config['menu']['group'] . "_subject as subject,
  " . $config['menu']['group'] . "." . $config['menu']['group'] . "_title as title,
  " . $config['menu']['group'] . "." . $config['menu']['group'] . "_pic as pic,
  " . $config['menu']['group'] . "." . $config['menu']['group'] . "_url as url,
  " . $config['menu']['group'] . "." . $config['menu']['group'] . "_target as target,
  " . $config['menu']['group'] . "." . $config['menu']['group'] . "_column as columns
  FROM
  " . $config['menu']['group'] . "
  WHERE
  " . $config['menu']['group'] . "." . $config['menu']['group'] . "_masterkey = '$masterkey' and
  " . $config['menu']['group'] . "." . $config['menu']['group'] . "_status != 'Disable'
";

  $sql .= "
   ORDER  BY " . $config['menu']['group'] . "." . $config['menu']['group'] . "_order DESC
   ";

  // echo $sql;
  $result = $db->execute($sql);
  return $result;
}

$infoMenuGroup= callMenuGroup($config['menu']['masterkey']);
$smarty->assign('infoMenuGroup',$infoMenuGroup);

function callMenu($masterkey=null,$gid=null){
  global $config, $db, $url;

  $sql = "SELECT
  " . $config['menu']['db'] . "." . $config['menu']['db'] . "_id as id,
  " . $config['menu']['db'] . "." . $config['menu']['db'] . "_masterkey as masterkey,
  " . $config['menu']['db'] . "." . $config['menu']['db'] . "_groupProoject as gid,
  " . $config['menu']['db'] . "." . $config['menu']['db'] . "_subject as subject,
  " . $config['menu']['db'] . "." . $config['menu']['db'] . "_title as title,
  " . $config['menu']['db'] . "." . $config['menu']['db'] . "_url as url,
  " . $config['menu']['db'] . "." . $config['menu']['db'] . "_target as target
  FROM
  " . $config['menu']['db'] . "
  WHERE
  " . $config['menu']['db'] . "." . $config['menu']['db'] . "_masterkey = '$masterkey' and
  " . $config['menu']['db'] . "." . $config['menu']['db'] . "_groupProoject = '$gid' and
  " . $config['menu']['db'] . "." . $config['menu']['db'] . "_status = 'Enable'
";

  $sql .= "
   ORDER  BY " . $config['menu']['db'] . "." . $config['menu']['db'] . "_order DESC
   ";

  // print_pre($sql);
  $result = $db->execute($sql);
  return $result;
}