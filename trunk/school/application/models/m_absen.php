<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_absen extends CI_Model {

	public function displayAbsenSiswa(){
			$this->load->database();
			$query = $this->db->query(
			"select keterangan_absen.no_absensi, no_induk_siswa, nama_siswa, keterangan_absen.waktu as waktu_masuk, c.waktu as waktu_keluar  
			from person, siswa, absen, keterangan_absen, (select b.waktu, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '2') c
			where siswa.id_person = person.id_person
			and person.id_person = absen.id_person
			and keterangan_absen.no_absensi = absen.no_absensi
			and absen.no_absensi = c.no_absensi
			and keterangan_absen.keterangan ='1'
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