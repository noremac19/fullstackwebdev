<?php
	require 'config.php';
	

	if ( !isset($_GET['bio']) || empty($_GET['bio']) ) {

		$error = "Please fill out all required fields.";
		header("Location: /~cwalcott/final_project/profile.php");
	}
	else {

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ( $mysqli->connect_errno ) {
			echo $mysqli->connect_error;
			exit();
		}

		

		// ---- Using prepared statements
		$statement = $mysqli->prepare("UPDATE accounts SET bio = ?, profile_url = ? WHERE id = ?");
		$statement->bind_param("ssi", $_GET["bio"], $_GET["url"], $_GET["account_id"]);
		$executed = $statement->execute();

		if(!$executed) {
			echo $mysqli->error;
		}

		if($statement->affected_rows == 1) {
			$isUpdated = true;
		}

		$statement->close();
		echo "Hello";
		$mysqli->close();
		header("Location: /~cwalcott/final_project/profile.php");
	}
?>