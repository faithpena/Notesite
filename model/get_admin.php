<?php
	
	function get_admin($userid)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=ec2-54-235-173-161.compute-1.amazonaws.com;port=5432;dbname=d1p08lsn14og2", "wplbxvzslhxeoa", "7669306a79c6df85de352ad79d52ec650e1ebe59caf6d7fd6c090444c20fa11f");

		# Put the parameters in an array
		$data = array('userid' => $userid);

		# Prepare the query
		$STH = $DBH->prepare('SELECT * FROM admin WHERE userid = :userid');
		
		# Execute the query
		$STH->execute($data);

		# Get all the rows that matches the query
		$admin = $STH->fetchAll(PDO::FETCH_OBJ);

		# Disconnect the database
		$DBH = null;

		return $admin[0];
	}

?>