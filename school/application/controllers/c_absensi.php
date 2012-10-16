<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_absensi extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_menu');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll($this->client_logon[0]->admin_username);
	}

	public function index($src = null) {
		if ($_POST) {
			$d = $_REQUEST['d'] ? $_REQUEST['d'] : null;
			$m = $_REQUEST['m'] ? $_REQUEST['m'] : null;
			$y = $_REQUEST['y'] ? $_REQUEST['y'] : null;
			$src['tanggal'] = $y . '-' . $m . '-' . $d;
			$src['nama_siswa'] = $_REQUEST['nama_siswa'] ? $_REQUEST['nama_siswa'] : null;
			$src['nomor_induk_siswa'] = $_REQUEST['nomor_induk_siswa'] ? $_REQUEST['nomor_induk_siswa'] : null;
		} else {
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

	public function report($tipe) {
		$this->load->model('m_date');
		$d = 0;
		$m = 0;
		$y = 0;
		$this->data['d'] = $this->m_date->day($d);
		$this->data['m'] = $this->m_date->month($m);
		$this->data['y'] = $this->m_date->year($y);
		$this->data['tipe'] = $tipe;
		$this->data['title'] = "Rekap Absen";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_report', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function submit_report() {
		$this->load->model('m_date');
		$this->load->model('m_periode');
		$d = $_REQUEST['d'];
		$m = $_REQUEST['m'];
		$y = $_REQUEST['y'];
		$d1 = $_REQUEST['d1'];
		$m1 = $_REQUEST['m1'];
		$y1 = $_REQUEST['y1'];
		$from = $this->m_date->merge($d, $m, $y);
		$to = $this->m_date->merge($d1, $m1, $y1);
		$tipe = $_REQUEST['tipe'];
		$this->data['dates'] = $this->m_date->get_serial($from,$to);
		switch($tipe) {
			case "siswa":
			$this->load->model('m_siswa');
			$this->load->model('m_kelas');
			$this->data['rows'] = $this->m_siswa->get_by($from,$to);
			$this->data['kelas'] = $this->m_kelas->show_kelas();
			$this->load->view('report_siswa',$this->data);
			break;
			case "pengajar":
			$this->load->model('m_pengajar');
			$this->data['rows'] = $this->m_pengajar->get_by($from,$to);
			$this->load->view('report',$this->data);
			break;
			case "staff":
			$this->load->model('m_staff');
			$this->data['rows'] = $this->m_staff->get_by($from,$to);
			$this->load->view('report_staff',$this->data);
		}
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
		$data['status_absen'] = $this->input->post('keterangan');
		$data['keterangan_absen'] = $this->input->post('ket');
		$no = $this->input->post('no_absensi');
		$tipe = $this->input->post('tipe');
		$this->m_absen->updateAbsensi($data, $no);
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
		} else {
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

	public function show_absen_staff($src = null) {
		if ($_POST) {
			$d = $_REQUEST['d'] ? $_REQUEST['d'] : null;
			$m = $_REQUEST['m'] ? $_REQUEST['m'] : null;
			$y = $_REQUEST['y'] ? $_REQUEST['y'] : null;
			$src['tanggal'] = $y . '-' . $m . '-' . $d;
			$src['nama_staff'] = $_REQUEST['nama_staff'] ? $_REQUEST['nama_staff'] : null;
			$src['nomor_induk_staff'] = $_REQUEST['nomor_induk_staff'] ? $_REQUEST['nomor_induk_staff'] : null;
		} else {
			$src['tanggal'] = date('Y-m-d');
			$src['nama_staff'] = null;
			$src['nomor_induk_staff'] = null;
		}
		$this->load->model('m_staff');
		$this->data['rows'] = $this->m_staff->get_absen($src);
		$this->data['tanggal'] = $src['tanggal'];
		$this->data['title'] = "Absensi Staff";
		$this->data['report'] = "report_staff";
		$this->data['action'] = "show_absen_staff";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_absensi_staff', $this->data);
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