<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_pengajar_kelas extends CI_Model {

	public function show_pengajar_kelas($id) {
		$this->load->database();
		$query = $this->db->query("select a.nilai_kelulusan,b.*,c.*,d.* from pengajar_kelas a INNER JOIN kelas b on a.id_kelas = b.id_kelas INNER JOIN pengajar c on a.nomor_induk_pengajar = c.nomor_induk_pengajar INNER JOIN pelajaran d on c.kode_pelajaran = d.kode_pelajaran WHERE a.id_kelas = '".$id."'");
		return $query->result();
	}
	
	public function get_data($id) {
		$this->load->database();
		$query = $this->db->query("select * from pengajar a INNER JOIN pelajaran c on a.kode_pelajaran = c.kode_pelajaran LEFT JOIN (select nomor_induk_pengajar as checked, nilai_kelulusan from pengajar_kelas where id_kelas = ".$id.") b on a.nomor_induk_pengajar = b.checked");
		return $query->result();
	}
	
	public function insert($value) {
		$this->load->database();
		$query = $this->db->insert("pengajar_kelas",$value);
	}
	
	public function delete($value) 
		{
			$this->load->database();
			$query = $this->db->delete("pengajar_kelas",$value);
			return $query;
		}
	
}
?>