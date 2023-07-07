<?	
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../lib/checkMember.php");
include("config.php");

	if($_REQUEST['execute']=="insert"){

		$sql = "SELECT MAX(".$mod_tb_root_group."_order) FROM ".$mod_tb_root_group;
		$Query=mysql_query($sql);
		$Row=mysql_fetch_array($Query);
		$maxOrder = $Row[0]+1;
		
		$insert="";
		$insert[$mod_tb_root_group."_language"] = "'".$_SESSION[$valSiteManage.'core_session_language']."'";
		$insert[$mod_tb_root_group."_masterkey"] = "'".$_REQUEST["masterkey"]."'";
		
		$insert[$mod_tb_root_group."_name"] = "'".changeQuot($_REQUEST['inputSubjectName'])."'";
		$insert[$mod_tb_root_group."_title"] = "'".changeQuot($_REQUEST['inputComment'])."'";

		$insert[$mod_tb_root_group."_subject"] = "'".changeQuot($_REQUEST['inputSubject'])."'";
		$insert[$mod_tb_root_group."_type"] = "'".changeQuot($_REQUEST['inputType'])."'";
		$insert[$mod_tb_root_group."_crebyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root_group."_creby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$mod_tb_root_group."_lastbyid"] = "'".$_SESSION[$valSiteManage.'core_session_id']."'";
		$insert[$mod_tb_root_group."_lastby"] = "'".$_SESSION[$valSiteManage.'core_session_name']."'";
		$insert[$mod_tb_root_group."_sdate"]="'".DateFormatInsert($_REQUEST['sdateInput'])."'";
		$insert[$mod_tb_root_group."_edate"]="'".DateFormatInsert($_REQUEST['edateInput'])."'";
		
		$insert[$mod_tb_root_group."_credate"] = "NOW()";
		$insert[$mod_tb_root_group."_lastdate"] = "NOW()";
		$insert[$mod_tb_root_group."_status"] = "'Disable'";
		$insert[$mod_tb_root_group."_order"] = "'".$maxOrder."'";
		$sql="INSERT INTO ".$mod_tb_root_group."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
		$Query=mysql_query($sql);			
		$contantID=mysql_insert_id();
		
		$valMaxAns = 5;
		if($contantID!=""){
			for($i=1;$i<=$valMaxAns;$i++){
				if(trim($_POST["inputAns".$i])!=""){
					$insert=array();
					$insert[$mod_tb_ans."_name"] = "'".changeQuot($_POST["inputAns".$i])."'";
					$insert[$mod_tb_ans."_language"] = "'".$_SESSION[$valSiteManage.'core_session_language']."'";
					$insert[$mod_tb_ans."_masterkey"] = "'".$_POST["masterkey"]."'";
					$insert[$mod_tb_ans."_qid"] = "'".$contantID."'";
					$insert[$mod_tb_ans."_order"] = "'".$i."'";
					$sql="INSERT INTO ".$mod_tb_ans."(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
					$Query=mysql_query($sql);
				}
			}
		}

	
		 logs_access('3','Insert');
		 } ?>
<? include("../lib/disconnect.php");?>
<form action="group.php" method="post" name="myFormAction" id="myFormAction">
    <input name="masterkey" type="hidden" id="masterkey" value="<?=$_REQUEST['masterkey']?>" />
    <input name="menukeyid" type="hidden" id="menukeyid" value="<?=$_REQUEST['menukeyid']?>" />
    <input name="inputSearch" type="hidden" id="inputSearch" value="<?=$_REQUEST['inputSearch']?>" />
    <input name="inputGh" type="hidden" id="inputGh" value="<?=$_REQUEST['inputgroupid']?>" />
</form>            
<script language="JavaScript" type="text/javascript"> document.myFormAction.submit(); </script>
