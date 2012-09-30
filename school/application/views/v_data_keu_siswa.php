			<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
					<tr>
						<td>Cari berdasarkan nomor induk</td>
						<td>Cari berdasarkan nama</td>
					</tr>
					
					<tr>
						<?php echo form_open('c_spp/index');?>
						<td><input name="search_field1" type="text" class="inp-form" /> <?php echo form_submit('submit', 'cari');?> </td>
						<?php echo form_close();?>
						
						<?php echo form_open('c_spp/index');?>
						<td><input name="search_field2" type="text" class="inp-form" /> <?php echo form_submit('submit', 'cari');?></td>
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
					<th class="table-header-repeat line-left"><a href="">DSP</a></th>
					<th class="table-header-repeat line-left"><a href="">Tahunan</a></th>
					<th class="table-header-repeat line-left"><a href="">SPP</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
				
				<?php 
					$i = 0;
					foreach ($siswa as $item){
				?>
				
				<tr class="alternate-row">
					<td><?=++$i ?></td>
					<td><?=$item->nomor_induk_siswa?></td>
					<td><a href="/school/c_spp/view_detail/<?=$item->nomor_induk_siswa?>"><?=$item->nama_siswa ?></a></td>
					<td><?=$item->jumlah_dsp ?></td>
					<td><?=$item->jumlah_tahunan ?></td>
					<td><?=$item->jumlah_spp ?></td>
					<td>
					<?="<a href='".base_url()."c_spp/edit_keu/$item->nomor_induk_siswa' title='Edit Keuangan' class='icon-1 info-tooltip'>";?></a>
					<?="<a href='".base_url()."c_spp/add_dsp/$item->nomor_induk_siswa' title='Bayar DSP' class='icon-1 info-tooltip'>";?></a>
					<?="<a href='".base_url()."c_spp/add_tahunan/$item->nomor_induk_siswa' title='Bayar Tahunan' class='icon-1 info-tooltip'>";?></a>
					<?="<a href='".base_url()."c_spp/add_spp/$item->nomor_induk_siswa' title='Bayar SPP' class='icon-1 info-tooltip'>";?></a>
					</td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>
