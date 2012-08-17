
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nomor Induk</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama</a></th>
				</tr>
				
				<?php foreach ($rows as $item){?>
				
				<tr class="alternate-row">
					<td><? echo $item->no_induk ?></td>
					<td><? echo $item->nama_person ?></td>
					</tr>
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>