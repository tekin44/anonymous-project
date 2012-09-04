<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_person extends CI_Model {
	
	function __construct() {
		parent :: __construct();
		$this->load->database();
	}

	public function get_unregister() {
		$query = $this->db->query("select * from person where status_person = '1'");
		return $query->result();
	}

	public function getAllSiswa() {
		$query = $this->db->query("select * from siswa ORDER BY nama_person");
		return $query->result();
	}

	public function getSiswa($id) {
		$query = $this->db->query("select * from siswa where no_induk = '".$id."'");
		return $query->result();
	}
	
	public function getAllStaff($tipe) {
		$query = $this->db->query("select * from staff where tipe_staff = '".$tipe."'");
		return $query->result();
	}
	
	public function getStaff($id) {
		$query = $this->db->query("select * from staff where no_induk = '".$id."'");
		return $query->result();
	}
	
	public function insert_siswa($data) {
		$insert = $this->db->insert("siswa",$data);
		return $insert;
	}
	
	public function edit_siswa($id,$data) {
		$insert = $this->db->update('siswa', $data, "no_induk = '".$id."'"); 
		return $insert;
	}
	
	public function delete_siswa($data) {
		$insert = $this->db->delete('siswa', $data); 
		return $insert;
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
		$insert = $this->db->insert("person",$data);
		return $insert;
	}
	
	public function update($id,$data) {
		$insert = $this->db->update("person",$data,"no_induk = '".$id."'");
		return $insert;
	}
	
	public function delete($data) {
		$insert = $this->db->delete("person",$data);
		return $insert;
	}
	
	public function getKategori() {
		$query = $this->db->query("select * from kategori");
		return $query->result();
	}
	
	public function getSearchNISiswa($key) {
		$query = $this->db->query("select * from siswa where no_induk LIKE '%$key%' ORDER BY no_induk ASC");
		return $query->result();
	}
	
	public function getSearchNIGuru($key) {
		$query = $this->db->query("select * from staff where no_induk LIKE '%$key%' AND tipe_staff = '1' ORDER BY no_induk ASC");
		return $query->result();
	}
	
	public function getSearchNIStaff($key) {
		$query = $this->db->query("select * from staff where no_induk LIKE '%$key%' AND tipe_staff = '2' ORDER BY no_induk ASC");
		return $query->result();
	}
	
	public function getSearchNamaSiswa($key) {
		$query = $this->db->query("select * from siswa 
		where 
		nama_person LIKE '%$key%' OR 
		upper(nama_person) LIKE '%$key%' OR 
		lower(nama_person) LIKE '%$key%' 
		ORDER BY nama_person ASC");
		return $query->result();
	}
	
	public function getSearchNamaGuru($key) {
		$query = $this->db->query("select * from staff 
		where 
		nama_person LIKE '%$key%' OR 
		upper(nama_person) LIKE '%$key%' OR 
		lower(nama_person) LIKE '%$key%' 
		AND tipe_staff = '1'
		ORDER BY nama_person ASC");
		return $query->result();
	}
	
	public function getSearchNamaStaff($key) {
		$query = $this->db->query("select * from staff 
		where 
		nama_person LIKE '%$key%' OR 
		upper(nama_person) LIKE '%$key%' OR 
		lower(nama_person) LIKE '%$key%' 
		AND tipe_staff = '2'
		ORDER BY nama_person ASC");
		return $query->result();
	}
}
?>