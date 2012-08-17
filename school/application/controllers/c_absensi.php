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
		$tanggal = $this->input->post('date');
		if ($tanggal == 0)
		{
		$tanggal = CURRENT_DATE;
		$this->load->model('m_absen');
		$this->data['rows'] = $this->m_absen->displayAbsen($tanggal);
		$this->data['rows_tanggal'] = $this->m_absen->getTanggal();
		$this->data['title'] = "Data Absensi";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_absensi', $this->data);
		$this->load->view('v_footer', $this->data);
		}
		
		else
		{
		$tanggal = "'".$tanggal."'";
		$this->load->model('m_absen');
		$this->data['rows'] = $this->m_absen->displayAbsen($tanggal);
		$this->data['rows_tanggal'] = $this->m_absen->getTanggal();
		$this->data['title'] = "Data Absensi";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_absensi', $this->data);
		$this->load->view('v_footer', $this->data);
		}
	}
	
	public function editAbsensi($no_absensi) {
		$this->load->model('m_absen');
		$this->data['rows'] = $this->m_absen->editAbsensi($no_absensi);
		$this->data['title'] = "Edit Data Absensi";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_edit_absensi', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function updateAbsensi() {
		$this->load->model('m_absen');
		$masuk = $this->input->post('checkbox_masuk');
		$keluar = $this->input->post('checkbox_keluar');
		if ($keluar !=NULL)
		{
		$this->m_absen->updateAbsensi();
		}
		redirect(index_absensi);
	}
	
		public function displayBelumAbsen() {
		$this->load->model('m_absen');
		$this->data['rows'] = $this->m_absen->displayBelumAbsen();
		$this->data['title'] = "Data Yang Belum Absen";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_belum_absen', $this->data);
		$this->load->view('v_footer', $this->data);
	}

}