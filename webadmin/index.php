<?
include("lib/session.php");

if ($_SESSION[$valSiteManage . "core_session_language"] == "") {
    $_SESSION[$valSiteManage . "core_session_language"] = "Thai";
}

include("lib/config.php");

include("lib/connect.php");
// print_r('xx');die;
$_SESSION[$valSiteManage . "core_session_id"] = 0;
$_SESSION[$valSiteManage . "core_session_name"] = "";
$_SESSION[$valSiteManage . "core_session_level"] = "";
$_SESSION[$valSiteManage . "core_session_language"] = "Thai";
$_SESSION[$valSiteManage . "core_session_groupid"] = 0;
$_SESSION[$valSiteManage . "core_session_permission"] = "";
$_SESSION[$valSiteManage . "core_session_logout"] = "";


include("core/incLang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">
                <link href="css/theme.css" rel="stylesheet"/>
                <link href="css/bootstrap.min.css" rel="stylesheet"/>
                <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
                <link href="css/font-awesome.min.css" rel="stylesheet"/>


                <title><?= $core_name_title ?></title>


                <script language="JavaScript"  type="text/javascript" src="js/jquery-1.9.0.js"></script>
                <script language="JavaScript"  type="text/javascript" src="js/jquery.blockUI.js"></script>
                <script language="JavaScript"  type="text/javascript" src="js/scriptCoreWeweb.js"></script>

                <script language="JavaScript"  type="text/javascript">
                    jQuery(function () {
                        jQuery('form#myFormLogin').submit(function () {
                            with (document.myFormLogin) {
                                if (inputUser.value == '') {
                                    inputUser.focus();
                                    return false;
                                }
                                if (inputPass.value == '') {
                                    inputPass.focus();
                                    return false;
                                }
                            }
                            checkLoginUser();
                            return false;
                        });
                    });

                </script>

                <style type="text/css">
                    @media (max-width: 768px) {
                        .loginBack{height: auto; padding: 40px 15px;}
                        .new_login .login-form{margin-top: 0; width: 100%; position: relative; top: 0; transform: translate(0);}
                        .new_login .login-form .header{height: 140px; background-size: cover;}
                        .new_login .login-form .header .brand{padding-top: 40px;}
                        .new_login .login-form .header .brand img{width: 160px;}
                        .new_login .login-form .body .title{font-size: 26px; margin-bottom: 20px;}
                        .new_login .login-form .body .title small{font-size: 17px;}
                        .new_login .login-form .body{padding: 30px 20px;}
                        .new_login .footerBackOffice,
                        .new_login .footerBackOffice *{
                            -webkit-box-sizing: border-box;
                            -moz-box-sizing: border-box;
                            box-sizing: border-box;
                        }
                        .new_login .footerBackOffice{position: relative; min-width: inherit; padding: 15px 15px;}
                        .new_login .footerBackOffice > div,
                        .new_login .footerBackOffice > div > div{display: block; width: auto; padding: 0;}
                        .new_login .footerBackOffice .imgLogo{margin: 0 0 10px 0; text-align: center; font-size: 11px;}
                        .new_login .footerBackOffice .divLogin{margin: 0; text-align: center; font-size: 12px;}
                    }
                    .form-group .show-password {position: absolute; top: calc(50% - 0.6em); right: 15px; z-index: 3;}
                    .show-password .fa::before {font-size: 1.2em;}
                    .show-password #showPassword:checked ~ .fa::before {content: "\f070";}

                </style>

                </head>

                <body class="new_login" style="background: url('../upload/core/<?=$valPicBgSystem?>') center;background-size: cover;">
                    <div class="loginBack">
                        <div class="login-form">
                            <div class="header" style="background: url('../upload/core/<?=$valPicHeaderSystem?>') center;">
                                <div class="brand">
                                    <img src="../upload/core/<?=$valPicSystem?>" alt="">
                                </div>
                            </div>
                            <div class="body">
                                <div class="title">
                                    ยินดีต้อนรับเข้าสู่ระบบ
                                    <small><?=$valNameSystem?></small>
                                </div>

                                <form class="form-default" action="index.php" method="post" name="myFormLogin" id="myFormLogin">
                                    <input id="inputUrl" name="inputUrl" type="hidden" value="<?= $uID ?>">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <label class="control-label">ชื่อผู้ใช้</label>
                                            </span>
                                            <input class="form-control" type="text" name="inputUser" id="inputUser" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group" style="position: relative;">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <label class="control-label">รหัสผ่าน</label>
                                            </span>
                                            <input class="form-control" type="password" name="inputPass" id="inputPass" placeholder="">
                                        </div>
                                        <div class="show-password">
    <label for="showPassword" style="cursor:pointer;">
        <input type="checkbox" id="showPassword" onclick="myShowPassword()" style="display: none;">
        <span class="fa fa-eye"></span>
    </label>
</div>
                                    </div>
                                    <div class="form-btn">
                                        <input class="btn btn-primary" name="input" type="submit" value="<?= $langTxt["login:btn"] ?>" onclick="submitLogin();" />
                                    </div>
                                </form>

                                <div style="display:none;" id="loadAlertLogin">
                                    <img src="img/btn/error.png" align="absmiddle" hspace="10" /><?= $langTxt["login:alert"] ?>
                                </div>
                                <div style="display:none;margin-top: 15px;" id="loadAlertLoginOA">
                                    
                                </div>
                            </div>
                        </div>

                        <div id="loadCheckComplete"></div>
                    </div>


                    <div class="loginBack" style="display: none;">
                        <!-- <div class="loginBack-wrapper">
                            <div class="login-header">
                                <img src="../upload/core/<?=$valPicSystem?>" height="100" />
                            </div>
                            <div class="login-body">
                                <div class="title">
                                    <?=$valTitleSystem?>
                                </div>
                                <div class="login-form">
                                    <form action="index.php" method="post" name="myFormLogin" id="myFormLogin">
                                        <input  id="inputUrl" name="inputUrl" type="hidden"   value="<?= $uID ?>">

                                        <div class="form-group">
                                            <label class="control-label">ชื่อผู้ใช้</label>
                                            <div class="control-group">
                                                <span class="fa fa-user"></span>
                                                <input class="form-control" type="text" name="inputUser" id="inputUser" placeholder="ชื่อผู้ใช้">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">รหัสผ่าน</label>
                                            <div class="control-group">
                                                <span class="fa fa-key"></span>
                                                <input class="form-control" type="password" name="inputPass" id="inputPass" placeholder="รหัสผ่าน">
                                            </div>
                                        </div>

                                        <div class="form-btn">
                                            <input class="btn btn-primary" name="input" type="submit" value="<?= $langTxt["login:btn"] ?>" onclick="submitLogin();" />
                                        </div>
                                    </form>
                                    <div style="display:none;" id="loadAlertLogin">
                                        <img src="img/btn/error.png" align="absmiddle"   hspace="10" /><?= $langTxt["login:alert"] ?>
                                    </div>
                                </div>

                                <div class="mainLogin" style="display:none;">
                                    <div class="mLeftLogin">
                                        <div class="lBoxContantLogin">
                                            <div class="cycle1Login"></div>
                                            <div class="cycleTContantLogin"><?= $langTxt["login:permis"] ?></div>
                                            <div class="clearAll"></div>
                                            <div class="cycleBContantLogin"><?= $langTxt["login:permisDe"] ?></div>
                                        </div>
                                    </div>
                                    <div class="mCenterLogin">
                                        <div class="cBoxContantLogin">
                                            <div class="cycle2Login"></div>
                                            <div class="cycleTContantLogin"><?= $langTxt["login:time"] ?></div>
                                            <div class="clearAll"></div>
                                            <div class="cycleBContantLogin"><?= $langTxt["login:timeDe"] ?></div>
                                        </div>
                                    </div>
                                    <div class="mRightLogin">
                                        <div class="rBoxContantLogin">
                                            <div class="cycle3Login"></div>
                                            <div class="cycleTContantLogin"><?= $langTxt["login:price"] ?></div>
                                            <div class="clearAll"></div>
                                            <div class="cycleBContantLogin"><?= $langTxt["login:priceDe"] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="login-footer">
                                © Copy right 2017. All rights reserved by <?=$valNameSystem?>.
                            </div>
                        </div>

                        <div id="loadCheckComplete"></div> -->

                        <!-- #################### Head ###############  -->
                        <!-- <div class="headBackOfficeLogin">
                            <div class="imgLogoLogin"><img src="img/logo/logoLogin.PNG" /></div>
                            <div class="txtLogoLogin">
                                <h1 class="title"><?= $valNameSystem ?></h1>
                                <h3 class="subtitle"><?= $valTitleSystem ?></h3>
                            </div>
                        </div>
                        <div class="clearAll"></div>
                        <div class="headLoginNew">
                            <table width="1180" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                    <td align="center" valign="top" style="padding-top:20px;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                            <tr>
                                                <td class="font_style01" align="center" style="font-size:40px; color:#555555;" height="60" ></td>
                                            </tr>
                                            <tr>
                                                <td   class="font_style02" align="center" height="35"></td>
                                            </tr>
                                            <tr>
                                                <td height="8"></td>
                                            </tr>
                                        </table>
                                        <div class="login-box" style=" float:left; ">
                                            <div class="login-title">
                                                <h1 class="title"><?= $valNameSystem ?></h1>
                                                <h3 class="subtitle"><?= $valTitleSystem ?></h3>
                                            </div>
                                        </div>
                                        <div class="boxLogin" style="width:394px; float:right; padding:30px;">
                                            <form action="index.php" method="post" name="myFormLogin" id="myFormLogin"    >
                                                <input  id="inputUrl" name="inputUrl" type="hidden"   value="<?= $uID ?>"/>
                                                <div style="font:600 normal 36px 'Helvethaica Mon'; margin:0 0 10px; float:left;"><?= $langTxt["login:btn"] ?></div>
                                                <div style="clear:both; height:0px;">
                                                </div>
                                                <div class="boxInput">
                                                    <div class="fa fa-user" style="width:35px; float:left; padding-top:10px; "></div>
                                                    <div style="float:left;"><input type="text" name="inputUser" id="inputUser" class="styleInput"   /></div>
                                                </div>
                                                <div style="clear:both; height:15px;">
                                                </div>

                                                <div class="boxInput">
                                                    <div class="fa fa-lock" style="width:35px; float:left; padding-top:10px; "></div>
                                                    <div style="float:left;"><input type="password" name="inputPass" id="inputPass" class="styleInput"  /></div>
                                                </div>
                                                <div style="clear:both; height:5px;">
                                                </div>
                                                <input name="input" type="submit" value="<?= $langTxt["login:btn"] ?>" class="login-btn"  onclick="submitLogin();" />
                                            </form>
                                            <div style="clear:both; height:20px;">
                                            </div>
                                            <div style="font:600 normal 19px 'Helvethaica Mon'; margin:0 0 10px;display:none;" id="loadAlertLogin">
                                                <img src="img/btn/error.png" align="absmiddle"   hspace="10" /><?= $langTxt["login:alert"] ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="mainLogin" style="display:none;">
                            <div class="mLeftLogin">
                                <div class="lBoxContantLogin">
                                    <div class="cycle1Login"></div>
                                    <div class="cycleTContantLogin"><?= $langTxt["login:permis"] ?></div>
                                    <div class="clearAll"></div>
                                    <div class="cycleBContantLogin"><?= $langTxt["login:permisDe"] ?></div>
                                </div>
                            </div>
                            <div class="mCenterLogin">
                                <div class="cBoxContantLogin">
                                    <div class="cycle2Login"></div>
                                    <div class="cycleTContantLogin"><?= $langTxt["login:time"] ?></div>
                                    <div class="clearAll"></div>
                                    <div class="cycleBContantLogin"><?= $langTxt["login:timeDe"] ?></div>
                                </div>
                            </div>
                            <div class="mRightLogin">
                                <div class="rBoxContantLogin">
                                    <div class="cycle3Login"></div>
                                    <div class="cycleTContantLogin"><?= $langTxt["login:price"] ?></div>
                                    <div class="clearAll"></div>
                                    <div class="cycleBContantLogin"><?= $langTxt["login:priceDe"] ?></div>
                                </div>
                            </div>
                        </div> -->


                        <!-- #################### Footer ###############  -->
                        <!-- <div class="footerBackOffice">
                            <div class="imgLogo"><?= $langTxt["login:footecopy"] ?></div>
                            <div class="divLogin"><?= $langTxt["login:footecontact"] ?></div>
                        </div>
                        <div id="loadCheckComplete"></div>
                        <div class="clearAll"></div> -->
                    </div>

<div class="footerBackOffice">
    <div>
	    <div class="imgLogo"><?= $langTxt["login:footecopy"] ?> <i class="versionsmall"><?php echo 'Current PHP Version: ' . phpversion(); ?></i></div>
	    <div class="divLogin"><?= $langTxt["login:footecontact"] ?></div>
	</div>
</div>
                    <div id="tallContent" style="display:none">
                        <span style="font-size:18px;">Please waiting..</span>
                        <div style="height:10px;"></div>
                        <img src="img/loader/login.gif" />
                    </div>
                    <? wewebDisconnect($coreLanguageSQL); ?>
                </body>
                <script type="text/javascript">
                    function myShowPassword() {
var x = document.getElementById("inputPass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
                </html>
