<?
if($_SESSION[$valSiteManage."core_session_language"]=="Eng"){
		$langMod["meu:group"] = "Group ".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);

		$langMod["txt:titleadd"] = "Create ".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleedit"] = "Edit ".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleview"] = "Show ".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:sortpermis"] = "Sort ".getNameMenu($_REQUEST["menukeyid"]);

		$langMod["txt:titleaddg"] = "Create ".$langMod["meu:group"];
		$langMod["txt:titleeditg"] = "Edit".$langMod["meu:group"];
		$langMod["txt:titleviewg"] = "Show ".$langMod["meu:group"];
		$langMod["txt:sortpermisg"] = "Sort ".$langMod["meu:group"];

		$langMod["txt:set"] = "Email Information";
		$langMod["txt:setDe"] = "This is the section used to contact your website.";

		$langMod["txt:info"] = "ข้อมูลการติดต่อ";
		$langMod["txt:infoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการติดต่อหน้าเว็บไซต์ของคุณ";

		$langMod["tit:email"] ="email";
		$langMod["tit:subject"] ="Subject".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["tit:tel"] ="Tel";
		$langMod["tit:fax"] ="Fax";
		$langMod["tit:by"] ="By";
		$langMod["tit:position"] = "Position";
		$langMod["file:type"] = "Type";
		$langMod["file:size"] = "Size";
		$langMod["tit:mgs"] ="Message";
		$langMod["tit:address"] ="Address";
		$langMod["tit:no"] ="No.";
		$langMod["tit:selectg"] ="Select".$langMod["meu:group"];
		$langMod["tit:selectgn"] ="Name".$langMod["meu:group"];
		$langMod["txt:subjectg"] = "Data".$langMod["meu:group"];
		$langMod["txt:subjectgDe"] = "Please enter".$langMod["meu:group"]." For use in displaying your website pages";
		$langMod["tit:noteg"] ="Note";
		$langMod["ats:email"] = "Duplicate emails are already in the system";

		$langMod["tit:inpName"] = "Name".$langMod["meu:group"];
		$langMod["tit:sSedate"]= "Start date";
		$langMod["tit:eSedate"]= "End date";

		$langMod["tit:offeror"] = "Name of the offeror";
		$langMod["tit:Hnum"] = "Number";
		$langMod["tit:tum"] = "District";
		$langMod["tit:amp"] = "District";
		$langMod["tit:prov"] = "Province";
		$langMod["tit:zipcode"] = "Zip code";
		$langMod["tit:tel"] = "Telephone Number";
		$langMod["tit:Numofsponser"] = "Number of sponsors";
		$langMod["tit:sponser"] = "Sponsors";
		$langMod["tit:Opsys"] = "Operating System";
		$langMod["tit:posalType"] = "Proposal Type";
		$langMod["tit:Place"] = "Place/Execution";
		$langMod["tit:NumofMater"] = "Number of materials and materials used/Execution";
		$langMod["tit:PlaceArea"] = "Placement Area/Execution";
		$langMod["tit:Budget"] = "Budget (Baht)";
		$langMod["tit:seafloor"] = "Sea floor";
		$langMod["tit:DepthWater"] = "Depth of water";
		$langMod["tit:Coastal"] = "Coastal shelf";
		$langMod["tit:Attach"] = "Attachment info";
		$langMod["tit::AttachDe"] = "Attachment info The contact is attached";
		$langMod["tit:Layout"] = "Layout";
		$langMod["tit:Lomap"] = "Location map";
		$langMod["tit:OtherDe"] = "Other details";

}else{
		$langMod["meu:group"] = "กลุ่ม".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);

		$langMod["txt:titleadd"] = "สร้างข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleedit"] = "แก้ไขข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleview"] = "แสดงผลข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:sortpermis"] = "จัดเรียงข้อมูล".getNameMenu($_REQUEST["menukeyid"]);

		$langMod["txt:titleaddg"] = "สร้างข้อมูล".$langMod["meu:group"];
		$langMod["txt:titleeditg"] = "แก้ไขข้อมูล".$langMod["meu:group"];
		$langMod["txt:titleviewg"] = "แสดงผลข้อมูล".$langMod["meu:group"];
		$langMod["txt:sortpermisg"] = "จัดเรียงข้อมูล".$langMod["meu:group"];

		$langMod["txt:set"] = "ข้อมูลอีเมล์";
		$langMod["txt:setDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดอีเมล์ในการติดต่อหน้าเว็บไซต์ของคุณ";

		$langMod["txt:info"] = "ข้อมูลการติดต่อ";
		$langMod["txt:infoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการติดต่อหน้าเว็บไซต์ของคุณ";

		$langMod["tit:email"] ="อีเมล์";
		$langMod["tit:subject"] ="หัวข้อ".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["tit:tel"] ="เบอร์โทรศัพท์";
		$langMod["tit:fax"] ="แฟกซ์";
		$langMod["tit:by"] ="ผู้ติดต่อ";
		$langMod["tit:position"] = "ตำแหน่ง";
		$langMod["file:type"] = "ประเภท";
		$langMod["file:size"] = "ขนาด";
		$langMod["tit:mgs"] ="ข้อความ";
		$langMod["tit:address"] ="ที่อยู่";
		$langMod["tit:no"] ="ลำดับ";
		$langMod["tit:selectg"] ="เลือก".$langMod["meu:group"];
		$langMod["tit:selectgn"] ="ชื่อ".$langMod["meu:group"];
		$langMod["txt:subjectg"] = "ข้อมูล".$langMod["meu:group"];
		$langMod["txt:subjectgDe"] = "โปรดป้อนชื่อ".$langMod["meu:group"]." เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		$langMod["tit:noteg"] ="หมายเหตุ";
		$langMod["ats:email"] = "อีเมล์ซ้ำกับที่มีอยู่ในระบบแล้ว";

		$langMod["tit:inpName"] = "ชื่อ".$langMod["meu:group"];
		$langMod["tit:sSedate"]= "วันที่เริ่มต้น";
		$langMod["tit:eSedate"]= "วันที่สิ้นสุด";

		$langMod["tit:offeror"] = "ชื่อผู้เสนอความต้องการ";
		$langMod["tit:Hnum"] = "เลขที่";
		$langMod["tit:tum"] = "ตำบล";
		$langMod["tit:amp"] = "อำเภอ";
		$langMod["tit:prov"] = "จังหวัด";
		$langMod["tit:zipcode"] = "รหัสไปรษณีย์";
		$langMod["tit:tel"] = "เบอร์โทรศัพท์";
		$langMod["tit:Numofsponser"] = "กลุ่มผู้สนับสนุนจำนวน";
		$langMod["tit:sponser"] = "ชื่อผู้สนับสนุน";
		$langMod["tit:Opsys"] = "หน่วยงานดำเนินการ";
		$langMod["tit:posalType"] = "ประเภทการเสนอความต้องการ";
		$langMod["tit:Place"] = "สถานที่วาง/ดำเนินการ ";
		$langMod["tit:NumofMater"] = "ชนิดขนาด และจำนวนวัสดุที่ใช้วาง/ดำเนินการ";
		$langMod["tit:PlaceArea"] = "ขนาดพื้นที่จัดวาง/ดำเนินการ ";
		$langMod["tit:Budget"] = "งบประมาณ (บาท)";
		$langMod["tit:seafloor"] = "ลักษณะพื้นทะเล";
		$langMod["tit:DepthWater"] = "ระดับความลึกของนํ้า";
		$langMod["tit:Coastal"] = "ระยะห่างชายฝั่ง";
		$langMod["tit:Attach"] = "ข้อมูลเอกสารแนบ";
		$langMod["tit::AttachDe"] = "ข้อมูลเอกสารแนบ ที่ผู้ติดต่อแนบมา";
		$langMod["tit:Layout"] = "ผังการจัดวาง";
		$langMod["tit:Lomap"] = "แผนที่พื้นที่วาง";
		$langMod["tit:OtherDe"] = "รายละเอียดอื่น ๆ";



}
?>
