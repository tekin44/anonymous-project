				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">No</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nama Pesan</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Isi Pesan</a></th>
					<th class="table-header-options line-left"><a href="">Tanggal Kirim</a></th>
					<th class="table-header-options line-left"><a href="">Status Pengiriman</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
				
				<?php 
				$i = 0;
				foreach ($items as $item){
					if($item->status_pengiriman=='1')
						$status = 'Belum Terkirim';
					else
						$status = 'Sudah Terkirim';?>
				
				<tr class="alternate-row">
					<td><?=++$i ?></td>
					<td><?=$item->nama_pesan ?></td>
					<td><?=$item->isi_pesan ?></td>
					<td><?=$item->tgl_pengiriman ?></td>
					<td><?=$status ?></td>
					<td>
					<?php if($item->status_pengiriman!='2'){ ?>
					<?="<a href='".base_url()."c_sms/form_schedule/2/$item->id_pesan' title='Edit' class='icon-1 info-tooltip'>";?></a>
					<?="<a href='".base_url()."c_sms/delete/$item->id_pesan' title='Delete' class='icon-2 info-tooltip'>";?></a>
					<?php } ?>
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
						<a href="/school/c_sms/form_schedule/1" class="action-edit">Add</a>
					</div>
					<div class="clear"></div>
				</div>
				<!-- end actions-box........... -->