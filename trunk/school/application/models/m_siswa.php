<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_siswa extends CI_Model {

	function __construct() {
		parent :: __construct();
		$this->load->database();
	}
	
	public function get_spp($id=""){
		$where = "";
		if($id)	$where = "WHERE a.nomor_induk_siswa = '".$id."'";
		$sql = "select a.*,b.jumlah_dsp,b.id_dsp,c.jumlah_tahunan,c.id_tahunan from siswa a " .
				"LEFT JOIN dsp b on a.nomor_induk_siswa = b.nomor_induk_siswa " .
				"LEFT JOIN tahunan c on a.nomor_induk_siswa = c.nomor_induk_siswa " .
				" $where ORDER BY nama_siswa";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function display_absen_siswa($src=null) {
		$this->load->database();
		$where_clause = "where b.tanggal_absensi = '".$src['tanggal']."' ";
		if($src['nama_siswa']) $where_clause .= "AND a.nama_siswa ILIKE '%".$src['nama_siswa']."%' ";
		if($src['nomor_induk_siswa']) $where_clause .= "AND a.nomor_induk_siswa = '".$src['nomor_induk_siswa']."' ";
		$sql = "select b.*, a.id_users, a.nomor_induk_siswa, a.nama_siswa, d.waktu_absen as waktu_masuk, c.waktu_absen as waktu_keluar  
						from siswa a inner join absen b on a.id_users = b.id_users 
						inner join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '1') d on b.no_absensi = d.no_absensi
						left join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '2') c on b.no_absensi = c.no_absensi
						$where_clause ORDER BY a.nama_siswa
						";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function editAbsensi($no_absensi) {
		$this->load->database();
		$query = $this->db->query("select b.no_absensi, a.id_users, e.nomor_induk_siswa as nomor_induk, e.nama_siswa as nama, d.waktu_absen as waktu_masuk, c.waktu_absen as waktu_keluar  
						from users a inner join absen b on a.id_users = b.id_users 
						inner join siswa e on a.id_users = e.id_users
						inner join keterangan_absen d on b.no_absensi = d.no_absensi
						left join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '2') c on b.no_absensi = c.no_absensi
						where d.keterangan ='1' and d.no_absensi = $no_absensi
						");
		return $query->result();
	}
	
	public function get_siswas(){
		$sql = "select * from siswa ORDER BY nama_siswa";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getByKategori($kategori) {
		$query = $this->db->query("select * from kategori_siswa a inner join 
				siswa b on a.no_induk = b.no_induk where a.id_kategori = '" . $kategori . "'");
		return $query->result();
	}
	
	public function get_pphone_by_id($id) {
		$query = $this->db->query("select no_hp_orang_tua from siswa where nomor_induk_siswa = '" . $id . "'");
		return $query->result();
	}
	
	public function check($id){
		$query = $this->db->query("select count(*) as c from siswa where no_induk = '" . $id . "'");
		$c = $query->result();
		if($c[0]->c == 0)
			return false;
		else
			return true;
	}
	
	public function get_pphone_by_kat($kats) {
		$where = " WHERE ";
		$value = array();
		foreach($kats as $kat){
			$value[] = "id_kategori = '".$kat."'";	
		}
		$where .= implode(' OR ',$value);
		$sql = "SELECT DISTINCT(no_hp_orang_tua) FROM siswa a " .
				"INNER JOIN kategori_siswa b " .
				"ON a.nomor_induk_siswa = b.nomor_induk_siswa".$where;
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_one($id) {
		$query = $this->db->query("select * from siswa where nomor_induk_siswa = '".$id."'");
		return $query->result();
	}
	
	public function insert_siswa($data) {
		$insert = $this->db->insert("siswa",$data);
		return $insert;
	}
	
	public function insert_raport($data) {
		$insert = $this->db->insert("raport",$data);
		return $insert;
	}
	
	public function edit_siswa($id,$data) {
		$insert = $this->db->update('siswa', $data, "id_users = '".$id."'"); 
		return $insert;
	}
	
	public function update($id,$data) {
		$insert = $this->db->update('siswa', $data, "nomor_induk_siswa = '".$id."'"); 
		return $insert;
	}
	
	public function delete($data) {
		$insert = $this->db->delete('siswa', $data); 
		return $insert;
	}
	
	public function getSearchNISiswa($key1) {
		$query = $this->db->query("select * from siswa where nomor_induk_siswa LIKE '%$key1%' ORDER BY nomor_induk_siswa ASC");
		return $query->result();
	}
	
	public function getSearchNamaSiswa($key2) {
		$query = $this->db->query("select * from siswa 
		where 
		nama_siswa LIKE '%$key2%' OR 
		upper(nama_siswa) LIKE '%$key2%' OR 
		lower(nama_siswa) LIKE '%$key2%' 
		ORDER BY nama_siswa ASC");
		return $query->result();
	}
	
	public function getNamaSiswa($id) {
		$query = $this->db->query("select * from siswa 
		where 
		nomor_induk_siswa = '$id'");
		return $query->result();
	}
}
?>