<?php

// Connect to server and select databse.
$dbconn3 = pg_connect("host=192.168.17.2 port=5432 dbname=sekolah user=postgres password=dbr4H4514");
//connect to a database named "mary" on the host "sheep" with a username and password

// username and password sent from form
$myid=$_POST['myid'];
$mypassword=$_POST['mypassword'];
//md5()


$sql="SELECT * FROM siswa WHERE no_induk= '$myid' and password= '$mypassword'";
$result=pg_query($sql);

// Mysql_num_row is counting table row
$count=pg_num_rows($result);

// If result matched $myid and $mypassword, table row must be 1 row

if($count==1){ 
$i = 1;
$sql = "select (select nama_person from siswa where no_induk = '$myid') as nama, tgl,'5' as status from (select tgl from 
	(select generate_series(tanggal_pel_baru, CURRENT_DATE, interval'1 day')::date as tgl from config 
	EXCEPT 
	(select tanggal_absensi from absen a inner join siswa c on a.no_induk = c.no_induk inner join config b on a.tanggal_absensi >= b.tanggal_pel_baru and a.tanggal_absensi <= CURRENT_DATE where a.no_induk = '957')) a 
	EXCEPT
	(select tanggal_hari_libur from hari_libur)) a where EXTRACT(dow from a.tgl::timestamp) != 0
	UNION
	select b.nama_person,tanggal_absensi, status_absen as status from absen a inner join siswa b on a.no_induk = b.no_induk WHERE status_absen != '1' and a.no_induk = '$myid'";
$query=pg_query($sql);

while($row = pg_fetch_array($result)){
	$nama = $row['nama_person'];
	$nis = $row['no_induk'];
	$spp='-';
	$gedung='-';
	$thn='-';
}
?>

<html>
<head>
<!-- CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection, tv">
<link rel="stylesheet" href="css/login.css" type="text/css" media="screen, projection, tv">
<link rel="stylesheet" href="css/style-print.css" type="text/css" media="print">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<title>DATA RIWAYAT SISWA</title>
		
</head>

<body>
<div id="main">

	<div id="content-box">
	

		<div style="float:right">
		<a href="javascript:window.print()"><img src="img/print_image.gif" border="0" ></a>
		<a href="index.php"><img src="img/logout.gif" border="0" ></a>
		</div>

<h2 align="left">DATA RIWAYAT SISWA SMA N 1 CIREBON</h2>

<div id="name">
<table class="noborder">
<tr>
<td><b>NAMA</b></td>
<td><b> : </b> </td>
<td><b> <?=$nama?></b></td>
</tr>
<tr>
<td><b>NIS</b> </td>
<td><b> : </b> </td>
<td><b><?=$nis?></b></td>  
</tr>
</table>
</div>	

<table>
	<tr>
		<td><b>UANG SPP</b></td>
        <td><b>:</b></td>
		<td><b><?=$spp?></b></td>
	</tr>
    <tr>
		<td><b>UANG GEDUNG</b></td>
        <td><b>:</b></td>
		<td><b><?=$gedung?></b></td>
	</tr>
    <tr>
		<td><b>UANG TAHUNAN</b></td>
        <td><b>:</b></td>
		<td><b><?=$thn?></b></td>
	</tr>
</table>

<h3><b><u>AKADEMIK</u></b></h3>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>MATA PELAJARAN</th>
		<th>NILAI</th>
        <th>KKM</th>
	</tr>
	<tr align="center" > 
		<td><?php echo '-';?></td>
		<td><?php echo '-';?></td>
        <td><?php echo '-';?></td>
	</tr>
</table>
<h3><b><u>ABSENSI</u></b></h3>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>TANGGAL</th>
		<th>KETERANGAN</th>
	</tr>  
         <?php while($row = pg_fetch_array($query)){
			if($row['status'] == '2') $status = "TERLAMABAT";
			else if($row['status'] == '3') $status = "SAKIT";
			else if($row['status'] == '4') $status = "IJIN";
			else $status = "TIDAK MASUK";
		?>
			<tr align="center" > 
				<td><?php echo date('d-m-Y',strtotime($row['tgl']));?></td>
				<td><?php echo $status;?></td>
			</tr>
			
		 <?php }?>
</table>

<h3><b><u>KEUANGAN</u></b></h3>
<h4>@ SPP LUNAS</h4>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>BULAN</th>
		<th>TANGGAL</th>
	</tr>    
	<tr align="center" > 
		<td><?php echo '-'?></td>
		<td><?php echo '-'?></td>
	</tr>
</table>
<h4>@ HISTORY PEMBAYARAN UANG GEDUNG DAN TAHUNAN</h4>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>NO</th>
        <th>RUPIAH</th>
		<th>TANGGAL</th>
	</tr>    
	<tr align="center" > 
		<td><?php echo '-'?></td>
        <td><?php echo '-'?></td>
		<td><?php echo '-'?></td>
	</tr>
    <tr >
	<th bgcolor="#CCCCCC">SISA</th>
    <th><?php echo '-'?></th>
    </tr>
</table>
</div>
</div>
</body>
</html>
<?php
}
else {
echo "Wrong Username or Password";
}
?>