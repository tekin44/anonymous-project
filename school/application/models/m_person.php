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
		$query = $this->db->query("select * from staff where no_induk LIKE '%$key1%' AND tipe_staff = '1' ORDER BY no_induk ASC");
		return $query->result();
	}
	
	public function getSearchNIStaff($key1) {
		$query = $this->db->query("select * from staff where no_induk LIKE '%$key1%' AND tipe_staff = '2' ORDER BY no_induk ASC");
		return $query->result();
	}
	
	
	
	public function getSearchNamaGuru($key2) {
		$query = $this->db->query("select * from staff 
		where 
		nama_person LIKE '%$key2%' OR 
		upper(nama_person) LIKE '%$key2%' OR 
		lower(nama_person) LIKE '%$key2%' 
		AND tipe_staff = '1'
		ORDER BY nama_person ASC");
		return $query->result();
	}
	
	public function getSearchNamaStaff($key2) {
		$query = $this->db->query("select * from staff 
		where 
		nama_person LIKE '%$key2%' OR 
		upper(nama_person) LIKE '%$key2%' OR 
		lower(nama_person) LIKE '%$key2%' 
		AND tipe_staff = '2'
		ORDER BY nama_person ASC");
		return $query->result();
	}
}
?>