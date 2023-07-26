<?php

    $votecount = array();
    $voteans =  callVoteAns($config['vote']['masterkey'],$_REQUEST['gid']);

    if(!empty($voteans)){
    foreach($voteans as $keyans => $valueans){
        $votecount[$keyans]['name'] = $valueans['name'];
        $votecount[$keyans]['count'] = $valueans['count'];
    }
    $dataJson = array(
        'status' => 200,
        'msg' => 'SUCCESS',
        'data' => $votecount,
    );
    }else{
        $dataJson = array(
            'status' => 400,
            'msg' => 'failed',
        );
    }

    
 echo json_encode($dataJson);
