<?php 
	class Autoloader {

		function __construct() {
			spl_autoload_register([$this, 'controller']);
			spl_autoload_register([$this, 'model']);
			spl_autoload_register([$this, 'lib']);

			$this->loader();
		}
		private function loader() {
			if (isset($_POST['mod']) and isset($_POST['action'])) {
				$mod = $_POST['mod'];
				$action = $_POST['action'];
			} elseif (isset($_GET['mod']) and isset($_GET['action'])) {
				$mod = $_GET['mod'];
				$action = $_GET['action'];
			} else {
				$mod = "HelloUsr";
				$action = "index";
			}

			$controller = $mod . ControllerSuffix;

			if (class_exists($controller)) {
				$controllerObject = new $controller;
				if (method_exists($controllerObject, $action)) {
					$controllerObject->$action();
				} else {
					echo "Method Not Exists!";
				}
			} else {
				echo "Class Not Exists!";
			}

		}
		private function model($class) {
			$file = ModelPath . $class . ".php";
			if (file_exists($file)) {
				require $file;
			}
		}

		private function controller($class) {
			$file = ControllerPath . $class . ".php";
			if (file_exists($file)) {
				require $file;
			}
		}

		private function lib($class) {
			$file = LibPath . $class . ".php";
			if (file_exists($file)) {
				require $file;
			} 
		}

	}

 ?>