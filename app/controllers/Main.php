<?php
namespace app\controllers;

class Main extends \app\core\Controller{
	public function index(){
		$this->view('Main/index');
	}

	public function index2(){
		$this->view('Main/index2');
	}

	public function foods(){
		//Process the form data if it is submitted
		if(isset($_POST['action'])){
			//Creates a food object
			$newfood = new \app\models\Food();
			//Populate the food object
			$newfood->name = $_POST['new_food'];
			//Calls the method insert()
			$newfood->insert();
		}

		//Read the foods.txt into a variable
		$food = new \app\models\Food();
		$foods = $food->getAll();

		//echo getcwd(); //- Gets the current directory

		//Pass the foods to the view for render and output
		$this->view('Main/foods', $foods);
		
		//For testing purposes
		//var_dump($_POST); 
	}
}