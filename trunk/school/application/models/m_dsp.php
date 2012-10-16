<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_dsp extends CI_Model {

	public function get_sisa($id) {
		$sql = "select b.jumlah_dsp, (b.jumlah_dsp - sum(jumlah_bayar_dsp)) as sisa_dsp ,b.id_dsp from bayar_dsp a right join dsp b on a.id_dsp = b.id_dsp where b.nomor_induk_siswa = '" . $id . "' GROUP BY b.id_dsp,b.jumlah_dsp";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_history($id) {
		$sql = "select * from dsp a inner join bayar_dsp b on a.id_dsp = b.id_dsp where nomor_induk_siswa = '".$id."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function insert($nis, $jml_dsp) {
		$sql = "select count(*) as count from dsp where nomor_induk_siswa = '" . $nis . "'";
		$query = $this->db->query($sql);
		if ($query->num_rows()<1) {
			$sql = "INSERT into dsp values (nextval('dsp_pk_seq'),'$nis','$jml_dsp')";
			$this->db->query($sql);
		} else {
			$value['jumlah_dsp'] = $jml_dsp;
			$this->db->update('dsp', $value, "nomor_induk_siswa = '" . $nis . "'");
		}
	}

	public function get_detail_nota($id) {
		$sql = "select * from dsp a " .
				"inner join siswa b on a.nomor_induk_siswa = b.nomor_induk_siswa " .
				"inner join kelas c on b.id_kelas = c.id_kelas " .
				"where a.id_dsp = '".$id."'";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function insert_bayar_dsp($value) {
		$this->db->insert('bayar_dsp', $value);
	}

	public function delete_bayar($value) {
		$this->db->delete('bayar_dsp', $value);
	}

	public function update($nis,$jml) {
		$data['jumlah_dsp'] = $jml;
		$this->db->update("dsp",$data,"nomor_induk_siswa = '$nis'");
	}
	
	public function check($nis){
		$sql = "SELECT * FROM dsp WHERE nomor_induk_siswa = '$nis'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}
?>