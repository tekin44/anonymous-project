		<?php
		
			$id_kelas = $rows[0]->id_kelas;
			$nama_kelas = $rows[0]->nama_kelas;
			
			// $disable = $flag==2?"readonly='readonly'":'';
			// $id_users = $flag==2?$siswa[0]->id_users:'';
			// $nomor_induk_siswa = $flag==2?$siswa[0]->nomor_induk_siswa:'';
			// $nama_siswa = $flag==2?$siswa[0]->nama_siswa:'';
			// $alamat_siswa = $flag==2?$siswa[0]->alamat_siswa:'';
			// $nama_orang_tua = $flag==2?$siswa[0]->nama_orang_tua:'';
			// $no_hp_siswa = $flag==2?$siswa[0]->no_hp_siswa:'';
			// $no_hp_orang_tua = $flag==2?$siswa[0]->no_hp_orang_tua:'';
			// $email_siswa = $flag==2?$siswa[0]->email_siswa:'';
		?>
		<!-- start id-form -->
		<form action='/school/c_master_data/submit' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>
			<th valign="top">NIS:</th>
			<td><input name='id_kelas' type="text" class="inp-form" value="<?=$id_kelas?>" /></td>
		</tr>
		<tr>
			<th valign="top">Nama Siswa:</th>
			<td><input name='nama_kelas' type="text" class="inp-form" value="<?=$nama_kelas?>" /></td>
		</tr>
		
		<table>
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
		
