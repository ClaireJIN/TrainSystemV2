<?php 
	class Users extends Model {
		function __construct() {
			parent::__construct();
		}

		public function getData($page, $pageLimit) {
			$startWith = ($page - 1) * $pageLimit;
			$query = "select * from users";
			$query .= " limit $startWith, $pageLimit";
			return $this->db_fetch_array($query);
		}

		public function getUserCount() {
			$query = "select count(*) as count from users";
			$result = $this->db_fetch_array($query);
			return $result[0]['count'];
		}

		/*public function addUser($name, $password, $date) {
			$query = "insert into users values (null, '".$name."', '".$password."', '".$date."')";
			mysqli_query($this->conn, $query);
		}*/

		public function deleteUser($userid) {
			$query = "delete from users where Email='". $userid . "' ";
			mysqli_query($this->conn, $query);
		}

		public function checkLogin($id, $userpassword) {
			$query = "SELECT count(*) as count FROM users ";
			$query .= " where Email='" . $id . "'";
			$query .= " and password='" . $userpassword . "'";
			$result = $this->db_fetch_array($query);
		
			return $result[0]["count"] > 0 ? true : false;
		}

	}

 ?>