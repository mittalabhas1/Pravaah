<?php

$con = mysqli_connect('203.124.112.140', 'rhapsody', 'jQuery7!', 'rhapsody') or die(mysqli_error());

function clean_input($data, $con) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($con, $data);
	return $data;
}

function newHash($data) {
    return md5($data.'chutiyetujherhapsodymaihianatha');
}

?>