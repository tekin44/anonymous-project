				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Ip Address</a></th>
					<th class="table-header-repeat line-left"><a href="">Port</a></th>
					<th class="table-header-options line-left"><a href="">Status</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
				
				<?php foreach ($items as $item){
					if($item->status_mesin=="1"){
						$status = "Connected";
						$state = "title='Shut Down' class='icon-2 info-tooltip'";
					}else{
						$status = "Disconnected";
						$state = "title='Turn On' class='icon-5 info-tooltip'";
					}
				?>
				
				<tr class="alternate-row">
					<td><?=$item->ip_address ?></td>
					<td><?=$item->port_mesin ?></td>
					<td><?=$status ?></td>
					<td>
					<?="<a href='".base_url()."c_config/turn_mesin/$item->status_mesin/$item->id_mesin' ".$state.">";?></a>
					<?="<a href='".base_url()."c_config/form_mesin/$item->id_mesin' title='Edit' class='icon-1 info-tooltip'>";?></a>
					</td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>