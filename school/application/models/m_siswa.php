<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_siswa extends CI_Model {

	function __construct() {
		parent :: __construct();
		$this->load->database();
	}

	public function getByKategori($kategori) {
		$query = $this->db->query("select * from kategori_siswa a inner join 
				siswa b on a.no_induk = b.no_induk where a.id_kategori = '" . $kategori . "'");
		return $query->result();
	}
	
	public function check($id){
		$query = $this->db->query("select count(*) as c from siswa where no_induk = '" . $id . "'");
		$c = $query->result();
		if($c[0]->c == 0)
			return false;
		else
			return true;
	}
}
?>