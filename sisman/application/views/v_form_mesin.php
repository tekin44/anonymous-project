		<?php
			$id_mesin = $item[0]->id_mesin;
			$ip_address = $item[0]->ip_address;
			$port_mesin = $item[0]->port_mesin;
		?>
		<!-- start id-form -->
		<form action='/school/c_config/edit_mesin' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
			<tr>
				<th valign="top">Ip Address:</th>
				<td><input name='ip_address' type="text" class="inp-form" value="<?=$ip_address?>" /></td>
			</tr>
			<tr>
				<th valign="top">Port:</th>
				<td><input name='port_mesin' type="text" class="inp-form" value="<?=$port_mesin?>" /></td>
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
		<input name="id_mesin" type="hidden" value="<?=$id_mesin?>"/>
		</form>
		<!-- end id-form  -->