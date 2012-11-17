<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_pembayaran extends CI_Model {

	public function get_pembayaran($no) {
		$this->load->database();
		$sql = "SELECT * FROM pembayaran WHERE no_pembayaran = '$no'";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function insert_pembayaran($value){
		$this->db->insert('pembayaran', $value);
	}

	public function get_data_pembayaran($nis){
		$sql = "SELECT * FROM pembayaran WHERE nomor_induk_siswa = '$nis' and status_print = '0'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function printed($no){
		$data = array(
				'status_print' => 1
		);
		$this->db->update('pembayaran', $data, "no_pembayaran = '$no'");
	}
}
?>