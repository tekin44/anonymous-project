<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_log_pesan extends CI_Model {

	public function insert($data) {
		$this->db->insert("log_pesan",$data);		
	}
}