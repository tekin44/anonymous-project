				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Nomor Induk</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Alamat</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Orang Tua</a></th>
					<th class="table-header-options line-left"><a href="">Email</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
				
				<?php foreach ($siswa as $item){?>
				
				<tr class="alternate-row">
					<td><?=$item->no_induk ?></td>
					<td><?=$item->nama_person ?></td>
					<td><?=$item->alamat_siswa ?></td>
					<td><?=$item->nama_orang_tua ?></td>
					<td><?=$item->email_siswa ?></td>
					<td>
					<?="<a href='".base_url()."c_master_data/form_siswa/2/$item->no_induk' title='Edit' class='icon-1 info-tooltip'>";?></a>
					<?="<a href='".base_url()."c_master_data/delete/1/$item->no_induk' title='Delete' class='icon-2 info-tooltip'>";?></a>
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
						<a href="c_master_data/form_siswa/1" class="action-edit">Add</a>
					</div>
					<div class="clear"></div>
				</div>
				<!-- end actions-box........... -->