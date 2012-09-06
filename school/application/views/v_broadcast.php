		<?php if($result){ ?>
		<!--  start message-yellow -->
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">Pesan telah berhasil dikirim</td>
					<td class="yellow-right"><a class="close-yellow"><img src="/school/images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->	
		<?php } ?>
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Isi Form Broadcast</a></div>
			<div class="step-dark-right">&nbsp;</div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
		<!-- start id-form -->
		<form action="do_broadcast" method="post">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Isi Pesan :</th>
			<td><textarea rows="" cols="" class="form-textarea" name="msg"></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Kirim ke :</th>
			<td></td>
		</tr>
		</table>
			<table border="0" align="center" width="45%" cellpadding="0" cellspacing="0" id="product-table">
				<?php foreach($kats as $kat){ ?>
				<tr>
					<td width="25"><input name="kat[]" value="<?=$kat->id_kategori?>" type="checkbox"/></td>
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
		</form>		
		<!-- end id-form  -->		