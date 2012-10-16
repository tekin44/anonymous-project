				Pencarian <br>
				<form action="<?=$action?>" method="post">
					<table border="0" cellpadding="0" cellspacing="0"  id="id-form" width="100%">
						<tr>
							<th valign="top">Tanggal:</td>
							<td class="noheight">
								<table border="0" cellpadding="0" cellspacing="0">
									<tr  valign="top">
										<td>			
											<select name="d" id="d" class="styledselect-day">
												<option value="">dd</option>
												<?php for($i=1;$i<=31;$i++){
													echo "<option value='".$i."'>".$i."</option>";
												}?>
											</select>
										</td>
										<td>
											<select name="m" id="m" class="styledselect-month">
												<option value="">mmm</option>
											<?php for($i=1;$i<=12;$i++){
												echo "<option value='".$i."'>".$i."</option>";
											}?>
											</select>
										</td>
										<td>
											<select name="y" id="y"  class="styledselect-year">
												<option value="">yyyy</option>
											<?php for($i=1;$i<=2012;$i++){
												echo "<option value='".$i."'>".$i."</option>";
											}?>
											</select>
										</td>
										<td>
											<a href="" id="date-pick">
												<img src="/school/images/forms/icon_calendar.jpg" alt="" />
											</a>
										</td>
									</tr>
								</table>
							</td>
							<th valign="top">No Induk:</th>
							<td><input name="nomor_induk_siswa" type="text" class="inp-form" /></td>
							<th valign="top">Nama:</th>
							<td><input name="nama_siswa" type="text" class="inp-form" /></td>
							<td><input type="submit" value="Cari" name="search" /></td>
						</tr>
					</table>
				</form>
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">No.</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Nomor Induk</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Nama</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Masuk</a></th>
					<th class="table-header-repeat line-left"><a href="">Waktu Keluar</a></th>
					<th class="table-header-repeat line-left"><a href="">Status</a></th>
					<th class="table-header-repeat line-left"><a href="">Keterangan</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				
				<?php					
					
					$i = 0;
					foreach ($rows as $item) {
						switch($item->status_absen){
							case '1':$ket = 'Masuk';break;
							case '2':$ket = 'Terlambat';break;
							case '3':$ket = 'Sakit';break;
							case '4':$ket = 'Ijin';break;
						}
?>
				
				<tr class="alternate-row">
					<td><? echo ++$i; ?></td>
					<td><? echo $item->nomor_induk_siswa ?></td>
					<td><? echo $item->nama_siswa ?></td>
					<td><? echo $item->waktu_masuk ?></td>
					<td><? echo $item->waktu_keluar ?></td>
					<td><? echo $ket ?></td>
					<td><? echo $item->keterangan_absen ?></td>
					<td>
					<?="<a href='" . base_url() . "c_absensi/editAbsensiSiswa/$item->no_absensi' title='Edit' class='icon-1 info-tooltip'>"?></a>
					</td>
				</tr>
				
				<?}?>
				</table>
				<!--  end product-table................................... --> 
				</form>				
				
				
				<div id="actions-box">
					<a href="" class="action-slider"></a>
					<div id="actions-box-slider">
						<a href="/school/c_absensi/<?=$report?>/<?=$tanggal?>" class="action-edit">Import</a>
					</div>
					<div class="clear"></div>
				</div>