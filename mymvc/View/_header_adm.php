<!DOCTYPE html>
<html>
	<meta charset="UTF-8"/>
<head>
	<title>火车票管理系统</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
	<script type="text/javascript" src="public/js/jquery-2.0.2.js"></script>
	<script type="text/javascript" src="public/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="./"></a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<!-- <li><a href="?mod=Hello&action=index">Hello</a></li>-->
				<!-- <li><a href="?mod=Hello&action=bye">Bye</a></li>-->
				<li><a href="?mod=Users&action=index">用户列表</a></li>
				<li><a href="?mod=File&action=readExcel">读取Excel</a></li>
				<li><a href="?mod=File&action=makeExcel">生成Excel</a></li>
			</ul>
			<div class="nav navbar-nav navbar-right">
				<a class="btn btn-danger" href="?mod=Auth&action=logout">Log out</a>
			</div>
		</div>		
		
	</div> <!-- close nav container -->
</nav>
<div class="container">
	<br>
	<br>
