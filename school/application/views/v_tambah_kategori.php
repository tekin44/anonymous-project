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
			<th valign="top">Nama Kategori:</th>
			<td><input type="text" class="inp-form" name="nama_kategori" value="<?=$nama?>" /></td>
		</tr>
		<input type="hidden" class="inp-form" name="id_kategori" value="<?=$id?>" />
		<input type="hidden" class="inp-form" name="flag" value="<?=$flag?>" />
		<tr>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td><a href="/school/c_kategori">Kembali</a></td>
		</tr>
		</table>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		