<?php
/**
 * Description of c_log_absen
 *
 * @author GGAdiguna
 */
//if (!defined('BASEPATH'))
//exit ('No direct script access allowed');

class c_log_absen extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_menu');
	//$this->client_logon = $this->session->userdata('login');
	//$this->data['menus'] = $this->m_menu->getAll($this->client_logon[0]->admin_username);                
    }
    
    public function index()
    {
        /* 
        ** di index, belum nampilin/ fetching data apa apa, cuma buat nampilin view doang
        */        
        
        //$this->data['title'] = "Log Absen Server & Finger Print";
	//$this->data['action'] = "/school/c_log_absen/calculate_total";
	//$this->load->view('v_header', $this->data);
	//$this->load->view('v_log_absen', $this->data);
        //$this->load->view('v_footer', $this->data);        
    }
    
    public function calculate_total()
    {
        /*
         * calc_total di panggil kalo submit, cuma submit tanggal aja
         * yang di fetch
         *          + jumlah log di server(absen)
         *          + jumlah log di fingerprint(inoutdata)
         *          + jumlah log yang ada di fp tapi nggak di server
         *            (inoutdata - (inoutdata=absen))
         * 
         *          + record dari log server
         *          + record dari log fingerprint
         *          + record log yang ada di fp tapi nggak di server
         */
        
        $date = $_REQUEST['date'];
        $this->load->model('m_log_absen');
        
        $jum_server = $this->m_log_absen->get_server($date);
        $jum_fp = $this->m_log_absen->get_fingerprint($date);
        $jum_selisih = $this->m_log_absen->get_exluded($date);
        
        $rec_server = $this->m_log_absen->get_rec_absen($date);
        $rec_fp = $this->m_log_absen->get_rec_fingerprint($date);
        $rec_selisih = $this->m_log_absen->get_rec_excluded($date);
        
        
//	$this->data['title'] = "Log Absen Server & Finger Print";
//	$this->data['action'] = "/school/c_log_absen/calculate_total";
//	$this->load->view('v_header', $this->data);
//	$this->load->view('v_log_absen', $this->data);
//        $this->load->view('v_footer', $this->data);
    }
    
}

?>
