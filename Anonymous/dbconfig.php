<?php
	include_once('adodb5/adodb.inc.php');
	$DB = NewADOConnection('pgsql');
	$DB->Connect('localhost', 'postgres', 'rahasia','absensi');
	if (!$DB) die("Connection failed");
	return;   
?>
