<?php
/*
************************************************
** Page Name     : db.class.php
** Page Author   : Tathagata Basu
** Created On    : 10/01/2013
** Modified By   : 
** Modified On   : 
************************************************
** This page contain class to connect database
************************************************
*/

/*
	MySQLi Database class
*/
class db {
	
	var $conn;
	
	function __construct() {
		
		session_start();
		
	}
	
	function con() {
		$this->conn = new mysqli("localhost", "root", "", "sudoku");
		if($this->conn->connect_errno) {
			echo "Database Connectivity Error : ".$this->conn->connect_error;
			exit();
		} else {
			return $this->conn;
		}
	}
	
	
}
?>