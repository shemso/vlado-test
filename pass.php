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
// Generate a random character string
function rand_str($length = 63, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*()_-[]\,./')
{
    // Length of character list
    $chars_length = (strlen($chars) - 1);

    // Start our string
    $string = $chars{mt_rand(0, $chars_length)};
   
    // Generate random string
    for ($i = 1; $i < $length; $i = strlen($string))
    {
        // Grab a random character from our list
        $r = $chars{mt_rand(0, $chars_length)};
       
        // Make sure the same two characters don't appear next to each other
        if ($r != $string{$i - 1}) $string .=  $r;
    }
   
    // Return the string
    return $string;
}
function simplepwd($pwd,$lenght){
	$pwd = str_replace('s','$',$pwd);
	$pwd = str_replace('S','C',$pwd);
	$pwd = str_replace('am','I',$pwd);
	$pwd = str_replace('a','@',$pwd);
	$pwd = str_replace('A','4',$pwd);
	$pwd = str_replace('v','B',$pwd);
	$pwd = str_replace('V','y',$pwd);
	$pwd = str_replace('i','1',$pwd);
	$pwd = str_replace('I','l',$pwd);
	$pwd = str_replace('r','p',$pwd);
	$pwd = str_replace('o','q',$pwd);
	$pwd = str_replace('O','0',$pwd);
	$pwd = str_replace('B','8',$pwd);
	$pwd = str_replace('b','6',$pwd);
	$pwd = str_replace('e','3',$pwd);
	$pwd = str_replace('u','Y',$pwd);
	$pwd = $pwd.mt_rand(0,9).mt_rand('a','Z');
	if ($lenght < strlen($pwd)) {
		return $pwd."\n".substr($pwd,0,$lenght);
	}
	if ($lenght == strlen($pwd)) return $pwd;
	if ($lenght > strlen($pwd)) return $pwd.rand_str($lenght-strlen($pwd),'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890');
}
$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/',$uri);
if ($uri['2']){
	if ($uri['2'] > 100) $uri['2'] = 100;
	if ($uri['3']) {
		if ($uri['3']=='safe') $uri['3'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*()_-[]\,./';
		if ($uri['3']=='normal') $uri['3'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*';
		if ($uri['3']=='alphanum') $uri['3'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
		if ($uri['3']=='num') $uri['3'] = '1234567890';
		if ($uri['3']=='alpha') $uri['3'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		if ($uri['3']=='simple' and $uri['4']) {
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