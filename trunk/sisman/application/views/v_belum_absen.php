					Tanggal : 
					<?php echo $tanggal ?>
					<?php echo form_open('c_absensi/displayBelumAbsen'); ?>
					<?php
					$dropdown = array();
					foreach($rows_tanggal as $item) 
					{
					$dropdown[$item->tanggal_absensi] = $item->tanggal_absensi;
					}
					echo form_dropdown('date_belum', $dropdown, 'CURRENT_TIMESTAMP'); 
					?>

					<?php echo form_submit('submit', 'cari'); ?> 
					<?php echo form_close(); ?>	
					<br><br><br>
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">NO</a></th>
					<th class="table-header-repeat line-left"><a href="">Nomor Induk</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nama</a></th>
				</tr>
				
				<?php 
				$i = 0;
				foreach ($rows as $item){?>
				
				<tr class="alternate-row">
					<td><? echo ++$i; ?></td>
					<td><? echo $item->no_induk ?></td>
					<td><? echo $item->nama_person ?></td>
					</tr>
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>