		<?php
			$pesan_absen = $item[0]->pesan_absen;
			$pesan_telat = $item[0]->pesan_telat;
			$no_kepsek = $item[0]->no_kepsek;
			$no_kepsek_2 = $item[0]->no_kepsek;
		?>
		<!-- start id-form -->
		<form action='/school/c_config/edit_config' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Pesan Telat:</th>
			<td><textarea name="msg_telat" rows="" cols="" class="form-textarea"><?=$pesan_telat?></textarea></td>
		</tr>
		<tr>
			<th valign="top">Pesan Alfa:</th>
			<td><textarea name="msg_tidak_masuk" rows="" cols="" class="form-textarea"><?=$pesan_absen?></textarea></td>
		</tr>
				<tr>					
					<th valign="top">No HP ke-1 Kepala Sekolah</a></th>
					<td><input name='no_kepsek' type="text" class="inp-form" value="<?=$no_kepsek?>" /></td>
				</tr>	
				<tr>					
					<th valign="top">No HP ke-2 Kepala Sekolah </a></th>
					<td><input name='no_kepsek_2' type="text" class="inp-form" value="<?=$no_kepsek_2?>" /></td>
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