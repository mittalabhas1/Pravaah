<?php

$connect = mysql_connect("203.124.112.136","stuAmbassador","jQuery7!") or die(mysql_error());
mysql_select_db("stuAmbassador", $connect) or die(mysql_error());

function rpHash($value) {
	$hash = 5381;
	$value = strtoupper($value);
	for($i = 0; $i < strlen($value); $i++) {
		$hash = (($hash << 5) + $hash) + ord(substr($value, $i));
	}
	return $hash;
}

function clean_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = mysql_real_escape_string($data);
	return $data;
}

?>
