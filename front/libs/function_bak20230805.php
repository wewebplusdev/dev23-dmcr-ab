<?php

## print pre ##

function print_pre($var, $name = '') {
    // global $url;
    // $style = "background-color: #0d0d0d; padding: 8px 8px 8px 8px; border: 1px solid black; text-align: left;position:relative;z-index:9999;font-size:14px;font-weight: bold;";
   
    // if ($url->uri['debug'] == true) {
    //         echo "<pre style='$style'>" .
    //         ($name != '' ? "$name : " : '') .
    //         _get_info_var($var, $name) .
    //         "</pre>";
    // }
    $style = "background-color: #0d0d0d; padding: 8px 8px 8px 8px; border: 1px solid black; text-align: left;position:relative;z-index:9999;font-size:14px;font-weight: bold;";
    echo "<pre style='$style'>" .
    ($name != '' ? "$name : " : '') .
    _get_info_var($var, $name) .
    "</pre>";
}

function get($var, $name = '') {
    return ($name != '' ? "$name : " : '') . _get_info_var($var, $name);
}

function _get_info_var($var, $name = '', $indent = 0) {
    static $methods = array();
    $indent > 0 or $methods = array();

    $indent_chars = '  ';
    $spc = $indent > 0 ? str_repeat($indent_chars, $indent) : '';

    $out = '';
    if (is_array($var)) {
        $out .= "<span style='color:red;'><b>Array</b></span>  <span style='color:#fff;'> " . count($var) . " </span> (\n";
        foreach (array_keys($var) as $key) {
            $out .= "$spc  <span style='color:red;'>[$key]</span><span style='color:#ffffff;'> => </span> ";
            if (($indent == 0) && ($name != '') && (!is_int($key)) && ($name == $key)) {
                $out .= "LOOP\n";
            } else {
                $out .= _get_info_var($var[$key], '', $indent + 1);
            }
        }
        $out .= "$spc)";
    } else if (is_object($var)) {
        $class = get_class($var);
        $out .= "<span style='color:green;'><b>Object</b></span><span style='color:#fff;'> $class </span>";
        $parent = get_parent_class($var);
        $out .= $parent != '' ? " <span style='color:green;'>extends</span> <span style='color:#fff;'> $parent </span> " : '';
        $out .= " (\n";
        $arr = get_object_vars($var);
        while (list($prop, $val) = each($arr)) {
            $out .= "$spc  " . "<span style='color:#3333ff;'>[$prop]</span><span style='color:#ffffff;'> => </span>";
            $out .= _get_info_var($val, $name != '' ? $prop : '', $indent + 1);
        }
        $arr = get_class_methods($var);
        // $out .= "$spc  " . "$class methods: " . count($arr) . " ";
        if (in_array($class, $methods)) {
            $out .= "[already listed]\n";
        } else {
            // $out .= "(\n";
            // $methods[] = $class;
            // while (list($prop, $val) = each($arr)) {
            //     if ($val != $class) {
            //         $out .= $indent_chars . "$spc  " . "[$val] = $arr[$prop]\n";
            //     } else {
            //         $out .= $indent_chars . "$spc  " . "[$val] [<b>constructor</b>]\n";
            //     }
            // }
            $out .= "$spc  " . ")\n";
        }
    } else {
        // $out .= "<b>Other</b> ( " . $var . " )";
        $out .=  '<span style="color:#00cc00;"><b>'.$var.'</b></span>';
    }

    return $out . "\n";
}
## print pre ##
#69f
function print_pre2($expression, $return = false, $wrap = false) {
    $css = 'color:#f0f100;border:1px dashed #06f;background:#0d0d0d;padding:1em;text-align:left;z-index:99999;font-size:14px;position:relative;font-weight: bold;';
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
    $sql_update = "Select * From " . $dbname . " where " . $listWhere . " = " . $where;
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

function encodeStr($variable,$type=false) {

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
    if(!empty($type)){
        $variable = str_replace("%", "WewEb", $variable);
    }
   // 
    return $variable;
}

## decodeStr ##

function decodeStr($enVariable,$type=false) {
    if(!empty($type)){
        $enVariable = str_replace("WewEb", "%", $enVariable);
    }
  //  
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
## call member profile ##

function callprofile($id) {
    global $db, $config;
    $sql = "Select
  " . $config['member']['db'] . "." . $config['member']['db'] . "_id As id,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_fname As fname,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_lname As lname,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_email As email,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_credate As createdate,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_logindate As logindate,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_status As status,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_pic As pic,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_masterkey as masterkey
      from
  " . $config['member']['db'] . "
Where
  " . $config['member']['db'] . "." . $config['member']['db'] . "_id = $id And
  " . $config['member']['db'] . "." . $config['member']['db'] . "_status = 'Enable' And
  " . $config['member']['db'] . "." . $config['member']['db'] . "_masterkey = '" . $config['member']['masterkey'] . "'
Group By
  " . $config['member']['db'] . "." . $config['member']['db'] . "_id, " . $config['member']['db'] . "." . $config['member']['db'] . "_fname, " . $config['member']['db'] . "." . $config['member']['db'] . "_credate,
  " . $config['member']['db'] . "." . $config['member']['db'] . "_logindate, " . $config['member']['db'] . "." . $config['member']['db'] . "_status, " . $config['member']['db'] . "." . $config['member']['db'] . "_pic"
    ;
    // print_pre($sql);
    $result = $db->execute($sql);
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

function alertpopup($idform, $msg, $status = false, $return = false, $html = null, $redirect = true) {
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

    if (!empty($redirect)) {
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
        
        $queryDis = "SELECT "
                . "" . $config['main']['db_country_district'] . "." . $config['main']['db_country_district'] . "_CODE as code "
                . "FROM " . $config['main']['db_country_district'] . " "
                . "WHERE " . $config['main']['db_country_district'] . "_id"
                . "='" . $id . "'";
        $resultDis = $db->execute($queryDis);
        // print_pre($resultDis);
        $query = "SELECT " . $config['main']['db_country_amphur_postcode'] . "_zipcode as id , "
                . $config['main']['db_country_amphur_postcode'] . "_zipcode as name "
                . " FROM " . $config['main']['db_country_amphur_postcode'] . ""
                . " WHERE " . $config['main']['db_country_amphur_postcode'] . "_district_code='" . $resultDis->fields['code'] . "'";
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
TO_DAYS(" . $config['member']['db_stamp'] . "." . $config['member']['db_stamp'] . "_dateexp)>=TO_DAYS(NOW())
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
        $sqlReturn .= " OR (TO_DAYS(" . $dbname . "" . $namestart . ")<=TO_DAYS(NOW()) AND  TO_DAYS(" . $dbname . "" . $nameend . ")>=TO_DAYS(NOW())  )";
        $sqlReturn .= " OR ( " . $dbname . "." . $dbname . "_sdate Is Null and " . $dbname . "." . $dbname . "_edate Is Null )) ";


        return $sqlReturn;
    } else {
        return FALSE;
    }
}

##############################################

function DateThai($strDate, $function = null, $lang = "th", $type = "shot") {

    global $strMonthCut, $url;

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
            case '9': $day = "$strMonth";
                break;
            case '10': $day = "$strYear";
                break;
            case '11': $day =  "$strDay $strMonth $strYear | $strHour:$strMinute:$strSeconds ";
                break;
            case '12': $day = "$strDay $strMonth $strYear_mini , $strHour:$strMinute น. ";
                break;
            default:
                break;
        }
    } else {
        $day = "-";
    }


    return $day;
}


function funcTime($strDate) {

    global $strMonthCut, $url;

    $lang = $url->pagelang[2];
    // print_pre($strMonthCut);
    //  global $slug;
    //   $lang = $slug['pageLang'];
##############################################
    
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));

    


    return "$strHour:$strMinute";
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
    global $path_upload, $path_upload_url, $path_template, $templateweb, $core_pathname_upload, $detectDivice;

    //if ($detectDivice->isMobile()) {
       // if ($fileType == "real") {
        //    $fileType = "pictures";
        //}

//        if ($fileType == "album") {
//            $fileType = "album/reB_";
//        }
    //}
	//if($fileType == 'pictures'){
	//	$fileType = 'real';
	//}

    if ($for == 'linkthumb') {
        $fileType = "album";
        $filename = "reO_" . $filename;
    }

    //print_pre($detectDivice);
    $checkFile = $path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
    $path_url_vdo = _URL . 'upload/';
    $checkFileCrop = $path_upload . "/" . $mod_tb_about_masterkey . "/crop/" . $filename;

    if (!empty($cropthumb)) {
        $checkFileCropThumb = $path_upload . "/" . $mod_tb_about_masterkey . "/cropthumb/" . $filename;
    }

    //   print_pre(file_exists($checkFile));

    if (file_exists($checkFile) && $filename) {
        $setFoldet = $path_upload_url;
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
        $setFoldet = _URL . $path_template[$templateweb][0];
        // $setimg = "/public/image/upload/s3.png";
        $setimg = "/public/image/icon/none-img.png";
    }



    switch ($for) {
        case 'linkthumb':
        case 'link':
            // $pathFile = _URL . $path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            $pathFile = $setFoldet . $setimg;
            break;

        case 'download':
            $fileLoad = encodeStr($path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename);
            //$fileLoad = $core_pathname_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            $pathFile = "?file=" . $fileLoad;
            
            break;
        case 'downloadfiile':
            $fileLoad = encodeStr($path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename,true);
            //$fileLoad = $core_pathname_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            $pathFile = "?file=" . $fileLoad;
            
            break;
		case 'bookRead':
            $fileLoad = encodeStr($path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename,true);
            //$fileLoad = $core_pathname_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            $pathFile = $fileLoad;
            
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

function callHtml($valhtml) {
    if (is_file($valhtml)) {
        $fd = @fopen($valhtml, "r");
        $contents = @fread($fd, @filesize($valhtml));
        @fclose($fd);
		//echo txtReplaceHTML($contents);
		$contents =$contents;
		$contents = str_replace("\\","",$contents);
		$contents = str_replace("line-height: 107%;","line-height: 25px;",$contents);
		$contents = str_replace("line-height: 115%;","line-height: 25px;",$contents);
		$contents = str_replace('<span lang="TH">','<span lang="TH" style="line-height: 25px;">',$contents);
		$contents = str_replace('color: rgb(128, 128, 128);','color: #333333;',$contents);
		$contents = str_replace('color: rgb(153, 153, 153);','color: #333333;',$contents);
		$contents = str_replace('color:rgb(128, 128, 128);','color: #333333;',$contents);
		$contents = str_replace('color:rgb(153, 153, 153);','color: #333333;',$contents);
		$contents = str_replace('color:rgb(128, 128, 128)','color: #333333',$contents);
		$contents = str_replace('color:rgb(153, 153, 153)','color: #333333',$contents);
		$contents = str_replace('font-family:tahoma,geneva,sans-serif;','',$contents);
		$contents = str_replace('font-family:helvetica,arial,sans-serif;','',$contents);
		$contents = str_replace('font-family:tahoma,geneva,sans-serif','',$contents);
		$contents = str_replace('font-family:helvetica,arial,sans-serif','',$contents);
		$contents = str_replace("<p>","<p style='line-height: 25px;'>",$contents);
		
		
		preg_match("/<iframe(?:.*?)<\/iframe>/", $contents, $output_array);
		if(!empty($output_array)){
			foreach($output_array as $listIfram){
				//var_dump($listIfram);
				$input_lines = str_replace($listIfram,"<div class='coverVideo'><div>".$listIfram."</div></div>",$contents);
				//var_dump($input_lines);
			}
		}else{
			$input_lines = $contents;
		}
		

		echo txtReplaceHTML($input_lines);

		
    }
}

####################################################

function txtReplaceHTML($data) {
####################################################
    $dataHTML = str_replace("\\", "", $data);
    return $dataHTML;
}


####################################################

function txtReplaceAPIService($data) {
    ####################################################
        $data = str_replace("/ckeditor/upload/", _URL."ckeditor/upload/", $data);
		$data = str_replace("/fckupload/upload/", _URL."fckupload/upload/", $data);
        $data = str_replace("/dmcr/fckupload/upload/", _URL."dmcr/fckupload/upload/", $data);
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
    return _URL . "file?p=" . encodeStr($namefile . "," . $masterkey . "," . $folder . "," . $crop) . "&d=" . date(YmdH);
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

function embedyoutube($link) {
####################################
	//print_pre($link);
	$valUrl = str_replace("https://youtu.be/", "https://www.youtube.com/watch?v=", $link);
	//print_pre($valUrl);
	$valUrl = str_replace("http://", "https://", $valUrl);
	//print_pre($valUrl);
	$linkYoutube = explode("&",$valUrl);
    return str_replace("watch?v=", "embed/", $linkYoutube[0]);
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

function callFileCareer($id, $type = 1) {
    global $db, $config, $url;
    $lang = $url->pagelang[4];
    $sql = "SELECT
  *,
  '" . $config['career-file']['db'] . "' as td
  FROM
  " . $config['career-file']['db'] . "
  WHERE
  " . $config['career-file']['db'] . "." . $config['career-file']['db'] . "_contantid = $id and
  " . $config['career-file']['db'] . "." . $config['career-file']['db'] . "_language = '$lang'
  ";
    $result = $db->execute($sql);
    if ($type == 1) {
        return $result;
    } else {
        return $result->_numOfRows;
    }
}

function multiexplode($delimiters, $string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return $launch;
}

/* =Function
  -------------------------------------------------------------- */


/* ############################################### */

function loadSendEmailTo($mailTo, $mailFrom, $subjectMail, $messageMail, $typeMail, $pdfFile) {
    /* ############################################### */
    if ($typeMail == 1) {
        $subject = "=?utf-8?B?" . base64_encode($subjectMail) . "?=";
        $header = "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=utf-8\r\n";
        $header .= "From: <" . $mailFrom . ">\r\n";
        $header .= "X-Mailer: PHP/picoHosting";
        $valSendMailStatus = @mail($mailTo, $subject, $messageMail, $header);
    } elseif ($typeMail == 2) {
        $strTo = $mailTo;
        $strSubject = $subjectMail;
        $strMessage = $messageMail;

        //*** Uniqid Session ***//
        $strSid = md5(uniqid(time()));

        $strHeader = "";
        // $strHeader .= "From: ".$_POST["txtFormName"]."<".$_POST["txtFormEmail"].">\nReply-To: ".$_POST["txtFormEmail"]."";
        $strHeader .= "From: <" . $mailFrom . ">\r\n";
        $strHeader .= "X-Mailer: PHP/picoHosting";
        $strHeader .= "MIME-Version: 1.0\r\n";
        $strHeader .= "Content-Type: multipart/mixed; boundary=\"" . $strSid . "\"\r\n";
        // $strHeader .= "This is a multi-part message in MIME format.\n";

        $strHeader .= "--" . $strSid . "\n";
        $strHeader .= "Content-type: text/html; charset=utf-8\r\n"; // or UTF-8 //
        $strHeader .= "Content-Transfer-Encoding: 7bit\r\n";
        $strHeader .= $strMessage . "\r\n";
        //*** Attachment ***//
// #########################  Excel ####################### //
        // $strFilesName1 = 'test1.xlsx';
        // $strContent1 = chunk_split(base64_encode(file_get_contents($strFilesName1)));
        // $strHeader .= "--".$strSid."\r\n";
        // $strHeader .= "Content-Type: application/octet-stream; name=\"".$strFilesName1."\"\r\n";
        // $strHeader .= "Content-Transfer-Encoding: base64\n";
        // $strHeader .= "Content-Disposition: attachment; filename=\"".$strFilesName1."\"\r\n";
        // $strHeader .= $strContent1."\r\n";



        if (!empty($pdfFile)) {
            // #########################  Excel ####################### //
            $excelName = $pdfFile . '.xls';
            $strFilesName1 = 'upload/emailfile/excel/' . $pdfFile . '.xls';
            $strContent1 = chunk_split(base64_encode(file_get_contents($strFilesName1)));
            $strHeader .= "--" . $strSid . "\r\n";
            $strHeader .= "Content-Type: application/octet-stream; name=\"" . $excelName . "\"\r\n";
            $strHeader .= "Content-Transfer-Encoding: base64\n";
            $strHeader .= "Content-Disposition: attachment; filename=\"" . $excelName . "\"\r\n";
            $strHeader .= $strContent1 . "\r\n";

// #########################  PDF ####################### //
            $filename = $pdfFile . '.pdf';
            $strFilesName2 = 'upload/emailfile/pdf/' . $pdfFile . '.pdf';
            $strContent2 = chunk_split(base64_encode(file_get_contents($strFilesName2)));
            $strHeader .= "--" . $strSid . "\r\n";
            $strHeader .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n";
            $strHeader .= "Content-Transfer-Encoding: base64\n";
            $strHeader .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n";
            $strHeader .= $strContent2 . "\r\n";
        }




        $flgSend = @mail($strTo, $strSubject, null, $strHeader);  // @ = No Show Error //
        if ($flgSend) {
            echo "Email Sending.";
        } else {
            echo "Email Can Not Send.";
        }
    } else {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.wewebcloud.com/apimail/dmcrMail.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('token' => 'U:L_2DHp993w','to' => 'wittayapong.t@wewebplus.com','sbj' => 'test test','meg' => 'title title','tm' => 'DMCR REGISTER'),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        
        /*
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.wewebcloud.com/apimail/dmcrMail.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('token' => 'U:L_2DHp993w','to' => $mailTo,'sbj' => $subjectMail,'meg' => $messageMail,'tm' => 'DMCR Register'),
        ));

        $response = curl_exec($curl);
        $mydata = json_decode($response,true);
        curl_close($curl);
        */
        //print_pre($mydata);
            
        $valSendMailStatus = 1;
    }

    return $valSendMailStatus;
}

function url_exists($url) {
  global $path_upload, $path_template, $templateweb;
  $setFoldet = _URL . $path_template[$templateweb][0];
  $setimg = "/public/image/icon/none-img.png";
  $pathFile = $setFoldet . $setimg;
    if (!$fp = @curl_getinfo($url)){
      return $url;
    }else {
      return $pathFile;
    }

}


############################################
function getDateNow() {
############################################
        $today=getdate();
        $Day=$today[mday];
        $Month=$today[mon];
        $Year=$today[year];
        $DateIs=sprintf("%04d-%02d-%02d",$Year,$Month,$Day);
        return($DateIs);
}

//#################################################
function getEndDayOfMonth($myDate) {
//#################################################
	$myEndOfMonth = array(0,31,0,31,30,31,30,31,31,30,31,30,31);
	$myDateArray = explode("-",$myDate);
	$myMonth = $myDateArray[1]*1;
	$myYear = $myDateArray[0]*1;
	if( $myMonth>=1 && $myMonth<=12 ) {
		if($myMonth==2) {
			//check leap year ---
			if( ($myYear%4)==0 ) {
				return 29;
			} else {
				return 28;
			}
		} else {
			return $myEndOfMonth[$myMonth];
		}
	} else {
		return 0;
	}
}





function callBDay($date,$month,$year,$type = "shot",$fun) {
  global $db, $config, $url, $strMonthCut;
  $lang = $url->pagelang[2];
  $month = number_format($month);
if ($fun == 1) {
  $strMonth = $strMonthCut[$type][$lang][$month];
  return $strMonth;
}elseif ($fun == 2) {
  if ($lang == "th") {
    $strYear = $year + 543;
  }elseif ($lang == "en") {
    $strYear = $year;
  }
  return $strYear;
}else {
  $strMonth = $strMonthCut[$type][$lang][$month];
  if ($lang == "th" && !empty($year)) {
    $strYear = $year + 543;
  }elseif ($lang == "en" && !empty($year)) {
    $strYear = $year;
  }

  $BD = $date.' '.$strMonth.' '.$strYear;
  if($date == '' && $strMonth =='' && $strYear == ''){
    $BD = "-";
  }
  return $BD;
}
}


function randomNameUpdate($valType) {
    if ($valType == 1) {
        $valRandomName = date('YmdHis') . "" . time() . rand(11111, 99999);
    } else {
        $valRandomName = time() . rand(11111, 99999);
    }
    return $valRandomName;
}

function thecomment($id,$mk,$gid = null) {
    // $mdPage = md5(_FullUrl);
    // return "<div id='thecomment' data-md='" . $mdPage . "' data-url='" . _FullUrl . "'><div class='loadding'><span class='fa fa-spin fa-spinner'></span></div></div>";
    return "<div id='thecomment' data-md='" . $id . "' data-masterkey='". $mk ."' data-url='" . _FullUrl . "' data-gid='" . $gid . "'><div class='loadding'><span class='fa fa-spin fa-spinner'></span></div></div>";

}

#################################################
function format($num,$length) {
#################################################

	$formated_num = strval($num);
	while (strlen($formated_num) < $length) {
		$formated_num = "0".$formated_num;
	}
	return $formated_num;
}
############################################
	function  getCollorBoss($cID){
############################################

		 $sql_pic="SELECT md_cag_col FROM md_cag WHERE   md_cag_id='".$cID."'  ";
		$query_pic=mysql_query($sql_pic);
		$row_pic=mysql_fetch_array($query_pic);

		return $row_pic[0];
	}
############################################
	function  getNameBoss($cID){
############################################

		 $sql_pic="SELECT md_cag_subject FROM md_cag WHERE   md_cag_id='".$cID."'  ";
		$query_pic=mysql_query($sql_pic);
		$row_pic=mysql_fetch_array($query_pic);

		return $row_pic[0];
	}

  //#################################################
  function formatNum($myNumber) {
  //#################################################
  	$myNumber = intval($myNumber);
  	if ($myNumber<10) return ("0".$myNumber);
  	else return ($myNumber);
  }


  //#################################################
  function DateFormatInsert($DateTime) {
  //#################################################
  	global $core_session_language;

  	$Time = "00:00:00";
  	$DateArr = explode("-",$DateTime);
  	$dataYear=$DateArr[2]-543;
  	return $dataYear."-".$DateArr[1]."-".$DateArr[0];
  }


  //#################################################
  function txtFormatDateDotTh($DateTime) {
  //#################################################
  	global $System_Session_Language;

  	$DateTimeArr = explode(" ",$DateTime);
  	$Date = $DateTimeArr[0];
  	$Time = $DateTimeArr[1];

  	$DateArr = explode("-",$Date);

  	if ($System_Session_Language=="Thai") $DateArr[0] = $DateArr[0] ;

  	return $DateArr[2]."-".$DateArr[1]."-".($DateArr[0]+543);
  }

  ############################################
  function rechangeQuot($Data) {
  ############################################
  	return str_replace("&rsquo;","'",str_replace('&quot;','"',$Data));
  }


####################################################
function txtReplaceDownload($data){
    ####################################################
        $dataCut= txtLimit2($data,40);
        $dataHTML = str_replace(" ","_",$dataCut);
        return $dataHTML;
}

############################################
function txtLimit2($s,$n){
    ############################################
        $txtcount =utf8_strlen($s);
        if($txtcount>$n)
            return iconv_substr($s, 0, $n, "UTF-8")."";
        else
            return $s;
    }

############################################
function utf8_strlen($s) {
    ############################################
        $c = strlen($s); 
        $l = 0;
        for ($i = 0; $i < $c; ++$i){
        if ((ord($s[$i]) & 0xC0) != 0x80){ ++$l; }
        }
        return $l;
    }








############################################
function load_namemember($creid){
############################################
global $config, $db, $url;
    $sql="SELECT 
    " . $config['member']['db']. "." . $config['member']['db']. "_fname, 
    " . $config['member']['db']. "." . $config['member']['db']. "_lname 
    FROM " . $config['member']['db']. " 
    WHERE   " . $config['member']['db']. "." . $config['member']['db']. "_id = '".$creid."' ";
    $query = $db->execute($sql);
    // print_pre($sql);
    $name =$query->fields[0]." ".$query->fields[1];

    return $name;
}

############################################
function load_picmemberMax($creid){
############################################
global $config, $db, $url;
    $sql="SELECT 
    " . $config['member']['db']. "." . $config['member']['db']. "_masterkey,
    " . $config['member']['db']. "." . $config['member']['db']. "_pic 
    FROM " . $config['member']['db']. " 
    WHERE   " . $config['member']['db']. "." . $config['member']['db']. "_id =  '".$creid."' ";
    $query = $db->execute($sql);

    return $query;
}


 ############################################
function repair_content($Content){
############################################
global $config,$db, $url;
    $sql_ob="SELECT 
    ".$config['board']['obsence']."_word,
    ".$config['board']['obsence']."_replace 
    FROM ".$config['board']['obsence']." 
    WHERE  ".$config['board']['obsence']."_status 	='Enable' ";
    //     $query_ob=mysql_query($sql_ob) ;
    $query_ob = $db->execute($sql_ob);
    
    // $RecordCount=mysql_num_rows($query_ob);
    if($query_ob->_numOfRows > 0){
        
        foreach($query_ob as $row_ob){
            $Content=str_replace($row_ob[$config['board']['obsence']."_word"],$row_ob[$config['board']['obsence']."_replace"],$Content);
            // $index++;
        }
    }
    return $Content;
}

// # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function encodeURL($variable) { 
    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    //-- ฟังก์ชั่นการเข้ารหัส ตัวแปรแบบ GET ผ่าน URL
    
            $key = "xitgmLwmp";
            $index = 0;
            $temp="";
            $variable = str_replace("=","๐O",$variable);
            for($i=0; $i < strlen($variable); $i++)
            {
                    $temp .= $variable{$i}.$key{$index};	
                     $index++;
                     if($index >= strlen($key)) $index = 0;
             }
             $variable = strrev($temp);
             $variable = base64_encode($variable);
             $variable = utf8_encode($variable);
             $variable = urlencode($variable);
             $variable = str_rot13($variable);
    
             $variable = str_replace("%","o7o",$variable);
             return "WP=".$variable;
     }

	 # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function decodeURL($enVariable) { 
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//-- ฟังก์ชั่นการถอดรหัส ตัวแปรแบบ GET ผ่าน URL
// การใช้งาน decodeURL($_SERVER["QUERY_STRING"]);
        $key = "xitgmLwmp";

        $ex = explode("WP=",$enVariable);
        $enVariable = $ex[1];
        $enVariable = str_replace("o7o","%",$enVariable);
        $enVariable = str_rot13($enVariable); 
        $enVariable = urldecode($enVariable);
        $enVariable = utf8_decode($enVariable); 
        $enVariable = base64_decode($enVariable);
        $enVariable = strrev($enVariable);
        $current = 0;
        $temp="";
        for($i=0; $i < strlen($enVariable); $i++)
        {
                if($current%2==0)
                {
                    $temp .= $enVariable{$i};	
                }
                $current++;
        }
        $temp = str_replace("๐O","=",$temp);
		

        parse_str($temp, $variable); 
        //echo "temp=".$temp;
        foreach($variable as $key=>$value)
        {
                $_REQUEST[$key]=$value;
                global $$key; 
                $$key=$value;
        }
		return $$key;
}

function linkto ($url, $masterkey, $id ,$target, $contname, $load) {
    $listUrl = array();
    $valCheckUrl = explode("http", $url);
    $valCountUrl = count($valCheckUrl);
//    $lang = $url->pagelang[2];
    //if(!empty($valCheckUrl[1])){
     //   $listUrl['url'] = (isset($_SERVER['HTTPS']) ? "https" : "http") . $valCheckUrl[1];
    //}else{
     //   $listUrl['url'] = $valCheckUrl[0];
   // }
   $listUrl['url'] = $url;
    $listUrl['masterkey'] = $masterkey;
    $listUrl['id'] = $id;
    $listUrl['target'] = $target;
    $listUrl['contname'] = $contname;
    $listUrl['load'] = $load;
    $arrayUrl = json_encode($listUrl);
    return _URL . "link?link=" . encodeStr($arrayUrl);
//    if($lang = "th"){
//        return _URL . $lang . "/link?link=" . encodeStr($arrayUrl);
//    }else if ($lang = "en"){
//        return _URL . $lang . "/link?link=" . encodeStr($arrayUrl);
//    }
}


function weblink ($url, $masterkey, $id ,$target, $contname, $load, $table_db,$type) {
    $listUrl = array();
    $valCheckUrl = explode("http", $url);
    $valCountUrl = count($valCheckUrl);
//    $lang = $url->pagelang[2];
    if(!empty($valCheckUrl[1])){
        $listUrl['url'] = (isset($_SERVER['HTTPS']) ? "https" : "http") . $valCheckUrl[1];
    }else{
        $listUrl['url'] = $valCheckUrl[0];
    }
    $listUrl['masterkey'] = $masterkey;
    $listUrl['id'] = $id;
    $listUrl['target'] = $target;
    $listUrl['contname'] = $contname;
    $listUrl['load'] = $load;
    $listUrl['table_db'] = $table_db;
    $listUrl['type'] = $type;
    $arrayUrl = json_encode($listUrl);
    return _URL . "weblink?WP=" . encodeStr($arrayUrl);
//    if($lang = "th"){
//        return _URL . $lang . "/link?link=" . encodeStr($arrayUrl);
//    }else if ($lang = "en"){
//        return _URL . $lang . "/link?link=" . encodeStr($arrayUrl);
//    }
}


function textHighlight($text, $keyword) {
    $wordsAry = explode(" ", $keyword);
    $wordsCount = count($wordsAry);
    
    for($i=0;$i<$wordsCount;$i++) {
     $highlighted_text = "<span style='font-weight:bold; color:#dd4b39'>$wordsAry[$i]</span>";
     $text = str_ireplace($wordsAry[$i], $highlighted_text, $text);
    }
  
    return $text;
   }



## encodeStr ##

function encodeWeweb($variable) {

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
    
# decodeStr ##

function decodeWeweb($enVariable) {
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
  ############################################

function urltarget($url,$para) {

    ############################################
        switch ($para) {
            case '1':
                return "";
                break;
    
            case '2':
                if($url == '#'){

                }else{
                    return 'target="_blank"';
                }
                break;
        }
    }

function checkLink($url){

    if($url == '#' || $url == ''){
        return 'javascript:void(0)';
    }else{
        return $url;
    }
}

function explodeUrls($url) {
    $myUrlArray = explode("v=", $url);
    $myUrlCut = $myUrlArray[1];
    $myUrlCutArray = explode("&", $myUrlCut);
    $myUrlCutAnd = $myUrlCutArray[0];
    
    return $myUrlCutAnd;
}



function checkUrlShap($url, $type, $link)
{
    if (!empty($type) && ($type == 2)) {
        if ($link == "#") {
            $urlReturn = "javascript:void(0);";
        } else {
            $urlReturn = $link;
        }
    } else {
        $urlReturn = $url;
    }

return $urlReturn;
}

// function wordwrap_utf8($string, $width=75, $break="\n", $cut=false)
// {
//   if($cut) {
//     // Match anything 1 to $width chars long followed by whitespace or EOS,
//     // otherwise match anything $width chars long
//     $search = '/(.{1,'.$width.'})(?:\s|$)|(.{'.$width.'})/uS';
//     $replace = '$1$2'.$break;
//   } else {
//     // Anchor the beginning of the pattern with a lookahead
//     // to avoid crazy backtracking when words are longer than $width
//     $pattern = '/(?=\s)(.{1,'.$width.'})(?:\s|$)/uS';
//     $replace = '$1'.$break;
//   }
//   return preg_replace($search, $replace, $string);
// } 

function checkTarget($vartarget = 1, $varlink = "#")
{
    if ($varlink != '#' && $varlink != '') {
        if ($vartarget == 1) {
            $target = "_self";
        } else {
            $target = "_blank";
        }
    } else {
        $target = "_self";
    }
    return $target;
}

function checkTargetCk($vartarget = 1, $varlink = "#", $type = null)
{
    if (!empty($type)  && ($type == 2)) {
        if ($varlink != '#' && $varlink != '') {
            if ($vartarget == 1) {
                $target = "_self";
            } else {
                $target = "_blank";
            }
        } else {
            $target = "_self";
        }
    }else{
        $target = "_self";
    }
    return $target;
}


function chkClassAbout($number = null){
    // print_pre($number);
    if ($number == 1) {
        $class = '-bgI';
    }elseif ($number == 2) {
        $class = '-bgII';
    }elseif ($number == 3) {
        $class = '-bgIII';
    }else{
        $class = '-bgI';
    }
    return $class;
}