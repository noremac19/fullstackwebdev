<?php
	require 'config.php';
	

	if ( !isset($_GET['post_id']) || empty($_GET['post_id']) ) {
		$error = "Invalid.";
		header("Location: /~cwalcott/final_project/profile.php");
	}
	else {

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ( $mysqli->connect_errno ) {
			echo $mysqli->connect_error;
			exit();
		}

		$sql = "DELETE FROM replies 
		WHERE post_id = " . $_GET["post_id"] . ";";

		

		$res = $mysqli->query($sql);

		if(!$res){
			echo $mysqli->error;
			exit();
		}

		///////////////////////////////////////////////
		///////////////////////////////////////////////
		//////////////////////////////////////////////

		$sql2 = "DELETE FROM posts 
		WHERE id = " . $_GET["post_id"] . ";";

		

		$results = $mysqli->query($sql2);

		if(!$results){
			echo $mysqli->error;
			exit();
		}	

		// Make sure this was succesful
		if($mysqli->affected_rows == 1) {
			$isDeleted = true;
		}


		$mysqli->close();

		header("Location: /~cwalcott/final_project/profile.php");
	}
?>