<?php
require 'config.php';

define('ruta', 'http://localhost/iseploretopoo/');

class mariamedebe{ 
	protected $_db; 

	public function __construct() 
	{ 
		$this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 

		if ( $this->_db->connect_errno ) 
		{ 
			echo "Fallo al conectar a MySQL: ". $this->_db->connect_error; 
			return;     
		} 

		$this->_db->set_charset(DB_CHARSET); 
	} 

	public function runQuery($query){
		$result = $this->_db->query($query); 
		$resultset = $result->fetch_all(MYSQLI_ASSOC); 
		return $resultset; 
		$this->_db->close();
	}
	
	public function insertar($query){
		$result = $this->_db->query($query); 
		return $this->_db->affected_rows;
		$this->_db->close();
	}

	public function numRows($query) {
		$result  = $this->_db->query($query);
		$rowcount = $result->num_rows;
		return $rowcount;	

		$result->close();
		$this->_db->close();
	}

	public function escape($string) {
		return $this->_db->real_escape_string($string);
	}

}
?>