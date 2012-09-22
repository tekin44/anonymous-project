<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_kategori_pesan extends CI_Model {

	public function get_kategori($ni) {
		$this->load->database();
		$query = $this->db->query("select * from kategori a left join " .
				"(select id_kategori as id_kat, id_pesan as checked from kategori_pesan where id_pesan = '".$ni."') b " .
				"on a.id_kategori = b.id_kat");
		return $query->result();
	}

	public function add($id) {
		$this->load->database();
		$sql = "INSERT INTO kategori_pesan VALUES ('".$id."',currval('pesan_pk_seq'))";
		$insert = $this->db->query($sql);
		return $insert;
	}

	public function edit($value) {
		$this->load->database();
		$query = $this->db->insert("kategori_pesan",$value);
		return $query;
	}

	public function delete($id) {
		$this->load->database();
		$delete = $this->db->delete('kategori_pesan',$id);
		return $delete;
	}
}
?>