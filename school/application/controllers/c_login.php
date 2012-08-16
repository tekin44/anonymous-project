<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_login extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_login');
		$this->client_logon = $this->session->userdata('login');

	}

	public function index() {
		if ($this->client_logon) {
			$this->redirectto($this->client_logon['id_prev']);
		} else {
			redirect('login');
		}
	}

	public function login() {
		if (!$this->client_logon) {
			if ($_POST) {
				$user = $this->m_login->validate($_POST['username'], $_POST['password']);
				if ($user) {
					$this->m_login->login($user);
					$this->redirectto($user['id_prev']);
				} else {
					$data['pesan'] = 'Username atau Password salah';
				}
			} else {
				$data['pesan'] = 'Isi username dan password anda';
			}
			$this->load->view('v_login', $data);
		} else {
			redirect('index');
		}
	}

	public function logout() {
		$this->m_login->logout();
		redirect('login');
	}

	public function redirectto($prev) {
		switch ($prev) {
			case 'absen' :
				redirect('index_absensi');
				break;
			case 'smsgw' :
				redirect('index_sms');
				break;
			case 'sppap' :
				redirect('index_spp');
				break;
			case 'nilai' :
				redirect('index_nilai');
				break;
		}
	}

}