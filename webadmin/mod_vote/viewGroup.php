<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valMaxAns = 5;       
$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";



$sql = "SELECT   ";
$sql .= "   " . $mod_tb_root_group . "_id, " . $mod_tb_root_group . "_credate , " . $mod_tb_root_group . "_crebyid, " . $mod_tb_root_group . "_status	, " . $mod_tb_root_group . "_lastdate , " . $mod_tb_root_group . "_lastbyid   ";

if ($_REQUEST['inputLt'] == "Thai") {
    $sql .= "   , " . $mod_tb_root_group . "_subject     ";
} else if ($_REQUEST['inputLt'] == "Eng") {
    $sql .= "  ," . $mod_tb_root_group . "_subjecten  	  ";
} else {
    $sql .= "  ," . $mod_tb_root_group . "_subjectcn	  ";
}

$sql .= "
				,    " . $mod_tb_root_group . "_type
				,    " . $mod_tb_root_group . "_sdate
				,    " . $mod_tb_root_group . "_edate
				,	".$mod_tb_root_group."_name".$valSqlLang."
				,	".$mod_tb_root_group."_title".$valSqlLang."
			   ";

 $sql .= " FROM " . $mod_tb_root_group . " WHERE " . $mod_tb_root_group . "_masterkey='" . $_REQUEST["masterkey"] . "'  AND  " . $mod_tb_root_group . "_id='" . $_REQUEST['valEditID'] . "' ";
$Query = wewebQueryDB($coreLanguageSQL,$sql);
$Row = wewebFetchArrayDB($coreLanguageSQL,$Query);
$valID = $Row[0];
$valCredate = DateFormat($Row[1]);
$valCreby = $Row[2];
$valStatus = $Row[3];
if ($valStatus == "Enable") {
    $valStatusClass = "fontContantTbEnable";
} else {
    $valStatusClass = "fontContantTbDisable";
}

$valLastdate = DateFormat($Row[4]);
$valLastby = $Row[5];
$valSubject = rechangeQuot($Row[6]);
$valType = $coreTxtTypeVote[$Row[7]];
if ($Row[8] == "0000-00-00 00:00:00") {
    $valSdate = "-";
} else {
    $valSdate = DateFormatReal($Row[8]);
}
if ($Row[9] == "0000-00-00 00:00:00") {
    $valEdate = "-";
} else {
    $valEdate = DateFormatReal($Row[9]);
}
	$valSubjectName=rechangeQuot($Row[10]);
	$valTitle=rechangeQuot($Row[11]);


$sql = "SELECT ";
if ($_REQUEST['inputLt'] == "Thai") {
    $sql .= "" . $mod_tb_ans . "_name,";
} else {
    $sql .= "" . $mod_tb_ans . "_nameen,";
}
$sql .= "" . $mod_tb_ans . "_count";
$sql .= " FROM " . $mod_tb_ans . " WHERE " . $mod_tb_ans . "_qid='" . $_POST["valEditID"] . "' ORDER BY " . $mod_tb_ans . "_order ASC";
$Query = wewebQueryDB($coreLanguageSQL,$sql);
$count_record = wewebNumRowsDB($coreLanguageSQL,$Query);
$index = 1;
while ($index < $count_record + 1) {
    $Rows = wewebFetchArrayDB($coreLanguageSQL,$Query);
    $inputAns[$index] = $Rows[0];
    $inputResult[$index] = $Rows[1];
    $index++;
}


$valPermission = getUserPermissionOnMenu($_SESSION[$valSiteManage . "core_session_groupid"], $_REQUEST["menukeyid"]);

logs_access('3', 'View Group');
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
                <script language="JavaScript"  type="text/javascript" src="../js/chart/jquery.jqplot.js"></script>
                <script language="JavaScript"  type="text/javascript" src="../js/chart/plugins/jqplot.pieRenderer.js"></script>
                <script language="JavaScript"  type="text/javascript" src="../js/chart/plugins/jqplot.categoryAxisRenderer.js"></script>
                <script language="JavaScript"  type="text/javascript" src="../js/chart/plugins/jqplot.barRenderer.js"></script>
                <link href="../js/chart/jquery.jqplot.css" rel="stylesheet" type="text/css"/>

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
                            <div class="divRightNav">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                                    <tr>
                                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?= $valLinkNav1 ?>" target="_self"><?= $valNav1 ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('group.php')" target="_self"><?= getNameMenu($_REQUEST["menukeyid"]) ?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?= $langMod["txt:titleview"] ?> <? if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?= getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<? } ?></span></td>
                                        <td  class="divRightNavTb" align="right">



                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <? } ?>
                        <div class="divRightHead">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?= $langMod["txt:titleview"] ?> <? if ($_SESSION[$valSiteManage . 'core_session_languageT'] == 2 || $_SESSION[$valSiteManage . 'core_session_languageT'] == 3) { ?>(<?= getSystemLangTxt($_REQUEST['inputLt'], $langTxt["lg:thai"], $langTxt["lg:eng"]) ?>)<? } ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <? if ($_REQUEST['viewID'] <= 0) { ?>
                                                        <? if ($valPermission == "RW") { ?>
                                                            <div  class="btnEditView" title="<?= $langTxt["btn:edit"] ?>" onclick="
                                                                            document.myFormHome.valEditID.value =<?= $valID ?>;
                                                                            editContactNew('../<?= $mod_fd_root ?>/editGroup.php')"></div>
                                                              <? } ?>
                                                        <div  class="btnBack" title="<?= $langTxt["btn:back"] ?>" onclick="btnBackPage('group.php')"></div>
                                                    <? } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="divRightMain" >
                        <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?= $langMod["txt:subject"] ?></span><br/>
                                        <span class="formFontTileTxt"><?= $langMod["viw:subjectDe"] ?></span>    </td>
                                </tr>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:subject"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valSubjectName ?></div></td>
                                </tr>
                                
                                <!-- <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:title"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= nl2br($valTitle) ?></div></td>
                                </tr> -->
                                <!-- <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["mini:siteth"]?> :<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
                                    <?php  if ($_REQUEST['inputLt'] == "Thai") { ?>
                                    <a href="<?=loadGetURLByMod($core_full_path,'th',$mod_fd_frontUrl,$valID)?>" target="_blank"><?=loadGetURLByMod($core_full_path,'th',$mod_fd_frontUrl,$valID)?></a><br />
                                    <?php }else{ ?>
                                    <a href="<?=loadGetURLByMod($core_full_path,'en',$mod_fd_frontUrl,$valID)?>" target="_blank"><?=loadGetURLByMod($core_full_path,'en',$mod_fd_frontUrl,$valID)?></a><br />
                                        <?php   }  ?>
                                        </div></td>
                                </tr> -->
                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?= $langMod["txt:vote"] ?></span><br/>
                                        <span class="formFontTileTxt"><?= $langMod["viw:voteDe"] ?></span>    </td>
                                </tr>

                                <!-- <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:quest"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valSubject ?></div></td>
                                </tr> -->
                                <? for ($i = 1; $i <= $valMaxAns; $i++) {
									if($inputAns[$i] != ""){
								?>
                                    <tr >
                                        <td align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["txt:answer"] . " " . $i . " "?>:<span class="fontContantAlert"></span></td>
                                        <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                            <div class="formDivView" style="float:left; width:35%;"><?= $inputAns[$i] ?></div><div class="formDivView">ผลโหวต : <?= number_format($inputResult[$i]) ?>
                                            </div>
                                        </td>
                                    </tr>
                                <? }} ?>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:votetype"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valType ?></div></td>
                                </tr>
                            </table>
                            <br />

                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?= $langMod["txt:chart"] ?></span><br/>
                                        <span class="formFontTileTxt"><?= $langMod["txt:chartde"] ?></span>    </td>
                                </tr>


                                <tr >

                                    <td width="100%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >

                                        <div class="tabchart">
                                            <select id="selectChart" class=" ">
                                                <option value="1">กราฟรูปวงกลม</option>
                                                <option value="2">กราฟแท่ง</option>
                                                <option value="3">กราฟเส้น</option>
                                            </select>
                                        </div>
                                        <div id='chart'></div>
                                        <div id="savechartImages" class="tabchart">

                                        </div>

                                        <div id="viewChartImage"></div>
                                        <?
                                        $label1 = array();
                                        //$label2 = array();
                                        for ($i = 1; $i <= $valMaxAns; $i++) {
                                            $label1[] = "['" . $inputAns[$i] . "'," . number_format($inputResult[$i]) . "]";
                                        }
                                        $label1 = "[[" . implode(",", $label1) . "]]";
                                        ?>



                                    </td>



                                    <script>



                                        $(document).ready(function () {

                                            //  var plot = "";

                                            function callchart(expression) {

                                                $("#chart").html("");

                                                switch (expression) {

                                                    case '1':
                                                        var chartValue = <?= $label1 ?>;
                                                        var plot = jQuery.jqplot('chart', chartValue,
                                                                {
                                                                    animate: true,
                                                                    animateReplot: true,
                                                                    seriesDefaults: {shadow: false, renderer: jQuery.jqplot.PieRenderer, rendererOptions: {sliceMargin: 4, showDataLabels: true}},
                                                                    legend: {show: true}
                                                                }
                                                        );
                                                        plot.replot({resetAxes: true});
                                                        break;



                                                    case '2':
                                                        var chartValue = <?= $label1 ?>;
                                                        var plot = jQuery.jqplot('chart', chartValue, {
                                                            animate: true,
                                                            animateReplot: true,
                                                            seriesDefaults: {
                                                                renderer: $.jqplot.BarRenderer,
                                                                rendererOptions: {
                                                                    // Set the varyBarColor option to true to use different colors for each bar.
                                                                    // The default series colors are used.
                                                                    varyBarColor: true
                                                                }
                                                            },
                                                            axes: {
                                                                xaxis: {
                                                                    renderer: $.jqplot.CategoryAxisRenderer
                                                                }
                                                            }
                                                        });
                                                        plot.replot({resetAxes: true});
                                                        break;

                                                    case '3':
                                                        var chartValue = <?= $label1 ?>;
                                                        var plot = jQuery.jqplot('chart', chartValue, {
                                                            seriesDefaults: {
                                                                animate: true,
                                                                animateReplot: true,
                                                                renderer: $.jqplot.CanvasAxisLabelRenderer,
                                                                rendererOptions: {
                                                                    animation: {
                                                                        speed: 2000
                                                                    }
                                                                }
                                                            },
                                                            axes: {
                                                                xaxis: {
                                                                    renderer: $.jqplot.CategoryAxisRenderer
                                                                }
                                                            }
                                                        });
                                                        plot.replot({resetAxes: true});
                                                        break;
                                                }
                                            }

                                            $("#selectChart").change(function () {
                                                var id = $(this).val();
                                                $('#viewChartImage').empty();
                                                callchart(id);
                                            })

                                            callchart("1");

                                            if (!$.jqplot.use_excanvas) {
                                                var outerDiv = $(document.createElement('div'));
                                                var header = $(document.createElement('div'));
                                                var div = $(document.createElement('div'));

                                                outerDiv.append(header);
                                                outerDiv.append(div);

                                                outerDiv.addClass('jqplot-image-container');
                                                header.addClass('jqplot-image-container-header');
                                                div.addClass('jqplot-image-container-content');

                                                $('#chart').after(outerDiv);
                                                $('#viewChartImage').hide();

                                                outerDiv = header = div = close = null;

                                                var btn = $(document.createElement('button'));
                                                btn.text('ดูแบบรูปภาพ');
                                                btn.addClass('jqplot-image-button');
                                                btn.attr('type', 'button');
                                                btn.bind('click', {chart: $('#chart')}, function (evt) {


                                                    var close = $(document.createElement('button'));
                                                    close.addClass('jqplot-image-container-close');
                                                    close.html('Close');
                                                    close.attr('type', 'button');
                                                    close.click(function () {
                                                        $('#viewChartImage').hide(500);
                                                    })


                                                    var imgelem = evt.data.chart.jqplotToImageElem();
                                                    var div = $(this).nextAll('div.jqplot-image-container').first();
                                                    $('#viewChartImage').empty();
                                                    $('#viewChartImage').append('คลิกขวาที่ภาพแล้วกดบันทึกภาพ ');
                                                    $('#viewChartImage').append(close);
                                                    $('#viewChartImage').append(imgelem).show(500);
                                                });

                                                $('#savechartImages').html(btn);

                                            }


                                        });
                                    </script>


                                </tr>


                            </table>


                            <br />


                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?= $langMod["txt:date"] ?></span><br/>
                                        <span class="formFontTileTxt"><?= $langMod["txt:dateDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:sdate"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valSdate ?></div></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:edate"] ?>:<span class="fontContantAlert"></span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?= $valEdate ?></div> </td>
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
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langTxt["mg:status"] ?>:</td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="formDivView">

                                            <? if ($valStatus == "Enable") { ?>
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

                </body>
                </html>
