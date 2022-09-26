<?php

namespace app\models;

class Animal extends \app\core\Model{

	public function getForOwner($owner_id){
		//Return the collection of all owners
		//Connect to the database (Done in the Model base class before this method runs)

		//Run the SELECT statement
		$SQL = "SELECT * FROM animal WHERE owner_id=:owner_id";
		//$_connection is located in Model.php under core folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute(['owner_id'=>$owner_id]);
		//Run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Animal');
		return $STMT->fetchAll();
	}

	public function get($animal_id){
		//Return the collection of all owners
		//Connect to the database (Done in the Model base class before this method runs)

		//Run the SELECT statement
		$SQL = "SELECT * FROM animal WHERE animal_id=:animal_id";
		//$_connection is located in Model.php under core folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute(['animal_id'=>$animal_id]);
		//Run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Animal');
		return $STMT->fetch();
	}

	public function insert(){
		//Run the INSERT statement
		$SQL = "INSERT INTO animal(owner_id, name, dob, profile_pic) VALUES 
								(:owner_id, :name, :dob, :profile_pic)";
		//$_connection is located in Model.php under the core folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute(['owner_id'=>$this->owner_id, 
						'name'=>$this->name, 
						'dob'=>$this->dob,
						'profile_pic'=>$this->profile_pic]);
	}

	public function update(){
		//Run the UPDATE statement
		$SQL = "UPDATE animal SET name=:name, name=:name WHERE animal_id=:animal_id";
		//$_connection is located in Model.php under the core folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute(['name'=>$this->name, 
						'name'=>$this->name, 
						'animal_id'=>$this->animal_id]);
	}

	public function delete(){
		//Run the nameDELETE statement
		$SQL = "DELETE FROM animal WHERE animal_id=:animal_id";
		//$_connection is located in Model.php under the core folder
		$STMT = self::$_connection->prepare($SQL);
		//This is where we would pass the data
		$STMT->execute(['animal_id'=>$this->animal_id]);
	}


}