		<!--  start step-holder -->

		<!--  end step-holder -->
		<!-- start id-form -->
		<?php echo form_open('c_admin/updateUser'); ?>
		
		<?php foreach ($rows as $item){?>
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">No. Induk :</th>
			<td><? echo form_input('no_induk', $item->no_induk); ?></td>
		</tr>
		<tr>
			<th valign="top">Previlege :</th>
			<td><? echo form_input('id_prev', $item->id_prev); ?></td>
		</tr>
		<tr>
			<th valign="top">Password :</th>
			<td><? echo form_input('user_pass', $item->user_pass); ?></td>
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