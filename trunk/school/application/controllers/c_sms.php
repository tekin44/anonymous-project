<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_sms extends CI_Controller {

	var $data = array ();
	var $rslt = false;

	function __construct() {
		parent :: __construct();
		$this->load->model('m_sms');
		$this->load->model('m_menu');
		$this->load->model('m_date');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll($this->client_logon[0]->admin_username);
	}

	public function index() {
		/*if($this->client_logon)
		{*/

		$conn = pg_connect("host=localhost port=5432 dbname=sms user=postgres password=rahasia");
		$sql = "SELECT * FROM sentitems";
		$query = pg_query($sql);
		$rows = array ();
		$i = 0;
		while ($row = pg_fetch_array($query)) {
			$rows[$i]['destinationnumber'] = $row['destinationnumber'];
			$rows[$i]['textdecoded'] = $row['textdecoded'];
			$rows[$i]['creatorid'] = $row['creatorid'];
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

	public function broadcast_form($res = false) {
		$this->load->model('m_kategori');
		$this->data['kats'] = $this->m_kategori->displayKategori();
		$this->data['title'] = "Broadcast SMS";
		$this->data['result'] = $res;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_broadcast', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function do_broadcast() {
		$this->load->model('m_siswa');
		$isi = $_REQUEST['msg'];
		if (isset ($_REQUEST['kat'])) {
			$rows = $this->m_siswa->get_pphone_by_kat($_REQUEST['kat']);
			foreach ($rows as $row) {
				$value['destinationnumber'] = $row->no_hp_orang_tua;
				$value['textdecoded'] = $isi;
				$value['creatorid'] = "Broadcast";
				$this->insert_to_outbox($value);
			}
			$this->broadcast_form(true);
		}
	}

	public function sent_single() {
		$this->load->model('m_siswa');
		$isi = $_REQUEST['msg'];
			$row = $this->m_siswa->get_pphone_by_id($_REQUEST['no_induk']);
			$value['destinationnumber'] = $row[0]->no_hp_orang_tua;
			$value['textdecoded'] = $isi;
			$value['creatorid'] = "Single";
			$this->insert_to_outbox($value);
			$this->show_single_sms_form(true);
	}

	public function show_single_sms_form($rsl = false) {
		$this->load->model('m_pesan');
		$this->data['title'] = "Kirim Pesan";
		$this->data['result'] = $rsl;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_single_sms', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function show_scheduled_sms() {
		$this->load->model('m_pesan');
		$this->data['items'] = $this->m_pesan->get_pesans();
		$this->data['title'] = "Scheduled SMS";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_sms_schedule', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function insert_to_outbox($value) {
		$conn = pg_connect("host=localhost port=5432 dbname=sms user=postgres password=rahasia");
		$insert = pg_query("INSERT INTO outbox (\"destinationnumber\",\"textdecoded\",\"creatorid\") " .
		"VALUES ('" . $value['destinationnumber'] . "','" . $value['textdecoded'] . "','" . $value['creatorid'] . "')");
		return $insert;
	}

	public function form_schedule($flag, $id = 0) {
		$d = 0;
		$m = 0;
		$y = 0;
		$this->data['d'] = $this->m_date->day($d);
		$this->data['m'] = $this->m_date->month($m);
		$this->data['y'] = $this->m_date->year($y);
		$this->load->model('m_kategori_pesan');
		$this->data['kats'] = $this->m_kategori_pesan->get_kategori($id);
		$this->load->model('m_pesan');
		if ($flag == 1)
			$this->data['title'] = "Tambah SMS Schedule";
		else {
			$this->data['title'] = "Edit SMS Schedule";
			$this->data['item'] = $this->m_pesan->get_pesan($id);
		}
		$this->data['flag'] = $flag;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_sms', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function submit() {
		$flag = $_REQUEST['flag'];
		$this->insert_scheduled($flag);
		$this->add_kategori($flag);
		redirect('sms_schedule');
	}

	public function insert_scheduled($flag) {
		$this->load->model('m_pesan');
		if ($flag == 1) {
			$value['id_pesan'] = 0;
		}
		$d = $_REQUEST['d'];
		$m = $_REQUEST['m'];
		$y = $_REQUEST['y'];
		$value['tgl_pengiriman'] = $this->m_date->merge($d, $m, $y);
		$value['nama_pesan'] = $_REQUEST['nama_pesan'];
		$value['isi_pesan'] = $_REQUEST['isi_pesan'];
		$value['status_pengiriman'] = '1';
		if ($flag == 1)
			$result = $this->m_pesan->insert($value);
		else
			$result = $this->m_pesan->edit($_REQUEST['id_pesan'], $value);
	}

	public function add_kategori($flag) {
		$value['id_pesan'] = $_REQUEST['id_pesan'];
		$kats = $_REQUEST['kat'];
		$this->load->model('m_kategori_pesan');
		if ($flag == '2')
			$this->m_kategori_pesan->delete($value);
		for ($i = 0; $i < count($kats); $i++) {
			$kat = $kats[$i];
			$value['id_kategori'] = $kat;
			if ($flag == '1')
				$this->m_kategori_pesan->add($kat);
			else
				$this->m_kategori_pesan->edit($value);
		}
	}

	public function delete($id) {
		$this->load->model('m_kategori_pesan');
		$value = array ();
		$value['id_pesan'] = $id;
		$this->m_kategori_pesan->delete($value);
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