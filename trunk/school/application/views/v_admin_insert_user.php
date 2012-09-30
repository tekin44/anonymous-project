		<?php echo form_open('c_admin/insertUser'); ?>
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Username :</th>
			<td><input type="text" class="inp-form" name="admin_username" /></td>
		</tr>
		<tr>
			<th valign="top">Password :</th>
			<td><input type="password" class="inp-form" name="admin_password" /></td>
		</tr>
		<tr>
			<th colspan="2">Menu yang dapat diakses :</th>
		</tr>
		</table>
			<table border="0" width="30%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left"><a href="">Nama Menu</a></th>
				</tr>
				<?php foreach($menu as $item){ ?>
				<tr>
					<td><input name="id_menu[]" type="checkbox" value="<?=$item->id_menu?>"/></th>
					<td><?=$item->nama_menu?></td>
				</tr>
				<?php } ?>
			</table>
		<table>
		<tr>
			<td valign="top">
				<input type="submit" class="form-submit" value="value" />
			</td>
			<td><a href="/school/c_admin/index">Kembali</a></td>
		</tr>
		</table>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		