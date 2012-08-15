<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_menu extends CI_Model {

	public function getAll(){
		$sql = "select * from menu";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	
}
?>