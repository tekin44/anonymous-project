		<?php
			$id_kelas = $rows[0]->id_kelas;
			$nama_kelas = $rows[0]->nama_kelas;
		?>
		<!-- start id-form -->
		<form action='/school/c_master_data/update_kelas' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>
			<th valign="top">ID Kelas:</th>
			<td><input name='id_kelas' type="text" class="inp-form" readonly="readonly" value="<?=$id_kelas?>" /></td>
		</tr>
		<tr>
			<th valign="top">Nama Kelas:</th>
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
		</form>
		<!-- end id-form  -->
		
