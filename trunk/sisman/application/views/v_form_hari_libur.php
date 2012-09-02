		<?php
			$disable = $flag==2?"readonly='readonly'":'';
			$id_hari_libur = $flag==2?$item[0]->id_hari_libur:'';
			$ket_hari_libur = $flag==2?$item[0]->ket_hari_libur:'';
		?>
		<!-- start id-form -->
		<form action='/school/c_config/edit_hari_libur' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Tanggal:</th>
			<td><table border="0" cellpadding="0" cellspacing="0">
			<tr  valign="top">
				<td>
				<select name="d" id="d" class="styledselect-day">
					<?=$d?>
				</select>
				</td>
				<td>
					<select name="m" id="m" class="styledselect-month">
					<?=$m?>
					</select>
				</td>
				<td>
					<select name="y" id="y"  class="styledselect-year">
					<?=$y?>
					</select>
				</td>
				<td><a href=""  id="date-pick"><img src="/school/images/forms/icon_calendar.jpg"   alt="" /></a></td>
			</tr>
			</table></td>
		</tr>
		<tr>
			<th valign="top">Keterangan:</th>
			<td><input name='ket_hari_libur' type="text" class="inp-form" value="<?=$ket_hari_libur?>" /></td>
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
		<input name="id_hari_libur" type="hidden" value="<?=$id_hari_libur?>"/>
		</form>
		<!-- end id-form  -->