<?php if(strpos($_SERVER['HTTP_USER_AGENT'],'curl') === false){?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<title>ICT.BA pass gen</title>
<meta name="author" content="Vladimir Grubor - Promotim d.o.o.">
<meta name="keywords" content="password generator" />
<meta name="description" content="High security password generator" />
<meta name="sitemenu" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
</head>
<body>
<div style="margin-top:20px;margin-right:20px;font-weight:bold;font-size:20px;border: 2px solid rgb(177, 171, 158);padding-top: 4px; padding-bottom: 4px; width:800px;  text-align:center; float:center;">
<?php
}
require('func.php');
$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/',$uri);
$fs = functions();
if (isset($uri['2']) and $uri['2']){
	if ($uri['2'] > 100) $uri['2'] = 100;
	if (isset($uri['3']) and $uri['3']) {
		if (isset($fs[$uri['3']])) $uri['3'] = $fs[$uri['3']];
		elseif ($uri['3']=='simple' and $uri['4']) {
			if (strlen($uri['4'])>63) $uri['4'] = substr($uri['4'],0,64);
			echo simplepwd($uri['4'],$uri['2'])."\n";
			die();
		}
		if (strlen($uri['3']) > 100) $uri['3'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*()_-[]\,./';
		echo rand_str($uri['2'],$uri['3']);
	}
	else echo rand_str($uri['2']);
} else echo rand_str();
echo "\n";
?>
<?php if(strpos($_SERVER['HTTP_USER_AGENT'],'curl') === false){?>
</div>
</body>
</html>
<?}?>