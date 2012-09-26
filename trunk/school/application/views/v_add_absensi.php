		<!-- start id-form -->
		<form action="submit_absen" method="post">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">NIS :</th>
			<td><select name="no_induk" class="styledselect_form_1">
					<option value="0">-- NIS --</option>
				<?php foreach($rows as $row){ ?>
					<option value="<?=$row->nomor_induk_siswa?>"><?=$row->nomor_induk_siswa." - ".$row->nama_siswa?></option>
				<?php } ?>
				</select></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Alasan :</th>
			<td>
				<select name="status_absen" class="styledselect_form_1">
					<option value="3">Sakit</option>
					<option value="4">Ijin</option>
				</select>
			</td>
			<td></td>
		</tr>
		<tr>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td><a href="data_absensi_siswa">Kembali</a></td>
		</tr>
		</table>
		</form>		
		<!-- end id-form  -->		