<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

	
class c_absen_siswa extends CI_Controller {

	function __construct() {
		parent :: __construct();
		//$this->client_logon = $this->session->userdata('id_person');
		
	}

	public function index() {
	
			$this->load->model('m_absen');
			$data['rows'] = $this->m_absen->displayAbsenSiswa();
			
			$this->load->view('v_header',$data);
			$this->load->view('v_absen_siswa',$data);
			$this->load->view('v_footer',$data);
	}

	
			

	

}