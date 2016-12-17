<?php 
	class UsersController extends Controller {
		function __construct() {
			parent::__construct();
		}

		public function index() {
			$param = "";
			foreach ($_GET as $key => $value) {
				if ($key == "page") continue;
				$param .= $key . "=" . $value . "&";
			}


			$user = new Users;
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$pageLimit = 4;
			$result = $user->getData($page, $pageLimit);
			$count = $user->getUserCount();
			$page = new Pagination($page, $pageLimit, $count, trim($param, "&"));

			include ViewPath . "user_list.php";
		}

		/*public function addUser() {
			//$user = new Users;
			//$user->addUser();
			//$this->index();
			$this->loadView("add_user");
		}

		public function addUserAction() {
			$userid = $_POST["userid"];
			$userpassword = $_POST["userpassword"];
			$logindate = date("Y-m-d");
			$user = new Users;
			$user->addUser($userid, $userpassword, $logindate);
			$this->index();
		}*/

		public function deleteUser() {
			$userid = $_GET['userid'];
			$user = new Users;
			$user->deleteUser($userid);
			$this->index();
		}
	} // END class UsersController extends Controller


 ?>