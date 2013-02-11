		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<td>
				<a href="/school/c_kategori">Kembali</a>
			</td>
		</tr>
		<tr>
			<th valign="top">Kategori:</th>
			<td><?=$rows[0]->nama_kategori?></td>
		</tr>
		<tr>
			<th valign="top">Siswa :</th>
		</tr>
		</table>
		<table border="0" width="70%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">NIS</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Siswa</a></th>
					<th class="table-header-repeat line-left"><a href="">Action</a></th>
				</tr>
			<?php foreach($rows as $pe){ 
				if($pe->nomor_induk_siswa){?>
		<tr>
			<td><?=$pe->nomor_induk_siswa?></td>
			<td><?=$pe->nama_siswa?></td>
			<td><a href="/school/c_kategori/delete_siswa_from_kategori/<?=$pe->nomor_induk_siswa?>/<?=$pe->id_kategori?>" title='Delete' class='icon-2 info-tooltip'></a></td>
		</tr>
			<?php }} ?>
		</table>
		<!-- end id-form  -->
		
