<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_kategori extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_menu');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll($this->client_logon['id_prev']);
		if($this->client_logon['id_prev']!="absen" || $this->client_logon['id_prev']!="admin"){
			$this->redirectto($this->client_logon['id_prev']);
		}
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
	
	public function kategoriSiswa() {
		$this->load->model('m_kategori');
		$this->data['rows_kategori'] = $this->m_kategori->getKategori();
		$this->data['title'] = "Tambah Kategori Untuk Siswa";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_kategori_siswa', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function tambahKategoriSiswa() {
		$this->load->model('m_kategori');
		$id = $this->input->post('id_kategori');
		$nis = $this->input->post('nomor_induk');

		$this->m_kategori->tambahKategoriSiswa($id, $nis);
		redirect(index_kategori);
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