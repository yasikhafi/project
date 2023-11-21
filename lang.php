<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require get_language_file();
function get_language_file()
{
	$_SESSION['weapon'] = $_SESSION['weapon'] ?? 'id';
	$_SESSION['weapon'] = $_GET['weapon'] ?? $_SESSION['weapon'];


	return "languages/".$_SESSION['weapon'].".php";
}

function __($str)
{
	global $weapon;
	if(!empty($weapon[$str]))
	{
		return $weapon[$str];
	}
	return $str;
}
