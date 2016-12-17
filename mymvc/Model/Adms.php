<?php 

class Adms extends Model {

	function __construct() {
		parent::__construct();
	}

	public function checkLogin($id, $userpassword) {
			$query = "SELECT count(*) as count FROM adm ";
			$query .= " where Email='" . $id . "'";
			$query .= " and password='" . $userpassword . "'";
			$result = $this->db_fetch_array($query);
		
			return $result[0]["count"] > 0 ? true : false;
	}
}

 ?>
