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
    case 'prov_coral':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/prov_coral.php';
        break;
    case 'prov_float':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/prov_float.php';
        break;
    case 'prov_sink':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/prov_sink.php';
        break;
    case 'report_coral':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/reportrss_coral.php';
        break;
    case 'report_float':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/reportrss_float.php';
        break;
    case 'report_sink':
        require_once _DIR . '/front/controller/script/' . $menuActive . '/services/reportrss_sink.php';
        break;
}
