<?php
	
	function set_user($username, $password, $email, $firstname, $lastname, $sex, $month, $day, $year)
	{
		# Connect to database/postgres
		$DBH = new PDO("pgsql:host=localhost;port=8080;dbname=cs165", "postgres", "chris12345");

		# Put the parameters in an array
		$data = array('username' => $username, 'password' => $password, 'email' => $email, 'firstname' => $firstname, 'lastname' => $lastname, 'sex' => $sex, 'birthdate' => $year . '-' . $month . '-' . $day);

		# Prepare the query
		$STH = $DBH->prepare("INSERT INTO users (username, password, email, firstname, lastname, sex, birthdate) VALUES (:username, :password, :email, :firstname, :lastname, :sex, :birthdate)");
		
		# Execute the query
		$STH->execute($data);

		# Disconnect the database
		$DBH = null;
	}

?>