<?php

namespace app\controllers;

class Animal extends \app\core\Controller{

	//List the records in context
	public function index($owner_id){
		//Get the data fomr the Database
		$animal = new \app\models\Animal();
		$animals = $animal->getForOwner($owner_id);
		$owner = new \app\models\Owner();
		$owner = $owner->get($owner_id);
		//Call the view
		$this->view('Animal/index', ['animals'=>$animals, 'owner'=>$owner]);
	}

	//View details of record
	public function details($animal_id){
		$animal = \app\models\Animal();
		$animal = $animal->get($animal_id);
		echo '<img src="images/" .$animal->profile_pic . ';
	}

	//Add a new record
	public function add($owner_id){

		if(isset($_POST['action'])){
			//Make a new object
			$animal = \app\models\Animal();
			//Populate the object
			$animal->name = $_POST['name'];
			$animal->dob = $_POST['dob'];
			//Foreign Key from the parameters
			$animal->owner_id = $owner_id;
			//Saves a file to the database
			$filename = $this->saveFile($_FILE['profile_pic']);
			$animal->profile_pic = $filename;
			//This is the shorter version of the 2 lines above 
			// -> $animal->profile_pic = $this->saveFile($_FILE['profile_pic']);
			//Call the insert method
			$animal->insert();
			header('location:/Animal/index/' . $owner_id);
			//This also works the same -> header("location:/Animal/index/$owner_id");
		}else{
			//Get owner information
			$owner = new \app\models\Owner();
			$owner = $owner->get($owner_id);
			$this->view('Animal/add', ['owner'=>$owner]);
		}
	}

	//Delete an existing record
	public function delete($animal_id){
		$animal = \app\models\Animal();
		$animal = $animal->get($animal_id);
		$owner_id = $animal->owner_id;
		$animal->delete();
		header('location:/Animal/index/' . $owner_id);
	}

	//Modify an existing record
	public function edit($animal_id){
		//Make a new object
		$animal = \app\models\Animal();
		$animal = $animal->get($animal_id);
		//Get the $owner_id
		$owner_id = $animal->owner_id;
		if(isset($_POST['action'])){
			//Populate the object
			$animal->name = $_POST['name'];
			$animal->dob = $_POST['dob'];
			//Call the insert method
			$animal->update();
			header('location:/Animal/index/' . $owner_id);
			//This also works the same -> header("location:/Animal/index/$owner_id");
		}else{
			//Get owner information
			$owner = new \app\models\Owner();
			$owner = $owner->get($owner_id);
			$this->view('Animal/edit', ['owner'=>$owner]);
		}
	}

}