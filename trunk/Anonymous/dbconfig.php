<?php
	include_once('function/database.php');
	$DB = new Database('absensi','postgres', 'rahasia','localhost');
	if (!$DB) die("Connection failed");
?>
