<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_master_data extends CI_Controller {

	var $data = array ();
	var $msg;

	function __construct() {
		parent :: __construct();
		//$this->load->model('m_staff');
		$this->load->model('m_person');
		$this->load->model('m_message');
		$this->load->model('m_menu');
		$this->load->model('m_siswa');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll($this->client_logon[0]->admin_username);
		if(!$this->client_logon){
			redirect('login');
		}
	}

	public function show_data_siswa() {
		$this->data['result'] = $this->msg;
		$this->data['title'] = "Data Siswa";

		$key1 = $this->input->post('search_field1');
		$key2 = $this->input->post('search_field2');

		if ($key1 == NULL && $key2 == NULL) {
			$this->load->model('m_siswa');
			$this->data['siswa'] = $this->m_siswa->get_siswas();
		} else
			if ($key1 != NULL) {
			$this->data['siswa'] = $this->m_siswa->getSearchNISiswa($key1);
		} else {
			$this->data['siswa'] = $this->m_siswa->getSearchNamaSiswa($key2);
		}

		$this->load->view('v_header', $this->data);
		$this->load->view('v_data_siswa', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function form_siswa($flag, $id = 0) {
		$this->load->model('m_person');
		$this->load->model('m_kategori_siswa');
		$this->data['items'] = $this->m_person->get_unregister();
		if ($flag == 1)
			$this->data['title'] = "Tambah Data Siswa";
		else {
			$this->data['title'] = "Edit Data Siswa";
			$this->data['siswa'] = $this->m_siswa->get_one($id);
		}
		$this->data['flag'] = $flag;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_data_siswa', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function submit() {
		$flag = $_REQUEST['flag'];
		$this->update_person();
		$this->insert_siswa($flag);
		redirect('c_master_data/show_data_siswa');
	}

	public function insert_siswa($flag) {
		$value['nomor_induk_siswa'] = $_REQUEST['nomor_induk_siswa'];
		$value['nama_siswa'] = $_REQUEST['nama_siswa'];
		$value['alamat_siswa'] = $_REQUEST['alamat_siswa'];
		$value['nama_orang_tua'] = $_REQUEST['nama_orang_tua'];
		$value['no_hp_siswa'] = $_REQUEST['no_hp_siswa'];
		$value['no_hp_orang_tua'] = $_REQUEST['no_hp_orang_tua'];
		$value['email_siswa'] = $_REQUEST['email_siswa'];
		$value['password_siswa'] = md5('siswa');
		$value['id_users'] = $_REQUEST['id_users'];
		if ($flag == 1) {
			$result = $this->m_siswa->insert_siswa($value);
		} else
			$result = $this->m_siswa->edit_siswa($_REQUEST['id_users'], $value);
	}

	public function delete_siswa($id) {
		$this->load->model('m_siswa');
		$value['nomor_induk_siswa'] = $id;
		$this->m_siswa->delete($value);
		redirect('c_master_data/show_data_guru');
	}

	/** ================================================== */
	/** 					STAFF 					   	   */
	/** ================================================== */

	public function show_data_staff() {
		$this->data['result'] = $this->msg;
		$this->data['title'] = "Data Staff";
		$this->load->model('m_staff');

		$key1 = $this->input->post('search_field1');
		$key2 = $this->input->post('search_field2');

		if ($key1 == NULL && $key2 == NULL) {
			$this->data['staff'] = $this->m_staff->get_all();
		} else
			if ($key1 != NULL) {
			$this->data['staff'] = $this->m_person->getSearchNIStaff($key1);
		} else {
			$this->data['staff'] = $this->m_person->getSearchNamaStaff($key2);
		}

		$this->load->view('v_header', $this->data);
		$this->load->view('v_data_staff', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function form_staff($flag, $id = 0) {
		$id = str_replace("%20"," ",$id);
		if ($flag == 1)
			$this->data['title'] = "Tambah Data Staff";
		else {
			$this->data['title'] = "Edit Data Staff";
			$this->load->model('m_staff');
			$this->data['staff'] = $this->m_staff->get_one($id);
		}
		$this->data['row'] = $this->m_person->get_unregister();
		$this->data['flag'] = $flag;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_data_staff', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function submit_staff() {
		$flag = $_REQUEST['flag'];
		$this->update_person();
		$this->edit_staff($flag);
		redirect('c_master_data/show_data_staff');
	}

	public function edit_staff($flag) {
		$row['id_users'] = $_REQUEST['id_users'];
		$row['nama_staff'] = $_REQUEST['nama_staff'];
		$row['nomor_induk_staff'] = $_REQUEST['nomor_induk_staff'];
		$this->load->model('m_staff');
		if ($flag == 1)
			$result = $this->m_staff->insert($row);
		else
			$result = $this->m_staff->update($_REQUEST['id_users'], $row);
	}

	public function delete_staff($id) {
		$this->load->model('m_staff');
		$value['nomor_induk_staff'] = $id;
		$this->m_staff->delete($value);
		redirect('c_master_data/show_data_staff');
	}

	/** ================================================== */
	/** 					PENGAJAR 					   */
	/** ================================================== */

	public function show_data_guru() {
		$this->data['result'] = $this->msg;
		$this->data['title'] = "Data Guru";
		$this->load->model('m_pengajar');

		$key1 = $this->input->post('search_field1');
		$key2 = $this->input->post('search_field2');

		if ($key1 == NULL && $key2 == NULL) {
			$this->data['guru'] = $this->m_pengajar->get_all();
		} else
			if ($key1 != NULL) {
			$this->data['guru'] = $this->m_person->getSearchNIGuru($key1);
		} else {
			$this->data['guru'] = $this->m_person->getSearchNamaGuru($key2);
		}

		$this->load->view('v_header', $this->data);
		$this->load->view('v_data_guru', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function form_pengajar($flag, $id = 0) {
		$this->load->model('m_pengajar');
		$this->load->model('m_pelajaran');
		$id = str_replace("%20"," ",$id);
		if ($flag == 1)
			$this->data['title'] = "Tambah Data Pengajar";
		else {
			$this->data['title'] = "Edit Data Pengajar";
			$this->data['staff'] = $this->m_pengajar->get_one($id);
		}
		$this->data['pels'] = $this->m_pelajaran->show_pelajaran();
		$this->data['row'] = $this->m_person->get_unregister();
		$this->data['flag'] = $flag;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_pengajar', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function submit_pengajar() {
		$flag = $_REQUEST['flag'];
		$this->update_person();
		$this->edit_pengajar($flag);
		redirect('c_master_data/show_data_guru');
	}

	public function edit_pengajar($flag) {
		$row['id_users'] = $_REQUEST['id_users'];
		$row['nama_pengajar'] = $_REQUEST['nama_pengajar'];
		$row['kode_pelajaran'] = $_REQUEST['kode_pelajaran'];
		$row['nomor_induk_pengajar'] = $_REQUEST['nomor_induk_pengajar'];
		$this->load->model('m_pengajar');
		if ($flag == 1)
			$result = $this->m_pengajar->insert($row);
		else
			$result = $this->m_pengajar->update($_REQUEST['id_users'], $row);
	}

	public function delete_pengajar($id) {
		$this->load->model('m_pengajar');
		$value['nomor_induk_pengajar'] = $id;
		$this->m_pengajar->delete($value);
		redirect('c_master_data/show_data_guru');
	}

	/** ================================================== */

	public function update_person() {
		$value['status_users'] = '2';
		$this->m_person->update($_REQUEST['id_users'], $value);
	}

	/** ================================================== */
	/** 					KELAS					       */
	/** ================================================== */

	public function show_kelas() {
		$this->load->model('m_kelas');

		$this->data['title'] = "Data Kelas";
		$this->data['rows'] = $this->m_kelas->show_kelas();

		$this->load->view('v_header', $this->data);
		$this->load->view('v_kelas', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function view_kelas($id) {
		$this->load->model('m_kelas');
		$this->load->model('m_pengajar_kelas');

		$this->data['title'] = "Detail Kelas";
		$this->data['rows'] = $this->m_kelas->edit_kelas($id);
		$this->data['pes'] = $this->m_pengajar_kelas->show_pengajar_kelas($id);
		$this->data['siswa'] = $this->m_siswa->get_data_kelas($id);

		$this->load->view('v_header', $this->data);
		$this->load->view('v_detail_kelas', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function edit_kelas($id_kelas) {
		$this->load->model('m_kelas');
		$this->load->model('m_pengajar_kelas');

		$this->data['title'] = "Edit Data Kelas";
		$this->data['rows'] = $this->m_kelas->edit_kelas($id_kelas);
		$this->data['pes'] = $this->m_pengajar_kelas->get_data($id_kelas);

		$this->load->view('v_header', $this->data);
		$this->load->view('v_edit_kelas', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function submit_kelas() {
		$this->load->model('m_kelas');
		$nama_kelas = $this->input->post('nama_kelas');

		$id_kelas = $this->m_kelas->tambah_kelas($nama_kelas);
		$this->tambah_pengajar_kelas($id_kelas[0]->id_kelas);
		redirect('c_master_data/show_kelas');
	}

	public function update_kelas() {
		$this->load->model('m_kelas');

		$id_kelas = $this->input->post('id_kelas');
		$nama_kelas = $this->input->post('nama_kelas');
		$this->m_kelas->update($id_kelas,$nama_kelas);
		$this->tambah_pengajar_kelas($id_kelas);

		redirect('c_master_data/show_kelas');
	}

	public function tambah_kelas(){
		$this->load->model('m_pengajar_kelas');
			
		$this->data['title'] = "Tambah Data Kelas";
		$this->data['pes'] = $this->m_pengajar_kelas->get_data();

		$this->load->view('v_header', $this->data);
		$this->load->view('v_tambah_kelas', $this->data);
		$this->load->view('v_footer', $this->data);
		/*}
		 else
		{
		redirect('login');
		}*/
	}

	public function delete_kelas($id_kelas) {
		$this->load->model('m_kelas');
		$result = $this->m_kelas->delete_kelas($id_kelas);
		redirect('c_master_data/show_kelas');
	}

	public function tambah_pengajar_kelas($id_kelas) {
		$value['id_kelas'] = $id_kelas;
		$nip = $_REQUEST['nip'];
		$nilai = $_REQUEST['nilai'];
		$this->load->model('m_pengajar_kelas');
		$this->m_pengajar_kelas->delete($value);
		$j = 0;
		for ($i = 0; $i < count($nilai); $i++) {
			if($nilai[$i] && $nip[$j]){
				$data = explode(',',$nip[$j]);
				$value['nilai_kelulusan'] = $nilai[$i];
				$value['kode_pelajaran'] = $data[1];
				$value['nomor_induk_pengajar'] = $data[0];
				$this->m_pengajar_kelas->insert($value);
				$j++;
			}
		}
	}

	public function show_siswa_kelas($id_kelas) {
		$value['id_kelas'] = $id_kelas;
		$nip = $_REQUEST['nip'];
		$nilai = $_REQUEST['nilai'];
		$this->load->model('m_pengajar_kelas');
		$this->m_pengajar_kelas->delete($value);
		for ($i = 0; $i < count($nip); $i++) {
			$value['nilai_kelulusan'] = $nilai[$i];
			$value['nomor_induk_pengajar'] = $nip[$i];
			$this->m_pengajar_kelas->insert($value);
		}
	}

	public function show_pelajaran() {
		/*if($this->client_logon)*/
		//$this->data['result'] = $this->msg;
		$this->data['title'] = "Data Pelajaran";

		$this->load->model('m_pelajaran');
		$this->data['rows'] = $this->m_pelajaran->show_pelajaran();

		$this->load->view('v_header', $this->data);
		$this->load->view('v_pelajaran', $this->data);
		$this->load->view('v_footer', $this->data);
		/*}
		 else
		{
		redirect('login');
		}*/
	}

	public function edit_pelajaran($flag, $kode_pelajaran=null) {
		/*if($this->client_logon)*/
		//$this->data['result'] = $this->msg;
		$this->data['title'] = "Edit Data Pelajaran";
		
		$this->load->model('m_pengajar');
		$this->data['guru'] = $this->m_pengajar->get_data_pel($kode_pelajaran);

		$this->data['flag'] = $flag;
		$this->load->model('m_pelajaran');
		$this->data['rows'] = $this->m_pelajaran->edit_pelajaran($kode_pelajaran);

		$this->load->view('v_header', $this->data);
		$this->load->view('v_edit_pelajaran', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function detail_pelajaran($kode_pelajaran) {
		/*if($this->client_logon)*/
		//$this->data['result'] = $this->msg;
		$this->data['title'] = "Edit Data Pelajaran";
		$this->load->model('m_guru_mata_pelajaran');
		
		$this->data['rows'] = $this->m_guru_mata_pelajaran->get_data($kode_pelajaran);
		
		$this->load->view('v_header', $this->data);
		$this->load->view('v_detail_pelajaran', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function delete_guru_mata_pelajaran($nip, $kode_pelajaran){
		$this->load->model('m_guru_mata_pelajaran');
		
		$value['nomor_induk_pengajar'] = str_replace('%20',' ',$nip);
		$value['kode_pelajaran'] = $kode_pelajaran;		
		
		$this->m_guru_mata_pelajaran->delete($value);
		
		redirect('c_master_data/show_pelajaran');
	}

	public function submit_pelajaran() {
		$this->load->model('m_pelajaran');
		$this->load->model('m_guru_mata_pelajaran');
		$flag = $this->input->post('flag');
		$value['kode_pelajaran'] = $this->input->post('kode_pelajaran');
		$value['nama_pelajaran'] = $this->input->post('nama_pelajaran');
	
		if($flag==1) $this->m_pelajaran->tambah_pelajaran($value);
		else $this->m_pelajaran->update($value);
		
		$nip = $_REQUEST['nip'];
		foreach ($nip as $id){
			$data['kode_pelajaran'] = $value['kode_pelajaran'];
			$data['nomor_induk_pengajar'] = $id;
		
			$this->m_guru_mata_pelajaran->insert($data);
		}
		
		redirect('c_master_data/show_pelajaran');
	}

	public function update_pelajaran() {
		$this->load->model('m_pelajaran');

		$kode_pelajaran = $this->input->post('kode_pelajaran');
		$nama_pelajaran = $this->input->post('nama_pelajaran');

		$this->m_pelajaran->update($kode_pelajaran,$nama_pelajaran);
		redirect('c_master_data/show_pelajaran');
	}

	public function tambah_pelajaran(){
		/*if($this->client_logon)*/
		//$this->data['result'] = $this->msg;
		$this->data['title'] = "Tambah Data Kelas";

		$this->load->view('v_header', $this->data);
		$this->load->view('v_tambah_pelajaran', $this->data);
		$this->load->view('v_footer', $this->data);
		/*}
		 else
		{
		redirect('login');
		}*/
	}

	public function delete_pelajaran($kode_pelajaran) {
		$this->load->model('m_pelajaran');
		$result = $this->m_pelajaran->delete_pelajaran($kode_pelajaran);
		redirect('c_master_data/show_pelajaran');
	}


	public function show_pengajar_kelas() {
		/*if($this->client_logon)*/
		//$this->data['result'] = $this->msg;
		$this->data['title'] = "Data Pengajar Kelas";

		$this->load->model('m_pengajar_kelas');
		$this->data['rows'] = $this->m_pengajar_kelas->show_pengajar_kelas();

		$this->load->view('v_header', $this->data);
		$this->load->view('v_pengajar_kelas', $this->data);
		$this->load->view('v_footer', $this->data);
		/*}
		 else
		{
		redirect('login');
		}*/
	}

	public function submit_pengajar_kelas() {
		$this->load->model('m_pengajar_kelas');
		$nomor_induk_pengajar = $this->input->post('nomor_induk_pengajar');
		$id_kelas = $this->input->post('id_kelas');
		$nilai_kelulusan = $this->input->post('nilai_kelulusan');

		$this->m_pengajar_kelas->tambah_pengajar_kelas($nomor_induk_pengajar,$id_kelas,$nilai_kelulusan);
		redirect('c_master_data/show_pengajar_kelas');
	}/*


	public function tambah_pengajar_kelas(){
	if($this->client_logon)
		//$this->data['result'] = $this->msg;
	$this->data['title'] = "Tambah Data Pengajar Kelas";

	$this->load->view('v_header', $this->data);
	$this->load->view('v_tambah_pengajar_kelas', $this->data);
	$this->load->view('v_footer', $this->data);
	}
	else
	{
	redirect('login');
	}
	}*/

	public function delete_pengajar_kelas($nomor_induk_pengajar,$id_kelas) {
		$this->load->model('m_pengajar_kelas');
		$result = $this->m_pengajar_kelas->delete_pengajar_kelas($nomor_induk_pengajar,$id_kelas);
		redirect('c_master_data/show_pengajar_kelas');
	}

	public function edit_siswa_kelas($id_kelas) {
		$this->data['title'] = "Edit Siswa Kelas";

		$this->load->model('m_kelas');
		$this->load->model('m_siswa');
		$this->data['kelas'] = $this->m_kelas->edit_kelas($id_kelas);
		$this->data['siswa'] = $this->m_siswa->get_siswa_kelas($id_kelas);
		$this->load->view('v_header', $this->data);
		$this->load->view('v_edit_siswa_kelas', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function update_siswa_kelas() {

		$this->load->model('m_siswa');
		$this->load->model('m_pengajar_kelas');

		$nis = $_REQUEST['nis'];
		$id_kelas = $_REQUEST['id_kelas'];
		$tingkat = $_REQUEST['tingkat_kelas'];

		foreach ($nis as $id){
			$value['id_kelas'] = $id_kelas;
			$this->m_siswa->update($id,$value);
		}
		redirect('c_master_data/show_kelas');
	}

	function fix_kelas(){
		$id = $_REQUEST['id_kelas'];
		$this->load->model('m_pengajar_kelas');
		$this->load->model('m_siswa');
		$pengajar = $this->m_pengajar_kelas->show_pengajar_kelas($id);
		$data['id_kelas'] = $id;
		foreach ($pengajar as $peng)
		{
			$data['nomor_induk_pengajar'] = $peng->nomor_induk_pengajar;
			$siswa = $this->m_siswa->get_data_kelas($id);
			foreach($siswa as $row){
				$data['nomor_induk_siswa'] = $row->nomor_induk_siswa;
				$this->m_siswa->insert_raport($data);
			}
		}
		redirect('c_master_data/show_kelas');
	}
	
	function delete_pengajar_from_kelas($nip, $id_kelas){
		$this->load->model('m_pengajar_kelas');
		$value['nomor_induk_pengajar'] = str_replace("%20", " ", $nip);
		$value['id_kelas'] = $id_kelas;
		$this->m_pengajar_kelas->delete($value);
		redirect('c_master_data/show_kelas');
	}

	function show_periode(){
		$this->load->model('m_periode');
		$this->data['periodes'] = $this->m_periode->get_all();
		$this->data['title'] = "Periode";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_periode', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function form_periode($flag, $id = 0) {
		$this->load->model('m_periode');
		$this->load->model('m_date');
		$d = 0;
		$m = 0;
		$y = 0;
		$this->data['d'] = $this->m_date->day($d);
		$this->data['m'] = $this->m_date->month($m);
		$this->data['y'] = $this->m_date->year($y);
		$this->data['title'] = "Periode";
		if ($flag == 2){
			$this->data['periode'] = $this->m_periode->get_one($id);
		}
		$this->data['flag'] = $flag;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_form_periode', $this->data);
		$this->load->view('v_footer', $this->data);
	}

	public function submit_periode() {
		$this->load->model('m_periode');
		$this->load->model('m_date');
		$d1 = $_REQUEST['d1'];
		$m1 = $_REQUEST['m1'];
		$y1 = $_REQUEST['y1'];
		$value['awal_periode'] = $this->m_date->merge($d1,$m1,$y1);
		$d2 = $_REQUEST['d2'];
		$m2 = $_REQUEST['m2'];
		$y2 = $_REQUEST['y2'];
		$value['akhir_periode'] = $this->m_date->merge($d2,$m2,$y2);
		$flag = $_REQUEST['flag'];
		$value['tahun_periode'] = $_REQUEST['tahun_periode'];
		$value['periode_semester'] = $_REQUEST['periode_semester'];
		if ($flag == 2){
			$id = $_REQUEST['id_periode'];
			$this->m_periode->update($id,$value);
		}else{
			$this->m_periode->insert($value);
		}
		redirect('c_master_data/show_periode');
	}


}
?>