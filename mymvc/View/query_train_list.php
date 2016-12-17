<?php include "_header_usr.php" ?>

<table class="table table-striped table-bordered table-hover">
	<tr class="danger">
		<td>列车号</td>
		<td>出发时间</td>
		<td>到站时间</td>
		<td>出发站</td>
		<td>到达站</td>
		<td>票价</td>
		<td>		</td>
	</tr>
	<?php for ($i = 0; $i < count($myTrains); $i += 6){?>

		<tr>
			<td><?=$myTrains[$i] ?>
			<td><?=$myTrains[$i+1] ?>
			<td><?=$myTrains[$i+2] ?>
			<td><?=$myTrains[$i+3] ?>
			<td><?=$myTrains[$i+4] ?>
			<td><?=$myTrains[$i+5] ?>
			<td><a href="?mod=Trains&action=purchase&trainid=<?=$myTrains[$i]?>&start_station=<?=$myTrains[$i+3]?>&destnation=<?=$myTrains[$i+4]?>" >购票</td>
		</tr>

	<?php } ?>
</table>

<?php include "_footer.php" ?>