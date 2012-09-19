<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_nilai extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_menu');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll($this->client_logon['id_prev']);
		if ($this->client_logon['id_prev'] != "sppap" && $this->client_logon['id_prev'] != "admin") {
			$this->redirectto($this->client_logon['id_prev']);
		}
	}

	public function index() {
		$this->load->model('m_siswa');
		$this->data['siswa'] = $this->m_siswa->get_siswas();
		$this->data['title'] = "Data Nilai";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_data_nilai_siswa', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function show_nilai($id){
		
	}

	function redirectto($prev) {
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
			case 'admin' :
				redirect('index_admin');
				break;
		}
	}

}