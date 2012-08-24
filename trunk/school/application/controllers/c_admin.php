<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_admin extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_menu');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll($this->client_logon['id_prev']);
		if($this->client_logon['id_prev']!="admin"){
			$this->redirectto($this->client_logon['id_prev']);
		}

	}

	public function index() {
	
	//if ($this->client_logon) {
			//$this->redirectto($this->client_logon['id_prev']);
			$this->load->model('m_admin');
			$this->data['rows'] = $this->m_admin->displayUser();
			$this->data['title'] = "Data User";
			$this->load->view('v_header', $this->data);
			$this->load->view('v_admin_display_user', $this->data);
			$this->load->view('v_footer', $this->data);
			
		//} else {
		//	redirect('login');
		//}

	}
	
	public function viewInsertUser() {
		$this->load->model('m_admin');
		$this->data['title'] = "Tambah Data User";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_admin_insert_user', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function insertUser() {
		$this->load->model('m_admin');
		$no_induk = $this->input->post('no_induk');
		$id_prev = $this->input->post('id_prev');
		$user_pass = md5($this->input->post('user_pass'));

		$this->m_admin->insertUser($no_induk, $id_prev, $user_pass);
		redirect(admin_page);
	}
	
	public function editUser($no_induk) {
		$this->load->model('m_admin');
		$this->data['rows'] = $this->m_admin->editUser($no_induk);
		$this->data['title'] = "Edit Data User";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_admin_edit_user', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function deleteUser($no_induk) {
		$this->load->model('m_admin');
		$this->data['rows'] = $this->m_admin->deleteUser($no_induk);
		redirect(admin_page);
	}
	
	public function updateUser() {
		$this->load->model('m_admin');
		$no_induk = $this->input->post('no_induk');
		$id_prev = $this->input->post('id_prev');
		$user_pass = $this->input->post('user_pass');

		$this->m_admin->updateUser($no_induk, $id_prev, $user_pass);
		
		redirect(admin_page);
	}
	
	public function indexMenu() {
			$this->load->model('m_admin');
			$this->data['rows'] = $this->m_admin->displayMenu();
			$this->data['title'] = "Data Menu";
			$this->load->view('v_header', $this->data);
			$this->load->view('v_admin_display_menu', $this->data);
			$this->load->view('v_footer', $this->data);
	}
	
	public function viewInsertMenu() {
		$this->load->model('m_admin');
		$this->data['title'] = "Tambah Menu";
		$this->data['rows_menu'] = $this->m_admin->getIDParentMenu();
		$this->data['rows_prev'] = $this->m_admin->getIDPrev();
		
		$this->load->view('v_header', $this->data);
		$this->load->view('v_admin_insert_menu', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function insertMenu() {
		$this->load->model('m_admin');
		$data['id_menu'] = $this->input->post('id_menu');
		$data['id_prev'] = $this->input->post('id_prev');
		if ($men_id_menu != "")
		{
			$data['men_id_menu'] = $this->input->post('men_id_menu');
		}
		$data['nama_menu'] = $this->input->post('nama_menu');
		$data['action_menu'] = $this->input->post('action_menu');

		$this->m_admin->insertMenu($data);
		redirect(admin_page);
	}
	
	public function editMenu($id_menu) {
		$this->load->model('m_admin');
		$this->data['rows_menu'] = $this->m_admin->getIDParentMenu();
		$this->data['rows_prev'] = $this->m_admin->getIDPrev();
		$this->data['rows'] = $this->m_admin->editMenu($id_menu);
		$this->data['title'] = "Edit Data Menu";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_admin_edit_menu', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	// public function deleteUser($no_induk) {
		// $this->load->model('m_admin');
		// $this->data['rows'] = $this->m_admin->deleteUser($no_induk);
		// redirect(admin_page);
	// }
	
	// public function updateUser() {
		// $this->load->model('m_admin');
		// $no_induk = $this->input->post('no_induk');
		// $id_prev = $this->input->post('id_prev');
		// $user_pass = $this->input->post('user_pass');

		// $this->m_admin->updateUser($no_induk, $id_prev, $user_pass);
		
		// redirect(admin_page);
	// }
	
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