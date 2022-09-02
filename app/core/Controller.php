<?php

namespace app\core;

class Controller{
//TODO - Add a parameter for data
	public function view($name, $data = []){
		include('app/views/' . $name . '.php');
	}

}
