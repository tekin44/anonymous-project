<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_siswa extends CI_Model {

	function __construct() {
		parent :: __construct();
		$this->load->database();
	}

	public function getData($kategori) {
		$query = $this->db->query("select * from kategori_siswa a inner join 
				siswa b on a.no_induk = b.no_induk where a.id_kategori = '" . $kategori . "'");
		return $query->result();
	}
}
?>