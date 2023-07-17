<?php
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

?>