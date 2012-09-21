				<?php
				$nis = $rows[0]->nomor_induk_siswa;
				$nama = $rows[0]->nama_siswa;
				?>
				
				
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<td>NAMA : <?=$nama ?></td>
				</tr>
				<tr>
					<td>NIS : <?=$nis ?></td>
				</tr>
				</table>
				
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Nomor</a></th>
					<th class="table-header-repeat line-left"><a href="">Mata Pelajaran</a></th>
					<th class="table-header-repeat line-left"><a href="">Kelas</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nilai</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
				
				<?php 
					$i = 0;
					foreach ($rows as $item){
				?>
				
				<tr class="alternate-row">
					<td><?=++$i ?></td>
					<td><?=$item->nama_pelajaran ?></td>
					<td><?=$item->nama_kelas ?></td>
					<td><?=$item->nilai_raport ?></td>
					<td>
					<?="<a href='" . base_url() . "c_nilai/edit_nilai/$item->nomor_induk_siswa/$item->nomor_induk_pengajar/$item->id_kelas' title='Edit' class='icon-1 info-tooltip'>"?></a>
					<?="<a href='" . base_url() . "c_nilai/delete_nilai/$item->nomor_induk_pengajar/$item->id_kelas/$item->nomor_induk_siswa' title='Delete' class='icon-2 info-tooltip'>";?></a>
					</td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>
				<!--  start actions-box ............................................... -->
				<div id="actions-box">
					<a href="" class="action-slider"></a>
					<div id="actions-box-slider">
					<?="<a href='".base_url()."c_nilai/tambah_nilai/$item->nomor_induk_siswa' class='action-edit'>";?>Add</a>
					</div>
					<div class="clear"></div>
				</div>
				<!-- end actions-box........... -->