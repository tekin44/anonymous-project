		<?php
			$disable = $flag==2?"readonly='readonly'":'';
			$id_users = $flag==2?$staff[0]->id_users:'';
			$nomor_induk_pengajar = $flag==2?$staff[0]->nomor_induk_pengajar:'';
			$nama_pengajar = $flag==2?$staff[0]->nama_pengajar:'';
			$kode_pelajaran = $flag==2?$staff[0]->kode_pelajaran:'';
		?>
		<!-- start id-form -->
		<form action='/school/c_master_data/submit_pengajar' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">ID:</th>
			<td>
				<?php if($flag == 1){ ?>
				<select name="id_users" class="styledselect_form_1">
				<option value="">Pilih ID</option>
				<?php foreach($row as $item) {?>
					<option value="<?=$item->id_users?>"><?=$item->id_users?></option>
				<?php }?>
				</select>
				<?php }else{ ?>
					<input name='id_users' <?=$disable?> type="text" class="inp-form" value="<?=$id_users?>" />
				<?php } ?>
			</td>
		</tr>
		<tr>
			<th valign="top">NIP:</th>
			<td><input name='nomor_induk_pengajar' type="text" class="inp-form" value="<?=$nomor_induk_pengajar?>" /></td>
		</tr>
		<tr>
			<th valign="top">Nama:</th>
			<td><input name='nama_pengajar' type="text" class="inp-form" value="<?=$nama_pengajar?>" /></td>
		</tr>
		<tr>
			<th valign="top">Pengajar Pelajaran:</th>
			<td><select name="kode_pelajaran" class="styledselect_form_1">
				<option value="">Select</option>
				<?php foreach($pels as $pel) {
						if($pel->kode_pelajaran == $kode_pelajaran){?>
					<option selected="selected" value="<?=$pel->kode_pelajaran?>"><?=$pel->kode_pelajaran?> - <?=$pel->nama_pelajaran?></option>
				<?php }else{ ?>
					<option value="<?=$pel->kode_pelajaran?>"><?=$pel->kode_pelajaran?> - <?=$pel->nama_pelajaran?></option>
				<?php }} ?>
				</select></td>
		</tr>
		<tr>
			<td align="center">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td>
				<a href="/school/c_master_data/show_data_guru">Kembali</a>
			</td>
		</tr>
		</table>
		<input name="flag" type="hidden" value="<?=$flag?>"/>
		</form>
		<!-- end id-form  -->