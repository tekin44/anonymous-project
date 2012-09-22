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
	
	public function tambah_kelas($nama_kelas) {
		$this->db->query("INSERT INTO kelas VALUES (nextval('kelas_pk_seq'),'$nama_kelas')");
		$no = $this->db->query("select currval('kelas_pk_seq') as id_kelas");
		return $no->result();
	}
	
	public function delete_kelas($id_kelas) 
		{
			$this->load->database();
			$query = $this->db->delete("kelas",array("id_kelas"=>$id_kelas));
			return $query;
		}
		
	public function edit_siswa_kelas($id_kelas) {
		$this->load->database();
		$query = $this->db->query("
						select * from kelas where id_kelas = $id_kelas
						");
		return $query->result();
	}
	
	public function get_siswa_kelas($id) {
		$this->load->database();
		$query = $this->db->query(
		"select * from siswa a 
		LEFT JOIN (select nomor_induk_siswa as checked from siswa 
		where id_kelas = $id) b on a.nomor_induk_siswa = b.checked"
		);
		
		
		return $query->result();
	}
	
}
?>