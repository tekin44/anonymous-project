<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_menu extends CI_Model {

	public function getAll($admin) {
		$sql = "select a.* from menu a inner join menu_admin b on a.id_menu = b.id_menu where b.admin_username = '$admin'
				union
				select * from menu where men_id_menu is null";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_menu() {
		$sql = "select * from menu where men_id_menu is not null";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_menu_admin($username){
		$sql = "select a.*,b.id_menu as check from menu a 
				left join (select * from menu_admin where admin_username = '$username') b on a.id_menu = b.id_menu 
				where a.men_id_menu is not null";
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