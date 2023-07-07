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
$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";


			$sql = "SELECT  ";
			$sql .= "   ".$mod_tb_root_group."_id, ".$mod_tb_root_group."_credate , ".$mod_tb_root_group."_crebyid, ".$mod_tb_root_group."_status , ";

			if($_REQUEST['inputLt']=="Thai"){
				$sql .= "  ".$mod_tb_root_group."_subject,    ";
			}else if($_REQUEST['inputLt']=="Eng"){
				$sql .= "  ".$mod_tb_root_group."_subjecten,  	  ";
			}else{
				$sql .= " ".$mod_tb_root_group."_subjectcn,   ";
			}
			$sql .= "
			".$mod_tb_root_group."_type,
			".$mod_tb_root_group."_sdate,
			".$mod_tb_root_group."_edate,
			".$mod_tb_root_group."_name".$valSqlLang.",
			".$mod_tb_root_group."_title".$valSqlLang."  ";
			$sql .= " 	FROM ".$mod_tb_root_group." WHERE ".$mod_tb_root_group."_masterkey='".$_POST["masterkey"]."' AND  ".$mod_tb_root_group."_id 	='".$_POST["valEditID"]."'";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$valid=$Row[0];
			$valcredate=DateFormat($Row[1]);
			$valcreby=$Row[2];
			$valstatus=$Row[3];
			$valSubject=rechangeQuot($Row[4]);
		 	$valType=rechangeQuot($Row[5]);
			if($Row[6]!="0000-00-00 00:00:00"){
			$valSdate=DateFormatInsertRe($Row[6]);
			}
			if($Row[7]!="0000-00-00 00:00:00"){
			$valEdate=DateFormatInsertRe($Row[7]);
			}
			$valSubjectName=rechangeQuot($Row[8]);
			$valTitle=rechangeQuot($Row[9]);


			$sql="SELECT ";

			if($_REQUEST['inputLt']=="Thai"){
				$sql .= "  ".$mod_tb_ans."_name    ";
			}else if($_REQUEST['inputLt']=="Eng"){
				$sql .= "  ".$mod_tb_ans."_nameen    ";
			}

			$sql .= " FROM ".$mod_tb_ans." WHERE ".$mod_tb_ans."_qid='".$_POST["valEditID"]."' ORDER BY ".$mod_tb_ans."_order ASC";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$count_record=wewebNumRowsDB($coreLanguageSQL,$Query) ;
			$index=1;
			while($index<$count_record+1) {
				$Rows=wewebFetchArrayDB($coreLanguageSQL,$Query);
				$inputAns[$index]=$Rows[0];
				$index++;
			}

		 	$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_POST["menukeyid"]);

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
<script language="JavaScript" type="text/javascript">
function executeSubmit() {
	with(document.myForm) {
	
		if(isBlank(inputSubjectName)) {
			inputSubjectName.focus();
			jQuery("#inputSubjectName").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputSubjectName").removeClass("formInputContantTbAlertY");
		}

		// if(isBlank(inputComment)) {
		// 	inputComment.focus();
		// 	jQuery("#inputComment").addClass("formInputContantTbAlertY");
		// 	return false;
		// }else{
		// 	jQuery("#inputComment").removeClass("formInputContantTbAlertY");
		// }

		// if(isBlank(inputSubject)) {
		// 	inputSubject.focus();
		// 	jQuery("#inputSubject").addClass("formInputContantTbAlertY");
		// 	return false;
		// }else{
		// 	jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
		// }

		<? for($i=1;$i<=$valMaxAns-2;$i++){?>
		if(isBlank(inputAns<?=$i?>)) {
			inputAns<?=$i?>.focus();
			jQuery("#inputAns<?=$i?>").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputAns<?=$i?>").removeClass("formInputContantTbAlertY");
		}
		<? }?>


	}

	updateContactNew('updateGroup.php');

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
		var checkFocusTitle = jQuery("#inputComment").is(":focus");

    if (e.which == 13) {
		if (!checkFocusTitle) {
			executeSubmit();
			return false;
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
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$_REQUEST['module_pageshow']?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$_REQUEST['module_pagesize']?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?=$_REQUEST['module_orderby']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputGh']?>" />
    <input name="valEditID" type="hidden" id="valEditID" value="<?=$_REQUEST['valEditID']?>" />
    <input name="inputLt" type="hidden" id="inputLt" value="<?=$_REQUEST['inputLt']?>" />
					<div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('group.php')" target="_self"><?=getNameMenu($_REQUEST["menukeyid"])?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["txt:titleedit"]?> <? if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?=getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<? }?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["txt:titleedit"]?> <? if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?=getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<? }?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                     <? if($valPermission=="RW" ){?>
                                                        <div  class="btnSave" title="<?=$langTxt["btn:save"]?>" onclick="executeSubmit();"></div>
                                                      <? }?>
                                                        <div  class="btnBack" title="<?=$langTxt["btn:back"]?>" onclick="btnBackPage('group.php')"></div>
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
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:subject"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubjectName" id="inputSubjectName" type="text"  class="formInputContantTb" value="<?=$valSubjectName?>" /></td>
  </tr>
<!-- <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:title"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <textarea name="inputComment"  id="inputComment" cols="20" rows="5" class="formTextareaContantTb"><?=$valTitle?></textarea>
    </td>
  </tr> -->
  </table>
     <br />

    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                    <tr >
                        <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?=$langMod["txt:vote"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:voteDe"]?></span>    </td>
    </tr>
    <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
      <!-- <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:quest"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?=$valSubject?>"/></td>
  </tr> -->
  <? for($i=1;$i<=$valMaxAns;$i++){?>
		  <tr>
			<td align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["txt:answer"]." ".$i." "?><span class="fontContantAlert"><? if($i <= 2){ ?>*<? }else {?>&nbsp;&nbsp;<? } ?></span></td>
			<td  colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputAns<?=$i?>" type="text"  id="inputAns<?=$i?>" class="formInputContantTbShot"  value="<?=$inputAns[$i]?>"   /></td>
		  </tr>
		  <? }?>
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:votetype"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >

      <label>
    <div class="formDivRadioL"><input name="inputType" id="inputType" value="0" type="radio"  class="formRadioContantTb" <? if($valType=="0"){?> checked="checked" <? }?>/></div>
    <div class="formDivRadioR"><?=$coreTxtTypeVote[0]?></div>
    </label>

    <label>
    <div class="formDivRadioL"><input name="inputType" id="inputType"  value="1"  type="radio"  class="formRadioContantTb"  <? if($valType=="1"){?> checked="checked" <? }?> /></div>
    <div class="formDivRadioR"><?=$coreTxtTypeVote[1]?></div>
    </label>
    </td>
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
 <? include("../lib/disconnect.php");?>

</body>
</html>
