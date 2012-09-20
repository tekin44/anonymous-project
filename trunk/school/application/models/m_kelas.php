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
	
	public function update($id_kelas,$nama_kelas) {
		$this->load->database();
		$query = $this->db->query("
						update kelas set nama_kelas = '$nama_kelas' where id_kelas = $id_kelas
						");
	}
	
	public function tambah_kelas($id_kelas,$nama_kelas) {
		$this->load->database();
		$query = $this->db->query("
						insert into kelas values ($id_kelas, '$nama_kelas')
						");
	}
	
	public function delete_kelas($id_kelas) 
		{
			$this->load->database();
			$query = $this->db->delete("kelas",array("id_kelas"=>$id_kelas));
			return $query;
		}
	
}
?>