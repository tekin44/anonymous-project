<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_menu extends CI_Model {

	public function getAll() {
		$sql = "select * from menu";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function insertMenu($parent=null,$nama,$action) {
		if($parent)
		$query = $this->db->query("INSERT INTO menu(id_menu,men_id_menu,nama_menu,action_menu) VALUES (nextval('menu_pk_seq'),'$parent','$nama','$action')");
		else
		$query = $this->db->query("INSERT INTO menu(id_menu,nama_menu,action_menu) VALUES (nextval('menu_pk_seq'),'$nama','$action')");
	}

}
?>