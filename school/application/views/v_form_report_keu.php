		<?php echo form_open('c_spp/submit_report'); ?>
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<td>Periode :</td>
			<td>
				<select name="id_periode" class="styledselect_form_1">
				<?php foreach($periode as $item){ ?>
					<option value="<?=$item->id_periode?>"><?="TA ".$item->tahun_periode." Semester ".$item->periode_semester?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<input type="submit" value="" class="form-submit" />
			</td>
		</tr>
		</table>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		