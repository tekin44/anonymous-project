		<?php echo form_open('c_spp/submit_pembayaran'); ?>
		<!-- start id-form -->
		
		<?php	if($alert) echo "<script>alert('".str_replace("%20"," ",$alert)."');</script>"; ?>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Nomor :</th>
			<td><input type="text" class="inp-form" name="nomor_bayar" /></td>
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
			<td>Jumlah Bayar DSP :</td>
			<td><input type="text" class="inp-form" name="jumlah_bayar_dsp" /></td>
		</tr>
		<tr>
			<td>Jumlah Bayar Tahunan :</td>
			<td><input type="text" class="inp-form" name="jumlah_bayar_tahunan" /></td>
		</tr>
		<tr>
			<td>Periode :</td>
			<td>
				<select name="id_periode" class="styledselect_form_1">
				<?php foreach($per as $item){ ?>
					<option value="<?=$item->id_periode?>"><?="TA ".$item->tahun_periode." Semester ".$item->periode_semester?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		</table>
		<table border="0" width="30%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Bulan</a></th>
				</tr>
			<?php for($i=0;$i<12;$i++){ ?>
					<tr>
						<td><input name="bulan[]" type="checkbox" value="<?=$i+1?>"/></td>
						<td><?=$mon[$i]?></td>
					</tr>
			<?php } ?>
		</table>
		<input type="hidden" readonly class="inp-form" name="nis" value="<?=$siswa->nomor_induk_siswa?>" />
		<input type="hidden" readonly class="inp-form" name="id_dsp" value="<?=$siswa->id_dsp?>" />
		<input type="hidden" readonly class="inp-form" name="id_spp" value="<?=$siswa->id_spp?>" />
		<input type="hidden" readonly class="inp-form" name="id_tahunan" value="<?=$siswa->id_tahunan?>" />
		<table>
		<tr>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td>
				<a href="/school/c_spp">Kembali</a>
			</td>
		</tr>
		</table>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		