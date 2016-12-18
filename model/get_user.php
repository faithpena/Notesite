<?php
	
	function get_user($username)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=ec2-54-235-173-161.compute-1.amazonaws.com;port=5432;dbname=d1p08lsn14og2", "wplbxvzslhxeoa", "7669306a79c6df85de352ad79d52ec650e1ebe59caf6d7fd6c090444c20fa11f");

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