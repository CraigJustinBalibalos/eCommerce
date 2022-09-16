<?php 

namespace app\core;

class Model{
	protected static $_connection;

	public function __construct(){
		$server = 'localhost'; //Write IP address if using an online database rather than a local database
		$dbname = 'vet_clinic';
		$username = 'root';
		$password = '';

		try{
			self::$_connection = new \PDO("mysql:host=$server;dbname=$dbname", 
										$username, $password);
			self::$_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch(\Exception $e){
				echo "Failed to connect to the database";
				exit(0);
			}
	}
}