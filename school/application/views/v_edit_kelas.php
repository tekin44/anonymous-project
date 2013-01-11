		<?php
			$id_kelas = $rows[0]->id_kelas;
			$nama_kelas = $rows[0]->nama_kelas;
		?>
		<!-- start id-form -->
		<form action='/school/c_master_data/update_kelas' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Kelas:</th>
			<td><input name='nama_kelas' type="text" class="inp-form" value="<?=$nama_kelas?>" /></td>
		</tr>
		<tr>
			<th valign="top">Pengajar:</th>
		</tr>
		</table>
		<table border="0" width="50%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">&nbsp</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Pengajar</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Pelajaran</a></th>
					<th class="table-header-repeat line-left"><a href="">Nilai Kelulusan</a></th>
				</tr>
			<?php foreach($pes as $pe){ ?>
		<tr>
			<td><input name="nip[]" type="checkbox" value="<?=$pe->nomor_induk_pengajar?>"/></th>
			<td><?=$pe->nama_pengajar?></td>
			<td><?=$pe->nama_pelajaran?></td>
			<td><input name='nilai[]' type="text" class="inp-nilai" /></td>
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