<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_absensi extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_menu');
		$this->client_logon = $this->session->userdata('login');
	}

	public function index($src = null) {
		if ($_POST) {
			$d = $_REQUEST['d'] ? $_REQUEST['d'] : null;
			$m = $_REQUEST['m'] ? $_REQUEST['m'] : null;
			$y = $_REQUEST['y'] ? $_REQUEST['y'] : null;
			$src['tanggal'] = $y . '-' . $m . '-' . $d;
			$src['nama_siswa'] = $_REQUEST['nama_siswa'] ? $_REQUEST['nama_siswa'] : null;
			$src['nomor_induk_siswa'] = $_REQUEST['nomor_induk_siswa'] ? $_REQUEST['nomor_induk_siswa'] : null;
		}else{
			$src['tanggal'] = date('Y-m-d');
			$src['nama_siswa'] = null;
			$src['nomor_induk_siswa'] = null;
		}
			$this->load->model('m_siswa');
			$this->data['rows'] = $this->m_siswa->display_absen_siswa($src);
			$this->data['tanggal'] = $src['tanggal'];
			$this->data['title'] = "Data Absensi";
			$this->data['report'] = "report_siswa";
			$this->data['action'] = "/school/c_absensi/index";
			$this->load->view('v_header', $this->data);
			$this->load->view('v_absensi', $this->data);
			$this->load->view('v_footer', $this->data);
	}
	
	public function report_siswa($tgl) {
			$src['tanggal'] = $tgl;
			$this->load->model('m_siswa');
			$this->data['rows'] = $this->m_siswa->display_absen_siswa($src);
			$this->data['tanggal'] = $src['tanggal'];
			$this->load->view('report', $this->data);
	}
	
	public function report_guru($tgl) {
			$src['tanggal'] = $tgl;
			$this->load->model('m_absen');
			$this->data['rows'] = $this->m_absen->display_absen_guru($src);
			$this->data['tanggal'] = $src['tanggal'];
			$this->load->view('report', $this->data);
	}

	public function absent() {
		$this->load->model('m_absen');
		$this->data['rows'] = $this->m_absen->get_not_absen();
		$this->data['title'] = "Absensi";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_add_absensi', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function editAbsensiSiswa($no_absensi) {
		$this->load->model('m_siswa');
		$this->data['rows'] = $this->m_siswa->editAbsensi($no_absensi);
		$this->data['title'] = "Edit Data Absensi";
		$this->data['tipe'] = "1";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_edit_absensi', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function editAbsensiPengajar($no_absensi) {
		$this->load->model('m_pengajar');
		$this->data['rows'] = $this->m_pengajar->editAbsensi($no_absensi);
		$this->data['title'] = "Edit Data Absensi";
		$this->data['tipe'] = "2";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_edit_absensi', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function editAbsensiStaff($no_absensi) {
		$this->load->model('m_staff');
		$this->data['rows'] = $this->m_staff->editAbsensi($no_absensi);
		$this->data['title'] = "Edit Data Absensi";
		$this->data['tipe'] = "3";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_edit_absensi', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function updateAbsensi() {
		$this->load->model('m_absen');
		$keterangan = $this->input->post('keterangan');
		$no = $this->input->post('no_absensi');
		$tipe = $this->input->post('tipe');
		$this->m_absen->updateAbsensi($keterangan, $no);
		$this->redirectto($tipe);
	}

	public function show_absen_guru($src = null) {
		if ($_POST) {
			$d = $_REQUEST['d'] ? $_REQUEST['d'] : null;
			$m = $_REQUEST['m'] ? $_REQUEST['m'] : null;
			$y = $_REQUEST['y'] ? $_REQUEST['y'] : null;
			$src['tanggal'] = $y . '-' . $m . '-' . $d;
			$src['nama_pengajar'] = $_REQUEST['nama_pengajar'] ? $_REQUEST['nama_pengajar'] : null;
			$src['nomor_induk_pengajar'] = $_REQUEST['nomor_induk_pengajar'] ? $_REQUEST['nomor_induk_pengajar'] : null;
		}else{
			$src['tanggal'] = date('Y-m-d');
			$src['nama_pengajar'] = null;
			$src['nomor_induk_pengajar'] = null;
		}
			$this->load->model('m_pengajar');
			$this->data['rows'] = $this->m_pengajar->display_absen_guru($src);
			$this->data['tanggal'] = $src['tanggal'];
			$this->data['title'] = "Data Absensi";
			$this->data['report'] = "report_guru";
			$this->data['action'] = "show_absen_guru";
			$this->load->view('v_header', $this->data);
			$this->load->view('v_absensi_guru', $this->data);
			$this->load->view('v_footer', $this->data);
	}

	public function submit_absen() {
		$id = $_REQUEST['no_induk'];
		$alasan = $_REQUEST['status_absen'];
		$this->load->model('m_absen');
		$result = $this->m_absen->insert($id, $alasan);
		redirect('c_admin/index');
	}

	function search() {
		$d = $_REQUEST['d'] ? $_REQUEST['d'] : null;
		$m = $_REQUEST['m'] ? $_REQUEST['m'] : null;
		$y = $_REQUEST['y'] ? $_REQUEST['y'] : null;
		$src['tanggal'] = $y . '-' . $m . '-' . $d;
		$src['nama_person'] = $_REQUEST['nama_person'] ? $_REQUEST['nama_person'] : null;
		$src['no_induk'] = $_REQUEST['no_induk'] ? $_REQUEST['no_induk'] : null;
	}

	function redirectto($prev) {
		switch ($prev) {
			case '1' :
				redirect('c_absensi/index');
				break;
			case '2' :
				redirect('c_absensi/show_absen_guru');
				break;
		}
	}

}