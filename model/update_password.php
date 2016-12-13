<?php
	
	function update_password($userid, $password)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('userid' => $userid, 'password' => $password);

		# Prepare the query
		$STH = $DBH->prepare('UPDATE users SET password = :password WHERE userid = :userid');
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}
?>