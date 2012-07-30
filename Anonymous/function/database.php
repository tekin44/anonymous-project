<?php
/*
 * Created on Jul 31, 2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class Database{
 	
 	var $db;
 	
 	function Database($db,$user,$pass,$host) {
		$this->db = pg_connect("host=$host port=5432 dbname=$db user=$user password=$pass");	
	}
	
	function getCount($table,$where_clause){
		$sql = $this->createSql($table,"count(*) as count",$where_clause);
		$query = pg_query($sql);
		$count = pg_fetch_assoc($query);
		return $count['count'];
	} 
	
	private function createSql($table,$what,$where_clause){
		$sql = "SELECT ".$what." FROM ".$table;
		if($where_clause){
			$sql .= " WHERE ".implode(" AND ",$where_clause);
		}
		return $sql;
	}
 }
?>
