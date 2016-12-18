<?php

	function create_admin($userID) {

		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=ec2-54-235-173-161.compute-1.amazonaws.com;port=5432;dbname=d1p08lsn14og2", "wplbxvzslhxeoa", "7669306a79c6df85de352ad79d52ec650e1ebe59caf6d7fd6c090444c20fa11f");

		# Put the parameters in an array
		$data = array('userID' => $userID);

		# Prepare the query
		$STH = $DBH->prepare("INSERT INTO admin (userid) VALUES (:userID)");
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}
	
?>