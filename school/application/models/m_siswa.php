<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_siswa extends CI_Model {

	function __construct() {
		parent :: __construct();
		$this->load->database();
	}
	
	public function get_id_keu($nis){
		$sql = "select a.nomor_induk_siswa, id_spp, id_dsp, id_tahunan from siswa a " .
				"inner join spp b on a.nomor_induk_siswa = b.nomor_induk_siswa " .
				"inner join dsp c on a.nomor_induk_siswa = c.nomor_induk_siswa " .
				"inner join tahunan d on a.nomor_induk_siswa = d.nomor_induk_siswa";
		$query = $this->db->query($sql);
		return $query->row();
	}
	
	public function get_spp($key1=null,$key2=null){
		$where = "";
		if($key1)$where = "WHERE a.nomor_induk_siswa = '".$key1."'";
		if($key2)$where = "WHERE a.nama_siswa ILIKE '%".$key2."%'";
		$sql = "select a.*,b.jumlah_dsp,b.id_dsp,c.jumlah_tahunan,c.id_tahunan,d.id_spp,d.jumlah_spp from siswa a 
				LEFT JOIN dsp b on a.nomor_induk_siswa = b.nomor_induk_siswa 
				LEFT JOIN tahunan c on a.nomor_induk_siswa = c.nomor_induk_siswa 
				LEFT JOIN spp d on a.nomor_induk_siswa = d.nomor_induk_siswa 
				 $where ORDER BY nama_siswa";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_nota($tgl,$nis){
		$sql = "select a.nama_siswa, h.nama_kelas, count(e.*)*b.jumlah_spp as spp, f.jumlah_bayar_dsp as dsp, g.jumlah_bayar_tahunan as thn from siswa a
				inner join kelas h on a.id_kelas = h.id_kelas
				inner join spp b on a.nomor_induk_siswa = b.nomor_induk_siswa
				inner join dsp c on a.nomor_induk_siswa = c.nomor_induk_siswa
				inner join tahunan d on a.nomor_induk_siswa = d.nomor_induk_siswa
				left join (select * from bayar_spp where tanggal_bayar_spp = '$tgl') e on b.id_spp = e.id_spp
				left join (select * from bayar_dsp where tanggal_bayar_dsp = '$tgl') f on c.id_dsp = f.id_dsp
				left join (select * from bayar_tahunan where tanggal_bayar_tahunan = '$tgl') g on d.id_tahunan = g.id_tahunan
				where a.nomor_induk_siswa = '".$nis."'		
				group by b.jumlah_spp,f.jumlah_bayar_dsp,g.jumlah_bayar_tahunan,a.nama_siswa, h.nama_kelas";
		$query = $this->db->query($sql);
		return $query->row();
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
	
	public function get_by($from,$to){
		$sql = "select b.*, a.nomor_induk_siswa, a.nama_siswa, a.id_kelas, d.waktu_absen as waktu_masuk, c.waktu_absen as waktu_keluar  
						from siswa a inner join absen b on a.id_users = b.id_users 
						inner join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '1') d on b.no_absensi = d.no_absensi
						left join (select b.waktu_absen, b.no_absensi from absen a inner join keterangan_absen b on a.no_absensi = b.no_absensi where keterangan = '2') c on b.no_absensi = c.no_absensi
						where b.tanggal_absensi >= '$from' and b.tanggal_absensi <= '$to'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_keu_all(){
		$sql = "select * from siswa a 
				inner join (
					select b.jumlah_dsp as dsp, nomor_induk_siswa as nis, jumlah_dsp - sum(jumlah_bayar_dsp) as sisa_dsp from bayar_dsp a 
					inner join dsp b on a.id_dsp = b.id_dsp group by jumlah_dsp,nomor_induk_siswa
				) b on a.nomor_induk_siswa = b.nis 
				inner join (
					select b.jumlah_tahunan as tahunan, nomor_induk_siswa as nis, jumlah_tahunan - sum(jumlah_bayar_tahunan) as sisa_tahunan from bayar_tahunan a 
					inner join tahunan b on a.id_tahunan = b.id_tahunan group by jumlah_tahunan,nomor_induk_siswa
				) c on a.nomor_induk_siswa = c.nis ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_spp_all($id){
		$sql = "select * from bayar_spp a inner join spp b on a.id_spp = b.id_spp where a.id_periode = $id";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_pphone_by_id($id) {
		$sql = "select no_hp_orang_tua from siswa where nomor_induk_siswa = '" . $id . "'";
		$query = $this->db->query($sql);
		return $query;
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
	
	public function get_sisa_dsp($id){
		$sql = "select b.jumlah_dsp as dsp, jumlah_dsp - sum(jumlah_bayar_dsp) as sisa_dsp from bayar_dsp a 
					inner join dsp b on a.id_dsp = b.id_dsp where nomor_induk_siswa = '$id' group by jumlah_dsp,nomor_induk_siswa";
		$query = $this->db->query($sql);
		return $query->rows();
	}
	
	public function get_sisa_tahunan($id){
		$sql = "select b.jumlah_tahunan as tahunan, jumlah_tahunan - sum(jumlah_bayar_tahunan) as sisa_tahunan from bayar_tahunan a 
					inner join tahunan b on a.id_tahunan = b.id_tahunan where nomor_induk_siswa = '$id' group by jumlah_dsp,nomor_induk_siswa";
		$query = $this->db->query($sql);
		return $query->rows();
	}
}
?>