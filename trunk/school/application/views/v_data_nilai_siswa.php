			<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
					<tr>
						<td>Cari berdasarkan nomor induk</td>
						<td>Cari berdasarkan nama</td>
					</tr>
					
					<tr>
						<?php echo form_open('c_master_data/show_data_siswa');?>
						<td><input name="search_field" type="text" class="inp-form" /> <?php echo form_submit('submit', 'cari');?> </td>
						<?php echo form_close();?>
						
						<?php echo form_open('c_master_data/show_data_siswa');?>
						<td><input name="search_fieldnama" type="text" class="inp-form" /> <?php echo form_submit('submit', 'cari');?></td>
						<?php echo form_close();?>
					</tr>
			</table>
				
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">No</a></th>
					<th class="table-header-repeat line-left"><a href="">NIS</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nama</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
				
				<?php 
					$i = 0;
					foreach ($siswa as $item){
				?>
				
				<tr class="alternate-row">
					<td><?=++$i ?></td>
					<td><?=$item->nomor_induk_siswa ?></td>
					<td><?=$item->nama_siswa ?></td>
					<td>
					<?="<a href='".base_url()."c_nilai/form_siswa/2/$item->nomor_induk_siswa' title='Edit' class='icon-1 info-tooltip'>";?></a>
					</td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>
