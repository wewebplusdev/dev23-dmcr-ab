<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";


			$sql = "SELECT  ";
			$sql .= "   ".$mod_tb_root_subgroup."_id, ".$mod_tb_root_subgroup."_credate ,
      ".$mod_tb_root_subgroup."_crebyid, ".$mod_tb_root_subgroup."_status  ";

			if($_REQUEST['inputLt']=="Thai"){
				$sql .= "  ,    ".$mod_tb_root_subgroup."_subject  ,    ".$mod_tb_root_subgroup."_title  ";
			}else if($_REQUEST['inputLt']=="Eng"){
				$sql .= "  ,".$mod_tb_root_subgroup."_subjecten  ,    ".$mod_tb_root_subgroup."_titleen 	  ";
			}else{
				$sql .= "  ,".$mod_tb_root_subgroup."_subjectcn  ,    ".$mod_tb_root_subgroup."_titlecn 	  ";
			}
			$sql .= " ,".$mod_tb_root_subgroup."_gid ";
			$sql .= " 	FROM ".$mod_tb_root_subgroup." WHERE ".$mod_tb_root_subgroup."_masterkey='".$_POST["masterkey"]."' AND  ".$mod_tb_root_subgroup."_id 	='".$_POST["valEditID"]."'";
			$Query=mysql_query($sql);
			$Row=mysql_fetch_array($Query);
			$valid=$Row[0];
			$valcredate=DateFormat($Row[1]);
			$valcreby=$Row[2];
			$valstatus=$Row[3];
			$valSubject=rechangeQuot($Row[4]);
			$valTitle=rechangeQuot($Row[5]);
			$valGID=$Row[6];
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
		if(inputGroupID.value==0) {
			inputGroupID.focus();
			jQuery("#inputGroupID").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputGroupID").removeClass("formInputContantTbAlertY");
		}
		if(isBlank(inputSubject)) {
			inputSubject.focus();
			jQuery("#inputSubject").addClass("formInputContantTbAlertY");
			return false;
		}else{
			jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
		}



	}

	updateContactNew('updateSubGroup.php');

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

    if (e.which == 13) {
			executeSubmit();
			return false;
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
                        <td  class="divRightNavTb" align="left"  id="defTop" ><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('group.php')" target="_self"><?=$langMod["meu:subgroup"]?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$langMod["txt:titleeditsg"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?=getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<? }?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div>
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$langMod["txt:titleeditsg"]?><? if($_SESSION[$valSiteManage.'core_session_languageT']==2 || $_SESSION[$valSiteManage.'core_session_languageT']==3){?>(<?=getSystemLangTxt($_REQUEST['inputLt'],$langTxt["lg:thai"],$langTxt["lg:eng"])?>)<? }?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                     <? if($valPermission=="RW" ){?>
                                                        <div  class="btnSave" title="<?=$langTxt["btn:save"]?>" onclick="executeSubmit();"></div>
                                                      <? }?>
                                                        <div  class="btnBack" title="<?=$langTxt["btn:back"]?>" onclick="btnBackPage('subgroup.php')"></div>
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
    <span class="formFontSubjectTxt"><?=$langMod["txt:subjectsg"]?></span><br/>
    <span class="formFontTileTxt"><?=$langMod["txt:subjectsgDe"]?></span>    </td>
    </tr>
    <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>
		<tr>
<td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:selectgn"]?><span class="fontContantAlert">*</span></td>
<td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
<select name="inputGroupID"  id="inputGroupID"class="formSelectContantTb">
		<option value="0"><?=$langMod["tit:selectg"]?></option>
		<?
$sql_group = "SELECT ";
	if($_REQUEST['inputLt']=="Thai"){
		$sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
	}else if($_REQUEST['inputLt']=="Eng"){
		$sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjecten ";
	}else{
		$sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjectcn ";
	}

	$sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey ='".$_REQUEST['masterkey']."'   ORDER BY ".$mod_tb_root_group."_order DESC ";
$query_group=mysql_query($sql_group);
while($row_group=mysql_fetch_array($query_group)) {
$row_groupid=$row_group[0];
$row_groupname=$row_group[1];
?>
		<option value="<?=$row_groupid?>" <?  if($valGID==$row_groupid){ ?> selected="selected" <?  }?>><?=$row_groupname?></option>
		<? }?>
</select></td>
</tr>
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:subjectsg"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?=$valSubject?>"/></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=$langMod["tit:noteg"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <textarea name="inputComment"  id="inputComment" cols="20" rows="5" class="formTextareaContantTb"><?=$valTitle?></textarea>
    </td>
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
