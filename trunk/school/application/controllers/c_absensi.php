<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_absensi extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_menu');
		$this->data['menus'] = $this->m_menu->getAll();
		//$this->client_logon = $this->session->userdata('id_person');

	}

	public function index() {
		$this->load->model('m_absen');
		$this->data['rows'] = $this->m_absen->displayAbsenSiswa();
		$this->data['title'] = "Data Absensi";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_absensi', $this->data);
		$this->load->view('v_footer', $this->data);
	}

}