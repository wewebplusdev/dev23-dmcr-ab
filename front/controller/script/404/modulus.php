<?php

function callAbout($masterkey) {
    global $config, $db, $url;
    $lang = $url->pagelang[3];
    // print_pre($url);
    $sql = "SELECT
  " . $config['about']['db'] . "." . $config['about']['db'] . "_id,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_masterkey,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_htmlfilename$lang,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_keywords$lang,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_metatitle$lang,
  " . $config['about']['db'] . "." . $config['about']['db'] . "_description$lang

FROM
  " . $config['about']['db'] . "
WHERE
  " . $config['about']['db'] . "." . $config['about']['db'] . "_masterkey = '$masterkey' and
  " . $config['about']['db'] . "." . $config['about']['db'] . "_status = 'Enable'";




// print_pre($sql);

    $result = $db->execute($sql);
    return $result;
    // print_pre($result);
}
