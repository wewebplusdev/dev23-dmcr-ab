<?php
@include("../lib/session.php");
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="report_contact_'.date('Y-m-d').'.xls"');#ชื่อไฟล์
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");
include("incModLang.php");
include("config.php");

logs_access('3','Export');

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">


<HEAD>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">

</style>
</HEAD>
<BODY>
<table border="1" cellspacing="1" cellpadding="2"  align="center">
  <tbody>
    <tr >
      <td width="56" height="30" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langMod["tit:no"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langMod["tit:selectgn"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langMod["tit:subject"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langMod["tit:mgs"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langMod["tit:email"]?></td>
      <!-- <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langMod["tit:tel"]?></td> -->
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langMod["tit:address"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langTxt["us:credate"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langMod["tit:by"]?></td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle">IP </td>
      <td width="175" align="center" bgcolor="#eeeeee" class="bold" valign="middle"><?=$langTxt["mg:status"]?></td>
      
    </tr>
    
    <?
$sql=str_replace('\\','',$_POST['sql_export']);
$query=wewebQueryDB($coreLanguageSQL,$sql) ;
$count_record=wewebNumRowsDB($coreLanguageSQL,$query);
$date_print=DateFormat(date("Y-m-d"));

			  if($count_record>=1){
			  $index=1;
			while($rowExport=wewebFetchArrayDB($coreLanguageSQL,$query)) {
			$valID=$rowExport[0];
			$valCredate=DateFormat($rowExport[1]);
			$valStatus=$rowExport[2];
			$valSubject=rechangeQuot($rowExport[3]);
			$valMessage=rechangeQuot($rowExport[4]);
			$valCreby=rechangeQuot($rowExport[5]);
			$valAddress=rechangeQuot($rowExport[6]);
			$valEmail=rechangeQuot($rowExport[7]);
			$valTel=rechangeQuot($rowExport[8]);
			$valIp=rechangeQuot($rowExport[9]);
			$valGid=$rowExport[10];
			
			$sql_group = "SELECT ";
			if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
				$sql_group .= "  ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subject";
			}else{
				$sql_group .= " ".$mod_tb_root_group."_id,".$mod_tb_root_group."_subjecten ";
			}
			 
			$sql_group .= "  FROM ".$mod_tb_root_group." WHERE  ".$mod_tb_root_group."_id='".$valGid."'  ORDER BY ".$mod_tb_root_group."_order DESC ";
		$query_group=wewebQueryDB($coreLanguageSQL,$sql_group);
		$row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group);
		$row_groupid=$row_group[0];
	 	$row_groupname=$row_group[1];
		
			?>
    
    <tr bgcolor="#ffffff">
      <td height="30" align="center"  valign="middle"><?=$index?></td>
      <td align="left"  valign="middle"><?=$row_groupname?></td>
      <td align="left"  valign="middle"><?=$valSubject?></td>
      <td align="left"  valign="middle"><?=$valMessage?></td>
      <td align="left" valign="middle"><?=$valEmail?></td>
      <!-- <td align="left" valign="middle">'<?=$valTel?></td> -->
      <td align="left" valign="middle"><?=$valAddress?></td>
      <td align="left" valign="middle">'<?=$valCredate?></td>
      <td align="left" valign="middle"><?=$valCreby?></td>
      <td align="left" valign="middle"><?=$valIp?></td>
      <td align="left" valign="middle"><?=$valStatus?></td>
    </tr>
    <? 
								$index++;
									}
									?>
    

    <? } ?>
    </tbody>
    </table>
    <table border="0" cellspacing="1" cellpadding="2"  align="left">
  <tbody>
        <tr >
      <td width="175" align="right" valign="middle" class="bold">Print date : </td>
      <td  width="175" align="left" valign="middle"><?=$date_print?></td>
    </tr>
  </tbody>
</table>
</BODY>

</HTML>
