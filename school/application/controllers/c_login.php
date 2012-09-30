<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_login extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_admin');
		$this->client_logon = $this->session->userdata('login');
	}

	public function index() {
		if ($this->client_logon) {
			redirect('siswa');
		} else {
			$this->load->view('v_login');
		}
	}

	public function login() {
		$admin = $this->m_admin->validate($_REQUEST['username'], $_REQUEST['password']);
		if ($admin) {
			$this->session->set_userdata('login', $admin);
			redirect('siswa');
		} else {
			redirect('index');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
}