<?php

	function get_users()
	{
		# Connect to database/postgres
$DBH = new PDO("pgsql:host=ec2-54-235-173-161.compute-1.amazonaws.com;port=5432;dbname=d1p08lsn14og2", "wplbxvzslhxeoa", "7669306a79c6df85de352ad79d52ec650e1ebe59caf6d7fd6c090444c20fa11f");

		# Prepare the query
		$STH = $DBH->prepare('SELECT * FROM users ORDER BY userid ASC');
		
		# Execute the query
		$STH->execute();

		# Get all the rows that matches the query
		$users = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $users;
	}

?>