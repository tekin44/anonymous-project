				
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Nomor Induk Pengajar</a></th>
					<th class="table-header-repeat line-left"><a href="">ID Kelas</a></th>
					<th class="table-header-repeat line-left"><a href="">Nilai Kelulusan</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
				
				<?php foreach ($rows as $item){?>
				
				<tr class="alternate-row">
					<td><? echo $item->nomor_induk_pengajar ?></td>
					<td><? echo $item->id_kelas ?></td>
					<td><? echo $item->nilai_kelulusan ?></td>
					<td>
					<?="<a href='" . base_url() . "c_master_data/delete_pengajar_kelas/$item->nomor_induk_pengajar/$item->id_kelas' title='Delete' class='icon-2 info-tooltip'>";?></a>
					
					</td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>				
				
				
				<div id="actions-box">
					<a href="" class="action-slider"></a>
					<div id="actions-box-slider">
						<a href="/school/c_master_data/tambah_pengajar_kelas" class="action-edit">Add</a>
					</div>
					<div class="clear"></div>
				</div>