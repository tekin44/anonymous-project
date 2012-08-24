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
			$this->data['siswa'] = $this->m_person->getAllSiswa();
			$this->data['title'] = "Data Siswa";
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
		$this->data['guru'] = $this->m_person->getAllStaff(1);
		$this->data['title'] = "Data Guru";
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
		$this->data['staff'] = $this->m_person->getAllStaff(2);
		$this->data['title'] = "Data Staff";
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
		$this->data['flag'] = $flag;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_data_staff', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function edit_siswa() {
		$value = array();
		$result = null;
		$flag = $_REQUEST['flag'];
		$value['nama_person'] = $_REQUEST['nama_person'];
		if($flag==1){
			$value['no_induk'] = $_REQUEST['no_induk'];
			$this->m_person->insert($value);
		}else{
			$this->m_person->update($_REQUEST['no_induk'],$value);		
		}	
		$value['alamat_siswa'] = $_REQUEST['alamat_siswa'];
		$value['nama_orang_tua'] = $_REQUEST['nama_orang_tua'];
		$value['no_hp_siswa'] = $_REQUEST['no_hp_siswa'];
		$value['no_hp_orang_tua'] = $_REQUEST['no_hp_orang_tua'];
		$value['email_siswa'] = $_REQUEST['email_siswa'];
		$value['password'] = md5($_REQUEST['password']);
		if($flag==1)
			$result = $this->m_person->insert_siswa($value);
		else
			$result = $this->m_person->edit_siswa($_REQUEST['no_induk'],$value);
		if($result)
			$this->msg = $this->m_message->show_success("Data Berhasil Disimpan");
		else
			$this->msg = $this->m_message->show_error("Data Gagal Disimpan");
		redirect('data_siswa');	
	}
	
	public function edit_staff() {
		$value = array();
		$result = null;
		$flag = $_REQUEST['flag'];
		$value['nama_person'] = $_REQUEST['nama_person'];
		if($flag==1){
			$value['no_induk'] = $_REQUEST['no_induk'];
			$this->m_person->insert($value);
		}else{
			$this->m_person->update($_REQUEST['no_induk'],$value);		
		}	
		$value['tipe_staff'] = $_REQUEST['tipe_staff'];
		if($flag==1)
			$result = $this->m_person->insert_staff($value);
		else
			$result = $this->m_person->edit_staff($_REQUEST['no_induk'],$value);
		if($result)
			$this->msg = $this->m_message->show_success("Data Berhasil Disimpan");
		else
			$this->msg = $this->m_message->show_error("Data Gagal Disimpan");
		redirect('data_guru');	
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