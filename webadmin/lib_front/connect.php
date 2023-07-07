<?
$valConectDb=mysql_connect($core_db_hostname,$core_db_username,$core_db_password) or die("Warning !! N0 Connect DataBase");
mysql_select_db($core_db_name) or die("Warning !!  N0 Select DataBase");

$charset = "SET NAMES 'utf8'";
mysql_db_query($core_db_name,$charset) or die("Warning !! N0 Set Charset DataBase \n");

?>