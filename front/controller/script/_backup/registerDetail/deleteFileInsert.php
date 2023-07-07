<?

// include("config.php");

// $sql_fileNew = "SELECT " . $config['contact']['file-temp'] . "_filename  FROM " . $config['contact']['file-temp'] . " WHERE " . $config['contact']['file-temp'] . "_id 	='" . $_REQUEST['valDelFile'] . "' ";
// $query_fileNew = mysql_query($sql_fileNew);
// $row_fileNew = mysql_fetch_array($query_fileNew);
// $downloadFile = $row_fileNew[0];
// if (file_exists($mod_path_file_contactus . "/" . $downloadFile)) {
//     @unlink($mod_path_file_contactus . "/" . $downloadFile);
// }

// $sql = "DELETE FROM " . $config['contact']['file-temp'] . " WHERE   " . $config['contact']['file-temp'] . "_id='" . $_REQUEST['valDelFile'] . "' ";
// $Query = mysql_query($sql);


// $sql = "SELECT " . $config['contact']['file-temp'] . "_id,
// 		" . $config['contact']['file-temp'] . "_filename,
// 		" . $config['contact']['file-temp'] . "_name,
// 		" . $config['contact']['file-temp'] . "_download,
// 		" . $config['contact']['file-temp'] . "_contantid
// 		FROM " . $config['contact']['file-temp'] . " WHERE " . $config['contact']['file-temp'] . "_contantid 	='" . $_REQUEST['valEditID'] . "'   ORDER BY " . $config['contact']['file-temp'] . "_id ASC";
// $query_file = mysql_query($sql);
// $number_row = mysql_num_rows($query_file);
// if ($number_row >= 1) {
//     $txtFile = "";
//     $namefile = array();
//     while ($row_file = mysql_fetch_array($query_file)) {
//         $linkRelativePath = $mod_path_file_contactus . "/" . $row_file[1];
//         $downloadFile = $row_file[1];
//         $downloadID = $row_file[0];
//         $downloadName = $row_file[2];
//         $countDownload = $row_file[3];
//         $contantid = $row_file[4];
//         $imageType = strstr($downloadFile, '.');
//         $namefile[] = $downloadName;
//         // $txtFile .= "<a href=\"javascript:void(0)\"  onclick=\"delFileUpload($downloadID,$contantid);\" ><img src=\"front/template/default/public/image/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadName . "" . $imageType . " | " . $lang["file:type"] . ": " . $imageType . "  | " . $lang["file:size"] . ": " . get_IconSize($linkRelativePath) . "<br/>";
//         $txtFile .= "<div class=\"upload-wrapper\" ><div id=\"uploadTxt\" class=\"upload-file-txt\"> " . $downloadName . "" . $imageType . " <span class=\"line\">|</span> ขนาด : " . get_IconSize($linkRelativePath) . "</div> <a href=\"javascript:void(0)\" id=\"file$downloadID\" class=\"btn\" onclick=\"delFileUpload($downloadID,$contantid)\"><div class=\"uploadTxt-close\"> <i class=\"fa fa-close\"></i></div></a> </div>";

//     }
// }

// $respons = array();
// $respons['error'] = '';
// $respons['msg'] = $txtFile;
// $respons['namefile'] = implode(",", $namefile);
// echo json_encode($respons);
// //echo $txtFile;

if (file_exists($mod_path_file_form . "/" . $_REQUEST['filename'])) {
    @unlink($mod_path_file_form . "/" . $_REQUEST['filename']);
}
$respons['success'] = true;
echo json_encode($respons);
?>
