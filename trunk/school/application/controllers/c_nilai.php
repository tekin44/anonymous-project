<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class c_nilai extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->load->model('m_menu');
		$this->client_logon = $this->session->userdata('login');
		$this->data['menus'] = $this->m_menu->getAll();
	}
	
	public function index() {
		$this->load->model('m_siswa');
		$this->data['title'] = "Data Nilai";
		
		$key1 = $this->input->post('search_field1');
		$key2 = $this->input->post('search_field2');
			
			if ($key1 == NULL && $key2 == NULL)
			{
				$this->data['rows'] = $this->m_siswa->get_siswas();
			}
				else if ($key1 != NULL){
					$this->data['rows'] = $this->m_siswa->getSearchNISiswa($key1);
				}
					else{
						$this->data['rows'] = $this->m_siswa->getSearchNamaSiswa($key2);
					}
		
		$this->load->view('v_header', $this->data);
		$this->load->view('v_data_nilai_siswa', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	public function get_nilai($nis){
		$this->load->model('m_nilai');
		$this->data['rows'] = $this->m_nilai->get_nilai($nis);
		$this->data['kelas'] = $this->m_nilai->get_kelas();
		$this->data['title'] = "Data Nilai";
		$this->load->view('v_header', $this->data);
		$this->load->view('v_nilai_siswa', $this->data);
		$this->load->view('v_footer', $this->data);
	}
	
	// public function edit_nilai($nis,$nip,$id_kelas){
		// $this->load->model('m_nilai');
		// $this->data['rows'] = $this->m_nilai->edit_nilai($nis,$nip,$id_kelas);
		// $this->data['title'] = "Data Nilai";
		// $this->load->view('v_header', $this->data);
		// $this->load->view('v_edit_nilai', $this->data);
		// $this->load->view('v_footer', $this->data);
	// }
	
	public function update_nilai() {
		$this->load->model('m_nilai');
	
		$nis = $this->input->post('nis');
		$id_kelas = $this->input->post('id_kelas');
		$nip = $this->input->post('nip');
		$nilai = $this->input->post('nilai');
		$this->load->model('m_raport');
		$siswa = $this->m_raport->get_nilai($id);
		$this->data['siswa'] = $siswa;
		$this->data['title'] = $siswa[0]->nama_siswa;
		$this->load->view('v_header', $this->data);
		$this->load->view('v_detail_nilai_siswa', $this->data);
		$this->load->view('v_footer', $this->data);
		$this->m_nilai->update($nis,$id_kelas,$nip,$nilai);	
		redirect("c_nilai/get_nilai/".$nis);
	}
	
	public function tambah_nilai($nis){
		/*if($this->client_logon)*/
		//$this->data['result'] = $this->msg;
		$this->data['title'] = "Tambah Nilai Siswa";
		$this->data['rows'] = $nis;
		
		$this->load->view('v_header', $this->data);
		$this->load->view('v_tambah_nilai', $this->data);
		$this->load->view('v_footer', $this->data);
		/*}
		else
		{
			redirect('login');
		}*/
	}
	
	public function submit_nilai() {
		$this->load->model('m_nilai');
		
		$nis = $this->input->post('nis');
		$id_kelas = $this->input->post('id_kelas');
		$nip = $this->input->post('nip');
		$nilai = $this->input->post('nilai');
		
		$this->m_nilai->tambah_nilai($nip,$id_kelas,$nis,$nilai);
		redirect("c_nilai/get_nilai/".$nis);
	}
	
	public function delete_nilai($nip,$id_kelas,$nis) {
		$this->load->model('m_nilai');
		$result = $this->m_nilai->delete_nilai($nip,$id_kelas,$nis);
		redirect("c_nilai/get_nilai/".$nis);
	}
	
	public function update_nilai_siswa() 
	{
				$this->load->model('m_nilai');
		
		$nip = $_REQUEST['nip'];
		$nis = $_REQUEST['nis'];
		$id_kelas = $_REQUEST['id_kelas'];
		$nilai = $_REQUEST['nilai'];
		
		for ($i = 0; $i < count($nilai); $i++) {
		
			
			//$value['nis'] = $nis[$i];
			//$value['nip'] = $nip[$i];
			//$value['id_kelas'] = $id_kelas[$i];
			//$value['nilai'] = $nilai[$i];
		
			//$this->m_nilai->update($value);
			
			$this->m_nilai->update($nis[$i],$id_kelas[$i],$nip[$i],$nilai[$i]);
		}
		
		redirect('c_nilai');
	}

}