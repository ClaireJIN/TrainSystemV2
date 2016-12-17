<?php 
	class HelloAdmController extends Controller {
		function __construct() {
			parent::__construct();
		}

		public function index() {
			$data = new Hello;
			$result = $data->getData("Hello");
			include ViewPath . "HelloAdm.php";
		}

		public function bye() {
			$data = new Hello;
			$result = $data->getData("Bye");
			include ViewPath . "Bye.php";
		}
	}
 ?>