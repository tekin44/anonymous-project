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
					<th class="table-header-repeat line-left"><a href="">Action</a></th>
				</tr>
			<?php foreach($pes as $pe){ ?>
		<tr>
			<td><?=$pe->nomor_induk_pengajar?></td>
			<td><?=$pe->nama_pengajar?></td>
			<td><?=$pe->nama_pelajaran?></td>
			<td><?=$pe->nilai_kelulusan?></td>
			<td><a href="/school/c_master_data/delete_pengajar_from_kelas/<?=$pe->nomor_induk_pengajar?>/<?=$rows[0]->id_kelas?>" title='Delete' class='icon-2 info-tooltip'></a></td>
		</tr>
			<?php } ?>
		</table>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Siswa:</th>
		</tr>
		</table>
		<table border="0" width="70%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">NIS</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Siswa</a></th>
				</tr>
			<?php foreach($siswa as $row){ ?>
		<tr>
			<td><?=$row->nomor_induk_siswa?></td>
			<td><?=$row->nama_siswa?></td>
		</tr>
			<?php } ?>
		</table>
		<form action='/school/c_master_data/fix_kelas' method='post'>
		<table>
		<tr>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
				<input type="hidden" value="<?=$rows[0]->id_kelas?>" name="id_kelas"/>
			</td>
		</tr>
		</table>
		</form>
		<!-- end id-form  -->
		
