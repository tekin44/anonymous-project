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
		$query = $this->db->get_where('login', array (
			'username' => $username
		));
		$cek = $query->num_rows();
		if ($cek != 0) {
			foreach ($query->result() as $row)
				: $client['id_client'] = $row->id;
			$client['username'] = $row->username;
			$client['password'] = $row->password;
			endforeach;

			$passmd5 = md5($password);

			if ($passmd5 == $client['password']) {
				$this->login($client['id_client']);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

}