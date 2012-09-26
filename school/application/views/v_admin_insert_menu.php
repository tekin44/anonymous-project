		<!--  start step-holder -->

		<!--  end step-holder -->
		<!-- start id-form -->
		<?php echo form_open('c_admin/insertMenu'); ?>
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Parent Menu :</th>
			<td><? 
				$dropdowns["no"] = "No Parent";
				foreach($rows_menu as $items) 
				{
				$dropdowns[$items->id_menu] = $items->nama_menu;
				}

				echo form_dropdown('men_id_menu', $dropdowns); 
				?>
			</td>
		</tr>
		<tr>
			<th valign="top">Nama Menu :</th>
			<td><? echo form_input('nama_menu', ''); ?></td>
		</tr>
		<tr>
			<th valign="top">Action Menu :</th>
			<td><? echo form_input('action_menu', ''); ?></td>
		</tr>
		<tr>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td><a href="/school/c_admin/indexMenu">Kembali</a></td>
		</tr>
		</table>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		