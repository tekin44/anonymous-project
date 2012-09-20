<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_kelas extends CI_Model {

	public function show_kelas() {
		$this->load->database();
		$query = $this->db->query("
						select * from kelas
						");
		return $query->result();
	}
	
	public function edit_kelas($id_kelas) {
		$this->load->database();
		$query = $this->db->query("
						select * from kelas where id_kelas = $id_kelas
						");
		return $query->result();
	}
	
}
?>