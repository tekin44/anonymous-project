		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<td>
				<a href="/school/c_master_data/show_kelas">Kembali</a>
			</td>
		</tr>
		<tr>
			<th valign="top">Kelas:</th>
			<td><?=$rows[0]->nama_kelas?></td>
		</tr>
		<tr>
			<th valign="top">Pengajar:</th>
		</tr>
		</table>
		<table border="0" width="70%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">NIP</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Pengajar</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Pelajaran</a></th>
					<th class="table-header-repeat line-left"><a href="">Nilai Kelulusan</a></th>
				</tr>
			<?php foreach($pes as $pe){ ?>
		<tr>
			<td><?=$pe->nomor_induk_pengajar?></td>
			<td><?=$pe->nama_pengajar?></td>
			<td><?=$pe->nama_pelajaran?></td>
			<td><?=$pe->nilai_kelulusan?></td>
		</tr>
			<?php } ?>
		</table>
		<!-- end id-form  -->
		
