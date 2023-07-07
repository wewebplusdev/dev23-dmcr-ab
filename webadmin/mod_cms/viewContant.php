<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("config.php");
include("incModLang.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";



			$sql = "SELECT   ";
			$sql .= "   ".$mod_tb_root."_id ,
      ".$mod_tb_root."_credate ,
      ".$mod_tb_root."_crebyid,
      ".$mod_tb_root."_status,
      ".$mod_tb_root."_sdate  	 	 ,
      ".$mod_tb_root."_edate  	,
      ".$mod_tb_root."_lastdate,
      ".$mod_tb_root."_lastbyid,
      ".$mod_tb_root."_pic ,
      ".$mod_tb_root."_type ,
      ".$mod_tb_root."_filevdo ,
      ".$mod_tb_root."_url  ,
      ".$mod_tb_root."_view,
      ".$mod_tb_root."_gid    ";

			if($_REQUEST['inputLt']=="Thai"){
				$sql .= " , ".$mod_tb_root."_subject  ,    ".$mod_tb_root."_title , ".$mod_tb_root."_htmlfilename   ,    ".$mod_tb_root."_metatitle  	 	 ,    ".$mod_tb_root."_description  	 	 ,    ".$mod_tb_root."_keywords    ";
			}elseif($_REQUEST['inputLt']=="Eng"){
				$sql .= " , ".$mod_tb_root."_subjecten  ,    ".$mod_tb_root."_titleen , ".$mod_tb_root."_htmlfilenameen   ,    ".$mod_tb_root."_metatitleen  	 	 ,    ".$mod_tb_root."_descriptionen  	 	 ,    ".$mod_tb_root."_keywordsen    ";
			}else{
				$sql .= " , ".$mod_tb_root."_subjectcn  ,    ".$mod_tb_root."_titlecn, ".$mod_tb_root."_htmlfilenamecn   ,    ".$mod_tb_root."_metatitlecn  	 	 ,    ".$mod_tb_root."_descriptioncn  	 	 ,    ".$mod_tb_root."_keywordscn    ";
			}

			$sql .= " , ".$mod_tb_root."_picshow, ".$mod_tb_root."_cid, ".$mod_tb_root."_votetus FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_masterkey='".$_REQUEST["masterkey"]."'  AND  ".$mod_tb_root."_id='".$_REQUEST['valEditID']."' ";
			$Query=mysql_query($sql);
			$Row=mysql_fetch_array($Query);
			$valID=$Row[0];
			$valCredate=DateFormat($Row[1]);
			$valCreby=$Row[2];
			$valStatus=$Row[3];
			if($valStatus=="Enable"){
				$valStatusClass=	"fontContantTbEnable";
			}elseif($valStatus=="Home"){
				$valStatusClass=	"fontContantTbHomeSt";
			}else{
				$valStatusClass=	"fontContantTbDisable";
			}

			if($Row[4]=="0000-00-00 00:00:00"){
			$valSdate="-";
			}else{
			$valSdate=DateFormatReal($Row[4]);
			}
			if($Row[5]=="0000-00-00 00:00:00"){
			$valEdate="-";
			}else{
			$valEdate=DateFormatReal($Row[5]);
			}

			$valLastdate=DateFormat($Row[6]);
			$valLastby=$Row[7];

			$valPicName=$Row[8];
			$valPic=$mod_path_pictures."/".$Row[8];
			$valType=$Row[9];
			$valFilevdo=$Row[10];
			$valPathvdo=$mod_path_vdo."/".$Row[10];
			$valUrl=rechangeQuot($Row[11]);
			$valView=number_format($Row[12]);

			$valGid=$Row[13];

			$valSubject=rechangeQuot($Row[14]);
			$valTitle=rechangeQuot($Row[15]);
			$valHtml=$mod_path_html."/".$Row[16];
			$valMetatitle=rechangeQuot($Row[17]);
			$valDescription=rechangeQuot($Row[18]);
			$valKeywords=rechangeQuot($Row[19]);
			$valPicShow = $Row[20];
      $valSGid = $Row[21];
      $valVote = $Row[22];
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_REQUEST["menukeyid"]);

			logs_access('3','View');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<link href="../css/theme.css" rel="stylesheet"/>

<title><?=$core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
</head>

<body>
<form action="?" method="get" name="myForm" id="myForm">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?=$_REQUEST['valEditID']?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?=$_REQUEST['inputLt']?>" />
    <? if($_REQUEST['viewID']<=0){?>
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?=$langMod["tit:inpName"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["txt:titleview"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?=getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<? }?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                    <? }?>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["txt:titleview"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?=getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<? }?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
													<? if($_REQUEST['viewID']<=0){?>
                                                    <? if($valPermission=="RW"){?>
                                                        <div  class="btnEditView" title="<?=$langTxt["btn:edit"]?>" onclick="
                                                        document.myFormHome.valEditID.value=<?=$valID?>;
                                                        editContactNew('../<?=$mod_fd_root?>/editContant.php')"></div>
                                                     <? }?>
                                                      <div  class="btnBack" title="<?=$langTxt["btn:back"]?>" onclick="btnBackPage('index.php')"></div>
                                                        <? }?>
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
    <span class="formFontSubjectTxt"><?=$langMod["txt:subject"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:subjectDe"]?></span>    </td>
    </tr>
     <!-- <tr>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:selectgn"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
    <?
	$sql_group = "SELECT ";
			if($_REQUEST['inputLt']=="Thai"){
				$sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
			}else if($_REQUEST['inputLt']=="Eng"){
				$sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjecten";
			}else{
				$sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjectcn ";
			}

			$sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_id='".$valGid."'  ORDER BY ".$mod_tb_root_group."_order DESC ";
		$query_group=mysql_query($sql_group);
		$row_group=mysql_fetch_array($query_group);
		$row_groupid=$row_group[0];
	echo 	$row_groupname=$row_group[1];
		?>
    </div></td>
  </tr> -->
	<!-- <tr >
			<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:selectsgn"] ?> :<span class="fontContantAlert"></span></td>
			<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">

							<?
							if (empty($valSGid)) {
								echo "-";
							}else {
								$sql_group = "SELECT ";
								if ($_REQUEST['inputLt'] == "Thai") {
										$sql_group .= "  " . $mod_tb_root_subgroup . "_id," . $mod_tb_root_subgroup . "_subject";
								} else {
										$sql_group .= " " . $mod_tb_root_subgroup . "_id," . $mod_tb_root_subgroup . "_subjecten ";
								}

								$sql_group .= "  FROM " . $mod_tb_root_subgroup . " WHERE  " . $mod_tb_root_subgroup . "_id ='" . $valSGid . "'    ";
								$query_group = mysql_query($sql_group);
								$row_group = mysql_fetch_array($query_group);
										$row_groupid = $row_group[0];
										echo $row_groupname = $row_group[1];
							}

									 ?>
					</div></td>
	</tr> -->
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:subject"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valSubject?></div></td>
  </tr>
     <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:title"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valTitle?></div></td>
  </tr>
   </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:pic"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:picDe"]?></span>    </td>
    </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
    <img src="<?=$valPic?>"  style="float:left;border:#c8c7cc solid 1px; max-width:600px;"  onerror="this.src='<?="../img/btn/nopic.jpg"?>'"  />
    </div></td>
  </tr>
   <tr style="display:none;">
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$modTxtShowPic[0]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$modTxtShowPic[$valPicShow]?></div></td>
  </tr>
  </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:title"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:titleDe"]?></span>    </td>
    </tr>
  <tr >
    <td colspan="7" align="left"  valign="top" class="formTileTxt">
        <div  class="viewEditorTileTxt" >
		<?
        $fd = @fopen ($valHtml, "r");
        $contents = @fread ($fd, filesize ($valHtml));
        @ fclose ($fd);
        echo txtReplaceHTML($contents);
        ?>
       </div>       </td>
    </tr>
  </table>
         <br />
<table  width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:album"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:albumDe"]?></span>    </td>
    </tr>
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["txt:album"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
   <?
   			 $sql_filetemp="SELECT  ".$mod_tb_root_album."_id,".$mod_tb_root_album."_filename,".$mod_tb_root_album."_name,".$mod_tb_root_album."_download  FROM ".$mod_tb_root_album." WHERE ".$mod_tb_root_album."_contantid 	='".$_REQUEST['valEditID']."'   ORDER BY ".$mod_tb_root_album."_id ASC";
			$query_filetemp=mysql_query($sql_filetemp);
		 	$number_filetemp=mysql_num_rows($query_filetemp);
			if($number_filetemp>=1){
			$valAlbum="";
			while($row_filetemp=mysql_fetch_array($query_filetemp)){
			$linkRelativePath = $mod_path_album."/".$row_filetemp[1];
			$downloadFile = $row_filetemp[1];
			$downloadID = $row_filetemp[0];
			$downloadName = $row_filetemp[2];
			$countDownload= $row_filetemp[3];
			$imageType = strstr($downloadFile,'.');
?>
<? if($_REQUEST['viewID']<=0){?>
<a rel="viewAlbum"  title=""  href="<?=$mod_path_album."/reB_".$downloadFile?>">
<img src="<?=$mod_path_album."/reO_".$downloadFile?>"  width="50" height="50"   style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;"  /></a>
<? }else{?>
<img src="<?=$mod_path_album."/reO_".$downloadFile?>"  width="50" height="50"   style="float:left;border:#c8c7cc solid 1px;margin-bottom:15px;margin-right:15px;"  />
<? }?>
<? }}else{?>
-
<? }?>
    </div></td>
  </tr>
  </table>
         <br />
<table  width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:video"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:videoDe"]?></span>    </td>
    </tr>
        <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["txt:video"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
	<?
    if($valType=="file"){
		if($valFilevdo!=""){
				$filename = $valFilevdo;
				$arrstrfile = explode(".",$valFilevdo);
				$filetype = strtolower($arrstrfile[sizeof($arrstrfile)-1]);
    ?>
    <div id="areaPlayer" style="z-index:-1999; "></div>
    <? }else{ ?>
    -
    <? }}else{
			if($valUrl!=""){
				$myUrlArray = explode("v=",$valUrl);
				$myUrlCut=$myUrlArray[1];
				$myUrlCutArray = explode("&",$myUrlCut);
				 $myUrlCutAnd=$myUrlCutArray[0];
			?>
         <iframe width="560" height="315" src="//www.youtube-nocookie.com/embed/<?=$myUrlCutAnd?>" frameborder="0" allowfullscreen  style="z-index:-1999; "></iframe>
		<? }else{ ?>
        -
    <? }}?>

    </div></td>
  </tr>
     </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:attfile"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:attfileDe"]?></span>   </td>
    </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["txt:attfile"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView">
    <?
			$sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename,".$mod_tb_file."_name,".$mod_tb_file."_download FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid 	='".$valID."'  ORDER BY ".$mod_tb_file."_id ASC";
			$query_file=mysql_query($sql);
			$number_row=mysql_num_rows($query_file);
			if($number_row>=1){
			$txtFile="";
			while($row_file=mysql_fetch_array($query_file)){
			$linkRelativePath = $mod_path_file."/".$row_file[1];
			$downloadFile = $row_file[1];
			$downloadID = $row_file[0];
			$downloadName = $row_file[2];
			$countDownload= $row_file[3];
			$imageType = strstr($downloadFile,'.');
			?>

            <div  style="float:left; width:100%; height:30px; margin-bottom:15px;"><img src="<?=get_Icon($downloadFile)?>" align="absmiddle" width="30"  /><a href="../<?=$mod_fd_root?>/download.php?linkPath=<?=$linkRelativePath?>&amp;downloadFile=<?=$downloadFile?>"><?=$downloadName."".$imageType?></a> | <?=$langMod["file:type"]?>: <?=$imageType?> | <?=$langMod["file:size"]?>: <?=get_IconSize($linkRelativePath)?> | <?=$langMod["file:download"]?>: <?=number_format($countDownload)?></div>
            <div></div>

            <?
		 }}else{
		 echo "-";
		 }
?>
    </div>    </td>
  </tr>
  </table>

  <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:seo"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:seoDe"]?></span>    </td>
    </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seotitle"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valMetatitle?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seodes"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valDescription?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seokey"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valKeywords?></div></td>
  </tr>
  </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:date"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:dateDe"]?></span>    </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:sdate"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valSdate?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:edate"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><?=$valEdate?></div> </td>
  </tr>


  </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langTxt["us:titleinfo"]?></span><br/>
    <span class="formFontTileTxt"><?=$langTxt["us:titleinfoDe"]?></span>     </td>
    </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:view"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?=$valView?></div>         </td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:credate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?=$valCredate?></div>         </td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valCreby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valCreby);
		}


	?>
	 </div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:lastdate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?=$valLastdate?></div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valLastby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valLastby);
		}


	?>
	 </div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["mg:status"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">

               <? if($valStatus=="Enable"){?>
                   <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }else if($valStatus=="Home"){?>
                    <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }else{?>
                    <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }?>
     </div>         </td>
  </tr>
   </table>
         <br />     <? if($_REQUEST['viewID']<=0){?>

<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >

   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?=$langTxt["btn:gototop"]?>"><?=$langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
    <? }?>
  </table>
  </div>
</form>
<? include("../lib/disconnect.php");?>
<? if($_REQUEST['viewID']<=0){?>
<link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox.css" media="screen" />
<script language="JavaScript"  type="text/javascript" src="../js/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript">
	jQuery(function() {
			jQuery('a[rel=viewAlbum]').fancybox({
			'padding'			: 0,
			'transitionIn': 'fade',
			'transitionOut': 'fade',
			'autoSize'   : false,
			});
	});
</script>
<? }?>

<script type='text/javascript' src='../<?=$mod_fd_root?>/swfobject.js'></script>
<script type='text/javascript' src='../<?=$mod_fd_root?>/silverlight.js'></script>
<script type='text/javascript' src='../<?=$mod_fd_root?>/wmvplayer.js'></script>
<script type='text/javascript'>
	var filename = "<?=$filename?>";
	var filetype = "<?=$filetype?>";
	var cnt = document.getElementById("areaPlayer");
	if(filetype=="flv"){
		var s1 = new SWFObject('../<?=$mod_fd_root?>/player.swf','player','560','315','9');
		s1.addParam('allowfullscreen','true');
		s1.addParam('wmode','transparent');
		s1.addParam('allowscriptaccess','always');
		s1.addParam('flashvars','file=<?=$mod_path_vdo?>/'+filename);
		s1.write('areaPlayer');
	}else/* if(filetype=="wmv")*/{

		var src = '../<?=$mod_fd_root?>/wmvplayer.xaml';
		var cfg = "";
		var ply;
			 cfg = {
				file:'<?=$mod_path_vdo?>/'+filename,
				image:'',
				height:'315',
				width:'560',
				autostart:"false",
				windowless:'true',
				showstop:'true'
			};
			ply = new jeroenwijering.Player(cnt,src,cfg);
	}
</script>


</body>
</html>
