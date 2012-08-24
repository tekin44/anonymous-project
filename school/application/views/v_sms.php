				<!--  start message-yellow -->
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">Pesan terkirim dari tanggal a sampai b sebanyak 20</td>
					<td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Waktu Terkirim</a></th>
					<th class="table-header-repeat line-left"><a href="">Isi Pesan</a>	</th>
					<th class="table-header-repeat line-left"><a href="">No Tujuan</a></th>
					<th class="table-header-repeat line-left"><a href="">Status Pengiriman</a></th>
				</tr>
				<?php
					foreach($items as $item){
						if($item->flag==1)
							$status = "Belum Terkirim";
						else
							$status = "Terkirim";
				?>
				<tr>
					<td><?=$item->waktu_pengiriman?></td>
					<td><?=$item->isi_pesan?></td>
					<td><?=$item->no_tujuan?></td>
					<td><?=$status?></td>
				</tr>
				<?php
					}
				?>
				</table>
				<!--  end product-table................................... --> 
				</form>