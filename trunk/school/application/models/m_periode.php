<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_periode extends CI_Model {

	public function get_all() {
		$sql = "SELECT * FROM periode";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_one($id) {
		$sql = "SELECT * FROM periode WHERE id_periode = $id";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function insert($value) {
		$sql = "INSERT INTO periode VALUES (nextval('periode_pk_seq'),'".$value['tahun_periode']."',
				'".$value['periode_semester']."','".$value['awal_periode']."','".$value['akhir_periode']."')";
		$query = $this->db->query($sql);
	}
	
	public function update($id,$value) {
		$query = $this->db->update('periode',$value,'id_periode = '.$id);
	}

}
?>