<?
## Mod Table ###################################
$mod_tb_root = "md_cms";
$mod_tb_root_group = "md_cmg";
// $mod_tb_root_subgroup = "md_cmsg";
$mod_tb_file = "md_cmf";
$mod_tb_fileTemp = "md_cmtp";
$mod_tb_root_album = "md_cma";
$mod_tb_root_albumTemp = "md_cmatp";
// $mod_tb_set = "md_ens";
// $mod_tb_root_email = "md_ene";
## Mod Folder ###################################
$mod_fd_root = "mod_cms";

## Setting Value ###################################
$modTxtShowPic=array("แสดงรูปภาพในหน้ารายละเอียด","ไม่แสดง","แสดง");

## URL Search ###################################
 $mod_url_search_th = "news/detail";
 $mod_url_search_en = "news/detail";

 if ($masterkey == 'daily') {
    $mod_fd_frontUrl = "news-daily";
 }else if($masterkey == 'job') {
    $mod_fd_frontUrl = "news-career";
 }

## Size Photo ###################################
$sizeWidthPic="780";
$sizeHeightPic="485";

$sizeWidthOff="50";
$sizeHeightOff="50";

$sizeWidthAlbum="980";
$sizeHeightAlbum="490";

$sizeWidthAlbumOff="250";
$sizeHeightAlbumOff="125";

## Mod Path RSS ###################################
$mod_fullpath_pictures  = $core_fullpath_rss."/".$masterkey."/pictures";

## Mod Path ###################################

$mod_path_html        = $core_pathname_upload."/".$masterkey."/html";
$mod_path_html_fornt  = $core_pathname_upload_fornt."/".$masterkey."/html";

$mod_path_file        = $core_pathname_upload."/".$masterkey."/file";
$mod_path_file_fornt  = $core_pathname_upload_fornt."/".$masterkey."/file";

$mod_path_pictures        = $core_pathname_upload."/".$masterkey."/pictures";
$mod_path_pictures_fornt  = $core_pathname_upload_fornt."/".$masterkey."/pictures";



$mod_path_office        = $core_pathname_upload."/".$masterkey."/office";
$mod_path_office_fornt  = $core_pathname_upload_fornt."/".$masterkey."/office";

$mod_path_real        = $core_pathname_upload."/".$masterkey."/real";
$mod_path_real_fornt  = $core_pathname_upload_fornt."/".$masterkey."/real";

$mod_path_album        = $core_pathname_upload."/".$masterkey."/album";
$mod_path_album_fornt  = $core_pathname_upload_fornt."/".$masterkey."/album";

$mod_path_vdo        = $core_pathname_upload."/".$masterkey."/vdo";
$mod_path_vdo_fornt  = $core_pathname_upload_fornt."/".$masterkey."/vdo";

?>
