<?php
	
	require 'config.php';

	if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]){
		if(isset($_POST['username']) && isset($_POST['password'])){
			if(empty($_POST['username']) || empty($_POST['password'])){

				$error = "Please enter username and password.";

			}else{

				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

				if($mysqli->connect_errno) {
					echo $mysqli->connect_error;
					exit();
				}

				$passwordInput = hash("sha256", $_POST['password']);

				$sql = "SELECT * FROM accounts
							WHERE username = '" . $_POST['username'] . "' AND password = '" . $passwordInput . "';";

				
				
				$results = $mysqli->query($sql);

				if(!$results){
					echo $mysqli->error;
					exit();
				}

				if($results->num_rows > 0){
					$_SESSION["username"] = $_POST["username"];
					$_SESSION["logged_in"] = true;

					// Success! Redirect user to the home page
					header("Location: /~cwalcott/final_project/home.php");
				}else{
					$error = "Invalid username or password.";
				}
			} 
		}
	}else{
		header("Location: /~cwalcott/final_project/home.php");
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | WIndies</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="logreg.css">
	<style>


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


	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light">
	  <div class="container-fluid">
	  	<img src="https://s.ndtvimg.com/images/entities/300/west-indies-women-cricketteams106359-west-indies-women-teamprofile.png" id="logo">

	    <a class="navbar-brand text-white" href="home.php"> <strong> WIndies Cricket Board </strong> </a>
	</nav>

	<div id="outer">
		
		<div class="container-fluid">
			<div id="welcome">
				Welcome Back!
			</div>
			<form action="login.php" method="POST">

				<div class="row mb-3">
					<div class="font-italic text-danger col-sm-9 ml-sm-auto">
						<!-- Show errors here. -->
						<?php
							if ( isset($error) && !empty($error) ) {
								echo $error;
							}
						?>
					</div>
				</div> <!-- .row -->
				

				<div class="form-group row">
					<label for="username-id" class="col-sm-3 col-form-label text-sm-right"> <strong>Username:</strong></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="username-id" name="username">
					</div>
				</div> <!-- .form-group -->

				<div class="form-group row">
					<label for="password-id" class="col-sm-3 col-form-label text-sm-right"><strong>Password:</strong></label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="password-id" name="password">
					</div>
				</div> <!-- .form-group -->

				<div class="form-group row">
					<div class="col-sm-3"></div>
					<div class="col-sm-9 mt-2">
						<button type="submit" class="btn">Login</button>
					</div>
				</div> <!-- .form-group -->
			</form>

			
			<div class="row">
				<div class="col-12 col-md-12 col-lg-12 d-flex justify-content-center">
					<a href="reg.php" style="color: #00aa58"> <strong>Create an account </strong></a>
				</div>
			</div>

		</div> <!-- .container -->
	</div>
</body>
</html>