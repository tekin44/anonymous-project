<?php
include "dbconfig.php";
$user = $_REQUEST['user'] ? $_REQUEST['user'] : '';
$password = $_REQUEST['password'] ? md5($_REQUEST['password']) : '';
if (!$user || !$password) {
	echo "<script>alert('DUAAAAARRR!!!!')</script>";
	echo "<script>window.location = 'login.php'</script>";
}
$sql = "select count(*) from admin where id_admin = '" . $user . "' and password_admin '" . $password . "'";
$exist = $DB->GetOne($sql);
echo $exist;
if (!$exist) {
	echo "<script>alert('JEEGGGGGGEEEEEERR!!!!')</script>";
	echo "<script>window.location = 'login.php'</script>";
} else {
	session_start();
	$_SESSION['id'] = $user;
	echo "<script>window.location = 'table.php'</script>";
}
?>
