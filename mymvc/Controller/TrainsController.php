<?php 
	class TrainsController extends Controller {
		function __construct() {
			parent::__construct();
		}

		public function index() {
			$param = "";
			foreach ($_GET as $key => $value) {
				if ($key == "page") continue;
				$param .= $key . "=" . $value . "&";
			}


			$train = new Trains;
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$pageLimit = 4;
			$result = $train->getData($page, $pageLimit);
			$count = $train->getTrainCount();
			$page = new Pagination($page, $pageLimit, $count, trim($param, "&"));

			include ViewPath . "train_list.php";
		}


		public function query() {
			$this->loadView("query_train");
		}

		public function queryTrainAction() {
			$start_station = $_POST['start_station'];
			$destnation = $_POST['destnation'];
			$day = $_POST['day'];
			$train = new Trains;
		    $train->queryTrain($start_station, $destnation, $day);
		}

		public function purchase() {
			$this->loadView('purchase_train');
		}

		public function purchaseTrainAction() {
			$trainID = $_GET['trainID'];
			$from = $_GET['start_station'];
			$to = $_GET['destnation'];
			$usrType = $_POST['usrType'];
			$usrID = $_POST['usrID'];
			$usrName = $_POST['usrName'];
			$carriageType = $_POST['carriageType'];
			$train = new Trains;
			echo $usrID;
			$train->purchaseTrain($trainID, $carriageType, $usrType, $usrID, $usrName, $from, $to);
		}
	}


 ?>