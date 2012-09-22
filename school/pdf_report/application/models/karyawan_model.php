<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
     * APLICATION INFO  : PDF Report with FPDF 1.6
     * DATE CREATED     : 21 April 2012
	 * DEVELOPED BY     : Anton Sofyan, A.Md
          
     * CONTACT    
     *   - Email        : antonsofyan@yahoo.com
     *   - Blog         : http://antonsofyan.stikeskuningan.ac.id/
     *   - Facebook     : http://facebook.com/antonsofyan     
     *   - Office       : Gedung Lantai 2 UPT Laboratorium Komputer
                          Sekolah Tinggi Ilmu Kesehatan Kuningan (STIKKU)
     *   - Address      : Jalan Lingkar Kadugede No. 02 Kabupaten Kuningan - Propinsi Jawa Barat
     
     * POWERED BY       : CodeIgniter 2.1 & FPDF 1.6	 
	 */

class Karyawan_model extends CI_Model {
      
    function get_all()
    {
        return $this->db->get('tb_karyawan');         
    }       
}

/* End of file karyawan_model.php */
/* Location: ./application/models/karyawan_model.php */