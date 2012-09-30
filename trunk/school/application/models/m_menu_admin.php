<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_menu_admin extends CI_Model {

	public function insert($value) {
		$query = $this->db->insert('menu_admin',$value);
	}

	public function delete($value) {
		$query = $this->db->delete('menu_admin',$value);
	}

}
?>