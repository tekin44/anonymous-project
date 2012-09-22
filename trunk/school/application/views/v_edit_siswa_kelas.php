		<?php
			$id_kelas = $kelas[0]->id_kelas;
			$nama_kelas = $kelas[0]->nama_kelas;
		?>
		<!-- start id-form -->
		<form action='/school/c_master_data/update_siswa_kelas' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Kelas:</th>
			<td><input name='nama_kelas' type="text" class="inp-form" readonly value="<?=$nama_kelas?>" /></td>
			<input name='id_kelas' type="hidden" value="<?=$id_kelas?>" />
		</tr>
		<tr>
			<th valign="top">Siswa:</th>
		</tr>
		</table>
		<table border="0" width="50%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">&nbsp</a></th>
					<th class="table-header-repeat line-left"><a href="">Nomor Induk</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Siswa</a></th>
				</tr>
			<?php foreach($siswa as $pe){ 
					$check = "";
					if($pe->checked) $check = "checked";
				?>
		<tr>
			<td><input name="nip[]" <?=$check?> type="checkbox" value="<?=$pe->nomor_induk_siswa?>"/></th>
			<td><?=$pe->nomor_induk_siswa?></td>
			<td><?=$pe->nama_siswa?></td>
		</tr>
			<?php } ?>
		</table>
		
		<table>
		<tr>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
				<input type="hidden" value="<?=$id_kelas?>" name="id_kelas"/>
			</td>
			<td>
				<a href="/school/c_master_data/show_kelas">Kembali</a>
			</td>
		</tr>
		</table>
		
		</form>
		<!-- end id-form  -->