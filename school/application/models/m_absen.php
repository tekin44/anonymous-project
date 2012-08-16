<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_absen extends CI_Model {

	public function displayAbsenSiswa() {
		$this->load->database();
		$query = $this->db->query("select b.no_absensi, a.no_induk, a.nama_person, d.waktu_absen as waktu_masuk, c.waktu_absen as waktu_keluar  
				from person a, absen b, keterangan_absen d, (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '2') c
				where a.no_induk = b.no_induk
				and b.no_absensi = d.no_absensi
				and b.no_absensi = c.no_absensi
				and d.keterangan ='1'
				");
		return $query->result();
	}
	
		public function editAbsensi($no_absensi) {
		$this->load->database();
		$query = $this->db->query("select b.no_absensi, a.no_induk, a.nama_person, d.waktu_absen as waktu_masuk, c.waktu_absen as waktu_keluar  
				from person a, absen b, keterangan_absen d, (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '2') c
				where a.no_induk = b.no_induk
				and b.no_absensi = d.no_absensi
				and b.no_absensi = c.no_absensi
				and d.keterangan = '1'
				and d.no_absensi = $no_absensi
				");
		return $query->result();
	}

	// public function login($user_id) {
	// $CI = & get_instance();
	// $CI->session->set_userdata('logged', $user_id);
	// }

	// public function logout() {
	// $CI = & get_instance();
	// $CI->session->sess_destroy();
	// }

	// public function validate($username, $password) {
	// $query = $this->db->query("select * from users where id_person = '".$username."' and user_pass = '".md5($password)."'");
	// if ($query->num_rows() != 0) {
	// foreach ($query->result() as $row){
	// $client['id_prev'] = $row->id;
	// $client['id_person'] = $row->username;
	// }
	// return $client;
	// } else {
	// return null;
	// }
	// }

}
?>