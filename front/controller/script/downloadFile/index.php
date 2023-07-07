<?php

if (!empty($url->uri['file'])) {

    $fileDecode = decodeStr($url->uri['file']);
    $tableDownload = decodeStr($url->uri['t']);
    $idFile = decodeStr($url->uri['id']);
    $filename = explode(".", $fileDecode);
    $dataFile = explode("/", $filename[0]);
    $file_extension = $filename[count($filename) - 1];
    if($file_extension == 'pdf' || $file_extension == 'PDF'){
        $url->uri['type'] = "view";
    }else {
        $url->uri['type'] = "download";
    }

    if($url->uri['type'] == 'download'){
        ###### DOWNLOAD ######
        
        // print_pre(end($dataFile));

        


        // if ($_COOKIE['DOWNLOAD' . end($dataFile)]) {
        //     $functionSave = FALSE;
        // } else {
        //     setcookie("DOWNLOAD" . end($dataFile), true, time() + 100);
            $functionSave = ture;
        // }


        if (!empty($functionSave)) {
              //setcookie("download-" . end($dataFile), $setcookie, time() + (60 * $cookie_dowload_savecouter), _FullUrl);
            //   setcookie("DOWNLOAD" . end($dataFile), true, time() + 100);
              /* save counter download start ********************************************************************************** */
              $sql = "SELECT " . $tableDownload . "_download FROM $tableDownload WHERE " . $tableDownload . "_id = $idFile ";
              $rs = $db->execute($sql);
              $record[$tableDownload . "_download"] = $rs->fields[$tableDownload . "_download"] + 1;
              $updateSQL = $db->GetUpdateSQL($rs, $record);
              $rsUpdate = $db->execute($updateSQL);      
          }
          $file_extension = $filename[count($filename) - 1];
          $myDateArray = explode(".", $downloadFile);
          $path = $fileDecode;


          if (file_exists($path)) {

            //  logs("download", $pageOn, FALSE);
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





    }elseif ($url->uri['type'] == 'view'){
        ###### VIEW ######
        // if ($_COOKIE['DOWNLOAD' . end($dataFile)]) {
        //     $functionSave = FALSE;
        // } else {
        //     setcookie("DOWNLOAD" . end($dataFile), true, time() + 100);
        $functionSave = ture;
        // }

        if (!empty($functionSave)) {
           //setcookie("download-" . end($dataFile), $setcookie, time() + (60 * $cookie_dowload_savecouter), _FullUrl);
        // $_SESSION["download-" . end($dataFile)] = time() + 300;
        $sql = "SELECT " . $tableDownload . "_view FROM $tableDownload WHERE " . $tableDownload . "_id = $idFile ";
        $rs = $db->execute($sql);
        $record[$tableDownload . "_view"] = $rs->fields[$tableDownload . "_view"] + 1;
        $updateSQL = $db->GetUpdateSQL($rs, $record);
        $rsUpdate = $db->execute($updateSQL);
        }
        $file_extension = $filename[count($filename) - 1];
        $myDateArray = explode(".", $downloadFile);
        $path = $fileDecode;

        if (($file_extension == 'pdf' || $file_extension == "PDF")) {
            // $filedisplay="file path here";
              // $filename="file name here";
             header('Content-type:application/pdf');
             header('Content-disposition: inline; filename="'.end($dataFile).'"');
             header('content-Transfer-Encoding:binary');
             header('Accept-Ranges:bytes');
             
            @readfile($path);
          }else {
            if (file_exists($path)) {
                $sql = "SELECT " . $tableDownload . "_download FROM $tableDownload WHERE " . $tableDownload . "_id = $idFile ";
                $rs = $db->execute($sql);
                $record[$tableDownload . "_download"] = $rs->fields[$tableDownload . "_download"] + 1;
                $updateSQL = $db->GetUpdateSQL($rs, $record);
                $rsUpdate = $db->execute($updateSQL);    


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




    }


}