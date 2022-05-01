<?php

$Username = 'Steve';
$Password = '$2y$10$qNBbxSxdRW2Z4xtWJuFCp.aVbetkzNHUmDt4C0AxCFcPSrBNh0BOO';
$base_url = "http://" . $_SERVER['SERVER_NAME'];

$mysqli = new mysqli("localhost","shreegyg_user","m&P8t}6]1+mB","shreegyg_shreeji");
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

function escape($string)
{
    global $mysqli;    
    return mysqli_real_escape_string($mysqli,$string);
}

function clean($string)
{
	$string = trim($string);
	$string = stripcslashes($string);
	$string = htmlentities($string);

	return $string;
}

?>
