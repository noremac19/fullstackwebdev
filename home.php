<?php 
	require 'config.php';

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if ($mysqli->connect_errno) {
		echo "Error: " . $mysqli->connect_errno;
		exit();
	}
	// $username = $_SESSION["username"];
	// $temp = "SELECT accounts.id FROM accounts WHERE username = '" . $username . "';";
	
	// $res = $mysqli->query($temp);	

	// if(!$res){
	//  	echo "Error: " . $mysqli->error;
	//  	exit();
	// }
	   
	// while($row = $res->fetch_assoc()){
	// 	$id = $row["id"];
	// }

	///////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	$sql = "SELECT posts.id, posts.title, accounts.profile_url, posts.post_text, posts.post_date, posts.account_id, accounts.username FROM posts 
	LEFT JOIN accounts ON accounts.id = posts.account_id ORDER BY posts.post_date DESC;";
	$posts = $mysqli->query($sql);
	
	

	if (!$posts) {
		echo $mysqli->error;
		exit();
	}

	///////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	$sql2 = "SELECT accounts.username, accounts.profile_url, replies.reply_text, replies.post_id, replies.account_id, replies.reply_date FROM replies 
	LEFT JOIN accounts ON accounts.id = replies.account_id;";
	$replies = $mysqli->query($sql2);
	
	$size = $replies->num_rows;

	if (!$replies) {
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="cricketpage.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">
	
	<style>
		#logo{
			width: 50px;
			height: 50px;
		}

		#switch{
			margin-left: auto;
			margin-right: auto;
			
		}

		#textbox{
			margin-left: auto;
			margin-right: auto;
		}

		.yo{
			margin-left: auto;
			margin-right: auto;
			display: block;
		}

		.but{
			margin-top: 185%;
			margin-left: 20%;
			background-color: #8a4100;
			border: none;
		}

		.but:hover{
			background-color: #97d0e9;
		}

		

		.slide{
		  animation-duration: 2s;
		  animation-name: sliding-vertically;
		 
		  
		}

		@keyframes sliding-vertically {
		  from {
		    margin-top: 100%;
		    width: 100%;
		  }

		  to {
		    margin-bottom: 100%;
		    width: 100%;
		  }
		}

		#post-id{
			width: 450px;
			height: 200px;
			margin-top: 20px;
			border-radius: 15px 15px 15px 15px;
			padding-left: 10px;
			padding-top: 5px;
			border: none;
		}

		#title-id{
			width: 450px;
			height: 30px;
			margin-top: 20px;
			border-radius: 15px 15px 15px 15px;
			margin-left: auto;
			margin-right: auto;
			display: block;
			padding-left: 10px;
			padding-top: 5px;
			border: none;
		}
		
		.big{
			margin-top: 325%;
			margin-left: 20%;
			background-color: #8a4100;
			border: none;
		}

		.text-yellow{
			color: rgb(242,177,14);
		}

		.big:hover{
			background-color: #97d0e9;
		}

		
		a{
			color: black;
		}
		a:hover{
			color: #7b0041;
		}

		#thread{
			width: 90%;
			margin-left: auto;
			margin-right: auto;

			color: white;
			
		}

		.section{
			width: 90%;
			background-color: rgba(255,255,255,0.3);
			margin-left: auto;
			margin-right: auto;
			margin-top: 20px;
			padding: 15px;
			border-radius: 15px 15px 15px 15px;
		}

		.comment{
			width: 90%;
			margin-left: auto;
			margin-right: auto;
			background-color: rgba(123,0,65,0.9);
			padding: 15px;
			border-radius: 15px 15px 15px 15px;
		}

		.reply{
			width: 78%;
			color: white;
			margin-top: 10px;
			background-color: rgba(151,208,233,0.9);
			padding: 15px;
			margin-left: 17.5%;
			border-radius: 15px 15px 15px 15px;

		}

		.user{
			width: 35px;
			height: 35px;
		}

		

		.title{
			font-size: 24px;
			font-weight: bold;
		}

		

		#header{
			text-align: center;
			color: #97d0e9;
		}

		.row-flexbox{
			display: flex;
			
		}

		

		.expand{
			text-align: right;
			margin-left: 90%;
		}

		@media(max-width: 867px){
			.but{
				margin-top: 135%;
				margin-left: 20%;
				background-color: #8a4100;
				border: none;
			}

			#reply-id{
				width: 180px;
				height: 120px;
				margin-top: 20px;
				border-radius: 15px 15px 15px 15px;
				padding-left: 10px;
				padding-top: 5px;
				border: none;
			}

			#post-id{
				width: 280px;
				height: 200px;
				margin-top: 20px;
				border-radius: 15px 15px 15px 15px;
				padding-left: 10px;
				padding-top: 5px;
				border: none;
			}

			#title-id{
				width: 250px;
				height: 30px;
				margin-top: 20px;
				border-radius: 15px 15px 15px 15px;
				margin-left: auto;
				margin-right: auto;
				display: block;
				padding-left: 10px;
				padding-top: 5px;
				border: none;
			}

		}

		

		@media(max-width:991px){
			.expand{
				text-align: right;
				float: left;
				margin-left: 70%;
				margin-top: 5px;
			}
		}

		@media(min-width: 1300px){
			#reply-id{
				width: 500px;
				height: 120px;
				margin-top: 20px;
				border-radius: 15px 15px 15px 15px;
				padding-left: 10px;
				padding-top: 5px;
				border: none;
			}

			#post-id{
				width: 450px;
				height: 200px;
				margin-top: 20px;
				border-radius: 15px 15px 15px 15px;
				padding-left: 10px;
				padding-top: 5px;
				border: none;
			}

			#title-id{
				width: 450px;
				height: 30px;
				margin-top: 20px;
				border-radius: 15px 15px 15px 15px;
				margin-left: auto;
				margin-right: auto;
				display: block;
				padding-left: 10px;
				padding-top: 5px;
				border: none;
			}
		}

		@media(max-width: 1300px){
			#reply-id{
				width: 300px;
				height: 120px;
				margin-top: 20px;
				border-radius: 15px 15px 15px 15px;
				padding-left: 10px;
				padding-top: 5px;
				border: none;
			}

			.but{
				margin-top: 135%;
				margin-left: 20%;
				background-color: #8a4100;
				border: none;
			}

			.expand{
				text-align: right;
				float: left;
				margin-left: 85%;
				margin-top: 5px;
			}
		}

		
		@media(max-width:613px){
			.results{
				display: none;
			}

			.disappear{
				display: none;
			}

			.expand{
				text-align: right;
				float: left;
				margin-left: 70%;
				margin-top: 5px;
			}

			#reply-id{
				width: 120px;
				height: 120px;
				margin-top: 20px;
				border-radius: 15px 15px 15px 15px;
				padding-left: 10px;
				padding-top: 5px;
				border: none;
			}

			#post-id{
				width: 280px;
				height: 200px;
				margin-top: 20px;
				border-radius: 15px 15px 15px 15px;
				padding-left: 10px;
				padding-top: 5px;
				border: none;
			}

			.big{
				margin-top: 355%;
				margin-left: 20%;
				background-color: #8a4100;
				border: none;
			}

			#title-id{
				width: 250px;
				height: 30px;
				margin-top: 20px;
				border-radius: 15px 15px 15px 15px;
				margin-left: auto;
				margin-right: auto;
				display: block;
				padding-left: 10px;
				padding-top: 5px;
				border: none;
			}
		}

		/*#reply-id{
			width: 300px;
			height: 120px;
			margin-top: 20px;
			border-radius: 15px 15px 15px 15px;
			padding-left: 10px;
			padding-top: 5px;
			border: none;
		}*/

		.search-button{
			background-color: #8a4100;
			border: none;
			color: white;
			font-size: 10px;
		}

		.hide{
			display: none;
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
	 			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	 		    	<div class="navbar-nav">
	 		      		<a class="p-2 nav-item nav-link text-white" href="/~cwalcott/final_project/login.php">Login</a>
	 		      		<a class="p-2 nav-item nav-link text-white" href="/~cwalcott/final_project/reg.php">Sign up</a>
	 		    	</div>
	 		 	</div>
			

		<?php else: ?>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    	<div class="navbar-nav">
		      		<a class="nav-item nav-link active text-white bold" href="home.php">Home</a>
		      		<a class="nav-item nav-link text-white" href="profile.php">Profile</a>
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

	<?php 
		$r_post[$size];
		$r_text[$size];
		$r_account[$size];
		$r_date[$size];
		$r_user[$size];
		$r_pic[$size];
		$a = 0; 
	?>

	<?php while ( $row = $replies->fetch_assoc() ) : ?>
		<?php 
			$r_post[$a] = $row["post_id"];
			$r_text[$a] = $row["reply_text"];
			$r_account[$a] = $row["account_id"];
			$r_date[$a] = $row["reply_date"];
			$r_user[$a] = $row["username"];
			$r_pic[$a] = $row["profile_url"];
			
		
			$a++;
		?>
	<?php endwhile; ?>

	<div class="container-fluid slide">
		<div class="row">
			<div class="outer col-12 col-md-8 ml-12">
				<div class="container-fluid">

					<div class="row">
						<div id="switch" style="font-weight: bold;">
							Trending
						</div>
						
					</div>

					<div class="row">
						
							<form action="post.php" method="GET" class="col-12" id="search-form">
								<textarea id="title-id" name="title" placeholder="Enter title..." required></textarea>
								<div class="row-flexbox">
									
									<div>
										<label for="post-id" class="sr-only">Post:</label>
										<textarea id="post-id" name="post" placeholder="Enter text..." required></textarea>
									</div>

									<div>
										<button type="submit" class="btn btn-primary btn-block big">Post</button>
									</div>

								</div> 
							</form>
						

					</div> 
				</div>


				
				<div id="thread">

					<?php while ( $row = $posts->fetch_assoc() ) : ?>

						<div class="section">
							
							<div class="comment">
								<div class="title"> <?php echo $row["title"]; ?> </div>
								<div class="ml-2"> <?php echo $row["post_text"]; ?> </div>

								<div class="container-fluid"> 
									<div class="row">
										<div class="col-6 col-lg-6 col-md-6">
											<img src="<?php echo $row['profile_url']; ?>" class="user rounded-circle">
											<span><?php echo $row["username"]; ?></span>
										</div>
										<div class="col-6 col-lg-6 col-md-6">
											<div class="float-right">
												<div> 
													<?php 
														$date = $row["post_date"];
														echo date("m-d-Y g:iA", strtotime($date)); 
													?> 

												</div>
											</div>
										</div>
										<div class="expand">
											<button class="btn-primary brown"> reply </button>
										</div>
										<div class="woah hide">
											<form action="reply.php" method="GET" class="col-12" id="search-form">
												<div class="row-flexbox yo">
													
													<div>
														<label for="reply-id" class="sr-only">Post:</label>
														<textarea id="reply-id" name="reply" placeholder="Enter text..." required></textarea>
													</div>

													<div>
														<button type="submit" class="btn btn-primary btn-block but">Post</button>
													</div>

													<input type="hidden" name="post_id" value= <?php echo $row["id"]; ?> >
												</div> 
											</form>
										</div>

									</div>	


								</div>		
							</div>

							<?php for($i = 0; $i<$size; $i++): ?>
								<?php if($row["id"] == $r_post[$i]): ?> 
									<div class="reply">
										<?php echo $r_text[$i]; ?>
										<div class="container-fluid"> 
											<div class="row">
												<div class="col-6 col-lg-6 col-md-6">
													<img src="<?php echo $r_pic[$i]; ?>" class="user rounded-circle">
													<span><?php echo $r_user[$i]; ?></span>
												</div>
												<div class="col-6 col-lg-6 col-md-6">
													<div class="float-right">
														<div>
															<?php 
																$date = $r_date[$i];
																echo date("m-d-Y g:iA", strtotime($date)); 
															?> 
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?> 
							
							<?php endfor; ?>
						
						
							

						</div>
					<?php endwhile; ?>

				</div>

			</div>
		
			
	
			<div class="results col-12 col-md-3 col-lg-3 mr-2">
				<!-- // api data -->
				<h1 id="header">MATCHES</h1>
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