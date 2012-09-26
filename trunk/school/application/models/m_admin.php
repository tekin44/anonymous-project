<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_admin extends CI_Model {

	function validate($username, $password) {
		$sql = "select * from admin where admin_username = '" . $username . "' and admin_password = md5('" . $password . "')";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function displayUser() {
		$this->load->database();
		$query = $this->db->query("
					select * from admin
					");
		return $query->result();
	}

	public function insertUser($admin_username, $admin_password) {
		$this->load->database();

		$query = $this->db->query("
				insert into admin
				values ('$admin_username', md5('$admin_password'))
				");
	}

	public function editUser($no_induk) {
		$this->load->database();
		$query = $this->db->query("select * from admin where admin_username = '$no_induk'");
		return $query->result();
	}

	public function deleteUser($no_induk) {
		$this->load->database();
		$query = $this->db->query("delete from admin where admin_username = '$no_induk'");
	}

	public function updateUser($id, $value) {
		$this->load->database();
		$query = $this->db->update('admin',$value,"admin_username = '$id'");
	}

	public function displayMenu() {
		$this->load->database();
		$query = $this->db->query("
					select a.id_menu, b.nama_menu as parent, a.nama_menu, a.action_menu from menu a left join (select * from menu) b on a.men_id_menu = b.id_menu ORDER BY b.nama_menu
					");
		return $query->result();
	}

	public function getIDParentMenu() {
		$this->load->database();
		$query = $this->db->query("
					select * from menu where men_id_menu is null
					");
		return $query->result();
	}

	public function getIDPrev() {
		$this->load->database();
		$query = $this->db->query("
					select id_prev from previlege
					");
		return $query->result();
	}

	public function editMenu($id_menu) {
		$this->load->database();
		$query = $this->db->query("select * from menu where id_menu = '" . $id_menu . "'");
		return $query->result();
	}

	// public function deleteUser($no_induk) 
	// {
	// $this->load->database();
	// $query = $this->db->query("delete from users where no_induk = '$no_induk'");
	// }

	public function deleteMenu($id) {
		$this->load->database();
		$query = $this->db->delete("menu", array (
			"id_menu" => $id
		));
		return $query;
	}

	public function updateMenu($data, $id) {
		$this->load->database();
		$query = $this->db->update("menu", $data, "id_menu = '" . $id . "'");
	}

	public function searchNamaUser($key1) {
		$query = $this->db->query("select * from admin
				where 
				admin_username LIKE '%$key1%' OR 
				upper(admin_username) LIKE '%$key1%' OR 
				lower(admin_username) LIKE '%$key1%' 
				ORDER BY admin_username ASC");
		return $query->result();
	}

	// public function searchWewenangUser($key2) {
		// $query = $this->db->query("select * from users a inner join person b on a.no_induk = b.no_induk
				// where 
				// id_prev LIKE '%$key2%' OR 
				// upper(id_prev) LIKE '%$key2%' OR 
				// lower(id_prev) LIKE '%$key2%' 
				// ORDER BY id_prev ASC");
		// return $query->result();
	// }
}
?>