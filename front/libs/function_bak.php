<?php

## print pre ##

function print_pre($expression, $return = false, $wrap = false) {
    $css = 'border:1px dashed #06f;background:#69f;padding:1em;text-align:left;z-index:99999;font-size:12px;position:relative';
    if ($wrap) {
        $str = '<p style="' . $css . '"><tt>' . str_replace(
                        array('  ', "\n"), array('&nbsp; ', '<br />'), htmlspecialchars(print_r($expression, true))
                ) . '</tt></p>';
    } else {
        $str = '<pre style="' . $css . '">' . print_r($expression, true) . '</pre>';
    }
    if ($return) {
        if (is_string($return) && $fh = fopen($return, 'a')) {
            fwrite($fh, $str);
            fclose($fh);
        }
        return $str;
    } else
        echo $str;
}

## clean array ##

function cleanArray($arr) {
    $size = sizeof($arr);
    for ($i = 0; $i < $size; $i++) {
        $thum = trim($arr[$i]);
        if ($thum != "") {
            $r[] = $thum;
        }
    }
    return $r;
}

## include Page to template #####

function templateInclude($setting, $settemplate = null) {
#################################
    if (!empty($settemplate)) {
        return _DIR . "/front/controller/script/" . $setting['page'] . "/template/" . $settemplate;
    } else {
        return _DIR . "/front/controller/script/" . $setting['page'] . "/template/" . $setting['template'];
    }
}

## link lang ##

function configlang($lang) {
    global $url_show_lang, $path_root;
    if (!empty($url_show_lang)) {
        return $path_root . "/" . $lang;
    } else {
        if (!empty($path_root)) {
            return $path_root;
        } else {
            return "";
        }
    }
}

## loop number ##

function loopnum($min, $max, $sort = "asc") {
    $list = array();
    while ($min <= $max) {
        $list[$min] = $min;
        $min++;
    }
    switch ($sort) {
        case 'desc':
            krsort($list);
            break;

        case 'asc':
            ksort($list);
            break;
    }

    return $list;
}

## show month ##

function showmonth($month, $lang, $type = "shot") {
    global $strMonthCut;
    return $strMonthCut[$type][$lang][$month];
}

## sql insert ##

function sqlinsert($array, $dbname, $key) {
    global $db;


    // print_pre($db);
    $sql_insert = "Select * From " . $dbname . " where " . $key . " = -1";

    // print_pre($sql_insert);
    // print_pre($key);
    $result_insert = $db->Execute($sql_insert);

    $sql_create_insert = $db->GetInsertSQL($result_insert, $array);
    $result_insert_execute = $db->Execute($sql_create_insert);

    $return['id'] = $db->Insert_ID();
    $return['sql'] = $sql_create_insert;
    $return['status'] = $result_insert_execute;
    $return['sqle'] = $sql_insert;
    return $return;
}

## sql update ##

function sqlupdate($array, $dbname, $key, $where) {
    global $db;
    // print_pre($where);
    $listWhere = "";

    if (is_array($key)) {
        foreach ($key as $para => $value) {
            $listWhere .= " " . $para . " " . $value;
        }
    } else {
        $listWhere = $key;
    }

    // print_pre($listWhere);
    $sql_update = "Select * From " . $dbname . " where " . $listWhere . " = ". $where ;
//    if (!empty($listWhere)) {
//        $sql_update .= " where " . $listWhere;
//    }
    // print_pre($sql_update);
    $result_update = $db->Execute($sql_update);

    $updateSQL = $db->GetUpdateSQL($result_update, $array);
    $result_update_execute = $db->execute($updateSQL);

    $return['where'] = $where;
    $return['sql'] = $sql_update;
    $return['sqlexecute'] = $updateSQL;
    $return['status'] = $result_update_execute;

    return $return;
}

## sql delete ##

function sqldelete($db, $key) {
    global $db;
}

## get ip ##

function getip() {

    $ip = false;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = false;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i])) {
                if (version_compare(phpversion(), "5.0.0", ">=")) {
                    if (ip2long($ips[$i]) != false) {
                        $ip = $ips[$i];
                        break;
                    }
                } else {
                    if (ip2long($ips[$i]) != - 1) {
                        $ip = $ips[$i];
                        break;
                    }
                }
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

## encodeStr ##

function encodeStr($variable) {

############################################
    $key = "xitgmLwmp";
    $index = 0;
    $temp = "";
    $variable = str_replace("=", "?O", $variable);
    for ($i = 0; $i < strlen($variable); $i++) {
        $temp .= $variable{$i} . $key{$index};
        $index++;
        if ($index >= strlen($key))
            $index = 0;
    }
    $variable = strrev($temp);
    $variable = base64_encode($variable);
    $variable = utf8_encode($variable);
    $variable = urlencode($variable);
    $variable = str_rot13($variable);
    $variable = str_replace("%", "WewEb", $variable);
    return $variable;
}

## decodeStr ##

function decodeStr($enVariable) {
    $enVariable = str_replace("WewEb", "%", $enVariable);
    $enVariable = str_rot13($enVariable);
    $enVariable = urldecode($enVariable);
    $enVariable = utf8_decode($enVariable);
    $enVariable = base64_decode($enVariable);
    $enVariable = strrev($enVariable);
    $current = 0;
    $temp = "";
    for ($i = 0; $i < strlen($enVariable); $i++) {
        if ($current % 2 == 0) {
            $temp .= $enVariable{$i};
        }
        $current++;
    }
    $temp = str_replace("?O", "=", $temp);
    parse_str($temp, $variable);
    return $temp;
}

## call member profile ##

function callprofile($id) {
    global $db, $config;
    $sql = "Select
  " . $config['member']['db'] . "." . $config['member']['db'] . "_id As id,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_fname As fname,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_email As email,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_credate As createdate,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_logindate As logindate,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_status As status,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_pic As pic,
  Group_Concat(" . $config['member']['db_group'] . "." . $config['member']['db_group'] . "_id) As g_id,
  Group_Concat(" . $config['member']['db_group'] . "." . $config['member']['db_group'] . "_subject) As g_subject,
  " . $config['member']['db_user_group'] . "." . $config['member']['db_user_group'] . "_status As g_status,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_masterkey as masterkey,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_cover As cover
From
  " . $config['member']['db'] . " Left Join
  " . $config['member']['db_user_group'] . " On " . $config['member']['db_user_group'] . "." . $config['member']['db_user_group'] . "_mid = " . $config['member']['db'] . "." . $config['member']['db'] . "_id And " . $config['member']['db'] . "." . $config['member']['db'] . "_masterkey =
    " . $config['member']['db_user_group'] . "." . $config['member']['db_user_group'] . "_masterkey Inner Join
  " . $config['member']['db_group'] . " On " . $config['member']['db_user_group'] . "." . $config['member']['db_user_group'] . "_gid = " . $config['member']['db_group'] . "." . $config['member']['db_group'] . "_id And " . $config['member']['db'] . "." . $config['member']['db'] . "_masterkey =
    " . $config['member']['db_group'] . "." . $config['member']['db_group'] . "_masterkey
Where
  " . $config['member']['db'] . "." . $config['member']['db'] . "_id = $id And
  " . $config['member']['db'] . "." . $config['member']['db'] . "_status = 'Enable' And
  " . $config['member']['db_user_group'] . "." . $config['member']['db_user_group'] . "_status = 'Enable' And
  " . $config['member']['db'] . "." . $config['member']['db'] . "_masterkey = '" . $config['member']['masterkey'] . "'
Group By
  " . $config['member']['db'] . "." . $config['member']['db'] . "_id, " . $config['member']['db'] . "." . $config['member']['db'] . "_fname, " . $config['member']['db'] . "." . $config['member']['db'] . "_credate,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_logindate, " . $config['member']['db'] . "." . $config['member']['db'] . "_status, " . $config['member']['db'] . "." . $config['member']['db'] . "_pic,
  " . $config['member']['db_user_group'] . "." . $config['member']['db_user_group'] . "_status, " . $config['member']['db'] . "." . $config['member']['db'] . "_masterkey";
    //  print_pre($sql);
    $result = $db->execute($sql);
    // print_pre($result);
    return $result;
}

## call member address ##

function calladdress($id) {
    global $db, $config;
    $sql = "Select
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_id as id,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_mid as mid,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_name as name,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_email as email,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_tel as tel,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_address as address,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_country,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_district,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_subdistrict,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_zipcode as zipcode,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_pin as pin,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_status as status,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_create,
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_update,
  " . $config['main']['db_country_province'] . "." . $config['main']['db_country_province'] . "_name as province,
  " . $config['main']['db_country_amphur'] . "." . $config['main']['db_country_amphur'] . "_name as amphur,
  " . $config['main']['db_country_district'] . "." . $config['main']['db_country_district'] . "_name as district
From
  " . $config['member']['db_user_address'] . " Inner Join
  " . $config['main']['db_country_province'] . " On " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_country = " . $config['main']['db_country_province'] . "." . $config['main']['db_country_province'] . "_id
  Inner Join
  " . $config['main']['db_country_amphur'] . " On " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_district = " . $config['main']['db_country_amphur'] . "." . $config['main']['db_country_amphur'] . "_id
  Inner Join
  " . $config['main']['db_country_district'] . " On " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_subdistrict = " . $config['main']['db_country_district'] . "." . $config['main']['db_country_district'] . "_id";

    $sql .= " Where
  (" . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_mid = '" . $id . "') And (
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_status != 'Disable' Or
  " . $config['member']['db_user_address'] . "." . $config['member']['db_user_address'] . "_status Is Null)";
    $result = $db->execute($sql);
    // print_pre($result);
    return $result;
}

## alert popup ##

function alertpopup($idform, $msg, $status = false, $return = false, $html = null) {
    global $url_show_lang, $lang_set, $lang_default;
    unset($_SESSION['alert']);
    $_SESSION['alert']['id'] = $idform;
    $_SESSION['alert']['msg'] = $msg;
    $_SESSION['alert']['status'] = $status;
    $_SESSION['alert']['return'] = $return;
    if (!empty($html)) {
        $_SESSION['alert']['html'] = $html;
    }

    if (!empty($url_show_lang)) {
        $langInLink = $lang_set[$lang_default][2] . "/";
    } else {
        $langInLink = "";
    }

    if (!empty($return)) {

        switch ($return) {
            case 'history':
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
                break;

            default:
                header('Location: ' . _URL . $langInLink . $return);
                exit();
                break;
        }
    } else {
        header("Location:" . $_SERVER['REQUEST_URI']);
        exit();
    }
}

## callproviance ##

function callproviance($id, $type, $export = FALSE) {
    global $db, $config;
    if ($type == 'proviance') {
        $query = "SELECT " . $config['main']['db_country_province'] . "." . $config['main']['db_country_province'] . "_id as id, "
                . "" . $config['main']['db_country_province'] . "." . $config['main']['db_country_province'] . "_name as name FROM " . $config['main']['db_country_province'] . " ORDER BY " . $config['main']['db_country_province'] . "." . $config['main']['db_country_province'] . "_name ASC ";
    } else if ($type == 'district') {
        $query = "SELECT "
                . "" . $config['main']['db_country_amphur'] . "." . $config['main']['db_country_amphur'] . "_id as id, "
                . "" . $config['main']['db_country_amphur'] . "." . $config['main']['db_country_amphur'] . "_name as name "
                . "FROM "
                . "" . $config['main']['db_country_amphur'] . " WHERE "
                . "" . $config['main']['db_country_amphur'] . "." . $config['main']['db_country_amphur'] . "_province_id "
                . "='" . $id . "'";
    } else if ($type == 'subdistrict') {
        $query = "SELECT "
                . "" . $config['main']['db_country_district'] . "." . $config['main']['db_country_district'] . "_id as id, "
                . "" . $config['main']['db_country_district'] . "." . $config['main']['db_country_district'] . "_name as name "
                . "FROM " . $config['main']['db_country_district'] . " "
                . "WHERE " . $config['main']['db_country_district'] . "_amphur_id"
                . "='" . $id . "'";
    } else if ($type == 'postcode') {
        $query = "SELECT " . $config['main']['db_country_amphur_postcode'] . "_post_code as id , "
                . $config['main']['db_country_amphur_postcode'] . "_post_code as name "
                . " FROM " . $config['main']['db_country_amphur_postcode'] . ""
                . " WHERE " . $config['main']['db_country_amphur_postcode'] . "_id='" . $id . "'";
    }

    if (!empty($query)) {
        $result = $db->execute($query);

        if (!empty($export)) {
            return $result;
        } else {
            $listShow = array();
            foreach ($result as $showResult) {
                $listShow[$showResult["id"]] = $showResult["name"];
            }
            echo json_encode($listShow);
        }
    }
}

## call favorite ##

function callfavorite($id) {
    global $db, $config;
    $sql = "SELECT
  Count(" . $config['member']['db_user_favorite'] . "." . $config['member']['db_user_favorite'] . "_sid) AS csid,
  Count(" . $config['member']['db_user_favorite'] . "." . $config['member']['db_user_favorite'] . "_pid) AS cpid,
  " . $config['member']['db_user_favorite'] . "." . $config['member']['db_user_favorite'] . "_mid AS id
FROM
  " . $config['member']['db_user_favorite'] . "
WHERE
  " . $config['member']['db_user_favorite'] . "." . $config['member']['db_user_favorite'] . "_mid = $id AND
  " . $config['member']['db_user_favorite'] . "." . $config['member']['db_user_favorite'] . "_status = 'Enable'
GROUP BY
  " . $config['member']['db_user_favorite'] . "." . $config['member']['db_user_favorite'] . "_mid";
    //print_pre($sql);
    $result = $db->execute($sql);
    return $result;
}

## call counter product ##

function callproductcounter($id, $type = FALSE) {
//    global $db, $config;
//
//    if(!empty($type)){
//        $sqlCampaign = "SELECT
//  Sum(".$config['member']['db_store_packet'].".".$config['member']['db_store_packet']."_limit) AS limitstore
//FROM
//  ".$config['member']['db_store_packet']."
//WHERE
//  ".$config['member']['db_store_packet'].".".$config['member']['db_store_packet']."_mid = 10 AND
//  ".$config['member']['db_store_packet'].".".$config['member']['db_store_packet']."_status = 'Enable' AND
//  ((".$config['member']['db_store_packet'].".".$config['member']['db_store_packet']."_datestart <= Now() AND
//      ".$config['member']['db_store_packet'].".".$config['member']['db_store_packet']."_dateexpire >= Now()) OR
//    (".$config['member']['db_store_packet'].".".$config['member']['db_store_packet']."_datestart IS NULL AND
//      ".$config['member']['db_store_packet'].".".$config['member']['db_store_packet']."_dateexpire IS NULL))";
//    print_pre($sqlCampaign);
//    }
//
//
//    $sql = "SELECT
//  Count(" . $config['member']['db_seller_product'] . "." . $config['member']['db_seller_product'] . "_id) AS totalproduct
//FROM
//  " . $config['member']['db_seller_product'] . "
//  INNER JOIN " . $config['member']['db_store'] . " ON " . $config['member']['db_seller_product'] . "." . $config['member']['db_seller_product'] . "_store_id = " . $config['member']['db_store'] . "." . $config['member']['db_store'] . "_id
//WHERE
//  " . $config['member']['db_seller_product'] . "." . $config['member']['db_seller_product'] . "_status = 'Enable' AND
//  " . $config['member']['db_seller_product'] . "." . $config['member']['db_seller_product'] . "_masterkey = '" . $config['member']['db_product_masterkey'] . "' AND
//  " . $config['member']['db_store'] . "." . $config['member']['db_store'] . "_mid = " . $id;
//
//    if (!empty($type)) {
//        $sql .= " AND " . $config['member']['db_seller_product'] . "." . $config['member']['db_seller_product'] . "_slot IS NULL";
//        $sql .= " AND " . $config['member']['db_seller_product'] . "." . $config['member']['db_seller_product'] . "_slotpack = " . $type;
//    } else {
//        $sql .= " AND " . $config['member']['db_seller_product'] . "." . $config['member']['db_seller_product'] . "_slotpack IS NULL";
//    }
//
//
//    $sql .= " GROUP BY
//  " . $config['member']['db_store'] . "." . $config['member']['db_store'] . "_mid";
//
//    print_pre($sql);
//    $result = $db->execute($sql);
//    return $result;
    return FALSE;
}

## call stamp ##

function callstamp($id) {
    global $db, $config;
    $sql = "SELECT *
FROM
  " . $config['member']['db_stamp'] . "
WHERE
  " . $config['member']['db_stamp'] . "." . $config['member']['db_stamp'] . "_mid = $id and
  " . $config['member']['db_stamp'] . "." . $config['member']['db_stamp'] . "_status = 'Enable' AND
TO_DAYS(" . $config['member']['db_stamp']  . "." . $config['member']['db_stamp'] . "_dateexp)>=TO_DAYS(NOW())
  ";

    $result = $db->execute($sql);
    return $result;
}

## call brand ##

function callbrand($idbrand, $sort = 'DESC') {
    global $db, $config;
    //$config['member']['db_brand']
    $sql = "SELECT
  *
FROM
  " . $config['member']['db_brand'] . "
WHERE
  " . $config['member']['db_brand'] . "." . $config['member']['db_brand'] . "_status = 'Enable' AND
  " . $config['member']['db_brand'] . "." . $config['member']['db_brand'] . "_masterkey = '" . $config['member']['db_product_masterkey'] . "'
  ";
    if (!empty($idbrand)) {
        $sql .= " AND " . $config['member']['db_brand'] . "." . $config['member']['db_brand'] . "_id = $idbrand";
    }
    $sql .= " ORDER BY
  " . $config['member']['db_brand'] . "." . $config['member']['db_brand'] . "_order $sort";
    $result = $db->execute($sql);
    return $result;
}

## add sql date start end ##

function checkStartEnd($dbname, $namestart = "_sdate", $nameend = "_edate") {
    if (!empty($dbname)) {
        //   $sqlReturn = " and (( " . $dbname . "." . $dbname . "_sdate <= Now() and " . $dbname . "." . $dbname . "_edate >= Now() ) ";
        //   $sqlReturn .= " or ( " . $dbname . "." . $dbname . "_sdate Is Null and " . $dbname . "." . $dbname . "_edate Is Null )) ";

        $sqlReturn = " and ((" . $dbname . "" . $namestart . "='0000-00-00 00:00:00' AND " . $dbname . "" . $nameend . "='0000-00-00 00:00:00')  ";
        $sqlReturn .= " OR (" . $dbname . "" . $namestart . "='0000-00-00 00:00:00' AND TO_DAYS(" . $dbname . "" . $nameend . ")>=TO_DAYS(NOW()) )";
        $sqlReturn .= " OR (TO_DAYS(" . $dbname . "" . $namestart . ")<=TO_DAYS(NOW()) AND " . $dbname . "" . $nameend . "='0000-00-00 00:00:00' ) ";
        $sqlReturn .= " OR (TO_DAYS(" . $dbname . "" . $namestart . ")<=TO_DAYS(NOW()) AND  TO_DAYS(" . $dbname . "" . $nameend . ")>=TO_DAYS(NOW())  ))";



        return $sqlReturn;
    } else {
        return FALSE;
    }
}

##############################################

function DateThai($strDate, $function = null, $lang = "th", $type = "shot") {

    global $strMonthCut,$url;

    $lang = $url->pagelang[2];
    // print_pre($strMonthCut);
    //  global $slug;
    //   $lang = $slug['pageLang'];
##############################################
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strYear2 = date("Y", strtotime($strDate));
    $strYear_mini = substr($strYear, 2, 4);
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));

    $strMonth = $strMonthCut[$type][$lang][$strMonth];
    // print_pre($strMonth);
    if (!empty($strDate)) {
        switch ($function) {
            case '1': $day = "$strDay $strMonth $strYear";
                break;
            case '2': $day = "$strDay $strMonth $strYear2";
                break;
            case '3': $day = "$strDay $strMonth $strYear_mini";
                break;
            case '4': $day = "$strDay $strMonth $strYear , $strHour:$strMinute ";
                break;

            case '5': $day = "$strDay $strMonth $strYear , $strHour:$strMinute:$strSeconds ";
                break;
            case '6': $day = "$strDay";
                break;
            case '7': $day = "$strMonth $strYear";
                break;
            case '8': $day = "$strHour:$strMinute";
                break;
            default:
                break;
        }
    } else {
        $day = "-";
    }


    return $day;
}

## check date expire ##

function checkexpire($date) {
    //  $startdate = "16-May-2016";
    $expire = strtotime($date);
    $today = strtotime("today midnight");

    if ($today >= $expire) {
        return true;
    } else {
        return false;
    }
}

## checkstatus ##

function checkstatus($status) {
    global $lang;

    if (!empty($lang['status'][$status])) {
        return $lang['status'][$status];
    } else {
        return $status;
    }
}

############################################

function changeQuot($Data) {
############################################
    global $coreLanguageSQL;

    $valTrim = trim($Data);
//    $valChangeQuot = wewebEscape($coreLanguageSQL, $valTrim);
    $valChangeQuot = $valTrim;
    //$valChangeQuot=str_replace("'","&rsquo;",str_replace('"','&quot;',$valChangeQuot));
    $valChangeQuot = str_replace("'", "&rsquo;", str_replace('"', '&quot;', $valChangeQuot));

    return $valChangeQuot;
}

## page pagination ##

function pagepagination($uri = null, $limit = null) {
    global $limitpage;
    //print_pre($uri->pagelang[2]);
    $pageOn = array();
    if (!empty($limit)) {
        $pageOn['limit'] = $limit;
    } else {
        $pageOn['limit'] = $limitpage['showperPageSeller'];
    }
    $pagemain = str_replace($uri->pagelang[2] . "/", "", explode("?", $uri->url));

    $pageOn['page'] = $pagemain[0];
    $listparameter = array();

    foreach ($uri->uri as $key => $value) {
        if ($key != "page") {
            $listparameter[] = $key . "=" . $value;
        }
    }

    $countPara = count($listparameter);

    if ($countPara >= 1) {
        $pageOn['parambefor'] = "?" . implode("&", $listparameter);
        $pageOn['parameter'] = "&page=";
    } else {
        $pageOn['parambefor'] = "";
        $pageOn['parameter'] = "?page=";
    }


    if (array_key_exists('page', $uri->uri)) {
        $pageOn['on'] = $uri->uri['page'];
    } else {
        $pageOn['on'] = 1;
    }

    // print_pre($pageOn);
    return $pageOn;
}

############################################

function resize($img, $w, $h, $newfilename) {
############################################
    //Check if GD extension is loaded
    if (!extension_loaded('gd') && !extension_loaded('gd2')) {
        trigger_error("GD is not loaded", E_USER_WARNING);
        return false;
    }

    //Get Image size info
    $imgInfo = getimagesize($img);
    switch ($imgInfo[2]) {
        case 1: $im = imagecreatefromgif($img);
            break;
        case 2: $im = imagecreatefromjpeg($img);
            break;
        case 3: $im = imagecreatefrompng($img);
            break;
        default: trigger_error('Unsupported filetype!', E_USER_WARNING);
            break;
    }

    //If image dimension is smaller, do not resize
    if ($imgInfo[0] <= $w && $imgInfo[1] <= $h) {
        $nHeight = $imgInfo[1];
        $nWidth = $imgInfo[0];
    } else {
        //yeah, resize it, but keep it proportional
        if ($w / $imgInfo[0] > $h / $imgInfo[1]) {
            $nWidth = $w;
            $nHeight = $imgInfo[1] * ($w / $imgInfo[0]);
        } else {
            $nWidth = $imgInfo[0] * ($h / $imgInfo[1]);
            $nHeight = $h;
        }
    }
    $nWidth = round($nWidth);
    $nHeight = round($nHeight);

    $newImg = imagecreatetruecolor($nWidth, $nHeight);

    /* Check if this image is PNG or GIF, then set if Transparent */
    if (($imgInfo[2] == 1) OR ( $imgInfo[2] == 3)) {
        imagealphablending($newImg, false);
        imagesavealpha($newImg, true);
        $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
        imagefilledrectangle($newImg, 0, 0, $nWidth, $nHeight, $transparent);
    }
    imagecopyresampled($newImg, $im, 0, 0, 0, 0, $nWidth, $nHeight, $imgInfo[0], $imgInfo[1]);

    //Generate the file, and rename it to $newfilename
    switch ($imgInfo[2]) {
        case 1: imagegif($newImg, $newfilename);
            break;
        case 2: imagejpeg($newImg, $newfilename);
            break;
        case 3: imagepng($newImg, $newfilename);
            break;
        default: trigger_error('Failed resize image!', E_USER_WARNING);
            break;
    }

    return $newfilename;
}

## loadpicproduct ##

function loadpicproduct($name, $masterkey, $type = "real") {
    global $path_upload, $path_template, $templateweb;
    if (!empty($name)) {
        if (file_exists($path_upload . "/" . $masterkey . "/" . $type . "/" . $name)) {
            return str_replace(_DIR . "/", _URL, $path_upload . "/" . $masterkey . "/" . $type . "/" . $name);
        } else {
            return $path_template[$templateweb][0] . "/public/image/icon/none-img.png";
        }
    } else {
        return $path_template[$templateweb][0] . "/public/image/icon/none-img.png";
    }
}

function fileinclude($filename, $fileType = 'html', $mod_tb_about_masterkey, $for = 'check', $crop = false, $cropthumb = false) {
    global $path_upload, $path_upload_url, $path_template, $templateweb, $core_pathname_upload;

    $checkFile = $path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
    $path_url_vdo = _URL . 'upload/';
    $checkFileCrop = $path_upload . "/" . $mod_tb_about_masterkey . "/crop/" . $filename;

    if (!empty($cropthumb)) {
        $checkFileCropThumb = $path_upload . "/" . $mod_tb_about_masterkey . "/cropthumb/" . $filename;
    }



    if (file_exists($checkFile) && $filename) {
        $setimg = str_replace($path_upload, "", $checkFile);

        if (!empty($crop)) {
            if (file_exists($checkFileCrop)) {
                $setimg = str_replace($path_upload, "", $checkFileCrop);
            }
        }

        if (!empty($cropthumb)) {
            if (file_exists($checkFileCropThumb)) {
                // print_pre("have");
                $setimg = str_replace($path_upload, "", $checkFileCropThumb);
            }
        }
    } else {
        $path_upload_url = _URL . $path_template[$templateweb][0];
        $setimg = "/public/image/icon/none-img.png";
    }



    switch ($for) {
        case 'link':
            // $pathFile = _URL . $path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            $pathFile = $path_upload_url . $setimg;
            break;

        case 'download':
            $fileLoad = encodeStr($path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename);
            //$fileLoad = $core_pathname_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            $pathFile = "?file=" . $fileLoad;
            break;
        case 'vdo':
            $pathFile = $path_url_vdo . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            break;

        default:
            $pathFile = $path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            break;
    }


    return $pathFile;
}

function callhtml($valhtml) {
    if (is_file($valhtml)) {
        $fd = @fopen($valhtml, "r");
        $contents = @fread($fd, @filesize($valhtml));
        @fclose($fd);
        echo txtReplaceHTML($contents);
    }
}

####################################################

function txtReplaceHTML($data) {
####################################################
    $dataHTML = str_replace("\\", "", $data);
    return $dataHTML;
}

## texttolink ##

function texttolink($txt) {
    $txt = trim($txt);
    $txt = str_replace(" ", "-", $txt);
    return $txt;
}

## gennerateencode to include image ##

function gennerateencode($namefile, $masterkey, $folder, $crop = false) {
    return _URL . "file?p=" . encodeStr($namefile . "," . $masterkey . "," . $folder . "," . $crop) . "&d=" . date(YmdHis);
}

## clear method ##

function clearmethod() {
    if (empty($_SESSION['sessionMetod'])) {
        $_SESSION['sessionMetod'] = true;
        header("Location:" . $_SERVER['REQUEST_URI']);
    } else {
        $_SESSION['sessionMetod'] = false;
    }
}

## goto 404 ##

function page404() {
    global $linklang;
    header("Location:" . $linklang . "/404");
}

function checkDiscount($price, $discount, $type = null) {
    switch ($type) {
        default :
            if ($discount >= 1) {
                return ((($price - $discount) / $price) * 100);
            } else {
                return 0;
            }
            break;
    }
}

function embetyoutube($link) {
####################################
    return str_replace("watch?v=", "embed/", $link);
}

####################################################

function get_IconSize($LinkRelativePath) {
####################################################
    $filesize = @filesize($LinkRelativePath);
    if ($filesize < 10485) {
        $sizeFile = number_format($filesize / 1024, 2) . " Kb";
    } else {
        $sizeFile = number_format($filesize / (1024 * 1024), 2) . " Mb";
    }
    return($sizeFile);
}

####################################################

function get_Icon($DownloadFile, $type = "") {
####################################################

    $ImageType = strrchr($DownloadFile, '.');

    // print_pre($ImageType);

    if (($ImageType == ".jpg") || ($ImageType == ".png") || ($ImageType == ".gif") || ($ImageType == ".bmp")) {
        $tocss = "picture";
        $TypeImgFile = "file-picture-o";
    } elseif ($ImageType == ".pdf") {
        $tocss = "pdf";
        $TypeImgFile = "file-pdf-o";
    } elseif ($ImageType == ".txt") {
        $tocss = "txt";
        $TypeImgFile = "file-text-o";
    } elseif (($ImageType == ".zip") || ($ImageType == ".rar")) {
        $tocss = "achive";
        $TypeImgFile = "file-zip-o";
    } elseif ($ImageType == ".xls" || $ImageType == ".xlsx") {
        $tocss = "xls";
        $TypeImgFile = "file-excel-o";
    } elseif ($ImageType == ".ppt" || $ImageType == ".pptx") {
        $tocss = "ppt";
        $TypeImgFile = "file-powerpoint-o";
    } elseif ($ImageType == ".rtf" || $ImageType == ".doc" || $ImageType == ".docx") {
        $tocss = "doc";
        $TypeImgFile = "file-word-o";
    } else {
        $tocss = "other";
        $TypeImgFile = "file-o";
    }



    $fileCheck = array(
        "icon" => $TypeImgFile,
        "type" => $ImageType,
        "tocss" => $tocss
    );
    if (!empty($type)) {
        return $fileCheck[$type];
    } else {
        return $fileCheck;
    }
}

# log web ######################################################################

function logs($action, $actionType, $ccheck = true) {


// global $core_tb_user_counter;
//$sqlLog = "INSERT INTO " . $core_tb_log . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
//$logResult = $db->execute($sqlLog);


    if (!empty($_SESSION['front_session_ssid'])) {
        $typeUserAction = 1;
        $sessionOnlogs_ssid = $_SESSION["front_session_ssid"];
        $sessionOnlogs_name = $_SESSION["front_session_name"];
    } else {
        $typeUserAction = 0;
        $sessionOnlogs_ssid = null;
        $sessionOnlogs_name = null;
    }


    if (!empty($_COOKIE["log-" . $actionType . "-" . $action . "-" . $typeUserAction]) && !empty($ccheck)) {

    } else {
        global $core_tb_log, $db, $cookie_log, $setcookie, $core_pathname_logs;

        $myDateNow = date("Y-m-d");
        $myTimeNow = date("H:i:s");
        $ipOnligs = getIP();

#save log file  start
        $CurrentPath = _DIR . $core_pathname_logs . "";

        if (strpos($action, "view") !== false) {
            $dirLog = "view";
        } else {
            $dirLog = $actionType;
        }

        if (!is_dir($CurrentPath)) {
            mkdir($CurrentPath, 0777);
        }

        if (!is_dir($CurrentPath . "/front")) {
            mkdir($CurrentPath . "/front", 0777);
        }

        if (!is_dir($CurrentPath . "/front/" . $dirLog)) {
            mkdir($CurrentPath . "/front/" . $dirLog, 0777);
        }

        $logsfile = $CurrentPath . "/front/" . $dirLog . "/" . $myDateNow . ".logs";

        if (!is_file($logsfile)) {
            $fp = @fopen($logsfile, 'w+');
            fwrite($fp, $action . "|:|" . session_id() . "|:|" . $actionType . "|:|" . $sessionOnlogs_ssid . "|:|" . $sessionOnlogs_name . "|:|" . $ipOnligs . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
            fclose($fp);
            chmod($logsfile, 0666);
        } else {
            $fp = @fopen($logsfile, 'a');
            fwrite($fp, $action . "|:|" . session_id() . "|:|front-" . $actionType . "|:|" . $sessionOnlogs_ssid . "|:|" . $sessionOnlogs_name . "|:|" . $ipOnligs . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
            fclose($fp);
        }
#save log file  end

        $insert[$core_tb_log . "_action"] = "'" . $action . "'";
        $insert[$core_tb_log . "_sessid"] = "'" . session_id() . "'";

        if (!empty($sessionOnlogs_ssid)) {
            $insert[$core_tb_log . "_sid"] = "'" . $sessionOnlogs_ssid . "'";
            $insert[$core_tb_log . "_sname"] = "'" . $sessionOnlogs_name . "'";
        }

        $insert[$core_tb_log . "_ip"] = "'" . $ipOnligs . "'";
        $insert[$core_tb_log . "_time"] = "'" . date("Y-m-d H:i:s") . "'";
        $insert[$core_tb_log . "_type"] = "'front-" . $actionType . "'";
        $insert[$core_tb_log . "_actiontype"] = "'" . $typeUserAction . "'";
        $insert[$core_tb_log . "_url"] = "'" . _FullUrl . "'";
//        print_pre($insert);

        $sqlLog = "INSERT INTO " . $core_tb_log . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
        $logResult = $db->execute($sqlLog);



        if (!empty($logResult)) {
            setcookie("log-" . $actionType . "-" . $action . "-" . $typeUserAction, $setcookie, time() + (60 * $cookie_log), _FullUrl);
        }
    }
}

function checkOnline() {
    global $config, $db, $memberID, $member;
    // print_pre($member);
    //print_pre($memberID['member_info']);
    $memberLogin = method_exists($member, 'login_status') ? $member->login_status() : 0;

    $listlogin[$config['member']['db'] . '_online'] = null;
    $serWere = "DATE_ADD(" . $config['member']['db'] . '_online' . ", INTERVAL 5 MINUTE) <= NOW()";
    $updatelogin = sqlupdate($listlogin, $config['member']['db'], $serWere);
//print_pre($updatelogin);
    if (!empty($memberID['member_info']['id']) && !empty($memberLogin)) {
        $listloginUpdate[$config['member']['db'] . '_online'] = date("Y-m-d H:i:s");


        $serWereMem = $config['member']['db'] . "_id = " . $memberID['member_info']['id'];
        $serWereMem .= " and ( DATE_ADD(" . $config['member']['db'] . '_online' . ", INTERVAL 5 MINUTE) >= NOW() or " . $config['member']['db'] . "_online is null )";
//and ( DATE_ADD(md_mem_online, INTERVAL 5 MINUTE) >= NOW() or md_mem_online is null)
        $updateloginUpdate = sqlupdate($listloginUpdate, $config['member']['db'], $serWereMem);
    }

    // print_pre($updateloginUpdate);
}

/* =Function
  -------------------------------------------------------------- */

function generate_date_today($Timestamp, $Language = "en", $TimeText = true) {
    global $SuffixTime, $DateThai;
    $Format = "d M Y H:i";
    // $Timestamp = time();
    //return date("i:H d-m-Y", $Timestamp) ." | ". date("i:H d-m-Y", time());
    if (date("Ymd", $Timestamp) >= date("Ymd", (time() - 345600)) && $TimeText) {    // Less than 3 days.
        $TimeStampAgo = (time() - $Timestamp);

        if (($TimeStampAgo < 86400)) {   // Less than 1 day.
            $TimeDay = "time";    // Use array time

            if ($TimeStampAgo < 60) {    // Less than 1 minute.
                $Return = (time() - $Timestamp);
                $Values = "Seconds";
            } else if ($TimeStampAgo < 3600) {   // Less than 1 hour.
                $Return = floor((time() - $Timestamp) / 60);
                $Values = "Minutes";
            } else {   // Less than 1 day.
                $Return = floor((time() - $Timestamp) / 3600);
                $Values = "Hours";
            }
        } else if ($TimeStampAgo < 172800) {   // Less than 2 day.
            $Return = date("H:i", $Timestamp);
            $TimeDay = "day";
            $Values = "Yesterday";
        } else {  // More than 2 hours..
            $Return = date("H:i", $Timestamp);
            $TimeDay = "day";
            $Values = date("l", $Timestamp);
        }

        if ($TimeDay == "time")
            $Return .= $SuffixTime[$Language][$TimeDay][$Values];
        else if ($TimeDay == "day")
            $Return = $SuffixTime[$Language][$TimeDay][$Values] . $Return;

        return $Return;
    }
    else {
        if ($Language == "en") {
            return date($Format, $Timestamp);
        } else if ($Language == "th") {
            $Format = str_replace("l", "|1|", $Format);
            $Format = str_replace("D", "|2|", $Format);
            $Format = str_replace("F", "|3|", $Format);
            $Format = str_replace("M", "|4|", $Format);
            $Format = str_replace("y", "|x|", $Format);
            $Format = str_replace("Y", "|X|", $Format);

            $DateCache = date($Format, $Timestamp);

            $AR1 = array("", "l", "D", "F", "M");
            $AR2 = array("", "l", "l", "F", "F");

            for ($i = 1; $i <= 4; $i++) {
                if (strstr($DateCache, "|" . $i . "|")) {
                    //$Return .= $i;

                    $split = explode("|" . $i . "|", $DateCache);
                    for ($j = 0; $j < count($split) - 1; $j++) {
                        $StrCache .= $split[$j];
                        $StrCache .= $DateThai[$AR1[$i]][date($AR2[$i], $Timestamp)];
                    }
                    $StrCache .= $split[count($split) - 1];
                    $DateCache = $StrCache;
                    $StrCache = "";
                    empty($split);
                }
            }

            if (strstr($DateCache, "|x|")) {

                $split = explode("|x|", $DateCache);

                for ($i = 0; $i < count($split) - 1; $i++) {
                    $StrCache .= $split[$i];
                    $StrCache .= substr((date("Y", $Timestamp) + 543), -2);
                }
                $StrCache .= $split[count($split) - 1];
                $DateCache = $StrCache;
                $StrCache = "";
                empty($split);
            }

            if (strstr($DateCache, "|X|")) {

                $split = explode("|X|", $DateCache);

                for ($i = 0; $i < count($split) - 1; $i++) {
                    $StrCache .= $split[$i];
                    $StrCache .= (date("Y", $Timestamp) + 543);
                }
                $StrCache .= $split[count($split) - 1];
                $DateCache = $StrCache;
                $StrCache = "";
                empty($split);
            }

            $Return = $DateCache;

            return $Return;
        }
    }
}

/* =Function
-------------------------------------------------------------- */
