<?php

	function create_admin($userID) {

		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

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