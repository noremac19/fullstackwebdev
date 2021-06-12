<?php


require 'config.php';

if ( !isset($_POST['email']) || empty($_POST['email'])
	|| !isset($_POST['username']) || empty($_POST['username'])
	|| !isset($_POST['password']) || empty($_POST['password']) ) {
	$error = "Please fill out all required fields.";
}else{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	$sql_registered = "SELECT * FROM accounts 
	WHERE username = '" . $_POST["username"] . 
	"' OR email = '" . $_POST["email"] . "';";

	$results_registered = $mysqli->query($sql_registered);
	if(!$results_registered) {
		echo $mysqli->error;
		exit();
	}
	

	
	if($results_registered->num_rows > 0) {
		$error = "Username or email has been already taken. Please choose another one.";
	}else{

		$password = hash("sha256", $_POST["password"]);
		$sql = "INSERT INTO accounts(first_name, last_name, username, email, password) VALUES('" . $_POST["firstname"] . "','" . $_POST["lastname"] . "','" . $_POST["username"] . "','" . $_POST["email"] . "','" . $password . "');";

		// echo "<hr>" . $sql . "<hr>";

		$results = $mysqli->query($sql);
		if(!$results) {
			echo $mysqli->error;
			exit();
		}
	}

	$mysqli->close();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Confirmation | WIndies</title>
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

		#outer{
			text-align: center;
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

		#already{
			font-size: 30px;
			font-weight: bold;
			color: black;

			margin-left: 180px;
		}

		.btn{
			background-color: #8a4100;
			border: none;
		}

		/*@media(max-width: 850px){
			#outer{
				
				margin-left: auto;
				margin-right: auto;
				width: 80%;
				border: solid 2px black;
				background-color: #f2b10e;
				margin-top: 20px;
				padding-top: 20px;
				padding-bottom: 20px;
				border-radius: 15px 15px 15px 15px;
			}
		}

		@media(max-width: 645px){
			#outer{
				
				margin-left: auto;
				margin-right: auto;
				width: 90%;
				border: solid 2px black;
				background-color: #f2b10e;
				margin-top: 20px;
				padding-top: 20px;
				padding-bottom: 20px;
				border-radius: 15px 15px 15px 15px;
			}
		}*/

		.btn:hover{
			background-color: #8a4100;
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
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">User Registration</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<div class="row mt-4">
			<div class="col-12">
				<?php if ( isset($error) && !empty($error) ) : ?>
					<div class="text-danger"><?php echo $error; ?></div>
				<?php else : ?>
					<div class="text-success">Your account: (<?php echo $_POST['username']; ?>) was successfully registered.</div>
				<?php endif; ?>
		</div> <!-- .col -->
	</div> <!-- .row -->

		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="login.php" role="button" class="btn btn-primary">Login</a>
			</div> <!-- .col -->
		</div> <!-- .row -->

	</div> <!-- .container -->
</div>s
</body>
</html>