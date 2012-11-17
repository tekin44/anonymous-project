		<?php echo form_open('c_spp/submit_note'); ?>
		<!-- start id-form -->
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">No Pembayaran :</th>
			<td><select name="no_pembayaran">
				<option value="0">No Pembayaran</option>
				<?php foreach ($no_pembayaran as $row){
					echo "<option value=\"".$row->no_pembayaran."\">".$row->no_pembayaran."</option>";
				}
				?> 
			</select></td>
		</tr>
		<input type="hidden" readonly class="inp-form" name="id" value="<?=$nis?>" />
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