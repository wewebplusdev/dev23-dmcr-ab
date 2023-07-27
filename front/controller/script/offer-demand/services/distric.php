<?php
$offerPage = new OfferPage;
$callDistric = $offerPage->callDistric($_REQUEST['id']);
$msg = "";
if ($callDistric->_numOfRows > 0){

    foreach($callDistric as $keyVal => $valDis){
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