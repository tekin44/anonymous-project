<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_pesan extends CI_Model {

	public function get_pesans() {
		$this->load->database();
		$query = $this->db->query("select * from pesan a inner join kategori b on a.id_kategori = b.id_kategori");
		return $query->result();
	}

	public function get_pesan($id) {
		$this->load->database();
		$query = $this->db->query("select * from pesan a inner join kategori b on a.id_kategori = b.id_kategori where id_pesan = '".$id."'");
		return $query->result();
	}

	public function insert($value) {
		$this->load->database();
		$query = $this->db->insert("pesan",$value);
		return $query;
	}

	public function edit($value,$id) {
		$this->load->database();
		$query = $this->db->update("pesan",$value,"id_pesan = '".$id."'");
		return $query;
	}
	
	public function delete($data) {
		$insert = $this->db->delete("pesan",$data);
		return $insert;
	}
}
?>