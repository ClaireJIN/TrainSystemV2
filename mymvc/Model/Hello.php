<?php 

	class Hello extends Model {

		private $HelloData = [
								"Hello" => "Hello World!",
								"Bye" => "Good Bye!"
							];

		function __construct() {
			parent::__construct();
		}

		public function getData($key) {
			if (isset($this->HelloData[$key])) {
				return $this->HelloData[$key];
			} else {
				return "no data exsists";
			}
		}
	} // END class Hello extends Model
 ?>