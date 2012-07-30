<?php
session_start();
include_once("dbconfig.php");

if(!$_SESSION['id'])
	echo "<script>window.location = 'login.php'</script>";
else
	echo "<script>window.location = 'table.php'</script>";
?>
