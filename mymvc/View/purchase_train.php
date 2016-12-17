<?php include "_header_usr.php" ?>

<div class="col-xs-6 col-xs-offset-3">
	<h2>购票</h2><br>
	<form action="./" method="POST">
		乘客类型：<input type="text" id="usrType" name="usrType" class="form-control"><br>
		乘客身份证号：<input type="text" id="usrID" name="usrID" class="form-control"><br>
		乘客姓名：<input type="text" id="usrName" name="usrName" class="form-control"><br>
		车厢类型：<input type="text" id="carriageType" name="carriageType" class="form-control"><br>
		<input type="hidden" name="mod" value="Trains">
		<input type="hidden" name="action" value="purchaseTrainAction">
		<input type="hidden" name="trainID" value=<?=$_GET['trainid']?> >
		<input type="hidden" name="from" value=<?=$_GET['start_station']?> >
		<input type="hidden" name="to" value=<?=$_GET['destnation']?> >
		<button class="btn btn-primary" id="addUserBtn">购票</button>
	</form>
</div>


<?php include "_footer.php" ?>