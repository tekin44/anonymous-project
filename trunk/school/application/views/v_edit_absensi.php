		<!--  start step-holder -->

		<!--  end step-holder -->
		<!-- start id-form -->
		<?php echo form_open('c_absensi/updateAbsensi'); ?>
		
		<?php foreach ($rows as $item){?>
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
		<?
		$no = $item->no_absensi;
		echo form_hidden('no_absensi', $no);
		echo form_hidden('tipe', $tipe);
		?>
			<th valign="top">Nama :</th>
			<td><? echo $item->nama ?></td>
		</tr>
		<tr>
			<th valign="top">Nomor Induk :</th>
			<td><? echo $item->nomor_induk ?></td>
		</tr>
		<tr>
			<th valign="top">Dengan Alasan :</th><td>
				<?php 
				$options = array(
                  '0'  	=> 'keterangan',
                  '3'   => 'Sakit',
                  '4'   => 'Izin',
                );

				echo form_dropdown('keterangan', $options, '0');
				
				?> 
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Keterangan :</th>
			<td><textarea rows="" cols="" class="form-textarea" name="ket"></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<?php echo form_submit('submit', 'update', 'form-submit'); ?> 
			</td>
			<td></td>
		</tr>
		
		</table>
		<?}?>
		
		<?php echo form_close(); ?>	
		<!-- end id-form  -->		