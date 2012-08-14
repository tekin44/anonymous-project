<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_login extends CI_Model {

	public function login($user_id) {
		$CI = & get_instance();
		$CI->session->set_userdata('logged', $user_id);
	}

	public function logout() {
		$CI = & get_instance();
		$CI->session->sess_destroy();
	}

	public function validate($username, $password) {
		$query = $this->db->query("select * from users where id_person = '".$username."' and user_pass = '".md5($password)."'");
		if ($query->num_rows() != 0) {
			foreach ($query->result() as $row){
				$client['id_prev'] = $row->id;
				$client['id_person'] = $row->username;
			}
			return $client;
		} else {
			return null;
		}
	}

}