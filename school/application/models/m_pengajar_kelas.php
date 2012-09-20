<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_pengajar_kelas extends CI_Model {

	public function show_pengajar_kelas() {
		$this->load->database();
		$query = $this->db->query("
						select * from pengajar_kelas
						");
		return $query->result();
	}
	
	public function tambah_pengajar_kelas($nomor_induk_pengajar,$id_kelas,$nilai_kelulusan) {
		$this->load->database();
		$query = $this->db->query("
						insert into pengajar_kelas values ('$nomor_induk_pengajar',$id_kelas,$nilai_kelulusan)
						");
	}
	
	public function delete_pengajar_kelas($nomor_induk_pengajar,$id_kelas) 
		{
			$this->load->database();
			$query = $this->db->delete("pengajar_kelas",array("id_kelas"=>$id_kelas,"nomor_induk_pengajar"=>$nomor_induk_pengajar));
			return $query;
		}
	
}
?>