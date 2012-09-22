<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_pelajaran extends CI_Model {

	public function show_pelajaran() {
		$this->load->database();
		$query = $this->db->query("
						select * from pelajaran
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
	
	public function update($kode_pelajaran,$nama_pelajaran) {
		$this->load->database();
		$query = $this->db->query("
						update pelajaran set nama_pelajaran = '$nama_pelajaran' where kode_pelajaran = '$kode_pelajaran'
						");
	}
	
	public function tambah_pelajaran($kode_pelajaran,$nama_pelajaran) {
		$this->load->database();
		$query = $this->db->query("
						insert into pelajaran values ('$kode_pelajaran', '$nama_pelajaran')
						");
	}
	
	public function delete_pelajaran($kode_pelajaran) 
		{
			$this->load->database();
			$query = $this->db->delete("pelajaran",array("kode_pelajaran"=>$kode_pelajaran));
			return $query;
		}
	
}
?>