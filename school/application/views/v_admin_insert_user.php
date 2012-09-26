		<!--  start step-holder -->

		<!--  end step-holder -->
		<!-- start id-form -->
		<?php echo form_open('c_admin/insertUser'); ?>
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Username :</th>
			<td><? echo form_input('admin_username', ''); ?></td>
		</tr>
		<tr>
			<th valign="top">Password :</th>
			<td><? echo form_input('admin_password', ''); ?></td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<?php echo form_submit('submit', 'Add'); ?> 
			</td>
			<td></td>
		</tr>
		</table>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		