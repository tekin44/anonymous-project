<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_person extends CI_Model {
	
	function __construct() {
		parent :: __construct();
		$this->load->database();
	}

	public function getAllSiswa() {
		$query = $this->db->query("select * from siswa");
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
}
?>