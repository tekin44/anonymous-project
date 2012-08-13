<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_login extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_login');
		$this->client_logon = $this->session->userdata('logged');
	}

	public function index() {
		if ($this->client_logon) {
			redirect('index');
		} else {
			redirect('login');
		}
	}

	public function login() {
		if (!$this->client_logon) {
			if ($_POST) {
				$user = $this->m_login->validate($_POST['username'], $_POST['password']);

				if ($user == TRUE) {
					redirect('index');
				} else {
					$data['pesan'] = 'Username atau Password salah';
					$this->load->view('v_login', $data);
				}

			} else {
				$this->load->view('v_login');
			}
		}else{
			redirect('index');
		}
	}

	public function logout() {
		$this->m_login->logout();
		redirect('login');
	}

}