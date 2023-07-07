<?php
@include ("session.php");
include("weadmin/lib/config.php");
include("weadmin/lib/connect.php");
include("function.php");
decodeURL($_SERVER["QUERY_STRING"]);
$txtLanguage=$coreLanguageThai;
$valTopMemu=2;
$valSubMemu=2;
$valBannerKey=3;
$pageKey="Hotel Booking";
if($_SESSION[$valSiteManage.'Fornt_Session_User_ID']<=0){
	header("Location: ".$core_full_path."/register.php");
}

if($_POST['ck']>=1){
	$_SESSION['reCity']=$_REQUEST['inputCity'];
	$_SESSION['reSdateInput']=$_REQUEST['sdateInput'];
	$_SESSION['reEedateInput']=$_REQUEST['edateInput'];
	$_SESSION['rePerson']=$_REQUEST['inputPerson'];
}

if(intval($_POST['inputHotelIDdb'])<=0){
	header("Location: ".$core_full_path."/index.php");
}


if($_SESSION['reCity']==""){
	$_SESSION['reCity']=loadPromoteDefaultID();
}

if($_SESSION['reSdateInput']==""){
	$_SESSION['reSdateInput']=date('d')."-".date('m')."-".(date('Y')+543);
}

if($_SESSION['reEedateInput']==""){
	$valeRealNowNull= strtotime(date('Y')."-".date('m')."-".date('d'));
	$_SESSION['reEedateInput']= dateFormatRealSearch(date("Y-m-d", strtotime('+1 day', $valeRealNowNull)));
}

	$valCityTypeServ=		loadNameCityTypeServ($_SESSION['reCity']);
	$valCityIDServ=		loadNameCityIDservice($_SESSION['reCity']);
	$valCityName=loadNameCityName($_SESSION['reCity'],$valCityTypeServ);
	$valSdateRe= txtFormatDateWeb($_SESSION['reSdateInput']);
	$valSdate= thai_date($valSdateRe);
	$valEdateRe= txtFormatDateWeb($_SESSION['reEedateInput']);
	$valEdate= thai_date($valEdateRe);
	$valPerson= $_SESSION['rePerson'];
	$valDateDiff=DateDiff($valSdateRe,$valEdateRe);
	$valDateDiffChkIn=DateDiff(date("Y-m-d"),$valSdateRe);
	
	$valDateReal=strtotime($valSdateRe);

	$valRateAllPriceDef=loadRateAllPrice('ht');
	
	$valDefaultRate=$valRateAllPriceDef[0];
	$valDefaultMarginRate=$valRateAllPriceDef[1];
	$valDefaultMdrRate=$valRateAllPriceDef[2];
	$valDefaultVatRate=$valRateAllPriceDef[3];

$masterkey = "ht";
include("weadmin/mod_hotelg/config.php");
		$sqlCheck = "SELECT ";
		$sqlCheck .= "   " . $mod_tb_root . "_id , "
		. "" . $mod_tb_root . "_subject , "
		. "" . $mod_tb_root . "_title,    "
		. "" . $mod_tb_root . "_pic, "
		. "" . $mod_tb_root . "_cityIDdb ,"
		. "" . $mod_tb_root . "_park , "
		. "" . $mod_tb_root . "_food , "
		. "" . $mod_tb_root . "_wifi, "
		. "" . $mod_tb_root . "_latitude , "
		. "" . $mod_tb_root . "_longitude  , "
		. "" . $mod_tb_root . "_htmlfilename , "
		. "" . $mod_tb_root . "_type  , "
		. "" . $mod_tb_root . "_filevdo , "
		. "" . $mod_tb_root . "_url  , "
		. "" . $mod_tb_root . "_description  , "
		. "" . $mod_tb_root . "_keywords  , "
		. "" . $mod_tb_root . "_metatitle  , "
		. "" . $mod_tb_root . "_picshow , "
		. "" . $mod_tb_root . "_hotelID  ";
	  	$sqlCheck .= "  FROM ".$mod_tb_root." WHERE   ((".$mod_tb_root."_sdate='0000-00-00 00:00:00' AND ".  $mod_tb_root."_edate='0000-00-00 00:00:00')  OR (".$mod_tb_root."_sdate='0000-00-00 00:00:00' AND   TO_DAYS(".$mod_tb_root."_edate)>=TO_DAYS(NOW()) ) OR (TO_DAYS(".$mod_tb_root."_sdate)<=TO_DAYS(NOW()) AND ".  $mod_tb_root."_edate='0000-00-00 00:00:00' ) OR (TO_DAYS(".$mod_tb_root."_sdate)<=TO_DAYS(NOW()) AND  TO_DAYS(".$mod_tb_root."_edate)>=TO_DAYS(NOW())  ))  AND ".$mod_tb_root."_masterkey='".$masterkey."' AND     ".$mod_tb_root."_id='".$_POST['inputHotelIDdb']."' AND  ".$mod_tb_root."_status!='Disable'" ;
		$Queryeck=wewebQueryDB($coreLanguageSQL,$sqlCheck);
		$countCheckRow=wewebNumRowsDB($coreLanguageSQL,$Queryeck);
		//echo "<br/>".$countCheckRow."==><br/>".$sqlCheck."<br/>";
			$Row = wewebFetchArrayDB($coreLanguageSQL,$Queryeck);
			$valID = $Row[0];
			$valSubject = rechangeQuot($Row[1]);
			$valTitle = rechangeQuot($Row[2]);
			$valPicFilName = $Row[3];
			$valPic = $mod_path_pictures_fornt . "/" . $Row[3];
			if(!is_file($valPic)){
				$valPic="images/noPic/nopicHt.jpg";
			}else{
				$valPic=$valPic;
			}

			$valCityID = rechangeQuot($Row[4]);
			$valCityTypeServ = loadNameCityTypeServ($valCityID);
			$valCityName = loadNameCityName($valCityID,$valCityTypeServ);
			$valPark = $Row[5];
			$valFood = $Row[6];
			$valWifi =$Row[7];
			$valLatitude = rechangeQuot(trim($Row[8]));
			$valLongitude = rechangeQuot(trim($Row[9]));
			$valHtml = $mod_path_html_fornt . "/" . $Row[10];
			
			$valType = $Row[11];
			$valFilevdo = $Row[12];
			$valPathvdo = $mod_path_vdo_fornt . "/" . $Row[12];
			$valUrl = rechangeQuot($Row[13]);
			
			$txt_cms_description=rechangeQuot($Row[14]);
			if($txt_cms_description==""){
			$txt_cms_description=$fornt_name_description;
			}
			
			$txt_cms_keywords=rechangeQuot($Row[15]);
			if($txt_cms_keywords==""){
			$txt_cms_keywords=$fornt_name_keywords;
			}

			$txt_cms_metatitle=rechangeQuot($Row[16]);		
			if($txt_cms_metatitle==""){
			$txt_cms_metatitle=$valSubject;	
			}
			
			if(is_file($valPic)){
					$valSharedFbPic = "upload/".$masterkey."/pictures/".$valPicFilName;
			}else{
					$valSharedFbPic = "images/img-easy-02.jpg";
			}
			
			$valPicShow= rechangeQuot($Row[17]);
			$valHotelIDwebv = rechangeQuot($Row[18]);
			
$sqlCheckSub = "SELECT ";
		$sqlCheckSub .= "   " . $mod_tb_root_room . "_id , "
		. "" . $mod_tb_root_room . "_subject , "
		. "" . $mod_tb_root_room . "_roomIDdb,    "
		. "" . $mod_tb_root_room . "_pic,    "
		. "" . $mod_tb_root_room . "_htmlfilename ";
		$sqlCheckSub .= "  FROM ".$mod_tb_root_room." WHERE  ".$mod_tb_root_room."_masterkey='".$masterkey."'   AND     ".$mod_tb_root_room."_id='".$_POST['inputRoomHotelIDdb']."' AND  ".$mod_tb_root_room."_status!='Disable'  LIMIT 0,1 " ;
		$QueryCheckSub=wewebQueryDB($coreLanguageSQL,$sqlCheckSub);
		$countCheckRowSub=wewebNumRowsDB($coreLanguageSQL,$QueryCheckSub);
		
			$RowSub = wewebFetchArrayDB($coreLanguageSQL,$QueryCheckSub);
			$valSubID = $RowSub[0];
			$valSubSubject = rechangeQuot($RowSub[1]);
			$valSubRoomID = rechangeQuot($RowSub[2]);
			$valSubPic = $mod_path_pictures_fornt . "/" . $RowSub[3];
			if(!is_file($valSubPic)){
				$valSubPic="images/noPic/noHotelD.jpg";
			}else{
				$valSubPic=$valSubPic;
			}
			$valSubHtml = $mod_path_html_fornt . "/" . $RowSub[4];
			 $valRoomTypeServ = loadNameRoomTypeServ($valSubRoomID);
			$valRoomName = loadNameRoomName($valSubRoomID,$valRoomTypeServ);
			$valRoomPerson = loadNameRoomPerson($valSubRoomID,$valRoomTypeServ);
			$valRoomPrice = $_POST['inputPrice'];
			$valRoomPriceQ = intval($_POST['inputQuantity']*$_POST['inputPrice'])*intval($valDateDiff);
			$valRoomPriceVat = intval(priceAllProtectNetVat($valRoomPriceQ,$valDefaultVatRate));
			$valRoomPriceTotle = intval($valRoomPriceVat) +intval($valRoomPriceQ);
		$mod_tb_member="md_mem";	
		$sqlCheckMember = "SELECT ";
		$sqlCheckMember .= "   " . $mod_tb_member . "_id , "
		. "" . $mod_tb_member . "_email , "
		. "" . $mod_tb_member . "_tel ";
	  	$sqlCheckMember .= "  FROM ".$mod_tb_member." WHERE  ".$mod_tb_member."_id='".$_POST['inputMemberID']."'   LIMIT 0,1 " ;
		$QueryCheckMember=wewebQueryDB($coreLanguageSQL,$sqlCheckMember);
		$RowMember = wewebFetchArrayDB($coreLanguageSQL,$QueryCheckMember);
			$valMemberEmail = rechangeQuot($RowMember[1]);
			$valMemberTel = rechangeQuot($RowMember[2]);
?>
<!doctype html>
<html>
<head>
<? include("incRewrite.php");?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Start Facebook Shared-->
<meta property="og:url" content="<?=curPageURL()?>" />
<meta property="og:type" content="website"/>
<meta property="og:image" content="<?=$core_full_path."/".$valSharedFbPic?>" />
<meta property="og:title" content="<?=$txt_cms_metatitle?> - <?=$fornt_name_title?>" />
<meta property="og:description" content="<?=$fornt_name_description?>" />
<link rel="image_src"    href="<?=$core_full_path."/".$valSharedFbPic?>" />
<!-- End Facebook Shared-->

<!-- Start SEO Subport-->
<meta name="description" content="<?=$txt_cms_description?>" />
<meta name="keywords" content="<?=$txt_cms_keywords?>" />
<title><?=$txt_cms_metatitle?> - <?=$fornt_name_title?></title>
<!-- End SEO Subport-->

<!-- Start favicon-->
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- End favicon-->

<!-- Start css stylesheet-->
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/mainsyle.css" rel="stylesheet" type="text/css">
<link href="font/font.css" rel="stylesheet" type="text/css">
<link href="css/menu.css" rel="stylesheet" type="text/css" >
<link href="css/inner.css" rel="stylesheet" type="text/css">
<link href="css/colorbox.css" rel="stylesheet" type="text/css" />
<link href="css/jquery-ui-1.9.0.css" rel="stylesheet" type="text/css">
<link href="css/tooltip2.css" rel="stylesheet" type="text/css">
<!-- End css stylesheet-->

<!-- Start js script-->
<script type="text/javascript" src="js/jquery-1.8.1.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/scriptEs.js"></script>
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script type="text/javascript"src="js/jquery-ui-1.9.0.js"></script>
<script type="text/javascript"src="js/datepickerThai.js"></script>
<script type="text/javascript" src="js/toggle.js"></script>
<script type="text/javascript" src="js/jquery.blockUI.js"></script>
<!-- End js script-->

<script type="text/javascript" >
	function submitBook() {
		with (document.myFormBooking) {
		var valCheckSelect = jQuery( "input:radio[name=inputTypePayment]:checked" ).val();;
		
			if (isBlank(inputName)) {
				jQuery('#boxAlertContant').show();
				jQuery("#boxAlertContant").html('โปรดระบุชื่อผู้ที่จะเข้าพักในห้องพักนี้ ใช้ตัวอักษรภาษาอังกฤษเท่านั้น');
				inputName.focus();
				$("#inputName").addClass("alertInput");
				return false;
			} else {
				jQuery('#boxAlertContant').hide();
				$("#inputName").removeClass("alertInput");
			}
	
			if (isBlank(inputLName)) {
				jQuery('#boxAlertContant').show();
				jQuery("#boxAlertContant").html('โปรดระบุนามสกุลผู้ที่จะเข้าพักในห้องพักนี้ ใช้ตัวอักษรภาษาอังกฤษเท่านั้น');
				inputLName.focus();
				$("#inputLName").addClass("alertInput");
				return false;
			} else {
				jQuery('#boxAlertContant').hide();
				$("#inputLName").removeClass("alertInput");
			}
			
		

			if (isBlank(inputEmail)) {
				jQuery('#boxAlertContant').show();
				jQuery("#boxAlertContant").html('กรุณากรอกอีเมล การยืนยันของคุณจะส่งไปที่นี่');
				inputEmail.focus();
				$("#inputEmail").addClass("alertInput");
				return false;
			} else {
				jQuery('#boxAlertContant').hide();
				$("#inputEmail").removeClass("alertInput");
			}
			if (!isEmail(inputEmail.value)) {
				jQuery('#boxAlertContant').show();
				jQuery("#boxAlertContant").html('กรุณากรอกอีเมลของคุณให้ถูกต้อง');
				inputEmail.focus();
				$("#inputEmail").addClass("alertInput");
				return false;
			} else {
				jQuery('#boxAlertContant').hide();
				$("#inputEmail").removeClass("alertInput");
			}
			
			if (isBlank(inputTel)) {
				jQuery('#boxAlertContant').show();
				jQuery("#boxAlertContant").html('กรุณากรอกเบอร์โทรศัพท์ เราจะติดต่อคุณเฉพาะในกรณีเร่งด่วนเท่านั้น');
				inputTel.focus();
				$("#inputTel").addClass("alertInput");
				return false;
			} else {
				jQuery('#boxAlertContant').hide();
				$("#inputTel").removeClass("alertInput");
			}
			
			if (!isNumber(inputTel)) {
				jQuery('#boxAlertContant').show();
				jQuery("#boxAlertContant").html('กรุณากรอกเบอร์โทรศัพท์เป็นตัวเลขเท่านั้น');
				inputTel.focus();
				$("#inputTel").addClass("alertInput");
				return false;
			} else {
				jQuery('#boxAlertContant').hide();
				$("#inputTel").removeClass("alertInput");
			}
			
	
		}
		
	     loadBookingAction('loadBookingHotel');
		
	}
	function resetBook() {
		jQuery('#myFormBooking')[0].reset();
	}
</script>

<? include("incFb.php");?>
</head>
<body>
	<div class="container">
    	<div class="side-left">
        	<? include("incLeft.php")?>
        </div>
        <div class="side-right">
        	<? include("incTop.php")?>
            
            <div class="content">
                <div class="side-menu">
                	<!--start-->
                	<div class="box-right">
                    	<div class="book-info">
                        	<div class="hotel-book-info">
                            	<div class="img" style="background-image:url(<?=$valPic?>)">
                                	<img src="images/service/mask-hotel-book.png">
                                </div>
                                <div class="detail">
                                	<h4><?=$valSubject?></h4>
                                    <div><?=$valCityName?></div>
                                    <div><?=$valRoomName?></div>
                                    
                                </div>
                            </div>
                            <div class="box-sec no-border">
                            	<div class="row">
                                	<div class="col-left">เช็คอิน</div>
                                	<div class="col-right">วัน<?=$valSdate?></div>
                                </div>
                            	<div class="row">
                                	<div class="col-left">เช็คเอาท์</div>
                                	<div class="col-right">วัน<?=$valEdate?></div>
                                </div>
                                <div class="row">
                                	<div class="col-left">เข้าพัก</div>
                                	<div class="col-right"><?=number_format($valDateDiff)?> คืน</div>
                                </div>
                                 
                            </div>
                            <div class="box-sec">
                            	<div class="row">
                                	<div class="col-left">ราคาเฉลี่ยต่อคืน</div>
                                	<div class="col-right">฿<?=number_format(intval($valRoomPrice))?></div>
                                </div>
                                <div class="row">
                                	<div class="col-left"><?=$valSubject?></div>
                                	
                                </div>
                                <div class="row">
                                	<div class="col-left">จำนวนห้องที่จอง</div>
                                	<div class="col-right"><?=number_format($_POST['inputQuantity'])?> ห้อง</div>
                                </div>
                            </div>
                            
                            <div class="box-sec">
                            	<div class="row">
                                	<div class="col-left">ราคาทั้งหมด</div>
                                	<div class="col-right">฿<?=number_format($valRoomPriceQ)?></div>
                                </div>
                              
                                <div class="row">
                                	<div class="col-left">ภาษี <?=$valDefaultVatRate?>%</div>
                                	<div class="col-right">฿<?=number_format($valRoomPriceVat)?></div>
                                </div>
                            </div>
                            
                            <div class="box-sec total">
                            	<div class="row">
                                	<div class="col-left">ราคารวม</div>
                                	<div class="col-right">฿<?=number_format($valRoomPriceTotle)?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end-->
                    <!--start-->
                	<? include("incBannerRtop.php");?>
                    <!--end-->
                    <!--start-->
                	<? include("incBannerRbotton.php");?>
                    <!--end-->
                </div>
                <div class="side-content">
                	<div class="h-group">
                    	<h2><span>HOTEL BOOKING</span> ระบบจองที่พักในญี่ปุ่น...ราคาดีที่สุด</h2>
                    </div>
                    <div class="hotel-info no-border">
                    	<h4><?=$valSubSubject ?></h4>
                       	<div class="location"><?=$valCityName?></div>
                        <p>
                        	<strong>ประเภทห้อง:</strong> <?=$valRoomName?> <? if($_POST['inputBreakfast']!="NO MEAL"){?>+ อาหารเช้า<? }?>
                            	</p>
                                <p>
							<strong>จำนวนผู้เข้าพัก/ห้อง:</strong> <?=$valRoomPerson?> คน
                        </p>
						<?
                                        if (is_file($valSubHtml)) {
                                        $filename = $valSubHtml;
                                        $fd = @fopen ($filename, "r");
                                        $contents = @fread ($fd, filesize ($filename));
                                        @fclose ($fd);
                                        if(txtReplaceHTML($contents)!=''){
                                        ?>
                                        <div  style="line-height:normal;">
                                            <? echo txtReplaceHTML($contents);?>
                                        </div>
                                        <? }}?>
                        <div class="info-right">
                        	<div class="price">
                            	<?=number_format($valRoomPrice)?> <span>บาท/คืน</span>
                            </div>
                            <div class="star" style="display:none;">
                            	<div class="ic-star ic-star4">4</div>
                            </div>
                        </div>
                    </div>
                    <div class="hotel-info"  id="box-confirm" style="display:none;" >
                       	<div class="book-confirm">
                        	<h4 id="boxH4Submit">ระบบได้ทำการจองห้องพักเรียบร้อยแล้ว</h4>
                            <p id="boxPSubmit">
                            	ระบบจะส่งรายละเอียดการจองไปยัง E-mail ที่ท่านระบุไว้ 
                                กรุณาตรวจสอบ E-mail ของท่าน
                                ขอขอบพระคุณที่ใช้บริการ 
                            </p>
                        </div>
                        <div class="box-btn">
                    	<a href="index.php" class="btn1">กลับหน้าหลัก</a>
                    </div>
                    </div>
                    <div  id="box-booking">
                 <form action="?" name="myFormBooking" id="myFormBooking" method="post">
                <input type="hidden" class="input" name="action" id="action" value="addnew"/>
                <input type="hidden" class="input" name="masterkey" id="masterkey" value="<?=$masterkey?>"/>
                <input type="hidden" class="input" name="keyPage" id="keyPage" value="HOTEL BOOKING"/>
                <input type="hidden" class="input" name="inputHotelIDdb" id="inputHotelIDdb" value="<?=$_POST['inputHotelIDdb']?>"/>
                <input type="hidden" class="input" name="inputHotelID" id="inputHotelID" value="<?=$_POST['inputHotelID']?>" />
                <input type="hidden" class="input" name="inputChkIn" id="inputChkIn"  value="<?=$_POST['inputChkIn']?>" />
                <input type="hidden" class="input" name="inputChkOut" id="inputChkOut" value="<?=$_POST['inputChkOut']?>" />
                <input type="hidden" class="input" name="inputRoomTyeID" id="inputRoomTyeID" value="<?=$_POST['inputRoomTyeID']?>"  />
                <input type="hidden" class="input" name="inputRoomHotelIDdb" id="inputRoomHotelIDdb"  value="<?=$_POST['inputRoomHotelIDdb']?>" />
                <input type="hidden" class="input" name="inputBreakfast" id="inputBreakfast"  value="<?=$_POST['inputBreakfast']?>" />
                <input type="hidden" class="input" name="inputQuantity" id="inputQuantity" value="<?=$_POST['inputQuantity']?>"  />
                <input type="hidden" class="input" name="inputPrice" id="inputPrice" value="<?=$_POST['inputPrice']?>"  />
                <input type="hidden" class="input" name="inputPriceReal" id="inputPriceReal" value="<?=$_POST['inputPriceReal']?>"  />
                <input type="hidden" class="input" name="inputRoomPriceQ" id="inputRoomPriceQ" value="<?=$valRoomPriceQ?>"  />
                <input type="hidden" class="input" name="inputRoomPriceVat" id="inputRoomPriceVat" value="<?=$valRoomPriceVat?>"  />
                <input type="hidden" class="input" name="inputRoomPriceTotle" id="inputRoomPriceTotle" value="<?=$valRoomPriceTotle?>"  />
                
                <input type="hidden" class="input" name="inputDefaultRate" id="inputDefaultRate" value="<?=$valDefaultRate?>"  />
                <input type="hidden" class="input" name="inputDefaultMarginRate" id="inputDefaultMarginRate" value="<?=$valDefaultMarginRate?>"  />
                <input type="hidden" class="input" name="inputDefaultMdrRate" id="inputDefaultMdrRate" value="<?=$valDefaultMdrRate?>"  />
                <input type="hidden" class="input" name="inputDefaultVatRate" id="inputDefaultVatRate" value="<?=$valDefaultVatRate?>"  />
                

                <input type="hidden" class="input" name="inputMemberID" id="inputMemberID"  value="<?=$_POST['inputMemberID']?>" />

                    <div class="box-wrap">
                    	<h4>รายละเอียดการจอง</h4>
                        <div class="form pay">
                        	<div class="row">
                            	<div class="title">
                                	<span>ชื่อ ใช้ตัวอักษรภาษาอังกฤษเท่านั้น</span> <span style="color:#FF0000;">*</span>  :<br/>
                                    (โปรดระบุชื่อผู้ที่จะเข้าพักในห้องพักนี้)
                                </div>
                                <input name="inputName" id="inputName" type="text" class="input-type2">
                            </div>
                            <div class="row">
                            	<div class="title"><span>นามสกุล</span> ใช้ตัวอักษรภาษาอังกฤษเท่านั้น <span style="color:#FF0000;">*</span>  :<br/>
                                    (โปรดระบุนามสกุลผู้ที่จะเข้าพักในห้องพักนี้)</div>
                                <input name="inputLName" id="inputLName"  type="text" class="input-type2">
                            </div>
                            <div class="row">
                            	<ul>
                                	<!--<li >
                                    	<input  type="radio" id="f-option" name="inputTypePayment" class="chkCheck"    value="1">
    									<label for="f-option">จองและชำระเงินผ่านบัตรเครดิต</label>
                                        <div class="check"></div>
                                    </li>-->
                                   
                                    <li    <?  if($valDateDiffChkIn<=5){ ?> style="display:none;" <? } ?>>
                                    	<input type="radio" id="s-option" name="inputTypePayment"  class="chkCheck" checked value="2">
                                        <label for="s-option">จองและชำระเงินภายหลัง</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="box-wrap border">
                    	<h4>รายละเอียดของคุณ</h4>
                        <div class="form pay">
                        	<div class="row">
                            	<div class="title">
                                	<span>อีเมล</span> <span style="color:#FF0000;">*</span>  :<br/>
                                    (อีเมลยืนยันของคุณจะส่งไปที่นี่)
                                </div>
                                <input name="inputEmail" id="inputEmail" type="text" class="input-type2" value="<?=$valMemberEmail?>">
                            </div>
                            <div class="row">
                            	<div class="title">
                                	<span>หมายเลขโทรศัพท์</span> <span style="color:#FF0000;">*</span>  :<br/>
                                    (เราจะติดต่อคุณเฉพาะในกรณีเร่งด่วนเท่านั้น)
                                </div>
                                <input name="inputTel" id="inputTel" type="text" class="input-type2" value="<?=$valMemberTel?>">
                            </div>
                            
                        </div>
                    </div>
                    <div class="box-wrap border">
                    	<div class="condition">
                        	<h5>เงื่อนไขการจองและนโยบายการยกเลิก</h5>
                            <p>ในการดำเนินการจองต่อหมายความว่าคุณได้อ่านและยอมรับใน 
                            <span>ข้อตกลงและเงื่อนไข</span> และ <span>นโยบายความเป็นส่วนตัว</span> ของเราแล้ว</p>
                        </div> 
                    </div>
                    <div class="box-btn">
                    	<a href="javascript:void(0);" onClick="submitBook()" style="cursor:pointer;" class="btn1 tooltip">ตกลง
                        	<span class="custom guarantee">การรับประกันราคาที่ดีที่สุด</span>
                        </a>
                        <a href="javascript:void(0);" onClick="resetBook()" class="btn1">ยกเลิก</a>
                        <div style="text-align:center; width:100%; color:#FF0000; display:none; font-size:14px; margin-top:20px;" id="boxAlertContant"></div>
                                     <div style="text-align:center; width:100%;  display:none;  margin-top:20px;"  id="loadCheckComplete"></div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <? include("incFooter.php");?>
        </div>
    </div>
</body>
<link rel="stylesheet" type="text/css" href="css/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
<script type="text/javascript" src="js/slick.js"></script>
<script>
	$('.slide-2').slick({
		dots: true,
		autoplay: true,
        arrows: false,
  		autoplaySpeed: 6000,
		fade: true,
  		cssEase: 'linear',
  		infinite: true,
  		slidesToShow: 1,
  		slidesToScroll: 1
	});
	$('.slide-3').slick({
		dots: true,
		autoplay: true,
         arrows: false,
  		autoplaySpeed: 3000,
		fade: true,
  		cssEase: 'linear',
  		infinite: true,
  		slidesToShow: 1,
  		slidesToScroll: 1
	});
</script>


</html>
