<!DOCTYPE html PUBLIC "http://localhost/database/indexlogin.php">
	<html>
	<head>
	<?php
		include'connection.php';


	?>
	<link href= link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@500&display=swap" rel="stylesheet">

	<title>SHOP - Homepage</title>
		<style>
		body{
			margin: 0px;
			border: 0px;

		
		}
		#header{
			background: navy;
			color: white;
			height: 100px;
			width: 100%;
			padding-left:50px;
			font-size: 300%;
			font-style: Monospace;
			font-family: 'Baloo Tamma 2', cursive;
		}
		#sidebar{
			height: 1000px;
			width: 20%;
			background: #eee;
			float: right;
			padding-left: 20px;
			background: lightblue ;
			font-family: 'Baloo Tamma 2', cursive;
		}
		#main{
			padding-left: 20px;
			width: 76.8%;
			height: 1000px;
			background: lightcyan;
			float: left;
			font-style: Monospace;
			font-family: 'Baloo Tamma 2', cursive;
		}

		</style>
	</head>
	<body>
	<div id="header">
	<h4> SAKILA </h4>
	</div>

	<div id="sidebar">
	
	<a href="indexlogin.php">Login</a>

	</div>

	<div id="main">
	<h3> Welcome to SAKILA! </h3>
	
	</div>

	</body>
	</html>