<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_spp extends CI_Model {

	public function get_data($id,$thn) {
		$sql = "select * from (select * from generate_series(1,12) as bulan) a left join (select * from bayar_spp where id_spp = '$id' and tahun_spp = '$thn') b on a.bulan = b.bulan_spp::integer";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_one($id) {
		$sql = "select * from bayar_spp a right join spp b on a.id_spp = b.id_spp where nomor_induk_siswa = '".$id."' order by tahun_spp,bulan_spp";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_detail_nota($id) {
		$sql = "select * from spp a " .
				"inner join siswa b on a.nomor_induk_siswa = b.nomor_induk_siswa " .
				"inner join kelas c on b.id_kelas = c.id_kelas " .
				"where a.id_spp = '".$id."'";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function insert($nis,$jml) {
		$sql = "INSERT INTO spp VALUES (nextval('spp_pk_seq'),'$nis',$jml)";
		$this->db->query($sql);
	}

	public function insert_bayar($value) {
		$this->db->insert('bayar_spp', $value);
	}

	public function delete_bayar($value) {
		$this->db->delete('bayar_spp', $value);
	}

	public function delete($value) {
		$this->db->delete('spp', $value);
	}
	
	public function count($value){
		$this->db->from('bayar_spp');
		$this->db->where($value);
		return $this->db->count_all_results();
	}
}
?>