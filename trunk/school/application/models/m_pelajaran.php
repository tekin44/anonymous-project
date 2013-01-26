<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_pelajaran extends CI_Model {

	public function show_pelajaran() {
		$this->load->database();
		$query = $this->db->query("
						select * from pelajaran order by kode_pelajaran ASC
						");
		return $query->result();
	}
	
	public function edit_pelajaran($kode_pelajaran) {
		$this->load->database();
		$query = $this->db->query("
						select * from pelajaran where kode_pelajaran = '$kode_pelajaran'
						");
		return $query->result();
	}
	
	public function update($value) {
		$this->load->database();
		$query = $this->db->update("pelajaran", $value, "kode_pelajaran = '".$value['kode_pelajaran']."'");
	}
	
	public function tambah_pelajaran($value) {
		$this->load->database();
		$query = $this->db->insert("pelajaran", $value);
	}
	
	public function delete_pelajaran($kode_pelajaran) 
		{
			$this->load->database();
			$query = $this->db->delete("pelajaran",array("kode_pelajaran"=>$kode_pelajaran));
			return $query;
		}
	
}
?>