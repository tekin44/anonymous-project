		<!--  start step-holder -->

		<!--  end step-holder -->
		<!-- start id-form -->
		<?php echo form_open('c_admin/updateUser'); ?>
		
		<?php foreach ($rows as $item){?>
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Username :</th>
			<td><input name='admin_username1' type="text" class="inp-form" value="<?=$item->admin_username?>" /></td>
		</tr>
		<tr>
			<th valign="top">Password :</th>
			<td><input name='admin_password' type="password" class="inp-form" /></td>
		</tr>
		<input name='admin_username2' type="hidden" class="inp-form" value="<?=$item->admin_username?>" />
		<tr>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td>
				<a href="/school/c_admin">Kembali</a>
			</td>
		</tr>
		</table>
		<?}?>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		