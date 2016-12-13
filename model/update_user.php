<?php
	
	function update_user($userid, $username, $email, $firstname, $lastname, $sex, $birthdate)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('userid' => $userid, 'username' => $username, 'email' => $email, 'firstname' => $firstname, 'lastname' => $lastname, 'sex' => $sex, 'birthdate' => $birthdate);

		# Prepare the query
		$STH = $DBH->prepare('UPDATE users SET username = :username, email = :email, firstname = :firstname, lastname = :lastname, sex = :sex, birthdate = :birthdate WHERE userid = :userid');
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}
?>