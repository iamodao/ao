<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oDatabase ~ Database Utility • DEPENDENCY»
 */
class oDatabase {
	private $_connection;

	public function __construct($config,  $driver='oPDO'){
		if($driver == 'oPDO'){
			try {
				$pdo = new PDO('mysql:dbname='.$config['name'].';host='.$config['host'], $config['user'], $config['password']);
			} catch (PDOException $e){
				oExit::Now('Database', 'Connection Failed', $e->getMessage());
			}
			$this->_connection = $pdo;
		}

		if($driver == 'oMySQLi'){
			@$mysqli = new mysqli($config['host'], $config['user'], $config['password'], $config['name']);
			if ($mysqli->connect_error){
				oExit::Now('Database', 'Connection Failed', '['.$mysqli->connect_errno.'] '.$mysqli->connect_error);
			}
			$this->_connection = $mysqli;
		}
	}


	//CONNECT • RETURN DATABASE OBJECT ~ CONNECTION
	public function Connect(){
		if(!empty($this->_connection)){return $this->_connection;}
		return false;
	}


} // EndOfClass - oDatabase