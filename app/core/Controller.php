<?php

namespace app\core;

class Controller{
//TODO - Add a parameter for data
	public function view($name, $data = []){
		include('app/views/' . $name . '.php');
	}

	public function saveFile($file){
		$check = getimagesize($file['tmp_name']);
		$allowed_types = ['iamge/jpeg'=>'jpg', 'image/png'=>'png'];
		if(in_array($check['mime'], array_keys($allowed_types))){
			$ext = $allowed_types[$check['mime']];
			$filename = uniqid() . ".$ext";
			move_uploaded_file($file['tmp_name'], 'images/' .$filename);
			return $filename;
		}
		return '';
	}
}
