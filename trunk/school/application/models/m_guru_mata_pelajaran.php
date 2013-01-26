<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_guru_mata_pelajaran extends CI_Model {
	
	public function insert($value) {
		$this->load->database();
		$query = $this->db->insert('guru_mata_pelajaran',$value);
		return $query;
	}
	
	public function delete($value) {
		$this->load->database();
		$query = $this->db->delete('guru_mata_pelajaran',$value);
		return $query;
	}

	public function get_data($kode_pelajaran=null) {
		$this->load->database();
		$sql = "SELECT b.*, c.* FROM guru_mata_pelajaran a INNER JOIN pengajar c ON 
			a.nomor_induk_pengajar = c.nomor_induk_pengajar RIGHT JOIN pelajaran b ON
			a.kode_pelajaran = b.kode_pelajaran";
		if($kode_pelajaran)$sql .=  " WHERE b.kode_pelajaran = '$kode_pelajaran'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
?>