<div id="bg-isi"><h2>Module Pengumuman - E-Learning STIKOM PGRI Banyuwangi</h2><br />
<a href="<?php echo base_url(); ?>index.php/admin/tambahpengumuman"><div class="pagingpage"><b> + Tambah Pengumuman </b></div><br /><br /></a>
<table width="750" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>No.</strong></td><td><strong>Judul Pengumuman</strong></td><td><strong>Tanggal</strong></td><td><strong>Penulis</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php
$nomor=$page+1;
if(count($query->result())>0){
foreach($query->result() as $t)
{
		if(($nomor%2)==0){
			$warna="#C8E862";
		} else{
			$warna="#D6F3FF";
		}
echo "<tr bgcolor='".$warna."'><td align='center'>".$nomor."</td><td>".$t->judul_pengumuman."</td><td>".$t->tanggal."</td><td>".$t->penulis."</td><td>
<a href='".base_url()."index.php/admin/editpengumuman/".$t->id_pengumuman."' title='Edit Tutorial'><img src='".base_url()."system/application/views/dosen/images/edit-icon.gif' border='0'></a></td>
<td><a href='".base_url()."index.php/admin/hapuspengumuman/".$t->id_pengumuman."' onClick=\"return confirm('Anda yakin ingin menghapus pengumuman ini?')\" title='Hapus Tutorial'><img src='".base_url()."system/application/views/dosen/images/hapus-icon.gif' border='0'></a></td>
</td></tr>";
$nomor++;	
}
}
else{
echo "<tr><td colspan='5'>Belum ada pengumuman</td></tr>";
}
?>
</table><br />
<table class="widget" align="center"><tr><td><?=$paginator;?></td></tr></table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>