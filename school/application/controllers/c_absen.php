<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

	
class c_absen extends CI_Controller {

	function __construct() {
		parent :: __construct();
		//$this->load->model('m_login');
		//$this->client_logon = $this->session->userdata('id_person');
		
	}

	public function index() {
			$this->load->view('v_header');
			$this->load->view('v_absen');
			$this->load->view('v_footer');
	}

	
			

	

}