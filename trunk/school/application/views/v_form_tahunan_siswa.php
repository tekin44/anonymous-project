		<?php echo form_open('c_spp/submit_tahunan'); ?>
		<!-- start id-form -->
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Tahunan:</th>
			<td><?=$siswa[0]->jumlah_tahunan?></td>
		</tr>
		<tr>
			<th valign="top">Tanggal Bayar:</th>
			<td><table border="0" cellpadding="0" cellspacing="0">
			<tr  valign="top">
				<td>
				<select name="d" id="d" class="styledselect-day">
					<?=$d?>
				</select>
				</td>
				<td>
					<select name="m" id="m" class="styledselect-month">
					<?=$m?>
					</select>
				</td>
				<td>
					<select name="y" id="y"  class="styledselect-year">
					<?=$y?>
					</select>
				</td>
				<td><a href="" id="date-pick"><img src="/school/images/forms/icon_calendar.jpg"   alt="" /></a></td>
			</tr>
			</table></td>
		</tr>
		<tr>
			<th valign="top">Tahun ke:</th>
			<td><input type="text" class="inp-form" name="tahun_bayar_tahunan" /></td>
		</tr>
		<tr>
			<th valign="top">Jumlah Bayar:</th>
			<td><input type="text" class="inp-form" name="jumlah_bayar_tahunan" /></td>
		</tr>
		<input type="hidden" readonly class="inp-form" name="id_tahunan" value="<?=$siswa[0]->id_tahunan?>" />
		<tr>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td>
				<a href="/school/c_spp">Kembali</a>
			</td>
		</tr>
		</table>
		
				<table border="0" width="50%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Tahun ke</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Sisa</a></th>
				</tr>
				<?php foreach($siswa as $item){ ?>
				<tr>
					<td><?=$item->tahun_bayar_tahunan?></td>
					<td><?=$item->sisa?$item->sisa:'Lunas'?></td>
				</tr>
				<?php } ?>
				</table>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		