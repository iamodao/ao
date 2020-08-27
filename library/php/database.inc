<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ============================================================================================
 * oDatabase ~ Database Utility • DEPENDENCY»
 */
class oDatabase {
	public $connection;
	public $driver;
	public function __construct($config,  $driver='mysqli'){
		$this->driver = $driver;
		if($driver == 'pdo'){
			try {
				$pdo = new PDO('mysql:dbname='.$config['name'].';host='.$config['host'], $config['user'], $config['password']);
			} catch (PDOException $e){
				oExit::Now('Database', 'Connection Failed', $e->getMessage());
			}
			$this->connection = $pdo;
		}

		if($driver == 'mysqli'){
			@$mysqli = new mysqli($config['host'], $config['user'], $config['password'], $config['name']);
			if ($mysqli->connect_error){
				oExit::Now('Database', 'Connection Failed', '['.$mysqli->connect_errno.'] '.$mysqli->connect_error);
			}
			$this->connection = $mysqli;
		}
	}

	#RETURN DATABASE OBJECT ~ CONNECTION
	public function dbo(){
		if(!empty($this->connection)){return $this->connection;}
		return false;
	}
}
