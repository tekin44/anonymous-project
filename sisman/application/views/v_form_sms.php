		<?php
			$id_pesan = $flag==2?$item[0]->id_pesan:'';
			$isi_pesan = $flag==2?$item[0]->isi_pesan:'';
			$nama_pesan = $flag==2?$item[0]->nama_pesan:'';
			$id_kat = $flag==2?$item[0]->id_kategori:'';
		?>
		<!-- start id-form -->
		<form action='/school/c_sms/edit_pesan' method='post'>
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Nama SMS:</th>
			<td><input name='nama_pesan' type="text" class="inp-form" value="<?=$nama_pesan?>" /></td>
		</tr>
		<tr>
			<th valign="top">Tanggal Pengiriman:</th>
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
		<th valign="top">Kirim ke :</th>
		<td>	
		<select name="id_kategori" class="styledselect_form_1">
			<?php foreach($kat as $item){ 
				if($item->id_kategori == $id_kat){?>
				<option selected="selected" value="<?=$item->id_kategori?>"><?=$item->nama_kategori?></option>
			<?php }else{ ?>
				<option value="<?=$item->id_kategori?>"><?=$item->nama_kategori?></option>
			<?php }} ?>
		</select>
		</td>
		</tr>
		<tr>
			<th valign="top">Isi Pesan:</th>
			<td><textarea name="isi_pesan" rows="" cols="" class="form-textarea"><?=$isi_pesan?></textarea></td>
		</tr>
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
		<input name="id_pesan" type="hidden" value="<?=$id_pesan?>"/>
		</form>
		<!-- end id-form  -->