<?php
session_start();
//include "dbconfig.php";
/*include_once("function/grid.php");

$rows = array();
$i = 0;
while($row = pg_fetch_array($DB->getRows('admin'))){
	$rows[] = $row[$i];
	$i++;
}
print_r($rows);
$grid = new Grid('admin');
$grid->viewGrid();*/
if(!$_SESSION['id'])
	echo "<script>window.location = 'login.php'</script>";
else
	echo "<script>window.location = 'table.php'</script>";
?>
