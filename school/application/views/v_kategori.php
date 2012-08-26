

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
					<?="<a href='".base_url()."c_kategori/kategoriSiswa/$item->id_kategori' title='Add Siswa' class='icon-3 info-tooltip'>";?></a>
					<?="<a href='".base_url()."c_kategori/form_kategori/$item->id_kategori' title='Edit' class='icon-1 info-tooltip'>";?></a>
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
						<a href="tambah_kategori" class="action-edit">Tambah kategori</a>
						<a href="kategori_siswa" class="action-edit">Tambah kategori untuk siswa</a>
					</div>
					<div class="clear"></div>
				</div>
				