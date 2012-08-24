		<!--  start step-holder -->

		<!--  end step-holder -->
		<!-- start id-form -->
		<?php echo form_open('c_admin/insertMenu'); ?>
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">ID Menu :</th>
			<td><? echo form_input('id_menu', ''); ?></td>
		</tr>
		<tr>
			<th valign="top">ID Previlege :</th>
			<td><?
				foreach($rows_prev as $item) 
				{
				$dropdown[$item->id_prev] = $item->id_prev;
				}

				echo form_dropdown('id_prev', $dropdown); 
				?>
			
			</td>
		</tr>
		<tr>
			<th valign="top">Parent Menu :</th>
			<td><? 
				$dropdowns[0] = "No Parent";
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
			<th>&nbsp;</th>
			
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
				<input type="reset" value="" class="form-reset"  />
			</td>
			<td></td>
		</tr>
		</table>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		