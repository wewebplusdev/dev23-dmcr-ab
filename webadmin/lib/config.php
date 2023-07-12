<?php
date_default_timezone_set('Asia/Bangkok');
ini_set('memory_limit', '128M');

## nut add 01/03/17 ##
error_reporting(0);
## Core Title  ######################################################
$core_name_title = "ยินดีต้อนรับเข้าสู่ระบบบริการจัดการเว็บไซต์ ่ : กรมทรัพยากรทางทะเลและชายฝั่ง By Wewebplus";
$fornt_name_title = "กรมทรัพยากรทางทะเลและชายฝั่ง Department of Marine and Coastal Resoucres, Thailand";
$fornt_name_description  = "ทะเล ชายฝั่งทะเล ปะการัง หญ้าทะเล ป่าชายเลน อนุรักษ์ โลมา พะยูน วาฬ ทะเลไทย กัดเซาะชายฝั่ง โกงกาง ชายหาด หาดทราย ดำน้ำ คนรักทะเล ทะเลไทย ปะการังเที่ยม ปะการังฟอกขาว ระบบนิเวศป่าชายเลน ป่าเลน พื้นที่ชายฝั่งทะเล ชายหาด เกาะ อ่าวไทย อันดามัน, ฐานข้อมูลทรัพยากร";
$fornt_name_keywords   = "กระดานสนทนา , กรมทรัพยากรทางทะเลและชายฝั่ง, ทะเล, ชายฝั่งทะเล, ปะการัง,หญ้าทะเล, ป่าชายเลน, อนุรักษ์, โลมา, พะยูน, วาฬ, ทะเลไทย, กัดเซาะ, ไม้โกงกาง, ชายหาด, หาดทราย, ดำน้ำ, คนรักทะเล, ทะเลไทย, ปะการังเที่ยม, ปะการังฟอกขาว, ระบบนิเวศป่าชายเลน, ป่าเลน, พื้นที่ชายฝั่งทะเล, ชายหาด, เกาะ, อ่าวไทย, อันดามัน, ฐานข้อมูลทรัพยากร";

## Core Folder Local  ######################################################
$core_pathname_folderlocal = "";

## Core Upload  ######################################################
$core_pathname_upload = "../../upload";
$core_pathname_upload_fornt = "upload";
$core_pathname_mupload = "../core/upload/";
$core_pathname_logs = "../../logs";
$core_pathname_crupload = "../../upload/core";

## Core Path RSS  ##################################################

$core_fullpath_rss = "http://" . $_SERVER["HTTP_HOST"] . "" . $core_pathname_folderlocal . "/upload";
$core_variable_charset = "UTF-8";
$core_relativepath_rss = "../../rss";

## Core Path Name  ##################################################
$core_full_path = "http://" . $_SERVER["HTTP_HOST"] . "" . $core_pathname_folderlocal;

## Core Path SQL Language ##################################################
$coreLanguageSQL = "mysql";

## Core Table  ######################################################
$core_tb_staff = "sy_stf";
$core_tb_menu = "sy_mnu";
$core_tb_group = "sy_grp";
$core_tb_permission = "sy_mis";
$core_tb_box = "sy_box";
$core_tb_search = "sy_sea";
$core_tb_log = "sy_logs";
$core_tb_sort = "sy_stm";
$core_tb_setting = "sy_stt";
$core_tb_usercar = "md_srd";
$core_tb_service = "md_srs";
$core_tb_user = "sy_usr";
$core_tb_minisite = "md_mit";

## Other Table  ######################################################
$other_tb_geography = "ot_geo";
$other_tb_province = "ot_pro";
$other_tb_amphur = "ot_amp";
$other_tb_district = "ot_dis";
$other_tb_nation = "ot_nat";

## Core Icon  ######################################################
$core_icon_columnsize = 15;
$core_icon_maxsize = 75;
$core_icon_librarypath = "../img/iconmenu";

## Database Connect #################################################

if ($coreLanguageSQL == "mssql") {
    $core_db_hostname = "localhost";
    $core_db_username = "sa";
    $core_db_password = "P@ssw0rd";
    $core_db_name = "easyandsave";
} else {
    //$core_db_hostname = "127.0.0.1";
    //$core_db_username = "root";
    //$core_db_password = "1234";
    //$core_db_name = "2018_arb2";
	
    // $core_db_hostname = "localhost";
    // $core_db_username = "root";
    // $core_db_password = "1234";
    // $core_db_name = "dgr";
	
    //UAT
	// $core_db_hostname = "localhost";
	// $core_db_username = "root";
	// $core_db_password = "dmcr1234";
	// $core_db_name     = "arb";

    //DEV
    // $core_db_hostname = "localhost";
    $core_db_hostname = "192.168.1.129";
	$core_db_username = "root";
	$core_db_password = "IySY?Pk7!!mH";
	$core_db_name     = "2023_dmcr_ab";

    /*
     *
     *  $core_db_username = "asiareal_DBweb";
    $core_db_password = "nKaThpVPG";
     *
     *
      $core_db_hostname = "localhost";
      $core_db_username = "weplaza_DMsafedb";
      $core_db_password = "DMsafedb";
      $core_db_name = "weplaza_DMsafedb";
     */
}

$core_db_charecter_set = array(
    'charset' => "utf8",
    'collation' => "utf8_general_ci"
        );


## Core Val Setting #############################################
$toolEditorStyle = "ToolbarAll";
$core_default_pagesize = 15;
$core_default_maxpage = 15;
$core_default_reduce = 10;
$core_sort_number = "DESC";
$core_height_leftmenu = 40;

## Core Language #############################################
$coreLanguageThai = "Thai";
$coreLanguageEng = "Eng";

## Core Email #############################################
// $core_send_email = "info@safe.com";
// $core_goto_email = "info@safe.com";
$core_send_email = "webmaster@dgr.mail.go.th";
$core_goto_email = "webmaster@dgr.mail.go.th";



## Core Value #############################################
$coreMonthMem = array("-", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$coreMonthMemEng = array("-", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

$coreTxtSexMember = array("", "ชาย", "หญิง");
$coreTxtSexMemberEn = array("", "Male", "Female");
$core_config_val = 0;
$core_config_transportation = 100;

// $coreBankTransferMem = array("", "กสิกรไทย/066-2-64435-8/บจก. สมอล เวิลด์ อินเตอร์เทรด", "ไทยพาณิชย์/095-2-76962-9/บจก. สมอล เวิลด์ อินเตอร์เทรด", "กรุงเทพ/195-4-84204-1/บจก. สมอล เวิลด์ อินเตอร์เทรด");
// $coreBankTransferMemEn = array("", "KASIKORNBANK Bank/066-2-64435-8/Small World Intertrade CO.,LTD.", "The Siam Commercial Bank/095-2-76962-9/Small World Intertrade CO.,LTD.", "Bangkok Bank/195-4-84204-1/Small World Intertrade CO.,LTD.");


$modGroupType['Thai'] = array("", "รายละเอียดภายในเว็บไซต์", "เชื่อมโยงภายนอก");
$modGroupType['Eng'] = array("", "Website Details", "External link");
## Core Theme #############################################
$core_main_theme = array(
    0 => array("color" => "#e74962", "theme" => "theme.css"),
    1 => array("color" => "#e3a224", "theme" => "theme2.css"),
    2 => array("color" => "#d73f92", "theme" => "theme3.css"),
    3 => array("color" => "#c1243f", "theme" => "theme4.css"),
    4 => array("color" => "#04a351", "theme" => "theme5.css"),
    5 => array("color" => "#8c4e9b", "theme" => "theme6.css"),
    6 => array("color" => "#f3403c", "theme" => "theme7.css"),
    7 => array("color" => "#ee1820", "theme" => "theme8.css"),
    8 => array("color" => "#93c765", "theme" => "theme9.css"),
    9 => array("color" => "#e27e30", "theme" => "theme10.css")
);
$colorpatten = array("#e6e6e6", "#f46b23", "#ffb400", "#e7352b", "#8d42a1", "#3853d8", "#20a5ea", "#5cb328", "#7c5e4c", "#484848", "#01d2f9", "#7f8c8d");


## Core path nopic #############################################
$core_nopic_fb = "images/nopic/nopic_fb.jpg";
$core_nopic_tg = "images/nopic/nopic_tg.jpg";
$core_nopic_tr_large = "images/nopic/nopic_tr_large.jpg";
$core_nopic_bn = "images/nopic/nopic_bn.jpg";
$core_nopic_country = "images/nopic/nopic_country.jpg";
$core_nopic_map = "images/nopic/nopic_map.jpg";
$core_nopic_tr = "images/nopic/nopic_tr.jpg";


## Core Value Mail #############################################
$core_mail_Order = "ใบสั่งซื้อสินค้า";
$core_mail_thankyou = "Thank you ,";
$core_mail_company = "Small World Intertrade CO.,LTD.";
$core_mail_sentby = "This e-mail was sent by:";
$core_mail_address = "9/28 อาคาร เวิร์คเพลส แขวงบางแวก เขตภาษีเจริญ กรุงเทพ 10160 Tel. 02-683-4296 Fax 091-2280-280";

## Core Value FB #############################################
$valAppIdFB = '1562116060778897';
$valSecretIdFB = '995727c99327902421892d09da572a84';
$valReturnUrlFB = 'http://www.wewebplaza.com/tomandkate/th/fblogin/';
$valReturnUrlFBEn = 'http://www.wewebplaza.com/tomandkate/en/fblogin/';
$valReturnUrlFBCn = 'http://www.wewebplaza.com/tomandkate/cn/fblogin/';

## Core Value FB Order #############################################
$valReturnUrlFBOrder = 'http://www.wewebplaza.com/tomandkate/th/fbloginorder/';



## Core Email #############################################

$core_admin_email = "info@dmcr.go.th";
$core_master_email = "info@dmcr.go.th";

$core_send_email = "info@dmcr.go.th";

$core_admin_enews = "info@dmcr.go.th";


$coreLanguageThai="Thai";
$coreLanguageEng="Eng";

$coreTxtSexThai=array("","ชาย","หญิง");
$coreTxtSexEng=array("","Male","Female");

$coreTxtAntThai=array("","นาย","นาง","นางสาว");
$coreTxtAntEng=array("","Mr.","Mrs.","Ms.");

$coreTxtPostThai=array("","ส่งสินค้าไปยังที่อยู่ที่ระบุ","มารับสินค้าเอง");
$coreTxtPostEng=array("","Send address","I get it");

$coreStatusOrder=array("","รอการโอนเงิน","รอการบัญชีเช็คยอดเงิน","รอลูกค้าติดต่อกลับมา","บัญชีเครียแล้ว","กำลังดำเนินการจัดส่ง","จัดส่งเรียบร้อยแล้ว","ยกเลิกออเดอร์","คืนเงินให้ลูกค้า");

$coreStatusOrderFornt=array("","ค้างชำระ","รอคอนเฟิร์มการชำระเงิน","ออเดอร์คอนเฟิร์ม","กำลังดำเนินการจัดส่ง","จัดส่งแล้ว","ยกเลิกออเดอร์","ยกเลิกออเดอร์/คืนเงินแล้ว");

$coreTitleOrderFornt=array("","ได้รับออเดอร์แล้ว รอการชำระเงิน","ระบบได้รับแจ้งการชำระเงินแล้ว กำลังรอการตรวจเช็ค","การชำระเงินเครียแล้ว รอแผนกจัดส่งจัดของ","แผนกจัดส่งได้ปรินท์ใบออเดอร์แล้ว กำลังจัดการส่งของ","ของได้ถูกจัดส่งออกไปแล้ว เช็คสถานะได้จากจากเลข tracking number","ออเดอร์ถูกยกเลิก","ออเดอร์ถูกยกเลิก และ ได้คืนเงินแล้ว");

$coreColorBoxNews=array("","","org","pink","","red","gray","green","byzantium");
$coreColorBoxRadioNews=array("","","","gray","green");

$coreMonthDownload=array("ไม่ระบุเดือน","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

$coreMonthMem=array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$coreValTrue=array("ไม่ใช่","ใช่");
$coreValPermission=array("","ผู้ดูแลระบบ","สมาชิกทั่วไป");


$coreTxtStyleThai=array("","รูปแบบที่ 1","รูปแบบที่ 2");
$coreTxtStyleEng=array("","Style 01","Style 02");

$coreTxtAccomThai=array("","อาศัยกับครอบครัว","บ้านตัวเอง","บ้านเช่า","หอพัก");

$coreTxtArmyThai=array("","ได้รับการยกเว้น","ปลดเป็นทหารกองหนุน","ยังไม่ได้รับการเกณฑ์ทหาร");

$coreTxtStatusThai=array("","โสด","แต่งงาน","หม้าย","แยกกัน");


$coreTxtLangThai=array("","ดีมาก","ดี","พอใช้");

$coreTxtPrintThai=array("","ไม่ได้","ได้");
$coreTxtSickThai=array("","ไม่เคย","เคย");

$coreTxtQusThai=array("","คำตอบแบบตัวเลือก","คำตอบแบบระบุข้อมูล");

$coreTxtBannerThai=array("","เปิดหน้าต่างเดิม","เปิดหน้าต่างใหม่");

$coreTxtOptionThai=array("","LCD","ชุดไมโครโฟนตามโต๊ะ","คอมพิวเตอร์");

$coreTxtDateBookingThai=array("","ทั้งวัน","เช้า","บ่าย");

$coreTxtSubjectBookingThai=array("","ประชุม เรื่อง","สัมมนาและฝึกอบรม เรื่อง","การเรียนการสอน วิชา","เยี่ยมชม : โปรดระบุ ชื่อหน่วยงานที่มาเยี่ยมชม");



$arrTypeUser = array(
    '1' => 'Private User',
    '2' => 'Domain User One Account'
);

?>
