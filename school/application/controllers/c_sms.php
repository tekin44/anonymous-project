<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_sms extends CI_Controller {
	
	var $data = array();

	function __construct() {
		parent :: __construct();
		$this->load->model('m_sms');
		$this->load->model('m_menu');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll($this->client_logon['id_prev']);
		if($this->client_logon['id_prev']!="smsgw" && $this->client_logon['id_prev']!="admin"){
			$this->redirectto($this->client_logon['id_prev']);
		}
	}

	public function index() {
		/*if($this->client_logon)
		{*/
		$this->data['items'] = $this->m_sms->getLogs();
		$this->data['title'] = "Log Pengiriman Pesan";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_sms', $this->data);
		$this->load->view('v_footer', $this->data);
		/*}
		else
		{
			redirect('login');
		}*/
	}

	public function broadcast_form() {
		$this->load->model('m_kategori');
		$this->data['items'] = $this->m_kategori->displayAbsen();
		$this->data['title'] = "Broadcast SMS";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_broadcast', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function do_broadcast() {
		$this->load->model('m_siswa');
		$this->load->model('m_log_pesan');
		$items = $this->m_siswa->getData($_REQUEST['id_kategori']);
		foreach($items as $item){
			$value['no_tujuan'] = $item->no_tujuan;
			$value['isi_text'] = $_REQUEST['msg'];
			$value['flag'] = 0;
			$this->m_log_pesan->insert($value);
		}
		redirect('sms_broadcast');
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