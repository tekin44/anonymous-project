		<!--  start step-holder -->

		<!--  end step-holder -->
		<?php echo form_open('c_kategori/tambahKategoriSiswa'); ?>
		<!-- start id-form -->
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Nomor Induk Siswa:</th>
			<td><? echo form_input('nomor_induk', ''); ?></td>
		</tr>
		
		<tr>
			<th valign="top">Termasuk Dalam Kategori:</th>
			<td>
				<?php
					$dropdown = array();
					foreach($rows_kategori as $item) 
					{
					$dropdown[$item->id_kategori] = $item->nama_kategori;
					}

					echo form_dropdown('id_kategori', $dropdown); 
				?>
			</td>
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