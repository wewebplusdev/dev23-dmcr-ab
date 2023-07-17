<?php
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
?>