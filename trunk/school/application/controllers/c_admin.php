<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_admin extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_menu');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll();
	}

	public function index() {

		//if ($this->client_logon) {
		//$this->redirectto($this->client_logon['id_prev']);
		$this->load->model('m_admin');
		$this->data['title'] = "Data User";

		$key1 = $this->input->post('search_field1');
		//$key2 = $this->input->post('search_field2');

		// if ($key1 == NULL && $key2 == NULL) {
			// $this->data['rows'] = $this->m_admin->displayUser();
		// } else
			// if ($key1 != NULL) {
				// $this->data['rows'] = $this->m_admin->searchNamaUser($key1);
			// } else {
				// $this->data['rows'] = $this->m_admin->searchWewenangUser($key2);
			// }
			
		if ($key1 == NULL) {
			$this->data['rows'] = $this->m_admin->displayUser();
		} else{
				$this->data['rows'] = $this->m_admin->searchNamaUser($key1);
			}
	

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
		$admin_username = $this->input->post('admin_username');
		$admin_password = md5($this->input->post('admin_password'));

		$this->m_admin->insertUser($admin_username, $admin_password);
		redirect(index_admin);
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
		redirect(index_admin);
	}

	public function updateUser() {
		$this->load->model('m_admin');
		$value['admin_username'] = $this->input->post('admin_username1');
		$admin_username = $this->input->post('admin_username2');
		$value['admin_password'] = md5($this->input->post('admin_password'));

		$this->m_admin->updateUser($admin_username, $value);

		redirect(index_admin);
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

		$this->load->view('v_header', $this->data);
		$this->load->view('v_admin_insert_menu', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function insertMenu() {
		$this->load->model('m_menu');
		if ($this->input->post('men_id_menu') != "no")
			$this->m_menu->insertMenu($this->input->post('men_id_menu'), $this->input->post('nama_menu'), "/school/" .
			$this->input->post('action_menu'));
		else
			$this->m_menu->insertMenu(null,$this->input->post('nama_menu'), "/school/" .
			$this->input->post('action_menu'));
		redirect(index_admin_menu);
	}

	public function editMenu($id_menu) {
		$this->load->model('m_admin');
		$this->data['rows_menu'] = $this->m_admin->getIDParentMenu();
		$this->data['rows'] = $this->m_admin->editMenu($id_menu);
		$this->data['title'] = "Edit Data Menu";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_admin_edit_menu', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function deleteMenu($id_menu) {
		$this->load->model('m_admin');
		$result = $this->m_admin->deleteMenu($id_menu);
		redirect(index_admin_menu);
	}

	public function updateMenu() {
		$this->load->model('m_admin');
		$id_menu = $this->input->post('id_menu');
		$data['men_id_menu'] = $this->input->post('men_id_menu');
		if ($data['men_id_menu'] == "no")
			$data['men_id_menu'] = null;
		$data['nama_menu'] = $this->input->post('nama_menu');
		$data['action_menu'] = "/school/" . $this->input->post('action_menu');

		$this->m_admin->updateMenu($data, $id_menu);

		redirect(index_admin_menu);
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