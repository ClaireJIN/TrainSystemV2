<?php include "_header.php" ?>

<div class="col-xs-6 col-xs-offset-3">
	<h2>添加用户</h2><br>
	<form action="./" method="POST">
		用户ID：<input type="text" id="userid" name="userid" class="form-control"><br>
		密码：<input type="password" id="userpassword" name="userpassword" class="form-control"><br>
		<input type="hidden" name="mod" value="Users">
		<input type="hidden" name="action" value="addUserAction">
		<button class="btn btn-primary" id="addUserBtn">添加用户</button>
	</form>
</div>


<?php include "_footer.php" ?>