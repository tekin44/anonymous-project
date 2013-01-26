		<?php
			$kode_pelajaran = isset($rows[0]->kode_pelajaran)?$rows[0]->kode_pelajaran:'';
			$nama_pelajaran = isset($rows[0]->nama_pelajaran)?$rows[0]->nama_pelajaran:'';
		?>
		<!-- start id-form -->
		<form action='/school/c_master_data/submit_pelajaran' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>
			<th valign="top">ID Pelajaran:</th>
			<td><input name='kode_pelajaran' type="text" class="inp-form" value="<?=$kode_pelajaran?>" /></td>
		</tr>
		<tr>
			<th valign="top">Nama Pelajaran:</th>
			<td><input name='nama_pelajaran' type="text" class="inp-form" value="<?=$nama_pelajaran?>" /></td>
		</tr>
		<table border="0" width="50%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">&nbsp</a></th>
					<th class="table-header-repeat line-left"><a href="">NIP</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Pengajar</a></th>
					
				</tr>
			<?php foreach($guru as $pe){ ?>
		<tr>
			<td><input name="nip[]" type="checkbox" value="<?=$pe->nomor_induk_pengajar?>"/></th>
			<td><?=$pe->nomor_induk_pengajar?></td>
			<td><?=$pe->nama_pengajar?></td>
			<input type='hidden' name='flag' value='<?=$flag?>' />
		</tr>
			<?php } ?>
		</table>
		
		<table>
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
				<input type="reset" value="" class="form-reset"  />
			</td>
			<td></td>
		</tr>
		</table>
		</form>
		<!-- end id-form  -->
		
