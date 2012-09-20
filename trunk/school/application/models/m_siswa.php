<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_siswa extends CI_Model {

	function __construct() {
		parent :: __construct();
		$this->load->database();
	}
	
	public function get_siswas(){
		$sql = "select * from siswa ORDER BY nama_siswa";
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
	
	public function getAllSiswa() {
		$query = $this->db->query("select * from siswa ORDER BY nama_person");
		return $query->result();
	}

	public function getSiswa($id) {
		$query = $this->db->query("select * from siswa where no_induk = '".$id."'");
		return $query->result();
	}
	
	public function insert_siswa($data) {
		$insert = $this->db->insert("siswa",$data);
		return $insert;
	}
	
	public function edit_siswa($id,$data) {
		$insert = $this->db->update('siswa', $data, "no_induk = '".$id."'"); 
		return $insert;
	}
	
	public function delete_siswa($data) {
		$insert = $this->db->delete('siswa', $data); 
		return $insert;
	}
	
	public function getSearchNISiswa($key1) {
		$query = $this->db->query("select * from siswa where no_induk LIKE '%$key1%' ORDER BY no_induk ASC");
		return $query->result();
	}
	
	public function getSearchNamaSiswa($key2) {
		$query = $this->db->query("select * from siswa 
		where 
		nama_person LIKE '%$key2%' OR 
		upper(nama_person) LIKE '%$key2%' OR 
		lower(nama_person) LIKE '%$key2%' 
		ORDER BY nama_person ASC");
		return $query->result();
	}
}
?>