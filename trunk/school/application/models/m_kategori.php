<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_kategori extends CI_Model {

	public function displayKategori() 
		{
			$this->load->database();
			$query = $this->db->query("
				select * from kategori
				");
			return $query->result();
		}
	
	public function tambahKategori($id, $nama) 
		{
			$this->load->database();
		
			$query = $this->db->query("
			insert into kategori
			values ('$id', '$nama')
			");
		}
}
?>