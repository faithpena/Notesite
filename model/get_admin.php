<?php
	
	function get_admin($userid)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('userid' => $userid);

		# Prepare the query
		$STH = $DBH->prepare('SELECT * FROM admin WHERE userid = :userid');
		
		# Execute the query
		$STH->execute($data);

		# Get all the rows that matches the query
		$user = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $user[0];
	}

?>