<?
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2= getNameMenu($_REQUEST["menukeyid"]);
$valPermission= getUserPermissionOnMenu($_SESSION[$valSiteManage."core_session_groupid"],$_REQUEST["menukeyid"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">

<link href="../css/theme.css" rel="stylesheet"/>
<title><?=$core_name_title?></title>
<script language="JavaScript"  type="text/javascript" src="../js/jquery-1.9.0.js"></script>
<script language="JavaScript"  type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script language="JavaScript"  type="text/javascript" src="../js/scriptCoreWeweb.js"></script>
<script type="text/javascript" language="javascript">


</script>
</head>

<body>
<?
// Check to set default value #########################
$module_default_pagesize = $core_default_pagesize;
$module_default_maxpage = $core_default_maxpage;
$module_default_reduce = $core_default_reduce;
$module_default_pageshow = 1;
$module_sort_number = $core_sort_number;

if($_REQUEST['module_pagesize']=="") {
	$module_pagesize = $module_default_pagesize;
}else{
	$module_pagesize =$_REQUEST['module_pagesize'];
}

if($_REQUEST['module_pageshow']=="") {
	$module_pageshow = $module_default_pageshow;
}else{
	$module_pageshow =$_REQUEST['module_pageshow'];
}

if($_REQUEST['module_adesc']=="") {
	$module_adesc = $module_sort_number;
}else{
	$module_adesc =$_REQUEST['module_adesc'];
}

if($_REQUEST['module_orderby']=="")  {
	$module_orderby = $mod_tb_root."_id";
}else{
	$module_orderby =$_REQUEST['module_orderby'];
}

if($_REQUEST['inputSearch']!="") {
	$inputSearch=trim($_REQUEST['inputSearch']);
}else{
	$inputSearch =$_REQUEST['inputSearch'];
}

	$sql_export = "SELECT  ".$mod_tb_root."_id , ".$mod_tb_root."_credate, ".$mod_tb_root."_status 	, ".$mod_tb_root."_subject, ".$mod_tb_root."_message, ".$mod_tb_root."_name  ,  ".$mod_tb_root."_address  ,  ".$mod_tb_root."_email  ,  ".$mod_tb_root."_tel   ,  ".$mod_tb_root."_ip   ,  ".$mod_tb_root."_gid  FROM ".$mod_tb_root;
	$sql_export = $sql_export."  WHERE  ".$mod_tb_root."_masterkey='".$_REQUEST["masterkey"]."' ";

if($_REQUEST['inputGh']>=1) {
$sql_export = $sql_export."  AND ".$mod_tb_root."_gid ='".$_REQUEST['inputGh']."'   ";
}

if($inputSearch<>"") {
	$sql_export = $sql_export."  AND   ( ".$mod_tb_root."_subject LIKE '%$inputSearch%'  OR  ".$mod_tb_root."_message LIKE '%$inputSearch%'OR ".$mod_tb_root."_email LIKE '%$inputSearch%' OR ".$mod_tb_root."_name LIKE '%$inputSearch%'   ) ";
}


 $sql_export .= " ORDER BY $module_orderby  DESC ";


?>
<form action="?" method="post" name="myFormExport" id="myFormExport">
<input name="sql_export" type="hidden" id="sql_export" value="<?=$sql_export?>" />
<input name="language_export" type="hidden" id="language_export" value="<?=$_SESSION[$valSiteManage.'core_session_language']?>" />
<input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST["masterkey"]?>" />
<input name="masterkey_g" type="hidden" id="masterkey_g" value="<?=$_REQUEST["masterkey_g"]?>" />
<input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST["menukeyid"]?>" />
</form>

<form action="?" method="post" name="myForm" id="myForm">
<input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
<input name="masterkey_g" type="hidden" id="masterkey_g" value="<?=$_REQUEST['masterkey_g']?>" />
<input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
<input name="module_pageshow" type="hidden" id="module_pageshow" value="<?=$module_pageshow?>" />
<input name="module_pagesize" type="hidden" id="module_pagesize" value="<?=$module_pagesize?>" />
<input name="module_orderby" type="hidden" id="module_orderby" value="<?=$module_orderby?>" />

					<!-- <div class="divRightNav">
                        <table width="96%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"><span class="fontContantTbNav"><a href="<?=$valLinkNav1?>" target="_self"><?=$valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?=$valNav2?></span></td>
                        <td  class="divRightNavTb" align="right">



                        </td>
                        </tr>
                        </table>
					</div> -->
                    <div class="divRightHeadSearch" >

                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;" align="center">

    <tr>
    <td style="padding-right:10px;"  width="42%">
    <select name="inputGh"  id="inputGh" onchange="document.myForm.submit(); " class="formSelectSearchL" >
       <option value="0"><?=$langMod["tit:selectg"]?> </option>
        <?
	$sql_group = "SELECT ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject,".$mod_tb_root_group."_subjecten  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_masterkey ='".$_REQUEST['masterkey_g']."'   ORDER BY ".$mod_tb_root_group."_order DESC ";
		$query_group=mysql_query($sql_group);
		while($row_group=mysql_fetch_array($query_group)) {
		$row_groupid=$row_group[0];
		$row_groupname=$row_group[1];
		$row_groupnameeng=$row_group[2];
					if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
							$valNameShow=$row_groupname;
					}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
							$valNameShow=$row_groupnameeng;
					}
		?>
        <option value="<?=$row_groupid?>" <?  if($_REQUEST['inputGh']==$row_groupid){ ?> selected="selected" <?  }?>><?=$valNameShow?></option>
        <? }?>
    </select></td>
    <td   id="boxSelectTest"  width="42%">
  <input name="inputSearch" type="text"  id="inputSearch" value="<?=trim($_REQUEST['inputSearch'])?>" class="formInputSearchI"  placeholder="<?=$langTxt["sch:search"]?>" /></td>
          <td style="padding-right:10px;" align="right" width="5%"><input name="searchOk" id="searchOk" onClick="document.myForm.submit();"  type="button" class="btnSearch"  value=" "  /></td>
    </tr>
</table>

  </div>
                            <div class="divRightHead" >
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?=$valNav2?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                    <? if($valPermission=="RW"){?>

                                                        <div  class="btnDel" title="<?=$langTxt["btn:del"]?>"   onclick="
if(Paging_CountChecked('CheckBoxID',document.myForm.TotalCheckBoxID.value)>0) {
	if(confirm('<?=$langTxt["mg:delpermis"]?>')) {
          delContactNew('deleteContant.php');
	}
} else {
		alert('<?=$langTxt["mg:selpermis"] ?>');
}
				  "></div>
                                                        <div  class="btnExport" title="<?=$langTxt["btn:export"]?>" onclick="
                    document.myFormExport.action ='exportReport.php';
                    document.myFormExport.submit();
                  "></div>
                                                        <? }?>
                                                    </td>
                                                </tr>
                                            </table>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                             <div class="divRightMain" >
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center"   class="tbBoxListwBorder">
   <tr ><td width="3%"  class="divRightTitleTbL"  valign="middle" align="center" >
        <input name="CheckBoxAll" type="checkbox"  id="CheckBoxAll"  value="Yes" onClick="Paging_CheckAll(this,'CheckBoxID',document.myForm.TotalCheckBoxID.value)"   class="formCheckboxHead" />    </td>

     <td align="left"   valign="middle"  class="divRightTitleTb" ><span class="fontTitlTbRight"><?=$langMod["tit:subject"]?></span></td>
     <td width="20%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?=$langMod["tit:by"]?></span></td>

    <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?=$langTxt["mg:status"]?></span></td>
    <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?=$langTxt["us:credate"]?></span></td>
    <td width="12%"  class="divRightTitleTbR"  valign="middle"  align="center"><span class="fontTitlTbRight"><?=$langTxt["mg:manage"]?></span></td>
  </tr>
  <?
// SQL SELECT #########################
$sql = "SELECT ".$mod_tb_root."_id, ".$mod_tb_root."_name, ".$mod_tb_root."_subject, ".$mod_tb_root."_status,".$mod_tb_root."_credate ,".$mod_tb_root."_message  ,".$mod_tb_root."_email  ,".$mod_tb_root."_tel FROM ".$mod_tb_root;
$sql = $sql."  WHERE ".$mod_tb_root."_masterkey ='".$_REQUEST['masterkey']."'   ";

if($_REQUEST['inputGh']>=1) {
$sql = $sql."  AND ".$mod_tb_root."_gid ='".$_REQUEST['inputGh']."'   ";
}

if($inputSearch<>"") {
	$sql = $sql."  AND   ( ".$mod_tb_root."_subject LIKE '%$inputSearch%'  OR  ".$mod_tb_root."_message LIKE '%$inputSearch%'OR ".$mod_tb_root."_email LIKE '%$inputSearch%' OR ".$mod_tb_root."_name LIKE '%$inputSearch%'   ) ";
}


$query=mysql_query($sql);
$count_totalrecord=mysql_num_rows($query);

// Find max page size #########################
if($count_totalrecord>$module_pagesize) {
	$numberofpage= ceil($count_totalrecord/$module_pagesize);
} else {
	$numberofpage=1;
}

// Recover page show into range #########################
if($module_pageshow>$numberofpage) { $module_pageshow=$numberofpage; }

// Select only paging range #########################
$recordstart = ($module_pageshow-1)*$module_pagesize;

  $sql .= " ORDER BY $module_orderby $module_adesc LIMIT $recordstart , $module_pagesize ";

$query=mysql_query($sql);
$count_record=mysql_num_rows($query);
$index=1;
$valDivTr="divSubOverTb";
if($count_record>0) {
	while($index<$count_record+1) {
		$row=mysql_fetch_array($query);
		$valID=$row[0];
		$valName=rechangeQuot($row[1]);
		$valSubject=rechangeQuot($row[2]);
		$valStatus=$row[3];
	 	$valDateCredate = dateFormatReal($row[4]);
	 	$valTimeCredate = timeFormatReal($row[4]);
		$valMessage=rechangeQuot($row[5]);
		$valEmail=rechangeQuot($row[6]);
		$valTel=rechangeQuot($row[7]);
		if($valStatus=="Read"){
			$valStatusClass=	"fontContantTbEnable";
		}else{
			$valStatusClass=	"fontContantTbDisable";
		}

		if($valDivTr=="divSubOverTb"){
			$valDivTr=	"divOverTb";
		}else{
			$valDivTr="divSubOverTb";
		}


  ?>
  <tr class="<?=$valDivTr?>" >
     <td  class="divRightContantOverTbL"  valign="top" align="center" ><input  id="CheckBoxID<?=$index?>" name="CheckBoxID<?=$index?>" type="checkbox" class="formCheckboxList" onClick="Paging_CheckAllHandle(document.myForm.CheckBoxAll,'CheckBoxID',document.myForm.TotalCheckBoxID.value)" value="<?=$valID?>" />    </td>
     <td  class="divRightContantOverTb"   valign="top" align="left" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="583" align="left"><a  href="javascript:void(0)"  onclick="
    document.myFormHome.inputLt.value='Thai';
   document.myFormHome.valEditID.value=<?=$valID?>;
    viewContactNew('viewContant_ajax.php');" ><?=$valSubject?></a><br />
<span class="fontContantTbTime"><?=$langMod["tit:email"]?>: <?=$valEmail?><br />
<?=$langMod["tit:tel"]?>: <?=$valTel?></span></td>
  </tr>
</table></td>

     <td  class="divRightContantOverTb"  valign="top"  align="center"><span class="fontContantTbupdate"><?=$valName?></span></td>
     <td  class="divRightContantOverTb"  valign="top"  align="center">

               <? if($valStatus=="Read"){?>
                   <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }else{?>
                    <span class="<?=$valStatusClass?>"><?=$valStatus?></span>
                <? }?>

           </td>
    <td  class="divRightContantOverTb"  valign="top"  align="center">
    <span class="fontContantTbupdate"><?=$valDateCredate?></span><br/>
    <span class="fontContantTbTime"><?=$valTimeCredate?></span>    </td>
    <td  class="divRightContantOverTbR"  valign="top"  align="center">
    <? if($valPermission=="RW"){?>
    <table  border="0" cellspacing="0" cellpadding="0">
  <tr>
<td valign="top" align="center" width="30">
    <div class="divRightManage" title="<?=$langTxt["btn:del"]?>"  onClick="
            if(confirm('<?=$langTxt["mg:delpermis"]?>')) {
            Paging_CheckedThisItem( document.myForm.CheckBoxAll, <?=$index?>, 'CheckBoxID', document.myForm.TotalCheckBoxID.value );
          delContactNew('deleteContant_ajax.php');
            }
            ">
     <img src="../img/btn/delete.png"  /><br/>
    <span class="fontContantTbManage"><?=$langTxt["btn:del"]?></span>    </div>    </td>
  </tr>
</table>
<? }?>    </td>
  </tr>

<?
$index++;
}
	}else{?>
 <tr >
    <td colspan="6" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?=$langTxt["mg:nodate"]?></td>
    </tr>
<? }?>

<tr >
    <td colspan="7" align="center"  valign="middle"  class="divRightContantTbRL" ><table width="98%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                        <tr>
                        <td  class="divRightNavTb" align="left"><span class="fontContantTbNavPage"><?=$langTxt["pr:All"]?> <b><?=number_format($count_totalrecord)?></b> <?=$langTxt["pr:record"]?></span></td>
                        <td  class="divRightNavTb" align="right">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
<td align="right" style="padding-right:10px;"><span class="fontContantTbNavPage"><?=$langTxt["pr:page"]?>
<? if($numberofpage>1) { ?>
<select name="toolbarPageShow"  class="formSelectContantPage" onChange="document.myForm.module_pageshow.value=this.value; document.myForm.submit(); ">
<?
if($numberofpage<$module_default_maxpage) {
	// Show page list #########################
	for($i=1;$i<=$numberofpage;$i++) {
		echo "<option value=\"$i\"";
		if($i==$module_pageshow) { echo " selected"; }
		echo ">$i</option>";
	}

}else {
	// # If total page count greater than default max page  value then reduce page select size #########################
	$starti = $module_pageshow-$module_default_reduce;
	if($starti<1) { $starti=1; }
	$endi = $module_pageshow+$module_default_reduce;
	if($endi>$numberofpage) { $endi=$numberofpage; }
	//#####################
	for($i=$starti ;$i<=$endi;$i++) {
		echo "<option value=\"$i\"";
		if($i==$module_pageshow) { echo " selected"; }
		echo ">$i</option>";
	}
}
?>
</select>
<? } else { ?>
 <b><?=$module_pageshow?></b>
 <? }?>
  <?=$langTxt["pr:of"]?> <b><?=$numberofpage?></b></span></td>
		<? if($module_pageshow>1) { ?>
		<td width="21" align="center"> <img src="../img/controlpage/playset_start.gif" width="21" height="21"
		onmouseover="this.src='../img/controlpage/playset_start_active.gif'; this.style.cursor='hand';"
		onmouseout="this.src='../img/controlpage/playset_start.gif';"
		onclick="document.myForm.module_pageshow.value=1; document.myForm.submit();"  style="cursor:pointer;" /></td>
		<? } else { ?>
		<td width="21" align="center"><img src="../img/controlpage/playset_start_disable.gif" width="21" height="21" /></td>
		<? } ?>
		<? if($module_pageshow>1) {
		$valPrePage=$module_pageshow-1;
		 ?>
		<td width="21" align="center"> <img src="../img/controlpage/playset_backward.gif" width="21" height="21"  style="cursor:pointer;"
		onmouseover="this.src='../img/controlpage/playset_backward_active.gif'; this.style.cursor='hand';"
		onmouseout="this.src='../img/controlpage/playset_backward.gif';"
		onclick="document.myForm.module_pageshow.value='<?=$valPrePage?>'; document.myForm.submit();" /></td>
		<? } else { ?>
		<td width="21" align="center"><img src="../img/controlpage/playset_backward_disable.gif" width="21" height="21" /></td>
		<? } ?>
		<td width="21" align="center"> <img src="../img/controlpage/playset_stop.gif" width="21" height="21"   style="cursor:pointer;"
		onmouseover="this.src='../img/controlpage/playset_stop_active.gif'; this.style.cursor='hand';"
		onmouseout="this.src='../img/controlpage/playset_stop.gif';"
		onclick="
		with(document.myForm) {
		module_pageshow.value='';
		module_pagesize.value='';
		module_orderby.value='';
        document.myForm.submit();
		}
		" /></td>
		<? if($module_pageshow<$numberofpage) {
		$valNextPage=$module_pageshow+1;
		 ?>
		<td width="21" align="center"> <img src="../img/controlpage/playset_forward.gif" width="21" height="21"   style="cursor:pointer;"
		onmouseover="this.src='../img/controlpage/playset_forward_active.gif'; this.style.cursor='hand';"
		onmouseout="this.src='../img/controlpage/playset_forward.gif';"
		onclick="document.myForm.module_pageshow.value='<?=$valNextPage?>'; document.myForm.submit();" /></td>
		<? } else { ?>
		<td width="10" align="center"><img src="../img/controlpage/playset_forward_disable.gif" width="21" height="21" /></td>
		<? } ?>
		<? if($module_pageshow<$numberofpage) { ?>
		<td width="10" align="center"><img src="../img/controlpage/playset_end.gif" width="21" height="21"   style="cursor:pointer;"
		onmouseover="this.src='../img/controlpage/playset_end_active.gif'; this.style.cursor='hand';"
		onmouseout="this.src='../img/controlpage/playset_end.gif';"
		onclick="document.myForm.module_pageshow.value='<?=$numberofpage?>'; document.myForm.submit();" /></td>
		<? } else { ?>
		<td width="10" align="center"><img src="../img/controlpage/playset_end_disable.gif" width="21" height="21" /></td>
		<? } ?>
		</tr>
		</table>                        </td>
                        </tr>
                        </table></td>
    </tr>
</table>
<input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?=$index-1?>" />
<div class="divRightContantEnd"></div>
                             </div>

</form>
<? include("../lib/disconnect.php");?>

 </body>
</html>
