<?php

// include("config.php");
$mod_path_file =  $path_upload . "/" . $config['complaint']['masterkey'] . "/file";
// $pathUploadFile = $path_upload . "/" . $_REQUEST['masterkey'];
$sql_fileNew = "SELECT " . $config['complaint']['fileTemp'] . "_filename  FROM " . $config['complaint']['fileTemp'] . " WHERE " . $config['complaint']['fileTemp'] . "_id 	='" . $_REQUEST['valDelFile'] . "' ";
// $query_fileNew = wewebQueryDB($coreLanguageSQL,$sql_fileNew);
$query_fileNew = $db->Execute($sql_fileNew);
$row_fileNew = $query_fileNew->fields;
$downloadFile = $row_fileNew[0];
if (file_exists($mod_path_file . "/" . $downloadFile)) {
    @unlink($mod_path_file . "/" . $downloadFile);
}

$sql = "DELETE FROM " . $config['complaint']['fileTemp'] . " WHERE   " . $config['complaint']['fileTemp'] . "_id='" . $_REQUEST['valDelFile'] . "' ";
// $Query = wewebQueryDB($coreLanguageSQL,$sql);
$Query = $db->Execute($sql);


$sql = "SELECT " . $config['complaint']['fileTemp'] . "_id,
		" . $config['complaint']['fileTemp'] . "_filename,
		" . $config['complaint']['fileTemp'] . "_name,
		" . $config['complaint']['fileTemp'] . "_download,
		" . $config['complaint']['fileTemp'] . "_contantid
		FROM " . $config['complaint']['fileTemp'] . " WHERE " . $config['complaint']['fileTemp'] . "_contantid 	='" . $_REQUEST['valEditID'] . "'   ORDER BY " . $config['complaint']['fileTemp'] . "_id ASC";
$query_file = $db->Execute($sql);
$number_row = $query_file->_numOfRows;
if ($number_row >= 1) {
    $txtFile = "";
    $namefile = array();
    // while ($row_file = wewebFetchArrayDB($coreLanguageSQL,$query_file)) {
    foreach ($query_file as $key => $row_file) {

        $linkRelativePath = $mod_path_file . "/" . $row_file[1];
        $downloadFile = $row_file[1];
        $downloadID = $row_file[0];
        $downloadName = $row_file[2];
        $countDownload = $row_file[3];
        $contantid = $row_file[4];
        $imageType = strstr($downloadFile, '.');
        $namefile[] = $downloadName;
        // $txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"delFileUpload($downloadID,$contantid);\" ><img src=\"front/template/default/public/image/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadName . "" . $imageType . " | " . $lang["file:type"] . ": " . $imageType . "  | " . $lang["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
        // $txtFile .= "<li> " . $downloadName . "" . $imageType . " <span class=\"line\">|</span> " . $lang["file:size"] . ": " . get_IconSize($linkRelativePath) . " <a href=\"javascript:void(0)\" id=\"file$downloadID\ class=\"btn\" onclick=\"delFileUpload($downloadID,$contantid)\"> <span class=\"icon-close\"></span> </a> </li>";
        // $txtFile .= "<li> " . $downloadName . "" . $imageType . " <span class=\"line\">|</span> " . $lang["file:size"] . ": " . get_IconSize($linkRelativePath) . " <a href=\"javascript:void(0)\" id=\"file$downloadID\" class=\"icon-close\" onclick=\"delFileUpload($downloadID,$contantid)\"> <span class=\"fa fa-times-circle\" aria-hidden=\"true\"></span> </a> </li>";
        $txtFile .= "<div class=\"upload-wrapper\" ><div id=\"uploadTxt\" class=\"upload-file-txt\"> " . $downloadName . "" . $imageType . " <span class=\"line\">|</span> ขนาด : " . get_IconSize($linkRelativePath) . " </div><a href=\"javascript:void(0)\" id=\"file$downloadID\" class=\"btn\" onclick=\"delFileUpload($downloadID,$contantid)\"> <div class=\"uploadTxt-close\"> <i class=\"fa fa-close\"></i></div> </a> </div>";

    }
}

$respons = array();
$respons['error'] = '';
$respons['msg'] = $txtFile;
$respons['namefile'] = implode(",", $namefile);
echo json_encode($respons);
//echo $txtFile;
?>
