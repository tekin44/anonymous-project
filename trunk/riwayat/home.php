<?php

// Connect to server and select databse.
$dbconn3 = pg_connect("host=localhost port=5432 dbname=sekolah user=postgres password=wajib");
//connect to a database named "mary" on the host "sheep" with a username and password

// username and password sent from form
$myid=$_POST['myid'];
$mypassword=md5($_POST['mypassword']);

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


<title>DATA RIWAYAT SISWA</title>
<br>
		<h1 align="left">DATA RIWAYAT SISWA SMA N 1 CIREBON</h1>

</head>

<body>

<table>
	<tr>
		<td><h3><b>NAMA</b></h3></td>
        <td><h3><b>:</b></h3></td>
		<td><h3><b><?=$nama?></b></h3></td>
	</tr>	   
    <tr>
		<td><h3><b>NIS</b></h3></td>
        <td><h3><b>:</b></h3></td>
		<td><h3><b><?=$nis?></b></h3></td>
	</tr>
	
    <tr>
		<td><h3><b>UANG SPP</b></h3></td>
        <td><h3><b>:</b></h3></td>
		<td><h3><b><?=$spp?></b></h3></td>
	</tr>
    <tr>
		<td><h3><b>UANG GEDUNG</b></h3></td>
        <td><h3><b>:</b></h3></td>
		<td><h3><b><?=$gedung?></b></h3></td>
	</tr>
    <tr>
		<td><h3><b>UANG TAHUNAN</b></h3></td>
        <td><h3><b>:</b></h3></td>
		<td><h3><b><?=$thn?></b></h3></td>
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


</body>
<br>
<br>
<A HREF="javascript:window.print()">
<IMG SRC="img/print_image.gif" BORDER="0" >PRINT </A>



</html>
<?php
}
else {
echo "Wrong Username or Password";
}
?>