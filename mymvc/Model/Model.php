<?php 
	/**
	 * undocumented class
	 *
	 * @package default
	 * @author 
	 **/
	class Model {
		// 数据库连接对象
		protected $conn;

		function __construct() {
			$this->db_connection();
		}

		protected function db_connection() {
			$this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

			if (mysqli_connect_errno()) {
				die("connect error:" . mysqli_connect_error());
			}
		}

		public function db_fetch_array($query) {
			$result = mysqli_query($this->conn, $query);

			while ($row = mysqli_fetch_array($result)) {			
				$data[] = $row;
			}

			return $data;
		}
	} // END class DB
 ?>