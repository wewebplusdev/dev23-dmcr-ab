<?php
$offerPage = new OfferPage;
$callAmphur = $offerPage->callAmphur($_REQUEST['id']);
$msg = "";
if ($callAmphur->_numOfRows > 0){

    foreach($callAmphur as $keyVal => $valDis){
        $msg .= "<option value='".$valDis['id']."'>".$valDis['name']."</option>";
    }

    $dataJson = array(
        'status' => 200,
        'msg' => $msg,
        
    );
}else{
    $dataJson = array(
        'status' => 400,
        'msg' => 'Failure call api',
    );
}

echo json_encode($dataJson);