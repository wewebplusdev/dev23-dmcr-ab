<?
## Core Title  ######################################################
$core_name_title = "ยินดีต้อนรับเข้าสู่ระบบบริการจัดการเว็บไซต์ ่ : กรมทรัพยากรทางทะเลและชายฝั่ง By Wewebplus";
$fornt_name_title = "กรมทรัพยากรทางทะเลและชายฝั่ง Department of Marine and Coastal Resoucres, Thailand";
$fornt_name_description  = "ทะเล ชายฝั่งทะเล ปะการัง หญ้าทะเล ป่าชายเลน อนุรักษ์ โลมา พะยูน วาฬ ทะเลไทย กัดเซาะชายฝั่ง โกงกาง ชายหาด หาดทราย ดำน้ำ คนรักทะเล ทะเลไทย ปะการังเที่ยม ปะการังฟอกขาว ระบบนิเวศป่าชายเลน ป่าเลน พื้นที่ชายฝั่งทะเล ชายหาด เกาะ อ่าวไทย อันดามัน, ฐานข้อมูลทรัพยากร";
$fornt_name_keywords   = "กระดานสนทนา , กรมทรัพยากรทางทะเลและชายฝั่ง, ทะเล, ชายฝั่งทะเล, ปะการัง,หญ้าทะเล, ป่าชายเลน, อนุรักษ์, โลมา, พะยูน, วาฬ, ทะเลไทย, กัดเซาะ, ไม้โกงกาง, ชายหาด, หาดทราย, ดำน้ำ, คนรักทะเล, ทะเลไทย, ปะการังเที่ยม, ปะการังฟอกขาว, ระบบนิเวศป่าชายเลน, ป่าเลน, พื้นที่ชายฝั่งทะเล, ชายหาด, เกาะ, อ่าวไทย, อันดามัน, ฐานข้อมูลทรัพยากร";
## Core Upload  ######################################################
$core_pathname_upload="../../upload";
$core_pathname_upload_m="../upload";
$core_pathname_upload_fornt="upload";

$core_path_root="2013/webadmin/core/";
$core_pathpic_upload_member="../core/upload/";
$core_pathname_logs="../../logs";

## Core Path RSS  ##################################################
$core_fullpath_rss="http://marineriscenter.dmcr.go.th/ab/upload";
//$core_fullpath_rss="http://dmcr2014.dmcr.go.th/upload";
$core_variable_charset="UTF-8";
$core_relativepath_rss ="../../rss";

## Core Path Name  ##################################################

$core_full_path="http://marineriscenter.dmcr.go.th/ab";
//$core_full_path="http://dmcr2014.dmcr.go.th";
## Core Table  ######################################################
$core_tb_staff="sy_stf";
$core_tb_menu="sy_mnu";
$core_tb_group="sy_grp";
$core_tb_permission="sy_mis";
$core_tb_box="sy_box";
$core_tb_search="sy_sea";
## Other Table  ######################################################
$other_tb_geography="ot_geo";
$other_tb_province="ot_pro";
$other_tb_amphur="ot_amp";
$other_tb_district="ot_dis";

## Core Icon  ######################################################
$core_icon_columnsize= 15;
$core_icon_maxsize= 75;
$core_icon_librarypath= "../img/iconmenu";

## Database Connect #################################################



$core_db_hostname = "127.0.0.1";
$core_db_username = "root";
$core_db_password = "1234";
$core_db_name     = "2018_arb2";

/*

$core_db_hostname = "localhost";
$core_db_username = "weplaza_DMdmcr3";
$core_db_password = "DMdmcr3";
$core_db_name     = "weplaza_DMdmcr3";
*/

$core_config_val=7;

$toolEditorStyle="ToolbarAll";

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

?>