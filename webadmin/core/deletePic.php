<?
@include("../lib/session.php");
include("../lib/config.php");
include("../lib/classpic.php");
include("../lib/connect.php");
include("../lib/function.php");

		
	if(file_exists($core_pathname_crupload."/".$_REQUEST['picname'])) {
		@unlink($core_pathname_crupload."/".$_REQUEST['picname']);
	}	


		$update="";
		$update[]=$core_tb_setting."_pic  	=''";
		$sql="UPDATE ".$core_tb_setting." SET ".implode(",",$update)."  ";
		$Query=mysql_query($sql);


			
include("../lib/disconnect.php");
?>