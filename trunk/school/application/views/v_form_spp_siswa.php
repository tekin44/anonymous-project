		<?php echo form_open('c_spp/submit_spp'); ?>
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
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
		</table>
		<table border="0" width="50%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left"><a href="">Bulan</a></th>
				</tr>
			<?php
				$checked = ""; 
				for($i=0;$i<12;$i++){
					 if($spp[$i]->bulan_spp!="") $checked = "checked";
					 else $checked = ""; ?>
					<tr>
						<td><input name="bulan[]" <?=$checked?> type="checkbox" value="<?=$i+1?>"/></th>
						<td><?=$mon[$i]?></td>
					</tr>
			<?php } ?>
		</table>
		<input type="hidden" readonly class="inp-form" name="tahun_spp" value="<?=$tahun?>" />
		<input type="hidden" readonly class="inp-form" name="nomor_induk_siswa" value="<?=$nis?>" />
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