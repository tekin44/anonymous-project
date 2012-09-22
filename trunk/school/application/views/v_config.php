				<?=$result?>
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">		
				<tr>					
					<th class="table-header-repeat line-left"><a href="">Message Telat</a></th>
					<td><?=$items[0]?$items[0]->pesan_telat:"" ?></td>
				</tr>			
				<tr>					
					<th class="table-header-repeat line-left"><a href="">Message Alfa</a></th>
					<td><?=$items[0]?$items[0]->pesan_absen:"" ?></td>
				</tr>	
				<tr>					
					<th class="table-header-repeat line-left"><a href="">No HP ke-1 Kepala Sekolah</a></th>
					<td><?=$items[0]?$items[0]->no_kepsek:"" ?></td>
				</tr>	
				<tr>					
					<th class="table-header-repeat line-left"><a href="">No HP ke-2 Kepala Sekolah </a></th>
					<td><?=$items[0]?$items[0]->no_kepsek2:"" ?></td>
				</tr>
				</table>
				<!--  end product-table................................... --> 
				</form>
				<!--  start actions-box ............................................... -->
				<div id="actions-box">
					<a href="" class="action-slider"></a>
					<div id="actions-box-slider">
						<a href="/school/c_config/form_config" class="action-edit">Edit</a>
					</div>
					<div class="clear"></div>
				</div>
				<!-- end actions-box........... -->