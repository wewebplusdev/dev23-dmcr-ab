<?php
require_once 'config.php';
require_once 'ActiveDirectory.php';
$ad = new ActiveDirectory($activeDirectory['key'],$activeDirectory['secret'], $domainLink, getip(), $ip_router);
$obj_url = $ad->getURLOneAccount();
$obj = json_decode($ad->getTokenForLogin($inputUserMaster));
if ($obj->status == true) {
    $obj_login = json_decode($ad->loginWebSite($inputUserMaster, $inputPass, $obj->access_token));
    // print_pre($obj_login);
    // die;

    if ($obj_login->status == true) {
	
        $valNameADuser = rechangeQuot($obj_login->profile->fnamethai);
        $valLnameADuser = rechangeQuot($obj_login->profile->lnamethai);
        $valNameADuserEng = rechangeQuot($obj_login->profile->fnameeng);
        $valLnameADuserEng = rechangeQuot($obj_login->profile->lnameeng);
		
        $_SESSION[$valSiteManage."core_session_id"]		= $Row[0];
        $_SESSION[$valSiteManage."core_session_name"]       = rechangeQuot($obj_login->profile->fnamethai)." ".rechangeQuot($obj_login->profile->lnamethai);
        $_SESSION[$valSiteManage."core_session_nameen"]       = rechangeQuot($obj_login->profile->fnameeng)." ".rechangeQuot($obj_login->profile->lnameeng);
        $_SESSION[$valSiteManage."core_session_groupid"]	= $Row[4];
        $_SESSION[$valSiteManage."core_session_language"]  = getSystemLang();
        $_SESSION[$valSiteManage."core_session_languageT"]	= getSystemLangType();
        $_SESSION[$valSiteManage."core_session_storeid"] = $Row[5];
        $_SESSION[$valSiteManage."core_session_picture"] = $obj_login->profile->picture;

        $sql_lv = "SELECT ".$core_tb_group."_lv FROM ".$core_tb_group." WHERE ".$core_tb_group."_id='".$Row[4]."'";
        $Query_lv=wewebQueryDB($coreLanguageSQL,$sql_lv);
        $Row_lv=wewebFetchArrayDB($coreLanguageSQL,$Query_lv);
        $_SESSION[$valSiteManage."core_session_level"]		= $Row_lv[0];


        ###################### Start insert logs ##################
        logs_access('1','Login');

        if($coreLanguageSQL=="mssql"){
        $sqlLog = "DELETE FROM ".$core_tb_log." WHERE ".$core_tb_log."_time < DATEADD(mm, -3, GETDATE())";
        }else{
        $sqlLog = "DELETE FROM ".$core_tb_log." WHERE ".$core_tb_log."_time < DATE_SUB(".wewebNow($coreLanguageSQL).", INTERVAL  3 MONTH)";
        }


        $queryLog=wewebQueryDB($coreLanguageSQL,$sqlLog);

        $sql = "UPDATE 
		".$core_tb_staff." SET 
		".$core_tb_staff."_fnamethai='".$valNameADuser."', 
        ".$core_tb_staff."_lnamethai='".$valLnameADuser."', 
        ".$core_tb_staff."_fnameeng='".$valNameADuserEng."', 
        ".$core_tb_staff."_lnameeng='".$valLnameADuserEng."', 
		".$core_tb_staff."_logdate=".wewebNow($coreLanguageSQL)."
		 WHERE ".$core_tb_staff."_id='".$_SESSION[$valSiteManage."core_session_id"]."'";


        $Query=wewebQueryDB($coreLanguageSQL,$sql);

        if($inputUrl!=""){
            $txtLinkUrlTo= "../".$inputUrl;
        }else{
            $txtLinkUrlTo="core/index.php";
        }
        ?>
		<script language="JavaScript"  type="text/javascript">
			document.location.href = "<?=$txtLinkUrlTo?>";
		</script>
		<?

    }else{
        ?>
		<script language="JavaScript"  type="text/javascript">
            jQuery("#loadAlertLogin").hide();
            jQuery("#loadAlertLoginOA").show();
            jQuery("#loadAlertLoginOA").html('<img src="img/btn/error.png" align="absmiddle" hspace="10" /> กรุณาติดต่อ Domain User One Account');
			document.myFormLogin.inputUser.value='';
			document.myFormLogin.inputPass.value='';
		</script>
		<?
    }
}
