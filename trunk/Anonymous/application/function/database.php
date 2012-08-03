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
	
	function insert($table,$columns,$values){
		$sql = $this->createInsertQuery($table,$columns,$values);
		if(pg_query($sql)){
			return true;
		}
		return false;
	}
	
	private function createSql($table,$what,$where_clause){
		$sql = "SELECT ".$what." FROM ".$table;
		if($where_clause){
			$sql .= " WHERE ".implode(" AND ",$where_clause);
		}
		return $sql;
	}
	
	private function createInsertQuery($table,$columns,$values){
		$sql = "INSERT INTO ".$table." (";
		$sql .= implode(",",$columns);
		$sql .= ")VALUES(";
		$sql .= implode(",",$values);
		$sql .= ")";
		return sql;
	}
	
	function getRowsTable($table){
		$where = array();
		$where[] = "table_name = '$table'";
		$sql = $this->createSql('information_schema.columns','column_name',$where);
		$result = pg_query($sql);
		return $result;
	}
 }
?>
