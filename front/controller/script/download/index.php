<?php
if (!empty($url->uri['file'])) {
    $fileDecode = decodeStr($url->uri['file']);
    $tableDownload = decodeStr($url->uri['t']);
    $filename = explode(".", $fileDecode);
    $dataFile = explode("/", $filename[0]);
    // print_pre($fileDecode);
    // die();
    if (!empty($_SESSION["download-" . end($dataFile)])) {
       // echo $_SESSION["download-" . end($dataFile)] - time();
        if ($_SESSION["download-" . end($dataFile)] - time() <= 0) {
            $functionSave = TRUE;
        } else {
            $functionSave = FALSE;
        }
    } else {
        $functionSave = TRUE;
    }

    if (!empty($functionSave) && !empty($tableDownload)) {
        //setcookie("download-" . end($dataFile), $setcookie, time() + (60 * $cookie_dowload_savecouter), _FullUrl);
        $_SESSION["download-" . end($dataFile)] = time() + (60 * $cookie_dowload_savecouter);
        /* save counter download start ********************************************************************************** */
        $sql = "SELECT " . $tableDownload . "_download FROM $tableDownload WHERE " . $tableDownload . "_filename like '" . end($dataFile) . "%'";
        // print_pre($sql);
        // die();
        $rs = $db->execute($sql);

        $record[$tableDownload . "_download"] = $rs->fields[$tableDownload . "_download"] + 1;
        $updateSQL = $db->GetUpdateSQL($rs, $record);
        $rsUpdate = $db->execute($updateSQL);

        /* save counter download end ********************************************************************************** */
    }

    $file_extension = $filename[count($filename) - 1];
    $myDateArray = explode(".", $downloadFile);
    $path = $fileDecode;

    if (file_exists($path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/' . $file_extension);
        header('Content-Disposition: attachment; filename="' . urldecode($url->uri['n']) . '.' . $file_extension . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));
        ob_clean();
        ob_end_flush();
        $handle = fopen($path, "rb");
        while (!feof($handle)) {
            echo fread($handle, 1000);
        }
        exit();
    } else {
        echo "no have";
    }
}