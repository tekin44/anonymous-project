<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_person extends CI_Model {
	
	function __construct() {
		parent :: __construct();
		$this->load->database();
	}

	public function get_unregister() {
		$query = $this->db->query("select * from users where status_users = '1'");
		return $query->result();
	}
		
	public function insert_staff($data) {
		$insert = $this->db->insert("staff",$data);
		return $insert;
	}
	
	public function edit_staff($id,$data) {
		$insert = $this->db->update('staff', $data, "no_induk = '".$id."'"); 
		return $insert;
	}
	
	public function delete_staff($data) {
		$insert = $this->db->delete('staff', $data); 
		return $insert;
	}
	
	public function insert($data) {
		$insert = $this->db->insert("users",$data);
		return $insert;
	}
	
	public function update($id,$data) {
		$insert = $this->db->update("users",$data,"id_users = '".$id."'");
		return $insert;
	}
	
	public function delete($data) {
		$insert = $this->db->delete("users",$data);
		return $insert;
	}
	
	public function getKategori() {
		$query = $this->db->query("select * from kategori");
		return $query->result();
	}
	

	
	public function getSearchNIGuru($key1) {
		$query = $this->db->query("select * from pengajar where nomor_induk_pengajar ILIKE '%$key1%' ORDER BY nama_pengajar ASC");
		return $query->result();
	}
	
	public function getSearchNIStaff($key1) {
		$query = $this->db->query("select * from staff where nomor_induk_staff ILIKE '%$key1%' ORDER BY nama_staff ASC");
		return $query->result();
	}
	
	
	
	public function getSearchNamaGuru($key2) {
		$query = $this->db->query("select * from pengajar 
		where 
		nama_pengajar ILIKE '%$key2%' OR 
		upper(nama_pengajar) ILIKE '%$key2%' OR 
		lower(nama_pengajar) ILIKE '%$key2%' 
		ORDER BY nama_pengajar ASC");
		return $query->result();
	}
	
	public function getSearchNamaStaff($key2) {
		$query = $this->db->query("select * from staff 
		where 
		nama_staff ILIKE '%$key2%' OR 
		upper(nama_staff) ILIKE '%$key2%' OR 
		lower(nama_staff) ILIKE '%$key2%' 
		ORDER BY nama_staff ASC");
		return $query->result();
	}
}
?>