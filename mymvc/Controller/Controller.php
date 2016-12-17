<?php 
	class Controller {
		function __construct() {			
			if (!$this->isLogin()) {
				$this->loadView("login");
				exit;
			}
		}

		public function isLogin() {
			return isset($_SESSION['username']) and isset($_SESSION['qx']);
		}

		protected function loadModel($model) {
			require ModelPath . $model . ".php";
		}

		protected function loadView($view){
			require ViewPath . $view . ".php";
		}

		protected function loadLib($Lib){
			require LibPath . $Lib . ".php";
		}

		protected function goHome(){
			header("Location:./");
		}


	} // END class Controller


 ?>