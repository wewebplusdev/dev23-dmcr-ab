<?php
 $rssProv = array();
 $rssProv['Coral']['NavLv1'] = "ฐานข้อมูลปะการังเทียม";
 $rssProv['Coral']['valTxtTitle'] = 'ปะการังเทียม';
 $rssc = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=coral_artificial&type=prov');
 foreach ($rssc->xpath('/rss/channel/item') as $KeyRssc => $valueRssc) {
     $rssProv['Coral']['item'][$KeyRssc]['prov_th'] = empty((string) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (string) $valueRssc->prov_th;
     $rssProv['Coral']['item'][$KeyRssc]['count'] = (int) $valueRssc->count;
     $rssProv['Coral']['item'][$KeyRssc]['link'] = (string) $valueRssc->link;
     $rssProv['Coral']['item'][$KeyRssc]['linkmap'] = (string) $valueRssc->linkmap;
 }

 $rssProv['floating']['NavLv1'] = "ฐานข้อมูลทุ่นในทะเล";
 $rssProv['floating']['valTxtTitle'] = 'ทุ่นในทะเล';
 $rssf = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=floating&type=prov');
 foreach ($rssf->xpath('/rss/channel/item') as $KeyRssc => $valueRssc) {
     $rssProv['floating']['item'][$KeyRssc]['prov_th'] = empty((string) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (string) $valueRssc->prov_th;
     $rssProv['floating']['item'][$KeyRssc]['count'] = (int) $valueRssc->count;
     $rssProv['floating']['item'][$KeyRssc]['link'] = (string) $valueRssc->link;
     $rssProv['floating']['item'][$KeyRssc]['linkmap'] = (string) $valueRssc->linkmap;
 }
 $rssProv['sinkship']['NavLv1'] = "ฐานข้อมูลจุดจมเรือ(อุทยานใต้ทะเล)";
 $rssProv['sinkship']['valTxtTitle'] = 'จุดจมเรือ(อุทยานใต้ทะเล)';
 $rsss = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=sinkship&type=prov');
 foreach ($rsss->xpath('/rss/channel/item') as $KeyRssc => $valueRssc) {
     $rssProv['sinkship']['item'][$KeyRssc]['prov_th'] = empty((string) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (string) $valueRssc->prov_th;
     $rssProv['sinkship']['item'][$KeyRssc]['count'] = (int) $valueRssc->count;
     $rssProv['sinkship']['item'][$KeyRssc]['link'] = (string) $valueRssc->link;
     $rssProv['sinkship']['item'][$KeyRssc]['linkmap'] = (string) $valueRssc->linkmap;
 }
 $dataJson = array(
     'status' => 200,
     'msg' => 'SUCCESS',
     'data' => $rssProv,
   );
 echo json_encode($dataJson);
?>