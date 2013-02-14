<?php

// Connect to server and select databse.
$dbconn3 = pg_connect("host=127.0.0.1 port=5432 dbname=temp_school user=postgres password=123456");
//connect to a database named "mary" on the host "sheep" with a username and password

$id_periode = $_REQUEST['id_periode']?$_REQUEST['id_periode']:'';
// username and password sent from form
$myid=$_POST['myid'];
$mypassword=md5($_POST['mypassword']);
//md5()

$sql="SELECT * FROM siswa a 
	inner join kelas b on a.id_kelas = b.id_kelas 
	WHERE nomor_induk_siswa = '$myid' and password_siswa= '$mypassword'";
$result=pg_query($sql);
// Mysql_num_row is counting table row
$count=pg_num_rows($result);
// If result matched $myid and $mypassword, table row must be 1 row
if($count>0){
$siswa = pg_fetch_assoc($result);
?>
	<html>
<head>
<!-- CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection, tv">
<link rel="stylesheet" href="css/login.css" type="text/css" media="screen, projection, tv">
<link rel="stylesheet" href="css/style-print.css" type="text/css" media="print">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<title>Data Riwayat Siswa</title>
		
</head>

<body>
<div id="main">

	<div id="content-box">

		<div id="hapus" style="float:right">
		<a href="javascript:window.print()">	<img src="img/print_image.gif" 	border="0" ></a>
		<a href="index.php"><img src="img/logout.gif" 		border="0" ></a>
		</div>
<?php
$sqlperiode = "select * from periode";
$q=pg_query($sqlperiode);
?>
<a href=""><img align = "left" src="img/logo.png" /></a>
<h2 align="left">DATA RIWAYAT SISWA SMA N 1 CIREBON</h2>
<br>
<div id="hapus">
<form action="home.php" method ="post">
<b>PERIODE : </b>
<select name="id_periode">
		<option value="1">Pilih Periode</option>
		<?php
		while($row = pg_fetch_array($q)){
			$selected = '';
			if($row['id_periode'] == $id_periode) $selected = 'selected';
			echo "<option value='".$row['id_periode']."' ".$selected.">".$row['tahun_periode']." Semester ".$row['periode_semester']."</option>";
		}
		?>
</select></b></td>
<input type="hidden" value="<?=$myid?>" name="myid" /> 
<input type="hidden" value="<?=$mypassword?>" name="mypassword" />
<input type="submit" value="search">
</form>
</div>

<div id="name">
<table class="noborder">

<tr>
<td><b>NAMA</b></td>
<td><b> : </b> </td>
<td><b><?=$siswa['nama_siswa']?></b></td>
</tr>
<tr>
<td><b>KELAS</b> </td>
<td><b> : </b> </td>
<td><b><?=$siswa['nama_kelas']?></b></td>  
</tr>
<tr>
<td><b>NIS</b> </td>
<td><b> : </b> </td>
<td><b><?=$siswa['nomor_induk_siswa']?></b></td>  
</tr>
</table>
</div>	
<?php
$sql_keu = "select * from siswa a 
inner join dsp b on a.nomor_induk_siswa = b.nomor_induk_siswa 
inner join tahunan c on a.nomor_induk_siswa = c.nomor_induk_siswa 
inner join spp d on a.nomor_induk_siswa = d.nomor_induk_siswa
where a.nomor_induk_siswa = '$myid'";
$query_keu = pg_query($sql_keu);
$rows_keu = pg_fetch_assoc($query_keu);
?>
<table>
	<tr>
		<td><b>UANG SPP</b></td>
        <td><b>:</b></td>
		<td><b>Rp <?=$rows_keu['jumlah_spp']?>/Bulan</b></td>
	</tr>
    <tr>
		<td><b>UANG GEDUNG</b></td>
        <td><b>:</b></td>
		<td><b>Rp <?=$rows_keu['jumlah_dsp']?></b></td>
	</tr>
    <tr>
		<td><b>UANG TAHUNAN</b></td>
        <td><b>:</b></td>
		<td><b>Rp <?=$rows_keu['jumlah_tahunan']?></b></td>
	</tr>
</table>
<?php 
	$sql = "select nama_pelajaran, nilai_raport, nilai_kelulusan from raport a 
		inner join siswa b on a.nomor_induk_siswa = b.nomor_induk_siswa
		inner join pelajaran c on a.kode_pelajaran = c.kode_pelajaran
		inner join pengajar_kelas d on a.kode_pelajaran = d.kode_pelajaran
		and a.id_kelas = d.id_kelas and a.nomor_induk_pengajar = d.nomor_induk_pengajar
		where b.nomor_induk_siswa = '$myid'";
	$query = pg_query($sql);
?>
<h3><b><u>AKADEMIK</u></b></h3>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>MATA PELAJARAN</th>
		<th>NILAI</th>
        <th>KKM</th>
	</tr>
<?php while($row = pg_fetch_assoc($query)){?>
	<tr align="center" > 
		<td><?=$row['nama_pelajaran']?></td>
		<td><?=$row['nilai_raport']?></td>
        <td><?=$row['nilai_kelulusan']?></td>
	</tr>
<?php }?>
</table>
<?php
	
	$sql = "select * from periode where id_periode = ".$id_periode;
	$query = pg_query($sql);
	$row = pg_fetch_row($query);
	$sql = "select (select nama_siswa from siswa where nomor_induk_siswa = '$myid') as nama, tgl,'5' as status from (select tgl from (select generate_series('".$row[3]."', '".$row[4]."', interval'1 day')::date as tgl EXCEPT (select tanggal_absensi from absen a inner join siswa c on a.id_users = c.id_users where c.nomor_induk_siswa = '$myid')) a EXCEPT (select tanggal_hari_libur from hari_libur)) a where EXTRACT(dow from a.tgl::timestamp) != 0 UNION select b.nama_siswa,tanggal_absensi, status_absen as status from absen a inner join siswa b on a.id_users = b.id_users WHERE status_absen != '1' and b.nomor_induk_siswa = '$myid'";
	$query = pg_query($sql);
?>
<h3><b><u>ABSENSI</u></b></h3>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>TANGGAL</th>
		<th>KETERANGAN</th>
	</tr>  
        <?php 
		while($row = pg_fetch_array($query)){
			if($row['status'] == '2'){ $status = "TERLAMBAT";}
			elseif($row['status'] == '3'){ $status = "SAKIT";}
			elseif($row['status'] == '4'){ $status = "IJIN";}
			else {$status = "TIDAK MASUK";}
			
			echo "<tr align='center'> 
				<td>".date('d-m-Y',strtotime($row['tgl']))."</td>
				<td>".$status."</td>
			</tr>";
		}
		?>
</table>
<?php
	$sql_spp = "select * from siswa a 
inner join spp b on a.nomor_induk_siswa = b.nomor_induk_siswa 
inner join bayar_spp c on b.id_spp = c.id_spp
inner join periode d on c.id_periode = d.id_periode
where a.nomor_induk_siswa = '$myid' and d.id_periode = $id_periode";
	$query_spp = pg_query($sql_spp);
?>
<h3><b><u>KEUANGAN</u></b></h3>
<h4>SPP LUNAS</h4>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>TANGGAL</th>
		<th>PERIODE</th>
		<th>BULAN</th>
	</tr>    
	
<?php while($row = pg_fetch_assoc($query_spp)){
	echo "<tr align='center'>
			<td>".$row['tanggal_bayar_spp']."</td>
			<td>".$row['tahun_periode']." Semester ".$row['periode_semester']."</td>
			<td>".date('F',strtotime('2000-'.$row['bulan_spp'].'-01'))."</td>
		</tr>";
}
?> 

</table>
<?php
	$sql_dsp = "select * from siswa a 
inner join dsp b on a.nomor_induk_siswa = b.nomor_induk_siswa 
inner join bayar_dsp c on b.id_dsp = c.id_dsp
where a.nomor_induk_siswa = '$myid'";
	$query_dsp = pg_query($sql_dsp);
?>
<h4>HISTORY PEMBAYARAN UANG GEDUNG</h4>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>NO</th>
        <th>RUPIAH</th>
		<th>TANGGAL</th>
	</tr>    
<?php 
$i = 1;
while($row = pg_fetch_assoc($query_dsp)){
	 
	echo "<tr align='center' >
			<td>".$i."</td>
			<td>".$row['jumlah_bayar_dsp']."</td>
			<td>".date('d F Y',strtotime($row['tanggal_bayar_dsp']))."</td>
	</tr>";
			$i++;
}
$sql_sisa_dsp = "select (jumlah_dsp - sum(jumlah_bayar_dsp)) as sisa from dsp a
inner join bayar_dsp b on a.id_dsp = b.id_dsp where nomor_induk_siswa = '$myid'
 group by jumlah_dsp, nomor_induk_siswa";
$query_sisa_dsp = pg_query($sql_sisa_dsp);
$row = pg_fetch_assoc($query_sisa_dsp);
?> 
    <tr >
	<th bgcolor="#CCCCCC">SISA</th>
    <th><?=$row['sisa']?></th>
    </tr>
</table>

<?php
	$sql_tahunan = "select * from siswa a 
inner join tahunan b on a.nomor_induk_siswa = b.nomor_induk_siswa 
inner join bayar_tahunan c on b.id_tahunan = c.id_tahunan
where a.nomor_induk_siswa = '$myid'";
	$query_tahunan = pg_query($sql_tahunan);
?>
<h4>HISTORY PEMBAYARAN UANG TAHUNAN</h4>
<table border="1" > 
	<tr bgcolor="#CCCCCC">
		<th>NO</th>
        <th>RUPIAH</th>
		<th>TANGGAL</th>
	</tr>    
<?php 
$i = 1;
while($row = pg_fetch_assoc($query_tahunan)){
	 
	echo "<tr align='center' >
			<td>".$i."</td>
			<td>".$row['jumlah_bayar_tahunan']."</td>
			<td>".date('d F Y',strtotime($row['tanggal_bayar_tahunan']))."</td>
	</tr>";
			$i++;
}
$sql_sisa_tahunan = "select (jumlah_tahunan - sum(jumlah_bayar_tahunan)) as sisa from tahunan a
inner join bayar_tahunan b on a.id_tahunan = b.id_tahunan where nomor_induk_siswa = '$myid'
 group by jumlah_tahunan, nomor_induk_siswa";
$query_sisa_tahunan = pg_query($sql_sisa_tahunan);
$row = pg_fetch_assoc($query_sisa_tahunan);
?> 
    <tr >
	<th bgcolor="#CCCCCC">SISA</th>
    <th><?=$row['sisa']?></th>
    </tr>
</table>

</div>
</div>
</body>
</html>
<?php
}else{
	echo "Wrong Username or Password"; 
}
?>