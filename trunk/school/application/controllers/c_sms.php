<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_sms extends CI_Controller {
	
	var $data = array();

	function __construct() {
		parent :: __construct();
		$this->load->model('m_sms');
		$this->load->model('m_menu');
		$this->data['menus'] = $this->m_menu->getAll();
	}

	public function index() {
		/*if($this->client_logon)
		{*/
		$this->data['logs'] = $this->m_sms->getLogs();
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
		$this->data['title'] = "Broadcast SMS";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_broadcast', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function broadcast() {
		$this->data['logs'] = $this->m_sms->getLogs();
		$this->data['title'] = "Log Pengiriman Pesan";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_sms', $this->data);
		$this->load->view('v_footer', $this->data);
	}
}
?>