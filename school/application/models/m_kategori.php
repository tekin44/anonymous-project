<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_kategori extends CI_Model {

	public function displayKategori() {
		$this->load->database();
		$query = $this->db->query("
					select * from kategori
					");
		return $query->result();
	}

	public function tambahKategori($nama) {
		$this->load->database();

		$query = $this->db->query("
				insert into kategori
				values ('$nama',nextval('kategori_pk_seq'))
				");
		$no = $this->db->query("select currval('kategori_pk_seq') as id_kategori");
		return $no->row();
	}

	public function update($id,$nama) {
		$data['nama_kategori'] = $nama;
		$query = $this->db->update("kategori",$data,"id_kategori = '".$id."'");
	}

	public function delete($id) {
		$data['id_kategori'] = $id;
		$query = $this->db->delete("kategori",$data);
	}

	public function getKategori($id) {
		$this->load->database();
		$query = $this->db->query("select * from kategori " .
				"where id_kategori = '" . $id . "'");
		return $query->result();
	}

	public function tambahKategoriSiswa($value) {
		$this->load->database();
		$insert = $this->db->insert('kategori_siswa',$value);
		return $insert;
	}
	
	public function searchIdKategori($key1) {
		$query = $this->db->query("select * from kategori
		where 
		id_kategori LIKE '%$key1%' OR 
		upper(id_kategori) LIKE '%$key1%' OR 
		lower(id_kategori) LIKE '%$key1%' 
		ORDER BY id_kategori ASC");
		return $query->result();
	}
	
	public function searchNamaKategori($key2) {
		$query = $this->db->query("select * from kategori
		where 
		nama_kategori LIKE '%$key2%' OR 
		upper(nama_kategori) LIKE '%$key2%' OR 
		lower(nama_kategori) LIKE '%$key2%' 
		ORDER BY nama_kategori ASC");
		return $query->result();
	}
}
?>