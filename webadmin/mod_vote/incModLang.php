<?

if ($_SESSION[$valSiteManage . "core_session_language"] == "Eng") {

} else {
    $langMod["meu:group"] = "อีเมล์แจ้งลงทะเบียน";
    $langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);

    $langMod["txt:titleadd"] = "สร้างข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:titleedit"] = "แก้ไขข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:titleview"] = "แสดงผลข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:sortpermis"] = "จัดเรียงข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);

    $langMod["txt:titleadds"] = "สร้างข้อมูล" . $langMod["meu:group"];
    $langMod["txt:titleedits"] = "แก้ไขข้อมูล" . $langMod["meu:group"];
    $langMod["txt:titleviews"] = "แสดงผลข้อมูล" . $langMod["meu:group"];
    $langMod["txt:sortpermiss"] = "จัดเรียงข้อมูล" . $langMod["meu:group"];

    $langMod["txt:chart"] = "แสดงข้อมูล";
    $langMod["txt:chartde"] = "ข้อมูลนี้ถูกคำนวนและเเสดงผลเพื่อใช้ในการวัดผล";

    $langMod["txt:set"] = "ข้อมูลการตั้งค่าเว็บไซต์";
    $langMod["txt:setDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

    $langMod["txt:about"] = "ข้อมูลข้อความของระบบ";
    $langMod["txt:aboutDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

    $langMod["txt:seminar"] = "ข้อมูลข้อความสัมมนา";
    $langMod["txt:seminarDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";
	
    $langMod["txt:subject"] = "ข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
    $langMod["txt:subjectDe"] = "โปรดป้อนชื่อเรื่องและคำอธิบาย เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
    $langMod["viw:subjectDe"] = "ข้อมูลชื่อเรื่องและคำอธิบาย เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

    $langMod["txt:vote"] = "ข้อมูลคำถาม";
    $langMod["txt:voteDe"] = "โปรดป้อนคำถามและคำตอบ เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
    $langMod["viw:voteDe"] = "ข้อมูลคำถามและคำตอบ เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

    $langMod["txt:info"] = "ข้อมูลการติดต่อ";
    $langMod["txt:infoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการติดต่อหน้าเว็บไซต์ของคุณ";

    $langMod["tit:email"] = "อีเมล์ ";
    $langMod["tit:subject"] = "ชื่อเรื่อง ";
    $langMod["tit:title"] = "คำอธิบาย ";
    $langMod["tit:quest"] = "คำถาม ";
    $langMod["tit:tel"] = "เบอร์โทรศัพท์";
    $langMod["tit:by"] = "ผู้ติดต่อ";
    $langMod["tit:mgs"] = "ข้อความ";
    $langMod["tit:address"] = "ที่อยู่";
    $langMod["tit:no"] = "ลำดับ";

    $langMod["ats:email"] = "อีเมล์ซ้ำกับที่มีอยู่ในระบบแล้ว";

    $langMod["inp:seotitle"] = "Tag Title";
    $langMod["inp:seotitlenote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
    $langMod["inp:seodes"] = "Tag Description";
    $langMod["inp:seodesnote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของรายละเอียดหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
    $langMod["inp:seokey"] = "Tag Keywords";
    $langMod["inp:seokeynote"] = "หมายเหตุ : คำหรือวลีที่ใช้ในการค้นหาใน Search Engine(Google, Yahoo)";

    $langMod["ab:subject"] = "ชื่อระบบ";
    $langMod["ab:title"] = "ชื่อระบบอังกฤษ";
    $langMod["ab:titleEn"] = "คำบรรยายภาษาอังกฤษ";
    $langMod["ab:titleNo"] = "คำบรรยาย";
    $langMod["txt:answer"] = "คำตอบที่";
    $langMod["txt:date"] = "กำหนดวันที่ในการแสดงผล";
    $langMod["txt:dateDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่ในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
    $langMod["tit:sdate"] = "วันเริ่มต้น ";
    $langMod["tit:edate"] = "วันสิ้นสุด ";
    $langMod["inp:notedate"] = "หมายเหตุ : กรณีไม่ต้องการระบุวันเริ่มต้น และวันสิ้นสุดของเนื้อหานี้ กรุณาเว้นไว้ไม่ต้องกรอกข้อมูลใดๆ";
    $langMod["tit:votetype"] = "รูปแบบการโหลด ";
    $langMod["tit:emailset"] = "อีเมล์ ";

    $langMod = checkpageText($langMod);
}
?>
