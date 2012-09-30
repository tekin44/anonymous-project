<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_spp extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_menu');
		$this->load->model('m_date');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll($this->client_logon[0]->admin_username);
	}

	public function index() {
		$this->load->model('m_siswa');
		$this->data['siswa'] = $this->m_siswa->get_spp();
		$this->data['title'] = "Keuangan Siswa";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_data_keu_siswa', $this->data);
		$this->load->view('v_footer', $this->data);

	}

	public function view_detail($id) {
		$this->load->model('m_siswa');
		$this->load->model('m_dsp');
		$this->load->model('m_tahunan');
		$this->load->model('m_spp');
		$this->data['siswa'] = $this->m_siswa->get_spp($id);
		$this->data['dsp'] = $this->m_dsp->get_history($id);
		$this->data['tahunan'] = $this->m_tahunan->get_history($id);
		$this->data['spp'] = $this->m_spp->get_one($id);
		$this->data['title'] = "Keuangan Siswa";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_detail_keu_siswa', $this->data);
		$this->load->view('v_footer', $this->data);

	}
	
	public function delete_bayar_dsp($id,$tgl,$nis){
		$this->load->model('m_dsp');
		$value['id_dsp'] = $id;
		$value['tanggal_bayar_dsp'] = $tgl;
		$this->m_dsp->delete_bayar($value);
		redirect("c_spp/view_detail/$nis");
	}
	
	public function delete_bayar_tahunan($id,$tgl,$nis){
		$this->load->model('m_tahunan');
		$value['id_tahunan'] = $id;
		$value['tanggal_bayar_tahunan'] = $tgl;
		$this->m_tahunan->delete_bayar($value);
		redirect("c_spp/view_detail/$nis");
	}
	
	public function delete_bayar_spp($bulan,$tahun,$nis){
		$this->load->model('m_spp');
		$value['bulan_spp'] = $bulan;
		$value['tahun_spp'] = $tahun;
		$this->m_spp->delete_bayar($value);
		redirect("c_spp/view_detail/$nis");
	}

	public function edit_keu($id) {
		$this->load->model('m_siswa');
		$this->data['siswa'] = $this->m_siswa->get_spp($id);
		$this->data['title'] = "Keuangan Siswa";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_keuangan_siswa', $this->data);
		$this->load->view('v_footer', $this->data);

	}

	public function submit_keuangan() {
		$this->load->model('m_dsp');
		$this->load->model('m_tahunan');
		$this->load->model('m_spp');
		$nis = $_REQUEST['nomor_induk_siswa'];
		$jml_dsp = $_REQUEST['jumlah_dsp'];
		$jumlah_tahunan = $_REQUEST['jumlah_tahunan'];
		$jumlah_dsp = $_REQUEST['jumlah_spp'];
		$this->m_dsp->insert($nis, $jml_dsp);
		$this->m_tahunan->insert($nis, $jumlah_tahunan);
		$this->m_spp->insert($nis, $jumlah_tahunan);
		redirect('c_spp');
	}

	public function add_dsp($id) {
		$d = 0;
		$m = 0;
		$y = 0;
		$this->data['d'] = $this->m_date->day($d);
		$this->data['m'] = $this->m_date->month($m);
		$this->data['y'] = $this->m_date->year($y);
		$this->load->model('m_dsp');
		$this->data['siswa'] = $this->m_dsp->get_sisa($id);
		$this->data['title'] = "Keuangan Siswa";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_dsp_siswa', $this->data);
		$this->load->view('v_footer', $this->data);

	}

	public function submit_dsp() {
		$this->load->model('m_dsp');
		$d = $_REQUEST['d'];
		$m = $_REQUEST['m'];
		$y = $_REQUEST['y'];
		$value['tanggal_bayar_dsp'] = $this->m_date->merge($d, $m, $y);
		$value['id_dsp'] = $_REQUEST['id_dsp'];
		$value['jumlah_bayar_dsp'] = $_REQUEST['jumlah_bayar_dsp'];
		$this->m_dsp->insert_bayar_dsp($value);
		redirect('c_spp');
	}

	public function submit_tahunan() {
		$this->load->model('m_tahunan');
		$d = $_REQUEST['d'];
		$m = $_REQUEST['m'];
		$y = $_REQUEST['y'];
		$value['tanggal_bayar_tahunan'] = $this->m_date->merge($d, $m, $y);
		$value['id_tahunan'] = $_REQUEST['id_tahunan'];
		$value['jumlah_bayar_tahunan'] = $_REQUEST['jumlah_bayar_tahunan'];
		$this->m_tahunan->insert_bayar_tahunan($value);
		redirect('c_spp');
	}

	public function add_tahunan($id) {
		$this->load->model('m_tahunan');
		$d = 0;
		$m = 0;
		$y = 0;
		$this->data['d'] = $this->m_date->day($d);
		$this->data['m'] = $this->m_date->month($m);
		$this->data['y'] = $this->m_date->year($y);
		$this->data['siswa'] = $this->m_tahunan->get_sisa($id);
		$this->data['title'] = "Keuangan Siswa";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_tahunan_siswa', $this->data);
		$this->load->view('v_footer', $this->data);

	}

	/*public function add_spp($id) {
		$this->load->model('m_spp');
		$this->data['title'] = "Keuangan Siswa";
		$this->data['nomor_induk_siswa'] = $id;
		$this->data['spp'] = $this->m_spp->get_one($id);
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_thn_spp_siswa', $this->data);
		$this->load->view('v_footer', $this->data);

	}*/

	public function add_spp($id,$alert=null) {
		$this->load->model('m_spp');
		$d = 0;
		$m = 0;
		$y = 0;
		$this->data['alert'] = $alert;
		$this->data['d'] = $this->m_date->day($d);
		$this->data['m'] = $this->m_date->month($m);
		$this->data['y'] = $this->m_date->year($y);
		$this->data['title'] = "Keuangan Siswa";
		$this->data['mon'] = $this->m_date->get_month();
		$this->data['id'] = $this->m_spp->get_one($id);
		$this->data['nis'] = $id;		
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_spp_siswa', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function submit_spp() {
		$this->load->model('m_spp');
		$d = $_REQUEST['d'];
		$m = $_REQUEST['m'];
		$y = $_REQUEST['y'];
		$nis = $_REQUEST['nis'];
		$bulan = $_REQUEST['bulan'];
		$value['id_spp'] = $_REQUEST['id_spp'];
		$value['tahun_spp'] = $_REQUEST['tahun_spp'];
		$value['tanggal_bayar_spp'] = $this->m_date->merge($d, $m, $y);
		for ($i = 0; $i < count($bulan); $i++) {
			$value['bulan_spp'] = $bulan[$i];
			$check = $this->m_spp->count($value);
			echo $check;
			if($check > 0){
				$alert = "Bulan ".$bulan[$i]." tahun ke ".$value['tahun_spp']." sudah dibayar sebelumnya";
				redirect("c_spp/add_spp/$nis/$alert");
				return;
			}
			$this->m_spp->insert_bayar($value);
		}
		redirect('c_spp');
	}
}