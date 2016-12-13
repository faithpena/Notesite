<?php
	
	function get_user($username)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('username' => $username);

		# Prepare the query
		$STH = $DBH->prepare('SELECT * FROM users WHERE username = :username');
		
		# Execute the query
		$STH->execute($data);

		# Get all the rows that matches the query
		$user = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $user[0];
	}

?>