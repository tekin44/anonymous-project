		<?php
			$disable = $flag==2?"readonly='readonly'":'';
			$no_induk = $flag==2?$siswa[0]->no_induk:'';
			$nama_person = $flag==2?$siswa[0]->nama_person:'';
			$alamat_siswa = $flag==2?$siswa[0]->alamat_siswa:'';
			$nama_orang_tua = $flag==2?$siswa[0]->nama_orang_tua:'';
			$no_hp_siswa = $flag==2?$siswa[0]->no_hp_siswa:'';
			$no_hp_orang_tua = $flag==2?$siswa[0]->no_hp_orang_tua:'';
			$email_siswa = $flag==2?$siswa[0]->email_siswa:'';
			$password = $flag==2?'********':'';
		?>
		<!-- start id-form -->
		<form action='/school/c_master_data/edit_siswa' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">No Induk:</th>
			<td>
				<input name='no_induk' <?=$disable?> type="text" class="inp-form" value="<?=$no_induk?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Nama Siswa:</th>
			<td><input name='nama_person' type="text" class="inp-form" value="<?=$nama_person?>" /></td>
		</tr>
		<tr>
			<th valign="top">Alamat Siswa:</th>
			<td><textarea name="alamat_siswa" rows="" cols="" class="form-textarea"><?=$alamat_siswa?></textarea></td>
		</tr>
		<tr>
			<th valign="top">Nama Orang Tua:</th>
			<td><input name='nama_orang_tua' type="text" class="inp-form" value="<?=$nama_orang_tua?>" /></td>
		</tr>
		<tr>
			<th valign="top">No Hp Siswa:</th>
			<td><input name='no_hp_siswa' type="text" class="inp-form" value="<?=$no_hp_siswa?>" /></td>
		</tr>
		<tr>
			<th valign="top">No Hp Orang Tua:</th>
			<td><input name='no_hp_orang_tua' type="text" class="inp-form" value="<?=$no_hp_orang_tua?>" /></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td><input name='email_siswa' type="text" class="inp-form" value="<?=$email_siswa?>" /></td>
		</tr>
		<tr>
			<th valign="top">Password:</th>
			<td><input name='password' <?=$disable?> type="password" class="inp-form"  value="<?=$password?>" /></td>
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
		<input name="flag" type="hidden" value="<?=$flag?>"/>
		</form>
		<!-- end id-form  -->