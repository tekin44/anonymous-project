		<?php
			$disable = $flag==2?"readonly='readonly'":'';
			$id_users = $flag==2?$siswa[0]->id_users:'';
			$nomor_induk_siswa = $flag==2?$siswa[0]->nomor_induk_siswa:'';
			$nama_siswa = $flag==2?$siswa[0]->nama_siswa:'';
			$alamat_siswa = $flag==2?$siswa[0]->alamat_siswa:'';
			$nama_orang_tua = $flag==2?$siswa[0]->nama_orang_tua:'';
			$no_hp_siswa = $flag==2?$siswa[0]->no_hp_siswa:'';
			$no_hp_orang_tua = $flag==2?$siswa[0]->no_hp_orang_tua:'';
			$email_siswa = $flag==2?$siswa[0]->email_siswa:'';
		?>
		<!-- start id-form -->
		<form action='/school/c_master_data/submit' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">ID Users:</th>
			<?php if($flag=='1'){ ?>
			<td>
				<select name="id_users" class="styledselect_form_1">
				<?php foreach($items as $item){ ?>
					<option value="<?=$item->id_users?>"><?=$item->id_users?></option>
				<?php } ?>
				</select>
			</td>
			<?php }else{ ?>
			<td><input name='id_users' readonly="readonly" type="text" class="inp-form" value="<?=$id_users?>" /></td>
			<?php } ?>
		</tr>
		<tr>
			<th valign="top">NIS:</th>
			<td><input name='nomor_induk_siswa' type="text" class="inp-form" value="<?=$nomor_induk_siswa?>" /></td>
		</tr>
		<tr>
			<th valign="top">Nama Siswa:</th>
			<td><input name='nama_siswa' type="text" class="inp-form" value="<?=$nama_siswa?>" /></td>
		</tr>
		<tr>
			<th valign="top">Alamat Siswa:</th>
			<td><textarea name="alamat_siswa" rows="" cols="" class="form-textarea"><?=$alamat_siswa?></textarea></td>
		</tr>
		<tr>
			<th valign="top">Nama Orang Tua:</th>
			<td><input name='nama_orang_tua' type="text" class="inp-form" value="<?=$nama_orang_tua?>" /></td>
		</tr>
		<tr>
			<th valign="top">No Hp Siswa:</th>
			<td><input name='no_hp_siswa' type="text" class="inp-form" value="<?=$no_hp_siswa?>" /></td>
		</tr>
		<tr>
			<th valign="top">No Hp Orang Tua:</th>
			<td><input name='no_hp_orang_tua' type="text" class="inp-form" value="<?=$no_hp_orang_tua?>" /></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td><input name='email_siswa' type="text" class="inp-form" value="<?=$email_siswa?>" /></td>
		</tr>
		<tr>
			<th valign="top">Kategori:</th>
			<td></td>
		</tr>
		</table>
			<table border="0" align="center" width="45%" cellpadding="0" cellspacing="0" id="product-table">
				<?php foreach($kats as $kat){ 
					$check = "";
					if($kat->checked)
						$check = "checked"
				?>
				<tr>
					<td width="25"><input name="kat[]" <?=$check?> value="<?=$kat->id_kategori?>" type="checkbox"/></td>
					<td><?=$kat->nama_kategori?></td>
				</tr>
				<?php } ?>
			</table>
		<table>
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
				<input type="reset" value="" class="form-reset"  />
			</td>
			<td></td>
		</tr>
		</table>
		<input name="flag" type="hidden" value="<?=$flag?>"/>
		</form>
		<!-- end id-form  -->
		
