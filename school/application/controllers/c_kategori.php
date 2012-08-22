<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_kategori extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_menu');
		$this->data['menus'] = $this->m_menu->getAll();
		//$this->client_logon = $this->session->userdata('id_person');

	}

	public function index() {
		$this->load->model('m_kategori');
		$this->data['rows'] = $this->m_kategori->displayKategori();
		$this->data['title'] = "Data Kategori";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_kategori', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function viewTambahKategori() {
		$this->load->model('m_kategori');
		$this->data['title'] = "Tambah Kategori";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_tambah_kategori', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function tambahKategori() {
		$this->load->model('m_kategori');
		$id = $this->input->post('id_kategori');
		$nama = $this->input->post('nama_kategori');

		$this->m_kategori->tambahKategori($id, $nama);
		
		redirect(index_kategori);
	}

}