		<?php
			$nis = $rows[0]->nomor_induk_siswa;
			$id_kelas = $rows[0]->id_kelas;
			$nip = $rows[0]->nomor_induk_pengajar;
			$nilai = $rows[0]->nilai_raport;
		?>
		<!-- start id-form -->
		<form action='/school/c_nilai/update_nilai' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>
			<th valign="top">Nomor Induk Siswa:</th>
			<td><input name='nis' type="text" class="inp-form" readonly="readonly" value="<?=$nis?>" /></td>
		</tr>
		<tr>
			<th valign="top">ID Kelas:</th>
			<td><input name='id_kelas' type="text" class="inp-form" value="<?=$id_kelas?>" /></td>
		</tr>
		<tr>
			<th valign="top">Nomor Induk Pengajar:</th>
			<td><input name='nip' type="text" class="inp-form" value="<?=$nip?>" /></td>
		</tr>
		<tr>
			<th valign="top">Nilai:</th>
			<td><input name='nilai' type="text" class="inp-form" value="<?=$nilai?>" /></td>
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
		</form>
		<!-- end id-form  -->
		
