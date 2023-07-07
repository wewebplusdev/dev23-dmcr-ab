<?php
$callSetWebsite = new settingWebsite();
$infoSetting = $callSetWebsite->callSetting();
$smarty->assign("typeMember", $typeMember);


/*End get token*/

/*Start get Setting*/
$valMainSiteData = $infoSetting->fields;
$valSiteUpdatedateArray = explode(" ", $valMainSiteData['lastdate']);
$valSiteUpdatedate = strtotime("+1 day", strtotime($valSiteUpdatedateArray[0]));
if ($valMainSiteData->lastdate == "") {
  $valSiteUpdatedate = $valSiteRealdate;
}

if ($valMainSiteData == "" || $valSiteUpdatedate >= $valSiteRealdate) {
    $callsetting = $callSetWebsite->callSetting();
}

/*End get Setting*/


$segment = $url->segment[0];
$smarty->assign("segment", $segment);


$_setting = array(
    'subject' => 'subject',
    'gsubject' => 'gsubject',
    'title' => 'title',
    'credate' => 'credate',
    'page-km' => 'knowledge',
);
$smarty->assign("_setting", $_setting);

Seo();
function Seo($title = '', $desc = '', $keyword = '')
{
    global $smarty, $infoSetting, $arr_metatag, $url;
    $list = array();
    if (!empty($title)) {
        if (!empty($infoSetting->fields['metatitle'])) {
            $list_last = $infoSetting->fields['metatitle'];
        } elseif (!empty($infoSetting->fields['subject'])) {
            $list_last = $infoSetting->fields['subject'];
        } else {
            $list_last = $arr_metatag[$url->pagelang[2]];
        }

        $list['title'] = trim($title) . " - " . $list_last;
    } else {
        if (!empty($infoSetting->fields['metatitle'])) {
            $list['title'] = $infoSetting->fields['metatitle'];
        } elseif (!empty($infoSetting->fields['subject'])) {
            $list['title'] =$infoSetting->fields['subject'];
        } else {
            $list['title'] = $arr_metatag[$url->pagelang[2]];
        }
    }

    if (!empty($desc)) {
        $list['desc'] = trim($desc);
    } else {
        $list['desc'] = $infoSetting->fields['description'];
    }

    if (!empty($keyword)) {
        $list['keyword'] = trim($keyword);
    } else {
        $list['keyword'] = $infoSetting->fields['keyword'];
    }
    $smarty->assign("seo", $list);
}

#### SETTING


$settingWeb = array();
$settingWeb['masterkey'] = $infoSetting->fields['masterkey'];
$settingWeb['subject'] = $infoSetting->fields['subject'];
$settingWeb['subjecten'] = $infoSetting->fields['subjecten'];
$settingWeb['subjectoffice'] = $infoSetting->fields['subjectoffice'];
$settingWeb['subjectofficeen'] = $infoSetting->fields['subjectofficeen'];
$settingWeb['description'] = $infoSetting->fields['description'];
$settingWeb['keywords'] = $infoSetting->fields['keywords'];
$settingWeb['metatitle'] = $infoSetting->fields['metatitle'];
$settingWeb['contact'] = unserialize($infoSetting->fields['config']);
$settingWeb['social'] = unserialize($infoSetting->fields['social']);
$settingWeb['addresspic'] = $infoSetting->fields['addresspic'];
$smarty->assign("settingWeb", $settingWeb);


class settingWebsite
{

    // function apiCallSetting()
    // {
    //     global $urlapi;
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => '' . $urlapi . '?method=CallSettingSite',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'GET',
    //         CURLOPT_HTTPHEADER => array(
    //             'Authorization: Bearer ' . $_SESSION['token']->tokenid . ''
    //         ),
    //     ));

    //     $response = curl_exec($curl);
    //     $obj = json_decode($response);
    //     // print_pre($obj);
    //     curl_close($curl);

    //     $SettingMainSite = array();
    //     $SettingMainSite['social'] = $obj->list_data[0]->social;
    //     $SettingMainSite['config'] = $obj->list_data[0]->config;


    //     unset($_SESSION['settingpage'],$_SESSION['SettingMainSite']);

    //     $_SESSION['settingpage'] = $obj->list_data[0];
    //     $_SESSION['SettingMainSite'] = $SettingMainSite;

    //     return $obj->list_data;
    // }
    function callSetting()
    {
        global $config, $db, $url;
        $lang = $url->pagelang[3];
        $sql = "SELECT
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_id as id,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_masterkey as masterkey,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_subject as subject,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_subjecten as subjecten,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_subjectoffice as subjectoffice,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_subjectofficeen as subjectofficeen,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_description as description,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_keywords as keywords,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_metatitle as metatitle,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_social as social,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_config as config,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_addresspic  as addresspic,
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_lastdate  as lastdate
        FROM
        " . $config['setting']['db'] . "
        WHERE
        " . $config['setting']['db'] . "." . $config['setting']['db'] . "_masterkey = '" . $config['setting']['masterkey'] . "' 
        ";
// print_pre($sql);
        $result = $db->execute($sql);
        return $result;
    }

    function Call_Album($id, $table, $lang = null)
    {
        global $config, $db, $url,$infolang;
        $lang = $url->pagelang[3];

        $sql = "SELECT 
            " . $table . "." . $table . "_id                AS id,
            " . $table . "." . $table . "_contantid         AS contantid,
            " . $table . "." . $table . "_filename          AS filename,
            " . $table . "." . $table . "_name              AS name,
            " . $table . "." . $table . "_download          AS download
            FROM " . $table . "  
            WHERE 1=1 AND
            " . $table . "." . $table . "_contantid = '" . $id . "'
            AND
            " . $table . "." . $table . "_language = '" . $url->pagelang[4] . "'
            ";

        $sql .= " ORDER BY " . $table . "." . $table . "_id ASC ";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
    }

    function Call_File($id)
    {
        global $config, $db, $url,$infolang;
        $lang = $url->pagelang[3];
        $langFull = $url->pagelang[4];

        $sql = "SELECT 
            " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_id                AS id,
            " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_contantid         AS contantid,
            " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_filename          AS filename,
            " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_name              AS name,
            " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_download          AS download
            FROM " . $config['cmf']['db']['main'] . "  
            WHERE 1=1 
            AND " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_contantid = '" . $id . "'
            AND " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_language = '" . $url->pagelang[4] . "'
            ";

        $sql .= " ORDER BY " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_id ASC ";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
    }
    
    
    function updateView($id, $masterkey, $table)
    {
        global $config, $db, $url;

        $sql = "SELECT
        " . $table . "." . $table . "_view
        FROM
        " . $table . "
        WHERE
        " . $table . "." . $table . "_masterkey = '$masterkey' 
        AND
        " . $table . "." . $table . "_id = '$id' 
        ";
        // print_pre($sql);
        $result = $db->execute($sql);
        $view = $result->fields[0] + 1;

        $listView[$table . '_view'] = $view;
        $updateView = sqlupdate($listView, $table, $table . "_id", "'" . $id . "'");

        return $updateView;
    }

    function Call_File_Table($id, $table = 'md_cmf')
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
            ";

        $sql .= " ORDER BY " . $table . "." . $table . "_id ASC ";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
    }

    function template_mail($body){
        global $settingWeb, $path_template, $templateweb, $url;
        $strHTML = "<!doctype html>
        <html lang='en'>
        
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'
                integrity='sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x' crossorigin='anonymous'>
        </head>
        
        <body>
            <table border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
                <tbody>
                    <tr>
                        <td>
                            <table style='font-family: Arial, sans-serif; border: 1px solid #ebebeb; height: 629px;' border='0'
                                width='600' cellspacing='0' cellpadding='0' align='center'>
                                <tbody>
                                    <tr style='height: 22px;'>
                                        <td style='height: 22px; width: 596px; padding-top: 10px;border-bottom:1px solid #ebebeb;'>
                                            <table style='width: 100%;' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
                                                <tbody>
                                                    <tr>
                                                        <td style='width: 2%;'></td>
                                                        <td style='width: 24.9161%;'><img
                                                                src='"._URL."/".$path_template[$templateweb][0]."/assets/img/static/mnre-logo.png'
                                                                style='width: 90px;' alt='git-logo.png'></td>
                                                        <td
                                                            style='width: 54.9161%; font-size: 14px; color: #666;text-align: right;padding-right: 20px;'>
                                                            <b>".$settingWeb['contact']['address'.$url->pagelang[3]]."</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>";
        $strHTML .= $body;
        $tel_explode = explode(",", $settingWeb['contact']['tel']);
        $strHTML .="                <tr style='height: 298px;'>
                                        <td style='height: 298px; width: 596px;'>
                                            <table style='background-color: #fbfbfb;' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
                                                <tbody>
                                    <tr>
                                        <td width='40'>&nbsp;</td>
                                        <td valign='top'>
                                            <table style='background-color: #fbfbfb; height: 186px; width: 100%;' border='0' width='100%'
                                                cellspacing='0' cellpadding='0' align='center'>
                                                <tbody>
                                                    <tr style='height: 45px;'>
                                                        <td style='height: 45px;'>
                                                            <div style='font-size: 13px; font-weight: bold; color: #037ee5; line-height: 1.2em;'>
                                                            ".$settingWeb['subjectoffice']."</div>
                                                        </td>
                                                    </tr>
                                                    <tr style='height: 18px;'>
                                                        <td style='height: 18px;' height='8'>&nbsp;</td>
                                                    </tr>
                                                    <tr style='height: 18px;'>
                                                        <td style='height: 18px;'>
                                                            <table border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div style='font-size: 11px; color: #666;'><img
                                                                                    style='display: inline-block; vertical-align: middle;'
                                                                                    src='"._URL . $path_template[$templateweb][0]."/assets/img/static/template-tel.jpg' alt='template-tel.jpg' />".$tel_explode[0]."</div>
                                                                        </td>
                                                                        <td>
                                                                            <div style='font-size: 11px; color: #666;'><img
                                                                                    style='display: inline-block; vertical-align: middle;'
                                                                                    src='"._URL . $path_template[$templateweb][0]."/assets/img/static/template-fax.jpg' alt='template-fax.jpg' />".$settingWeb['contact']['fax']."</div>
                                                                        </td>
                                                                        <td>
                                                                            <div style='font-size: 11px; color: #666;'><img
                                                                                    style='display: inline-block; vertical-align: middle;'
                                                                                    src='"._URL . $path_template[$templateweb][0]."/assets/img/static/template-email.jpg'
                                                                                    alt='template-email.jpg' />".$settingWeb['contact']['email']."</div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    <tr style='height: 18px;'>
                                                        <td style='height: 18px;'>";
                                                            if ($settingWeb['social']['Facebook']['link'] != "" && $settingWeb['social']['Facebook']['link'] != "#") {
                                                                $strHTML .="<a title='Facebook' href='".$settingWeb['social']['Facebook']['link']."'
                                                                    target='_blank' rel='nofollow'><img
                                                                    src='"._URL . $path_template[$templateweb][0]."/assets/img/static/social-fb.png' alt='social-fb.png'
                                                                    height='30' /></a>";
                                                            }
                                                            if ($settingWeb['social']['Twitter']['link'] != "" && $settingWeb['social']['Twitter']['link'] != "#") {
                                                                $strHTML .="<a title='Twitter' href='".$settingWeb['social']['Twitter']['link']."' target='_blank'
                                                                    rel='nofollow'><img src='"._URL . $path_template[$templateweb][0]."/assets/img/static/social-tw.png'
                                                                    alt='social-tw.png' height='30' /></a>";
                                                            }
                                                            if ($settingWeb['social']['Instagram']['link'] != "" && $settingWeb['social']['Instagram']['link'] != "#") {
                                                                $strHTML .="<a title='Instagram' href='".$settingWeb['social']['Instagram']['link']."' target='_blank'
                                                                    rel='nofollow'><img src='"._URL . $path_template[$templateweb][0]."/assets/img/static/social-ig.png'
                                                                    alt='social-ig.png' height='30' /></a>";
                                                            }
                                                            if ($settingWeb['social']['Youtube']['link'] != "" && $settingWeb['social']['Youtube']['link'] != "#") {
                                                                $strHTML .="<a title='Youtube' href='".$settingWeb['social']['Instagram']['link']."'
                                                                    target='_blank' rel='nofollow'><img
                                                                    src='"._URL . $path_template[$templateweb][0]."/assets/img/static/social-yt.png' alt='social-yt.png'
                                                                    height='30' /></a>";
                                                            }
                                                            if ($settingWeb['social']['Line']['link'] != "" && $settingWeb['social']['Line']['link'] != "#") {
                                                                $strHTML .="<a title='Line' href='".$settingWeb['social']['Line']['link']."'
                                                                    target='_blank' rel='nofollow'><img
                                                                    src='"._URL . $path_template[$templateweb][0]."/assets/img/static/social-li.png' alt='social-li.png'
                                                                    height='30' /></a>";
                                                            }
                                            $strHTML .=" </td>
                                                    </tr>
                                                    <tr style='height: 20px;'>
                                                        <td style='height: 20px;' height='20'>&nbsp;</td>
                                                    </tr>
                                                    <tr style='height: 13px;'>
                                                        <td style='height: 13px;'>
                                                            <div style='font-size: 11px; color: #999; line-height: 1.2em;'>&copy;
                                                            2565 สงวนลิขสิทธิ์ตามพระราชบัญญัติลิขสิทธิ์โดย สถาบันการพัฒนาทรัพยากรธรรมชาติและสิ่งแวดล้อมอย่างยั่งยืน (สพท.)</div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                <tr>
                                    <td colspan='5' height='30'>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4' crossorigin='anonymous'>
        </script>
        </body>

        </html>";

        return $strHTML;
    }
}
