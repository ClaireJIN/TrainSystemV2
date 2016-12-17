<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>火车票管理系统</title>
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/css/login.css">
	<script type="text/javascript" src="public/js/jquery-2.0.2.js"></script>
	<script type="text/javascript" src="public/js/bootstrap.js"></script>
	<script type="text/javascript" src="public/js/login.js"></script>
</head>
<body>
<div class="container">
	<form class="form-signin" id="loginForm" action="./" method="POST">
		<h2 class="form-signin-heading">火车票管理系统</h2>
		<input class="form-control" type="text" id="userid" name="userid" placeholder="ID">
		<input class="form-control" type="password" id="userpassword" name="userpassword" placeholder="PASSWORD">
		<input type="radio" id="adm" name="person_t" >管理员
	    <input type="radio" id="usr" name="person_t" checked>用户
		<button class="btn btn-primary" id="loginButton" onclick="return false">登录</button>
		<input type="hidden" id="mod" name="mod" value="Auth">
		<input type="hidden" id="action" name="action" value="loginAuth">
	</form>

</div>


</body>
</html>