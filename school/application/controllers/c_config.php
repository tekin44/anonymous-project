<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_config extends CI_Controller {

	var $data = array ();
	var $result;

	function __construct() {
		parent :: __construct();
		//$this->load->model('m_staff');
		$this->load->model('m_message');
		$this->load->model('m_date');
		$this->load->model('m_menu');
		$this->client_logon = $this->session->userdata('login');/*
		$this->data['menus'] = $this->m_menu->getAll($this->client_logon['id_prev']);
		if($this->client_logon['id_prev']!="admin"){
			$this->redirectto($this->client_logon['id_prev']);
		}*/
	}

	public function show_hari_libur() {
		/*if($this->client_logon)*/
		$this->load->model('m_hari_libur');
		$this->data['result'] = $this->result;
		$this->data['libur'] = $this->m_hari_libur->get_hari_liburs();
		$this->data['title'] = "Hari Libur";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_hari_libur', $this->data);
		$this->load->view('v_footer', $this->data);
		/*}
		else
		{
			redirect('login');
		}*/
	}

	public function form_hari_libur($flag, $id = 0) {
		$d = 0;
		$m = 0;
		$y = 0;
		if ($flag == 1)
			$this->data['title'] = "Tambah Data Hari Libur";
		else {
			$this->data['title'] = "Edit Data Hari Libur";
			$this->load->model('m_hari_libur');
			$libur = $this->m_hari_libur->get_hari_libur($id);
			$d = date('j', strtotime($libur[0]->tanggal_hari_libur));
			$m = date('n', strtotime($libur[0]->tanggal_hari_libur));
			$y = date('Y', strtotime($libur[0]->tanggal_hari_libur));
			$this->data['item'] = $libur;
		}
		$this->data['d'] = $this->m_date->day($d);
		$this->data['m'] = $this->m_date->month($m);
		$this->data['y'] = $this->m_date->year($y);
		$this->data['flag'] = $flag;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_hari_libur', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function edit_hari_libur() {
		$value = array ();
		$result = null;
		$flag = $_REQUEST['flag'];
		$this->load->model('m_hari_libur');
		$value['ket_hari_libur'] = $_REQUEST['ket_hari_libur'];
		$d = $_REQUEST['d'];
		$m = $_REQUEST['m'];
		$y = $_REQUEST['y'];
		$value['tanggal_hari_libur'] = $this->m_date->merge($d, $m, $y);
		if ($flag == 1) {
			$result = $this->m_hari_libur->insert($_REQUEST['ket_hari_libur'],$value['tanggal_hari_libur']);
		} else
			$result = $this->m_hari_libur->edit($_REQUEST['id_hari_libur'], $value);
		if ($result)
			$this->msg = $this->m_message->show_success("Data Berhasil Disimpan");
		else
			$this->msg = $this->m_message->show_error("Data Gagal Disimpan");
		redirect('hari_libur');
	}

	public function delete_hari_libur($id) {
		$this->load->model('m_hari_libur');
		$result = $this->m_hari_libur->delete($id);
		if ($result)
			$this->msg = $this->m_message->show_success("Data Berhasil Disimpan");
		else
			$this->msg = $this->m_message->show_error("Data Gagal Disimpan");
		redirect('hari_libur');
	}

	public function show_config() {
		$this->load->model('m_config');
		$this->data['result'] = $this->result;
		$this->data['items'] = $this->m_config->get_configs();
		$this->data['title'] = "Configurasi";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_config', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function form_config() {
		$this->data['title'] = "Edit Configurasi";
		$this->load->model('m_config');
		$this->data['item'] = $this->m_config->get_configs();
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_config', $this->data);
		$this->load->view('v_footer', $this->data);
	}	

	public function edit_config() {
		$value = array ();
		$result = null;
		$this->load->model('m_config');
		$value['pesan_telat'] = $_REQUEST['msg_telat'];
		$value['pesan_absen'] = $_REQUEST['msg_tidak_masuk'];
		$value['no_kepsek'] = $_REQUEST['no_kepsek'];
		$value['no_kepsek2'] = $_REQUEST['no_kepsek_2'];
		$result = $this->m_config->edit(1, $value);
		if ($result)
			$this->msg = $this->m_message->show_success("Data Berhasil Disimpan");
		else
			$this->msg = $this->m_message->show_error("Data Gagal Disimpan");
		redirect('config');
	}
	
	public function show_mesin() {
		$this->load->model('m_mesin_absensi');
		$this->data['result'] = $this->result;
		$this->data['items'] = $this->m_mesin_absensi->get_mesins();
		$this->data['title'] = "Mesin Absensi";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_mesin', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function turn_mesin($state,$id){
		if($state=="0"){
			$value['status_mesin'] = '1';
			exec('\school\exe\EngineMesin'.$id.'.exe');
		}else
			$value['status_mesin'] = '0';
		$this->load->model('m_mesin_absensi');
		$this->m_mesin_absensi->edit($id,$value);
		redirect("mesin_absensi");
	}

	public function form_mesin($id) {
		$this->data['title'] = "Edit Mesin";
		$this->load->model('m_mesin_absensi');
		$this->data['item'] = $this->m_mesin_absensi->get_mesin($id);
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_mesin', $this->data);
		$this->load->view('v_footer', $this->data);
	}	

	public function edit_mesin() {
		$value = array ();
		$result = null;
		$this->load->model('m_mesin_absensi');
		$value['ip_address'] = $_REQUEST['ip_address'];
		$value['port_mesin'] = $_REQUEST['port_mesin'];
		$value['status_mesin'] = 0;
		$result = $this->m_mesin_absensi->edit($_REQUEST['id_mesin'], $value);
		if ($result)
			$this->msg = $this->m_message->show_success("Data Berhasil Disimpan");
		else
			$this->msg = $this->m_message->show_error("Data Gagal Disimpan");
		redirect('mesin_absensi');
	}
}
?>