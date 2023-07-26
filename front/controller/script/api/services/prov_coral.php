<?php
 $rssProv = array();
 $rssProv['NavLv1'] = "ฐานข้อมูลปะการังเทียม";
 $rssProv['valTxtTitle'] = 'ปะการังเทียม';
 $rssc = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=coral_artificial&type=prov');
 foreach ($rssc->xpath('/rss/channel/item') as $KeyRssc => $valueRssc) {
     $rssProv['item'][$KeyRssc]['prov_th'] = empty((string) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (string) $valueRssc->prov_th;
     $rssProv['item'][$KeyRssc]['count'] = (int) $valueRssc->count;
     $rssProv['item'][$KeyRssc]['link'] = (string) $valueRssc->link;
     $rssProv['item'][$KeyRssc]['linkmap'] = (string) $valueRssc->linkmap;
 }
 $dataJson = array(
     'status' => 200,
     'msg' => 'SUCCESS',
     'data' => $rssProv,
   );
 echo json_encode($dataJson);
?>