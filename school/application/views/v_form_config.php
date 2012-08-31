		<?php
			$msg_tidak_masuk = $item[0]->msg_tidak_masuk;
			$msg_telat = $item[0]->msg_telat;
			$no_kepsek = $item[0]->no_kepsek;
			$no_kepsek_2 = $item[0]->no_kepsek;
			$tanggal_pel_baru = $item[0]->tanggal_pel_baru;
			$tanggal_pel_selesai = $item[0]->tanggal_pel_selesai;
		?>
		<!-- start id-form -->
		<form action='/school/c_config/edit_config' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Pesan Telat:</th>
			<td><textarea name="msg_telat" rows="" cols="" class="form-textarea"><?=$msg_telat?></textarea></td>
		</tr>
		<tr>
			<th valign="top">Pesan Alfa:</th>
			<td><textarea name="msg_tidak_masuk" rows="" cols="" class="form-textarea"><?=$msg_tidak_masuk?></textarea></td>
		</tr>
				<tr>					
					<th class="table-header-repeat line-left"><a href="">No HP ke-1 Kepala Sekolah</a></th>
					<td><input name='no_kepsek' type="text" class="inp-form" value="<?=$no_kepsek?>" /></td>
				</tr>	
				<tr>					
					<th class="table-header-repeat line-left"><a href="">No HP ke-2 Kepala Sekolah </a></th>
					<td><input name='no_kepsek_2' type="text" class="inp-form" value="<?=$no_kepsek_2?>" /></td>
				</tr>
				<tr>					
					<th class="table-header-repeat line-left"><a href="">Tanggal Mulai Tahun Pelajaran Baru</a></th>
					<td><input name='tanggal_pel_baru' type="text" class="inp-form" value="<?=$tanggal_pel_baru?>" /></td>
				</tr>	
				<tr>					
					<th class="table-header-repeat line-left"><a href="">Tanggal Selesai Tahun Pelajaran</a></th>
					<td><input name='tanggal_pel_selesai' type="text" class="inp-form" value="<?=$tanggal_pel_selesai?>" /></td>
				</tr>
		</table>
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td></td>
		</tr>
		</form>
		<!-- end id-form  -->