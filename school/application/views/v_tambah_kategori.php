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
		</table>
		
		<table border="0" width="50%" cellpadding="0" cellspacing="0" id="product-table">
			<tr>
				<th class="table-header-repeat line-left"><a href="">&nbsp</a></th>
				<th class="table-header-repeat line-left"><a href="">Nomor Induk</a></th>
				<th class="table-header-repeat line-left"><a href="">Nama Siswa</a></th>
			</tr>
			<?php foreach($siswa as $pe){ ?>
			<tr>
				<td><input name="nis[]" type="checkbox" value="<?=$pe->nomor_induk_siswa?>"/></th>
				<td><?=$pe->nomor_induk_siswa?></td>
				<td><?=$pe->nama_siswa?></td>
			</tr>
			<?php } ?>
		</table>
		
		<table border="0" cellpadding="0" cellspacing="0">		
		<tr>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td><a href="/school/c_kategori">Kembali</a></td>
		</tr>
		</table>
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		