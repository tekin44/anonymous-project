<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

abstract class app_controller extends CI_Controller {

	function __construct() {
		parent :: __construct();
		$this->client_logon = $this->session->userdata('id_prev');
	}

	public function direct($app) {
		if ($this->client_logon != $app) {
			switch ($app) {
				case '1' :
					redirect('index_absensi');
					break;
				case '2' :
					redirect('index_sms');
					break;
				case '3' :
					redirect('index_spp');
					break;
				case '4' :
					redirect('index_nilai');
					break;
			}
		}

	}
}
?>
