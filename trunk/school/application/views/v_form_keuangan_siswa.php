		<?php echo form_open('c_spp/submit_keuangan'); ?>
		<!-- start id-form -->
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Nomor Induk Siswa:</th>
			<td><input type="text" readonly class="inp-form" name="nomor_induk_siswa" value="<?=$siswa[0]->nomor_induk_siswa?>" /></td>
		</tr>
		<tr>
			<th valign="top">Nama Siswa:</th>
			<td><input type="text" readonly class="inp-form" name="nama_siswa" value="<?=$siswa[0]->nama_siswa?>" /></td>
		</tr>		
		<tr>
			<th valign="top">Besar DSP:</th>
			<td><input type="text" class="inp-form" name="jumlah_dsp" value="<?=$siswa[0]->jumlah_dsp?>" /></td>
		</tr>
		<tr>
			<th valign="top">Besar Tahunan:</th>
			<td><input type="text" class="inp-form" name="jumlah_tahunan" value="<?=$siswa[0]->jumlah_tahunan?>" /></td>
		</tr>

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