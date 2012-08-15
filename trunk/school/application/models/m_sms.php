<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_sms extends CI_Model {

	public function getLogs(){
		$sql = "select * from log";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	
}
?>