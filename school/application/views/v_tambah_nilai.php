		<?php
			$nis = $rows;
		?>
		<!-- start id-form -->
		<form action='/school/c_nilai/submit_nilai' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>
			<th valign="top">Nomor Induk Siswa:</th>
			<td><input name='nis' type="text" class="inp-form" readonly="readonly" value="<?=$nis?>" /></td>
		</tr>
		<tr>
			<th valign="top">ID Kelas:</th>
			<td><input name='id_kelas' type="text" class="inp-form" value="" /></td>
		</tr>
		<tr>
			<th valign="top">Nomor Induk Pengajar:</th>
			<td><input name='nip' type="text" class="inp-form" value="" /></td>
		</tr>
		<tr>
			<th valign="top">Nilai:</th>
			<td><input name='nilai' type="text" class="inp-form" value="" /></td>
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
		
