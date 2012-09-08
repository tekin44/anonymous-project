<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_hari_libur extends CI_Model {

	public function get_hari_liburs() {
		$this->load->database();
		$query = $this->db->query("select * from hari_libur ORDER BY tanggal_hari_libur");
		return $query->result();
	}
	
	public function get_hari_libur($id) {
		$this->load->database();
		$query = $this->db->query("select * from hari_libur where id_hari_libur = '".$id."'");
		return $query->result();
	}
	
	public function insert($data) {
		$this->load->database();
		$query = $this->db->insert('hari_libur',$data);
		return $query;
	}
	
	public function edit($id,$data) {
		$this->load->database();
		$query = $this->db->update('hari_libur',$data,"id_hari_libur = '".$id."'");
		return $query;
	}	
	
	public function delete($id) {
		$this->load->database();
		$query = $this->db->delete('hari_libur',array('id_hari_libur'=>$id));
		return $query;
	}
}
?>