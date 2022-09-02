<?php

namespace app\models;

class Food{

	//Self:: - refers to the class
	//this-> - refers to the object

	public $name;
	public $id; //line number in the file
	private static $file = 'app/resources/foods.txt';

	//Add the new entry to the end of the foods.txt file
	public function insert(){
			$fh = fopen(self::$file, 'a');
			flock($fh, LOCK_EX); //Locks the file when it is being used
			fwrite($fh, $this->name . "\n");
			flock($fh, LOCK_UN); //Unlocks the file
			fclose($fh);
	}

	//Reads the data in the foods.txt file
	public function getAll(){
		//Read the foods.txt into a variable
		$foods = file(self::$file);
		$output = []; // or array() to build an empty array
		$i = 0;

		foreach ($foods as $food) {
			$item = new Food();
			$item->name = $food;
			$item->id = $i;
			$output[] = $item;
			$i++;
		}
		return $output;
	}


	public function deleteAt($food_id){
		//Read the foods.txt into a variable
		$foods = file(self::$file); 
		if(!isset($foods[$food_id]))
			return;
		unset($foods[$food_id]);
		$fh = fopen(self::$file, 'w');
		flock($fh, LOCK_EX);
		foreach ($foods as $food) {
			fwrite($fh, $food);
		}
		flock($fh, LOCK_UN);
		fclose($fh);
	}

	public function __toString(){
		return $this->name;
	}

}