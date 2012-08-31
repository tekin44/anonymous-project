		<?php
			$disable = $flag==2?"readonly='readonly'":'';
			$no_induk = $flag==2?$staff[0]->no_induk:'';
			$nama_person = $flag==2?$staff[0]->nama_person:'';
			$tipe_staff = $flag==2?$staff[0]->tipe_staff:'';
			$selected1 = $tipe_staff==1?"selected='selected'":'';
			$selected2 = $tipe_staff==2?"selected='selected'":'';
		?>
		<!-- start id-form -->
		<form action='/school/c_master_data/edit_staff' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">No Induk:</th>
			<td><select name="no_induk" class="styledselect_form_1">
				<option value="">Pilih ID</option>
				<?php foreach($row as $item) {?>
					<option value="<?=$item->no_induk?>"><?=$item->no_induk?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<th valign="top">Nama:</th>
			<td><input name='nama_person' type="text" class="inp-form" value="<?=$nama_person?>" /></td>
		</tr>
		<tr>
			<th valign="top">Tipe:</th>
			<td><select name="tipe_staff" class="styledselect_form_1">
			<option <?=$selected2?> value="2">Staff</option>
			<option <?=$selected1?> value="1">Guru</option></select></td>
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