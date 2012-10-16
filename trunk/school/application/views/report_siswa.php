<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=rekap-absen");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");
?>
    <html>
			<head>
				<title>Rekap Absen</title>
				</head>
			<body>
			<table>
				<tr align="center"><th colspan="5">Rekap Absen</th></tr>
			</table>
			<table border="1">
				<tr>
					<th>Nomor Induk</th>
					<th>Nama</th>
					<th>Waktu Masuk</th>
					<th>Waktu Keluar</th>
					<th>Status</th>
					<th>Keterangan</th>
				</tr>
				
				<?php
foreach($kelas as $class){?>
				<tr>
					<td colspan="5"><b>Kelas : <?=$class->nama_kelas?></b></td>
				</tr>
<?php
foreach ($dates as $date) {
?>
				<tr>
					<td colspan="5">Tanggal : <?=$date->c?></td>
				</tr>
				<?php

	foreach ($rows as $item) {
		if ($item->tanggal_absensi == $date->c && $item->id_kelas == $class->id_kelas){
			switch ($item->status_absen) {
				case '1' :
					$ket = 'Masuk';
					break;
				case '2' :
					$ket = 'Terlambat';
					break;
				case '3' :
					$ket = 'Sakit';
					break;
				case '4' :
					$ket = 'Ijin';
					break;
			}
?>
				
				<tr>
					<td width="150"><? echo $item->nomor_induk_siswa ?></td>
					<td width="300"><? echo $item->nama_siswa ?></td>
					<td width="100"><? echo $item->waktu_masuk ?></td>
					<td width="100"><? echo $item->waktu_keluar ?></td>
					<td width="100"><? echo $ket ?></td>
					<td width="100"><? echo $item->keterangan_absen ?></td>
				</tr>
				
				<?}}}}?>
				</table>
	</table></body></html>
<?php

			session_write_close();
			exit;
?>
