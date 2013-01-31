<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_nilai extends CI_Model {

	public function get_nilai($nis) {
		$this->load->database();
		$query = $this->db->query("
						select * from siswa a 
						left join raport b on a.nomor_induk_siswa = b.nomor_induk_siswa
						left join pengajar c on b.nomor_induk_pengajar = c.nomor_induk_pengajar
						left join pelajaran d on b.kode_pelajaran = d.kode_pelajaran
						inner join kelas e on a.id_kelas = e.id_kelas where 
						a.nomor_induk_siswa = '$nis'
						");
		return $query->result();
	}
	
	public function edit_nilai($nis,$nip,$id_kelas) {
		$this->load->database();
		$query = $this->db->query("
						select * from raport where nomor_induk_siswa = '$nis' and nomor_induk_pengajar = '$nip' and id_kelas = $id_kelas 
						");
		return $query->result();
	}
	
	public function update($nis,$id_kelas,$nip,$nilai) {
		$this->load->database();
		$query = $this->db->query("
						update raport set nilai_raport = $nilai where nomor_induk_siswa = '$nis' and id_kelas = $id_kelas and nomor_induk_pengajar = '$nip'
						");
	}
	
	public function tambah_nilai($nip,$id_kelas,$nis,$nilai) {
		$this->load->database();
		$query = $this->db->query("
						insert into raport values ('$nip',$id_kelas,'$nis',$nilai)
						");
	}
	
	public function delete_nilai($nip,$id_kelas,$nis) 
	{
		$this->load->database();
		$query = $this->db->delete("raport",array("nomor_induk_pengajar"=>$nip,"id_kelas"=>$id_kelas,"nomor_induk_siswa"=>$nis));
		return $query;
	}
	
	public function get_kelas() {
		$this->load->database();
		$query = $this->db->query("
						select * from kelas
						");
		return $query->result();
	}
}
?>