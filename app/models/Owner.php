<?php

namespace app\models;

class Owner extends \app\core\Model{

	public function getAll(){
		//Return the collection of all owners
		//Connect to the database (Done in the Model base class before this method runs)

		//Run "SELECT * FROM owner"
		$SQL = "SELECT * FROM owner";
		//$_connection is located in Model.php under core folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute();
		//Run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Owner');
		return $STMT->fetchAll();
	}

	public function get($owner_id){
		//Return the collection of all owners
		//Connect to the database (Done in the Model base class before this method runs)

		//Run "SELECT * FROM owner"
		$SQL = "SELECT * FROM owner WHERE owner_id=:owner_id";
		//$_connection is located in Model.php under core folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute(['owner_id'=>$owner_id]);
		//Run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Owner');
		return $STMT->fetch();
	}

	public function insert(){
		//Run "INSERT SQL statement"
		$SQL = "INSERT INTO owner(first_name, last_name, contact) VALUES 
								(:first_name, :last_name, :contact)";
		//$_connection is located in Model.php under the core folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute(['first_name'=>$this->first_name, 
						'last_name'=>$this->last_name, 
						'contact'=>$this->contact]);
	}

	public function update(){
		//Run "UPDATE SQL statement"
		$SQL = "UPDATE owner SET first_name=:first_name, last_name=:last_name, contact=:contact
				WHERE owner_id=:owner_id";
		//$_connection is located in Model.php under the core folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute(['first_name'=>$this->first_name, 
						'last_name'=>$this->last_name, 
						'contact'=>$this->contact,
						'owner_id'=>$this->owner_id]);
	}

	public function delete(){
		//Run "DELETE SQL statement"
		$SQL = "DELETE FROM owner WHERE owner_id=:owner_id";
		//$_connection is located in Model.php under the core folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute(['owner_id'=>$this->owner_id]);
	}


}