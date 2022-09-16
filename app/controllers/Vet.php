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
		print_r($owners);
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
		$this->view('Vet/addOwner')
	}
}