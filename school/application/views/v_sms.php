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
					<th class="table-header-repeat line-left"><a href="">No Tujuan</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Text</a></th>
					<th class="table-header-repeat line-left"><a href="">Pengirim</a></th>
				</tr>
				<?php foreach($items as $item){ ?>
				<tr>
					<td><?=$item['DestinationNumber']?></td>
					<td><?=$item['TextDecode']?></td>
					<td><?=$item['CreatorID']?></td>
				</tr>
				<?php } ?>
				</table>
				<!--  end product-table................................... --> 
				</form>