<?php
switch ($url->segment[1]) {
    default:
    $dataJson = array(
        'status' => 400,
        'msg' => 'NOT FOUND API'
      );
      echo json_encode($dataJson);
        break;
    case 'report':
        $rssType = array();
        $rssac = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=coral_artificial&type=auth_count');

        foreach ($rssac->xpath('/rss/channel/item') as $KeyRssc => $valueRssc) {
            $rssType['Coral']['item'][$KeyRssc]['prov_th'] = empty((string) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (string) $valueRssc->prov_th;
            $rssType['Coral']['item'][$KeyRssc]['count'] = (int) $valueRssc->count;
            $rssType['Coral']['item'][$KeyRssc]['count_other'] = (int) $valueRssc->count_other;
        }
        $rssaf = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=floating&type=auth_count');
        foreach ($rssaf->xpath('/rss/channel/item') as $KeyRssc => $valueRssc) {
            $rssType['floating']['item'][$KeyRssc]['prov_th'] = empty((string) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (string) $valueRssc->prov_th;
            $rssType['floating']['item'][$KeyRssc]['count'] = (int) $valueRssc->count;
            $rssType['floating']['item'][$KeyRssc]['count_other'] = (int) $valueRssc->count_other;
        }

        $rssas = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=sinkship&type=auth_count');
        foreach ($rssas->xpath('/rss/channel/item') as $KeyRssc => $valueRssc) {
            $rssType['sinkship']['item'][$KeyRssc]['prov_th'] = empty((string) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (string) $valueRssc->prov_th;
            $rssType['sinkship']['item'][$KeyRssc]['count'] = (int) $valueRssc->count;
            $rssType['sinkship']['item'][$KeyRssc]['count_other'] = (int) $valueRssc->count_other;
        }
        $dataJson = array(
            'status' => 200,
            'msg' => 'SUCCESS',
            'data' => $rssType,
          );
        echo json_encode($dataJson);
        break;
    case 'prov':
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
        break;
    case 'count':
        $rssSet = array();
        $rssSet['Coral']['NavLv1'] = 'ฐานข้อมูลปะการังเทียม';
        $rssSet['Coral']['valTxtTitle'] = 'ฐานข้อมูลปะการังเทียม';
        $rssCoral = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=coral_artificial&type=count');
        $rssSet['Coral']['count'] = (int) $rssCoral->channel->item[0]->count;

        $rssSet['floating']['NavLv1'] = 'ฐานข้อมูลทุ่นในทะเล';
        $rssSet['floating']['valTxtTitle'] = 'ทุ่นในทะเล';
        $rssfloating = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=floating&type=count');
        $rssSet['floating']['count'] = (int) $rssfloating->channel->item[0]->count;

        $rssSet['sinkship']['NavLv1'] = 'ฐานข้อมูลจุดวางเรือ(อุทยานใต้ทะเล)';
        $rssSet['sinkship']['valTxtTitle'] = 'จุดวางเรือ';
        $rsssinkship = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=sinkship&type=count');
        $rssSet['sinkship']['count'] = (int) $rsssinkship->channel->item[0]->count;
        $dataJson = array(
            'status' => 200,
            'msg' => 'SUCCESS',
            'data' => $rssSet,
          );
        echo json_encode($dataJson);
        break;
}
