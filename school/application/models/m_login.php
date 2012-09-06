<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_login extends CI_Model {

	public function login($user) {
		$CI = & get_instance();
		$CI->session->set_userdata('login',$user);
	}

	public function logout() {
		$CI = & get_instance();
		$CI->session->sess_destroy();
	}

	public function validate($username, $password) {
		$query = $this->db->query("select * from users where user_name = '".$username."' and user_pass = '".md5($password)."'");
		if ($query->num_rows() != 0) {
			foreach ($query->result() as $row){
				$client['id_prev'] = $row->id_prev;
				$client['no_induk'] = $row->no_induk;
			}
			return $client;
		} else {
			return null;
		}
	}

}