<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_spp extends CI_Model {

	public function get_data($id,$thn) {
		$sql = "select * from (select * from generate_series(1,12) as bulan) a left join (select * from spp where tahun_spp = '".$thn."' and nomor_induk_siswa = '".$id."') b on a.bulan = b.bulan_spp::integer ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_one($id) {
		$sql = "select * from spp where nomor_induk_siswa = '".$id."' order by tahun_spp,bulan_spp";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function insert($value) {
		$this->db->insert('spp', $value);
	}

	public function delete($value) {
		$this->db->delete('spp', $value);
	}
}
?>