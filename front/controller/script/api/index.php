<?php
$menuActive = 'api';
switch ($url->segment[1]) {
    default:
    $dataJson = array(
        'status' => 400,
        'msg' => 'NOT FOUND API'
      );
      echo json_encode($dataJson);
        break;
    case 'report':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/reportrss.php';
        break;
    case 'prov':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/provrss.php';
        break;
    case 'count':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/countrss.php';
        break;
}
