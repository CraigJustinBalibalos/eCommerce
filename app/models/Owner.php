<?php

namespace app\models;

class Owner extends \app\core\Model{

	public function getAll(){
		//Return the collection of all owners
		//Connect to the database (Done in the Model base class before this method runs)

		//Run "SELECT * FROM owner"
		$SQL = "SELECT * FROM owner";
		//$_connection is located in Model.php under models folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute();
		//Run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Owner');
		return $STMT->fetchAll();
	}

	public function insert(){
		//Run "INSERT "
		$SQL = "INSERT INTO owner(first_name, last_name, contact) VALUES 
								(:first_name, :last_name, :contact)";
		//$_connection is located in Model.php under the models folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute(['first_name'=>$this->first_name, 
						'last_name'=>$this->last_name, 
						'contact'=>$this->contact]);
	}
}