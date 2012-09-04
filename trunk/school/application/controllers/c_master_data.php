<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_master_data extends CI_Controller {
	
	var $data = array();
	var $msg;

	function __construct() {
		parent :: __construct();
		//$this->load->model('m_staff');
		$this->load->model('m_person');
		$this->load->model('m_message');
		$this->load->model('m_menu');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll($this->client_logon['id_prev']);
		if($this->client_logon['id_prev']!="admin"){
			$this->redirectto($this->client_logon['id_prev']);
		}
	}

	public function show_data_siswa() {
		if($this->client_logon){
			$this->data['result'] = $this->msg;
			$this->data['title'] = "Data Siswa";
			
			$key = $this->input->post('search_field');
			$keynama = $this->input->post('search_fieldnama');
			
			if ($key == NULL && $keynama == NULL)
			{
			$this->data['siswa'] = $this->m_person->getAllSiswa();
			}
			else if ($key != NULL)
			{
			$this->data['siswa'] = $this->m_person->getSearchNISiswa($key);
			}
			else
			{
			$this->data['siswa'] = $this->m_person->getSearchNamaSiswa($keynama);
			}
			
			$this->load->view('v_header', $this->data);
			$this->load->view('v_data_siswa', $this->data);
			$this->load->view('v_footer', $this->data);
		}else{
			redirect('login');
		}
	}
	
	public function show_data_guru() {
		/*if($this->client_logon)*/
		$this->data['result'] = $this->msg;
		$this->data['title'] = "Data Guru";
		
			$key = $this->input->post('search_field');
			$keynama = $this->input->post('search_fieldnama');
			
			if ($key == NULL && $keynama == NULL)
			{
			$this->data['guru'] = $this->m_person->getAllStaff(1);
			}
			else if ($key != NULL)
			{
			$this->data['guru'] = $this->m_person->getSearchNIGuru($key);
			}
			else
			{
			$this->data['guru'] = $this->m_person->getSearchNamaGuru($keynama);
			}
		
		$this->load->view('v_header', $this->data);
		$this->load->view('v_data_guru', $this->data);
		$this->load->view('v_footer', $this->data);
		/*}
		else
		{
			redirect('login');
		}*/
	}
	
	public function show_data_staff() {
		/*if($this->client_logon)*/
		$this->data['result'] = $this->msg;
		$this->data['title'] = "Data Staff";
		
		$key = $this->input->post('search_field');
			$keynama = $this->input->post('search_fieldnama');
			
			if ($key == NULL && $keynama == NULL)
			{
			$this->data['staff'] = $this->m_person->getAllStaff(2);
			}
			else if ($key != NULL)
			{
			$this->data['staff'] = $this->m_person->getSearchNIStaff($key);
			}
			else
			{
			$this->data['staff'] = $this->m_person->getSearchNamaStaff($keynama);
			}
		
		$this->load->view('v_header', $this->data);
		$this->load->view('v_data_staff', $this->data);
		$this->load->view('v_footer', $this->data);
		/*}
		else
		{
			redirect('login');
		}*/
	}

	public function form_siswa($flag,$id=0) {
		$this->load->model('m_person');
		$this->data['items'] = $this->m_person->get_unregister();
		$this->data['rows'] = $this->m_person->getKategori();
		if($flag==1)
			$this->data['title'] = "Tambah Data Siswa";
		else{
			$this->data['title'] = "Edit Data Siswa";
			$this->data['siswa'] = $this->m_person->getSiswa($id);
		}			
		$this->data['flag'] = $flag;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_data_siswa', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function form_staff($flag,$id=0) {
		if($flag==1)
			$this->data['title'] = "Tambah Data Staff";
		else{
			$this->data['title'] = "Edit Data Staff";
			$this->data['staff'] = $this->m_person->getStaff($id);
		}			
		$this->data['row'] = $this->m_person->get_unregister();
		$this->data['flag'] = $flag;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_data_staff', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function edit_siswa() {
		$value = array();
		$result = null;
		$flag = $_REQUEST['flag'];
		$row['nama_person'] = $_REQUEST['nama_person'];
		$row['status_person'] = '2';
		$this->m_person->update($_REQUEST['no_induk'],$row);	
		$value['nama_person'] = $_REQUEST['nama_person'];
		if($flag==1){
			$value['no_induk'] = $_REQUEST['no_induk'];
		}
		$value['alamat_siswa'] = $_REQUEST['alamat_siswa'];
		$value['nama_orang_tua'] = $_REQUEST['nama_orang_tua'];
		$value['no_hp_siswa'] = $_REQUEST['no_hp_siswa'];
		$value['no_hp_orang_tua'] = $_REQUEST['no_hp_orang_tua'];
		$value['email_siswa'] = $_REQUEST['email_siswa'];
		$value['password'] = md5($_REQUEST['password']);
		$kategori = $this->input->post('assign');
		
		foreach ($this->input->post('assign') as $key => $value)
		{
		echo "Index {$key}'s value is {$value}.";
		}
		
		// if($flag==1)
			// $result = $this->m_person->insert_siswa($value);
		// else
			// $result = $this->m_person->edit_siswa($_REQUEST['no_induk'],$value);
		// if($result)
			// $this->msg = $this->m_message->show_success("Data Berhasil Disimpan");
		// else
			// $this->msg = $this->m_message->show_error("Data Gagal Disimpan");
		// redirect('data_siswa');	
	}
	
	public function edit_staff() {
		$value = array();
		$result = null;
		$flag = $_REQUEST['flag'];
		$row['nama_person'] = $_REQUEST['nama_person'];
		$row['status_person'] = '2';
		$this->m_person->update($_REQUEST['no_induk'],$row);
		$value['nama_person'] = $_REQUEST['nama_person'];
		if($flag==1){
			$value['no_induk'] = $_REQUEST['no_induk'];
		}
		$tipe = $_REQUEST['tipe_staff'];
		$value['tipe_staff'] = $tipe;
		if($flag==1)
			$result = $this->m_person->insert_staff($value);
		else
			$result = $this->m_person->edit_staff($_REQUEST['no_induk'],$value);
		if($result)
			$this->msg = $this->m_message->show_success("Data Berhasil Disimpan");
		else
			$this->msg = $this->m_message->show_error("Data Gagal Disimpan");
		if($tipe == '1') redirect('data_guru');
		else redirect('data_staff');
	}
	
	public function delete($tipe,$id) {
		$value = array();
		$value['no_induk'] = $id;
		if($tipe==1){
			$result = $this->m_person->delete_siswa($value);
			$redirect = 'data_siswa';
		}else if($tipe==2){
			$result = $this->m_person->delete_staff($value);	
			$redirect = 'data_guru';	
		}else{
			$result = $this->m_person->delete_staff($value);	
			$redirect = 'data_staff';	
		}
		$this->m_person->delete($value);
		if($result)
			$this->msg = $this->m_message->show_success("Proses Hapus Berhasil");
		else
			$this->msg = $this->m_message->show_error("Proses Hapus Gagal");
		redirect($redirect);	
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
?>