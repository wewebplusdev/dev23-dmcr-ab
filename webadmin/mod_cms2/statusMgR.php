<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("config.php");
// $loaddder=$_POST['Valueloaddder'];
$tablename=$_POST['Valuetablename'];
$statusname=$_POST['Valuestatusname'];
$statusid=$_POST['Valuestatusid'];
// $loadderstatus=$_POST['Valueloadderstatus'];
$filestatus=$_POST['Valuefilestatus'];
$menukeyid=7;
		if($tablename==$mod_tb_root){
			$sqlSch = "SELECT ".$tablename."_masterkey  FROM ".$tablename." WHERE  ".$tablename."_id='".$statusid."' ";
			$querySch=wewebQueryDB($coreLanguageSQL,$sqlSch);
			$rowSch=wewebFetchArrayDB($coreLanguageSQL,$querySch);
			$valMasterkey=$rowSch[0];
		}
$masterkey=$valMasterkey;
include("config.php");



// if($statusname==""){
// $inputstatusname="Unpin";
// }else if($statusname=="Unpin"){
// $inputstatusname="Pin";
// }


     	$sql = "UPDATE ".$tablename." SET "
		.$tablename."_ribbon= '$statusname'  WHERE ".$tablename."_id='". $statusid."'";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		if($tablename==$mod_tb_root){

			// $updateSch = array();
			// $updateSch[]=$core_tb_search."_status  	='$statusname'";
			// $sqlUpdateSch="UPDATE ".$core_tb_search." SET ".implode(",",$updateSch)." WHERE ".$core_tb_search."_contantid='".$statusid."'  AND  ".$core_tb_search."_masterkey 	='".$valMasterkey."'";
			// $querylUpdateSch=wewebQueryDB($coreLanguageSQL,$sqlUpdateSch);
		}

	?>
	<!-- <? if($inputstatusname=="Pin"){?>
    <a href="javascript:void(0)"  onclick="changeStatus('<?=$loaddder?>','<?=$tablename?>','<?=$inputstatusname?>','<?=$statusid?>','<?=$loadderstatus?>','<?=$filestatus?>')" ><span class="fontContantTbEnable"><?=$inputstatusname?></span></a>
                <? }else{?>
    <a href="javascript:void(0)"  onclick="changeStatus('<?=$loaddder?>','<?=$tablename?>','<?=$inputstatusname?>','<?=$statusid?>','<?=$loadderstatus?>','<?=$filestatus?>')" ><span class="fontContantTbDisable"><?=$inputstatusname?></span></a>


                <? }?> -->

                <!-- <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="<?=$statusid?>" /> -->
                <?
//include("../lib/incRss.php");

				?>
