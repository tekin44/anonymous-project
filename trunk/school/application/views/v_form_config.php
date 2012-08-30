		<?php
			$msg_tidak_masuk = $item[0]->msg_tidak_masuk;
			$msg_telat = $item[0]->msg_telat;
		?>
		<!-- start id-form -->
		<form action='/school/c_config/edit_config' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Pesan Telat:</th>
			<td><textarea name="msg_telat" rows="" cols="" class="form-textarea"><?=$msg_telat?></textarea></td>
		</tr>
		<tr>
			<th valign="top">Pesan Alfa:</th>
			<td><textarea name="msg_tidak_masuk" rows="" cols="" class="form-textarea"><?=$msg_tidak_masuk?></textarea></td>
		</tr>
		</table>
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td></td>
		</tr>
		</form>
		<!-- end id-form  -->