<?php
## setting
$config['setting']['db'] = "md_site";
$config['setting']['masterkey'] = "site";


$arr_metatag = array(
  'th' => 'ซูมิโตโม อีเล็คตริก ไทย โฮลดิ้ง จำกัด',
  'en' => 'S.E.I Thai Holding Co.,Ltd.',
);
$arr_lang = array(
  'th' => 'ก',
  'en' => 'A',
);
$smarty->assign("arr_lang", $arr_lang[$url->pagelang[2]]);

## modulus
$config['cms']['db']['main'] = "md_cms";
$config['cmg']['db']['main'] = "md_cmg";
$config['album']['db']['main'] = "md_cma";
$config['cmf']['db']['main'] = "md_cmf";
$config['cmt']['db']['main'] = "md_cmt";
$config['cmc']['db']['main'] = "md_cmc";
$config['cug']['db']['main'] = "md_cug";
$config['cus']['db']['main'] = "md_cus";
$config['cue']['db']['main'] = "md_cue";
$config['sea']['db']['main'] = "sy_sea";
$config['faq']['db']['main'] = "md_faq";
$config['faf']['db']['main'] = "md_faf";
$config['tgp']['db']['main'] = "md_tgp";
$config['ban']['db']['main'] = "md_ban";

## masterkey
$config['news']['masterkey'] = "nw";
$config['km']['masterkey'] = "km";
$config['cu']['masterkey'] = "cu";
$config['fq']['masterkey'] = "fq";
$config['tg']['masterkey'] = "tg";
$config['bn']['masterkey'] = "bn";