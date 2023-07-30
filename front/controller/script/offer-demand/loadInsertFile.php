<?php
// include("config.php");
// $config['career-join-file']['db'] = "md_rgff";
// $config['complaint']['fileTemp'] = "md_rgtp";

// $core_pathname_upload = $path_upload;
// $mod_path_file        = _DIR . '/upload/register/file';
// $mod_path_file_fornt  = $path_upload."/register/file";


$error = "";
$msg = "";

$fileElementName = 'inputFileUpload';
if (!empty($_FILES['inputFileUpload']['error'])) {
    switch ($_FILES['inputFileUpload']['error']) {

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
} elseif ($_FILES['inputFileUpload']['tmp_name'] == 'none') {
    $error = 'No file was uploaded..';
} else {


    $pathUploadFile = $path_upload . "/form/file";

    // if (!is_dir($core_pathname_upload . "/" . $_REQUEST['masterkey'])) {
    //     mkdir($core_pathname_upload . "/" . $_REQUEST['masterkey'], 0777);
    // }
    // if (!is_dir($mod_path_file)) {
    //     mkdir($mod_path_file, 0777);
    // }

    if(!is_dir($pathUploadFile)) {mkdir($pathUploadFile,0777);}
    if(!is_dir($pathUploadFile . "/real")) {mkdir($pathUploadFile . "/file", 0777);}


    $inputFileToUpload = $_FILES['inputFileUpload']['tmp_name'];
    $inputFileToName = $_FILES['inputFileUpload']['name'];
    $filelimit = 20971520;

    $fileType = explode(".", $inputFileToName);

    $file_extension = end($fileType);
    $countBtType = count($fileType) - 1;
    $fileNameNew = $fileType[0];
    //$fileTypeName = $fileType[$countBtType];
    $fileTypeName = $file_extension;


    // if ((!empty($fileTypeName)) && (($fileTypeName == "jpg") || ($fileTypeName == "JPG") || ($fileTypeName == "pdf") || ($fileTypeName == "PDF") || ($fileTypeName == "docx") || ($fileTypeName == "DOCX")
    // || ($fileTypeName == "doc") || ($fileTypeName == "DOC") || ($fileTypeName == "xlsx") || ($fileTypeName == "XLSX") || ($fileTypeName == "xls") || ($fileTypeName == "XLS"))
    // ) {
    $validextensionsFileUpload = array("jpeg", "jpg", "png","pdf","docx","doc","xlsx","xls","mp4","m4a");

    
    if (in_array($fileTypeName, $validextensionsFileUpload)) {

        if ($_FILES['inputFileUpload']['size'] < $filelimit) {
            // $myNewRand = rand(119, 999);
            $myNewRand = $_REQUEST['myID'] . "-" . date("dhis");
            $filenamedoc = "f-comp-" . $myNewRand . "." . $fileTypeName;

            if (copy($inputFileToUpload, $pathUploadFile . "/file/" . $filenamedoc)) {
                @chmod($pathUploadFile . "/file/" . $filenamedoc, 0777);
            }

            // if ($_REQUEST['nametodoc'] == "") {
                $nameToinput = $fileNameNew;
            // } else {
            //     $nameToinput = $_REQUEST['nametodoc'];
            // }



            $list[$config['complaint']['fileTemp'] . "_contantid"] = $_REQUEST['myID'];
            $list[$config['complaint']['fileTemp'] . "_filename"] = $filenamedoc;
            $list[$config['complaint']['fileTemp'] . '_name'] = $nameToinput;
            $list[$config['complaint']['fileTemp'] . '_language'] = "Thai";
            $list[$config['complaint']['fileTemp'] . '_masterkey'] = $_REQUEST['masterkey'];
            $insert = sqlinsert($list, $config['complaint']['fileTemp'], $config['complaint']['fileTemp'] . "_id");


            $sql = "SELECT " . $config['complaint']['fileTemp'] . "_id,
            " . $config['complaint']['fileTemp'] . "_filename,
            " . $config['complaint']['fileTemp'] . "_name,
            " . $config['complaint']['fileTemp'] . "_download,
            " . $config['complaint']['fileTemp'] . "_contantid
            FROM " . $config['complaint']['fileTemp'] . "
            WHERE " . $config['complaint']['fileTemp'] . "_contantid 	='" . $_REQUEST['myID'] . "'
            ORDER BY " . $config['complaint']['fileTemp'] . "_id ASC";

            // $query_file = wewebQueryDB($coreLanguageSQL,$sql);
            // $number_row = wewebNumRowsDB($coreLanguageSQL,$query_file);
            $query_file = $db->Execute($sql);
            //$msg .= $_REQUEST['myID'];

            $namefile = array();
            if ($query_file->_numOfRows >= 1) {
                
                // while ($row_file = wewebFetchArrayDB($coreLanguageSQL,$query_file)) {
                foreach ($query_file as $keyFile => $row_file) {
                    
                    $linkRelativePath = $pathUploadFile . "/file/" . $row_file[1];
                    $downloadFile = $row_file[1];
                    $downloadID = $row_file[0];
                    $downloadName = $row_file[2];
                    $countDownload = $row_file[3];
                    $contantid = $row_file[4];


                    $imageType = strstr($downloadFile, '.');


                    $msg .= "<div class=\"upload-wrapper\" ><div id=\"uploadTxt\" class=\"upload-file-txt\"> " . $downloadName . "" . $imageType . " <span class=\"line\">|</span> ขนาด : " . get_IconSize($linkRelativePath) . " </div><a href=\"javascript:void(0)\" id=\"file$downloadID\" class=\"btn\" onclick=\"delFileUpload($downloadID,$contantid)\"> <div class=\"uploadTxt-close\"> <i class=\"fa fa-close\"></i></div> </a> </div>";

                    // $msg .= "<a href=\"javascript:void(0)\" id=\"file$downloadID\"  onclick=\"delFileUpload($downloadID,$contantid)\" ><img src=\"front/template/default/public/image/btn/delete.png\" align=\"absmiddle\" title=\"Delete file\"  hspace=\"10\"  vspace=\"10\"   border=\"0\" /></a>" . $downloadName . "" . $imageType . " | " . $lang["file:type"] . ": " . $imageType . "  | " . $lang["file:size"] . ": " . get_IconSize($linkRelativePath) . " <br/>";
                    // $msg .= "<li> " . $downloadName . "" . $imageType . " <span class=\"line\">|</span> " . $lang["file:size"] . ": " . get_IconSize($linkRelativePath) . " <a href=\"javascript:void(0)\" id=\"file$downloadID\" class=\"icon-close\" onclick=\"delFileUpload($downloadID,$contantid)\"> <span class=\"fa fa-times-circle\" aria-hidden=\"true\"></span> </a> </li>";
                    $namefile[] = $downloadName;


                }
            }
            
        } else {
            $error = "ขนาดไฟล์ของคุณใหญ่เกินไป";
        }
    } else {
        $error = "กรุณาตรวจสอบประเภทของไฟล์";
    }
}

echo "{";
echo "error: '" . $error . "',\n";
echo "msg: '" . $msg . "',\n";
echo "namefile:'" . implode(",", $namefile) . "'\n";
echo "}";



//include("lib/disconnect.php");
