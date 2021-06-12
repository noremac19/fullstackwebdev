<?php

	require 'config.php';


	if ( !isset($_GET['edit']) || empty($_GET['edit']) ) {

		$error = "Please fill out all required fields.";
		header("Location: /~cwalcott/final_project/profile.php");
	}
	else {

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ( $mysqli->connect_errno ) {
			echo $mysqli->connect_error;
			exit();
		}

		
		$int = (int) $_GET["post_id"];

		// ---- Using prepared statements
		$statement = $mysqli->prepare("UPDATE posts SET post_text = ? WHERE id = ?");
		$statement->bind_param("si", $_GET["edit"], $int);
		$executed = $statement->execute();

		if(!$executed) {
			echo $mysqli->error;
		}

		if($statement->affected_rows == 1) {
			$isUpdated = true;
		}

		$statement->close();
		
		$mysqli->close();
		header("Location: /~cwalcott/final_project/profile.php");
	}

	
?>