				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">ID Menu</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">ID Previlege</a></th>
					<th class="table-header-repeat line-left"><a href="">ID Parent Menu</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama Menu</a></th>
					<th class="table-header-repeat line-left"><a href="">Action Menu</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				
				<?php foreach ($rows as $item){?>
				
				<tr class="alternate-row">
					<td><? echo $item->id_menu ?></td>
					<td><? echo $item->id_prev ?></td>
					<td><? echo $item->parent ?></td>
					<td><? echo $item->nama_menu ?></td>
					<td><? echo $item->action_menu ?></td>
					<td>
					<?="<a href='".base_url()."c_admin/editMenu/$item->id_menu' title='Edit' class='icon-1 info-tooltip'>";?></a>
					<?="<a href='".base_url()."c_admin/deleteMenu/$item->id_menu' title='Delete' class='icon-2 info-tooltip'>";?></a>
					</td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>
				
				<div id="actions-box">
					<a href="" class="action-slider"></a>
					<div id="actions-box-slider">
						<a href="/school/c_admin/viewInsertMenu" class="action-edit">Add</a>
					</div>
					<div class="clear"></div>
				</div>