
<?php

$error = "";
$msg = "";
$idAns = $_REQUEST['idAns'];
$fileElementName = 'inputFileUpload-'.$idAns;
if (!empty($_FILES[$fileElementName]['error'])) {
    switch ($_FILES[$fileElementName]['error']) {

        case '1':
            $error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
            break;
        case '2':
            $error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
            break;
        case '3':
            $error = 'The uploaded file was only partially uploaded';
            break;
        case '4':
            $error = 'No file was uploaded.';
            break;

        case '6':
            $error = 'Missing a temporary folder';
            break;
        case '7':
            $error = 'Failed to write file to disk';
            break;
        case '8':
            $error = 'File upload stopped by extension';
            break;
        case '999':
        default:
            $error = 'No error code avaiable';
    }
} elseif ($_FILES[$fileElementName]['tmp_name'] == 'none') {
    $error = 'No file was uploaded..';
} else {

    if (!is_dir($core_pathname_upload . "/" . $_REQUEST['masterkey'])) {
        mkdir($core_pathname_upload . "/" . $_REQUEST['masterkey'], 0777);
    }
    if (!is_dir($mod_path_file_form)) {
        mkdir($mod_path_file_form, 0777);
    }

    $inputFileToUpload = $_FILES[$fileElementName]['tmp_name'];
    $inputFileToName = $_FILES[$fileElementName]['name'];
    
    $filelimit = 10485760;

    $fileType = explode(".", $inputFileToName);

    $file_extension = end($fileType);
    $countBtType = count($fileType) - 1;
    $fileNameNew = $fileType[0];
    $fileTypeName = $file_extension;
    
    if ((!empty($fileTypeName)) && (($fileTypeName == "jpg") || ($fileTypeName == "JPG") || ($fileTypeName == "jpeg") || ($fileTypeName == "JPEG") || ($fileTypeName == "pdf") || ($fileTypeName == "PDF") || ($fileTypeName == "png") || ($fileTypeName == "PNG") )
    ) {

        if ($_FILES[$fileElementName]['size'] < $filelimit) {
            $myNewRand = rand(119, 999);
            $filenamedoc = "file-ans-" . $_REQUEST['myID']. "-" . $idAns . "-" . $myNewRand . ".$fileTypeName";

            if (copy($inputFileToUpload, $mod_path_file_form . "/" . $filenamedoc)) {
                @chmod($mod_path_file_form . "/" . $filenamedoc, 0777);
            }

            if ($_REQUEST['nametodoc'] == "") {
                $nameToinput = $fileNameNew;
            } else {
                $nameToinput = $_REQUEST['nametodoc'];
            }

            $linkRelativePath = $mod_path_file_form . "/" . $filenamedoc;
            $imageType = strstr($filenamedoc, '.');
            $msg .= "<div class=\"upload-wrapper\" ><div id=\"uploadTxt\" class=\"upload-file-txt\"> " . $nameToinput . "" . $imageType . " <span class=\"line\">|</span> ขนาด : " . get_IconSize($linkRelativePath) . "</div> <a href=\"javascript:void(0)\" id=\"file\" class=\"btn\" onclick=\"delFileUpload($idAns)\"><div class=\"uploadTxt-close\"> <i class=\"fa fa-close\"></i></div></a> </div>";
            $namefile[] = $filenamedoc;



//             $list[$config['contact']['file-temp'] . "_contantid"] = $_REQUEST['myID'];
//             $list[$config['contact']['file-temp'] . "_filename"] = $filenamedoc;
//             $list[$config['contact']['file-temp'] . '_name'] = $nameToinput;

//             $insert = sqlinsert($list, $config['contact']['file-temp'], $config['contact']['file-temp'] . "_id");

//             $sql = "SELECT " . $config['contact']['file-temp'] . "_id,
// " . $config['contact']['file-temp'] . "_filename,
// " . $config['contact']['file-temp'] . "_name,
// " . $config['contact']['file-temp'] . "_download,
// " . $config['contact']['file-temp'] . "_contantid
// FROM " . $config['contact']['file-temp'] . "
// WHERE " . $config['contact']['file-temp'] . "_contantid 	='" . $_REQUEST['myID'] . "'
// ORDER BY " . $config['contact']['file-temp'] . "_id ASC";
//             $query_file = mysql_query($sql);
//             $number_row = mysql_num_rows($query_file);
            

//             $namefile = array();
//             if ($number_row >= 1) {
//                 while ($row_file = mysql_fetch_array($query_file)) {
//                     $linkRelativePath = $mod_path_file_form . "/" . $row_file[1];
//                     $downloadFile = $row_file[1];
//                     $downloadID = $row_file[0];
//                     $downloadName = $row_file[2];
//                     $countDownload = $row_file[3];
//                     $contantid = $row_file[4];

//                     $imageType = strstr($downloadFile, '.');
//                     $msg .= "<div class=\"upload-wrapper\" ><div id=\"uploadTxt\" class=\"upload-file-txt\"> " . $downloadName . "" . $imageType . " <span class=\"line\">|</span> ขนาด : " . get_IconSize($linkRelativePath) . "</div> <a href=\"javascript:void(0)\" id=\"file$downloadID\" class=\"btn\" onclick=\"delFileUpload($downloadID,$contantid)\"><div class=\"uploadTxt-close\"> <i class=\"fa fa-close\"></i></div></a> </div>";
//                     $namefile[] = $downloadName;
//                 }
//             }
        } else {
            $error = "ขนาดไฟล์ของคุณใหญ่เกินไป";
        }
    } else {
        $error = "กรุณาตรวจสอบประเภทของไฟล์.. ".$fileTypeName;
    }
}

echo "{";
echo "error: '" . $error . "',\n";
echo "msg: '" . $msg . "',\n";
echo "namefile:'" . implode(",", $namefile) . "'\n";
echo "}";



//include("lib/disconnect.php");
?>