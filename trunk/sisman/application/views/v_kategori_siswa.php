				<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
				<tr>
					<th valign="top">Nama Kategori:</th>
					<td><?=$kategori[0]->nama_kategori?></td>
				</tr>
				
				<tr>
					<th valign="top">Dengan Siswa:</th>
				</tr>
				</table>
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
						<tr>
							<th class="table-header-repeat line-left"><a href="">Nomor Induk</a></th>
							<th class="table-header-repeat line-left"><a href="">Nama</a></th>
						</tr>
						
						<?php foreach ($items as $item){?>
						
						<tr class="alternate-row">
							<td><?=$item->no_induk ?></td>
							<td><?=$item->nama_person ?></td>
						</tr>
						
						<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>
				<!--  start actions-box ............................................... -->
				<div id="actions-box">
					<a href="" class="action-slider"></a>
					<div id="actions-box-slider">
						<a href="/school/c_kategori/add_siswa/<?=$kategori[0]->id_kategori?>" class="action-edit">Add</a>
					</div>
					<div class="clear"></div>
				</div>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->				