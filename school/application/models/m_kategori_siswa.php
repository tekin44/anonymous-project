<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_kategori_siswa extends CI_Model {

	public function get_kategori($ni) {
		$this->load->database();
		$query = $this->db->query("select * from kategori a left join " .
				"(select id_kategori as id_kat, nomor_induk_siswa as checked from kategori_siswa where nomor_induk_siswa = '".$ni."') b " .
				"on a.id_kategori = b.id_kat");
		return $query->result();
	}
	
	public function get_kategori_siswa($id){
		$sql = "select * from kategori a left join 
				kategori_siswa b on a.id_kategori = b.id_kategori 
				left join siswa c on b.nomor_induk_siswa = c.nomor_induk_siswa
				where a.id_kategori = $id";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_siswa_not_in_kategori($id){
		$sql = "select nomor_induk_siswa, nama_siswa from siswa";
		if($id!=0) $sql .= " where nomor_induk_siswa not in (select nomor_induk_siswa from kategori_siswa where id_kategori = $id)";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function add($value) {
		$this->load->database();
		$insert = $this->db->insert('kategori_siswa',$value);
		return $insert;
	}

	public function delete($id) {
		$value['id_kategori'] = $id;
		$delete = $this->db->delete('kategori_siswa',$value);
		return $delete;
	}

	public function delete_siswa($value) {
		$delete = $this->db->delete('kategori_siswa',$value);
		return $delete;
	}
}
?>