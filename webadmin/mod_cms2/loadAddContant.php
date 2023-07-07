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

			 $myRand = time().rand(111,999);
		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_POST["menukeyid"]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
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


	insertContactNew('insertContant.php');

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

<form action="?" method="get" name="myForm" id="myForm"   enctype="multipart/form-data">
    <input name="execute" type="hidden" id="execute" value="insert" />
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?=$myRand?>" />
    <input name="valDelFile" type="hidden" id="valDelFile" value="" />
    <input name="valDelAlbum" type="hidden" id="valDelAlbum" value="" />
    <input name="inputHtml" type="hidden" id="inputHtml" value="" />
    <input name="inputHtmlDel" type="hidden" id="inputHtmlDel" value="<?=$valhtmlname?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?=$_REQUEST['inputLt']?>" />
    <input name="inputGroupID" type="hidden" id="inputGroupID" value="<?=$_REQUEST['inputGroupID']?>" />
    <input name="inputYearID" type="hidden" id="inputYearID" value="<?=$_REQUEST['inputYearID']?>" />

    <?
      if($_REQUEST['inputGroupID'] !=""){
        $inputgroupID = $_REQUEST['inputGroupID'];
      }
    ?>
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('index.php')" target="_self"><?=$langMod["tit:inpName"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["txt:titleadd"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?=$langTxt["lg:thai"]?>)<? }?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["txt:titleadd"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?=$langTxt["lg:thai"]?>)<? }?></span></td>
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
            <span class="formFontTileTxt"><?=$langMod["txt:subjectDe"]?></span>    
        </td>
    </tr>
    <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

      <!-- <tr>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:selectgn"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <select name="inputGroupID"  id="inputGroupID"class="formSelectContantTb" onchange="openSelectSub('openSelectSub.php')">
        <option value="0"><?=$langMod["tit:selectg"]?></option>
        <?
	$sql_group = "SELECT ";
			if($_REQUEST['inputLt']=="Thai"){
				$sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
			}else{
				$sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjecten ";
			}

			$sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey ='".$_REQUEST['masterkey']."'   ORDER BY ".$mod_tb_root_group."_order DESC ";
		$query_group=mysql_query($sql_group);
		while($row_group=mysql_fetch_array($query_group)) {
		$row_groupid=$row_group[0];
		$row_groupname=$row_group[1];
		?>
        <option value="<?=$row_groupid?>" <?  if($_REQUEST['inputGh']==$row_groupid){ ?> selected="selected" <?  }?>><?=$row_groupname?></option>
        <? }?>
    </select></td>
  </tr> -->
	<!-- <tr >
			<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?= $langMod["tit:selectsgn"] ?><span class="fontContantAlert"></span></td>
			<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" id="boxSubSelect" >
				<select name="inputSubID"  id="inputSubID"class="formSelectContantTb" >
						<option value="0"><?=$langMod["tit:selectsg"]?></option>
									<?
					if($_REQUEST['inputGh']>=1){
				$sql_cat = "SELECT ";
				if($_REQUEST['inputLt']=="Thai"){
					$sql_cat .= "  ".$mod_tb_root_subgroup."_id,".$mod_tb_root_subgroup."_subject";
				}else{
					$sql_cat .= " ".$mod_tb_root_subgroup."_id,".$mod_tb_root_subgroup."_subjecten ";
				}
				$sql_cat .= "  FROM ".$mod_tb_root_subgroup." WHERE  ".$mod_tb_root_subgroup."_masterkey ='".$_REQUEST['masterkey']."'    ";
				$sql_cat = $sql_cat."  AND ".$mod_tb_root_subgroup."_gid ='".$_REQUEST['inputGh']."'   ";
				$sql_cat = $sql_cat."  ORDER BY ".$mod_tb_root_subgroup."_order DESC  ";
				$query_cat=mysql_query($sql_cat);
				while($row_cat=mysql_fetch_array($query_cat)) {
				$row_catid=$row_cat[0];
				$valNamecShow=$row_cat[1];
				?>
						<option value="<?=$row_catid?>" <?  if($_REQUEST['inputTh']==$row_catid){ ?> selected="selected" <?  }?>><?=$valNamecShow?></option>
						<?  }}?>

				</select></td>
	</tr> -->

  
    
    <tr>
      <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:prov"]?><span class="fontContantAlert">*</span></td>
      <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
          <select name="inputGroupID"  id="inputGroupID" class="formSelectContantTb" >
          <option value="0"><?= $langMod["tit:selectval"] ?></option>
                                <?
                                    $sql_province = "SELECT ".$other_tb_province."_ID, ".$other_tb_province."_NAME 	 FROM ".$other_tb_province." 
                                    WHERE  1 ";
									$sql_province.="  ORDER BY ".$other_tb_province."_NAME ASC ";
                                    $query_province=mysql_query($sql_province) ;
                                    $txt_count_province=mysql_num_rows($query_province);
                                    while($row_province=mysql_fetch_array($query_province)) {
                                    $txt_province_id=$row_province[0];
                                    $txt_province_subject=$row_province[1];
                                    ?> 
                                    <option value="<?=$txt_province_id?>" <? if($inputgroupID==$txt_province_id) {?> selected="selected" <? }?> ><?=$txt_province_subject?></option>
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
                      for($year_star=$year_real; $year_star>=$year_end; $year_star--){
                   ?>
                      <option value="<?=$year_star?>" <?  if($inputYearID==$year_star){ ?> selected="selected" <?  }?>><?=($year_star+543)?></option>
                    <? }?>
          </select>
      </td>
    </tr>
 
    
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:subject"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb"/></td>
  </tr>

   <tr >
    <td align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:title"]?><span class="fontContantAlert"></span></td>
    <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
      <textarea name="inputDescription" id="inputDescription" cols="45" rows="5" class="formTextareaContantTb"></textarea>     </td>
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
  <input type="hidden" name="picname" id="picname" />
</div></td>
  </tr>
<tr style="display:none;">
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$modTxtShowPic[0]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <label>
    <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic" value="1" type="radio"  class="formRadioContantTb"  /></div>
    <div class="formDivRadioR"><?=$modTxtShowPic[1]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputTypePic" id="inputTypePic"  value="2"  type="radio"  class="formRadioContantTb"  checked="checked"  /></div>
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
    <td colspan="7" align="center"  valign="top"  class="formRightContantTbEditor"   >
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
      </textarea></div>    </td>
    </tr>
     </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
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
<div id="boxAlbumNew" class="formFontTileTxt"></div></td>
  </tr>
  </table>
         <br />
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
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
    <div class="formDivRadioL"><input name="inputType" id="inputType" value="url" type="radio"  class="formRadioContantTb" checked="checked" onclick="jQuery('#boxInputfile').hide();jQuery('#boxInputlink').show();" /></div>
    <div class="formDivRadioR"><?=$langMod["tit:linkvdo"]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputType" id="inputType"  value="file"  type="radio"  class="formRadioContantTb" onclick="jQuery('#boxInputlink').hide();jQuery('#boxInputfile').show();"  /></div>
    <div class="formDivRadioR"><?=$langMod["tit:uploadvdo"]?></div>
    </label>
    </label>    </td>
      </tr>
  <tr id="boxInputlink" >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:linkvdo"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><textarea name="inputurl" id="inputurl" cols="45" rows="5" class="formTextareaContantTb"></textarea><br />
<span class="formFontNoteTxt"><?=$langMod["tit:linkvdonote"]?></span></td>
  </tr>
    <tr id="boxInputfile" style="display:none;" >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:uploadvdo"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="file-input-wrapper">
  <button class="btn-file-input"><?=$langTxt["us:inputpicselect"]?></button>
  <input type="file" name="inputVideoUpload" id="inputVideoUpload" onchange="ajaxVideoUpload();" />
</div>

<span class="formFontNoteTxt"><?=$langMod["tit:uploadvdonote"]?></span>
<div class="clearAll"></div>
<div id="boxVideoNew" class="formFontTileTxt"></div></td>
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

  <tr style="display:none;">
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:chfile"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputFileName" id="inputFileName" type="text"  class="formInputContantTb"/></td>
  </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:sefile"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="file-input-wrapper">
  <button class="btn-file-input"><?=$langTxt["us:inputpicselect"]?></button>
  <input type="file" name="inputFileUpload" id="inputFileUpload" onchange="ajaxFileUploadDoc();" />
</div>

<span class="formFontNoteTxt"><?=$langMod["inp:notefile"]?></span>
<div class="clearAll"></div>
<div id="boxFileNew" class="formFontTileTxt"></div></td>
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
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagTitle" id="inputTagTitle" type="text"  class="formInputContantTb" value="<?=$valmetatitle?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["inp:seotitlenote"]?></span></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seodes"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagDescription" id="inputTagDescription"  type="text"  class="formInputContantTb" value="<?=$valdescription?>"/><br />
<span class="formFontNoteTxt"><?=$langMod["inp:seodesnote"]?></span></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["inp:seokey"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputTagKeywords" id="inputTagKeywords"  type="text"  class="formInputContantTb" value="<?=$valkeywords?>"/><br />
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
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="sdateInput" id="sdateInput" type="text"  class="formInputContantTbShot" value="<?=$sdateInput?>"/></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:edate"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="edateInput" id="edateInput"  type="text"  class="formInputContantTbShot" value="<?=$edateInput?>"/><br />
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
				url:'loadInsertPic.php?myID=<?=$myRand?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&delpicname='+valuepicname+'&menuid=<?=$_REQUEST['menukeyid']?>',
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
				url:'loadInsertAlbum.php?myID=<?=$myRand?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&menuid=<?=$_REQUEST['menukeyid']?>',
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

	}
	*/
	/*################################# Upload Video #######################*/
	function ajaxVideoUpload(){
		var valuevdoname = jQuery("input#vdoname").val();

		 jQuery.blockUI({
				message: jQuery('#tallContent'),
				css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
				}
			});


		jQuery.ajaxFileUpload({
				url:'loadInsertVideo.php?myID=<?=$myRand?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&delvdoname='+valuevdoname+'&menuid=<?=$_REQUEST['menukeyid']?>',
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
				url:'loadInsertFile.php?myID=<?=$myRand?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&nametodoc='+valuefilename+'&menuid=<?=$_REQUEST['menukeyid']?>',
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
    url: "loadInsertAlbum.php?myID=<?=$myRand?>&masterkey=<?=$_REQUEST['masterkey']?>&langt=<?=$_REQUEST['inputLt']?>&menuid=<?=$_REQUEST['menukeyid']?>",
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
				loadShowPhotoUpdate('loadShowAlbumNew.php','boxAlbumNew');
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
