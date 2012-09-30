		<!--  start step-holder -->

		<!--  end step-holder -->
		<!-- start id-form -->
		<?php echo form_open('c_admin/updateUser'); ?>
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Username :</th>
			<td><input name='admin_username1' type="text" class="inp-form" value="<?=$admin?>" /></td>
		</tr>
		<tr>
			<th valign="top">Password :</th>
			<td><input name='admin_password' type="password" class="inp-form" /></td>
		</tr>
		<input name='admin_username2' type="hidden" class="inp-form" value="<?=$admin?>" />
		<tr>
			<th colspan="2">Menu yang dapat diakses :</th>
		</tr>
		</table>
			<table border="0" width="30%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left"><a href="">Nama Menu</a></th>
				</tr>
				<?php foreach($menu as $item){
						if($item->check)
							$checked = "checked";
						else
							$checked = ""; ?>
				<tr>
					<td><input name="id_menu[]" <?=$checked?> type="checkbox" value="<?=$item->id_menu?>"/></th>
					<td><?=$item->nama_menu?></td>
				</tr>
				<?php } ?>
			</table>
		<table>
		<tr>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td>
				<a href="/school/c_admin">Kembali</a>
			</td>
		</tr>
		</table>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		