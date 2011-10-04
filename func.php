<?php


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

function functions(){
	$funcs = array(
	'safe'=>'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*()_-[]\,./"',
	'normal'=>'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*',
	'alpha'=>'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
	'num'=>'1234567890',
	'alphanum'=>'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'
	);
	return $funcs;
}
?>