<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_siswa extends CI_Model {

	function __construct() {
		parent :: __construct();
		$this->load->database();
	}
	
	public function get_siswas(){
		$sql = "select * from siswa ORDER BY nama_person";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getByKategori($kategori) {
		$query = $this->db->query("select * from kategori_siswa a inner join 
				siswa b on a.no_induk = b.no_induk where a.id_kategori = '" . $kategori . "'");
		return $query->result();
	}
	
	public function get_pphone_by_id($id) {
		$query = $this->db->query("select no_hp_orang_tua from siswa where no_induk = '" . $id . "'");
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
	
	public function get_pphone_by_kat($kats) {
		$where = " WHERE ";
		$value = array();
		foreach($kats as $kat){
			$value[] = "id_kategori = '".$kat."'";	
		}
		$where .= implode(' OR ',$value);
		$sql = "SELECT DISTINCT(no_hp_orang_tua) FROM siswa a " .
				"INNER JOIN kategori_siswa b " .
				"ON a.no_induk = b.no_induk".$where;
		$query = $this->db->query($sql);
		return $query->result();
	}
}
?>