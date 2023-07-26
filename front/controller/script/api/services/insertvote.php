<?php

if (!empty($_REQUEST['gid'])) {
    $valIP = $_SERVER["REMOTE_ADDR"];
    $sqlType = "SELECT " . $config['vote']['main']['db'] . "_type FROM " . $config['vote']['main']['db'] . " WHERE  " . $config['vote']['main']['db'] . "_id ='" . $_REQUEST['gid'] . "'";
    $queryType = $db->execute($sqlType);
    $typetext = $config['vote']['main']['db'] . "_type";
    $valTypeSetting = $queryType->fields[$typetext];

    if ($valTypeSetting >= 1) {
        $sqlDel = "DELETE FROM " . $config['vote']['checkip']['db'] . " WHERE " . $config['vote']['checkip']['db'] . "_vid=" . $_REQUEST['gid'] . " AND " . $config['vote']['checkip']['db'] . "_ip='" . $valIP . "'";
        $queryDel = $db->execute($sqlDel);
    }

    $sqlCheck = "SELECT * FROM " . $config['vote']['checkip']['db'] . " WHERE  " . $config['vote']['checkip']['db'] . "_vid=" . $_REQUEST['gid'] . " AND " . $config['vote']['checkip']['db'] . "_ip='" . $valIP . "'";
    $queryCheck = $db->execute($sqlCheck);
    
    if ($queryCheck->_numOfRows > 0) {
        $dataJson = array(
            'status' => 200,
            'msg' => "คุณสามารถโหวตได้ 1 ครั้ง เท่านั้น",
        );
    } else {
        $insert = array();
        $insert[$config['vote']['checkip']['db'] . "_vid"] = "'" . $_REQUEST['gid'] . "'";
        $insert[$config['vote']['checkip']['db'] . "_ip"] = "'" . $valIP . "'";
        $insert[$config['vote']['checkip']['db'] . "_date"] = "NOW()";

        $sql = "INSERT INTO " . $config['vote']['checkip']['db'] . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
        $Query = $db->execute($sql);

        $sqlUpdate = "UPDATE " . $config['vote']['ans']['db'] . " SET " . $config['vote']['ans']['db'] . "_count=" . $config['vote']['ans']['db'] . "_count+1 WHERE " . $config['vote']['ans']['db'] . "_id='" . $_REQUEST['vid'] . "'
         AND " . $config['vote']['ans']['db'] . "_qid='" . $_REQUEST['gid'] . "'";
        $queryUpdate = $db->execute($sqlUpdate);

        $dataJson = array(
            'status' => 200,
            'msg' => "โหวตสำเร็จ",
        );
    }


    
} else {
    $dataJson = array(
        'status' => 400,
        'msg' => 'โหวตไม่สำเร็จ',
    );
}


echo json_encode($dataJson);
