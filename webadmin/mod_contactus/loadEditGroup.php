<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";


$sql = "SELECT  ";
if ($_REQUEST['inputLt'] == "Thai") {
    $sql .= "  " . $mod_tb_root_group . "_id ,  " . $mod_tb_root_group . "_lastdate, " . $mod_tb_root_group . "_creby, " . $mod_tb_root_group . "_status ,    " . $mod_tb_root_group . "_subject  ,    " . $mod_tb_root_group . "_title  ";
} else {
    $sql .= "  " . $mod_tb_root_group . "_id , " . $mod_tb_root_group . "_lastdate, " . $mod_tb_root_group . "_creby, " . $mod_tb_root_group . "_status  ,    " . $mod_tb_root_group . "_subjecten  ,    " . $mod_tb_root_group . "_titleen   ";
}

$sql .= " 	FROM " . $mod_tb_root_group . " WHERE " . $mod_tb_root_group . "_masterkey='" . $_POST["masterkey"] . "' AND  " . $mod_tb_root_group . "_id 	='" . $_POST["valEditID"] . "'";
$Query = mysql_query($sql);
$Row = mysql_fetch_array($Query);
$valid = $Row[0];
$valcredate = DateFormat($Row[1]);
$valcreby = $Row[2];
$valstatus = $Row[3];
$valSubject = $Row[4];
$valTitle = $Row[5];

$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_POST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">
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



                        }

                        updateContactNew('updateGroup.php');

                    }


                    function executeAddEmail() {
                        with (document.myForm) {
                            jQuery("#boxAlertEmail").hide();
                            if (isBlank(inputEmail)) {
                                inputEmail.focus();
                                jQuery("#inputEmail").addClass("formInputContantTbAlertY");
                                return false;
                            } else {
                                jQuery("#inputEmail").removeClass("formInputContantTbAlertY");
                            }

                            if (!isBlank(inputEmail)) {
                                if (!isEmail(inputEmail.value)) {
                                    inputEmail.focus();
                                    jQuery("#inputEmail").addClass("formInputContantTbAlertY");
                                    return false;
                                } else {
                                    jQuery("#inputEmail").removeClass("formInputContantTbAlertY");
                                }
                            }

                        }
                        modInsertEmail('insertEmail.php');

                    }

                    jQuery(document).ready(function () {

                        jQuery('#myForm').keypress(function (e) {
                            if (e.which == 13) {
                                //e.preventDefault();
                                executeSubmit();
                                return false;
                            }
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
                        <input name="inputLt" type="hidden" id="inputLt" value="<?= $_REQUEST['inputLt'] ?>" />
                        <input name="valDelFile" type="hidden" id="valDelFile" value="" />
                        <input name="include" type="hidden" id="module_orderby" value="<?= $_REQUEST['include'] ?>" />
                        <div class="divRightNav">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                                <tr>
                                    <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('group.php')" target="_self"><?= $langMod["meu:group"] ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:titleeditg"] ?><? if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>(<?= getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<? } ?></span></td>
                                    <td  class="divRightNavTb" align="right">



                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="divRightHead">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:titleeditg"] ?><? if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2) { ?>(<?= getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<? } ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <? if ($valPermission == "RW") { ?>
                                                        <div  class="btnSave" title="<?= $langTxt["btn:save"] ?>" onclick="executeSubmit();"></div>
                                                    <? } ?>
                                                    <div  class="btnBack" title="<?= $langTxt["btn:back"] ?>" onclick="btnBackPage('group.php')"></div>
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
                                        <span class="formFontSubjectTxt"><?= $langMod["txt:subjectg"] ?></span><br/>
                                        <span class="formFontTileTxt"><?= $langMod["txt:subjectgDe"] ?></span>    </td>
                                </tr>
                                <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:inpName"] ?><span class="fontContantAlert">*</span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?= $valSubject ?>"/></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:noteg"] ?></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <textarea name="inputComment"  id="inputComment" cols="20" rows="5" class="formTextareaContantTb"><?= $valTitle ?></textarea>
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?= $langMod["txt:set"] ?></span><br/>
                                        <span class="formFontTileTxt"><?= $langMod["txt:setDe"] ?></span>   </td>
                                </tr>
                                <tr ><td colspan="7" align="right"  valign="top"   height="15" >
                                        <tr ><td colspan="7" align="right"  valign="top"   >
                                                <div id="boxMailContact">
                                                    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                        <?
                                                        $sql = "SELECT " . $mod_tb_root_email . "_email," . $mod_tb_root_email . "_id FROM " . $mod_tb_root_email . "  WHERE  " . $mod_tb_root_email . "_masterkey='" . $_REQUEST["masterkey"] . "' AND   " . $mod_tb_root_email . "_gid='" . $_REQUEST['valEditID'] . "'   ORDER BY " . $mod_tb_root_email . "_id ASC ";
                                                        $query = mysql_query($sql);
                                                        $numRowCount = mysql_num_rows($query);
                                                        if ($numRowCount >= 1) {
                                                            $num_email = 0;
                                                            while ($row = mysql_fetch_array($query)) {
                                                                $num_email++;
                                                                $valEmailNew = rechangeQuot($row[0]);
                                                                $valEmailID = $row[1];
                                                                ?>
                                                                <tr >
                                                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= number_format($num_email) ?>.<span class="fontContantAlert"></span></td>
                                                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                                                            <a href="javascript:void(0)"  onclick="document.myForm.valDelFile.value =<?= $valEmailID ?>;
                        modDelEmail('deleteEmail.php')" ><img src="../img/btn/delete.png" align="absmiddle" title="Delete email"  hspace="5"     border="0" /></a> <?= $valEmailNew ?></div></td>
                                                                </tr>

                                                            <? }
                                                        } ?>
                                                    </table>
                                                </div>

                                                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                    <tr >
                                                        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" style="padding-top:10px;" ><?= $langMod["tit:email"] ?>:<span class="fontContantAlert"></span></td>
                                                        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                                            <table border="0" cellspacing="0" cellpadding="0">

                                                                <tr>
                                                                    <td><input name="inputEmail" id="inputEmail"  type="text"  class="formInputContantTbShot" value="<?= $inputEmail ?>"/></td>

                                                                    <td>       <? if ($valPermission == "RW") { ?><div  class="btnAdd2" title="<?= $langTxt["btn:add"] ?>" onclick="executeAddEmail();"></div><? } ?></td>
                                                                </tr>

                                                            </table>

                                                            <span class="formFontNoteTxt" style="color:#FF0000;display:none;" id="boxAlertEmail"><?= $langMod["ats:email"] ?></span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td></tr>
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

                                        </body>
                                        </html>
