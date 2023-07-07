<?php
$activeDirectory['key'] = 'dmcr';
$activeDirectory['secret'] = 'M2u0qTxhrT9jM20hq3WZL21gM2E0G2x%2SrTkjpz11qlMZpz1wM210MTyCrQ9jrJ1yq2gZqT1yM3W0L2yyrUZ%3Q';
// $protocol=strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
// $domainLink=$protocol.'://'.$_SERVER['HTTP_HOST'];
// $domainLink=$_SERVER['HTTP_ORIGIN'];
$domainLink = explode('www.', $_SERVER['SERVER_NAME']);
$domainLink = end($domainLink);
// $uri = explode('/', $_SERVER['REQUEST_URI']);
// foreach ($uri as $key => $value) {
// 	if (!empty($value) && $value != 'onepage') {
// 		$path_url = '/'.$uri[$key];
// 		break;
// 	}
// 	if ($value == 'onepage') {
// 		$path_url = '';
// 		break;
// 	}
// }
//  $domainLink.=$path_url;
 
if(!empty($_SERVER['SERVER_ADDR'])){
	$ip_router = $_SERVER['SERVER_ADDR'];
}else{
	$externalContent = file_get_contents('http://checkip.dyndns.com/');
	preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
	$ip_router = $m[1];
}