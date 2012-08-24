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
		?>
			<th valign="top">Nama :</th>
			<td><? echo $item->nama_person ?></td>
		</tr>
		<tr>
			<th valign="top">Nomor Induk :</th>
			<td><? echo $item->no_induk ?></td>
		</tr>
		<tr><th valign="top">Masuk</th><td>
			<? if ($item->waktu_masuk == NULL)
			{
			echo form_checkbox('checkbox_masuk', '1', FALSE);	
			}
			else echo $item->waktu_masuk;
			?>
		</td></th></tr>

		<tr><th valign="top">Keluar</th><td>
			<? if ($item->waktu_keluar == NULL)
			{
			echo form_checkbox('checkbox_keluar', '1');	
			}
			else echo $item->waktu_keluar;
			?>
		</td></th></tr>
		<tr>
			<th valign="top">Keterangan</th><td>
				<?php 
				$options = array(
                  '0'  	=> '',
                  '2'   => 'Sakit',
                  '3'   => 'Izin',
                );

				echo form_dropdown('keterangan', $options, '0');
				
				?> 
			</td>
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