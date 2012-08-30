<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_sms extends CI_Controller {
	
	var $data = array();

	function __construct() {
		parent :: __construct();
		$this->load->model('m_sms');
		$this->load->model('m_menu');
		$this->load->model('m_date');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll($this->client_logon['id_prev']);
		if($this->client_logon['id_prev']!="smsgw" && $this->client_logon['id_prev']!="admin"){
			$this->redirectto($this->client_logon['id_prev']);
		}
	}

	public function index() {
		/*if($this->client_logon)
		{*/
		
		$conn = pg_connect("host=localhost port=5432 dbname=sms user=postgres password=rahasia");
		$sql = "SELECT * FROM outbox";
		$query = pg_query($sql);
		$rows = array();
		$i = 0;
		while($row = pg_fetch_array($query)){
			$rows[$i]['DestinationNumber'] = $row['DestinationNumber'];
			$rows[$i]['TextDecode'] = $row['TextDecoded'];
			$rows[$i]['CreatorID'] = $row['CreatorID'];
			$i++;
		}
		$this->data['items'] = $rows;
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
		$this->data['items'] = $this->m_kategori->displayKategori();
		$this->data['title'] = "Broadcast SMS";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_broadcast', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function do_broadcast() {
		$this->load->model('m_siswa');
		$this->load->model('m_log_pesan');
		//$items = $this->m_siswa->getByKategori($_REQUEST['id_kategori']);
		//foreach($items as $item){
			$value['DestinationNumber'] = $_REQUEST['no_tujuan'];//$item->no_hp_orang_tua;
			$value['TextDecoded'] = $_REQUEST['msg'];
			$value['CreatorID'] = "Cepy";
			$this->insert_to_outbox($value);
		//}
		redirect('index_sms');
	}
	
	public function show_scheduled_sms(){
		$this->load->model('m_pesan');
		$this->data['items'] = $this->m_pesan->get_pesans();
		$this->data['title'] = "Scheduled SMS";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_sms_schedule', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function insert_to_outbox($value){
		$conn = pg_connect("host=192.168.17.2 port=5432 dbname=sms user=postgres password=51pB4b4m1");
		$insert = pg_query("INSERT INTO outbox (\"DestinationNumber\",\"TextDecoded\",\"CreatorID\") " .
				"VALUES ('".$value['DestinationNumber']."','".$value['TextDecoded']."','".$value['CreatorID']."')");
	}
	
	public function form_schedule($flag,$id=0){	
		$d = 0;
		$m = 0;
		$y = 0;
		$this->data['d'] = $this->m_date->day($d);
		$this->data['m'] = $this->m_date->month($m);
		$this->data['y'] = $this->m_date->year($y);
		$this->load->model('m_kategori');
		$this->data['kat'] = $this->m_kategori->displayKategori();
		$this->load->model('m_pesan');
		if($flag==1)
			$this->data['title'] = "Tambah SMS Schedule";
		else{
			$this->data['title'] = "Edit SMS Schedule";
			$this->data['item'] = $this->m_pesan->get_pesan($id);
		}			
		$this->data['flag'] = $flag;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_sms', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function edit_pesan() {
		$value = array();
		$result = null;
		$flag = $_REQUEST['flag'];
		$this->load->model('m_pesan');
		if($flag==1){
			$value['id_pesan'] = 0;
		}	
		$d = $_REQUEST['d'];
		$m = $_REQUEST['m'];
		$y = $_REQUEST['y'];
		$value['tgl_pengiriman'] = $this->m_date->merge($d, $m, $y);
		$value['id_kategori'] = $_REQUEST['id_kategori'];
		$value['nama_pesan'] = $_REQUEST['nama_pesan'];
		$value['isi_pesan'] = $_REQUEST['isi_pesan'];
		$value['status_pengiriman'] = '1';
		if($flag==1)
			$result = $this->m_pesan->insert($value);
		else
			$result = $this->m_pesan->edit($_REQUEST['id_pesan'],$value);
		redirect('sms_schedule');	
	}
	
	public function delete($id) {
		$value = array();
		$value['id_pesan'] = $id;
		$value['status_pengiriman'] = '1';
		$this->load->model('m_pesan');
		$result = $this->m_pesan->delete($value);
		redirect('sms_schedule');	
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