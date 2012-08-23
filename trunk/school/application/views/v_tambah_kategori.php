		<!--  start step-holder -->

		<!--  end step-holder -->
		<?php echo form_open('c_kategori/tambahKategori'); ?>
		<!-- start id-form -->
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">ID Kategori:</th>
			<td><? echo form_input('id_kategori', ''); ?></td>
		</tr>
		
		<tr>
			<th valign="top">Nama Kategori:</th>
			<td><? echo form_input('nama_kategori', ''); ?></td>
		</tr>

		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<?php echo form_submit('submit', 'tambah'); ?> 
			</td>
			<td></td>
		</tr>
		</table>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		