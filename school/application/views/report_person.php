<?php
	$date = date('d-m-Y');
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=rekap-absen-$date");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Pragma: public");
?>
    <html>
			<head>
				<title>Rekap Absen <?=$date?></title>
				</head>
			<body>
			<table>
				<tr align="center"><th colspan="7">Rekap Absen <?=$date?></th></tr>
			</table>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">No.</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Nomor Induk</a></th>
					<th class="table-header-repeat line-left minwidth-1">Nama</a></th>W
				</tr>
				
				<?php					
					$i = 0;
					foreach ($rows as $item) {
				?>
				
				<tr>
					<td><? echo ++$i; ?></td>
					<td><? echo $item->no_induk ?></td>
					<td><? echo $item->nama_person ?></td>
				</tr>
				
				<?}?>
				</table>
	</table></body></html>
<?php
	session_write_close();
    exit;   
?>
