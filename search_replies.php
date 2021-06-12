<?php 
	require 'config.php';

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		echo "Error: " . $mysqli->connect_errno;
		exit();
	}
	
	$temp = "SELECT accounts.id FROM accounts WHERE username = '" . $_SESSION["previous"] . "';";
	$username = $_SESSION["previous"];
	$res = $mysqli->query($temp);	

	if($mysqli->error){
		header("Location: /~cwalcott/final_project/home.php");
	}
	if(!$res){
	 	echo "Error: " . $mysqli->error;
	 	exit();
	 	header("Location: /~cwalcott/final_project/home.php");
	}
	   
	while($row = $res->fetch_assoc()){
		$id = $row["id"];
	}

	///////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	$sql = "SELECT * FROM replies WHERE account_id = " . $id . ";";
	$results = $mysqli->query($sql);
	

	if (!$results) {
		echo $mysqli->error;
		exit();
	}
	
	
	
	///////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	$bio = "SELECT * FROM accounts WHERE id = " . $id . ";";
	$bio_results = $mysqli->query($bio);
	

	if (!$bio_results) {
		echo $mysqli->error;
		exit();
	}
	$mysqli->close();

?>
<!DOCTYPE html>
<html>

<head>
	<title>WIndies Cricket Board</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="cricketpage.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">
	<style>

		#logo{
			width: 50px;
			height: 50px;
		}

		

		.row-flexbox{
			display: flex;
			

		}

		.temp{
			width: 50%;
			background-color: white;

		}

		#pic{
			width: 30%;
		}

		#pic img{
			width: 60%;
			margin: auto;    
    		display: block;
			/*height: 90%;*/
		}

		#bio{
			width: 70%;
		}

		#text{
			padding: 5px;
			border: 2px solid black;
			background-color: rgba(255,255,255,0.95);
			min-height: 200px;
		}

		#large{
			font-size: 36px;
		}

		#sort{
			margin-left: 75%;
		}


		

				@media(max-width: 867px){
					.but{
						margin-top: 135%;
						margin-left: 20%;
						background-color: #8a4100;
						border: none;
					}

					

					#pic img{
						width: 120px;
						height: 120px;
						margin: auto;    
		    			display: block;
					}
				}

				@media(max-width:917px){
					
					
					#pic img{
						width: 130px;
						height: 130px;
						margin: auto;    
		    			display: block;
					}
				}


				@media(max-width: 1300px){
					

					.but{
						margin-top: 135%;
						margin-left: 20%;
						background-color: #8a4100;
						border: none;
					}

				}

				.slide-in{
				  animation-duration: 1.5s;
				  animation-name: slidel;
				 
				  
				}

				@keyframes slidel {
				  from {
				      margin-left: 100%;
				      width: 300%;
				    }

				    to {
				      margin-left: 0%;
				      width: 100%;
				    }
				}

				@media(max-width:613px){
					.results{
						display: none;
					}

					.disappear{
						display: none;
					}


					#pic img{
						width: 90px;
						height: 90px;
					}

					#bottom{
						text-align: center;
						margin: auto;
						background-color: #7b0041;
						margin-top: 490px;
						color: white;
					}
				}

		

		.hide{
			display: none;
		}



		.woah{
			clear: both;
		}

		.hold{
			margin-top: 5px;
		}

		.space{
			margin-top: 5px;
		}

		



	</style>
</head>


<body>
	

	<nav class="navbar navbar-expand-lg navbar-light">
		<img src="https://s.ndtvimg.com/images/entities/300/west-indies-women-cricketteams106359-west-indies-women-teamprofile.png" id="logo">
		<a class="navbar-brand text-white lobster" href="home.php"> <strong> WIndies Cricket Board </strong> </a>
		
		<?php if(isset($_SESSION["logged_in"]) || $_SESSION["logged_in"]) : ?>
			<div class="p-2 text-white bold disappear">Hello <?php echo $_SESSION["username"]; ?>!</div>
		<?php endif; ?>

	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>


	 	<?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) : ?>

			<a class="p-2 text-right" href="/final/login.php">Login</a>
			<a class="p-2 text-right" href="/final/reg.php">Sign up</a>

		<?php else: ?>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    	<div class="navbar-nav">
		      		<a class="nav-item nav-link active text-white" href="home.php">Home</a>
		      		<a class="nav-item nav-link text-white bold" href="profile.php">Profile</a>
		      		<a class="nav-item nav-link text-white" href="logout.php">Logout</a>
		      		<form method="GET" action="search.php" class="form-inline">
		      			<label for="look" class="text-yellow mr-2">Search posts by user:</label>
		      		    <input class="look form-control mr-sm-2" name="username" type="search" placeholder="username" aria-label="Search" required>
		      		    <button class="btn search-button my-2 my-sm-0" type="submit">Search</button>
		      		</form>
		    	</div>
		 	</div>
			
		<?php endif; ?>
	</nav>



	<div class="container-fluid slide-in">
		<div class="row">
			<div class="outer col-12 col-md-8 ml-12">
			<?php while ( $row = $bio_results->fetch_assoc() ) : ?>	
				<?php $url = $row["profile_url"]; ?>
				<div class="row-flexbox">
					<div id="pic">
						<img src="<?php echo $row['profile_url']; ?>" class="rounded-circle" width="250px" height="250px">
					</div>
					
					<div id="bio">
						<div id="large">
							<?php echo $username; ?>
						</div>
			
						<div id="text">
							<?php echo $row["bio"]; ?>
						</div>
					</div>
				</div>

				
			<?php endwhile; ?>

				<div class="container-fluid"> <!-- might use bootstrap column instead of flexbox -->
					<div class="row">
						<div class="col-6 col-lg-6 col-md-6">
							<form>
								<label for="type">Type: </label>
								<select id="type" onchange="javascript:location.href = this.value;">
									<option value="search.php" >Posts</option>
								    <option value="search_replies.php" selected>Replies</option>
								</select>
								
							</form>
						</div>
						
					</div>
				</div>

				<div id="thread">

					<?php while ( $row = $results->fetch_assoc() ) : ?>
						<div class="section">
							<div class="reply">
								
								<div class="ml-2"> <?php echo $row["reply_text"]; ?> </div>

								<div class="container-fluid"> 
									<div class="row space">
										<div class="col-6 col-lg-6 col-md-6">
											<img src="<?php echo $url; ?>" class="user rounded-circle">
											<span><?php echo $username; ?></span>
										</div>
										<div class="col-6 col-lg-6 col-md-6">
											<div class="float-right">
												<div> 
													<?php 
														$date = $row["reply_date"];
														echo date("M d, Y g:iA", strtotime($date)); 
													?> 

												</div>
											</div>
										</div>

										
	
									</div>
								</div>
							</div>	
						</div>
					<?php endwhile; ?>

				</div>
			</div>

			<div class="results col-12 col-md-3 col-lg-3 mr-2">	
				<h1 id="header">MATCHES</h1>

			</div>
			</div>
		</div>
	</div>

	<div id="bottom">
		WIndies Cricket Board ©
	</div>

	<script src="api.js"></script> 

	<script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>