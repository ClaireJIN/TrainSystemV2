<?php include "_header_usr.php" ?>

<table class="table table-striped table-bordered table-hover">
	<tr class="danger">
		<td>列车号</td>
		<td>始发站</td>
		<td>终点站</td>
		<td>出发时间</td>
		<td>到站时间</td>
	</tr>
	<?php foreach ($result as $train) {?>

		<tr>
			<td><?=$train['trainID'] ?>
			<td><?=$train['start_station'] ?>
			<td><?=$train['destnation'] ?>
			<td><?=$train['start_leave_time'] ?>
			<td><?=$train['destnation_arrive_time'] ?>
		</tr>

	<?php } ?>
</table>

<div align="center">
	<?php $page->advanced_page_link(); ?>
</div>

<?php include "_footer.php" ?>