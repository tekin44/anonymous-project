			<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
			<tr>
				<th valign="top">Nomor Induk Siswa:</th>
				<td><?=$siswa[0]->nomor_induk_siswa?></td>
			</tr>
			<tr>
				<th valign="top">Nama Siswa:</th>
				<td><?=$siswa[0]->nama_siswa?></td>
			</tr>		
			<tr>
				<th valign="top">Besar DSP:</th>
				<td><?=$siswa[0]->jumlah_dsp?></td>
			</tr>
			</table>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Tanggal Pembayaran</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Jumlah</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				
				<?php 
					$sisa = $siswa[0]->jumlah_dsp;
					foreach ($dsp as $item){
						$sisa -= $item->jumlah_bayar_dsp;
				?>
				
				<tr class="alternate-row">
					<td><?=$item->tanggal_bayar_dsp ?></td>
					<td><?=$item->jumlah_bayar_dsp ?></td>
					<td class="options-width">
					<a href="/school/c_spp/delete_bayar_dsp/<?=$item->id_dsp?>/<?=$item->tanggal_bayar_dsp?>/<?=$siswa[0]->nomor_induk_siswa?>" title="Delete" class="icon-2 info-tooltip"></a>
					</td>
				</tr>
				
				<?php }?>
				</table>	
			<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
			<tr>
				<th valign="top">Sisa DSP:</th>
				<td><?=$sisa?></td>
			</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
			<tr>
				<th valign="top">Besar Tahunan:</th>
				<td><?=$siswa[0]->jumlah_tahunan?></td>
			</tr>
			</table>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Tanggal</a></th>
					<th class="table-header-repeat line-left"><a href="">Jumlah</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				
				<?php 
					foreach ($tahunan as $item){
				?>
				
				<tr class="alternate-row">
					<td><?=$item->tanggal_bayar_tahunan ?></td>
					<td><?=$item->jumlah_bayar_tahunan ?></td>
					<td class="options-width">
					<a href="/school/c_spp/delete_bayar_tahunan/<?=$item->id_tahunan?>/<?=$item->tanggal_bayar_tahunan?>/<?=$siswa[0]->nomor_induk_siswa?>" title="Delete" class="icon-2 info-tooltip"></a>
					</td>
				</tr>
				
				<?php }?>
				</table>
			<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
			<tr>
				<th valign="top">SPP:</th>
			</tr>
			</table>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Tanggal Pembayaran</a></th>
					<th class="table-header-repeat line-left"><a href="">Bulan</a></th>
					<th class="table-header-repeat line-left"><a href="">Periode</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
				
				<?php 
					foreach ($spp as $item){
				?>
				
				<tr class="alternate-row">
					<td><?=$item->tanggal_bayar_spp ?></td>
					<td><?=date('F',strtotime('2000-'.$item->bulan_spp.'-02')) ?></td>
					<td><?=$item->tahun_periode."/".$item->periode_semester ?></td>
					<td class="options-width">
					<a href="/school/c_spp/delete_bayar_spp/<?=$item->bulan_spp?>/<?=$item->id_periode ?>/<?=$siswa[0]->nomor_induk_siswa?>" title="Delete" class="icon-2 info-tooltip"></a>
					</td>
				</tr>
				
				<?php }?>
				</table>
				<a href="/school/c_spp">Kembali</a>
				
				<!--  end product-table................................... --> 
				</form>
