				Cari berdasarkan nomor induk
				<?php echo form_open('c_master_data/show_data_staff');?>
				<? echo form_input('search_field');?>
				<?php echo form_submit('submit', 'cari');?> 
				<?php echo form_close();?>	
				<br><br>
				Atau,
				<br>
				
				Cari berdasarkan nama
				<?php echo form_open('c_master_data/show_data_staff');?>
				<? echo form_input('search_fieldnama');?>
				<?php echo form_submit('submit', 'cari');?> 
				<?php echo form_close();?>	
				<br><br><br>
				
				<?=$result?>
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Nomor Induk</a></th>
					<th class="table-header-repeat line-left"><a href="">Nama</a></th>
					<th class="table-header-repeat line-left"><a href="">Action</a></th>
				</tr>
				
				<?php foreach ($staff as $item){?>
				
				<tr class="alternate-row">
					<td><?=$item->no_induk ?></td>
					<td><?=$item->nama_person ?></td>
					<td>
					<?="<a href='".base_url()."c_master_data/form_staff/2/$item->no_induk' title='Edit' class='icon-1 info-tooltip'>";?></a>
					<?="<a href='".base_url()."c_master_data/delete/3/$item->no_induk' title='Delete' class='icon-2 info-tooltip'>";?></a>
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
						<a href="/school/c_master_data/form_staff/1" class="action-edit">Add</a>
					</div>
					<div class="clear"></div>
				</div>
				<!-- end actions-box........... -->