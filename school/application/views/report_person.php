<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=rekap-absen");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");
?>
    <html>
			<head>
				<title>Laporan Keuangan</title>
				</head>
			<body>
			<table>
				<tr align="center"><th colspan="18">Laporan Keuangan</th></tr>
			</table>
			<table border="1">
				<tr>
					<td rowspan='2'>Nomor Induk</td>
					<td rowspan='2'>Nama</td>
					<td rowspan='2'>DSP</td>
					<td rowspan='2'>Tahunan</td>
					<td rowspan='2'>Sisa DSP</td>
					<td rowspan='2'>Sisa Tahunan</td>
					<td colspan="12">SPP</td>
				</tr>
				<tr>
					<?php for($i=1;$i<=12;$i++){
						echo "<td>$i</td>";
					}
					?>
				</tr>
				
				<?php
foreach($kelas as $class){?>
				<tr>
					<td colspan="18"><b>Kelas : <?=$class->nama_kelas?></b></td>
				</tr>
				<?php

	foreach ($siswa as $item) {
		if($class->id_kelas == $item->id_kelas){
?>
				
				<tr>
					<td width="150"><?=$item->nomor_induk_siswa ?></td>
					<td width="300"><?=$item->nama_siswa ?></td>
					<td width="100"><?=$item->dsp ?></td>
					<td width="100"><?=$item->tahunan ?></td>
					<td width="100"><?=$item->sisa_dsp ?></td>
					<td width="100"><?=$item->sisa_tahunan ?></td>
					<?php
					for($i=1;$i<=12;$i++){
						echo "<td width='20'>";
						foreach($spp as $row){
							if($row->nomor_induk_siswa==$item->nomor_induk_siswa && $row->bulan_spp == $i)
								echo "x";
							else
								echo " ";								
						}
						echo "</td>";
					}
					?>
				</tr>
				
				<?}}}?>
				</table>
	</table></body></html>
<?php

			session_write_close();
			exit;
?>
