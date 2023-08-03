<?php
// recaptcha v2
// $sitekey = '6LeZ0OQeAAAAAIY6RetHSCs9To8U_ewnPafgMllU';
// $secretkey = '6LeZ0OQeAAAAAD3lb4O6IHJIDeZLq8hGc-5UQvpM';
// // recaptcha v3
// $sitekey = '6LfH7xkeAAAAAPFz-fYiFvAIIVZP0aMQU6CCCdX6';
// $secretkey = '6LfH7xkeAAAAALzFVzS3VPGR4xAle6rfqX9U8a7v';
// $smarty->assign("sitekey", $sitekey);
// $smarty->assign("secretkey", $resultSetting->fields);

$menuactive = $url->segment[0];
$smarty->assign("menuactive", $menuactive);

$modify="?v=".date('Ymd').time();
$smarty->assign("modify", $modify);

$callTGP = callTopgraphic();
$smarty->assign("callTGP",$callTGP);

// dev test php8
$sitekey = '6LeiOU8mAAAAALEEZVAtyyOevXrTmc93MPSf0KZ1';
$smarty->assign("sitekey", $sitekey);
$secretkey = '6LeiOU8mAAAAABloeO9k9rYOQAXzJjqankbaJYU7';
$smarty->assign("secretkey", $secretkey);
/* End Google Recaptcha */


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


function Seo($title, $desc, $keyword) {
    global $smarty, $lang;
    $list = array();
    if (!empty($title)) {

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
    $smarty->assign("seo", $list);
}



function Call_File($id,$table)
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];
        $langFull = $url->pagelang[4];

        $sql = "SELECT 
            " . $table . "." . $table . "_id                AS id,
            " . $table . "." . $table . "_contantid         AS contantid,
            " . $table . "." . $table . "_filename          AS filename,
            " . $table . "." . $table . "_name              AS name,
            " . $table . "." . $table . "_download          AS download
    FROM " . $table . "  
    WHERE 1=1 
    AND " . $table . "." . $table . "_contantid = '" . $id . "'
    AND " . $table . "." . $table . "_language = '" . $langFull . "'
    ";


        $sql .= " ORDER BY " . $table . "." . $table . "_id ASC ";
        $result = $db->execute($sql);
        return $result;
    }

function Call_Album($id, $table)
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];
        $langFull = $url->pagelang[4];

        $sql = "SELECT 
            " . $table . "." . $table . "_id                AS id,
            " . $table . "." . $table . "_contantid         AS contantid,
            " . $table . "." . $table . "_filename          AS filename,
            " . $table . "." . $table . "_name              AS name,
            " . $table . "." . $table . "_download          AS download
    FROM " . $table . "  
    WHERE 1=1 AND
    " . $table . "." . $table . "_contantid = '" . $id . "'
    AND " . $table . "." . $table . "_language = '" . $langFull . "'
    ";

        $sql .= " ORDER BY " . $table . "." . $table . "_id ASC ";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
    }

    function updateView($id, $masterkey) {
        global $config, $db, $url;
     
        $sql = "SELECT
          " . $config['cms']['db'] . "." . $config['cms']['db'] . "_view
      FROM
        " . $config['cms']['db'] . "
      WHERE
      " . $config['cms']['db'] . "." . $config['cms']['db'] . "_id = $id ";
     
        $result = $db->execute($sql);
     
        $view = $result->fields[0] + 1;
     
        $listView[$config['cms']['db'] . '_view'] = $view;
        $updateView = sqlupdate($listView, $config['cms']['db'], $config['cms']['db'] . "_id", $id);
     
     // print_pre($updateView);
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
