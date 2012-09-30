		<?php if($result){ 
			$pesan = "Pesan telah berhasil dikirim";
			}else{
			$pesan = "Nomor induk tersebut belum terdaftar";
			}
		?>
		<!--  start message-yellow -->
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left"><?=$pesan?></td>
					<td class="yellow-right"><a class="close-yellow"><img src="/school/images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
		<!-- start id-form -->
		<form action="sent_single" method="post">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Kirim kepada :</th>
			<td><input name='no_induk' type="text" class="inp-form" /></td>
		</tr>
		<tr>
			<th valign="top">Isi Pesan :</th>
			<td><textarea rows="" cols="" class="form-textarea" name="msg"></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
				<input type="reset" value="" class="form-reset"  />
			</td>
			<td></td>
		</tr>
		</table>
		</form>		
		<!-- end id-form  -->		