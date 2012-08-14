<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_login extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_login');
		$this->client_logon = $this->session->userdata('id_person');
		
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
				if ($user) {		
					$this->session->set_userdata($user);
					switch($user['id_prev']){
						case '1': redirect('index_absensi'); break;
						case '2': redirect('index_sms'); break;
						case '3': redirect('index_spp'); break;
						case '4': redirect('index_nilai'); break;
					}			
				}else{					
					$data['pesan'] = 'Username atau Password salah';
				}
			} else {
				$data['pesan'] = 'Isi username dan password anda';
			}
			$this->load->view('v_login', $data);
		}else{
			redirect('login');
		}
	}

	public function logout() {
		$this->m_login->logout();
		redirect('login');
	}

}