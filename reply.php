<?php
	
	require 'config.php';

	
	$username = $_SESSION["username"];
	$date = date('Y-m-d h:m:s');
	
	
	if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]){
		header("Location: /~cwalcott/final_project/login.php");
	}

	if((!isset($_GET["reply"]) || empty($_GET["reply"]))){
		
		$error = "Please fill out the required fields.";
		$isError = true;
		header("Location: /~cwalcott/final_project/home.php");
	}else{
		$isError = false;
		

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if ($mysqli->connect_errno) {
			echo "Error: " . $mysqli->connect_errno;
			exit();
		}
		$temp = "SELECT accounts.id FROM accounts WHERE username = '" . $username . "';";
		
		$res = $mysqli->query($temp);	

		if(!$res){
		 	echo "Error: " . $mysqli->error;
		 	exit();
		}
	    
		while($row = $res->fetch_assoc()){
			$id = $row["id"];
		}


		///////////////////////////////////////////////////////////////////////

		//////////////////////////////////////////////////////////////////////
		
		$sql = "INSERT INTO replies (reply_text, account_id, reply_date, post_id) VALUES ('";
		
	


		$sql .= $_GET["reply"] . "', " . $id . ", " . CURRENT_TIMESTAMP . ", " . $_GET["post_id"] . ");";

		
		
		$results = $mysqli->query($sql);

		if(!$results){
			echo "Error: " . $mysqli->error;
			exit();
		}
		
			
		$mysqli->close();
		header("Location: /~cwalcott/final_project/home.php");
	}
?>
