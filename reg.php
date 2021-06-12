<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register | WIndies</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="logreg.css">
	<style>
		
		
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

		@media(max-width: 850px){
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
		}

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
			
			<form action="reg_confirm.php" method="POST">

				<div class="form-group row">
					<label for="firstname-id" class="col-sm-3 col-form-label text-sm-right"><strong>First name: </strong><span class="text-danger">*</span></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="firstname-id" name="firstname">
						
					</div>
				</div> <!-- .form-group -->


				<div class="form-group row">
					<label for="lastname-id" class="col-sm-3 col-form-label text-sm-right"><strong>Last name: </strong><span class="text-danger">*</span></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="lastname-id" name="lastname">
					</div>
				</div> <!-- .form-group -->


				<div class="form-group row">
					<label for="username-id" class="col-sm-3 col-form-label text-sm-right"><strong>Username: </strong><span class="text-danger">*</span></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="username-id" name="username">
						<small id="username-error" class="invalid-feedback">Username is required.</small>
					</div>
				</div> <!-- .form-group -->

				<div class="form-group row">
					<label for="email-id" class="col-sm-3 col-form-label text-sm-right"><strong>Email: </strong><span class="text-danger">*</span></label>
					<div class="col-sm-9">
						<input type="email" class="form-control" id="email-id" name="email">
						<small id="email-error" class="invalid-feedback">Email is required.</small>
					</div>
				</div> <!-- .form-group -->	

				<div class="form-group row">
					<label for="password-id" class="col-sm-3 col-form-label text-sm-right"><strong>Password: </strong><span class="text-danger">*</span></label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="password-id" name="password">
						<small id="password-error" class="invalid-feedback">Password is required.</small>
					</div>
				</div> <!-- .form-group -->

				<div class="row">
					<div class="ml-auto col-sm-9">
						<span class="text-danger font-italic">* Required</span>
					</div>
				</div> <!-- .form-group -->

				<div class="form-group row">
					<div class="col-sm-3"></div>
					<div class="col-sm-9 mt-3">
						<button type="submit" class="btn btn-primary">Register</button>
						
					</div>
				</div> <!-- .form-group -->

				<div class="row">
					<div class="col-sm-9 ml-sm-auto">
						<a href="login.php" style="color: #7b0041"><strong>Already have an account? </strong></a>
					</div>
				</div> <!-- .row -->

			</form>
		</div> <!-- .container -->
	</div>
	<script>
		document.querySelector('form').onsubmit = function(){
			if ( document.querySelector('#firstname-id').value.trim().length == 0 ) {
				document.querySelector('#firstname-id').classList.add('is-invalid');
			} else {
				document.querySelector('#firstname-id').classList.remove('is-invalid');
			}


			if ( document.querySelector('#lastname-id').value.trim().length == 0 ) {
				document.querySelector('#lastname-id').classList.add('is-invalid');
			} else {
				document.querySelector('#lastname-id').classList.remove('is-invalid');
			}


			if ( document.querySelector('#username-id').value.trim().length == 0 ) {
				document.querySelector('#username-id').classList.add('is-invalid');
			} else {
				document.querySelector('#username-id').classList.remove('is-invalid');
			}



			if ( document.querySelector('#email-id').value.trim().length == 0 ) {
				document.querySelector('#email-id').classList.add('is-invalid');
			} else {
				document.querySelector('#email-id').classList.remove('is-invalid');
			}


			if ( document.querySelector('#password-id').value.trim().length == 0 ) {
				document.querySelector('#password-id').classList.add('is-invalid');
			} else {
				document.querySelector('#password-id').classList.remove('is-invalid');
			}

			return ( !document.querySelectorAll('.is-invalid').length > 0 );
		}
	</script>
</body>
</html>