		<!--  start step-holder -->

		<!--  end step-holder -->
		<!-- start id-form -->
		<?php echo form_open('c_admin/updateMenu'); ?>
		
		<?php foreach ($rows as $row){?>
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">ID Menu :</th>
			<td><? echo form_input('id_menu', $row->id_menu); ?></td>
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
			<td><? echo form_input('nama_menu', $row->nama_menu); ?></td>
		</tr>
		<tr>
			<th valign="top">Action Menu :</th>
			<td><? echo form_input('action_menu', $row->action_menu); ?></td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<?php echo form_submit('submit', 'update'); ?> 
			</td>
			<td></td>
		</tr>
		</table>
		<?}?>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		