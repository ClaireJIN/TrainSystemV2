<?php 
	class Trains extends Model {
		function __construct() {
			parent::__construct();
		}

		public function getData($page, $pageLimit) {
			$startWith = ($page - 1) * $pageLimit;
			$query = "select trainID, start_station, destnation, start_leave_time, destnation_arrive_time from train";
			$query .= " limit $startWith, $pageLimit";
			return $this->db_fetch_array($query);
		}

		public function getTrainCount() {
			$query = "select count(trainID) as count from train";
			$result = $this->db_fetch_array($query);
			return $result[0]['count'];
		}


		public function queryTrain($start_station, $destnation, $day) {
			$trainIDs = [];
			$prices = [];
			$leaveTimes = [];
			$arriveTimes = [];

			$q = "select * from route where from_station = '". $start_station. "' ";
			$q .= "and to_station = '" . $destnation . "' ";
			$result = $this->db_fetch_array($q);
			$distance = $result[0]['distance'];

			$q = "select * from station where stationName = '" . $start_station . "' ";
			$r1 = $this->db_fetch_array($q);

			//foreach ($r1 as $station) {
				//$q = "select * from station where trainID = '" . $station['trainID'] . "' ";
				//$r2 = $this->db_fetch_array($q);
				foreach ($r1 as $train) {
					$q = "select * from station where stationName = '" . $destnation . "' ";
					$q .= "and trainID = '" . $train['trainID'] . "' ";
					$r3 = $this->db_fetch_array($q);

					foreach ($r3 as $mytrain) {
						$q = "select * from train where day = '". $day. "' ";
						$q .= "and trainID = '" . $mytrain['trainID']."'";
						$r4 = $this->db_fetch_array($q);
						foreach ($r4 as $element) {
							//echo $element['trainID'] . "  " . "<br>" ;
							$trainIDs[] = $element['trainID'];
							$type = $element['trainType'];

							$q = "select type_ratio from traintype where trainType = '". $type ."' ";
							$r = $this->db_fetch_array($q);
							//echo $r[0]['type_ratio'] * $distance . "<br>";
							$prices[] = $r[0]['type_ratio'] * $distance;

							//$q = "select * from station where trainID = '" . $element['trainID'] . "' ";
							//$r5 = $this->db_fetch_array($q);
							//foreach ($r5 as $time) {
								$q = "select * from station where stationName = '" . $start_station . "' ";
								$q .= "and trainID = '". $element['trainID'] ."'";
								$r6 = $this->db_fetch_array($q);
								foreach ($r6 as $time)
									//echo $time['leave_time'] . "  " . "<br>" ;
									$leaveTimes[] = $time['leave_time'];
							//}

							//$q = "select * from station where trainID = '" . $element['trainID'] . "' ";
							//$r5 = $this->db_fetch_array($q);
							//foreach ($r5 as $time) {
								$q = "select * from station where stationName = '" . $destnation . "' ";
								$q .= "and trainID = '". $element['trainID'] ."'";
								$r6 = $this->db_fetch_array($q);
								foreach ($r6 as $time)
									//echo $time['arrive_time'] . "  " . "<br>" ;
									$arriveTimes[] = $time['arrive_time'];
							//}

						}
					}

				}
			//}
			$myTrains = [];
			for ($i = 0, $j = 0; $i < count($trainIDs); $i += 1, $j += 6) {
				//echo $trainIDs[$i] . "   ";
				//echo $leaveTimes[$i] . "   ";
				//echo $arriveTimes[$i] . "<br>";
				$myTrains[$j] = $trainIDs[$i];
				$myTrains[$j + 1] = $leaveTimes[$i];
				$myTrains[$j + 2] = $arriveTimes[$i];
				$myTrains[$j + 3] = $start_station;
				$myTrains[$j + 4] = $destnation;
				$myTrains[$j + 5] = $prices[$i];
				 //."  " . $leaveTimes[$i] . "  " . $arriveTimes[$i];
			}

			include ViewPath . "query_train_list.php";
		}

		public function purchaseTrain($trainID, $carriageType, $usrType, $usrID, $usrName, $from, $to) {
			echo $trainID;
			echo $carriageType;
			$q = "select * from carriage where trainID = '".$trainID."'";
			$q .= "and carriageType = '".$carriageType."'";
			$r = $this->db_fetch_array($q);
			if (!isset($r)) exit;
			$carriage = $r[0]['carriageID'];

			$q = "select * from seat where status = 0";
			$q .= "and carriageID = '".$carriageID."' ";
			$r = $this->db_fetch_array($q);

			if (!isset($r)) exit;
			$q = "update seat set status = 1, seatID = '".$usrID."' from_station = '".$from."', to_station = '".$to."'";
			$this->db_fetch_array($q);
		}
		
}
?>

   

