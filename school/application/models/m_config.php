<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_config extends CI_Model {

	var $table = 'config';
	var $pk = 'id_config';

	public function get_configs() {
		$this->load->database();
		$query = $this->db->query("select * from ".$this->table);
		return $query->result();
	}
	
	public function insert($data) {
		$this->load->database();
		$query = $this->db->insert($this->table,$data);
		return $query;
	}
	
	public function edit($id,$data) {
		$this->load->database();
		$query = $this->db->update($this->table,$data,$this->pk." = '".$id."'");
		return $query;
	}	
	
	public function delete($id) {
		$this->load->database();
		$query = $this->db->delete($this->table,array($this->pk=>$id));
		return $query;
	}
}
?>