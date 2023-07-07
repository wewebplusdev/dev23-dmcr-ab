<?php
require_once 'config.php';
require_once 'ActiveDirectory.php';
$ad = new ActiveDirectory($activeDirectory['key'],$activeDirectory['secret'], $domainLink, getip(), $ip_router);
$obj_url = $ad->getURLOneAccount();
$obj = json_decode($ad->getTokenForLogin($inputUserMaster));
if ($obj->status == true) {
    $obj_login = json_decode($ad->loginWebSite($inputUserMaster, $inputPass, $obj->access_token));

    if ($obj_login->status == true) {

        $result->fields[1] = rechangeQuot($obj_login->profile->prefix);
        $result->fields[$config['staff']['db'] . '_prefix'] = rechangeQuot($obj_login->profile->prefix);
        $result->fields[2] = rechangeQuot($obj_login->profile->gender);
        $result->fields[$config['staff']['db'] . '_gender'] = rechangeQuot($obj_login->profile->gender);
        $result->fields[3] = rechangeQuot($obj_login->profile->fnameeng);
        $result->fields[$config['staff']['db'] . '_fnameeng'] = rechangeQuot($obj_login->profile->fnameeng);
        $result->fields[4] = rechangeQuot($obj_login->profile->fnamethai);
        $result->fields[$config['staff']['db'] . '_fnamethai'] = rechangeQuot($obj_login->profile->fnamethai);
        $result->fields[5] = rechangeQuot($obj_login->profile->lnameeng);
        $result->fields[$config['staff']['db'] . '_lnameeng'] = rechangeQuot($obj_login->profile->lnameeng);
        $result->fields[6] = rechangeQuot($obj_login->profile->lnamethai);
        $result->fields[$config['staff']['db'] . '_lnamethai'] = rechangeQuot($obj_login->profile->lnamethai);
        $result->fields[7] = rechangeQuot($obj_login->profile->username);
        $result->fields[$config['staff']['db'] . '_username'] = rechangeQuot($obj_login->profile->username);
        $result->fields[10] = rechangeQuot($obj_login->profile->address);
        $result->fields[$config['staff']['db'] . '_address'] = rechangeQuot($obj_login->profile->address);
        $result->fields[11] = rechangeQuot($obj_login->profile->telephone);
        $result->fields[$config['staff']['db'] . '_telephone'] = rechangeQuot($obj_login->profile->telephone);
        $result->fields[12] = rechangeQuot($obj_login->profile->mobile);
        $result->fields[$config['staff']['db'] . '_mobile'] = rechangeQuot($obj_login->profile->mobile);
        $result->fields[13] = rechangeQuot($obj_login->profile->email);
        $result->fields[$config['staff']['db'] . '_email'] = rechangeQuot($obj_login->profile->email);
        $result->fields[14] = rechangeQuot($obj_login->profile->other);
        $result->fields[$config['staff']['db'] . '_other'] = rechangeQuot($obj_login->profile->other);
        $result->fields[15] = rechangeQuot($obj_login->profile->picture);
        $result->fields[$config['staff']['db'] . '_picture'] = rechangeQuot($obj_login->profile->picture);

        $valNameADuser = rechangeQuot($obj_login->profile->fnamethai);
        $valLnameADuser = rechangeQuot($obj_login->profile->lnamethai);
        $valNameADuserEng = rechangeQuot($obj_login->profile->fnameeng);
        $valLnameADuserEng = rechangeQuot($obj_login->profile->lnameeng);

        $sql = "UPDATE 
		".$config['staff']['db']." SET 
		".$config['staff']['db']."_fnamethai='".$valNameADuser."', 
        ".$config['staff']['db']."_lnamethai='".$valLnameADuser."', 
        ".$config['staff']['db']."_fnameeng='".$valNameADuserEng."', 
        ".$config['staff']['db']."_lnameeng='".$valLnameADuserEng."'
		 WHERE ".$core_tb_staff."_id='".$result->fields[0]."'";
        $update_staff = $db->execute($sql);


        $result->fields[8] = null;
        $result->fields[$config['staff']['db'] . '_password'] = null;

        $messageAlert = null;
        $_SESSION[$session_name]['login'] = $result->fields;
        
        header("Location:" . $linklang . $url_togo);
        exit();


    }else{
        $messageAlert = "กรุณาติดต่อ Domain User One Account";
    }
}
