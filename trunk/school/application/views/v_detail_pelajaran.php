		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<td>
				<a href="/school/c_master_data/show_pelajaran">Kembali</a>
			</td>
		</tr>
		<tr>
			<th valign="top">Kode Pelajaran:</th>
			<td><?=$rows[0]['kode_pelajaran']?></td>
		</tr>
		<tr>
			<th valign="top">Nama Pelajaran:</th>
			<td><?=$rows[0]['nama_pelajaran']?></td>
		</tr>
		<tr>
			<th valign="top">Pengajar:</th>
		</tr>
		</table>
		<table border="0" width="70%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">NIP</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Pengajar</a></th>
					<th class="table-header-repeat line-left"><a href="">Action</a></th>
				</tr>
			<?php foreach($rows as $pe){ ?>
		<tr>
			<td><?=$pe['nomor_induk_pengajar']?></td>
			<td><?=$pe['nama_pengajar']?></td>
			<td><a href="/school/c_master_data/delete_guru_mata_pelajaran/<?=$pe['nomor_induk_pengajar']?>/<?=$rows[0]['kode_pelajaran']?>" title='Delete' class='icon-2 info-tooltip'></a></td>
		</tr>
			<?php } ?>
		</table>
		<!-- end id-form  -->
		
