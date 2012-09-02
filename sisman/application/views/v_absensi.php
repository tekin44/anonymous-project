										Tanggal : 
					<?php echo $tanggal ?>
					<?php echo form_open('index_absensi'); ?>
					<?php					
					$dropdown = array ();
					foreach ($rows_tanggal as $item) {
						$dropdown[$item->tanggal_absensi] = $item->tanggal_absensi;
					}

					echo form_dropdown('date', $dropdown, 'CURRENT_TIMESTAMP');
?>

					<?php echo form_submit('submit', 'cari'); ?> 
					<?php echo form_close(); ?>	
					<br><br><br>
					

				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">No.</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Nomor Induk</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nama</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Masuk</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Keluar</a></th>
					<th class="table-header-repeat line-left"><a href="">Keterangan</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
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
				
				<tr class="alternate-row">
					<td><? echo ++$i; ?></td>
					<td><? echo $item->no_induk ?></td>
					<td><? echo $item->nama_person ?></td>
					<td><? echo $item->waktu_masuk ?></td>
					<td><? echo $item->waktu_keluar ?></td>
					<td><? echo $ket ?></td>
					<td>
					<?="<a href='" . base_url() . "c_absensi/editAbsensi/$item->no_absensi' title='Edit' class='icon-1 info-tooltip'>"?></a>
					</td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>		
				
				<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->			