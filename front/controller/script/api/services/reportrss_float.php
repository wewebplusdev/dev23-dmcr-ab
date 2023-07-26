<?php
$rssType = array();

$rssaf = simplexml_load_file('http://marinegiscenter.dmcr.go.th/admmapph2/php/summary_data.php?layer=floating&type=auth_count');
foreach ($rssaf->xpath('/rss/channel/item') as $KeyRssc => $valueRssc) {
    $rssType['item'][$KeyRssc]['prov_th'] = empty((string) $valueRssc->prov_th) ? "ไม่ระบุจังหวัด" : (string) $valueRssc->prov_th;
    $rssType['item'][$KeyRssc]['count'] = (int) $valueRssc->count;
    $rssType['item'][$KeyRssc]['count_other'] = (int) $valueRssc->count_other;
}

$dataJson = array(
    'status' => 200,
    'msg' => 'SUCCESS',
    'data' => $rssType,
  );
echo json_encode($dataJson);
?>