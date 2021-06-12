<?php
	require 'config.php';
	

	if ( !isset($_GET['reply_id']) || empty($_GET['reply_id']) ) {
		$error = "Invalid.";
		header("Location: /~cwalcott/final_project/profile_replies.php");
	}
	else {

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ( $mysqli->connect_errno ) {
			echo $mysqli->connect_error;
			exit();
		}

		$sql = "DELETE FROM replies 
		WHERE id = " . $_GET["reply_id"] . ";";

		

		$res = $mysqli->query($sql);

		if(!$res){
			echo $mysqli->error;
			exit();
		}

		$mysqli->close();

		header("Location: /~cwalcott/final_project/profile_replies.php");
	}
?>