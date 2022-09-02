<?php 

namespace app\controllers;

class Food{

	//Deletes the food item in the foods.txt file
	public function delete($food_id){
		//Deletes a record with specific id
		$food = new \app\models\Food();
		$food->deleteAt($food_id);
		//Redirect to the list
		header('location:/Main/foods');
	}
}