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

$update = array();
$update[] = $mod_tb_root . "_status  	='Read'";

$sql = "UPDATE " . $mod_tb_root . " SET " . implode(",", $update) . " WHERE " . $mod_tb_root . "_id='" . $_POST["valEditID"] . "'  ";
$Query = wewebQueryDB($coreLanguageSQL,$sql);


$sql = "SELECT   ";
$sql .= "   " . $mod_tb_root . "_id , " . $mod_tb_root . "_credate, " . $mod_tb_root . "_status 	, " . $mod_tb_root . "_subject, " . $mod_tb_root . "_message, " . $mod_tb_root . "_name  ,  " . $mod_tb_root . "_address  ,  " . $mod_tb_root . "_email  ,  " . $mod_tb_root . "_tel   ,  " . $mod_tb_root . "_ip,  " . $mod_tb_root . "_gid ";
$sql .= " FROM " . $mod_tb_root . " WHERE " . $mod_tb_root . "_masterkey='" . $_REQUEST["masterkey"] . "'  AND  " . $mod_tb_root . "_id='" . $_REQUEST['valEditID'] . "' ";
$Query = wewebQueryDB($coreLanguageSQL,$sql);
$Row = wewebFetchArrayDB($coreLanguageSQL,$Query);
$valID = $Row[0];
$valCredate = DateFormat($Row[1]);
$valStatus = $Row[2];
$valSubject = rechangeQuot($Row[3]);
$valMessage = rechangeQuot($Row[4]);
$valCreby = rechangeQuot($Row[5]);
$valAddress = rechangeQuot($Row[6]);
$valEmail = rechangeQuot($Row[7]);
$valTel = rechangeQuot($Row[8]);
$valIp = rechangeQuot($Row[9]);
$valGid = $Row[10];
if ($valStatus == "Read") {
    $valStatusClass = "fontContantTbEnable";
} else {
    $valStatusClass = "fontContantTbDisable";
}


$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

logs_access('3', 'View');
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
                        <? if ($_REQUEST['viewID'] <= 0) { ?>
                            <!-- <div class="divRightNav">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                                    <tr>
                                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index_ajax.php')" target="_self"><?= getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:titleview"] ?></span></td>
                                        <td  class="divRightNavTb" align="right">



                                        </td>
                                    </tr>
                                </table>
                            </div> -->
                        <? } ?>
                        <div class="divRightHead">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:titleview"] ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <? if ($_REQUEST['viewID'] <= 0) { ?>

                                                        <div  class="btnBack" title="<?= $langTxt["btn:back"] ?>" onclick="btnBackPage('index_ajax.php')"></div>
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
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?= $langMod["txt:info"] ?></span><br/>
                                        <span class="formFontTileTxt"><?= $langMod["txt:infoDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:selectgn"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                            <?
                                            $sql_group = "SELECT ";
                                            if ($_REQUEST['inputLt'] == "Thai") {
                                                $sql_group .= "  " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subject";
                                            } else {
                                                $sql_group .= " " . $mod_tb_root_group . "_id," . $mod_tb_root_group . "_subjecten ";
                                            }

                                            $sql_group .= "  FROM " . $mod_tb_root_group . " WHERE  " . $mod_tb_root_group . "_id='" . $valGid . "'  ORDER BY " . $mod_tb_root_group . "_order DESC ";
                                            $query_group = wewebQueryDB($coreLanguageSQL,$sql_group);
                                            $row_group = wewebFetchArrayDB($coreLanguageSQL,$query_group);
                                            $row_groupid = $row_group[0];
                                            echo $row_groupname = $row_group[1];
                                            ?>
                                        </div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valSubject ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:mgs"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valMessage ?></div></td>
                                </tr>
                                <tr  >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:address"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valAddress ?></div></td>
                                </tr>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:email"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valEmail ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:tel"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valTel ?></div> </td>
                                </tr>
                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?= $langTxt["us:titleinfo"] ?></span><br/>
                                        <span class="formFontTileTxt"><?= $langTxt["us:titleinfoDe"] ?></span>     </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langTxt["us:credate"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView"><?= $valCredate ?></div>         </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:by"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView">
                                            <?
                                            echo $valCreby;
                                            ?>
                                        </div>         </td>
                                </tr>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" >IP:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView">
                                            <?
                                            echo $valIp;
                                            ?>
                                        </div>         </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langTxt["mg:status"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView">

                                            <? if ($valStatus == "Read") { ?>
                                                <span class="<?= $valStatusClass ?>"><?= $valStatus ?></span>
                                            <? } else { ?>
                                                <span class="<?= $valStatusClass ?>"><?= $valStatus ?></span>
                                            <? } ?>
                                        </div>         </td>
                                </tr>
                            </table>
                            <br />
                            <? if ($_REQUEST['viewID'] <= 0) { ?>
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                                    <tr >
                                        <td colspan="7" align="right"  valign="top" height="20"></td>
                                    </tr>
                                    <tr >
                                        <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?= $langTxt["btn:gototop"] ?>"><?= $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                                    </tr>
                                <? } ?>
                            </table>
                        </div>
                    </form>
                    <? include("../lib/disconnect.php"); ?>
                    <link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox.css" media="screen" />
                    <script language="JavaScript"  type="text/javascript" src="../js/fancybox/jquery.fancybox.js"></script>
                    <script type="text/javascript">
                                                            jQuery(function () {
                                                                jQuery('a[rel=viewAlbum]').fancybox({
                                                                    'padding': 0,
                                                                    'transitionIn': 'fade',
                                                                    'transitionOut': 'fade',
                                                                    'autoSize': false,
                                                                });
                                                            });
                    </script>

                </body>
                </html>
