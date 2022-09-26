<?php

namespace app\controllers;

class vet extends \app\core\Controller{
	public function index(){
		//Displays all the owners in the database

		//Make an owner object
		$owner = new \app\models\Owner();
		//Call getAll on that object to get the collectionof all owners
		$owners = $owner->getAll();
		//Call a view and pass the collection for display
		$this->view('Vet/index',$owners);
	}

	//Method to add a new owner to the database
	public function add(){
		// if Isubmit the form
		if(isset($_POST['action'])){
		// then create a new owner object
			$newOwner = new \app\models\Owner();
		// populate the new owner object
			$newOwner->first_name = $_POST['first_name'];
			$newOwner->last_name = $_POST['last_name'];
			$newOwner->contact = $_POST['contact'];
		//Calls insert on the new owner object
			$newOwner->insert(); //Built in the Owner.php under the models folder
		// redirect back to the list (i.e. index)
			header('location:/Vet/index');
		}
		// else
		// display the view with the form
		$this->view('Vet/addOwner');
	}

	public function delete($owner_id){
		$owner = new \app\models\Owner();
		$owner->owner_id = $owner_id;
		$owner->deleteAnimals();
		$owner->delete();
		//Redirect back to the list
		header('location:/Vet/index');
	}

	public function edit($owner_id){
		$owner = new \app\models\Owner();
		$owner = $owner->get($owner_id); //Built in the Owner.php under the models folder
		if(isset($_POST['action'])){
			$owner->first_name = $_POST['first_name'];
			$owner->last_name = $_POST['last_name'];
			$owner->contact = $_POST['contact'];

			$owner->update();

			header('location:/Vet/index');
		} 
		else{
			$this->view('Vet/editOwner', $owner);
		}
	}

	public function details($owner_id){
		$owner = new \app\models\Owner();
		$owner = $owner->get($owner_id);
		$this->view('Vet/ownerDetails', $owner);
	}
}