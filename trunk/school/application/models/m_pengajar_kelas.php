<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_pengajar_kelas extends CI_Model {

	public function show_pengajar_kelas($id) {
		$this->load->database();
		$query = $this->db->query("select a.nilai_kelulusan,b.*,c.*,d.* from pengajar_kelas a INNER JOIN kelas b on a.id_kelas = b.id_kelas INNER JOIN pengajar c on a.nomor_induk_pengajar = c.nomor_induk_pengajar INNER JOIN pelajaran d on a.kode_pelajaran = d.kode_pelajaran WHERE a.id_kelas = '".$id."'");
		return $query->result();
	}
	
	public function get_data($id=null) {
		$this->load->database();
		$sql = "select * from pengajar a INNER JOIN guru_mata_pelajaran c on a.nomor_induk_pengajar = c.nomor_induk_pengajar INNER JOIN pelajaran b ON c.kode_pelajaran = b.kode_pelajaran ";
		if($id)$sql .= "WHERE b.kode_pelajaran not in (select kode_pelajaran from pengajar_kelas where id_kelas = $id)";
		$query = $this->db->query($sql);
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