<?php
	namespace app\core;

	class App{
		private $controller = 'Main';
		private $method = 'index';

		public function __construct(){
			//echo $_GET['url'];
			//TODO - reaplce this echo with routing algorithm
			//Goal - separate the URL in parts

			$url = self::parseUrl(); // get the URL parsed and returned as an array of URL segment

			//Use the first part to determine the class to load

			if(isset($url[0])){
				if(file_exists('app/controllers/' . $url[0] . '.php')){
					$this->controller = $url[0]; //$this refers to the current object
				}
				unset($url[0]);
			}
			$this->controller ='app\\controllers\\' . $this->controller; //provide a fully qualified classname
			$this->controller = new $this->controller; 

			//Use the second part to determine the method to run 

			if(isset($url[1])){
				if(method_exists($this->controller, $url[1])){
					$this->method = $url[1];
				}
				unset($url[1]);
			}

			//var_dump($url);

			//... while passing all other parts as arguments
			//repackage the parameters

			$params = $url ? array_values($url) : [];
			call_user_func_array([ $this->controller, $this->method ], $params);
		}

		public static function parseUrl(){
			if(isset($_GET['url'])) //get URL exists
			{
				return explode('/', //return parts in an array, separated by /
				filter_var( //remove non-URL characters and sequences
					rtrim($_GET['url'], '/')),
				FILTER_SANITIZE_URL);
			}
		}
	}