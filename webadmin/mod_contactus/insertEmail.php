<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");
			

		$sql = "SELECT ".$mod_tb_root_email."_email FROM ".$mod_tb_root_email."  WHERE  ".$mod_tb_root_email."_masterkey='".$_REQUEST["masterkey"]."'  AND   ".$mod_tb_root_email."_email='".$_REQUEST['inputEmail']."'  AND   ".$mod_tb_root_email."_gid='".$_REQUEST['valEditID']."'";
		$query=mysql_query($sql);
		$count_record=mysql_num_rows($query);


		if($count_record<=0){
		
		$insert="";
		$insert[$mod_tb_root_email."_gid"] = "'".$_REQUEST['valEditID']."'";
		$insert[$mod_tb_root_email."_masterkey"] = "'".$_REQUEST['masterkey']."'";
		$insert[$mod_tb_root_email."_email"] = "'".changeQuot($_REQUEST['inputEmail'])."'";

		$sql="INSERT INTO ".$mod_tb_root_email."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		$Query=mysql_query($sql);	
		

		}else{
			?>
			<script language="JavaScript" type="text/javascript">
						jQuery("#boxAlertEmail").show();
			</script>
        	<?
		}
		
		
	
?>

<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
          <?
$sql = "SELECT ".$mod_tb_root_email."_email,".$mod_tb_root_email."_id FROM ".$mod_tb_root_email."  WHERE  ".$mod_tb_root_email."_masterkey='".$_REQUEST["masterkey"]."' AND   ".$mod_tb_root_email."_gid='".$_REQUEST['valEditID']."' ORDER BY ".$mod_tb_root_email."_id ASC ";
$query=mysql_query($sql);
$numRowCount=mysql_num_rows($query);
if($numRowCount>=1){
$num_email=0;
while($row=mysql_fetch_array($query)) {
$num_email++;
$valEmailNew=rechangeQuot($row[0]);
$valEmailID=$row[1];

?>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb"><?=number_format($num_email)?>.<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="javascript:void(0)"  onclick="document.myForm.valDelFile.value=<?=$valEmailID?>; modDelEmail('deleteEmail.php')" ><img src="../img/btn/delete.png" align="absmiddle" title="Delete email"  hspace="5"    border="0" /></a> <?=$valEmailNew?></div></td>
  </tr>
  
<? }}?>
</table>
<script language="JavaScript" type="text/javascript">
	document.myForm.inputEmail.value=''
	document.myForm.inputEmail.focus();
</script>

