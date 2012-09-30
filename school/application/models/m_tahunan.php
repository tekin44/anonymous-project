<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_tahunan extends CI_Model {

	public function get_sisa($id) {
		$sql = "select jumlah_bayar_tahunan as sisa, a.tanggal_bayar_tahunan, b.* from bayar_tahunan a right join tahunan b on a.id_tahunan = b.id_tahunan where b.nomor_induk_siswa = '$id'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_history($id) {
		$sql = "select * from tahunan a inner join bayar_tahunan b on a.id_tahunan = b.id_tahunan where nomor_induk_siswa = '".$id."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_detail_nota($id) {
		$sql = "select * from tahunan a " .
				"inner join siswa b on a.nomor_induk_siswa = b.nomor_induk_siswa " .
				"inner join kelas c on b.id_kelas = c.id_kelas " .
				"where a.id_tahunan = '".$id."'";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function insert($nis, $jml_dsp) {
		$sql = "select count(*) as count from tahunan where nomor_induk_siswa = '" . $nis . "'";
		$query = $this->db->query($sql)->result();
		if ($query[0]->count < 1) {
			$sql = "INSERT into tahunan values (nextval('tahunan_pk_seq'),'$nis','$jml_dsp')";
			$this->db->query($sql);
		} else {
			$value['jumlah_tahunan'] = $jml_dsp;
			$this->db->update('tahunan', $value, "nomor_induk_siswa = '" . $nis . "'");
		}
	}

	public function insert_bayar_tahunan($value) {
		$this->db->insert('bayar_tahunan', $value);
	}

	public function delete_bayar($value) {
		$this->db->delete('bayar_tahunan', $value);
	}
}
?>