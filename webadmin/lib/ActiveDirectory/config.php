<?php
$activeDirectory['key'] = 'ab';
$activeDirectory['secret'] = 'oJu3qRjhoJ9aM3DhnKW4L3OgoJE3YxkloJIaqUEhnJI4L3OvoJS3MHkhoJyapaEunJ14G3N%2SoJk3pxk1oFMaLaEunH94C3O5oJI3n0k0oJIapaEwnJI4pj%3Q%3Q';
// $protocol=strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
// $domainLink=$protocol.'://'.$_SERVER['HTTP_HOST'];
// $domainLink=$_SERVER['HTTP_ORIGIN'];
$domainLink = explode('www.', $_SERVER['SERVER_NAME']);
$domainLink = end($domainLink);
$uri = explode('/', $_SERVER['REQUEST_URI']);
foreach ($uri as $key => $value) {
	if (!empty($value) && $value != 'weadmin' && $value != 'webadmin') {
		$path_url = '/'.$uri[$key];
		break;
	}
	if ($value == 'weadmin' || $value == 'webadmin') {
		$path_url = '';
		break;
	}
}
 $domainLink.=$path_url;
if(!empty($_SERVER['SERVER_ADDR'])){
	$ip_router = $_SERVER['SERVER_ADDR'];
}else{
	$externalContent = file_get_contents('http://checkip.dyndns.com/');
	preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
	$ip_router = $m[1];
}
