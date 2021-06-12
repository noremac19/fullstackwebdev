
<?php
	session_start(); 
	session_destroy(); 
	header("Location: /~cwalcott/final_project/home.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WIndies Cricket Board</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<style>
		html, body{
			margin: 0;
			padding: 0;
		}

		

		.navbar{
			background-color: #7b0041;
			/*height: 100px;*/

		}

		.outer{
			
			margin-left: auto;
			margin-right: auto;
			width: 56%;
			border: solid 2px black;
			background-color: #f2b10e;
			margin-top: 20px;
			padding-top: 20px;
			padding-bottom: 20px;
			border-radius: 15px 15px 15px 15px;
		}

		#logo{
			width: 80px;
			height: 80px;
		}

		.flex{
			display: flex;
			justify-content: center;
		}

		.sep{
			padding-left: 20px;
			padding-right: 20px;
		}

		#welcome{
			font-size: 30px;
			font-weight: bold;
			color: black;

			text-align: center;
		}

		.btn{
			background-color: #8a4100;
			border: none;
			color: white;
		}

		@media(max-width: 757px){
			#outer{
			
				margin-left: auto;
				margin-right: auto;
				width: 70%;
				border: solid 2px black;
				background-color: #f2b10e;
				margin-top: 20px;
				padding-top: 20px;
				padding-bottom: 20px;
				border-radius: 15px 15px 15px 15px;
			}
		}

		.align{
			margin: auto;
			text-align: center;
		}

		.imperial{
			color: #7b0041;
		}

		.imperial:hover{
			color: #7b0041;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light">
	  <div class="container-fluid">
	  	<img src="https://s.ndtvimg.com/images/entities/300/west-indies-women-cricketteams106359-west-indies-women-teamprofile.png" id="logo">

	    <a class="navbar-brand text-white" href="untitled.html"> <strong> WIndies Cricket Board </strong> </a>
	</nav>

	<div class="container outer">
		<div class="row align">
			<h1 class="col-12 mt-4 mb-4">Logout</h1>
			<div class="col-12">You are now logged out.</div>
			<div class="col-12 mt-3">You can go to <a href="home.php" class="imperial">home page</a> or <a href="login.php" class="imperial">log in</a> again.</div>

		</div> <!-- .row -->
	</div> <!-- .container -->

</body>
</html>