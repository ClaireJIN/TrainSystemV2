<?php include "_header_adm.php" ?>
<table class="table table-striped table-bordered table-hover">
	<tr class="danger">
		<td>     </td>
		<td>Email</td>
		<td>name</td>
		<td>password</td>
	</tr>
	<?php foreach ($result as $user) { ?>

		<tr>
			<td><a href="?mod=Users&action=deleteUser&userid=<?=$user['Email']?>">删除</td>
			<td><?=$user['Email'] ?>
			<td><?=$user['name'] ?>
			<td><?=$user['password'] ?>
		</tr>

	<?php } ?>
</table>

<div align="center">
	<?php $page->advanced_page_link(); ?>
</div>


<?php include "_footer.php" ?>