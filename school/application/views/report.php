<?php
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=rekap-absen-$tanggal");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Pragma: public");
?>
    <html>
			<head>
				<title>Rekap Absen <?=$tanggal?></title>
				</head>
			<body>
			<table>
				<tr align="center"><th colspan="7">Rekap Absen <?=$tanggal?></th></tr>
			</table>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">No.</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Nomor Induk</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nama</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Masuk</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Keluar</a></th>
					<th class="table-header-repeat line-left"><a href="">Keterangan</a></th>
				</tr>
				
				<?php					
					$i = 0;
					foreach ($rows as $item) {
						switch($item->status_absen){
							case '1':$ket = 'Masuk';break;
							case '2':$ket = 'Terlambat';break;
							case '3':$ket = 'Sakit';break;
							case '4':$ket = 'Ijin';break;
						}
				?>
				
				<tr>
					<td><? echo ++$i; ?></td>
					<td><? echo $item->no_induk ?></td>
					<td><? echo $item->nama_person ?></td>
					<td><? echo $item->waktu_masuk ?></td>
					<td><? echo $item->waktu_keluar ?></td>
					<td><? echo $ket ?></td>
				</tr>
				
				<?}?>
				</table>
	</table></body></html>
<?php
	session_write_close();
    exit;   
?>
