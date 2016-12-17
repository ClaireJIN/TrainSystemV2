<?php 
	class AuthController extends Controller {
		function __construct() {
		}

		public function loginAuth() {
			
			if (isset($_POST['userid']) and isset($_POST['userpassword'])) {
				{
					$id = $_POST['userid'];
					$password = $_POST['userpassword'];
					//if (isset($_POST['usr']))
					if (1)
					{
						$user = new Users;
						$login = $user->checkLogin($id, $password);
						if ($login) {
							$_SESSION['username'] = $id;
							$_SESSION['qx'] = 'user';
							$msg = ["status" => "user_ok"];
							echo json_encode($msg);
						} else {
							$msg = ["status" => "fail", "msg" => "用户名或密码错误！"];
							echo json_encode($msg);
						} 
					} else if (0){
						$adm = new Adms;
						$login = $adm->checkLogin($id, $password);
						if ($login) {
							$_SESSION['username'] = $id;
							$_SESSION['qx'] = 'adm';
							$msg = ["status" => "adm_ok"];
							echo json_encode($msg);
						} else {
							$msg = ["status" => "fail", "msg" => "登录名或密码错误！"];
							echo json_encode($msg);
						} 
				}

				}


			}
		}

		public function logout() {
			session_unset();
			session_destroy();
			$this->goHome();
		}







	} // END class AuthController extends Controller


 ?>