			<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
					<tr>
						<td>Cari berdasarkan ID kategori</td>
						<td>Cari berdasarkan nama kategori</td>
					</tr>
					
					<tr>
						<?php echo form_open('c_kategori/index');?>
						<td><input name="search_field1" type="text" class="inp-form" /> <?php echo form_submit('submit', 'Cari');?> </td>
						<?php echo form_close();?>
						
						<?php echo form_open('c_kategori/index');?>
						<td><input name="search_field2" type="text" class="inp-form" /> <?php echo form_submit('submit', 'Cari');?></td>
						<?php echo form_close();?>
					</tr>
			</table>

				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">ID Kategori</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nama Kategori</a></th>
					<th class="table-header-options line-left"><a href="">Action</a></th>
				</tr>
				
				<?php foreach ($rows as $item){?>
				
				<tr class="alternate-row">
					<td><? echo $item->id_kategori ?></td>
					<td><? echo $item->nama_kategori ?></td>
					<td>
					<?="<a href='".base_url()."c_kategori/viewTambahKategori/2/$item->id_kategori' title='Edit' class='icon-1 info-tooltip'>";?></a>
					<?="<a href='".base_url()."c_kategori/delete/$item->id_kategori' title='Delete' class='icon-2 info-tooltip'>";?></a>
					</td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>
				
				<div id="actions-box">
					<a href="" class="action-slider"></a>
					<div id="actions-box-slider">
						<a href="/school/c_kategori/viewTambahKategori/1" class="action-edit">Add</a>
					</div>
					<div class="clear"></div>
				</div>
				