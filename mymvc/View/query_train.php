<?php include "_header_usr.php" ?>

<div class="col-xs-6 col-xs-offset-3">
	<h2>列车查询</h2><br>
	<form action="./" method="POST">
		出发站：<input type="text" id="start_station" name="start_station" class="form-control"><br>
		到达站：<input type="text" id="destnation" name="destnation" class="form-control"><br>
		出发时间：<input type="date" id="day" name="day" class="form-control"><br>
		<input type="hidden" name="mod" value="Trains">
		<input type="hidden" name="action" value="queryTrainAction">
		<button class="btn btn-primary" id="addUserBtn">查询</button>
	</form>
</div>


<?php include "_footer.php" ?>