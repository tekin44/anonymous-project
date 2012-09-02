		<!--  start step-holder -->
		<?php
			$id = $flag=='2'?$row[0]->id_kategori:'';
			$nama = $flag=='2'?$row[0]->nama_kategori:'';
		?>
		<!--  end step-holder -->
		<?php echo form_open('c_kategori/tambahKategori'); ?>
		<!-- start id-form -->
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">ID Kategori:</th>
			<td><input type="text" class="text" name="id_kategori" value="<?=$id?>" /></td>
		</tr>
		
		<tr>
			<th valign="top">Nama Kategori:</th>
			<td><input type="text" class="text" name="nama_kategori" value="<?=$nama?>" /></td>
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