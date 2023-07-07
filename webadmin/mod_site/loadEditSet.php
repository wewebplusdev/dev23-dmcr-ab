<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");


$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";

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



 FROM " . $mod_tb_set . " WHERE " . $mod_tb_set . "_id='" . $_REQUEST["valEditID"] . "'  AND " . $mod_tb_set . "_masterkey='site'  ";

//echo $sql;
$Query = wewebQueryDB($coreLanguageSQL, $sql);
$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);

// print_pre($Row);

$valID = $Row[0];
$valCredate = DateFormat($Row[1]);
$valCreby = $Row[2];
$valLastdate = DateFormat($Row[3]);
$valLastby = $Row[4];
$valDescription = $Row[5];
$valKeywords = $Row[6];
$valMetatitle = $Row[7];
$valSubject = $Row[8];
$valSubjecten = $Row[9];
// $valTitle = $Row[$mod_tb_set . "_title"];
// $valTitleEn = $Row[$mod_tb_set . "_titleen"];

$valSubjectSm = $Row[11];
$valTitleSm = $Row[12];

//print_pre($Row);
$valPicName = $Row[15];
$valPic = $mod_path_pictures . "/" . $Row[15];
//print_pre($valTitleEn);



$ValSocial = unserialize($Row['' . $mod_tb_set . '_social']);
$ValConfig = unserialize($Row['' . $mod_tb_set . '_config']);

$valSubject = $Row[8];
$valTitle = $Row[$mod_tb_set . "_title"];
$valSubjectOffice = rechangeQuot($Row[16]);
$valSubjectOfficeen = rechangeQuot($Row[17]);

$valDescriptionen = $Row[18];
$valKeywordsen = $Row[19];
$valMetatitleen = $Row[20];

$valOrName = $Row[21];
$valQr = $mod_path_pictures . "/" . $Row[21];

$valHotlineName = $Row[22];
$valHotline = $mod_path_pictures . "/" . $Row[22];
// $valHotlineTel = $Row[23];
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
//print_pre($listDataDetail);

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);

$myRand = time() . rand(111, 999);
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
        <script language="JavaScript" type="text/javascript">
            function executeSubmit() {
                with (document.myForm) {

                    if (isBlank(inputSubject)) {
                        inputSubject.focus();
                        jQuery("#inputSubject").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
                    }

                    if (isBlank(inputOffice)) {
                        inputOffice.focus();
                        jQuery("#inputOffice").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputOffice").removeClass("formInputContantTbAlertY");
                    }

                    // if (isBlank(inputSubjecten)) {
                    //     inputSubjecten.focus();
                    //     jQuery("#inputSubjecten").addClass("formInputContantTbAlertY");
                    //     return false;
                    // } else {
                    //     jQuery("#inputSubjecten").removeClass("formInputContantTbAlertY");
                    // }

                    
                    if (isBlank(inputOfficeen)) {
                        inputOfficeen.focus();
                        jQuery("#inputOfficeen").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputOfficeen").removeClass("formInputContantTbAlertY");
                    }



                    if (isBlank(inputTagTitle)) {
                        inputTagTitle.focus();
                        jQuery("#inputTagTitle").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagTitle").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(inputTagDescription)) {
                        inputTagDescription.focus();
                        jQuery("#inputTagDescription").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagDescription").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(inputTagKeywords)) {
                        inputTagKeywords.focus();
                        jQuery("#inputTagKeywords").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagKeywords").removeClass("formInputContantTbAlertY");
                    }
                    
                    if (isBlank(inputTagTitleEN)) {
                        inputTagTitleEN.focus();
                        jQuery("#inputTagTitleEN").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagTitleEN").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(inputTagDescriptionEN)) {
                        inputTagDescriptionEN.focus();
                        jQuery("#inputTagDescriptionEN").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagDescriptionEN").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(inputTagKeywordsEN)) {
                        inputTagKeywordsEN.focus();
                        jQuery("#inputTagKeywordsEN").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#inputTagKeywordsEN").removeClass("formInputContantTbAlertY");
                    }

                    if (isBlank(socialFb)) {
                        socialFb.focus();
                        jQuery("#socialFb").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialFb").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(socialTw)) {
                        socialTw.focus();
                        jQuery("#socialTw").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialTw").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(socialYt)) {
                        socialYt.focus();
                        jQuery("#socialYt").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialYt").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(socialIg)) {
                        socialIg.focus();
                        jQuery("#socialIg").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#socialIg").removeClass("formInputContantTbAlertY");
                    }
                    // if (isBlank(socialLi)) {
                    //     socialLi.focus();
                    //     jQuery("#socialLi").addClass("formInputContantTbAlertY");
                    //     return false;
                    // } else {
                    //     jQuery("#socialLi").removeClass("formInputContantTbAlertY");
                    // }
                    

                    if (isBlank(infoAddress)) {
                        infoAddress.focus();
                        jQuery("#infoAddress").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#infoAddress").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(infoAddressen)) {
                        infoAddressen.focus();
                        jQuery("#infoAddressen").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#infoAddressen").removeClass("formInputContantTbAlertY");
                    }

                    if (isBlank(infoTel)) {
                        infoTel.focus();
                        jQuery("#infoTel").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#infoTel").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(infoFax)) {
                        infoFax.focus();
                        jQuery("#infoFax").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#infoFax").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(infoEmail)) {
                        infoEmail.focus();
                        jQuery("#infoEmail").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#infoEmail").removeClass("formInputContantTbAlertY");
                    }

                    if (isBlank(glati)) {
                        glati.focus();
                        jQuery("#glati").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#glati").removeClass("formInputContantTbAlertY");
                    }
                    if (isBlank(glongti)) {
                        glongti.focus();
                        jQuery("#glongti").addClass("formInputContantTbAlertY");
                        return false;
                    } else {
                        jQuery("#glongti").removeClass("formInputContantTbAlertY");
                    }







                }

                updateContactNew('updateSet.php');

            }





            jQuery(document).ready(function () {

                jQuery('#myForm').keypress(function (e) {
                    /* Start  Enter Check CKeditor */
                var checkFocusTitle =jQuery("#infoAddress").is(":focus");
                var checkFocusTitleEn =jQuery("#infoAddressen").is(":focus");

                    if (e.which == 13) {
                        //e.preventDefault();
								if(!checkFocusTitle){
										if(!checkFocusTitleEn){
                                                executeSubmit();
                                                return false;
											}
										}
                    }
                    /* End  Enter Check CKeditor */
                });
            });

        </script>


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
            <input name="valDelFile" type="hidden" id="valDelFile" value="" />
            <input name="inputHtml" type="hidden" id="inputHtml" value="" />
            <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?= $valhtmlname ?>" />
            <input name="inputLt" type="hidden" id="inputLt" value="<?= $_REQUEST['inputLt'] ?>" />
            <div class="divRightNav">
                <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                    <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('set.php')" target="_self"><?= getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:titleedit"] ?></span></td>
                        <td  class="divRightNavTb" align="right"></td>
                    </tr>
                </table>
            </div>
            <div class="divRightHead">
                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                    <tr>
                        <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:titleedit"] ?></span></td>
                        <td align="left">
                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                <tr>
                                    <td align="right">
                                        <? if ($valPermission == "RW") { ?>
                                            <div  class="btnSave" title="<?= $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                                        <? } ?>
                                        <div  class="btnBack" title="<?= $langTxt["btn:back"] ?>" onclick="btnBackPage('set.php')"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="divRightMain" >
                <br />
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?= $langMod["txt:about"] ?></span><br/>
                            <span class="formFontTileTxt"><?= $langMod["txt:aboutDe"] ?></span>                             </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["ab:subject"] ?><span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?= $valSubject ?>"/></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["ab:office"] ?> (<?= $langTxt["lg:thai"] ?>)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputOffice" id="inputOffice" type="text"  class="formInputContantTb" value="<?= $valSubjectOffice ?>"/></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["ab:office"] ?>(<?= $langTxt["lg:eng"] ?>) <span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputOfficeen" id="inputOfficeen" type="text"  class="formInputContantTb" value="<?= $valSubjectOfficeen ?>"/></td>
                    </tr>
                </table>
                <br />

                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?= $langMod["txt:set"] ?></span><br/>
                            <span class="formFontTileTxt"><?= $langMod["txt:setDe"] ?></span>   </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seotitle"] ?> (<?= $langTxt["lg:thai"] ?>)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagTitle" id="inputTagTitle" type="text"  class="formInputContantTb" value="<?= $valMetatitle ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["inp:seotitlenote"] ?></span></td>
                    </tr>
                        <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seodes"] ?> (<?= $langTxt["lg:thai"] ?>)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagDescription" id="inputTagDescription"  type="text"  class="formInputContantTb" value="<?= $valDescription ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["inp:seodesnote"] ?></span></td>
                    </tr>
                     <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seokey"] ?> (<?= $langTxt["lg:thai"] ?>)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagKeywords" id="inputTagKeywords"  type="text"  class="formInputContantTb" value="<?= $valKeywords ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["inp:seokeynote"] ?></span></td>
                    </tr>
                    <tr > <td colspan="2"><hr style="color:#d1d1d1;border:1px solid #eaeaea;"/><br/></td></tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seotitle"] ?> (EN)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagTitleEN" id="inputTagTitleEN" type="text"  class="formInputContantTb" value="<?= $valMetatitleen ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["inp:seotitlenote"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seodes"] ?> (EN)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagDescriptionEN" id="inputTagDescriptionEN"  type="text"  class="formInputContantTb" value="<?= $valDescriptionen ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["inp:seodesnote"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["inp:seokey"] ?> (EN)<span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagKeywordsEN" id="inputTagKeywordsEN"  type="text"  class="formInputContantTb" value="<?= $valKeywordsen ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["inp:seokeynote"] ?></span></td>
                    </tr>
                </table>



                <br />

                <!-- add social media by nut -->
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?= $langMod["txt:setSocial"] ?></span><br/>
                            <span class="formFontTileTxt"><?= $langMod["txt:setSocialDe"] ?></span>   </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>


                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["social:fb"] ?> <?= $langMod['social:link']; ?><span class="fontContantAlert"> *</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="social[<?= $langMod["social:fb"] ?>][link]" id="socialFb" type="text"  class="formInputContantTb" value="<?= $ValSocial[$langMod["social:fb"]]['link'] ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["social:note"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["social:tw"] ?> <?= $langMod['social:link']; ?><span class="fontContantAlert"> *</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="social[<?= $langMod["social:tw"] ?>][link]" id="socialTw" type="text"  class="formInputContantTb" value="<?= $ValSocial[$langMod["social:tw"]]['link'] ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["social:note"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["social:yt"] ?> <?= $langMod['social:link']; ?><span class="fontContantAlert"> *</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="social[<?= $langMod["social:yt"] ?>][link]" id="socialYt" type="text"  class="formInputContantTb" value="<?= $ValSocial[$langMod["social:yt"]]['link'] ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["social:note"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["social:ig"] ?> <?= $langMod['social:link']; ?><span class="fontContantAlert"> *</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="social[<?= $langMod["social:ig"] ?>][link]" id="socialIg" type="text"  class="formInputContantTb" value="<?= $ValSocial[$langMod["social:ig"]]['link'] ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["social:note"] ?></span></td>
                    </tr>

                    <!-- <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["social:li"] ?> <?= $langMod['social:link']; ?><span class="fontContantAlert"> *</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="social[<?= $langMod["social:li"] ?>][link]" id="socialLi" type="text"  class="formInputContantTb" value="<?= $ValSocial[$langMod["social:li"]]['link'] ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["social:note"] ?></span></td>
                    </tr> -->

                    <tr style="display:none;">
                       <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:qr"] ?></td>
                       <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                           <div class="file-input-wrapper">
                               <button class="btn-file-input"><?= $langTxt["us:inputpicselect"] ?></button>
                               <input type="file" name="fileToUploadQR" id="fileToUploadQR" onchange="ajaxFileUploadQR();" />
                           </div>

                           <span class="formFontNoteTxt"><?= $langMod["inp:notepic"] ?></span>
                           <div class="clearAll"></div>

                           <div id="boxPicQR" class="formFontTileTxt">
                               <? if (is_file($valQr)) { ?>
                                   <img src="<?= $valQr ?>"  style="float:left;border:#c8c7cc solid 1px;"  />
                                   <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUploadSite('deletePicQR.php','boxPicQR')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                                   <input type="hidden" name="picQR" id="picQR" value="<?= $valOrName ?>" />
                               <? } ?>
                           </div>
                           <!--
                           <div id="boxPicNew" class="formFontTileTxt">
                               <input type="hidden" name="picname" id="picname" />
                           </div>
                           -->
                       </td>
                   </tr>

                </table>


                <br />


                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder">

                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                            <span class="formFontSubjectTxt"><?= $langMod["info:title"] ?></span><br/>
                            <span class="formFontTileTxt"><?= $langMod["info:titlede"] ?></span>   </td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="top"   height="15" ></td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >
                            <?= $langMod['info:address']; ?> (<?= $langTxt["lg:thai"] ?>)
                            <span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >

                            <textarea  name="info[address]" id="infoAddress" cols="45" rows="5" class="formTextareaContantTb"><?= trim($ValConfig['address']) ?></textarea>

                            <br />
                        </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >
                            <?= $langMod['info:address']; ?>(<?= $langTxt["lg:eng"] ?>)
                            <span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >

                            <textarea  name="info[addressen]" id="infoAddressen" cols="45" rows="5" class="formTextareaContantTb"><?= trim($ValConfig['addressen']) ?></textarea>

                            <br />
                        </td>
                    </tr>
                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:tel"] ?><span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input type="text" class="formInputContantTb"  name="info[tel]"  id="infoTel"  value="<?= $ValConfig['tel'] ?>"/><br />
                            <span class="formFontNoteTxt"><?= $langMod["info:telde"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:fax"] ?><span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input type="text" class="formInputContantTb"  name="info[fax]" id="infoFax" value="<?= $ValConfig['fax'] ?>"/>  <br />
                            <span class="formFontNoteTxt"><?= $langMod["info:faxde"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:hotline"] ?><span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input type="text" class="formInputContantTb"  name="info[hotline]" id="infoHotline" value="<?= $ValConfig['hotline'] ?>"/>  <br />
                            <span class="formFontNoteTxt"><?= $langMod["info:faxde"] ?></span></td>
                    </tr>

                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:email"] ?><span class="fontContantAlert">*</span></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <input type="text" class="formInputContantTb"  name="info[email]" id="infoEmail" value="<?= $ValConfig['email'] ?>"/>  <br />
                            <span class="formFontNoteTxt"><?= $langMod["info:emailde"] ?></span></td>
                    </tr>
                    <tr >
                       <td colspan='8' valign='top' align='right' height='1'><div style='width:98%; margin:0 auto; margin-bottom: 15px; height:1px; border-top:#cccccc solid 1px;'></div> </td>
                    </tr>


                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >
                            <?= $langMod['info:googlemap']; ?>
                            <span class="fontContantAlert">*</span>
                        </td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >

                            <?= $langMod['info:latiture'] ?> : <input name="info[glati]" type="text" id="glati" value="<?= $ValConfig['glati'] ?>"/>
                            <?= $langMod['info:longtiture'] ?>  : <input name="info[glongti]" type="text" id="glongti" value="<?= $ValConfig['glongti'] ?>"/>
                            <br/>
                            <!--<textarea  name="info[googlemap]" id="inputdescription" cols="45" rows="5" class="formTextareaContantTb"><?= $ValConfig['googlemap'] ?></textarea> -->
                            <span class="formFontNoteTxt"><?= $langMod["info:googlemapde"] ?></span>
                        </td>
                    </tr>


                    <tr >
                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["info:picaddress"] ?></td>
                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                            <div class="file-input-wrapper">
                                <button class="btn-file-input"><?= $langTxt["us:inputpicselect"] ?></button>
                                <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                            </div>

                            <span class="formFontNoteTxt"><?= $langMod["inp:notepic"] ?></span>
                            <div class="clearAll"></div>

                            <div id="boxPicNew" class="formFontTileTxt">
                                <? if (is_file($valPic)) { ?>
                                    <img src="<?= $valPic ?>"  style="float:left;border:#c8c7cc solid 1px;" width="600" />
                                    <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                                    <input type="hidden" name="picname" id="picname" value="<?= $valPicName ?>" />
                                <? } ?>
                            </div>

                        </td>
                    </tr>

                </table>
                <br />
                
                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >
                    <tr >
                        <td colspan="7" align="right"  valign="top" height="20"></td>
                    </tr>
                    <tr >
                        <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?= $langTxt["btn:gototop"] ?>"><?= $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                    </tr>
                </table>
            </div>
        </form>
        <? include("../lib/disconnect.php"); ?>
        <script type="text/javascript" src="../js/ajaxfileupload.js"></script>
        <script type="text/javascript" language="javascript">
                                    /*################################# Upload Pic #######################*/
                                    function ajaxFileUpload() {
                                        var valuepicname = jQuery("input#picname").val();

                                        jQuery.blockUI({
                                            message: jQuery('#tallContent'),
                                            css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                            }
                                        });


                                        jQuery.ajaxFileUpload({
                                            url: 'loadInsertPic.php?myID=<?= $myRand ?>&masterkey=<?= $_REQUEST['masterkey'] ?>&langt=<?= $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?= $_REQUEST['menukeyid'] ?>',
                                            secureuri: false,
                                            fileElementId: 'fileToUpload',
                                            dataType: 'json',
                                            success: function (data, status) {
                                                if (typeof (data.error) != 'undefined')
                                                {

                                                    if (data.error != '')
                                                    {
                                                        alert(data.error);

                                                    } else
                                                    {
                                                        jQuery("#boxPicNew").show();
                                                        jQuery("#boxPicNew").html(data.msg);
                                                        setTimeout(jQuery.unblockUI, 200);
                                                    }
                                                }
                                            },
                                            error: function (data, status, e)
                                            {
                                                alert(e);
                                            }
                                        }
                                        )
                                        return false;

                                    }

                                    /*################################# Upload QR #######################*/
                                    function ajaxFileUploadQR() {
                                        var valuepicname = jQuery("input#picQR").val();

                                        jQuery.blockUI({
                                            message: jQuery('#tallContent'),
                                            css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                            }
                                        });


                                        jQuery.ajaxFileUpload({
                                            url: 'loadInsertPicQR.php?myID=<?= $myRand ?>&masterkey=<?= $_REQUEST['masterkey'] ?>&langt=<?= $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?= $_REQUEST['menukeyid'] ?>',
                                            secureuri: false,
                                            fileElementId: 'fileToUploadQR',
                                            dataType: 'json',
                                            success: function (data, status) {
                                                if (typeof (data.error) != 'undefined')
                                                {

                                                    if (data.error != '')
                                                    {
                                                        alert(data.error);

                                                    } else
                                                    {
                                                        jQuery("#boxPicQR").show();
                                                        jQuery("#boxPicQR").html(data.msg);
                                                        setTimeout(jQuery.unblockUI, 200);
                                                    }
                                                }
                                            },
                                            error: function (data, status, e)
                                            {
                                                alert(e);
                                            }
                                        }
                                        )
                                        return false;

                                    }
                                    /*################################# Upload hotline #######################*/
                                    function ajaxFileUploadHT() {
                                        var valuepicname = jQuery("input#picHT").val();

                                        jQuery.blockUI({
                                            message: jQuery('#tallContent'),
                                            css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                            }
                                        });


                                        jQuery.ajaxFileUpload({
                                            url: 'loadInsertPicHT.php?myID=<?= $myRand ?>&masterkey=<?= $_REQUEST['masterkey'] ?>&langt=<?= $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?= $_REQUEST['menukeyid'] ?>',
                                            secureuri: false,
                                            fileElementId: 'fileToUploadHT',
                                            dataType: 'json',
                                            success: function (data, status) {
                                                if (typeof (data.error) != 'undefined')
                                                {

                                                    if (data.error != '')
                                                    {
                                                        alert(data.error);

                                                    } else
                                                    {
                                                        jQuery("#boxPicHT").show();
                                                        jQuery("#boxPicHT").html(data.msg);
                                                        setTimeout(jQuery.unblockUI, 200);
                                                    }
                                                }
                                            },
                                            error: function (data, status, e)
                                            {
                                                alert(e);
                                            }
                                        }
                                        )
                                        return false;

                                    }

                                    /*################################# Upload hotline Head #######################*/
                                    function ajaxFileUploadHTh() {
                                        var valuepicname = jQuery("input#picHTh").val();

                                        jQuery.blockUI({
                                            message: jQuery('#tallContent'),
                                            css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
                                            }
                                        });


                                        jQuery.ajaxFileUpload({
                                            url: 'loadInsertPicHTh.php?myID=<?= $myRand ?>&masterkey=<?= $_REQUEST['masterkey'] ?>&langt=<?= $_REQUEST['inputLt'] ?>&delpicname=' + valuepicname + '&menuid=<?= $_REQUEST['menukeyid'] ?>',
                                            secureuri: false,
                                            fileElementId: 'fileToUploadHTh',
                                            dataType: 'json',
                                            success: function (data, status) {
                                                if (typeof (data.error) != 'undefined')
                                                {

                                                    if (data.error != '')
                                                    {
                                                        alert(data.error);

                                                    } else
                                                    {
                                                        jQuery("#boxPicHTh").show();
                                                        jQuery("#boxPicHTh").html(data.msg);
                                                        setTimeout(jQuery.unblockUI, 200);
                                                    }
                                                }
                                            },
                                            error: function (data, status, e)
                                            {
                                                alert(e);
                                            }
                                        }
                                        )
                                        return false;

                                    }


        </script>
    </body>
</html>
