<?php

## print pre ##

function print_pre($expression, $return = false, $wrap = false)
{
    $css = 'border:1px dashed #06f;background:#69f;padding:1em;text-align:left;z-index:99999;font-size:12px;position:relative';
    if ($wrap) {
        $str = '<p style="' . $css . '"><tt>' . str_replace(
            array('  ', "\n"),
            array('&nbsp; ', '<br />'),
            htmlspecialchars(print_r($expression, true))
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

function cleanArray($arr)
{
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

function templateInclude($setting, $settemplate = null)
{
    #################################
    if (!empty($settemplate)) {
        return _DIR . "/front/controller/script/" . $setting['page'] . "/template/" . $settemplate;
    } else {
        return _DIR . "/front/controller/script/" . $setting['page'] . "/template/" . $setting['template'];
    }
}

## link lang ##

function configlang($lang)
{
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

function loopnum($min, $max, $sort = "asc")
{
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

function showmonth($month, $lang, $type = "shot")
{
    global $strMonthCut;
    return $strMonthCut[$type][$lang][$month];
}

## sql insert ##

function sqlinsert($array, $dbname, $key)
{
    global $db;

    $sql_insert = "Select * From " . $dbname . " where " . $key . " = -1";

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

function sqlupdate($array, $dbname, $key, $where = null)
{
    global $db;

    $listWhere = "";

    if (is_array($key)) {
        foreach ($key as $para => $value) {
            $listWhere .= " " . $para . " " . $value;
        }
    } else {
        $listWhere = $key;
    }

    if (!empty($where)) {
        $sql_update = "Select * From " . $dbname . " where " . $listWhere . " = " . $where;
    } else {
        $sql_update = "Select * From " . $dbname . " where " . $listWhere;
    }

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

function sqldelete($db, $key)
{
    global $db;
}

## get ip ##

function getip()
{

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
                    if (ip2long($ips[$i]) != -1) {
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

function encodeStr($variable)
{

    ############################################
    $key = "xitgmLwmp";
    $index = 0;
    $temp = "";
    $variable = str_replace("=", "?O", $variable);
    for ($i = 0; $i < strlen($variable); $i++) {
        $temp .= $variable[$i] . $key[$index];
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

function decodeStr($enVariable)
{
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
            $temp .= $enVariable[$i];
        }
        $current++;
    }
    $temp = str_replace("?O", "=", $temp);
    parse_str($temp, $variable);
    return $temp;
}

## alert popup ##

function alertpopup($idform, $msg, $status = false, $return = false, $html = null, $redirect = true, $type)
{
    global $url_show_lang, $lang_set, $lang_default;
    unset($_SESSION['alert']);
    $_SESSION['alert']['id'] = $idform;
    $_SESSION['alert']['msg'] = $msg;
    $_SESSION['alert']['status'] = $status;
    $_SESSION['alert']['return'] = $return;
    $_SESSION['alert']['type'] = $type;
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
## ALERT SUBMIT SUCCESS

function alertsubmit($idform, $title, $msg, $status = false, $return = false, $html = null, $redirect = true, $type)
{
    global $url_show_lang, $lang_set, $lang_default;
    unset($_SESSION['alertsubmit']);
    $_SESSION['alertsubmit']['id'] = $idform;
    $_SESSION['alertsubmit']['title'] = $title;
    $_SESSION['alertsubmit']['msg'] = $msg;
    $_SESSION['alertsubmit']['status'] = $status;
    $_SESSION['alertsubmit']['return'] = $return;
    $_SESSION['alertsubmit']['type'] = $type;
    if (!empty($html)) {
        $_SESSION['alertsubmit']['html'] = $html;
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

##############################################

function DateThai($strDate, $function = null, $lang = "th", $type = "shot")
{

    global $strMonthCut, $url;

    // $lang = $url->pagelang[2];
    // $lang = 'en';
    // print_pre($strMonthCut);
    //  global $slug;
    //   $lang = $slug['pageLang'];
    ##############################################
    if ($lang == 'th') {
        $strYear = date("Y", strtotime($strDate)) + 543;
    } else {
        $strYear = date("Y", strtotime($strDate));
    }
    $strYear2 = date("Y", strtotime($strDate));
    $strYear_mini = substr($strYear, 2, 4);
    $strYear_mini_en = substr($strYear2, 2, 4);
    $strMonth = date("n", strtotime($strDate));
    $strMonth_real = date("n", strtotime($strDate));
    $strMonth_full = date("n", strtotime($strDate));
    $strMonth_number = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));

    $strMonth = $strMonthCut[$type][$lang][$strMonth];
    $strMonth_full = $strMonthCut['full'][$lang][$strMonth_full];
    if (!empty($strDate)) {
        switch ($function) {
            case '1':
                $day = "$strDay $strMonth $strYear";
                break;
            case '2':
                $day = "$strDay $strMonth $strYear2";
                break;
            case '3':
                $day = "$strDay $strMonth $strYear_mini";
                break;
            case '4':
                $day = "$strDay $strMonth $strYear , $strHour:$strMinute ";
                break;

            case '5':
                $day = "$strDay $strMonth $strYear , $strHour:$strMinute:$strSeconds ";
                break;
            case '6':
                $day = "$strDay";
                break;
            case '7':
                $day = "$strMonth $strYear";
                break;
            case '8':
                $day = "$strHour:$strMinute";
                break;
            case '9':
                $day = "$strMonth";
                break;
            case '10':
                $day = "$strYear";
                break;
            case '11':
                $day = "วันที่ $strDay $strMonth $strYear | เวลา $strHour:$strMinute น.";
                break;
            case '12':

                $previousTimeStamp = strtotime(str_replace("-", "/", $strDate));
                $lastTimeStamp = strtotime(str_replace("-", "/", date("Y-m-d H:i:s")));

                // strtotime("2013/09/17 12:34:11");

                $menos = $lastTimeStamp - $previousTimeStamp;

                $mins = $menos / 60;
                if ($mins < 1) {
                    $showing = $menos . " วินาที";
                } else {
                    $minsfinal = floor($mins);
                    $secondsfinal = $menos - ($minsfinal * 60);
                    $hours = $minsfinal / 60;
                    if ($hours < 1) {
                        $showing = $minsfinal . " นาที " . $secondsfinal . " วินาที";
                    } else {
                        $hoursfinal = floor($hours);
                        $minssuperfinal = $minsfinal - ($hoursfinal * 60);
                        $days = $hoursfinal / 24;
                        if ($days < 1) {
                            $showing = $hoursfinal . " ชั่วโมง " . $minssuperfinal . " นาที " . $secondsfinal . " วินาที";
                        } else {
                            $daysfinal = floor($days);
                            $hourssuperfinal = $hoursfinal - ($daysfinal * 24);
                            $showing = "ผ่านมาแล้ว " . $daysfinal . " วัน " . $hourssuperfinal . " ชั่วโมง " . $minssuperfinal . " นาที " . $secondsfinal . " วินาที";
                        }
                    }
                }
                $day = $showing;
                break;

            case '13':
                $day = "$strDay<br/>$strMonth";
                break;
            case '14':
                $day = "$strDay" . "th" . " $strMonth_full $strYear2";
                break;
            case '15':
                $day = "$strMonth_full $strDay, $strYear2";
                break;
            case '16':
                $day = "$strDay.$strMonth_number.$strYear_mini_en";
                break;
            case '17':
                $day = "$strDay.$strMonth_number.$strYear2";
                break;
            case '18':
                $strMonth_number = sprintf("%02d", $strMonth_number);
                $day = "<strong>$strDay</strong>$strMonth_number.$strYear2";
                break;
            case '19':
                $strMonth_number = sprintf("%02d", $strMonth_number);
                $day = "$strDay.$strMonth_number.$strYear2";
                break;
            case '20':
                $strMonth = $strMonthCut['shot2']['en'][$strMonth_real];
                $day = "$strMonth $strDay, $strYear2";
                break;
            case '21':
                $day = "$strDay $strMonth";
                break;
            case '22':
                $day = "$strDay $strMonth $strYear " . "เวลา" . $strHour . ":" . $strMinute . " น. ";
                break;
            case '23':
                $day = "$strDay-$strMonth_number-$strYear2";
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

function checkexpire($date)
{
    //  $startdate = "16-May-2016";
    $expire = strtotime($date);
    $today = strtotime("today midnight");

    if ($today >= $expire) {
        return true;
    } else {
        return false;
    }
}

############################################

function changeQuot($Data)
{
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

function pagepagination($uri, $limit = null)
{
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

    if (!empty($uri->uri)) {
        if (array_key_exists('page', $uri->uri)) {
            $pageOn['on'] = $uri->uri['page'];
        } else {
            $pageOn['on'] = 1;
        }
    } else {
        $pageOn['on'] = 1;
    }

    return $pageOn;
}

############################################

function resize($img, $w, $h, $newfilename)
{
    ############################################
    //Check if GD extension is loaded
    if (!extension_loaded('gd') && !extension_loaded('gd2')) {
        trigger_error("GD is not loaded", E_USER_WARNING);
        return false;
    }

    //Get Image size info
    $imgInfo = getimagesize($img);
    switch ($imgInfo[2]) {
        case 1:
            $im = imagecreatefromgif($img);
            break;
        case 2:
            $im = imagecreatefromjpeg($img);
            break;
        case 3:
            $im = imagecreatefrompng($img);
            break;
        default:
            trigger_error('Unsupported filetype!', E_USER_WARNING);
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
    if (($imgInfo[2] == 1) or ($imgInfo[2] == 3)) {
        imagealphablending($newImg, false);
        imagesavealpha($newImg, true);
        $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
        imagefilledrectangle($newImg, 0, 0, $nWidth, $nHeight, $transparent);
    }
    imagecopyresampled($newImg, $im, 0, 0, 0, 0, $nWidth, $nHeight, $imgInfo[0], $imgInfo[1]);

    //Generate the file, and rename it to $newfilename
    switch ($imgInfo[2]) {
        case 1:
            imagegif($newImg, $newfilename);
            break;
        case 2:
            imagejpeg($newImg, $newfilename);
            break;
        case 3:
            imagepng($newImg, $newfilename);
            break;
        default:
            trigger_error('Failed resize image!', E_USER_WARNING);
            break;
    }

    return $newfilename;
}

function fileinclude($filename, $fileType = 'html', $mod_tb_about_masterkey, $for = 'check', $crop = false, $cropthumb = false)
{
    global $path_upload, $path_upload_url, $path_template, $templateweb, $core_pathname_upload, $detectDivice, $path_upload_local;

    if ($for == 'linkthumb') {
        $fileType = "album";
        // $filename = "reO_" . $filename;
    }

    if (!empty($fileType)) {
        $checkFile = $path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
    } else {
        $checkFile = $path_upload . "/" . $mod_tb_about_masterkey . "/" . $filename;
    }
    $path_url_vdo = _URL . 'upload/';
    $checkFileCrop = $path_upload . "/" . $mod_tb_about_masterkey . "/crop/" . $filename;

    if (!empty($cropthumb)) {
        $checkFileCropThumb = $path_upload . "/" . $mod_tb_about_masterkey . "/cropthumb/" . $filename;
    }

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
                $setimg = str_replace($path_upload, "", $checkFileCropThumb);
            }
        }
    } else {
        $setFoldet = _URL . $path_template[$templateweb][0];
        if ($mod_tb_about_masterkey == 'cu') {
            $setimg = "/public/image/asset/default_boss.png";
        } else {
            $setimg = "/assets/img/static/no-img.png";
        }
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
        case 'vdo':
            $pathFile = $path_url_vdo . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            break;

        case 'album':
            $pathFile = $path_upload_url . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            break;

        default:
            $pathFile = $path_upload . "/" . $mod_tb_about_masterkey . "/" . $fileType . "/" . $filename;
            break;
    }
    return $pathFile;
}

function callhtml($valhtml)
{
    if (is_file($valhtml)) {
        $fd = @fopen($valhtml, "r");
        $contents = @fread($fd, @filesize($valhtml));
        @fclose($fd);
        echo txtReplaceHTML($contents);
    }
}

####################################################

function txtReplaceHTML($data)
{
    ####################################################
    $dataHTML = str_replace("\\", "", $data);
    return $dataHTML;
}

## texttolink ##

function texttolink($txt)
{
    $txt = trim($txt);
    $txt = str_replace(" ", "-", $txt);
    return $txt;
}

## gennerateencode to include image ##

function gennerateencode($namefile, $masterkey, $folder, $crop = false)
{
    return _URL . "file?p=" . encodeStr($namefile . "," . $masterkey . "," . $folder . "," . $crop) . "&d=" . date('YmdH');
}

## clear method ##

function clearmethod()
{
    if (empty($_SESSION['sessionMetod'])) {
        $_SESSION['sessionMetod'] = true;
        header("Location:" . $_SERVER['REQUEST_URI']);
    } else {
        $_SESSION['sessionMetod'] = false;
    }
}

## goto 404 ##

function page404()
{
    global $linklang;
    header("Location:" . $linklang . "/404");
}

function checkDiscount($price, $discount, $type = null)
{
    switch ($type) {
        default:
            if ($discount >= 1) {
                return ((($price - $discount) / $price) * 100);
            } else {
                return 0;
            }
            break;
    }
}

function embetyoutube($link)
{
    ####################################
    return str_replace("watch?v=", "embed/", $link);
}

####################################################

function get_IconSize($LinkRelativePath)
{
    ####################################################
    $filesize = @filesize($LinkRelativePath);
    if ($filesize < 10485) {
        $sizeFile = number_format($filesize / 1024, 2) . " Kb";
    } else {
        $sizeFile = number_format($filesize / (1024 * 1024), 2) . " Mb";
    }
    return ($sizeFile);
}

####################################################

function get_Icon($DownloadFile, $type = "")
{
    ####################################################

    $ImageType = strrchr($DownloadFile, '.');

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

function logs($action, $actionType, $ccheck = true)
{


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

/* =Function
  -------------------------------------------------------------- */

function generate_date_today($Timestamp, $Language = "en", $TimeText = true)
{
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
    } else {
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
                    $StrCache = '';
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

function multiexplode($delimiters, $string)
{

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return $launch;
}

/* =Function
  -------------------------------------------------------------- */


/* ############################################### */

function loadSendEmailTo($mailTo, $subjectMail = null, $messageMail = null)
{
    global $coreLanguageSQL;

    /* ############################################### */
    // new sent email to user
    require_once _DIR . '/front/libs/sendEmailPHP7.php';

    return $valSendMailStatus;
}

///  FORMAT FORM NUM VALUE /////
function formatreplace($value)
{
    $valuelen = strlen($value);
    switch ($valuelen) {
        case 16:
            return preg_replace("/(\d{4})(\d{4})(\d{4})(\d{4})/", "**** **** **** $4", $value);
            break;
        case 13:
            return preg_replace("/(\d{1})(\d{4})(\d{5})(\d{2})(\d{1})/", "$1-$2-$3-$4-$5", $value);
            break;
        case 10:
            return preg_replace("/(\d{3})(\d{3})(\d{4})/", "$1-$2-$3", $value);
            break;
        case 9:
            return preg_replace("/(\d{2})(\d{3})(\d{4})/", "$1-$2-$3", $value);
            break;
        default:
    }
}

///  FORMAT FORM NUM VALUE /////
function addzero($value)
{
    $valuelen = strlen($value);
    switch ($valuelen) {
        case 1:
            return '000000' . $value;
            break;
        case 2:
            return '00000' . $value;
            break;
        case 3:
            return '0000' . $value;
            break;
        case 4:
            return '000' . $value;
            break;
        case 5:
            return '00' . $value;
            break;
        case 6:
            return '0' . $value;
            break;
        case 7:
            return $value;
            break;
        default:
            return $value;
            break;
    }
}
//////////////////////HOW TO USE CURRENCY CONVERTER///////////////////////
// $ratechage = $_GET['bath'];

// $rateshow = exchangerate("THB", "JPY", $ratechage);

// echo "<pre>";
// print_r(number_format($rateshow,2));
// echo "</pre>";

function exchangerateperday($from, $tocurent, $rate)
{
    $bath = $rate;
    $homepage = file_get_contents('https://coinmill.com/THB_calculator.html#THB=' . $bath);

    preg_match_all("/currency_data\=\'(.*)\'/i", $homepage, $matches);

    $listCountry = explode("|", $matches['1']['0']);

    $listCurency = array();
    foreach ($listCountry as $createList) {
        $explord = explode(",", $createList);
        $listCurency[$explord[0]]['rate'] = $explord[1];
        $listCurency[$explord[0]]['ex'] = $explord[2];
    }
    $cal = ($listCurency[$from]['rate'] / $listCurency[$tocurent]['rate']) * $bath;
    return $cal;
}


function exchangeraterealtime($from, $tocurent, $rate)
{
    $bath = $rate;
    $homepage = file_get_contents('https://th.exchange-rates.org/converter/' . $from . '/' . $tocurent . '/' . $bath);
    preg_match("/\<span id\=\"ctl00_M_lblToAmount\"\>([\d.]+?)\<\/span\>/", $homepage, $matches);
    return $matches['1'];
}

function calestimate($value, $type)
{
    switch ($type) {

        case 1:
            if ($value <= 5000) {
                $price = 250;
            } else {
                $price = $value * 5 / 100;
            }
            break;

        case 2:
            if ($value <= 5000) {
                $price = $value + 250;
            } else {
                $price = ($value * 5 / 100) + $value;
            }
            break;

        default:
            if ($value <= 5000) {
                $price = 250;
            } else {
                $price = $value * 5 / 100;
            };
    }

    return $price;
}

function checkLink($varlink = "#")
{
    if ($varlink == '#' || $varlink == '') {
        $link = 'javascript:void(0)';
    } else {
        $link = $varlink;
    }
    return $link;
}

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

function checkMenuActive($munu, $menuActive)
{
    if ($munu == $menuActive) {
        return 'class="active"';
    }
}
