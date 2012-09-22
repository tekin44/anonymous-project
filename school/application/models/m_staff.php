<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_staff extends CI_Model {

	public function get_all() {
		$sql = "select * from staff";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_one($id) {
		$sql = "select * from staff where nomor_induk_staff = '".$id."'";
		$query = $this->db->query($sql);
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