<!--  start message-yellow -->
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="/school/images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red -->
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error. <a href="">Please try again.</a></td>
					<td class="red-right"><a class="close-red"><img src="/school/images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-red -->
				
				<!--  start message-blue -->
				<div id="message-blue">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="/school/images/table/icon_close_blue.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-blue -->
			
				<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">Product added sucessfully. <a href="">Add new one.</a></td>
					<td class="green-right"><a class="close-green"><img src="/school/images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-green -->
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">No. Absensi</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nomor Induk</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Masuk</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Keluar</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				
				<?php foreach ($rows as $item){?>
				
				<tr class="alternate-row">
					<td><? echo $item->no_absensi ?></td>
					<td><? echo $item->no_induk ?></td>
					<td><? echo $item->nama_person ?></td>
					<td><? echo $item->waktu_masuk ?></td>
					<td><? echo $item->waktu_keluar ?></td>
					<td><?php echo "<a href=".base_url()."c_absensi/editAbsensi/$item->no_absensi ' style=\"text-decoration: none;\" >";?>edit</a></td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>