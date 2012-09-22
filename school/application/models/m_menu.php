<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_menu extends CI_Model {

	public function getAll($id_prev) {
		if ($id_prev != "admin")
			$sql = "select * from menu where id_prev = '" . $id_prev . "'";
		else
			$sql = "select * from menu";
		$query = $this->db->query($sql);
		return $query->result();
	}

}
?>