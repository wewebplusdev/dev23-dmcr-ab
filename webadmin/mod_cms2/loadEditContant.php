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
			$sql .= "   ".$mod_tb_root."_id , ".$mod_tb_root."_credate , ".$mod_tb_root."_crebyid, ".$mod_tb_root."_status,    ".$mod_tb_root."_sdate  	 	 ,    ".$mod_tb_root."_edate  ,    ".$mod_tb_root."_pic , ".$mod_tb_root."_type , ".$mod_tb_root."_filevdo , ".$mod_tb_root."_url  ,  ".$mod_tb_root."_gid    ";

			if($_REQUEST['inputLt']=="Thai"){
				$sql .= " , ".$mod_tb_root."_subject  ,    ".$mod_tb_root."_title , ".$mod_tb_root."_htmlfilename   ,    ".$mod_tb_root."_metatitle  	 	 ,    ".$mod_tb_root."_description  	 	 ,    ".$mod_tb_root."_keywords    ";
			}elseif($_REQUEST['inputLt']=="Eng"){
				$sql .= " , ".$mod_tb_root."_subjecten  ,    ".$mod_tb_root."_titleen , ".$mod_tb_root."_htmlfilenameen   ,    ".$mod_tb_root."_metatitleen  	 	 ,    ".$mod_tb_root."_descriptionen  	 	 ,    ".$mod_tb_root."_keywordsen    ";
			}

			$sql .= " , ".$mod_tb_root."_picshow, ".$mod_tb_root."_cid, ".$mod_tb_root."_votetus, ".$mod_tb_root."_year, ".$mod_tb_root."_groupProoject	FROM ".$mod_tb_root." WHERE ".$mod_tb_root."_masterkey='".$_POST["masterkey"]."' AND  ".$mod_tb_root."_id 	='".$_POST["valEditID"]."'";
			
			
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$valid=$Row[0];
			$valcredate=DateFormatInsertRe($Row[1]);
			$valcreby=$Row[2];
			$valstatus=$Row[3];
			if($Row[4]!="0000-00-00 00:00:00"){
			$valSdate=DateFormatInsertRe($Row[4]);
			}
			if($Row[5]!="0000-00-00 00:00:00"){
			$valEdate=DateFormatInsertRe($Row[5]);
			}
			$valPicName=$Row[6];
			$valPic=$mod_path_pictures."/".$Row[6];
			$valType=$Row[7];
			$valFilevdo=$Row[8];
			$valPathvdo=$mod_path_vdo."/".$Row[8];
			$valUrl=$Row[9];
			$valGid=$Row[10];

			$valSubject=rechangeQuot($Row[11]);
			$valTitle=$Row[12];
			$valhtml=$mod_path_html."/".$Row[13];
			$valhtmlname=$Row[13];
			$valMetatitle=rechangeQuot($Row[14]);
			$valDescription=rechangeQuot($Row[15]);
			$valKeywords=rechangeQuot($Row[16]);
			$valPicShow=$Row[17];
			$valSGid = $Row[18];
			$valVote = $Row[19];
			$row_groupPro=$Row[21];
			$row_year=$Row[20];
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_POST["menukeyid"]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
<link href="../css/theme.css" rel="stylesheet"/>
<link href="js/uploadfile.css" rel="stylesheet"/>

<title><?=$core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script language="JavaScript" type="text/javascript">
function executeSubmit() {
	with(document.myForm) {
		// if(inputGroupID.value==0) {
		// 	inputGroupID.focus();
		// 	jQuery("#inputGroupID").addClass("formInputContantTbAlertY");
		// 	return false;
		// }else{
		// 	jQuery("#inputGroupID").removeClass("formInputContantTbAlertY");
		// }


		if(isBlank(inputSubject)) {
			inputSubject.focus();
			jQuery("#inputSubject").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
		}

		// if(isBlank(inputDescription)) {
		// 	inputDescription.focus();
		// 	jQuery("#inputDescription").addClass("formInputContantTbAlertY");
		// 	return false;
		// }else{
		// 	jQuery("#inputDescription").removeClass("formInputContantTbAlertY");
		// }


	var alleditDetail = CKEDITOR.instances.editDetail.getData();
	if(alleditDetail=="") {
			jQuery("#inputEditHTML").addClass("formInputContantTbAlertY");
			window.location.hash = '#inputEditHTML';
			return false;
	}else{
			jQuery("#inputEditHTML").removeClass("formInputContantTbAlertY");
	}
		jQuery('#inputHtml').val(alleditDetail);


	}

	updateContactNew('updateContant.php');

}


function loadCheckUser() {
	with(document.myForm) {
		var inputValuename =document.myForm.inputUserName.value;
		}
		if( inputValuename!=''){
			checkUsermember(inputValuename);
		}
}



jQuery(document).ready(function(){

  jQuery('#myForm').keypress(function(e) {
    /* Start  Enter Check CKeditor */
	var focusManager = new CKEDITOR.focusManager( editDetail );
	var checkFocus =CKEDITOR.instances.editDetail.focusManager.hasFocus;
	var checkFocusTitle =jQuery("#inputDescription").is(":focus");

    if (e.which == 13) {
		//e.preventDefault();
			if(!checkFocusTitle){
				if(!checkFocus){
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
<form action="?" method="get" name="myForm" id="myForm"  enctype="multipart/form-data">
    <input name="execute" type="hidden" id="execute" value="update" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?=$_REQUEST['valEditID']?>" />
    <input name="valDelFile" type="hidden" id="valDelFile" value="" />
    <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
    <input name="inputHtml" type="hidden" id="inputHtml" value="" />
    <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?=$valhtmlname?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?=$_REQUEST['inputLt']?>" />
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?=$langMod["tit:inpName"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["txt:titleedit"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?=getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<? }?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["txt:titleedit"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?=getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<? }?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                     <? if($valPermission=="RW" ){?>
                                                        <div  class="btnSave" title="<?=$langTxt["btn:save"]?>" onclick="executeSubmit();"></div>
                                                      <? }?>
                                                        <div  class="btnBack" title="<?=$langTxt["btn:back"]?>" onclick="btnBackPage('index.php')"></div>
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
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

        <!-- <tr>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:selectgn"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <select name="inputGroupID"  id="inputGroupID"class="formSelectContantTb" onchange="openSelectSub('openSelectSub.php')">
        <option value="0"><?=$langMod["tit:selectg"]?></option>
        <?
	// $sql_group = "SELECT ";
	// 		if($_REQUEST['inputLt']=="Thai"){
	// 			$sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
	// 		}else if($_REQUEST['inputLt']=="Eng"){
	// 			$sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjecten ";
	// 		}else{
	// 			$sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjectcn ";
	// 		}

	// 		$sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey ='".$_REQUEST['masterkey']."'   ORDER BY ".$mod_tb_root_group."_order DESC ";
	// 	$query_group=wewebQueryDB($coreLanguageSQL,$sql_group);
	// 	while($row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group)) {
	// 	$row_groupid=$row_group[0];
	// 	$row_groupname=$row_group[1];
		?>
        <option value="<?=$row_groupid?>" <?  if($valGid==$row_groupid){ ?> selected="selected" <?  }?>><?=$row_groupname?></option>
        <? 
	// }
	?>
    </select></td>
  </tr> -->
	<!-- <tr >
		<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:selectsgn"]?><span class="fontContantAlert"></span></td>
		<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" id="boxSubSelect" >
		<?
		// $sql_cat = "SELECT ";
		// if($_REQUEST['inputLt']=="Thai"){
		// 	$sql_cat .= "  ".$mod_tb_root_subgroup."_id,".$mod_tb_root_subgroup."_subject";
		// }else{
		// 	$sql_cat .= " ".$mod_tb_root_subgroup."_id,".$mod_tb_root_subgroup."_subjecten ";
		// }
		// $sql_cat .= "  FROM ".$mod_tb_root_subgroup." WHERE  ".$mod_tb_root_subgroup."_masterkey ='".$_REQUEST['masterkey']."'    ";
		// $sql_cat = $sql_cat."  AND ".$mod_tb_root_subgroup."_gid ='".$valGid."'   ";
		// $sql_cat = $sql_cat."  ORDER BY ".$mod_tb_root_subgroup."_order DESC  ";

	?>
		<select name="inputSubID"  id="inputSubID"class="formSelectContantTb" >
				<option value="0"><?=$langMod["tit:selectsg"]?></option>
							<?
		// $query_cat=wewebQueryDB($coreLanguageSQL,$sql_cat);
		// while($row_cat=wewebFetchArrayDB($coreLanguageSQL,$query_cat)) {
		// $row_catid=$row_cat[0];
		// $valNamecShow=$row_cat[1];
		?>
				<option value="<?=$row_catid?>" <?  if($valSGid==$row_catid){ ?> selected="selected" <?  }?>><?=$valNamecShow?></option>
				<? 
			//  }
			 ?>

		</select></td>
	</tr> -->
			
	<tr>
      <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:prov"]?><span class="fontContantAlert">*</span></td>
      <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
          <select name="inputGroupID"  id="inputGroupID" class="formSelectContantTb" >

		  <option value="0"><?= $langMod["tit:selectval"] ?></option>
       		<?
                                    $sql_province = "SELECT ".$other_tb_province."_ID, ".$other_tb_province."_NAME 	 FROM ".$other_tb_province." WHERE  1 ";
									$sql_province.="  ORDER BY ".$other_tb_province."_NAME ASC ";
                                    $query_province=wewebQueryDB($coreLanguageSQL,$sql_province) ;
                                    $txt_count_province=wewebNumRowsDB($coreLanguageSQL,$query_province);
                                    while($row_province=wewebFetchArrayDB($coreLanguageSQL,$query_province)) {
                                    $txt_province_id=$row_province[0];
                                    $txt_province_subject=$row_province[1];
                                    ?> 
                                    <option value="<?=$txt_province_id?>" <? if($row_groupPro==$txt_province_id) {?> selected="selected" <? }?> ><?=$txt_province_subject?></option>
                                    <? }?>
          </select>
      </td>
    </tr>

    <tr>
      <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:year"]?><span class="fontContantAlert">*</span></td>
      <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
          <select name="inputYearID"  id="inputYearID" class="formSelectContantTb" >
				<option value="0"><?= $langMod["tit:selectval"] ?></option>
				<?
				$year_real=date('Y');
				$year_end=$year_real-125;
				for($year_star=$year_real; $year_star>=$year_end; $year_star--){ ?>
				<option value="<?=$year_star?>" <?  if($row_year==$year_star){ ?> selected="selected" <?  }?>><?=($year_star+543)?></option>
				<? }?>
          </select>
      </td>
    </tr>
 

<tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:subject"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?=$valSubject?>"/></td>
  </tr>
    <tr >
    <td align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:title"]?><span class="fontContantAlert"></span></td>
    <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
      <textarea name="inputDescription" id="inputDescription" cols="45" rows="5" class="formTextareaContantTb"><?=$valTitle?></textarea>     </td>
  </tr>

</table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:pic"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:picDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:album"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="file-input-wrapper">
  <button class="btn-file-input"><?=$langTxt["us:inputpicselect"]?></button>
  <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
</div>

<span class="formFontNoteTxt"><?=$langMod["inp:notepic"]?></span>
<div class="clearAll"></div>
<div id="boxPicNew" class="formFontTileTxt">
<? if(is_file($valPic)){?>
		<img src="<?=$valPic?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
		<div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
  <input type="hidden" name="picname" id="picname" value="<?=$valPicName?>" />
  <? }?>
</div></td>
  </tr>
  <tr style="display:none;">
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$modTxtShowPic[0]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <label>
    <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="1" type="radio"  class="formRadioContantTb" <? if($valPicShow!=2){?> checked="checked" <? }?>  /></div>
    <div class="formDivRadioR"><?=$modTxtShowPic[1]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic"  value="2"  type="radio"  class="formRadioContantTb" <? if($valPicShow==2){?> checked="checked" <? }?> /></div>
    <div class="formDivRadioR"><?=$modTxtShowPic[2]?></div>
    </label>
    </label>    </td>
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
    <td colspan="7" align="center"  valign="top"  class="formRightContantTbEditor" >
       <div id="inputEditHTML" >
      <textarea name="editDetail" id="editDetail" >
      <?
                    if (is_file($valhtml)) {
                        $fd = @fopen ($valhtml, "r");
                        $contents = @fread ($fd, @filesize ($valhtml));
                        @fclose ($fd);
                        echo txtReplaceHTML($contents);
                    }
	?>
      </textarea>
      </div></td>
    </tr>
  </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " >
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:album"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:albumDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:album"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div id="mulitplefileuploader" ><?=$langTxt["us:inputpicselect"]?></div>

<span class="formFontNoteTxt"><?=$langMod["inp:notealbum"]?></span>
<div class="clearAll"></div>
<div id="status" class="formFontTileTxt"></div>
<div id="boxAlbumNew" class="formFontTileTxt">
<?
			 $sql_filetemp="SELECT  ".$mod_tb_root_album."_id,".$mod_tb_root_album."_filename,".$mod_tb_root_album."_name,".$mod_tb_root_album."_download  FROM ".$mod_tb_root_album." WHERE ".$mod_tb_root_album."_contantid 	='".$_REQUEST['valEditID']."'    ORDER BY ".$mod_tb_root_album."_id ASC";
			$query_filetemp=wewebQueryDB($coreLanguageSQL,$sql_filetemp);
		 	$number_filetemp=wewebNumRowsDB($coreLanguageSQL,$query_filetemp);
			if($number_filetemp>=1){
			$valAlbum="";
			while($row_filetemp=wewebFetchArrayDB($coreLanguageSQL,$query_filetemp)){
			$linkRelativePath = $mod_path_album."/".$row_filetemp[1];
			$downloadFile = $row_filetemp[1];
			$downloadID = $row_filetemp[0];
			$downloadName = $row_filetemp[2];
			$countDownload= $row_filetemp[3];
			$imageType = strstr($downloadFile,'.');

				$valAlbum .= "<img src=\"".$mod_path_album."/reO_".$downloadFile."\"  width=\"50\" height=\"50\"   style=\"float:left;border:#c8c7cc solid 1px;margin-top:15px;\"  />";
				$valAlbum .= "<div style=\"width:15px; height:15px;float:left;z-index:1; margin-left:-15px;cursor:pointer;margin-right:15px;margin-top:15px;\" onclick=\"document.myForm.valDelAlbum.value=".$downloadID.";delAlbumUpload('deleteAlbum.php');\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"15\" height=\"15\"  border=\"0\"/></div>";
			}}
			echo $valAlbum;

?>
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
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

      <tr style="">
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:typevdo"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <label>
    <div class="formDivRadioL"><input name="inputType" id="inputType" value="url" type="radio"  class="formRadioContantTb" onclick="jQuery('#boxInputfile').hide();jQuery('#boxInputlink').show();" <? if($valType=="url"){?> checked="checked" <? }?>  /></div>
    <div class="formDivRadioR"><?=$langMod["tit:linkvdo"]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputType" id="inputType"  value="file"  type="radio"  class="formRadioContantTb" onclick="jQuery('#boxInputlink').hide();jQuery('#boxInputfile').show();" <? if($valType=="file"){?> checked="checked" <? }?>  /></div>
    <div class="formDivRadioR"><?=$langMod["tit:uploadvdo"]?></div>
    </label>
    </label>   </td>
      </tr>
  <tr id="boxInputlink"   <? if($valType=="file"){?> style="display:none;" <? }?>>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:linkvdo"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><textarea name="inputurl" id="inputurl" cols="45" rows="5" class="formTextareaContantTb"><?=$valUrl?></textarea><br />
<span class="formFontNoteTxt"><?=$langMod["tit:linkvdonote"]?></span></td>
  </tr>
    <tr id="boxInputfile"  <? if($valType=="url"){?> style="display:none;" <? }?>>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:uploadvdo"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="file-input-wrapper">
  <button class="btn-file-input"><?=$langTxt["us:inputpicselect"]?></button>
  <input type="file" name="inputVideoUpload" id="inputVideoUpload" onchange="ajaxVideoUpload();" />
</div>

<span class="formFontNoteTxt"><?=$langMod["tit:uploadvdonote"]?></span>
<div class="clearAll"></div>
<div id="boxVideoNew" class="formFontTileTxt">
<? if(is_file($valPathvdo)){
			$linkRelativePath = $valPathvdo;
			$imageType = strstr($valFilevdo,'.');
?>
		 	<a href="javascript:void(0)"  onclick=" delVideoUpload('deleteVideo.php')" ><img src="../img/btn/delete.png" align="absmiddle" title="Delete file"  hspace="10"  vspace="10"   border="0" /></a>Video Upload | <?=$langMod["file:type"]?>: <?=$imageType?>  | <?=$langMod["file:size"]?>: <?=get_IconSize($linkRelativePath)?>
  <input type="hidden" name="picname" id="picname" value="<?=$valFilevdo?>" />
  <? }?>
</div></td>
  </tr>
       </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:attfile"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:attfileDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr style="display:none;" >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:chfile"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputFileName" id="inputFileName" type="text"  class="formInputContantTb"/></td>
  </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:sefile"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="file-input-wrapper">
  <button class="btn-file-input"><?=$langTxt["us:inputpicselect"]?></button>
  <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();" />
</div>
<span class="formFontNoteTxt"><?=$langMod["inp:notefile"]?></span>
<div class="clearAll"></div>
<div id="boxFileNew" class="formFontTileTxt">
<?
			$sql="SELECT ".$mod_tb_file."_id,".$mod_tb_file."_filename,".$mod_tb_file."_name,".$mod_tb_file."_download FROM ".$mod_tb_file." WHERE ".$mod_tb_file."_contantid 	='".$valid."' ORDER BY ".$mod_tb_file."_id ASC";
			$query_file=wewebQueryDB($coreLanguageSQL,$sql);
			$number_row=wewebNumRowsDB($coreLanguageSQL,$query_file);
			if($number_row>=1){
			$txtFile="";
			while($row_file=wewebFetchArrayDB($coreLanguageSQL,$query_file)){
			$linkRelativePath = $mod_path_file."/".$row_file[1];
			$downloadFile = $row_file[1];
			$downloadID = $row_file[0];
			$downloadName = $row_file[2];
			$countDownload= $row_file[3];
			$imageType = strstr($downloadFile,'.');
			$txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"document.myForm.valDelFile.value=".$downloadID.";delFileUpload('deleteFile.php');\" ><img src=\"../img/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>".$downloadName."".$imageType." | ".$langMod["file:type"].": ".$imageType."  | ".$langMod["file:size"].": ".get_IconSize($linkRelativePath)."<br/>";
		 }}

		 echo $txtFile;
?>
</div></td>
  </tr>
  </table>

  <br />

<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:seo"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:seoDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seotitle"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagTitle" id="inputTagTitle" type="text"  class="formInputContantTb" value="<?=$valMetatitle?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["inp:seotitlenote"]?></span></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seodes"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagDescription" id="inputTagDescription"  type="text"  class="formInputContantTb" value="<?=$valDescription?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["inp:seodesnote"]?></span></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seokey"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagKeywords" id="inputTagKeywords"  type="text"  class="formInputContantTb" value="<?=$valKeywords?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["inp:seokeynote"]?></span></td>
  </tr>
  </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:datec"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:datecDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langTxt["us:credate"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="cdateInput" id="cdateInput" type="text"  class="formInputContantTbShot" value="<?=$valcredate?>"/></td>
  </tr>
  </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:date"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:dateDe"]?></span>    </td>
    </tr>
                            <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:sdate"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="sdateInput" id="sdateInput" type="text"  class="formInputContantTbShot" value="<?=$valSdate?>"/></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:edate"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="edateInput" id="edateInput"  type="text"  class="formInputContantTbShot" value="<?=$valEdate?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["inp:notedate"]?></span></td>
  </tr>




  </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >

   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?=$langTxt["btn:gototop"]?>"><?=$langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
  </table>
  </div>
</form>
<script type="text/javascript" src="../js/ajaxfileupload.js"></script>
<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
<script type="text/javascript" language="javascript">
	/*################################# Upload Pic #######################*/
	function ajaxFileUpload(){
		var valuepicname = jQuery("input#picname").val();

		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdatePic.php?myID=<?=$_POST["valEditID"]?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&delpicname='+valuepicname+'&menuid=<?=$_REQUEST['menukeyid']?>',
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined')
					{

						if(data.error != '')
						{
							alert(data.error);

						}else
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
	/*############################# Upload Album ##################################

	function ajaxFileUploadAlbum(){
		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdateAlbum.php?myID=<?=$_POST["valEditID"]?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&menuid=<?=$_REQUEST['menukeyid']?>',
				secureuri:true,
				fileElementId:'inputAlbumUpload',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined'){

						if(data.error != ''){
							alert(data.error);
						}else{
							jQuery("#boxAlbumNew").show();
							jQuery("#boxAlbumNew").html(data.msg);
							setTimeout(jQuery.unblockUI, 200);
						}

					}
				},
				error: function (data, status, e){
					alert(e);
				}
			}
		)

		return false;

	}*/

	/*################################# Upload Video #######################*/
	function ajaxVideoUpload(){
		var valuevdoname = jQuery("input#vdoname").val();

		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdateVideo.php?myID=<?=$_POST["valEditID"]?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&delvdoname='+valuevdoname+'&menuid=<?=$_REQUEST['menukeyid']?>',
				secureuri:false,
				fileElementId:'inputVideoUpload',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined')
					{

						if(data.error != '')
						{
							alert(data.error);

						}else
						{
							jQuery("#boxVideoNew").show();
							jQuery("#boxVideoNew").html(data.msg);
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

	/*############################# Upload File ####################################*/
	function ajaxFileUploadDoc(){
		var valuefilename = jQuery("input#inputFileName").val();
		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadUpdateFile.php?myID=<?=$_POST["valEditID"]?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&nametodoc='+valuefilename+'&menuid=<?=$_REQUEST['menukeyid']?>',
				secureuri:true,
				fileElementId:'inputFileUpload',
				dataType: 'json',
				success: function (data, status){
					if(typeof(data.error) != 'undefined'){

						if(data.error != ''){
							alert(data.error);
						}else{
							jQuery("#boxFileNew").show();
							jQuery("#boxFileNew").html(data.msg);
							document.myForm.inputFileName.value ="";
							setTimeout(jQuery.unblockUI, 200);
						}

					}
				},
				error: function (data, status, e){
					alert(e);
				}
			}
		)

		return false;

	}

/*################### Load FCK Editor ######################*/
	jQuery(function() {
		onLoadFCK();
	});


 </script>

   <script type="text/javascript" src="js/jquery.uploadfile.js"></script>
<script type="text/javascript" language="javascript">
jQuery(document).ready(function(){
var vajSelectFile=0;
var valUploadFile=0;
var settings = {
    url: "loadUpdateAlbum.php?myID=<?=$_POST["valEditID"]?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&menuid=<?=$_REQUEST['menukeyid']?>",
    dragDrop:false,
    fileName: "myfile",
    allowedTypes:"jpg,png,gif",
    returnType:"json",
	onSelect:function(files){
	   vajSelectFile=files.length;
	},

	 onSuccess:function(files,data,xhr){
	    valUploadFile=valUploadFile+1;
		if(vajSelectFile==valUploadFile){
				loadShowPhotoUpdate('loadShowAlbumNewUpdate.php','boxAlbumNew');
			//	alert('goooo');
			 valUploadFile=0;
	   }
    },
	showStatusAfterSuccess:false,
	showAbort:false,
	showDone:false,
    showDelete:false,
    deleteCallback: function(data,pd)
	{
    for(var i=0;i<data.length;i++) {

        $.post("delete.php",{op:"delete",name:data[i]},
        function(resp, textStatus, jqXHR)
        {

            //Show Message
            jQuery("#status").append("<div>File Deleted</div>");
        });

     }
    pd.statusbar.hide(); //You choice to hide/not.

}
}
var uploadObj = jQuery("#mulitplefileuploader").uploadFile(settings);


});
 </script>


 <? if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){?>
 <script language="JavaScript"  type="text/javascript" src="../js/datepickerThai.js"></script>
 <? }else{?>
 <script language="JavaScript"  type="text/javascript" src="../js/datepickerEng.js"></script>
 <? }?>
 <? include("../lib/disconnect.php");?>

</body>
</html>
