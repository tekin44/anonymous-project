

				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">ID Kategori</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nama Kategori</a></th>
				</tr>
				
				<?php foreach ($rows as $item){?>
				
				<tr class="alternate-row">
					<td><? echo $item->id_kategori ?></td>
					<td><? echo $item->nama_kategori ?></td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>
				
				<div id="actions-box">
					<a href="" class="action-slider"></a>
					<div id="actions-box-slider">
						<a href="c_kategori/viewTambahKategori" class="action-edit">Tambah kategori</a>
						<a href="c_kategori/kategoriSiswa" class="action-edit">Tambah kategori untuk siswa</a>
					</div>
					<div class="clear"></div>
				</div>
				