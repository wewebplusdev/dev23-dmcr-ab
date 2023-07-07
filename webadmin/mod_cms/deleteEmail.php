<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");
			
	$sql="DELETE FROM ".$mod_tb_root_email." WHERE  ".$mod_tb_root_email."_id 	='".$_POST['valDelFile']."' ";
	$Query=mysql_query($sql);
	
?>

<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
          <?
$sql = "SELECT ".$mod_tb_root_email."_email,".$mod_tb_root_email."_id FROM ".$mod_tb_root_email."  WHERE  ".$mod_tb_root_email."_masterkey='".$_REQUEST["masterkey"]."' AND   ".$mod_tb_root_email."_gid='".$_REQUEST['valEditID']."'  ORDER BY ".$mod_tb_root_email."_id ASC ";
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
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?=number_format($num_email)?>.<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><div class="formDivView"><a href="javascript:void(0)"  onclick="document.myForm.valDelFile.value=<?=$valEmailID?>; modDelEmail('deleteEmail.php')" ><img src="../img/btn/delete.png" align="absmiddle" title="Delete email"  hspace="5" border="0" /></a> <?=$valEmailNew?></div></td>
  </tr>
  
<? }}?>
</table>
<script language="JavaScript" type="text/javascript">
	document.myForm.inputEmail.value=''
	document.myForm.inputEmail.focus();
</script>

