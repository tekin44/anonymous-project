		<?php
			echo form_open('c_spp/submit_spp'); ?>
		<!-- start id-form -->
		
		<?php	if($alert) echo "<script>alert('".$alert."');</script>"; ?>
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
		<tr>
			<th valign="top">Tahun ke:</th>
			<td>
				<input type="text" class="inp-form" name="tahun_spp" />
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
				<input type="hidden" class="inp-form" name="id_spp" value="<?=$id[0]->id_spp?>" />
				<input type="hidden" class="inp-form" name="nis" value="<?=$nis?>" />
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