		<?php echo form_open('c_spp/submit_dsp'); ?>
		<!-- start id-form -->
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">DSP:</th>
			<td><?=$siswa[0]->jumlah_dsp?></td>
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
			<th valign="top">Sisa DSP:</th>
			<td><?=$siswa[0]->sisa_dsp?$siswa[0]->sisa_dsp:$siswa[0]->jumlah_dsp?></td>
		</tr>
		<tr>
			<th valign="top">Jumlah Bayar:</th>
			<td><input type="text" class="inp-form" name="jumlah_bayar_dsp" /></td>
		</tr>
		<input type="hidden" readonly class="inp-form" name="id_dsp" value="<?=$siswa[0]->id_dsp?>" />
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