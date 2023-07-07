<?

include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");
$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

$sqlCheck = "SELECT " . $mod_tb_set . "_id   FROM " . $mod_tb_set . " WHERE " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  ";
$queryCheck = wewebQueryDB($coreLanguageSQL, $sqlCheck);
$countNumCheck = wewebNumRowsDB($coreLanguageSQL, $queryCheck);


if ($countNumCheck <= 0) {
    $insert = "";
    $insert[$mod_tb_set . "_language"] = "'" . $_SESSION[$valSiteManage . 'core_session_language'] . "'";
    $insert[$mod_tb_set . "_masterkey"] = "'" . $_REQUEST["masterkey"] . "'";
    $insert[$mod_tb_set . "_crebyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_set . "_creby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_set . "_lastbyid"] = "'" . $_SESSION[$valSiteManage . 'core_session_id'] . "'";
    $insert[$mod_tb_set . "_lastby"] = "'" . $_SESSION[$valSiteManage . 'core_session_name'] . "'";
    $insert[$mod_tb_set . "_lastdate"] = "NOW()";
    $insert[$mod_tb_set . "_credate"] = "NOW()";
    $sqlInsert = "INSERT INTO " . $mod_tb_set . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $queryInsert = wewebQueryDB($coreLanguageSQL, $sqlInsert);
   //$queryInsert = $dbConnect->execute($queryInsert);
}

$sql = "SELECT
" . $mod_tb_set . "_id,
" . $mod_tb_set . "_credate ,
" . $mod_tb_set . "_crebyid,
" . $mod_tb_set . "_lastdate,
" . $mod_tb_set . "_lastbyid,
" . $mod_tb_set . "_description,
" . $mod_tb_set . "_keywords,
" . $mod_tb_set . "_metatitle,
" . $mod_tb_set . "_subject,
" . $mod_tb_set . "_subjecten,
" . $mod_tb_set . "_titleen,
" . $mod_tb_set . "_subjectsm,
" . $mod_tb_set . "_titlesm,
" . $mod_tb_set . "_social,
" . $mod_tb_set . "_config,
" . $mod_tb_set . "_addresspic,
" . $mod_tb_set . "_subjectoffice,
" . $mod_tb_set . "_subjectofficeen,
" . $mod_tb_set . "_descriptionen,
" . $mod_tb_set . "_keywordsen,
" . $mod_tb_set . "_metatitleen,
" . $mod_tb_set . "_qr,
" . $mod_tb_set . "_hotlinepic,
" . $mod_tb_set . "_hotline,
" . $mod_tb_set . "_slogan,
" . $mod_tb_set . "_sloganen,
" . $mod_tb_set . "_fac

 FROM " . $mod_tb_set . " WHERE " . $mod_tb_set . "_masterkey='" . $_REQUEST["masterkey"] . "'  ";
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
$valID = $Row[0];
$valCredate = DateFormat($Row[1]);
$valCreby = $Row[2];
$valLastdate = DateFormat($Row[3]);
$valLastby = $Row[4];
$valDescription = rechangeQuot($Row[5]);
$valKeywords = rechangeQuot($Row[6]);
$valMetatitle = rechangeQuot($Row[7]);
$valSubject = $Row[8];
$valSubjecten = $Row[9];

//$valTitle = rechangeQuot($Row[9]);
//$valTitleEn = rechangeQuot($Row[10]);

$valTitle = $Row[$mod_tb_set . "_title"];
$valTitleEn = $Row[$mod_tb_set . "_titleen"];

$valSubjectSm = rechangeQuot($Row[11]);
$valTitleSm = rechangeQuot($Row[12]);

$valPicName = $Row[15];
$valPic = $mod_path_pictures . "/" . $Row[15];

$ValSocial = unserialize($Row['' . $mod_tb_set . '_social']);
$ValConfig = unserialize($Row['' . $mod_tb_set . '_config']);
$valSubjectOffice = rechangeQuot($Row[16]);
$valSubjectOfficeen = rechangeQuot($Row[17]);
$valDescriptionen = $Row[18];
$valKeywordsen = $Row[19];
$valMetatitleen = $Row[20];

$valOrName = $Row[21];
$valQr = $mod_path_pictures . "/" . $Row[21];

$valHotlineName = $Row[22];
$valHotline = $mod_path_pictures . "/" . $Row[22];

$valHotlineNameH = $Row[23];
$valHotlineH = $mod_path_pictures . "/" . $Row[23];
$ValSlogan = unserialize($Row['' . $mod_tb_set . '_slogan']);
$ValSloganen = unserialize($Row['' . $mod_tb_set . '_sloganen']);

$ValFac = unserialize($Row['' . $mod_tb_set . '_fac']);
$listDataDetail= array();
foreach ($ValFac as $titleKey => $value){
  foreach ($value as $key => $valueDetail){
    $listDataDetail[$key][$titleKey] =  $valueDetail;
  }
}
$ValFac = $listDataDetail;
$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);
logs_access('3', 'View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow"/>
        <meta name="googlebot" content="noindex, nofollow"/>
        <link href="../css/theme.css" rel="stylesheet"/>

        <title><?= $core_name_title ?></title>
        <script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
    </head>

    <body>
        <form action="?" method="get" name="myForm" id="myForm">
            <input name="execute" type="hidden" id="execute" value="update" />
            <input name="masterkey" type="hidden" id="masterkey" value="<?= $_REQUEST['masterkey'] ?>" />
            <input name="menukeyid" type="hidden" id="menukeyid" value="<?= $_REQUEST['menukeyid'] ?>" />
            <input name="inputSearch" type="hidden" id="inputSearch" value="<?= $_REQUEST['inputSearch'] ?>" />
            <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?= $_REQUEST['module_pageshow'] ?>" />
            <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?= $_REQUEST['module_pagesize'] ?>" />
            <input name="module_orderby" type="hidden" id="module_orderby" value="<?= $_REQUEST['module_orderby'] ?>" />
            <input name="inputGh" type="hidden" id="inputGh" value="<?= $_REQUEST['inputGh'] ?>" />
            <input name="valEditID" type="hidden" id="valEditID" value="<?= $_REQUEST['valEditID'] ?>" />
            <? if ($_REQUEST['viewID'] <= 0) { ?>
                <div class="divRightNav">
                    <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                            <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= getNameMenu($_REQUEST["menukeyid"]) ?></span></td>
                            <td  class="divRightNavTb" align="right">

                            </td>
                        </tr>
                    </table>
                </div>
            <? } ?>
            <div class="divRightHead">
                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                    <tr>
                        <td height="77" align="left"><span class="fontHeadRight"><?= getNameMenu($_REQUEST["menukeyid"]) ?></span></td>
                        <td align="left">
                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                <tr>
                                    <td align="right">
                                        <? if ($valPermission == "RW" && $_REQUEST['viewID'] <= 0) { ?>

                                            <table  border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td align="center">
                                                        <table  align="center" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td align="center">
                                                                    <div  class="btnEditView" title="<?= $langTxt["btn:edit"] ?>" onclick="
                                                                                document.myFormHome.valEditID.value =<?= $valID ?>;
                                                                                editContactNew('../<?= $mod_fd_root ?>/editSet.php')"></div>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </table>

                                        <? } ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="divRightMain" >
                <br />
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;" >
                            <span class="formFontSubjectTxt"><?= $langMod["txt:about"] ?></span><br/>
                            <span class="formFontTileTxt"><?= $langMod["txt:aboutDe"] ?></span>                            </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["ab:subject"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valSubject ?></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["ab:office"] ?>(<?= $langTxt["lg:thai"] ?>) :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valSubjectOffice ?></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["ab:office"] ?>(<?= $langTxt["lg:eng"] ?>) :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valSubjectOfficeen ?></div></td>
                    </tr>
                </table><br />


                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                            <span class="formFontSubjectTxt"><?= $langMod["txt:set"] ?></span><br/>
                            <span class="formFontTileTxt"><?= $langMod["txt:setDe"] ?></span>   </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seotitle"] ?> (<?= $langTxt["lg:thai"] ?>): <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valMetatitle ?></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seodes"] ?> (<?= $langTxt["lg:thai"] ?>): <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valDescription ?></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seokey"] ?> (<?= $langTxt["lg:thai"] ?>): <span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valKeywords ?></div></td>
                    </tr>


                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seotitle"] ?> (<?= $langTxt["lg:eng"] ?>):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valMetatitleen ?></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seodes"] ?> (<?= $langTxt["lg:eng"] ?>):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valDescriptionen ?></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seokey"] ?> (<?= $langTxt["lg:eng"] ?>):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valKeywordsen ?></div></td>
                    </tr>
                </table>
                <br />


                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                            <span class="formFontSubjectTxt"><?= $langMod["txt:setSocial"] ?></span><br/>
                            <span class="formFontTileTxt"><?= $langMod["txt:setSocialDe"] ?></span>   </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["social:fb"] ?> :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?= $ValSocial[$langMod["social:fb"]]['link'] ?>" target="_blank"><?= $ValSocial[$langMod["social:fb"]]['link'] ?></a></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["social:tw"] ?> :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?= $ValSocial[$langMod["social:tw"]]['link'] ?>" target="_blank"><?= $ValSocial[$langMod["social:tw"]]['link'] ?></a></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["social:yt"] ?> :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?= $ValSocial[$langMod["social:yt"]]['link'] ?>" target="_blank"><?= $ValSocial[$langMod["social:yt"]]['link'] ?></a></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["social:ig"] ?> :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?= $ValSocial[$langMod["social:ig"]]['link'] ?>" target="_blank"><?= $ValSocial[$langMod["social:ig"]]['link'] ?></a></div></td>
                    </tr>
                    <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["social:li"] ?> :<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="<?= $ValSocial[$langMod["social:li"]]['link'] ?>" target="_blank"><?= $ValSocial[$langMod["social:li"]]['link'] ?></a></div></td>
                    </tr> -->
                    <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:qr"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                <? if (is_file($valQr)) { ?>
                                    <img src="<?= $valQr ?>"  style="float:left;border:#c8c7cc solid 1px;"  />
                                <? } ?>
                            </div></td>
                    </tr> -->

                </table>
                <br />


                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" style="padding-top:10px;">
                            <span class="formFontSubjectTxt"><?= $langMod["info:title"] ?></span><br/>
                            <span class="formFontTileTxt"><?= $langMod["info:titlede"] ?></span>   </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:address"] ?> (<?= $langTxt["lg:thai"] ?>):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= nl2br($ValConfig['address']) ?></div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:address"] ?> (<?= $langTxt["lg:eng"] ?>):<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= nl2br($ValConfig['addressen'])?></div></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:tel"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $ValConfig['tel'] ?></div></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:fax"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $ValConfig['fax'] ?></div></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:hotline"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $ValConfig['hotline'] ?></div></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:email"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $ValConfig['email'] ?></div></td>
                    </tr>
                  <tr >
                     <td colspan='8' valign='top' align='right' height='1'><div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div> </td>
                  </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:googlemap"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView">
                                [ <?= $ValConfig['glati'] ?> , <?= $ValConfig['glongti'] ?> ] <br/>
                                <iframe width="80%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?= $ValConfig['glati'] ?>,<?= $ValConfig['glongti'] ?>&hl=es;z=20&amp;output=embed"></iframe>
                                <br />
                            </div></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:picaddress"] ?>:<span class="fontContantAlert"></span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                <? if (is_file($valPic)) { ?>
                                    <img src="<?= $valPic ?>"  style="float:left;border:#c8c7cc solid 1px;" width="600"  />
                                <? } ?>
                            </div></td>
                    </tr>
                </table>
                
                <br />

                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom" >
                            <span class="formFontSubjectTxt"><?= $langTxt["us:titleinfo"] ?></span><br/>
                            <span class="formFontTileTxt"><?= $langTxt["us:titleinfoDe"] ?></span>     </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langTxt["us:credate"] ?>:</td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView"><?= $valCredate ?></div>         </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langTxt["us:creby"] ?>:</td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView">
                                <?
                                if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                    echo getUserThai($valCreby);
                                } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                    echo getUserEng($valCreby);
                                }
                                ?>
                            </div>         </td>
                    </tr>


                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langTxt["us:lastdate"] ?>:</td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView"><?= $valLastdate ?></div>         </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langTxt["us:creby"] ?>:</td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="formDivView">
                                <?
                                if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                    echo getUserThai($valLastby);
                                } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                    echo getUserEng($valLastby);
                                }
                                ?>
                            </div>         </td>
                    </tr>



                    <tr >
                        <td colspan="7" align="right"  valign="top" height="20"></td>
                    </tr>
                </table>
                <br />

                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >
                    <? if ($_REQUEST['viewID'] <= 0) { ?>


                        <tr >
                            <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?= $langTxt["btn:gototop"] ?>"><?= $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                        </tr>
                    <? } ?>
                </table>
            </div>
        </form>
        <? include("../lib/disconnect.php"); ?>

    </body>
</html>
