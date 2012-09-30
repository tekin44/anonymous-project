				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">No</a></th>
					<th class="table-header-repeat line-left"><a href="">Tahun Ajaran</a></th>
					<th class="table-header-repeat line-left"><a href="">Semester</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Dari Tanggal</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Sampai Tanggal</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
				
				<?php 
					$i = 0;
					foreach ($periodes as $item){
				?>
				
				<tr class="alternate-row">
					<td><?=++$i ?></td>
					<td><?=$item->tahun_periode ?></td>
					<td><?=$item->periode_semester ?></td>
					<td><?=date('d-m-Y',strtotime($item->awal_periode))?></td>
					<td><?=date('d-m-Y',strtotime($item->akhir_periode))?></td>
					<td>
					<?="<a href='".base_url()."c_master_data/form_periode/2/$item->id_periode' title='Edit' class='icon-1 info-tooltip'>";?></a>
					<?="<a href='".base_url()."c_master_data/delete_periode/$item->id_periode' title='Delete' class='icon-2 info-tooltip'>";?></a>
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
						<a href="/school/c_master_data/form_periode/1" class="action-edit">Add</a>
					</div>
					<div class="clear"></div>
				</div>
				<!-- end actions-box........... -->