		<!-- start id-form -->
		<form action="submit_absen" method="post">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">NIS :</th>
			<td><select name="no_induk" class="styledselect_form_1">
				<?php foreach($rows as $row){ ?>
					<option value="<?=$row->no_induk?>"><?=$row->no_induk." - ".$row->nama_person?></option>
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