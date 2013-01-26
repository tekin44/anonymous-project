<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_pengajar extends CI_Model {	
	
	public function display_absen_guru($src=null) {
		$this->load->database();
		$where_clause = "where b.tanggal_absensi = '".$src['tanggal']."' ";
		if($src['nama_pengajar']) $where_clause .= "AND a.nama_pengajar ILIKE '%".$src['nama_pengajar']."%' ";
		if($src['nomor_induk_pengajar']) $where_clause .= "AND a.nomor_induk_pengajar ILIKE '%".$src['nomor_induk_pengajar']."%' ";
		$sql = "select b.*, a.nomor_induk_pengajar, a.nama_pengajar, d.waktu_absen as waktu_masuk, c.waktu_absen as waktu_keluar  
						from pengajar a inner join absen b on a.id_users = b.id_users 
						inner join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '1') d on b.no_absensi = d.no_absensi
						left join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '2') c on b.no_absensi = c.no_absensi
						$where_clause ORDER BY a.nama_pengajar
						";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function editAbsensi($no_absensi) {
		$this->load->database();
		$query = $this->db->query("select b.no_absensi, a.id_users, e.nomor_induk_pengajar as nomor_induk, e.nama_pengajar as nama, d.waktu_absen as waktu_masuk, c.waktu_absen as waktu_keluar  
						from users a inner join absen b on a.id_users = b.id_users 
						inner join pengajar e on a.id_users = e.id_users
						inner join keterangan_absen d on b.no_absensi = d.no_absensi
						left join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '2') c on b.no_absensi = c.no_absensi
						where d.keterangan ='1' and d.no_absensi = $no_absensi
						");
		return $query->result();
	}
	
	public function get_by($from,$to){
		$sql = "select b.*, a.nomor_induk_pengajar, a.nama_pengajar, d.waktu_absen as waktu_masuk, c.waktu_absen as waktu_keluar  
						from pengajar a inner join absen b on a.id_users = b.id_users 
						inner join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '1') d on b.no_absensi = d.no_absensi
						left join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '2') c on b.no_absensi = c.no_absensi
						where b.tanggal_absensi >= '$from' and b.tanggal_absensi <= '$to'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function get_data_pel($kode) {
		$this->load->database();
		$query = $this->db->query("select * from pengajar WHERE nomor_induk_pengajar not in (select nomor_induk_pengajar from guru_mata_pelajaran where kode_pelajaran = '$kode')");
		return $query->result();
	}	
	
	public function get_all() {
		$sql = "select * from pengajar";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_one($id) {
		$sql = "select * from pengajar where nomor_induk_pengajar = '".$id."'";
		$query = $this->db->query($sql);
		return $query->result();
	}
		
	public function insert($data) {
		$insert = $this->db->insert("pengajar",$data);
		return $insert;
	}
		
	public function delete($data) {
		$insert = $this->db->delete("pengajar",$data);
		return $insert;
	}
	
	public function update($id,$data) {
		$insert = $this->db->update('pengajar', $data, "id_users = '".$id."'"); 
		return $insert;
	}
}
?>