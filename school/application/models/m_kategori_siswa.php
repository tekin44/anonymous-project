<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_kategori_siswa extends CI_Model {

	public function get_kategori($ni) {
		$this->load->database();
		$query = $this->db->query("select * from kategori a left join " .
				"(select id_kategori as id_kat, nomor_induk_siswa as checked from kategori_siswa where nomor_induk_siswa = '".$ni."') b " .
				"on a.id_kategori = b.id_kat");
		return $query->result();
	}

	public function add($value) {
		$this->load->database();
		$insert = $this->db->insert('kategori_siswa',$value);
		return $insert;
	}

	public function delete($id) {
		$this->load->database();
		$delete = $this->db->delete('kategori_siswa',$id);
		return $delete;
	}
}
?>