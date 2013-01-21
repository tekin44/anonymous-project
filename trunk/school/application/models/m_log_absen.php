<?php
/**
 * Description of m_log_absen
 *
 * @author GGAdiguna
 */
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');


class m_log_absen extends CI_Model{
    
    // ambil jumlah data yang ada pada tabel absen dengan tanggal tertentu
    public function get_server($date)
    {
        $sql = " select count(*) from 
                (select id_users, tanggal_absensi 
                 from absen 
                 where tanggal_absensi ='".$date."'
                 group by id_users, tanggal_absensi)
                 as server
                 ";
        $query = $this->db->query($sql);
        return $query->result();                
    }
    
    // ambil jumlah data yang ada pada inoutdata(fingerprint log) dengan tanggal tertentu
    public function get_fingerprint($date)
    {
        $sql = "select count(*) from 
                (select pin, checktime
                from inoutdata
                where checktime ='".$date."'
                group by pin,checktime) 
                as fp
               ";
        $query = $this->db->query($sql);
        return $query->result();        
    }
    
    // ambil jumlah selisih data dari kedua tabel dengan tanggal tertentu
    public function get_excluded($date)
    {
        $sub1 = "select id_users, tanggal_absensi 
                 from absen
                 group by id_users, tanggal_absensi
                 ";
        
        $sub2 = "select pin, checktime 
                 from inoutdata
                 join (".$sub1.") as server
                 on server.id_users = pin
                 where checktime = server.tanggal_absensi
                 and checktime = '".$date."'
                 group by pin, checktime
                 ";
        
        $sub3 = "select pin, checktime
                from inoutdata
                where checktime ='".$date."'
                group by pin,checktime
                ";
        
        $sub4 = $sub3." except ".$sub2;
        
        
        $sql= "select count(*)
               from (".$sub4.") 
               as excluded";
        
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    
    public function get_rec_server($date,$name)
    {
        $sql = "select UPPER(nama_siswa) as nama_siswa, groups.tanggal_absensi from siswa
                join
                (select id_users, tanggal_absensi 
                 from absen 
                 where tanggal_absensi ='".$date."'
                 group by id_users, tanggal_absensi)
                 as groups
                 
                 on groups.id_users = siswa.id_users
                  ";
        
        if($name != null)
        {
            $sql = $sql."where UPPER(nama_siswa) like '%".strtoupper($name)."%'";                                
        }        
        
        $query = $this->db->query($sql);
        return $query->result();                
    }
    
    public function get_rec_fingerprint($date,$name)
    {
        $sql = "select UPPER(nama_siswa) as nama_siswa, groups.checktime
                from siswa join
                (select pin, checktime
                from inoutdata
                where checktime ='".$date."'
                group by pin,checktime)
                as groups
                on groups.pin = siswa.id_users
                ";
        
        if($name != null)
        {
            
            $sql = $sql."where UPPER(nama_siswa) like '%".strtoupper($name)."%'";
        }
        
        $query = $this->db->query($sql);
        return $query->result();        
    }
    
    public function get_rec_excluded()
    {
        $sub1 = "select id_users, tanggal_absensi 
                 from absen
                 group by id_users, tanggal_absensi
                 ";
        
        $sub2 = "select pin, checktime 
                 from inoutdata
                 join (".$sub1.") as server
                 on server.id_users = pin
                 where checktime = server.tanggal_absensi
                 and checktime = '".$date."'
                 group by pin, checktime
                 ";
        
        $sub3 = "select pin, checktime
                from inoutdata
                where checktime ='".$date."'
                group by pin,checktime
                ";
        
        $sub4 = $sub3." except ".$sub2;        
        
        $query = $this->db->query($sub4);
        return $query->result();        
    }
}

?>
