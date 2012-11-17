<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_staff extends CI_Model {

	public function get_all() {
		$sql = "select * from staff";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_by($from,$to){
		$sql = "select b.*, a.nomor_induk_staff, a.nama_staff, d.waktu_absen as waktu_masuk, c.waktu_absen as waktu_keluar  
						from staff a inner join absen b on a.id_users = b.id_users 
						inner join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '1') d on b.no_absensi = d.no_absensi
						left join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '2') c on b.no_absensi = c.no_absensi
						where b.tanggal_absensi >= '$from' and b.tanggal_absensi <= '$to'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_one($id) {
		$sql = "select * from staff where nomor_induk_staff = '".$id."'";
		$query = $this->db->query($sql);
		return $query->result();
	}	
	
	public function get_absen($src=null) {
		$this->load->database();
		$where_clause = "where b.tanggal_absensi = '".$src['tanggal']."' ";
		if($src['nama_staff']) $where_clause .= "AND a.nama_staff ILIKE '%".$src['nama_staff']."%' ";
		if($src['nomor_induk_staff']) $where_clause .= "AND a.nomor_induk_staff ILIKE '%".$src['nomor_induk_staff']."%' ";
		$query = $this->db->query("select b.*, a.nomor_induk_staff, a.nama_staff, d.waktu_absen as waktu_masuk, c.waktu_absen as waktu_keluar  
						from staff a inner join absen b on a.id_users = b.id_users 
						inner join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '1') d on b.no_absensi = d.no_absensi
						left join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '2') c on b.no_absensi = c.no_absensi
						$where_clause ORDER BY a.nama_staff
						");
		return $query->result();
	}
		
	public function insert($data) {
		$insert = $this->db->insert("staff",$data);
		return $insert;
	}
		
	public function delete($data) {
		$insert = $this->db->delete("staff",$data);
		return $insert;
	}
	
	public function update($id,$data) {
		$insert = $this->db->update('staff', $data, "id_users = '".$id."'"); 
		return $insert;
	}
}
?>