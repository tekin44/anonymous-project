				<?=$result?>
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Tanggal</a></th>
					<th class="table-header-repeat line-left"><a href="">Keterangan</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
				
				<?php foreach ($libur as $item){?>
				
				<tr class="alternate-row">
					<td><?=$item->tanggal_hari_libur ?></td>
					<td><?=$item->ket_hari_libur ?></td>
					<td>
					<?="<a href='".base_url()."c_config/form_hari_libur/2/$item->id_hari_libur' title='Edit' class='icon-1 info-tooltip'>";?></a>
					<?="<a href='".base_url()."c_config/delete_hari_libur/$item->id_hari_libur' title='Delete' class='icon-2 info-tooltip'>";?></a>
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
						<a href="c_config/form_hari_libur/1" class="action-edit">Add</a>
					</div>
					<div class="clear"></div>
				</div>
				<!-- end actions-box........... -->